<?php
$events_query_args = isset( $events_query_args ) && is_array( $events_query_args )
  ? $events_query_args
  : array(
    'post_type' => 'event',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'no_found_rows' => true,
    'meta_key' => 'start_date',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
  );

$events_grid_classes = isset( $events_grid_classes ) && $events_grid_classes
  ? $events_grid_classes
  : 'grid md:grid-cols-2 gap-8';

$reserve_fallback_url = isset( $reserve_fallback_url ) ? $reserve_fallback_url : '';

$events_empty_message = isset( $events_empty_message ) && $events_empty_message
  ? $events_empty_message
  : 'No events scheduled yet. Check back soon.';

$events_query = new WP_Query( $events_query_args );
?>

<div class="<?php echo esc_attr( $events_grid_classes ); ?>">
  <?php if ( $events_query->have_posts() ) : ?>
    <?php while ( $events_query->have_posts() ) : ?>
      <?php
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
      $full_product_value = function_exists( 'get_field' ) ? get_field( 'full_product_id' ) : '';
      $full_product_id = 0;
      if ( $full_product_value instanceof WP_Post ) {
        $full_product_id = $full_product_value->ID;
      } elseif ( is_array( $full_product_value ) ) {
        $first_product = reset( $full_product_value );
        if ( $first_product instanceof WP_Post ) {
          $full_product_id = $first_product->ID;
        } elseif ( is_array( $first_product ) && isset( $first_product['ID'] ) ) {
          $full_product_id = (int) $first_product['ID'];
        } elseif ( is_numeric( $first_product ) ) {
          $full_product_id = (int) $first_product;
        }
      } elseif ( is_numeric( $full_product_value ) ) {
        $full_product_id = (int) $full_product_value;
      }

      $reserve_spot_url = $full_product_id
        ? home_url( '/checkout/?add-to-cart=' . $full_product_id )
        : ( $reserve_fallback_url ? $reserve_fallback_url : get_permalink() );

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
            <div>
              <p class="text-gray-500 uppercase tracking-wider text-xs mb-1">Dates</p>
              <p class="text-gray-900"><?php echo esc_html( $event_date_range ); ?></p>
            </div>
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
            <div>
              <p class="text-gray-500 uppercase tracking-wider text-xs mb-1">Location</p>
              <p class="text-gray-900">Sedona, Arizona</p>
            </div>

            <?php if ( $capacity ) : ?>
              <div>
                <p class="text-gray-500 uppercase tracking-wider text-xs mb-1">Availability</p>
                <p class="text-gray-900">
                  <?php echo esc_html( $capacity . ' ' . ( 1 === $capacity ? 'spot' : 'spots' ) . ' available' ); ?>
                </p>
              </div>
            <?php endif; ?>
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
            <a class="csv-btn csv-btn--secondary" href="<?php echo esc_url( $reserve_spot_url ); ?>">Reserve Your Spot</a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  <?php else : ?>
    <p class="text-gray-700 text-center md:col-span-2">
      <?php echo esc_html( $events_empty_message ); ?>
    </p>
  <?php endif; ?>

  <?php wp_reset_postdata(); ?>
</div>
