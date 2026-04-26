<?php
$menu_args = isset( $args ) && is_array( $args ) ? $args : array();
$menu_classes = array( 'side-menu', 'menu-drawer' );

if ( isset( $menu_args['header_color'] ) && $menu_args['header_color'] === 'white' ) {
  $menu_classes[] = 'white';
}

$menu_class = implode( ' ', $menu_classes );
$cart_count = 0;
if ( function_exists( 'WC' ) && WC()->cart ) {
  $cart_count = (int) WC()->cart->get_cart_contents_count();
}

$csv_get_menu_items = static function ( $location_key ) {
  $items = array();
  $locations = get_nav_menu_locations();
  if ( ! isset( $locations[ $location_key ] ) ) {
    return $items;
  }

  $raw_items = wp_get_nav_menu_items( (int) $locations[ $location_key ] );
  if ( ! is_array( $raw_items ) ) {
    return $items;
  }

  foreach ( $raw_items as $item ) {
    if ( (int) $item->menu_item_parent !== 0 ) {
      continue;
    }
    if ( isset( $item->post_status ) && $item->post_status !== 'publish' ) {
      continue;
    }
    $items[] = $item;
  }

  return $items;
};

$mobile_items = $csv_get_menu_items( 'mobile' );
$mobile_about_items = $csv_get_menu_items( 'mobile-about' );

if ( empty( $mobile_items ) ) {
  $fallback_items = array(
    array( 'title' => 'Courses', 'url' => home_url( '/courses/' ) ),
    array( 'title' => 'Live Group Classes', 'url' => home_url( '/live-group-classes/' ) ),
    array( 'title' => 'Study With Feather', 'url' => home_url( '/study-with-feather/' ) ),
    array( 'title' => 'Field Trip', 'url' => home_url( '/field-trips/' ) ),
    array( 'title' => 'About', 'url' => home_url( '/about/' ) ),
  );

  foreach ( $fallback_items as $fallback_item ) {
    $mobile_items[] = (object) array(
      'title' => $fallback_item['title'],
      'url' => $fallback_item['url'],
    );
  }
}

$account_label = is_user_logged_in() ? 'My Account' : 'Login';
$account_url = home_url( '/account/' );
?>

<nav data-menu="mobileMenu" class="<?php echo esc_attr( $menu_class ); ?>" data-lenis-prevent aria-hidden="true">
  <div class="drawer-top-stripe"></div>

  <div class="menu-btns">
    <button id="mobileCloseBtn" class="close-btn" type="button" aria-label="Close navigation"></button>
  </div>

  <div class="drawer-inner">
    <div class="drawer-header">
      <div class="drawer-brand-name"><?php bloginfo( 'name' ); ?></div>
      <div class="drawer-brand-sub">Herbalist</div>
    </div>

    <div class="nav-section">
      <div class="nav-label">Learn</div>

      <?php foreach ( $mobile_items as $item ) : ?>
        <?php
        $title = isset( $item->title ) ? (string) $item->title : '';
        $url = isset( $item->url ) ? (string) $item->url : '#';
        $is_field_trip = stripos( $title, 'field trip' ) !== false;
        ?>
        <a href="<?php echo esc_url( $url ); ?>" class="nav-item">
          <span class="nav-item-title">
            <?php echo esc_html( $title ); ?>
            <?php if ( $is_field_trip ) : ?>
              <span class="nav-badge">Sedona, 4 Days</span>
            <?php endif; ?>
          </span>
          <span class="nav-arrow" aria-hidden="true">›</span>
        </a>
      <?php endforeach; ?>

      <hr class="nav-divider">

      <?php if ( ! empty( $mobile_about_items ) ) : ?>
        <?php foreach ( $mobile_about_items as $item ) : ?>
          <?php
          $title = isset( $item->title ) ? (string) $item->title : '';
          $url = isset( $item->url ) ? (string) $item->url : '#';
          ?>
          <a href="<?php echo esc_url( $url ); ?>" class="nav-item">
            <span class="nav-item-title"><?php echo esc_html( $title ); ?></span>
            <span class="nav-arrow" aria-hidden="true">›</span>
          </a>
        <?php endforeach; ?>
      <?php endif; ?>

    </div>

    <hr class="nav-divider">

    <div class="drawer-actions">
      <a href="<?php echo esc_url( home_url( '/cart/' ) ); ?>" class="action-btn action-btn-outline">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
        Cart
      </a>
      <a href="<?php echo esc_url( $account_url ); ?>" class="action-btn action-btn-outline">
        <?php echo esc_html( $account_label ); ?>
      </a>
    </div>
    <div class="drawer-footer">
      <div class="footer-label">Find Feather</div>
      <div class="social-row">
        <a href="https://www.facebook.com/profile.php?id=100064034190506" class="social-btn" aria-label="Follow on Facebook" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M22 12.07C22 6.51 17.52 2 12 2S2 6.51 2 12.07c0 5.02 3.66 9.17 8.44 9.93v-7.03H7.9V12.07h2.54V9.85c0-2.52 1.49-3.91 3.78-3.91 1.1 0 2.24.2 2.24.2v2.47H15.2c-1.25 0-1.64.78-1.64 1.58v1.88h2.79l-.45 2.9h-2.34V22c4.78-.76 8.44-4.91 8.44-9.93z"/>
          </svg>
        </a>
        <a href="https://www.instagram.com/jones.feather/" class="social-btn" aria-label="Follow on Instagram" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
        </a>
        <a href="https://www.youtube.com/@featherjonescanyonspiritbo5336" class="social-btn" aria-label="Follow on YouTube" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M23.5 6.2a2.98 2.98 0 00-2.1-2.11C19.53 3.5 12 3.5 12 3.5s-7.53 0-9.4.59A2.98 2.98 0 00.5 6.2 31.1 31.1 0 000 12a31.1 31.1 0 00.5 5.8 2.98 2.98 0 002.1 2.11c1.87.59 9.4.59 9.4.59s7.53 0 9.4-.59a2.98 2.98 0 002.1-2.11A31.1 31.1 0 0024 12a31.1 31.1 0 00-.5-5.8zM9.75 15.5v-7l6.25 3.5-6.25 3.5z"/>
          </svg>
        </a>
      </div>
    </div>
  </div>
</nav>
<div class="overlay menu-overlay"></div>
