<?php
get_header(
  null,
  array(
    'header_variant' => 'absolute',
    'header_color' => 'white',
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

    <!-- A Moment to Step Away -->
    <section class="py-24 px-8">
      <div class="max-w-3xl mx-auto text-center">
        <?php get_template_part('partials/aya-motif') ?>

        <div class="text-gray-600 text-sm uppercase tracking-[0.2em] hidden">
          OUR APPROACH
        </div>

        <h2 class="text-4xl md:text-5xl text-gray-900 font-normal mt-[3.2rem] leading-[1.4] sm:leading-9 md:leading-none">
          A Moment to Step Away
        </h2>

        <div class="space-y-6 text-gray-700 leading-relaxed pt-4 max-w-lg mx-auto text-lg">
          <p>
            Step away from daily life. Reconnect with yourself. Return home with greater clarity, perspective, and connection.
            <br><br>
            Lumina retreats create the space for meaningful personal exploration through preparation, ceremony, and integration — all held within the landscape and community of Sedona.
          </p>
        </div>
      </div>
    </section>

    <!-- The Journey of the Work -->
    <section id="steps" class="pt-32 pb-32 px-8 bg-[#d6e3e5]">
      <div class="max-w-6xl mx-auto">
        <div class="text-center space-y-4 mb-16">
          <h2 class="text-4xl text-gray-900 font-normal leading-[1.4] sm:leading-10">
            The Journey of the Work
          </h2>
          <p class="text-gray-700 leading-relaxed max-w-2xl mx-auto">
            Each retreat unfolds through a thoughtful process designed to support safety, insight, and integration. Explore all steps.
          </p>
        </div>

        <?php get_template_part( 'partials/journey-steps', null, [ 'start' => true ] ); ?>
      </div>
    </section>

    <!-- What You'll Experience at Lumina -->
    <section class="pt-16 sm:pt-32 pb-32 px-8">
      <div class="max-w-6xl mx-auto">
        <div class="text-center space-y-4 mb-16">
          <h2 class="text-4xl text-gray-900 font-normal leading-[1.4] sm:leading-10">
            What You'll Experience at Lumina
          </h2>
          <p class="text-gray-700 leading-relaxed max-w-2xl mx-auto">
            Lumina retreats are intentionally structured to support meaningful personal exploration.
          </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">

          <div class="space-y-4 p-8 bg-gray-50 border border-gray-200 rounded-lg soft-shadow">
            <div class="w-10 h-10 flex items-center justify-center mx-auto sm:mx-0">
              <svg class="csv-icon" xmlns="http://www.w3.org/2000/svg" width="512px" height="512px" viewBox="-49 141 512 512">
                <polygon points="206.7,150 130.7,225.3 35.3,316 -40,391.3 -19.3,414.7 96,531.3 205.3,642.7 216,634.7 233.3,617.3 
                  426.7,420.7 452.7,392 446,380.7 352.7,290.7 252.7,192"/>
                <path d="M207.4,650.5c-1.6,0-3.2-0.6-4.3-1.8c0,0-247.8-253.3-247.9-253.4c-2.3-2.3-2.3-6.3,0.1-8.7l247.8-242.3
                  c0.1-0.1,0.1-0.1,0.2-0.2c2.3-2.1,5.9-2.1,8.2,0c0.1,0.1,0.1,0.1,0.2,0.2c0,0,247.7,242.2,247.9,242.3c2.3,2.3,2.5,6.2,0.1,8.7
                  c0,0-247.4,252.9-247.9,253.4C210.7,649.9,209.1,650.5,207.4,650.5L207.4,650.5z M117.8,430.2l89.7,199.3l89.7-199.3L117.8,430.2
                  L117.8,430.2z M311,429.4l-83.8,186.1l209.4-214L311,429.4z M-21.6,401.5l209.4,214L104,429.4L-21.6,401.5z M117.1,418h180.9
                  l-90.4-251.2L117.1,418z M222.3,171.7l88.3,245.3L443,387.5L222.3,171.7z M-28,387.5l132.4,29.4l88.3-245.3L-28,387.5z"/>
              </svg>
            </div>
            <div class="space-y-3">
              <h3 class="text-xl text-gray-900 font-normal leading-[1.4] sm:leading-7 text-center sm:text-left">Preparation</h3>
              <p class="text-gray-600 leading-relaxed text-sm">
                Guidance before the retreat to help guests arrive grounded and ready.
              </p>
            </div>
          </div>

          <div class="space-y-4 p-8 bg-gray-50 border border-gray-200 rounded-lg soft-shadow">
            <div class="w-10 h-10 flex items-center justify-center mx-auto sm:mx-0">
              <svg class="csv-icon" xmlns="http://www.w3.org/2000/svg" width="512px" height="512px" viewBox="-49 141 512 512">
                <polygon points="206.7,150 130.7,225.3 35.3,316 -40,391.3 -19.3,414.7 96,531.3 205.3,642.7 216,634.7 233.3,617.3 
                  426.7,420.7 452.7,392 446,380.7 352.7,290.7 252.7,192"/>
                <path d="M207.4,650.5c-1.6,0-3.2-0.6-4.3-1.8c0,0-247.8-253.3-247.9-253.4c-2.3-2.3-2.3-6.3,0.1-8.7l247.8-242.3
                  c0.1-0.1,0.1-0.1,0.2-0.2c2.3-2.1,5.9-2.1,8.2,0c0.1,0.1,0.1,0.1,0.2,0.2c0,0,247.7,242.2,247.9,242.3c2.3,2.3,2.5,6.2,0.1,8.7
                  c0,0-247.4,252.9-247.9,253.4C210.7,649.9,209.1,650.5,207.4,650.5L207.4,650.5z M117.8,430.2l89.7,199.3l89.7-199.3L117.8,430.2
                  L117.8,430.2z M311,429.4l-83.8,186.1l209.4-214L311,429.4z M-21.6,401.5l209.4,214L104,429.4L-21.6,401.5z M117.1,418h180.9
                  l-90.4-251.2L117.1,418z M222.3,171.7l88.3,245.3L443,387.5L222.3,171.7z M-28,387.5l132.4,29.4l88.3-245.3L-28,387.5z"/>
              </svg>
            </div>
            <div class="space-y-3">
              <h3 class="text-xl text-gray-900 font-normal leading-[1.4] sm:leading-7 text-center sm:text-left">Ceremony</h3>
              <p class="text-gray-600 leading-relaxed text-sm">
                Held within a safe and supportive ceremonial environment.
              </p>
            </div>
          </div>

          <div class="space-y-4 p-8 bg-gray-50 border border-gray-200 rounded-lg soft-shadow">
            <div class="w-10 h-10 flex items-center justify-center mx-auto sm:mx-0">
              <svg class="csv-icon" xmlns="http://www.w3.org/2000/svg" width="512px" height="512px" viewBox="-49 141 512 512">
                <polygon points="206.7,150 130.7,225.3 35.3,316 -40,391.3 -19.3,414.7 96,531.3 205.3,642.7 216,634.7 233.3,617.3 
                  426.7,420.7 452.7,392 446,380.7 352.7,290.7 252.7,192"/>
                <path d="M207.4,650.5c-1.6,0-3.2-0.6-4.3-1.8c0,0-247.8-253.3-247.9-253.4c-2.3-2.3-2.3-6.3,0.1-8.7l247.8-242.3
                  c0.1-0.1,0.1-0.1,0.2-0.2c2.3-2.1,5.9-2.1,8.2,0c0.1,0.1,0.1,0.1,0.2,0.2c0,0,247.7,242.2,247.9,242.3c2.3,2.3,2.5,6.2,0.1,8.7
                  c0,0-247.4,252.9-247.9,253.4C210.7,649.9,209.1,650.5,207.4,650.5L207.4,650.5z M117.8,430.2l89.7,199.3l89.7-199.3L117.8,430.2
                  L117.8,430.2z M311,429.4l-83.8,186.1l209.4-214L311,429.4z M-21.6,401.5l209.4,214L104,429.4L-21.6,401.5z M117.1,418h180.9
                  l-90.4-251.2L117.1,418z M222.3,171.7l88.3,245.3L443,387.5L222.3,171.7z M-28,387.5l132.4,29.4l88.3-245.3L-28,387.5z"/>
              </svg>
            </div>
            <div class="space-y-3">
              <h3 class="text-xl text-gray-900 font-normal leading-[1.4] sm:leading-7 text-center sm:text-left">Integration</h3>
              <p class="text-gray-600 leading-relaxed text-sm">
                Space for reflection and continued support after the retreat.
              </p>
            </div>
          </div>

          <div class="space-y-4 p-8 bg-gray-50 border border-gray-200 rounded-lg soft-shadow">
            <div class="w-10 h-10 flex items-center justify-center mx-auto sm:mx-0">
              <svg class="csv-icon" xmlns="http://www.w3.org/2000/svg" width="512px" height="512px" viewBox="-49 141 512 512">
                <polygon points="206.7,150 130.7,225.3 35.3,316 -40,391.3 -19.3,414.7 96,531.3 205.3,642.7 216,634.7 233.3,617.3 
                  426.7,420.7 452.7,392 446,380.7 352.7,290.7 252.7,192"/>
                <path d="M207.4,650.5c-1.6,0-3.2-0.6-4.3-1.8c0,0-247.8-253.3-247.9-253.4c-2.3-2.3-2.3-6.3,0.1-8.7l247.8-242.3
                  c0.1-0.1,0.1-0.1,0.2-0.2c2.3-2.1,5.9-2.1,8.2,0c0.1,0.1,0.1,0.1,0.2,0.2c0,0,247.7,242.2,247.9,242.3c2.3,2.3,2.5,6.2,0.1,8.7
                  c0,0-247.4,252.9-247.9,253.4C210.7,649.9,209.1,650.5,207.4,650.5L207.4,650.5z M117.8,430.2l89.7,199.3l89.7-199.3L117.8,430.2
                  L117.8,430.2z M311,429.4l-83.8,186.1l209.4-214L311,429.4z M-21.6,401.5l209.4,214L104,429.4L-21.6,401.5z M117.1,418h180.9
                  l-90.4-251.2L117.1,418z M222.3,171.7l88.3,245.3L443,387.5L222.3,171.7z M-28,387.5l132.4,29.4l88.3-245.3L-28,387.5z"/>
              </svg>
            </div>
            <div class="space-y-3">
              <h3 class="text-xl text-gray-900 font-normal leading-[1.4] sm:leading-7 text-center sm:text-left">Support</h3>
              <p class="text-gray-600 leading-relaxed text-sm">
                Experienced facilitators and a small group container.
              </p>
            </div>
          </div>

          <div class="space-y-4 p-8 bg-gray-50 border border-gray-200 rounded-lg soft-shadow">
            <div class="w-10 h-10 flex items-center justify-center mx-auto sm:mx-0">
              <svg class="csv-icon" xmlns="http://www.w3.org/2000/svg" width="512px" height="512px" viewBox="-49 141 512 512">
                <polygon points="206.7,150 130.7,225.3 35.3,316 -40,391.3 -19.3,414.7 96,531.3 205.3,642.7 216,634.7 233.3,617.3 
                  426.7,420.7 452.7,392 446,380.7 352.7,290.7 252.7,192"/>
                <path d="M207.4,650.5c-1.6,0-3.2-0.6-4.3-1.8c0,0-247.8-253.3-247.9-253.4c-2.3-2.3-2.3-6.3,0.1-8.7l247.8-242.3
                  c0.1-0.1,0.1-0.1,0.2-0.2c2.3-2.1,5.9-2.1,8.2,0c0.1,0.1,0.1,0.1,0.2,0.2c0,0,247.7,242.2,247.9,242.3c2.3,2.3,2.5,6.2,0.1,8.7
                  c0,0-247.4,252.9-247.9,253.4C210.7,649.9,209.1,650.5,207.4,650.5L207.4,650.5z M117.8,430.2l89.7,199.3l89.7-199.3L117.8,430.2
                  L117.8,430.2z M311,429.4l-83.8,186.1l209.4-214L311,429.4z M-21.6,401.5l209.4,214L104,429.4L-21.6,401.5z M117.1,418h180.9
                  l-90.4-251.2L117.1,418z M222.3,171.7l88.3,245.3L443,387.5L222.3,171.7z M-28,387.5l132.4,29.4l88.3-245.3L-28,387.5z"/>
              </svg>
            </div>
            <div class="space-y-3">
              <h3 class="text-xl text-gray-900 font-normal leading-[1.4] sm:leading-7 text-center sm:text-left">Nature</h3>
              <p class="text-gray-600 leading-relaxed text-sm">
                Quiet landscapes and natural beauty support presence and grounding.
              </p>
            </div>
          </div>

          <div class="space-y-4 p-8 bg-gray-50 border border-gray-200 rounded-lg soft-shadow">
            <div class="w-10 h-10 flex items-center justify-center mx-auto sm:mx-0">
              <svg class="csv-icon" xmlns="http://www.w3.org/2000/svg" width="512px" height="512px" viewBox="-49 141 512 512">
                <polygon points="206.7,150 130.7,225.3 35.3,316 -40,391.3 -19.3,414.7 96,531.3 205.3,642.7 216,634.7 233.3,617.3 
                  426.7,420.7 452.7,392 446,380.7 352.7,290.7 252.7,192"/>
                <path d="M207.4,650.5c-1.6,0-3.2-0.6-4.3-1.8c0,0-247.8-253.3-247.9-253.4c-2.3-2.3-2.3-6.3,0.1-8.7l247.8-242.3
                  c0.1-0.1,0.1-0.1,0.2-0.2c2.3-2.1,5.9-2.1,8.2,0c0.1,0.1,0.1,0.1,0.2,0.2c0,0,247.7,242.2,247.9,242.3c2.3,2.3,2.5,6.2,0.1,8.7
                  c0,0-247.4,252.9-247.9,253.4C210.7,649.9,209.1,650.5,207.4,650.5L207.4,650.5z M117.8,430.2l89.7,199.3l89.7-199.3L117.8,430.2
                  L117.8,430.2z M311,429.4l-83.8,186.1l209.4-214L311,429.4z M-21.6,401.5l209.4,214L104,429.4L-21.6,401.5z M117.1,418h180.9
                  l-90.4-251.2L117.1,418z M222.3,171.7l88.3,245.3L443,387.5L222.3,171.7z M-28,387.5l132.4,29.4l88.3-245.3L-28,387.5z"/>
              </svg>
            </div>
            <div class="space-y-3">
              <h3 class="text-xl text-gray-900 font-normal leading-[1.4] sm:leading-7 text-center sm:text-left">Small Groups</h3>
              <p class="text-gray-600 leading-relaxed text-sm">
                Limited group sizes allow for meaningful connection and personal attention.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Sedona, The Perfect Place for a Reset -->
    <section class="pt-0 sm:pt-16 pb-32 px-8">
      <div class="max-w-7xl mx-auto">
        <div class="grid md:grid-cols-2 gap-16 items-start md:items-start lg:items-center">
          <div class="flex items-center justify-center">
            <img class="page-image" src="<?php echo esc_url( get_template_directory_uri() . '/images/bg/mdsH0k7uoQk.webp' ); ?>">
          </div>

          <div class="space-y-6 ">
            <h2 class="text-4xl text-gray-900 font-normal leading-[1.4] sm:leading-10 text-center sm:text-left">
              Sedona, The Perfect Place for a Reset
            </h2>

            <div class="space-y-6 text-gray-700 leading-relaxed">
              <p>
                Sedona is known for taking one's breath away. It's the perfect place to unplug, unwind, turn our focus inward, and ask the deeper questions — surrounded by both natural beauty and a supportive community.
              </p>
              <p class="pt-2">
                The quiet desert landscapes, open skies, and sweeping red rock formations create a sense of space — the kind that invites reflection, presence, and grounding.
              </p>
              <p class="pt-2">
                <strong>At Lumina, the natural beauty of Sedona is part of every retreat experience.</strong>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

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

        <div class="grid md:grid-cols-2 gap-8 mb-8">
          <?php
          $events_query = new WP_Query(
            array(
              'post_type' => 'event',
              'post_status' => 'publish',
              'posts_per_page' => 2,
              'no_found_rows' => true,
              'meta_key' => 'start_date',
              'orderby' => 'meta_value_num',
              'order' => 'ASC',
            )
          );

          if ( $events_query->have_posts() ) :
            while ( $events_query->have_posts() ) :
              $events_query->the_post();
              $event_type_name = 'Event';
              $event_types = get_the_terms( get_the_ID(), 'event_type' );
              if ( ! empty( $event_types ) && ! is_wp_error( $event_types ) ) {
                $event_type_name = $event_types[0]->name;
              }
              $event_duration = function_exists( 'get_field' ) ? get_field( 'duration' ) : '';
              $event_duration = '' !== $event_duration ? (int) $event_duration : 0;
              $capacity_raw = function_exists( 'get_field' ) ? get_field( 'capacity' ) : '';
              $capacity = $capacity_raw !== '' ? (int) $capacity_raw : 0;
              $full_product_id = function_exists( 'get_field' ) ? get_field( 'full_product_id' ) : '';
              $full_product_id = $full_product_id ? (int) $full_product_id : 0;
              $full_price_display = '';
              if ( $full_product_id && function_exists( 'wc_get_product' ) ) {
                $full_product = wc_get_product( $full_product_id );
                if ( $full_product && '' !== $full_product->get_price() ) {
                  $full_price_display = wc_price( wc_get_price_to_display( $full_product ) );
                }
              }
              $event_start_raw = function_exists( 'get_field' ) ? get_field( 'start_date' ) : '';
              $event_end_raw = function_exists( 'get_field' ) ? get_field( 'end_date' ) : '';
              $event_start = $event_start_raw ? strtotime( (string) $event_start_raw ) : 0;
              $event_end = $event_end_raw ? strtotime( (string) $event_end_raw ) : 0;
              $event_date_range = '';
              if ( $event_start && $event_end ) {
                $start_month = date( 'F', $event_start );
                $start_day = date( 'j', $event_start );
                $end_month = date( 'F', $event_end );
                $end_day = date( 'j', $event_end );
                if ( $start_month === $end_month ) {
                  $event_date_range = $start_month . ' ' . $start_day . '-' . $end_day;
                } else {
                  $event_date_range = $start_month . ' ' . $start_day . '-' . $end_month . ' ' . $end_day;
                }
              } elseif ( $event_start ) {
                $event_date_range = date( 'F j', $event_start );
              } elseif ( $event_end ) {
                $event_date_range = date( 'F j', $event_end );
              }
              $event_image = get_the_post_thumbnail_url( get_the_ID(), 'large' );
              if ( ! $event_image ) {
                $event_image = get_template_directory_uri() . '/images/bg/7AcMUSYRZpU-800.webp';
              }
              ?>
              <div class="rounded-b-lg">
                <div class="flex items-center justify-center relative">
                  <a href="<?php echo esc_url( get_permalink() ); ?>">
                    <img class="retreat-thumb" src="<?php echo esc_url( $event_image ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                  </a>
                  <span class="absolute top-4 right-4 px-3 py-1 bg-white border border-gray-400 text-gray-700 text-xs uppercase tracking-wider rounded-md">
                    <?php echo esc_html( $event_type_name ); ?>
                  </span>
                </div>
                <div class="p-8 space-y-6 border-2 border-gray-300 border-t-[0] rounded-b-lg bg-white">
                  <h3 class="text-gray-900 text-[1.75rem] font-normal"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h3>
                  <div class="grid grid-cols-2 gap-4 text-sm">
                    <!-- Start: Date Range -->
                    <div>
                      <p class="text-gray-500 uppercase tracking-wider text-xs mb-1">Dates</p>
                      <p class="text-gray-900"><?php echo esc_html( $event_date_range ); ?></p>
                    </div>
                    <!-- End: Date Range -->
                    <!-- Start: Duration (Days) -->
                    <div>
                      <p class="text-gray-500 uppercase tracking-wider text-xs mb-1">Duration</p>
                      <p class="text-gray-900">
                        <?php
                        if ( $event_duration ) {
                          echo esc_html( $event_duration . ' ' . ( 1 === $event_duration ? 'Day' : 'Days' ) );
                        }
                        ?>
                      </p>
                    </div>
                    <!-- End: Duration (Days) -->
                    <!-- Start: Location -->
                    <div>
                      <p class="text-gray-500 uppercase tracking-wider text-xs mb-1">Location</p>
                      <p class="text-gray-900">Sedona, Arizona</p>
                    </div>
                    <!-- End: Location -->

                    <!-- Start: Availability -->
                    <?php if ( $capacity ) : ?>
                      <div>
                        <p class="text-gray-500 uppercase tracking-wider text-xs mb-1">Availability</p>
                        <p class="text-gray-900">
                          <?php echo esc_html( $capacity . ' ' . ( 1 === $capacity ? 'spot' : 'spots' ) . ' available' ); ?>
                        </p>
                      </div>
                    <?php endif; ?>
                    <!-- End: Availability -->

                  </div>
                  <p class="text-gray-700 leading-relaxed">
                    <?php
                    $event_excerpt = trim( get_the_excerpt() );
                    if ( '' === $event_excerpt ) {
                      $event_excerpt = wp_trim_words( wp_strip_all_tags( get_the_content() ), 100 );
                    }
                    echo esc_html( $event_excerpt );
                    ?>
                  </p>
                  <?php if ( $full_price_display ) : ?>
                    <p class="text-gray-900 text-2xl"><?php echo wp_kses_post( $full_price_display ); ?></p>
                  <?php endif; ?>

                  <div class="grid md:grid-cols-2 gap-4 hack">
                    <a class="csv-btn csv-btn--primary" href="<?php echo esc_url( get_permalink() ); ?>">Details</a>
                    <a class="csv-btn csv-btn--secondary" href="<?php echo esc_url( home_url( '/apply/' ) ); ?>">Apply</a>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          <?php else : ?>
            <p class="text-gray-700 text-center md:col-span-2">
              No events scheduled yet. Check back soon.
            </p>
          <?php endif; ?>

          <?php wp_reset_postdata(); ?>
        </div>

        <div class="text-center mt-18">
          <a href="<?php echo esc_url( home_url( '/retreats/#retreats' ) ); ?>" class="inline-block text-gray-900 hover:text-gray-700 border-b border-gray-900 pb-1">
            View All Retreats
          </a>
        </div>
      </div>
    </section>

    <!-- What our guests say -->
    <section class="pt-0 md:pt-12 pb-32 px-8">
      <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
          <h2 class="text-4xl text-gray-900 font-normal leading-[1.4] sm:leading-10">
            What Our Guests Say
          </h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
          <div class="bg-white p-8 border border-gray-200 space-y-6 soft-shadow rounded-lg">
            <p class="text-gray-700 leading-relaxed italic">
              &ldquo;This retreat helped me reconnect with clarity and compassion for myself in a way I hadn&rsquo;t experienced before.&rdquo;
            </p>
            <div class="pt-4 border-t border-gray-200">
              <div class="text-sm text-gray-900 font-normal">Sarah M.</div>
              <div class="text-sm text-gray-600">Portland, OR</div>
            </div>
          </div>

          <div class="bg-white p-8 border border-gray-200 space-y-6 soft-shadow rounded-lg">
            <p class="text-gray-700 leading-relaxed italic">
              &ldquo;The careful preparation and integration support made all the difference. I felt held throughout the entire process.&rdquo;
            </p>
            <div class="pt-4 border-t border-gray-200">
              <div class="text-sm text-gray-900 font-normal">David L.</div>
              <div class="text-sm text-gray-600">Austin, TX</div>
            </div>
          </div>

          <div class="bg-white p-8 border border-gray-200 space-y-6 soft-shadow rounded-lg">
            <p class="text-gray-700 leading-relaxed italic">
              &ldquo;Lumina created a space where I could finally slow down and listen to what was already within me.&rdquo;
            </p>
            <div class="pt-4 border-t border-gray-200">
              <div class="text-sm text-gray-900 font-normal">Jennifer K.</div>
              <div class="text-sm text-gray-600">Seattle, WA</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Meet Your Guides -->
    <section class="pt-0 md:pt-16 pb-32 px-8">
      <div class="max-w-5xl mx-auto">
        <div class="text-center mb-16">
          <h2 class="text-4xl text-gray-900 font-normal leading-[1.4] sm:leading-10">
            Meet Your Guides
          </h2>
        </div>

        <?php include get_template_directory() . '/partials/meet-guides-grid.php'; ?>
      </div>
    </section>

    <!-- Safety and Care -->
    <section class="pt-0 md:pt-16 pb-32 px-8">
      <div class="max-w-5xl mx-auto">
        <div class="text-center space-y-6 mb-16">
          <h2 class="text-4xl text-gray-900 font-normal leading-[1.4] sm:leading-10">
            Safety and Care
          </h2>

          <div class="space-y-4 text-gray-700 leading-relaxed max-w-xl mx-auto">
            <p>
              Retreats are held within a thoughtful framework of preparation, ethical facilitation, and integration support.
            </p>
            <p class="pt-2">
              Participants are guided through clear preparation steps and supported throughout the entire experience.
            </p>
          </div>
        </div>

        <div class="grid md:grid-cols-4 gap-6">
          <div class="bg-white p-6 border border-gray-200 text-center space-y-4 rounded-lg soft-shadow">
            <div class="w-12 h-12 mx-auto flex items-center justify-center">
              <svg class="csv-icon" xmlns="http://www.w3.org/2000/svg" width="512px" height="512px" viewBox="-49 141 512 512">
                <polygon points="206.7,150 130.7,225.3 35.3,316 -40,391.3 -19.3,414.7 96,531.3 205.3,642.7 216,634.7 233.3,617.3 
                  426.7,420.7 452.7,392 446,380.7 352.7,290.7 252.7,192"/>
                <path d="M207.4,650.5c-1.6,0-3.2-0.6-4.3-1.8c0,0-247.8-253.3-247.9-253.4c-2.3-2.3-2.3-6.3,0.1-8.7l247.8-242.3
                  c0.1-0.1,0.1-0.1,0.2-0.2c2.3-2.1,5.9-2.1,8.2,0c0.1,0.1,0.1,0.1,0.2,0.2c0,0,247.7,242.2,247.9,242.3c2.3,2.3,2.5,6.2,0.1,8.7
                  c0,0-247.4,252.9-247.9,253.4C210.7,649.9,209.1,650.5,207.4,650.5L207.4,650.5z M117.8,430.2l89.7,199.3l89.7-199.3L117.8,430.2
                  L117.8,430.2z M311,429.4l-83.8,186.1l209.4-214L311,429.4z M-21.6,401.5l209.4,214L104,429.4L-21.6,401.5z M117.1,418h180.9
                  l-90.4-251.2L117.1,418z M222.3,171.7l88.3,245.3L443,387.5L222.3,171.7z M-28,387.5l132.4,29.4l88.3-245.3L-28,387.5z"/>
              </svg>
            </div>
            <h3 class="text-sm text-gray-900 font-normal leading-[1.4] sm:leading-5">Medical Screening</h3>
          </div>
          <div class="bg-white p-6 border border-gray-200 text-center space-y-4 rounded-lg soft-shadow">
            <div class="w-12 h-12 mx-auto flex items-center justify-center">
              <svg class="csv-icon" xmlns="http://www.w3.org/2000/svg" width="512px" height="512px" viewBox="-49 141 512 512">
                <polygon points="206.7,150 130.7,225.3 35.3,316 -40,391.3 -19.3,414.7 96,531.3 205.3,642.7 216,634.7 233.3,617.3 
                  426.7,420.7 452.7,392 446,380.7 352.7,290.7 252.7,192"/>
                <path d="M207.4,650.5c-1.6,0-3.2-0.6-4.3-1.8c0,0-247.8-253.3-247.9-253.4c-2.3-2.3-2.3-6.3,0.1-8.7l247.8-242.3
                  c0.1-0.1,0.1-0.1,0.2-0.2c2.3-2.1,5.9-2.1,8.2,0c0.1,0.1,0.1,0.1,0.2,0.2c0,0,247.7,242.2,247.9,242.3c2.3,2.3,2.5,6.2,0.1,8.7
                  c0,0-247.4,252.9-247.9,253.4C210.7,649.9,209.1,650.5,207.4,650.5L207.4,650.5z M117.8,430.2l89.7,199.3l89.7-199.3L117.8,430.2
                  L117.8,430.2z M311,429.4l-83.8,186.1l209.4-214L311,429.4z M-21.6,401.5l209.4,214L104,429.4L-21.6,401.5z M117.1,418h180.9
                  l-90.4-251.2L117.1,418z M222.3,171.7l88.3,245.3L443,387.5L222.3,171.7z M-28,387.5l132.4,29.4l88.3-245.3L-28,387.5z"/>
              </svg>
            </div>
            <h3 class="text-sm text-gray-900 font-normal leading-[1.4] sm:leading-5">Dieta Guidance</h3>
          </div>
          <div class="bg-white p-6 border border-gray-200 text-center space-y-4 rounded-lg soft-shadow">
            <div class="w-12 h-12 mx-auto flex items-center justify-center">
              <svg class="csv-icon" xmlns="http://www.w3.org/2000/svg" width="512px" height="512px" viewBox="-49 141 512 512">
                <polygon points="206.7,150 130.7,225.3 35.3,316 -40,391.3 -19.3,414.7 96,531.3 205.3,642.7 216,634.7 233.3,617.3 
                  426.7,420.7 452.7,392 446,380.7 352.7,290.7 252.7,192"/>
                <path d="M207.4,650.5c-1.6,0-3.2-0.6-4.3-1.8c0,0-247.8-253.3-247.9-253.4c-2.3-2.3-2.3-6.3,0.1-8.7l247.8-242.3
                  c0.1-0.1,0.1-0.1,0.2-0.2c2.3-2.1,5.9-2.1,8.2,0c0.1,0.1,0.1,0.1,0.2,0.2c0,0,247.7,242.2,247.9,242.3c2.3,2.3,2.5,6.2,0.1,8.7
                  c0,0-247.4,252.9-247.9,253.4C210.7,649.9,209.1,650.5,207.4,650.5L207.4,650.5z M117.8,430.2l89.7,199.3l89.7-199.3L117.8,430.2
                  L117.8,430.2z M311,429.4l-83.8,186.1l209.4-214L311,429.4z M-21.6,401.5l209.4,214L104,429.4L-21.6,401.5z M117.1,418h180.9
                  l-90.4-251.2L117.1,418z M222.3,171.7l88.3,245.3L443,387.5L222.3,171.7z M-28,387.5l132.4,29.4l88.3-245.3L-28,387.5z"/>
              </svg>
            </div>
            <h3 class="text-sm text-gray-900 font-normal leading-[1.4] sm:leading-5">Nervous System Care</h3>
          </div>
          <div class="bg-white p-6 border border-gray-200 text-center space-y-4 rounded-lg soft-shadow">
            <div class="w-12 h-12 mx-auto flex items-center justify-center">
              <svg class="csv-icon" xmlns="http://www.w3.org/2000/svg" width="512px" height="512px" viewBox="-49 141 512 512">
                <polygon points="206.7,150 130.7,225.3 35.3,316 -40,391.3 -19.3,414.7 96,531.3 205.3,642.7 216,634.7 233.3,617.3 
                  426.7,420.7 452.7,392 446,380.7 352.7,290.7 252.7,192"/>
                <path d="M207.4,650.5c-1.6,0-3.2-0.6-4.3-1.8c0,0-247.8-253.3-247.9-253.4c-2.3-2.3-2.3-6.3,0.1-8.7l247.8-242.3
                  c0.1-0.1,0.1-0.1,0.2-0.2c2.3-2.1,5.9-2.1,8.2,0c0.1,0.1,0.1,0.1,0.2,0.2c0,0,247.7,242.2,247.9,242.3c2.3,2.3,2.5,6.2,0.1,8.7
                  c0,0-247.4,252.9-247.9,253.4C210.7,649.9,209.1,650.5,207.4,650.5L207.4,650.5z M117.8,430.2l89.7,199.3l89.7-199.3L117.8,430.2
                  L117.8,430.2z M311,429.4l-83.8,186.1l209.4-214L311,429.4z M-21.6,401.5l209.4,214L104,429.4L-21.6,401.5z M117.1,418h180.9
                  l-90.4-251.2L117.1,418z M222.3,171.7l88.3,245.3L443,387.5L222.3,171.7z M-28,387.5l132.4,29.4l88.3-245.3L-28,387.5z"/>
              </svg>
            </div>
            <h3 class="text-sm text-gray-900 font-normal leading-[1.4] sm:leading-5">Integration Support</h3>
          </div>
        </div>
      </div>
    </section>

    <!-- Ready to explore this work? -->
    <section class="pt-0 md:pt-16 pb-32 px-8">
      <div class="max-w-3xl mx-auto text-center space-y-8">
        <h2 class="text-4xl md:text-5xl text-gray-900 font-normal leading-[1.4] sm:leading-[1.3]">
          Ready to explore this work?
        </h2>

        <p class="text-lg text-gray-700 leading-relaxed">
          If you feel called to explore this work, we invite you to learn more about the retreat process or begin a conversation.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4">
          <a class="csv-btn csv-btn--primary" href="<?php echo esc_url( home_url( '/orientation/' ) ); ?>">
            Explore The Journey
          </a>
          <a class="csv-btn csv-btn--secondary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
            Contact Us
          </a>
        </div>
      </div>
    </section>

    <!-- Have questions? -->
    <section class="pt-32 pb-32 px-8 bg-[#c3ddd5]">
      <div class="max-w-2xl mx-auto">

        <div class="text-center space-y-4 mb-12">
          <h2 class="text-4xl text-gray-900 font-normal leading-[1.4] sm:leading-10">
            Have Questions? Let's Talk
          </h2>
          <p class="text-gray-700 leading-relaxed">
            If you have questions or would like to learn more, reach out and we will respond with care.
          </p>
        </div>

        <?php echo do_shortcode('[forminator_form id="213"]'); ?>
      </div>
    </section>

    <?php
  endwhile;
endif;
?>

<?php
get_footer();
