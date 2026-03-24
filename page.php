<?php
get_header();
?>
<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <article class="py-12">
      <h1 class="text-3xl font-semibold page-heading"><?php the_title(); ?></h1>
      <div class="mt-6 prose max-w-none">
        <?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; ?>
<?php else : ?>
  <p>No content found.</p>
<?php endif; ?>
<?php
get_footer();
