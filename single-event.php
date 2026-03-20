<?php
get_header();
?>

<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <?php
      // Event taxonomy labels.
      $event_id = get_the_ID();
      $event_types = get_the_terms( $event_id, 'event_type' );
      $event_type_label = 'Event';
      $event_type_list = '';
      if ( ! empty( $event_types ) && ! is_wp_error( $event_types ) ) {
        $event_type_label = $event_types[0]->name;
        $event_type_list = implode( ', ', wp_list_pluck( $event_types, 'name' ) );
      }

      // ACF fields (per-event metadata).
      $acf_available = function_exists( 'get_field' );
      // Dates
      $start_date_raw = $acf_available ? get_field( 'start_date', $event_id ) : '';
      $end_date_raw = $acf_available ? get_field( 'end_date', $event_id ) : '';
      // Times
      $start_time_raw = $acf_available ? get_field( 'start_time', $event_id ) : '';
      $end_time_raw = $acf_available ? get_field( 'end_time', $event_id ) : '';
      // Prices
      $full_price_raw = $acf_available ? get_field( 'full_price', $event_id ) : '';
      $deposit_amount_raw = $acf_available ? get_field( 'deposit_amount', $event_id ) : '';
      $balance_amount_raw = $acf_available ? get_field( 'balance_amount', $event_id ) : '';
      // Products
      $full_product_id = $acf_available ? get_field( 'full_product_id', $event_id ) : '';
      $deposit_product_id = $acf_available ? get_field( 'deposit_product_id', $event_id ) : '';
      $balance_product_id = $acf_available ? get_field( 'balance_product_id', $event_id ) : '';
      $full_product_id = $full_product_id ? (int) $full_product_id : 0;
      $deposit_product_id = $deposit_product_id ? (int) $deposit_product_id : 0;
      $balance_product_id = $balance_product_id ? (int) $balance_product_id : 0;
      // Details
      $capacity_raw = $acf_available ? get_field( 'capacity', $event_id ) : '';
      $application_required = $acf_available ? (bool) get_field( 'application_required', $event_id ) : false;
      $location_raw = $acf_available ? get_field( 'location', $event_id ) : '';
      $duration_raw = $acf_available ? get_field( 'duration', $event_id ) : '';

      $format_date_value = function ( $value ) {
        if ( ! $value ) {
          return '';
        }
        if ( is_numeric( $value ) && 8 === strlen( (string) $value ) ) {
          $dt = DateTime::createFromFormat( 'Ymd', (string) $value );
          if ( $dt ) {
            return $dt->format( 'F j, Y' );
          }
        }
        $timestamp = strtotime( (string) $value );
        if ( $timestamp ) {
          return date( 'F j, Y', $timestamp );
        }
        return (string) $value;
      };

      $format_time_value = function ( $value ) {
        if ( ! $value ) {
          return '';
        }
        $timestamp = strtotime( (string) $value );
        if ( $timestamp ) {
          return date( 'g:i a', $timestamp );
        }
        return (string) $value;
      };

      $format_currency_value = function ( $value ) {
        if ( '' === $value || null === $value ) {
          return '';
        }
        if ( is_numeric( $value ) ) {
          return '$' . number_format( (float) $value, 0 );
        }
        return (string) $value;
      };

      // Dates
      $start_date = $format_date_value( $start_date_raw );
      $end_date = $format_date_value( $end_date_raw );
      // Times
      $start_time = $format_time_value( $start_time_raw );
      $end_time = $format_time_value( $end_time_raw );
      // Prices
      $full_price = $format_currency_value( $full_price_raw );
      $deposit_amount = $format_currency_value( $deposit_amount_raw );
      $balance_amount = $format_currency_value( $deposit_amount_raw );
      // Details
      $capacity = $capacity_raw !== '' ? (int) $capacity_raw : 0;
      $location = $location_raw ? (string) $location_raw : '';
      $duration_days = $duration_raw !== '' ? (int) $duration_raw : 0;


      $date_range = $start_date;
      if ( $start_date && $end_date && $end_date !== $start_date ) {
        $date_range = $start_date . ' → ' . $end_date;
      } elseif ( $end_date && ! $start_date ) {
        $date_range = $end_date;
      }

      $time_range = $start_time;
      if ( $start_time && $end_time ) {
        $time_range = $start_time . ' - ' . $end_time;
      }

      $meta_parts = array_filter(
        array(
          $date_range,
          $location,
        )
      );
      $event_meta_line = $meta_parts ? implode( ' · ', $meta_parts ) : '';

      // Checkout links for each payment option.
      $full_checkout_url = $full_product_id ? home_url( '/checkout/?add-to-cart=' . $full_product_id ) : '';
      $deposit_checkout_url = $deposit_product_id ? home_url( '/checkout/?add-to-cart=' . $deposit_product_id ) : '';
      $balance_checkout_url = $balance_product_id ? home_url( '/checkout/?add-to-cart=' . $balance_product_id ) : '';
    ?>

    <!-- EVENT HERO -->
    <section class="bg-gray-200 py-24">
      <div class="max-w-7xl mx-auto px-8">
        <div class="max-w-2xl">
            <!-- Event type (taxonomy) -->
            <div class="text-xs text-gray-600 mb-4 tracking-wider uppercase"><?php echo esc_html( $event_type_label ); ?></div>
            <!-- Event title -->
            <h1 class="text-5xl font-bold mb-6 text-gray-900"><?php the_title(); ?></h1>
            <!-- Short summary (excerpt) -->
            <?php if ( has_excerpt() ) : ?>
              <p class="text-lg text-gray-700 mb-4"><?php echo esc_html( get_the_excerpt() ); ?></p>
            <?php endif; ?>
            <!-- Date + location (+ optional time) -->
            <?php if ( $event_meta_line || $time_range ) : ?>
              <div class="text-sm text-gray-600">
                <?php if ( $event_meta_line ) : ?>
                  <?php echo esc_html( $event_meta_line ); ?>
                <?php endif; ?>
                <?php if ( $time_range ) : ?>
                  <span><?php echo esc_html( ( $event_meta_line ? ' · ' : '' ) . $time_range ); ?></span>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </section>

    <!-- MAIN CONTENT GRID -->
    <div class="max-w-7xl mx-auto px-8 py-16">
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <!-- PRIMARY CONTENT (LEFT COLUMN) -->
        <div class="lg:col-span-2 space-y-12">
          <!-- Featured image (post thumbnail) -->
          <?php if ( has_post_thumbnail() ) : ?>
            <div class="w-full aspect-video bg-gray-300 overflow-hidden rounded-lg">
              <?php the_post_thumbnail( 'large', array( 'class' => 'block w-full h-full object-cover' ) ); ?>
            </div>
          <?php else : ?>
            <div class="w-full aspect-video bg-gray-300"></div>
          <?php endif; ?>

          <!-- Overview section (main content) -->
          <section>
            <h2 class="text-2xl font-bold mb-4 text-gray-900">Overview</h2>
            <div class="space-y-4 text-gray-700 post-content">
              <?php the_content(); ?>
            </div>
          </section>

          <!-- Experience bullets (placeholder copy) -->
          <section>
            <h2 class="text-2xl font-bold mb-4 text-gray-900">What You'll Experience</h2>
            <ul class="space-y-3 text-gray-700">
              <li class="flex items-start">
                <span class="mr-3">•</span>
                <span>Guided meditation and breathwork sessions</span>
              </li>
              <li class="flex items-start">
                <span class="mr-3">•</span>
                <span>Group healing circles and sharing spaces</span>
              </li>
              <li class="flex items-start">
                <span class="mr-3">•</span>
                <span>Nourishing meals and intentional community time</span>
              </li>
              <li class="flex items-start">
                <span class="mr-3">•</span>
                <span>Integration practices and reflective journaling</span>
              </li>
            </ul>
          </section>

          <!-- Flow / schedule (placeholder copy) -->
          <section>
            <h2 class="text-2xl font-bold mb-4 text-gray-900">Retreat Flow</h2>
            <div class="space-y-6">
              <div>
                <h3 class="font-bold text-gray-900 mb-2">Day 1: Arrival + Opening</h3>
                <p class="text-gray-700">Welcome ceremony, group introductions, intention setting, and grounding meditation.</p>
              </div>
              <div>
                <h3 class="font-bold text-gray-900 mb-2">Day 2: Deep Work</h3>
                <p class="text-gray-700">Experiential sessions, guided practices, and personal reflection time.</p>
              </div>
              <div>
                <h3 class="font-bold text-gray-900 mb-2">Day 3: Integration</h3>
                <p class="text-gray-700">Closing circle, integration practices, and ceremonial farewell.</p>
              </div>
            </div>
          </section>

          <!-- Audience section (placeholder copy) -->
          <section>
            <h2 class="text-2xl font-bold mb-4 text-gray-900">Who This Is For</h2>
            <p class="text-gray-700 mb-4">
              This event is designed for individuals seeking deeper connection, clarity, and growth.
            </p>
            <ul class="space-y-2 text-gray-700">
              <li class="flex items-start">
                <span class="mr-3">•</span>
                <span>Those navigating life transitions</span>
              </li>
              <li class="flex items-start">
                <span class="mr-3">•</span>
                <span>Anyone seeking clarity and purpose</span>
              </li>
              <li class="flex items-start">
                <span class="mr-3">•</span>
                <span>Individuals ready for personal growth</span>
              </li>
            </ul>
          </section>

          <!-- Callout / testimonial (placeholder copy) -->
          <div class="border-2 border-gray-400 p-8 bg-white">
            <p class="text-lg italic text-gray-800 text-center">
              "This retreat offers a rare opportunity to pause, reflect, and reconnect with what matters most."
            </p>
          </div>
        </div>

        <!-- SIDEBAR (RIGHT COLUMN) -->
        <div class="space-y-6">
          <!-- Booking card (price/deposit/capacity + CTAs) -->
          <div class="bg-white border-2 border-gray-400 p-6 space-y-4 rounded-lg">
              <?php if ( $full_price ) : ?>
                <div>
                  <div class="text-sm text-gray-600 mb-1">Full Price</div>
                  <div class="text-3xl font-bold text-gray-900"><?php echo esc_html( $full_price ); ?></div>
                </div>
              <?php endif; ?>
              <?php if ( $deposit_amount ) : ?>
                <div>
                  <div class="text-sm text-gray-600 mb-1">Deposit</div>
                  <div class="text-xl font-bold text-gray-900"><?php echo esc_html( $deposit_amount ); ?></div>
                </div>
              <?php endif; ?>
              <?php if ( $capacity ) : ?>
                <div class="text-sm font-bold text-gray-700">
                  <?php echo esc_html( $capacity . ' spots available' ); ?>
                </div>
              <?php endif; ?>
              <!-- Payment Buttons -->
              <div class="space-y-3 pt-2">
                <a class="w-full cwp-btn cwp-btn--primary" 
                    href="<?php echo esc_url( $full_checkout_url ? $full_checkout_url : '#' ); ?>">
                  Pay in Full
                </a>
                <a class="w-full cwp-btn cwp-btn--secondary"
                    href="<?php echo esc_url( $deposit_checkout_url ? $deposit_checkout_url : '#' ); ?>">
                  Pay Deposit
                </a>
              </div>
            </div>

          <!-- Event details card (dates, duration, location, type) -->
          <div class="bg-white border-2 border-gray-400 p-6 space-y-4 rounded-lg">
            <h3 class="font-bold text-gray-900 mb-4">Event Details</h3>
              <?php if ( $date_range || $time_range ) : ?>
                <div>
                  <div class="text-xs text-gray-600 mb-1">DATES</div>
                  <?php if ( $date_range ) : ?>
                    <div class="text-sm text-gray-900"><?php echo esc_html( $date_range ); ?></div>
                  <?php endif; ?>
                  <?php if ( $time_range ) : ?>
                    <div class="text-xs text-gray-500 mt-1"><?php echo esc_html( $time_range ); ?></div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
              <?php if ( $duration_days ) : ?>
                <div>
                  <div class="text-xs text-gray-600 mb-1">DURATION</div>
                  <div class="text-sm text-gray-900"><?php echo esc_html( $duration_days . ' Days' ); ?></div>
                </div>
              <?php endif; ?>
              <?php if ( $location ) : ?>
                <div>
                  <div class="text-xs text-gray-600 mb-1">LOCATION</div>
                  <div class="text-sm text-gray-900"><?php echo esc_html( $location ); ?></div>
                </div>
              <?php endif; ?>
            <div>
              <div class="text-xs text-gray-600 mb-1">EVENT TYPE</div>
              <div class="text-sm text-gray-900"><?php echo esc_html( $event_type_list ? $event_type_list : $event_type_label ); ?></div>
            </div>
          </div>

          <!-- Application requirement card (toggle via ACF) -->
            <?php if ( $application_required ) : ?>
              <div class="bg-white border-2 border-gray-400 p-6 space-y-4 rounded-lg">
                <p class="text-sm text-gray-700">
                  Application required before attending
                </p>
                <a class="w-full cwp-btn cwp-btn--secondary" href="<?php echo esc_url( home_url( '/apply/' ) ); ?>">
                  Apply Now
                </a>
              </div>
            <?php endif; ?>

          <!-- Contact card -->
          <div class="bg-white border-2 border-gray-400 p-6 space-y-4 rounded-lg">
            <p class="text-sm text-gray-700">
              Have questions?
            </p>
            <a class="w-full cwp-btn cwp-btn--secondary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
              Contact Us
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- RELATED EVENTS -->
    <section class="bg-gray-100 py-16">
      <div class="max-w-7xl mx-auto px-8">
        <h2 class="text-2xl font-bold mb-8 text-gray-900">Upcoming Retreats</h2>
        <?php
        // Related events loop (exclude current event).
        $related_events = new WP_Query(
          array(
            'post_type' => 'event',
            'post_status' => 'publish',
            'posts_per_page' => 4,
            'post__not_in' => array( $event_id ),
            'no_found_rows' => true,
          )
        );
        ?>
        <?php if ( $related_events->have_posts() ) : ?>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php while ( $related_events->have_posts() ) : $related_events->the_post(); ?>
              <?php
                  $related_start = function_exists( 'get_field' ) ? get_field( 'start_date', get_the_ID() ) : '';
                  $related_end = function_exists( 'get_field' ) ? get_field( 'end_date', get_the_ID() ) : '';
                  $related_start_formatted = $related_start ? $format_date_value( $related_start ) : '';
                  $related_end_formatted = $related_end ? $format_date_value( $related_end ) : '';
                  if ( $related_start_formatted && $related_end_formatted && $related_end_formatted !== $related_start_formatted ) {
                    $related_date = $related_start_formatted . ' → ' . $related_end_formatted;
                  } elseif ( $related_start_formatted ) {
                    $related_date = $related_start_formatted;
                  } elseif ( $related_end_formatted ) {
                    $related_date = $related_end_formatted;
                  } else {
                    $related_date = get_the_date();
                  }
                ?>
              <div class="bg-white border border-gray-300 rounded-lg">
                <div class="w-full aspect-video bg-gray-300 overflow-hidden rounded-t-lg">
                  <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'large', array( 'class' => 'h-full w-full object-cover' ) ); ?>
                  <?php endif; ?>
                </div>
                <div class="p-4 space-y-2">
                  <h3 class="font-bold text-gray-900"><?php the_title(); ?></h3>
                  <p class="text-sm text-gray-600"><?php echo esc_html( $related_date ); ?></p>
                  <a class="w-full cwp-btn cwp-btn--secondary" href="<?php the_permalink(); ?>">
                    Learn More
                  </a>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        <?php else : ?>
          <p class="text-gray-600">No upcoming events yet.</p>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </section>

  <?php endwhile; ?>
<?php endif; ?>

<?php
get_footer();



