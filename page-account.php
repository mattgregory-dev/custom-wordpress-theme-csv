<?php
/**
 * Template Name: Account
 */
get_header(
  null,
  array(
    //'header_variant' => 'absolute',
    //'header_color' => 'white',
  )
);
?>

<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <article>
      <h1><?php the_title(); ?></h1>
      <div>
        <?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; ?>
<?php else : ?>
  <p>No content found.</p>
<?php endif; ?>

<?php get_footer(); ?>
