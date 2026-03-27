<?php
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

    <!-- Upcoming retreats -->
    <section id="retreats" class="pt-0 md:pt-16 pb-32 px-8">
      <div class="max-w-6xl mx-auto">
        <div class="text-center space-y-4 mb-16">
          <h2 class="text-4xl text-gray-900 font-normal leading-[1.4] sm:leading-10">
            Upcoming Retreats
          </h2>
          <p class="text-gray-700 leading-relaxed">
            Explore upcoming retreat opportunities held in Sedona.
          </p>
        </div>

        <?php
        $events_query_args = array(
          'post_type' => 'event',
          'post_status' => 'publish',
          'posts_per_page' => 2,
          'no_found_rows' => true,
          'meta_key' => 'start_date',
          'orderby' => 'meta_value_num',
          'order' => 'ASC',
        );
        $events_grid_classes = 'grid md:grid-cols-2 gap-8 mb-8';
        $reserve_fallback_url = home_url( '/events-home/' );

        include get_template_directory() . '/partials/events-loop.php';
        ?>

        <?php if ( isset( $events_query ) && $events_query->post_count > 1 ) : ?>
          <div class="text-center mt-18">
            <a href="<?php echo esc_url( home_url( '/events-home/' ) ); ?>" class="inline-block text-gray-900 hover:text-gray-700 border-b border-gray-900 pb-1">
              View All Events
            </a>
          </div>
        <?php endif; ?>
      </div>
    </section>

    <?php
  endwhile;
endif;
?>

<?php
get_footer();
