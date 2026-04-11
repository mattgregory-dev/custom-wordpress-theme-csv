<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

//////////////////////////////////////////////////
//////////// Dev & Build Environment /////////////
//////////////////////////////////////////////////

function csv_is_vite_dev() {
  return defined('CUSTOM_WP_VITE_DEV') && CUSTOM_WP_VITE_DEV;
}

// Enqueue either Vite dev assets or the built /dist assets.
function csv_assets() {
  $theme_uri = get_template_directory_uri();
  $dist = $theme_uri . '/dist';

  // Toggle with: define('CUSTOM_WP_VITE_DEV', true); in wp-config.php
  $use_vite = csv_is_vite_dev();

  if ( $use_vite ) {
    // Vite dev server (no SSL, local container).
    $vite = 'http://localhost:5175';

    // Ensure dev scripts are output as ES modules.
    add_filter( 'script_loader_tag', function ( $tag, $handle, $src ) {
      $module_handles = array( 'vite-client', 'csv-main' );
      if ( in_array( $handle, $module_handles, true ) ) {
        return '<script type="module" src="' . esc_url( $src ) . '"></script>';
      }
      return $tag;
    }, 10, 3 );

    // Vite HMR client.
    wp_enqueue_script( 'vite-client', $vite . '/@vite/client', array(), null, false );
    wp_script_add_data( 'vite-client', 'type', 'module' );

    // Main JS entry served by Vite (imports SCSS in dev).
    wp_enqueue_script( 'csv-main', $vite . '/main.js', array(), null, false );
    wp_script_add_data( 'csv-main', 'type', 'module' );

    // Static stylesheet served from Vite public/ during dev.
    wp_enqueue_style( 'csv-tailwind', $vite . '/tailwind.css', array(), null );

    return;
  }

  $main_css_path = get_template_directory() . '/dist/assets/main.css';
  $tailwind_css_path = get_template_directory() . '/dist/tailwind.css';
  $main_js_path = get_template_directory() . '/dist/main.js';
  $main_css_version = file_exists( $main_css_path ) ? filemtime( $main_css_path ) : null;
  $tailwind_css_version = file_exists( $tailwind_css_path ) ? filemtime( $tailwind_css_path ) : null;
  $main_js_version = file_exists( $main_js_path ) ? filemtime( $main_js_path ) : null;

  // Static stylesheet (not processed by Vite).
  wp_enqueue_style( 'csv-tailwind', $dist . '/tailwind.css', array(), $tailwind_css_version );
  // Main compiled CSS bundle.
  wp_enqueue_style( 'csv-main', $dist . '/assets/main.css', array( 'csv-tailwind' ), $main_css_version );

  // Main JS bundle (ES module).
  wp_enqueue_script( 'csv-main', $dist . '/main.js', array(), $main_js_version, true );

  wp_script_add_data( 'csv-main', 'type', 'module' );
}
add_action( 'wp_enqueue_scripts', 'csv_assets', 999 );

// Ensure Vite-built block scripts load as ES modules.
function csv_block_module_scripts( $tag, $handle, $src ) {
  if ( false !== strpos( $src, '/dist/blocks/' ) ) {
    return '<script type="module" src="' . esc_url( $src ) . '"></script>';
  }
  return $tag;
}
add_filter( 'script_loader_tag', 'csv_block_module_scripts', 10, 3 );

//////////////////////////////////////////////////
///////////////// WordPress Theme ////////////////
//////////////////////////////////////////////////

// Register navigation menus
function csv_setup() {
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );

  register_nav_menus( array(
    'primary' => 'Primary Menu',
    'footer' => 'Footer Menu',
    'mobile' => 'Mobile Menu',
  ) );
}
add_action( 'after_setup_theme', 'csv_setup' );

// Conveinent way to keep copyright updated
function shortcode_current_year() {
  return date('Y');
}
add_shortcode('current_year', 'shortcode_current_year');

