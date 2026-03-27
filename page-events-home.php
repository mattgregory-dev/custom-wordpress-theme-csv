<?php
/**
 * Template Name: Events
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

    <!-- Upcoming Events -->
    <section id="retreats" class="pt-24 pb-24 px-8">
      <div class="max-w-7xl mx-auto">
        <div class="max-w-3xl mx-auto text-center mb-20">
          <h2 class="text-gray-900 mb-6 text-[2.5rem] font-normal">
            Upcoming Events
          </h2>
          <p class="text-gray-700 leading-relaxed text-lg">
            Explore upcoming events and reserve your spot.
          </p>
        </div>

        <?php
        $events_query_args = array(
          'post_type' => 'event',
          'post_status' => 'publish',
          'posts_per_page' => -1,
          'no_found_rows' => true,
          'meta_key' => 'start_date',
          'orderby' => 'meta_value_num',
          'order' => 'ASC',
        );
        $events_grid_classes = 'grid md:grid-cols-2 gap-12';

        include get_template_directory() . '/partials/events-loop.php';
        ?>
      </div>
    </section>

    <section class="py-24 px-8 bg-[#d6e3e5]" style="height:600px;">
      <div class="max-w-5xl mx-auto">
      </div>
    </section>

    <?php
  endwhile;
endif;
?>

<?php
get_footer();

