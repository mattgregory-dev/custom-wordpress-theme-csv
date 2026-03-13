<?php
/**
 * Template Name: Application
 */
get_header();
?>

<section class="page-title">
  <div class="page-title-container">
    <p class="label">Getting to know you</p>
    <h1>Retreat Application</h1>
    <p>
      This short application helps us understand you and determine whether the retreat is a good fit.
    </p>
  </div>
</section>

<section id="application-form" class="w-full py-20">
  <div class="max-w-[1240px] mx-auto px-6">
    <div class="max-w-4xl soft-shadow rounded-xl border border-slate-300 bg-white/95 p-10 space-y-10">
      <?php echo do_shortcode('[forminator_form id="214"]'); ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>

