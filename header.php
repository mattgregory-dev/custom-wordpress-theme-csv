<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preload"
      href="<?php echo get_template_directory_uri(); ?>/fonts/lato-400-regular.woff2"
      as="font"
      type="font/woff2"
      crossorigin>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
$is_woocommerce_page = function_exists( 'is_woocommerce' ) && is_woocommerce();
$is_cart_page = function_exists( 'is_cart' ) && is_cart();
$is_checkout_page = function_exists( 'is_checkout' ) && is_checkout();
$is_account_page = function_exists( 'is_account_page' ) && is_account_page();

// if ( ! ( $is_woocommerce_page || $is_cart_page || $is_checkout_page || $is_account_page ) ) {
//   get_template_part( 'partials/preloader' );
// }
?>
<?php /* <button id="themeBtn"><i class="far fa-moon"></i></button> */ ?>
<?php get_template_part('partials/sticky-header') ?>
<?php get_template_part('partials/search-popup') ?>

<?php
$header_args = isset( $args ) && is_array( $args ) ? $args : array();
$header_variant = isset( $header_args['header_variant'] ) ? $header_args['header_variant'] : 'default';
$header_color = isset( $header_args['header_color'] ) ? $header_args['header_color'] : 'default';
$header_classes = array(
  $header_variant === 'absolute' ? 'csv-header-absolute' : 'csv-header-standard',
);

if ( $header_color === 'white' ) {
  $header_classes[] = 'white';
}

$header_class = implode( ' ', $header_classes );
?>
<header class="<?php echo esc_attr( $header_class ); ?>">
  <div class="header-menu-area">
    <div class="flex items-center justify-between">
      <div class="header-logo">
        <?php get_template_part( 'partials/logo' ); ?>
      </div>
      <?php get_template_part( 'partials/header-links' ); ?>
    </div>
    <button class="hamburger popup-menu" data-menu="mobileMenu">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>
</header>
<?php
get_template_part(
  'partials/drawer',
  null,
  array(
    'header_color' => $header_color,
  )
);
?>
<?php if ( function_exists( 'is_checkout' ) && is_checkout() ) : ?>
  <?php get_template_part( 'partials/checkout-cart' ); ?>
<?php endif; ?>
<main id="main-content" class="<?php echo esc_attr( $header_class ); ?>">
