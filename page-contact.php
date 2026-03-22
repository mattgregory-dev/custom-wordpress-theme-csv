<?php
/**
 * Template Name: Contact
 */
get_header(
  null,
  array(
    //'header_variant' => 'absolute',
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

    <section class="page-title">
      <div class="page-title-container">
        <p class="label">Leave us a message</p>
        <h1>Contact</h1>
        <p class="description">
          Have a question about a retreat or the process? Reach out here.
        </p>
      </div>
    </section>

    <section id="contact-main" class="w-full py-16 sm:py-20">
      <div class="max-w-[1240px] mx-auto px-6 grid grid-cols-1 lg:grid-cols-[1.1fr_0.9fr] gap-10 lg:gap-16 items-start">

        <div class="soft-shadow rounded-xl border border-slate-300 bg-white/95 p-6 sm:p-8 order-2 lg:order-1">
          <?php echo do_shortcode('[forminator_form id="213"]'); ?>
        </div>
        
        <aside class="space-y-4 sm:space-y-6 order-1 lg:order-2">
          <div class="rounded-xl border border-slate-300 bg-white/95 p-5 sm:p-6 space-y-3">
            <h2 class="text-2xl">Contact details</h2>
            <p class="text-lg text-[var(--muted)]">928-475-5551</p>
            <p class="text-lg text-[var(--muted)]">Sedona, AZ</p>
          </div>
          <div class="rounded-xl border border-slate-300 bg-white/95 p-5 sm:p-6 space-y-2">
            <h3 class="text-xl">Response time</h3>
            <p class="text-lg text-[var(--muted)]">We typically respond within 2-3 business days.</p>
          </div>
        </aside>
      </div>
    </section>

    <?php
  endwhile;
endif;
?>

<?php get_footer(); ?>
