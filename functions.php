<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function cwp_is_vite_dev() {
  return defined('CUSTOM_WP_VITE_DEV') && CUSTOM_WP_VITE_DEV;
}

// Enqueue either Vite dev assets or the built /dist assets.
function cwp_assets() {
  $theme_uri = get_template_directory_uri();
  $dist = $theme_uri . '/dist';

  // Toggle with: define('CUSTOM_WP_VITE_DEV', true); in wp-config.php
  $use_vite = cwp_is_vite_dev();

  if ( $use_vite ) {
    // Vite dev server (no SSL, local container).
    $vite = 'http://localhost:5175';

    // Ensure dev scripts are output as ES modules.
    add_filter( 'script_loader_tag', function ( $tag, $handle, $src ) {
      $module_handles = array( 'vite-client', 'cwp-main' );
      if ( in_array( $handle, $module_handles, true ) ) {
        return '<script type="module" src="' . esc_url( $src ) . '"></script>';
      }
      return $tag;
    }, 10, 3 );

    // Vite HMR client.
    wp_enqueue_script( 'vite-client', $vite . '/@vite/client', array(), null, false );
    wp_script_add_data( 'vite-client', 'type', 'module' );

    // Main JS entry served by Vite (imports SCSS in dev).
    wp_enqueue_script( 'cwp-main', $vite . '/main.js', array(), null, false );
    wp_script_add_data( 'cwp-main', 'type', 'module' );

    // Static stylesheet served from Vite public/ during dev.
    wp_enqueue_style( 'cwp-tailwind', $vite . '/tailwind.css', array(), null );

    return;
  }

  // Static stylesheet (not processed by Vite).
  wp_enqueue_style( 'cwp-tailwind', $dist . '/tailwind.css', array(), null );
  // Main compiled CSS bundle.
  wp_enqueue_style( 'cwp-main', $dist . '/assets/main.css', array( 'cwp-tailwind' ), null );

  // Main JS bundle (ES module).
  wp_enqueue_script( 'cwp-main', $dist . '/main.js', array(), null, true );

  wp_script_add_data( 'cwp-main', 'type', 'module' );
}
add_action( 'wp_enqueue_scripts', 'cwp_assets', 999 );

// Ensure Vite-built block scripts load as ES modules.
function cwp_block_module_scripts( $tag, $handle, $src ) {
  if ( false !== strpos( $src, '/dist/blocks/' ) ) {
    return '<script type="module" src="' . esc_url( $src ) . '"></script>';
  }
  return $tag;
}
add_filter( 'script_loader_tag', 'cwp_block_module_scripts', 10, 3 );

// Register navigation menus
function cwp_setup() {
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );

  register_nav_menus( array(
      'primary' => 'Primary Menu',
      'footer' => 'Footer Menu',
      'mobile' => 'Mobile Menu',
  ) );
}
add_action( 'after_setup_theme', 'cwp_setup' );

// ACF Google Maps API key (method 1: filter).
function cwp_acf_google_map_api( $api ) {
  $api['key'] = 'AIzaSyBhXc-P0oJLSCbmNRnLOO-Q5XnjcpISEQs';
  return $api;
}
add_filter( 'acf/fields/google_map/api', 'cwp_acf_google_map_api' );

//////////////////////////////////////////////////
////////////////// Woocommerce ///////////////////
//////////////////////////////////////////////////

