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
      <div>
        <?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; ?>
<?php endif; ?>

<?php
get_footer();