// Register Gutenburg custom blocks
function theme_register_blocks() {
  register_block_type( __DIR__ . '/blocks/hero-header');
  register_block_type( __DIR__ . '/blocks/next-step');
}
add_action( 'init', 'theme_register_blocks' );

//////////////////////////////////////////////////
////////////////// Woocommerce ///////////////////
//////////////////////////////////////////////////

// Add WooCommerce theme support.
function csv_add_woocommerce_support() {
  add_theme_support( 'woocommerce' );
  //add_theme_support( 'wc-product-gallery-zoom' );
  //add_theme_support( 'wc-product-gallery-lightbox' );
  //add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'csv_add_woocommerce_support' );

// Remove related products on single product pages.
function csv_remove_single_product_related_products() {
  remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
}
add_action( 'init', 'csv_remove_single_product_related_products' );

// Remove the WooCommerce sidebar on product pages, product archives, and blog categories.
function csv_remove_woocommerce_sidebar_on_product() {
  $is_single_product = function_exists( 'is_product' ) && is_product();
  $is_blog_category = is_category();
  $is_product_archive = ( function_exists( 'is_shop' ) && is_shop() )
    || ( function_exists( 'is_product_taxonomy' ) && is_product_taxonomy() )
    || is_post_type_archive( 'product' );

  if ( $is_single_product || $is_blog_category || $is_product_archive ) {
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
  }
}
add_action( 'wp', 'csv_remove_woocommerce_sidebar_on_product' );

// Remove "Additional information" tab on single product pages.
function csv_remove_additional_information_tab( $tabs ) {
  unset( $tabs['additional_information'] );
  return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'csv_remove_additional_information_tab', 99 );

// Remove product meta (SKU, category, tags) on single product pages.
function csv_remove_single_product_meta() {
  remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
}
add_action( 'init', 'csv_remove_single_product_meta' );

// Hide the reset variations link sitewide.
function csv_remove_reset_variations_link( $link ) {
  return '';
}
add_filter( 'woocommerce_reset_variations_link', 'csv_remove_reset_variations_link' );

// Remove WooCommerce breadcrumbs.
function csv_remove_woocommerce_breadcrumbs() {
  remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
}
add_action( 'init', 'csv_remove_woocommerce_breadcrumbs' );

// Apply coupon codes passed via URL (?coupon_code=XXXX).
function csv_apply_coupon_code_from_url() {
  if ( is_admin() || ! function_exists( 'WC' ) ) {
    return;
  }

  if ( empty( $_GET['coupon_code'] ) ) {
    return;
  }

  $coupon_code = sanitize_text_field( wp_unslash( $_GET['coupon_code'] ) );
  if ( '' === $coupon_code ) {
    return;
  }

  $cart = WC()->cart;
  if ( ! $cart ) {
    return;
  }

  if ( ! $cart->has_discount( $coupon_code ) ) {
    $cart->apply_coupon( $coupon_code );
  }
}
add_action( 'wp_loaded', 'csv_apply_coupon_code_from_url' );

// Remove links from single product gallery images.
function csv_strip_product_image_links( $html ) {
  if ( false === strpos( $html, '<a' ) ) {
    return $html;
  }

  $html = preg_replace( '/<a\\b[^>]*>\\s*/i', '', $html );
  $html = preg_replace( '/\\s*<\\/a>\\s*/i', '', $html );

  return $html;
}
add_filter( 'woocommerce_single_product_image_thumbnail_html', 'csv_strip_product_image_links', 10 );
add_filter( 'woocommerce_single_product_image_html', 'csv_strip_product_image_links', 10 );

// Disable the Stripe sandbox assistant overlay.
function csv_disable_stripe_sandbox_assistant() {
  if ( is_admin() ) {
    return;
  }

  if ( ! wp_script_is( 'stripe', 'registered' ) && ! wp_script_is( 'stripe', 'enqueued' ) ) {
    return;
  }

  $inline_script = <<<'JS'
(function () {
  if (typeof window.Stripe !== 'function') {
    return;
  }

  var originalStripe = window.Stripe;

  function wrapStripe(key, options) {
    var opts = options || {};
    var developerTools = opts.developerTools || {};
    var assistant = developerTools.assistant || {};

    assistant.enabled = false;
    developerTools.assistant = assistant;
    opts.developerTools = developerTools;

    return originalStripe(key, opts);
  }

  for (var prop in originalStripe) {
    if (Object.prototype.hasOwnProperty.call(originalStripe, prop)) {
      wrapStripe[prop] = originalStripe[prop];
    }
  }

  window.Stripe = wrapStripe;
})();
JS;

  wp_add_inline_script( 'stripe', $inline_script, 'after' );
}
add_action( 'wp_enqueue_scripts', 'csv_disable_stripe_sandbox_assistant', 20 );

// Cart/Checkout blocks: link cart items back to the related Event (ACF: event_post).
function csv_cart_item_permalink_event_link( $permalink, $cart_item, $cart_item_key ) {
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
}
add_filter( 'woocommerce_cart_item_permalink', 'csv_cart_item_permalink_event_link', 10, 3 );

// Remove Downloads from My Account navigation.
function csv_remove_account_downloads_menu_item( $items ) {
  unset( $items['downloads'] );
  return $items;
}
add_filter( 'woocommerce_account_menu_items', 'csv_remove_account_downloads_menu_item' );

// Rename Dashboard to My Courses in My Account navigation.
function csv_rename_account_dashboard_menu_item( $items ) {
  if ( isset( $items['dashboard'] ) ) {
    $items['dashboard'] = 'My Courses';
  }

  return $items;
}
add_filter( 'woocommerce_account_menu_items', 'csv_rename_account_dashboard_menu_item', 20 );

// Point LearnDash login links to the My Account page.
function csv_learndash_login_url( $login_url, $context, $args ) {
  if ( 'login' !== $context ) {
    return $login_url;
  }

  return home_url( '/account/' );
}
add_filter( 'learndash_login_url', 'csv_learndash_login_url', 10, 3 );

// Rename "Browse products" to "View Retreats" on My Account notices.
// function csv_rename_browse_products_text( $translated, $text, $domain ) {
//   if ( 'woocommerce' !== $domain ) {
//     return $translated;
//   }

//   if ( 'Browse products' === $text && is_page( 'my-account' ) ) {
//     return 'View Retreats';
//   }

//   return $translated;
// }
// add_filter( 'gettext', 'csv_rename_browse_products_text', 10, 3 );

// Point "return to shop" links to Retreats.
// function csv_return_to_shop_redirect( $url ) {
//   return home_url( '/retreats/' );
// }
// add_filter( 'woocommerce_return_to_shop_redirect', 'csv_return_to_shop_redirect' );

// Move orders from processing to complete after webhook triggers for successful payment
function auto_complete_paid_orders($order_id) {
  $order = wc_get_order($order_id);

  if (!$order) {
      return;
  }

  // Only act if order is currently processing
  if ($order->has_status('processing')) {
      $order->update_status('completed', 'Auto-completed after successful payment.');
  }
}
add_action('woocommerce_payment_complete', 'auto_complete_paid_orders');

// Disable messages about the mobile apps in WooCommerce emails
function csv_disable_woocommerce_email_mobile_messages( $mailer ) {
  foreach ( $mailer->emails as $email ) {
    remove_action( 'woocommerce_email_footer', array( $email, 'mobile_messaging' ), 9 );
  }
}
add_action( 'woocommerce_email', 'csv_disable_woocommerce_email_mobile_messages' );

// Add body class to logged out my account pages
function ms_add_logged_out_account_body_class($classes) {
  if (is_account_page() && !is_user_logged_in()) {
    $classes[] = 'logged-out';
  }
  return $classes;
}
add_filter('body_class', 'ms_add_logged_out_account_body_class');

// Redirect to homepage after logout
function csv_logout_redirect_home( $redirect_to, $requested_redirect_to, $user ) {
  return home_url( '/' );
}
add_filter( 'logout_redirect', 'csv_logout_redirect_home', 10, 3 );

// WooCommerce handles logout redirects separately.
function csv_woocommerce_logout_redirect_home( $redirect_url ) {
  return home_url( '/' );
}
add_filter( 'woocommerce_logout_default_redirect_url', 'csv_woocommerce_logout_redirect_home' );

// Assset loading on Woocommerce pages
// Delaying load, so the homepage that does not have Woocommerce elments doesn't take a performance hit
// Load WooCommerce assets on WooCommerce pages
// function csv_is_woocommerce_page() {
//   $is_cart = function_exists( 'is_cart' ) && is_cart();
//   $is_checkout = function_exists( 'is_checkout' ) && is_checkout();
//   $is_account = function_exists( 'is_account_page' ) && is_account_page();
//   return $is_cart || $is_checkout || $is_account;
// }

// Disable WooCommerce Blocks assets everywhere except cart/checkout/account.
// function csv_should_load_woocommerce_block_assets( $should_load ) {
//   return csv_is_woocommerce_page();
// }
// add_filter( 'woocommerce_should_load_block_assets', 'csv_should_load_woocommerce_block_assets' );

// function csv_should_load_woocommerce_block_styles( $should_load ) {
//   return csv_is_woocommerce_page();
// }
// add_filter( 'woocommerce_should_load_block_styles', 'csv_should_load_woocommerce_block_styles' );

// Remove script prefetch hints on the front page.
// function csv_filter_resource_hints( $urls, $relation_type ) {
//   if ( 'prefetch' !== $relation_type ) {
//     return $urls;
//   }

//   if ( ! is_admin() ) {
//     return array();
//   }

//   return $urls;
// }
// add_filter( 'wp_resource_hints', 'csv_filter_resource_hints', 999, 2 );

// Dequeue all WooCommerce assets (styles + scripts).
// function csv_dequeue_woocommerce_assets() {
//   if ( ! is_admin() && csv_is_woocommerce_page() ) {
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

//   // if ( ! is_admin() && ! is_woocommerce_page() ) {
//   //   wp_dequeue_script( 'jquery' );
//   //   wp_dequeue_script( 'jquery-core' );
//   //   wp_dequeue_script( 'jquery-migrate' );
//   //   wp_deregister_script( 'jquery' );
//   //   wp_deregister_script( 'jquery-core' );
//   //   wp_deregister_script( 'jquery-migrate' );
//   // }
// }
// add_action( 'wp_enqueue_scripts', 'csv_dequeue_woocommerce_assets', 100 );
// add_action( 'enqueue_block_assets', 'csv_dequeue_woocommerce_assets', 100 );
// function csv_filter_woocommerce_enqueue_styles( $styles ) {
//   return csv_is_woocommerce_page() ? $styles : array();
// }
// add_filter( 'woocommerce_enqueue_styles', 'csv_filter_woocommerce_enqueue_styles' );

//////////////////////////////////////////////////
////////////////// LearnDash /////////////////////
//////////////////////////////////////////////////

// Add body class to LearnDash shortcode pages (slug-based, dev-only).
function csv_add_learndash_slug_body_class( $classes ) {
  $learndash_slugs = array(
    'profile',
  );

  if ( is_page( $learndash_slugs ) ) {
    $classes[] = 'learndash-page';
  }

  return $classes;
}
add_filter( 'body_class', 'csv_add_learndash_slug_body_class' );

// Hide author names on LearnDash course reviews.
function csv_hide_learndash_review_author_name( $author, $comment_id, $comment ) {
  if ( ! $comment instanceof WP_Comment ) {
    $comment = get_comment( $comment_id );
  }

  if ( ! $comment instanceof WP_Comment ) {
    return $author;
  }

  if ( 'ld_review' !== $comment->comment_type ) {
    return $author;
  }

  if ( $comment->user_id ) {
    $first_name = get_user_meta( $comment->user_id, 'first_name', true );
    if ( ! empty( $first_name ) ) {
      return $first_name;
    }
  }

  return 'Verified Student';
}
add_filter( 'get_comment_author', 'csv_hide_learndash_review_author_name', 10, 3 );

// Remove time from LearnDash course review timestamps (keep date).
function csv_learndash_reviews_strip_time_text( $translated, $text, $domain ) {
  if ( 'learndash' !== $domain ) {
    return $translated;
  }

  if ( '%1$s at %2$s' !== $text ) {
    return $translated;
  }

  $comment = get_comment();
  if ( $comment instanceof WP_Comment && 'ld_review' === $comment->comment_type ) {
    return '%1$s';
  }

  return $translated;
}
add_filter( 'gettext', 'csv_learndash_reviews_strip_time_text', 10, 3 );

function csv_learndash_reviews_hide_comment_time( $time, $format, $gmt, $comment ) {
  if ( $comment instanceof WP_Comment && 'ld_review' === $comment->comment_type ) {
    return '';
  }

  return $time;
}
add_filter( 'get_comment_time', 'csv_learndash_reviews_hide_comment_time', 10, 4 );

// Hide the Reviews tab after a user has left a review.
// function csv_hide_learndash_reviews_tab_after_review( $tabs, $tabs_object ) {
//   if ( ! function_exists( 'learndash_course_reviews_get_user_review' ) ) {
//     return $tabs;
//   }

//   if ( ! is_user_logged_in() ) {
//     return $tabs;
//   }

//   $course_id = get_queried_object_id();
//   if ( empty( $course_id ) || 'sfwd-courses' !== get_post_type( $course_id ) ) {
//     return $tabs;
//   }

//   $review = learndash_course_reviews_get_user_review( $course_id );
//   if ( ! empty( $review ) ) {
//     unset( $tabs['reviews'] );
//   }

//   return $tabs;
// }
// add_filter( 'learndash_template_tabs_sorted', 'csv_hide_learndash_reviews_tab_after_review', 10, 2 );

// Notify admin when a LearnDash course review is submitted.
function csv_decode_mail_text( $text ) {
  $decoded = wp_specialchars_decode( $text, ENT_QUOTES );
  $decoded = html_entity_decode( $decoded, ENT_QUOTES, 'UTF-8' );
  if ( $decoded !== $text ) {
    $decoded = html_entity_decode( $decoded, ENT_QUOTES, 'UTF-8' );
  }

  return $decoded;
}

function csv_notify_admin_on_learndash_review( $comment_id, $comment = null, $rating_override = null ) {
  if ( ! $comment instanceof WP_Comment ) {
    $comment = get_comment( $comment_id );
  }

  if ( ! $comment instanceof WP_Comment ) {
    return;
  }

  if ( 'ld_review' !== $comment->comment_type ) {
    return;
  }

  $post_id = $comment->comment_post_ID;
  if ( 'sfwd-courses' !== get_post_type( $post_id ) ) {
    return;
  }

  if ( get_comment_meta( $comment_id, '_csv_review_notified', true ) ) {
    return;
  }

  $admin_email = get_option( 'admin_email' );
  $course_title = csv_decode_mail_text( get_the_title( $post_id ) );
  $author_name = csv_decode_mail_text( $comment->comment_author ?: 'A user' );
  $review_text = csv_decode_mail_text( $comment->comment_content );
  $rating = null !== $rating_override ? $rating_override : get_comment_meta( $comment_id, 'rating', true );
  $comment_status = wp_get_comment_status( $comment );
  $status = ( 'approved' === $comment_status ) ? 'Approved' : 'Pending moderation';

  $subject = 'New Online Course Review';

  $message = "A course was reviewed.\n\n";
  $message .= "Course: {$course_title}\n";
  $message .= "Reviewer: {$author_name}\n";
  if ( '' !== $rating && null !== $rating ) {
    $message .= "Rating: {$rating}/5\n";
  }
  $message .= "Status: {$status}\n\n";
  $message .= "Review:\n{$review_text}\n\n";
  $message .= 'Edit review:' . "\n" . admin_url( 'comment.php?action=editcomment&c=' . $comment_id );

  wp_mail( $admin_email, $subject, $message );
  update_comment_meta( $comment_id, '_csv_review_notified', 1 );
}

function csv_notify_admin_on_learndash_review_rating_meta( $meta_id, $comment_id, $meta_key, $meta_value ) {
  if ( 'rating' !== $meta_key ) {
    return;
  }

  csv_notify_admin_on_learndash_review( $comment_id, null, $meta_value );
}
add_action( 'added_comment_meta', 'csv_notify_admin_on_learndash_review_rating_meta', 10, 4 );

// Notify admin when a LearnDash quiz essay is submitted.
function csv_notify_quiz_essay( $quizdata, $user ) {
  if ( empty( $quizdata['graded'] ) || ! is_array( $quizdata['graded'] ) ) {
    return;
  }

  $user_info = get_userdata( $user->ID );
  $quiz_id = is_object( $quizdata['quiz'] ) ? $quizdata['quiz']->ID : $quizdata['quiz'];
  $quiz_title = csv_decode_mail_text( get_the_title( $quiz_id ) );
  $course_id = 0;
  if ( ! empty( $quizdata['course'] ) ) {
    $course_id = is_object( $quizdata['course'] ) ? $quizdata['course']->ID : (int) $quizdata['course'];
  }
  $course_title = $course_id ? csv_decode_mail_text( get_the_title( $course_id ) ) : '';
  $user_edit_url = admin_url( 'user-edit.php?user_id=' . $user->ID );

  $display_name = esc_html( csv_decode_mail_text( $user_info->display_name ) );
  $user_email = esc_html( $user_info->user_email );
  $user_link = '<a href="' . esc_url( $user_edit_url ) . '">' . $display_name . '</a>';

  //$message = '<strong>New Quiz Submission</strong><br>';
  if ( '' !== $course_title ) {
    $message .= 'Course: ' . esc_html( $course_title ) . '<br>';
  }
  $message .= 'Quiz: ' . esc_html( $quiz_title ) . '<br><br>';
  $message .= 'User: ' . $user_link . ' (' . $user_email . ')<br>';
  $first_name = get_user_meta( $user->ID, 'first_name', true );
  $last_name = get_user_meta( $user->ID, 'last_name', true );
  $full_name = trim( $first_name . ' ' . $last_name );
  if ( '' !== $full_name ) {
    $message .= 'Name: ' . esc_html( $full_name ) . '<br><br>';
  }

  foreach ( $quizdata['graded'] as $graded ) {
    if ( empty( $graded['post_id'] ) ) {
      continue;
    }

    $essay_post = get_post( (int) $graded['post_id'] );
    if ( ! $essay_post instanceof WP_Post ) {
      continue;
    }

    $question_text = $essay_post->post_title ? csv_decode_mail_text( $essay_post->post_title ) : 'Question ' . $graded['post_id'];
    $answer_text = csv_decode_mail_text( $essay_post->post_content );

    if ( '' === trim( $answer_text ) ) {
      continue;
    }

    $message .= 'Question: ' . esc_html( $question_text ) . '<br>';
    $message .= 'Answer:<br>' . nl2br( esc_html( $answer_text ) ) . '<br><br>';
  }

  $headers = array( 'Content-Type: text/html; charset=UTF-8' );
  if ( is_email( $user_info->user_email ) ) {
    $headers[] = 'Reply-To: ' . sanitize_email( $user_info->user_email );
  }

  wp_mail(
    get_option( 'admin_email' ),
    'New Quiz Submission',
    $message,
    $headers
  );
}
add_action( 'learndash_quiz_completed', 'csv_notify_quiz_essay', 10, 2 );

//////////////////////////////////////////////////
/////////// Remove WordPress features ////////////
//////////////////////////////////////////////////
function csv_cleanup_head() {
  remove_action( 'wp_head', 'rsd_link' );
  remove_action( 'wp_head', 'wlwmanifest_link' );
  remove_action( 'wp_head', 'wp_shortlink_wp_head' );
  remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );
  remove_action( 'wp_head', 'wp_generator' );
}
add_action( 'after_setup_theme', 'csv_cleanup_head' );