// Add WooCommerce theme support.
function cwp_add_woocommerce_support() {
  add_theme_support( 'woocommerce' );
  // add_theme_support( 'wc-product-gallery-zoom' );
  // add_theme_support( 'wc-product-gallery-lightbox' );
  // add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'cwp_add_woocommerce_support' );

// Cart/Checkout blocks: link cart items back to the related Event (ACF: event_post).
add_filter( 'woocommerce_cart_item_permalink', function( $permalink, $cart_item, $cart_item_key ) {
  if ( ! function_exists( 'get_field' ) || empty( $cart_item['data'] ) ) {
    return $permalink;
  }

  $product = $cart_item['data'];
  $product_id = $product->get_id();

  if ( $product->is_type( 'variation' ) ) {
    $product_id = $product->get_parent_id();
  }

  $event_id = get_field( 'event_post', $product_id );
  if ( $event_id ) {
    return get_permalink( $event_id );
  }

  return $permalink;
}, 10, 3 );

// Remove Downloads from My Account navigation.
add_filter( 'woocommerce_account_menu_items', function( $items ) {
  unset( $items['downloads'] );
  return $items;
} );

// Rename "Browse products" to "View Retreats" on My Account notices.
add_filter( 'gettext', function( $translated, $text, $domain ) {
  if ( 'woocommerce' !== $domain ) {
    return $translated;
  }

  if ( 'Browse products' === $text && is_page( 'my-account' ) ) {
    return 'View Retreats';
  }

  return $translated;
}, 10, 3 );

// Point "return to shop" links to Retreats.
add_filter( 'woocommerce_return_to_shop_redirect', function( $url ) {
  return home_url( '/retreats/' );
} );

// function cwp_wc_is_cart_or_checkout() {
//   $is_cart = function_exists( 'is_cart' ) && is_cart();
//   $is_checkout = function_exists( 'is_checkout' ) && is_checkout();
//   $is_account = is_page( 'my-account' );
//   return $is_cart || $is_checkout || $is_account;
// }

// // Disable WooCommerce Blocks assets everywhere except cart/checkout.
// add_filter( 'woocommerce_should_load_block_assets', function( $should_load ) {
//   return cwp_wc_is_cart_or_checkout();
// } );
// add_filter( 'woocommerce_should_load_block_styles', function( $should_load ) {
//   return cwp_wc_is_cart_or_checkout();
// } );

// // Remove script prefetch hints on the front page.
// add_filter( 'wp_resource_hints', function( $urls, $relation_type ) {
//   if ( 'prefetch' !== $relation_type ) {
//     return $urls;
//   }

//   if ( ! is_admin() ) {
//     return array();
//   }

//   return $urls;
// }, 999, 2 );

// // Dequeue all WooCommerce assets (styles + scripts).
// function cwp_dequeue_woocommerce_assets() {
//   if ( ! is_admin() && cwp_wc_is_cart_or_checkout() ) {
//     return;
//   }

//   $style_handles = array(
//     'woocommerce-general',
//     'woocommerce-layout',
//     'woocommerce-smallscreen',
//     'woocommerce-inline',
//     'woocommerce-block-style',
//     'wc-block-style',
//     'wc-blocks-vendors-style',
//     'wc-blocks-style',
//     'select2',
//     'selectWoo',
//     'woocommerce-select2',
//     'photoswipe',
//     'photoswipe-default-skin',
//     'wc-photoswipe',
//     'wc-photoswipe-lightbox',
//   );

//   foreach ( $style_handles as $handle ) {
//     wp_dequeue_style( $handle );
//     wp_deregister_style( $handle );
//   }

//   $script_handles = array(
//     'wc-jquery-blockui',
//     'jquery-blockui',
//     'wc-add-to-cart',
//     'wc-add-to-cart-variation',
//     'wc-cart',
//     'wc-cart-fragments',
//     'wc-checkout',
//     'wc-single-product',
//     'wc-single-product-block',
//     'woocommerce',
//     'woocommerce-add-to-cart',
//     'woocommerce-cart',
//     'woocommerce-checkout',
//     'woocommerce-cart-fragments',
//     'wc-js-cookie',
//     'sourcebuster-js',
//     'wc-order-attribution',
//     'jquery-ui-datepicker',
//     'selectWoo',
//     'select2',
//     'photoswipe',
//     'photoswipe-ui-default',
//     'wc-price-slider',
//     'wc-credit-card-form',
//     'wc-address-i18n',
//     'wc-country-select',
//   );

//   foreach ( $script_handles as $handle ) {
//     wp_dequeue_script( $handle );
//     wp_deregister_script( $handle );
//   }

//   // if ( ! is_admin() && ! cwp_wc_is_cart_or_checkout() ) {
//   //   wp_dequeue_script( 'jquery' );
//   //   wp_dequeue_script( 'jquery-core' );
//   //   wp_dequeue_script( 'jquery-migrate' );
//   //   wp_deregister_script( 'jquery' );
//   //   wp_deregister_script( 'jquery-core' );
//   //   wp_deregister_script( 'jquery-migrate' );
//   // }
// }
// add_action( 'wp_enqueue_scripts', 'cwp_dequeue_woocommerce_assets', 100 );
// add_action( 'enqueue_block_assets', 'cwp_dequeue_woocommerce_assets', 100 );
// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

//////////////////////////////////////////////////
/////////// Remove WordPress features ////////////
//////////////////////////////////////////////////
function cwp_cleanup_head() {
  remove_action( 'wp_head', 'rsd_link' );
  remove_action( 'wp_head', 'wlwmanifest_link' );
  remove_action( 'wp_head', 'wp_shortlink_wp_head' );
  remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );
  remove_action( 'wp_head', 'wp_generator' );
}
add_action( 'after_setup_theme', 'cwp_cleanup_head' );

