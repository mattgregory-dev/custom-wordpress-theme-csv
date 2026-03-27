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
      // Sidebar Google Map data from the ACF `google_map` field.
      $map_location = null;
      $map_address = '';
      $map_address_query = '';
      $map_field_used = '';
      $map_directions_url = '';
      $map_view_url = '';
      // Pull the Google Map field from ACF (lat/lng/address) for the sidebar map.
      if ( $acf_available ) {
        $map_field = 'google_map';
        $map_value = get_field( $map_field, $event_id );
        if (
          is_array( $map_value ) &&
          isset( $map_value['lat'], $map_value['lng'] ) &&
          $map_value['lat'] !== '' &&
          $map_value['lng'] !== ''
        ) {
          $map_location = $map_value;
          $map_field_used = $map_field;
          // Build a formatted address from the Google Map field segments.
          $street_number = isset( $map_location['street_number'] ) ? (string) $map_location['street_number'] : '';
          $street_name = isset( $map_location['street_name'] ) ? (string) $map_location['street_name'] : '';
          $city = isset( $map_location['city'] ) ? (string) $map_location['city'] : '';
          $state = isset( $map_location['state'] ) ? (string) $map_location['state'] : '';
          $post_code = isset( $map_location['post_code'] ) ? (string) $map_location['post_code'] : '';

          $line_one = trim( $street_number . ' ' . $street_name );
          $line_two = trim( $city . ( $city && $state ? ', ' : '' ) . $state . ( $post_code ? ' ' . $post_code : '' ) );

          if ( $line_one || $line_two ) {
            $map_address = trim( $line_one . "\n" . $line_two );
            $map_address_query = trim( $line_one . ( $line_two ? ', ' . $line_two : '' ) );
          } elseif ( ! empty( $map_location['address'] ) ) {
            $map_address = (string) $map_location['address'];
            $map_address_query = trim( str_replace( array( "\r\n", "\r", "\n" ), ', ', $map_address ) );
          }

          $map_lat = isset( $map_location['lat'] ) ? (string) $map_location['lat'] : '';
          $map_lng = isset( $map_location['lng'] ) ? (string) $map_location['lng'] : '';
          $place_id = isset( $map_location['place_id'] ) ? (string) $map_location['place_id'] : '';
          if ( $map_lat !== '' && $map_lng !== '' ) {
            $map_directions_url = 'https://www.google.com/maps/dir/?api=1&destination=' . rawurlencode( $map_lat . ',' . $map_lng ) . '&zoom=14';
          }
          if ( $map_address_query && $map_lat !== '' && $map_lng !== '' ) {
            $map_address_slug = urlencode( $map_address_query );
            $map_address_slug = str_replace( '%2C', ',', $map_address_slug );
            $map_view_url = 'https://www.google.com/maps/place/' . $map_address_slug . '/@' . rawurlencode( $map_lat . ',' . $map_lng . ',14z' );
          } elseif ( $map_address_query ) {
            $map_view_url = 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode( $map_address_query );
          } elseif ( $map_lat !== '' && $map_lng !== '' ) {
            $map_view_url = 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode( $map_lat . ',' . $map_lng );
          }
        }
      }

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
      $duration_days = $duration_raw !== '' ? (int) $duration_raw : 0;

      $date_range = $start_date;
      if ( $start_date && $end_date && $end_date !== $start_date ) {
        $date_range = $start_date . ' - ' . $end_date;
      } elseif ( $end_date && ! $start_date ) {
        $date_range = $end_date;
      }

      $time_range = $start_time;
      if ( $start_time && $end_time ) {
        $time_range = $start_time . ' - ' . $end_time;
      }


      // Checkout links for each payment option.
      $full_checkout_url = $full_product_id ? home_url( '/checkout/?add-to-cart=' . $full_product_id ) : '';
      $deposit_checkout_url = $deposit_product_id ? home_url( '/checkout/?add-to-cart=' . $deposit_product_id ) : '';
      $balance_checkout_url = $balance_product_id ? home_url( '/checkout/?add-to-cart=' . $balance_product_id ) : '';
    ?>

    <!-- EVENT HERO -->
    <section class="bg-gray-200 py-24 page-title">
      <div class="max-w-7xl mx-auto px-8"><!--page-title-container-->
        <div class="max-w-3xl">
          <!-- Event type (taxonomy) -->
          <p class="label"><?php echo esc_html( $event_type_label ); ?></p>
          <!-- Event title -->
          <h1 class="text-5xl mb-6 text-gray-900 leading-snug"><?php the_title(); ?></h1>
          <!-- Short summary (excerpt) -->
          <?php if ( has_excerpt() ) : ?>
            <p class="text-lg text-gray-700 mb-4"><?php echo esc_html( get_the_excerpt() ); ?></p>
          <?php endif; ?>
          <!-- Date range -->
          <?php if ( $date_range ) : ?>
            <div class="text-sm text-gray-600">
              <?php echo esc_html( $date_range ); ?>
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
          <?php endif; ?>

          <!-- Overview section (main content) -->
          <section>
            <div class="text-gray-700 post-content">
              <?php the_content(); ?>
            </div>
          </section>

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
                  <?php echo esc_html( $capacity . ' ' . ( 1 === $capacity ? 'spot' : 'spots' ) . ' available' ); ?>
                </div>
              <?php endif; ?>
              <!-- Payment Buttons -->
              <div class="space-y-3 pt-2">
                <a class="w-full csv-btn csv-btn--primary"
                    href="<?php echo esc_url( $full_checkout_url ? $full_checkout_url : '#' ); ?>">
                  <?php if ( $deposit_amount ) : ?>
                    Pay in Full
                  <?php else : ?>
                    Reserve Your Spot
                  <?php endif; ?>
                </a>
                <?php if ( $deposit_amount && $deposit_product_id ) : ?>
                  <a class="w-full csv-btn csv-btn--secondary"
                      href="<?php echo esc_url( $deposit_checkout_url ? $deposit_checkout_url : '#' ); ?>">
                    Pay Deposit
                  </a>
                <?php endif; ?>
              </div>
            </div>

          <!-- Event details card (dates, duration, location, type) -->
          <div class="bg-white border-2 border-gray-400 p-6 space-y-4 rounded-lg">
            <h3 class="font-bold text-gray-900 mb-4">Event Details</h3>
              <?php if ( $date_range ) : ?>
                <div>
                  <div class="text-xs text-gray-600 mb-1">DATES</div>
                  <div class="text-sm text-gray-900"><?php echo esc_html( $date_range ); ?></div>
                </div>
              <?php endif; ?>
              <?php if ( $duration_days ) : ?>
                <div>
                  <div class="text-xs text-gray-600 mb-1">DURATION</div>
                  <div class="text-sm text-gray-900"><?php echo esc_html( $duration_days . ' Days' ); ?></div>
                </div>
              <?php endif; ?>
              <div>
                <div class="text-xs text-gray-600 mb-1">LOCATION</div>
                <div class="text-sm text-gray-900">
                  <?php
                    $display_address = $map_address ? $map_address : 'Sedona, AZ';
                    echo wp_kses( nl2br( esc_html( $display_address ) ), array( 'br' => array() ) );
                  ?>
                </div>
                <?php if ( $map_view_url ) : ?>
                  <a class="mt-2 inline-block text-sm font-semibold text-gray-700 hover:text-blue-500" href="<?php echo esc_url( $map_view_url ); ?>" target="_blank" rel="noopener noreferrer">
                    View Map &raquo;
                  </a>
                <?php endif; ?>
              </div>
            <div class="hidden">
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
                <a class="w-full csv-btn csv-btn--secondary" href="<?php echo esc_url( home_url( '/apply/' ) ); ?>">
                  Apply Now
                </a>
              </div>
            <?php endif; ?>

          <!-- Contact card -->
          <div class="bg-white border-2 border-gray-400 p-6 space-y-4 rounded-lg">
            <p class="text-sm text-gray-700">
              Have questions?
            </p>
            <a class="w-full csv-btn csv-btn--secondary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
              Contact Us
            </a>
          </div>

          <?php if ( $map_location ) : ?>
            <!-- Sidebar Google Map (ACF Google Map field) -->
            <div class="bg-white border-2 border-gray-400 p-6 rounded-lg event-sidebar-map">
              <!-- Map container + marker data for JS initialization -->
              <div
                class="acf-map"
                data-zoom="<?php echo esc_attr( isset( $map_location['zoom'] ) ? $map_location['zoom'] : 16 ); ?>"
                data-field="<?php echo esc_attr( $map_field_used ); ?>"
              >
                <div class="marker"
                    data-lat="<?php echo esc_attr( $map_location['lat'] ); ?>"
                    data-lng="<?php echo esc_attr( $map_location['lng'] ); ?>">
                  <?php if ( ! empty( $map_location['address'] ) ) : ?>
                    <p class="text-sm text-gray-700"><?php echo esc_html( $map_location['address'] ); ?></p>
                  <?php endif; ?>
                </div>
              </div>
              <?php if ( $map_directions_url || $map_view_url ) : ?>
                <div class="mt-3 flex items-center justify-between text-sm font-semibold">
                  <?php if ( $map_directions_url ) : ?>
                    <a class="text-gray-700 hover:text-blue-500" href="<?php echo esc_url( $map_directions_url ); ?>" target="_blank" rel="noopener noreferrer">
                      Get Directions
                    </a>
                  <?php endif; ?>
                  <?php if ( $map_view_url ) : ?>
                    <a class="text-gray-700 hover:text-blue-500" href="<?php echo esc_url( $map_view_url ); ?>" target="_blank" rel="noopener noreferrer">
                      View Larger Map
                    </a>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <?php
    $related_events = null;
    $related_term_slugs = array();
    $related_terms = get_the_terms( $event_id, 'event_type' );

    if ( ! empty( $related_terms ) && ! is_wp_error( $related_terms ) ) {
      $allowed_related_terms = array( 'events', 'field-trips' );

      foreach ( $related_terms as $related_term ) {
        if ( in_array( $related_term->slug, $allowed_related_terms, true ) ) {
          $related_term_slugs[] = $related_term->slug;
        }
      }
    }

    if ( $related_term_slugs ) {
      // Related events loop (exclude current event).
      $related_events = new WP_Query(
        array(
          'post_type' => 'event',
          'post_status' => 'publish',
          'posts_per_page' => 4,
          'post__not_in' => array( $event_id ),
          'no_found_rows' => true,
          'meta_key' => 'start_date',
          'orderby' => 'meta_value_num',
          'order' => 'ASC',
          'tax_query' => array(
            array(
              'taxonomy' => 'event_type',
              'field' => 'slug',
              'terms' => $related_term_slugs,
            ),
          ),
        )
      );
    }
    ?>

    <?php if ( $related_events && $related_events->have_posts() ) : ?>
      <!-- RELATED EVENTS -->
      <section class="bg-gray-300 py-16">
        <div class="max-w-7xl mx-auto px-8">
          <h2 class="text-2xl font-bold mb-8 text-gray-900">Upcoming Retreats</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php while ( $related_events->have_posts() ) : $related_events->the_post(); ?>
              <?php
                  $related_start_raw = function_exists( 'get_field' ) ? get_field( 'start_date', get_the_ID() ) : '';
                  $related_end_raw = function_exists( 'get_field' ) ? get_field( 'end_date', get_the_ID() ) : '';
                  $related_start_ts = $related_start_raw ? strtotime( (string) $related_start_raw ) : 0;
                  $related_end_ts = $related_end_raw ? strtotime( (string) $related_end_raw ) : 0;
                  $related_date = '';

                  if ( $related_start_ts && $related_end_ts ) {
                    $start_month = date( 'F', $related_start_ts );
                    $start_day = date( 'j', $related_start_ts );
                    $end_month = date( 'F', $related_end_ts );
                    $end_day = date( 'j', $related_end_ts );

                    if ( $start_month === $end_month ) {
                      $related_date = $start_month . ' ' . $start_day . '-' . $end_day;
                    } else {
                      $related_date = $start_month . ' ' . $start_day . '-' . $end_month . ' ' . $end_day;
                    }
                  } elseif ( $related_start_ts ) {
                    $related_date = date( 'F j', $related_start_ts );
                  } elseif ( $related_end_ts ) {
                    $related_date = date( 'F j', $related_end_ts );
                  } else {
                    $related_date = get_the_date();
                  }
                ?>
              <div class="bg-white border border-gray-300 rounded-lg soft-shadow flex flex-col">
                <div class="w-full aspect-video bg-gray-300 overflow-hidden rounded-t-lg">
                  <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'large', array( 'class' => 'h-full w-full object-cover' ) ); ?>
                  <?php endif; ?>
                </div>
                <div class="flex min-h-[165px] flex-col p-4">
                  <h3 class="font-bold text-gray-900"><?php the_title(); ?></h3>
                  <p class="text-sm text-gray-600 mt-2"><?php echo esc_html( $related_date ); ?></p>
                  <a class="mt-auto w-full csv-btn csv-btn--secondary small" href="<?php the_permalink(); ?>">
                    Learn More
                  </a>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
      </section>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>

  <?php endwhile; ?>
<?php endif; ?>

<?php
get_footer();