function csv_dequeue_styles() {
  remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
  remove_action( 'wp_footer', 'wp_global_styles_render_svg_filters', 1 );
  remove_action( 'wp_footer', 'wp_global_styles_render_svg_filters', 9 );
}
add_action( 'wp_enqueue_scripts', 'csv_dequeue_styles', 20 );

function csv_disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  add_filter( 'tiny_mce_plugins', 'csv_disable_emoji_tinymce' );
  add_filter( 'wp_resource_hints', 'csv_disable_emoji_dns_prefetch', 10, 2 );
}
add_action( 'after_setup_theme', 'csv_disable_emojis' );

function csv_disable_emoji_tinymce( $plugins ) {
  return is_array( $plugins ) ? array_diff( $plugins, array( 'wpemoji' ) ) : array();
}

function csv_disable_emoji_dns_prefetch( $urls, $relation_type ) {
  if ( 'dns-prefetch' === $relation_type ) {
    $urls = array_diff( $urls, array( '//s.w.org' ) );
  }
  return $urls;
}

// Remove titles from WordPress upon import
function csv_strip_auto_attachment_title( $data, $postarr ) {
  // Prevent auto-titling from filename (keep blank unless user sets it).
  if ( ! empty( $data['post_title'] ) && ! empty( $postarr['file'] ) ) {
    $filename = pathinfo( $postarr['file'], PATHINFO_FILENAME );

    // If title equals filename-derived title, blank it out.
    $normalized_title = sanitize_title( $data['post_title'] );
    $normalized_file = sanitize_title( $filename );

    if ( $normalized_title === $normalized_file ) {
      $data['post_title'] = '';
    }
  }

  // Optional: also clear caption if it's being auto-set somewhere.
  if ( ! empty( $data['post_excerpt'] ) ) {
    $data['post_excerpt'] = '';
  }

  return $data;
}
add_filter( 'wp_insert_attachment_data', 'csv_strip_auto_attachment_title', 10, 2 );

