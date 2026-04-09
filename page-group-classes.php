<?php
/**
 * Template Name: Group Classes
 */
get_header(
  null,
  array(
    'header_variant' => 'absolute',
    //'header_color' => 'white',
  )
);
?>

<?php
if ( have_posts() ) :
  while ( have_posts() ) :
    the_post();

    $raw_content = get_post_field( 'post_content', get_the_ID() );
    $blocks = parse_blocks( $raw_content );
    ?>

    <?php include get_template_directory() . '/partials/slots/hero-header-slot.php'; ?>

    <section class="py-24 px-8 bg-[#d6e3e5]" style="height:600px;">
      <div class="max-w-5xl mx-auto">
      </div>
    </section>

    <?php include get_template_directory() . '/partials/slots/next-step-slot.php'; ?>

    <?php
  endwhile;
endif;
?>

<?php
get_footer();