function cwp_dequeue_styles() {
  remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
  remove_action( 'wp_footer', 'wp_global_styles_render_svg_filters', 1 );
  remove_action( 'wp_footer', 'wp_global_styles_render_svg_filters', 9 );
}
add_action( 'wp_enqueue_scripts', 'cwp_dequeue_styles', 20 );

function cwp_disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  add_filter( 'tiny_mce_plugins', 'cwp_disable_emoji_tinymce' );
  add_filter( 'wp_resource_hints', 'cwp_disable_emoji_dns_prefetch', 10, 2 );
}
add_action( 'after_setup_theme', 'cwp_disable_emojis' );

function cwp_disable_emoji_tinymce( $plugins ) {
  return is_array( $plugins ) ? array_diff( $plugins, array( 'wpemoji' ) ) : array();
}

function cwp_disable_emoji_dns_prefetch( $urls, $relation_type ) {
  if ( 'dns-prefetch' === $relation_type ) {
    $urls = array_diff( $urls, array( '//s.w.org' ) );
  }
  return $urls;
}

// Remove titles from WordPress upon import
add_filter('wp_insert_attachment_data', function ($data, $postarr) {
    // Prevent auto-titling from filename (keep blank unless user sets it)
    if (!empty($data['post_title']) && !empty($postarr['file'])) {
        $filename = pathinfo($postarr['file'], PATHINFO_FILENAME);

        // If title equals filename-derived title, blank it out
        $normalized_title = sanitize_title($data['post_title']);
        $normalized_file  = sanitize_title($filename);

        if ($normalized_title === $normalized_file) {
            $data['post_title'] = '';
        }
    }

    // Optional: also clear caption if it's being auto-set somewhere
    if (!empty($data['post_excerpt'])) {
        $data['post_excerpt'] = '';
    }

    return $data;
}, 10, 2);

// Conveinent way to keep copyright updated
function shortcode_current_year() {
    return date('Y');
}
add_shortcode('current_year', 'shortcode_current_year');

// Register Gutenburg custom blocks
function theme_register_blocks() {
    register_block_type( __DIR__ . '/blocks/hero');
    register_block_type( __DIR__ . '/blocks/next-step');
}
add_action( 'init', 'theme_register_blocks' );

/*
function cwp_cleanup_head() {
  remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
  remove_action( 'wp_head', 'wp_oembed_add_host_js' );
}
add_action( 'after_setup_theme', 'cwp_cleanup_head' );

function cwp_disable_oembed() {
  wp_deregister_script( 'wp-embed' );
  add_filter( 'embed_oembed_discover', '__return_false' );
  remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
  remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
  remove_action( 'wp_head', 'wp_oembed_add_host_js' );
}
add_action( 'init', 'cwp_disable_oembed', 20 );
*/

//////////////////////////////////////////////////////////////////
///////////// [START: FOR DEVELOPMENT ONLY] //////////////////////
//////////////////////////////////////////////////////////////////

/*
function cwp_dev_disable_block_editor() {
  if ( ! cwp_is_vite_dev() ) {
    return;
  }

  add_filter( 'use_block_editor_for_post', '__return_false', 100 );
  add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );
  remove_theme_support( 'core-block-patterns' );
}
add_action( 'after_setup_theme', 'cwp_dev_disable_block_editor', 1 );

function cwp_dev_disable_oembed() {
  if ( ! cwp_is_vite_dev() ) {
    return;
  }

  remove_action( 'rest_api_init', 'wp_oembed_register_route' );
}
add_action( 'init', 'cwp_dev_disable_oembed', 1 );

function cwp_dev_prevent_block_assets() {
  if ( ! cwp_is_vite_dev() ) {
    return;
  }

  add_filter( 'should_load_block_editor_scripts_and_styles', '__return_false' );
  add_filter( 'wp_should_load_block_editor_scripts_and_styles', '__return_false' );

  remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
  remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );

  remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
  remove_action( 'wp_footer', 'wp_global_styles_render_svg_filters', 1 );
  remove_action( 'wp_footer', 'wp_global_styles_render_svg_filters', 9 );
}
add_action( 'wp_enqueue_scripts', 'cwp_dev_prevent_block_assets', 1 );

function cwp_dev_dequeue_block_assets() {
  if ( ! cwp_is_vite_dev() ) {
    return;
  }

  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'wp-block-library-theme' );
  wp_dequeue_style( 'wc-block-style' );
  wp_dequeue_style( 'global-styles' );
  wp_dequeue_style( 'classic-theme-styles' );
}
add_action( 'wp_enqueue_scripts', 'cwp_dev_dequeue_block_assets', 100 );
*/

//////////////////////////////////////////////////////////////////
///////////// [END: FOR DEVELOPMENT ONLY] ////////////////////////
//////////////////////////////////////////////////////////////////
