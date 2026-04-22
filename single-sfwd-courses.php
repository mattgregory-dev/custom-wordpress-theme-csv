<?php
get_header();
?>

<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <article class="single-course-template" data-ld-force-expand="true">
      <?php
      $course_categories = get_the_terms( get_the_ID(), 'ld_course_category' );
      if ( ! empty( $course_categories ) && ! is_wp_error( $course_categories ) ) :
        $course_category_label = $course_categories[0]->name;
        ?>
        <span class="category-name eyebrow"><?php echo esc_html( $course_category_label ); ?></span>
      <?php endif; ?>
      <h1><?php the_title(); ?></h1>
      <?php
      $course_id = get_the_ID();
      $meta_items = array();
      $course_hours_raw = function_exists( 'get_field' )
        ? get_field( 'course_hours', $course_id )
        : get_post_meta( $course_id, 'course_hours', true );
      $course_minutes_raw = function_exists( 'get_field' )
        ? get_field( 'course_minutes', $course_id )
        : get_post_meta( $course_id, 'course_minutes', true );
      $course_level = get_post_meta( $course_id, 'course_level', true );
      $course_access = get_post_meta( $course_id, 'course_access', true );
      $course_hours = is_numeric( $course_hours_raw ) ? (int) $course_hours_raw : 0;
      $course_minutes = is_numeric( $course_minutes_raw ) ? (int) $course_minutes_raw : 0;
      $course_hours = max( 0, $course_hours );
      $course_minutes = max( 0, $course_minutes );

      if ( $course_hours > 0 && $course_minutes > 0 ) {
        $meta_items[] = sprintf(
          '%1$d %2$s %3$d %4$s',
          $course_hours,
          _n( 'hour', 'hours', $course_hours, 'csv' ),
          $course_minutes,
          _n( 'minute', 'minutes', $course_minutes, 'csv' )
        );
      } elseif ( $course_minutes > 0 ) {
        $meta_items[] = sprintf(
          '%1$d %2$s',
          $course_minutes,
          _n( 'minute', 'minutes', $course_minutes, 'csv' )
        );
      } elseif ( $course_hours > 0 ) {
        $meta_items[] = sprintf(
          '%1$d %2$s',
          $course_hours,
          _n( 'hour', 'hours', $course_hours, 'csv' )
        );
      }

      if ( function_exists( 'learndash_get_post_type_slug' ) ) {
        $course_id_int = absint( $course_id );
        $count_query_base = array(
          'post_status' => 'publish',
          'posts_per_page' => 1,
          'fields' => 'ids',
          'no_found_rows' => false,
          'meta_query' => array(
            array(
              'key' => 'course_id',
              'value' => $course_id_int,
              'compare' => '=',
            ),
          ),
        );

        $lessons_query = new WP_Query( array_merge( $count_query_base, array(
          'post_type' => learndash_get_post_type_slug( 'lesson' ),
          'posts_per_page' => -1,
          'fields' => 'ids',
          'no_found_rows' => true,
          'update_post_meta_cache' => false,
          'update_post_term_cache' => false,
        ) ) );
        $topics_query = new WP_Query( array_merge( $count_query_base, array(
          'post_type' => learndash_get_post_type_slug( 'topic' ),
        ) ) );
        $quizzes_query = new WP_Query( array_merge( $count_query_base, array(
          'post_type' => learndash_get_post_type_slug( 'quiz' ),
        ) ) );

        $lessons_count = 0;
        if ( ! empty( $lessons_query->posts ) ) {
          foreach ( $lessons_query->posts as $lesson_id ) {
            $lesson_slug = get_post_field( 'post_name', $lesson_id );
            if ( false !== strpos( $lesson_slug, 'completion' ) || false !== strpos( $lesson_slug, 'introduction' ) ) {
              continue;
            }
            $lessons_count++;
          }
        }
        $topics_count = (int) $topics_query->found_posts;
        $quizzes_count = (int) $quizzes_query->found_posts;

        wp_reset_postdata();

        if ( $lessons_count > 0 ) {
          $meta_items[] = $lessons_count . ' ' . _n( 'Lesson', 'Lessons', $lessons_count, 'csv' );
        }

        if ( $topics_count > 0 ) {
          $meta_items[] = $topics_count . ' ' . _n( 'Topic', 'Topics', $topics_count, 'csv' );
        }

        if ( $quizzes_count > 0 ) {
          $meta_items[] = $quizzes_count . ' ' . _n( 'Quiz', 'Quizzes', $quizzes_count, 'csv' );
        }
      }

      if ( $course_level ) {
        $meta_items[] = $course_level;
      }

      if ( $course_access ) {
        $meta_items[] = $course_access;
      }

      $course_tags = get_the_terms( $course_id, 'ld_course_tag' );
      if ( ! empty( $course_tags ) && ! is_wp_error( $course_tags ) ) {
        $tag_items = array();

        foreach ( $course_tags as $course_tag ) {
          $priority = get_term_meta( $course_tag->term_id, 'ld_course_tag_priority', true );
          $priority = is_numeric( $priority ) ? (int) $priority : 9999;
          $tag_items[] = array(
            'name' => $course_tag->name,
            'priority' => $priority,
          );
        }

        usort( $tag_items, function( $a, $b ) {
          if ( $a['priority'] === $b['priority'] ) {
            return strcasecmp( $a['name'], $b['name'] );
          }
          return $a['priority'] <=> $b['priority'];
        } );

        foreach ( $tag_items as $tag_item ) {
          if ( ! empty( $tag_item['name'] ) ) {
            $meta_items[] = $tag_item['name'];
          }
        }
      }
      ?>
      <?php if ( ! empty( $meta_items ) ) : ?>
        <div class="course-meta">
          <?php foreach ( $meta_items as $meta_item ) : ?>
            <span class="cm"><?php echo esc_html( $meta_item ); ?></span>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <div>
        <?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; ?>
<?php endif; ?>

<?php
get_footer();
