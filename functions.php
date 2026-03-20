<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function cwp_is_vite_dev() {
  return defined('CUSTOM_WP_VITE_DEV') && CUSTOM_WP_VITE_DEV;
}

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

// Add WooCommerce theme support.
function cwp_add_woocommerce_support() {
  add_theme_support( 'woocommerce' );
  // add_theme_support( 'wc-product-gallery-zoom' );
  // add_theme_support( 'wc-product-gallery-lightbox' );
  // add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'cwp_add_woocommerce_support' );

// Dequeue Woocommerce stylesheets
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

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
