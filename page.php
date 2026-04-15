<?php
get_header();
?>

<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>

    <section class="section bg-mint-green">
      <div class="container mx-auto">
        <?php
        $page_eyebrow = get_field( 'page_eyebrow' );
        $page_description = get_field( 'page_description' );
        ?>
        <?php if ( ! empty( $page_eyebrow ) ) : ?>
          <p class="eyebrow"><?php echo esc_html( (string) $page_eyebrow ); ?></p>
        <?php endif; ?>
        <h1><?php the_title(); ?></h1>
        <?php if ( ! empty( $page_description ) ) : ?>
          <div class="page-description"><?php echo wp_kses_post( (string) $page_description ); ?></div>
        <?php endif; ?>
      </div>
    </section>

    <section class="section">
      <div class="container mx-auto px-4 md:px-6 lg:px-8">
        <?php the_content(); ?>
      </div>
    </section>

  <?php endwhile; ?>
<?php else : ?>
  <p>No content found.</p>
<?php endif; ?> 

<?php
get_footer();