/*
function csv_cleanup_head() {
  remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
  remove_action( 'wp_head', 'wp_oembed_add_host_js' );
}
add_action( 'after_setup_theme', 'csv_cleanup_head' );

function csv_disable_oembed() {
  wp_deregister_script( 'wp-embed' );
  add_filter( 'embed_oembed_discover', '__return_false' );
  remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
  remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
  remove_action( 'wp_head', 'wp_oembed_add_host_js' );
}
add_action( 'init', 'csv_disable_oembed', 20 );
*/

//////////////////////////////////////////////////////////////////
///////////// [FOR DEVELOPMENT ONLY] /////////////////////////////
//////////////////////////////////////////////////////////////////

/*
function csv_dev_disable_block_editor() {
  if ( ! csv_is_vite_dev() ) {
    return;
  }

  add_filter( 'use_block_editor_for_post', '__return_false', 100 );
  add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );
  remove_theme_support( 'core-block-patterns' );
}
add_action( 'after_setup_theme', 'csv_dev_disable_block_editor', 1 );

function csv_dev_disable_oembed() {
  if ( ! csv_is_vite_dev() ) {
    return;
  }

  remove_action( 'rest_api_init', 'wp_oembed_register_route' );
}
add_action( 'init', 'csv_dev_disable_oembed', 1 );

function csv_dev_prevent_block_assets() {
  if ( ! csv_is_vite_dev() ) {
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
add_action( 'wp_enqueue_scripts', 'csv_dev_prevent_block_assets', 1 );

function csv_dev_dequeue_block_assets() {
  if ( ! csv_is_vite_dev() ) {
    return;
  }

  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'wp-block-library-theme' );
  wp_dequeue_style( 'wc-block-style' );
  wp_dequeue_style( 'global-styles' );
  wp_dequeue_style( 'classic-theme-styles' );
}
add_action( 'wp_enqueue_scripts', 'csv_dev_dequeue_block_assets', 100 );
*/
