<nav class="main-menu">
  <ul>
    <li class="no-sub-menu hidden">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <span class="menu-item">Home</span>
        <span class="menu-item2">Home</span>
      </a>
    </li>

    <li class="no-sub-menu">
      <a href="<?php echo esc_url( home_url( '/courses/' ) ); ?>">
        <span class="menu-item">Courses</span>
        <span class="menu-item2">Courses</span>
      </a>
    </li>

    <li class="no-sub-menu">
      <a href="<?php echo esc_url( home_url( '/live-group-classes/' ) ); ?>">
        <span class="menu-item">Live Group Classes</span>
        <span class="menu-item2">Live Group Classes</span>
      </a>
    </li>

    <li class="no-sub-menu">
      <a href="<?php echo esc_url( home_url( '/study-with-feather/' ) ); ?>">
        <span class="menu-item">Study With Feather</span>
        <span class="menu-item2">Study With Feather</span>
      </a>
    </li>

    <li class="no-sub-menu">
      <a href="<?php echo esc_url( home_url( '/field-trips/' ) ); ?>">
        <span class="menu-item">Field Trip</span>
        <span class="menu-item2">Field Trip</span>
      </a>
    </li>

    <li class="no-sub-menu">
      <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">
        <span class="menu-item">About</span>
        <span class="menu-item2">About</span>
      </a>
    </li>

  </ul>
</nav>

<div class="btn-box">
  <a href="#" class="popup-search hidden" data-popup="1">
    <i class="fa fa-search"></i>
  </a>

  <?php
  $cart_count = 0;
  if ( function_exists( 'WC' ) && WC()->cart ) {
    $cart_count = (int) WC()->cart->get_cart_contents_count();
  }
  ?>
  <?php if ( $cart_count > 0 ) : ?>

    <?php if ( is_user_logged_in() ) : ?>
      <a href="<?php echo esc_url( home_url( '/account/' ) ); ?>" class="login-btn">
        <span>Account</span>
      </a>
    <?php else : ?>
      <a href="<?php echo esc_url( home_url( '/account/' ) ); ?>" class="login-btn">
        <span>Login</span>
      </a>
    <?php endif; ?>
    <a href="<?php echo esc_url( home_url( '/cart/' ) ); ?>" class="ibt-btn ibt-btn-outline-3 ibt-btn-rounded">
      <i class="fa fa-solid fa-cart-shopping"></i><span>Cart</span>
    </a>

  <?php else : ?>

    <a href="<?php echo esc_url( home_url( '/cart/' ) ); ?>" class="login-btn">
      <i class="fa fa-solid fa-cart-shopping"></i><span>Cart</span>
    </a>
    <?php if ( is_user_logged_in() ) : ?>
      <a href="<?php echo esc_url( home_url( '/account/' ) ); ?>" class="ibt-btn ibt-btn-outline-3 ibt-btn-rounded">
        <span>Account</span>
      </a>
    <?php else : ?>
      <a href="<?php echo esc_url( home_url( '/account/' ) ); ?>" class="ibt-btn ibt-btn-outline-3 ibt-btn-rounded">
        <span>Login</span>
      </a>
    <?php endif; ?>

  <?php endif; ?>

</div>
