<?php
/**
 * Template Name: Courses
 */
get_header(
  null,
  array(
    //'header_variant' => 'absolute',
    //'header_color' => 'white',
  )
);
?>

<section class="section bg-mint-green">
  <div class="container mx-auto px-4 md:px-6 lg:px-8">
    <div class="grid gap-10 lg:grid-cols-[1.1fr_0.9fr] items-center">
      <div>
        <p class="eyebrow">Self-Paced Courses</p>
        <h1>Self-Paced Herbal Courses You Can Start Today</h1>
        <p class="text-lg text-neutral-700 mb-4">Learn at your own pace with Feather Jones. Each course blends traditional herbal knowledge with hands-on tools you can use right away. Courses start at $75.</p>
        <p class="text-neutral-600 mb-8">Instructor: Feather Jones | <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">Meet Feather on the About page</a></p>
        <div class="flex flex-wrap gap-4">
          <a class="btn btn-primary" href="#catalog">Browse All Courses</a>
          <a class="btn btn-secondary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact Us</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section bg-white" id="featured">
  <div class="container">
    <div class="featured-card reveal">
      <div class="featured-inner">
        <div class="featured-img">
          <div class="badge-rec">Recommended Starting Point</div>
          <a href="<?php echo esc_url( home_url( '/courses/womens-wellness/' ) ); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder.webp" alt="" class="w-full h-full object-cover">
          </a>
        </div>
        <div class="featured-body">
          <div class="eyebrow">Flagship Program</div>
          <h2><a href="<?php echo esc_url( home_url( '/courses/womens-wellness/' ) ); ?>">Women&rsquo;s Wellness Complete Herbal Course</a></h2>

          <p class="desc mb-8">Learn how to care for your body with herbs through every stage of a woman&rsquo;s life&thinsp;&mdash;&thinsp;from cycle health to menopause. This is Feather&rsquo;s most complete course, with practical guidance you can use right away.</p>

          <p class="desc mb-12 hidden"><a href="#">Read more &raquo;</a></p>

          <div class="meta-strip mb-8">
            <span class="meta-tag">20 Hours</span>
            <span class="meta-tag">20 Lessons</span>
            <span class="meta-tag">17 Quizzes</span>
            <span class="meta-tag">Printable Guides</span>
            <span class="meta-tag">Beginner Friendly</span>
            <span class="meta-tag">Lifetime Access</span>
          </div>
          <div class="featured-cols">
            <div>
              <h4>What You&rsquo;ll Learn</h4>
              <ul>
                <li>Herbal approaches to menstrual health and hormone balance</li>
                <li>Foundational materia medica for women&rsquo;s wellness</li>
                <li>Safe, practical preparation methods and daily protocols</li>
              </ul>
            </div>
            <div>
              <h4>Who This Is For</h4>
              <ul>
                <li>Women who want to take an active role in their health</li>
                <li>Herbal students building a strong foundation</li>
                <li>Practitioners supporting women&rsquo;s health</li>
              </ul>
            </div>
          </div>
          <div class="featured-enroll flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
              <div class="featured-price">$555</div>
              <div class="featured-price-note">One-time purchase &middot; Immediate access</div>
            </div>
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-end sm:gap-4">
              <a href="<?php echo esc_url( home_url( '/courses/womens-wellness/' ) ); ?>" class="btn btn-secondary btn-sm">View Full Course</a>
              <a href="<?php echo esc_url( home_url( 'checkout/?add-to-cart=1581' ) ); ?>" class="btn btn-primary btn-sm">Enroll Today</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section bg-warm-linen" id="catalog">
  <div class="container">
    <div class="text-center reveal">
      <div class="eyebrow">Course Catalog</div>
      <h2>Browse All Courses</h2>
      <p class="course-description">Choose a focused learning path or pair courses together for a deeper herbal practice.</p>
    </div>
    <div class="flex flex-col gap-4 mt-10 reveal">

      <?php
      $courses_query = new WP_Query( array(
        'post_type' => 'sfwd-courses',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
      ) );

      if ( $courses_query->have_posts() ) :
        $featured_posts = array();
        $regular_posts = array();
        $featured_ids = array();

        foreach ( $courses_query->posts as $course_post ) {
          $course_id = $course_post->ID;
          $is_featured = false;

          if ( function_exists( 'get_field' ) ) {
            $featured_value = get_field( 'featured_course', $course_id );
            $is_featured = ! empty( $featured_value );
          } else {
            $featured_value = get_post_meta( $course_id, 'featured_course', true );
            $is_featured = ! empty( $featured_value );
          }

          if ( $is_featured ) {
            $featured_posts[] = $course_post;
            $featured_ids[] = $course_id;
          } else {
            $regular_posts[] = $course_post;
          }
        }

        $sorted_posts = array_merge( $featured_posts, $regular_posts );

        foreach ( $sorted_posts as $course_post ) :
          setup_postdata( $course_post );
          $course_id = $course_post->ID;
          $is_featured = in_array( $course_id, $featured_ids, true );
          $thumb_id = get_post_thumbnail_id( $course_id );
          $thumb_url = $thumb_id ? wp_get_attachment_image_url( $thumb_id, 'large' ) : '';
          $thumb_alt = $thumb_id ? get_post_meta( $thumb_id, '_wp_attachment_image_alt', true ) : '';
          $fallback_image = get_template_directory_uri() . '/images/placeholder.webp';
          $description = function_exists( 'get_field' )
            ? get_field( 'course_short_description', $course_id )
            : '';

          if ( '' === $description ) {
            $description = get_the_excerpt();
          }

          if ( '' === $description ) {
            $description = wp_trim_words( get_the_content(), 28 );
          }

          $course_title = get_the_title( $course_id );
          $course_link = get_permalink( $course_id );
          $course_category_label = '';
          $course_categories = get_the_terms( $course_id, 'ld_course_category' );
          if ( ! empty( $course_categories ) && ! is_wp_error( $course_categories ) ) {
            $course_category_label = $course_categories[0]->name;
          }
          $enroll_url = $course_link;
          if ( function_exists( 'learndash_get_setting' ) ) {
            $custom_button_url = trim( (string) learndash_get_setting( $course_id, 'custom_button_url' ) );
            if ( '' !== $custom_button_url ) {
              $enroll_url = $custom_button_url;
            }
          }
          $meta_items = array();
          $course_hours = function_exists( 'get_field' )
            ? get_field( 'course_hours', $course_id )
            : get_post_meta( $course_id, 'course_hours', true );
          $course_level = get_post_meta( $course_id, 'course_level', true );
          $course_access = get_post_meta( $course_id, 'course_access', true );

          if ( $course_hours ) {
            $meta_items[] = $course_hours . ' Hours';
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

          $price_display = '—';
          if ( function_exists( 'learndash_get_course_price' ) ) {
            $pricing = learndash_get_course_price( $course_id );
            if ( isset( $pricing['type'] ) && 'free' === $pricing['type'] ) {
              $price_display = 'Free';
            } elseif ( ! empty( $pricing['price'] ) ) {
              if ( function_exists( 'learndash_get_price_formatted' ) ) {
                $price_display = learndash_get_price_formatted( $pricing['price'] );
              } else {
                $price_display = '$' . $pricing['price'];
              }
            }
          }
          ?>
          <div class="course-row">
            <div class="course-thumb">
              <a href="<?php echo esc_url( $course_link ); ?>">
                <img src="<?php echo esc_url( $thumb_url ? $thumb_url : $fallback_image ); ?>" alt="<?php echo esc_attr( $thumb_alt ); ?>" style="object-position:center">
              </a>
            </div>
            <div class="course-info">
              <?php if ( $is_featured ) : ?>
                <span class="featured">Featured Course</span>
              <?php endif; ?>
              <?php if ( $course_category_label ) : ?>
                <div class="series-label"><?php echo esc_html( $course_category_label ); ?></div>
              <?php endif; ?>
              <h3><a href="<?php echo esc_url( $course_link ); ?>"><?php echo esc_html( $course_title ); ?></a></h3>
              <p class="cd"><?php echo esc_html( $description ); ?></p>
              <?php if ( ! empty( $meta_items ) ) : ?>
                <div class="course-meta">
                  <?php foreach ( $meta_items as $meta_item ) : ?>
                    <span class="cm"><?php echo esc_html( $meta_item ); ?></span>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            </div>
            <div class="course-actions">
              <div class="course-price"><?php echo esc_html( $price_display ); ?></div>
              <a href="<?php echo esc_url( $course_link ); ?>" class="btn btn-secondary btn-sm w-full mb-4">View Course</a>
              <a href="<?php echo esc_url( $enroll_url ); ?>" class="btn-ghost">Enroll Today &rarr;</a>
            </div>
          </div>
        <?php
        endforeach;
        wp_reset_postdata();
      endif;
      ?>

    </div>
  </div>
</section>

<div class="botanical-divider"></div>

<section class="section bg-white">
  <div class="container">
    <div class="text-center reveal mb-6">
      <div class="eyebrow">Support</div>
      <h2>Need Help Choosing a Course?</h2>
      <p class="max-w-2xl mx-auto mb-6">Not sure where to start? Reach out with questions about which course fits your experience level, what&rsquo;s included, or how access works. We&rsquo;re happy to help.</p>
      <a href="/contact/" class="btn btn-primary" style="margin-bottom:36px">Contact Support</a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mt-9 reveal">
      <div class="support-card">
        <h3>What You&rsquo;ll Receive</h3>
        <p>Immediate access to lessons, downloadable resources, and clear guidance for safe herbal practice.</p>
      </div>
      <div class="support-card">
        <h3>Access Details</h3>
        <p>All courses are self-paced with lifetime access unless noted otherwise in the course details.</p>
      </div>
      <div class="support-card">
        <h3>Questions?</h3>
        <p>Visit the <a href="#" style="color:var(--forest-green)">FAQ page</a> for more answers, or send us a note for personal help.</p>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
?>



