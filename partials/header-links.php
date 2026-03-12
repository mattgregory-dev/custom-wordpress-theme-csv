<?php /*
  <nav class="header-nav">
    <?php
    wp_nav_menu( array(
        'theme_location' => 'primary',
        'container' => false,
        'menu_class' => 'primary-nav',
        'fallback_cb' => '__return_false',
    ) );
    ?>
  </nav>
*/ ?>

<nav class="main-menu">
  <ul>
    <li class="no-sub-menu">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <span class="menu-item">Home</span>
        <span class="menu-item2">Home</span>
      </a>
    </li>

    <li class="no-sub-menu">
      <a href="<?php echo esc_url( home_url( '/retreats/' ) ); ?>">
        <span class="menu-item">Retreats</span>
        <span class="menu-item2">Retreats</span>
      </a>
    </li>

    <li>
      <a href="#">
        <span class="menu-item">Your Journey</span>
        <span class="menu-item2">Your Journey</span>
      </a>
      <ul class="sub-menu">
        <li><a href="<?php echo esc_url( home_url( '/orientation/' ) ); ?>">Orientation</a></li>
        <li><a href="<?php echo esc_url( home_url( '/intentions/' ) ); ?>">Intentions</a></li>
        <li><a href="<?php echo esc_url( home_url( '/preparation/' ) ); ?>">Preparation</a></li>
        <li><a href="<?php echo esc_url( home_url( '/ceremony/' ) ); ?>">The Ceremony</a></li>
        <li><a href="<?php echo esc_url( home_url( '/integration/' ) ); ?>">Integration</a></li>
        <li><a href="<?php echo esc_url( home_url( '/safety/' ) ); ?>">Safety</a></li>
      </ul>
    </li>



    <li class="no-sub-menu">
      <a href="<?php echo esc_url( home_url( '/approach/' ) ); ?>">
        <span class="menu-item">Approach</span>
        <span class="menu-item2">Approach</span>
      </a>
    </li>

    <li class="no-sub-menu">
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
        <span class="menu-item">Contact</span>
        <span class="menu-item2">Contact</span>
      </a>
    </li>
  </ul>
</nav>

<div class="btn-box">
  <a href="#" class="popup-search hidden" data-popup="1">
    <i class="fa fa-search"></i>
  </a>
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="login-btn hidden">
    <i class="fa fa-user"></i>login
  </a>
  <a href="<?php echo esc_url( home_url( '/apply/' ) ); ?>" class="ibt-btn ibt-btn-outline-3 ibt-btn-rounded">
    <span>Apply</span>
  </a>
</div>