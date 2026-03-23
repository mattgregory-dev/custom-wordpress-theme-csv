<?php
$eyebrow = isset( $attributes['eyebrow'] ) ? $attributes['eyebrow'] : 'YOUR JOURNEY';
$title = isset( $attributes['title'] ) ? $attributes['title'] : 'Hero Title';
$title_size = isset( $attributes['titleSize'] ) ? $attributes['titleSize'] : 'default';
$hero_text_color = isset( $attributes['heroTextColor'] ) ? $attributes['heroTextColor'] : 'default';
$description = isset( $attributes['description'] ) ? $attributes['description'] : 'Hero description text';
$button1_text = isset( $attributes['button1Text'] ) ? $attributes['button1Text'] : 'Continue to Intentions';
$button1_url = isset( $attributes['button1Url'] ) ? $attributes['button1Url'] : '#';
$button2_text = isset( $attributes['button2Text'] ) ? $attributes['button2Text'] : 'View the Full Journey';
$button2_url = isset( $attributes['button2Url'] ) ? $attributes['button2Url'] : '#';
$background_image_id = isset( $attributes['backgroundImageId'] ) ? (int) $attributes['backgroundImageId'] : 0;
$overlay_color = isset( $attributes['overlayColor'] ) ? $attributes['overlayColor'] : 'rgba(0, 0, 0, 0.4)';

$resolved_background = '';
if ( $background_image_id ) {
  $resolved_background = wp_get_attachment_image_url( $background_image_id, 'full' );
}

$style_parts = array();
if ( $resolved_background ) {
  $style_parts[] = 'background-image: url(' . esc_url( $resolved_background ) . ')';
}
$overlay_color = $overlay_color ? sanitize_text_field( $overlay_color ) : 'rgba(0, 0, 0, 0.4)';
$style_parts[] = '--hero-overlay: ' . $overlay_color;
$style = implode( '; ', $style_parts );

$wrapper_attributes = get_block_wrapper_attributes(
  array(
    'class' => 'page-hero',
    'style' => $style,
  )
);

$hero_wrapper_class = 'hero-wrapper';
if ( $hero_text_color === 'white' ) {
  $hero_wrapper_class .= ' white';
}

$title_class = 'hero-title';
if ( $title_size === 'large' ) {
  $title_class .= ' large';
}

$button1_url = $button1_url ? $button1_url : '#';
$button2_url = $button2_url ? $button2_url : '#';
?>

<section <?php echo $wrapper_attributes; ?>>
  <div class="<?php echo esc_attr( $hero_wrapper_class ); ?>">
    <div class="hero-eyebrow-wrapper">
      <span class="hero-eyebrow"><?php echo esc_html( $eyebrow ?: 'Hero eyebrow' ); ?></span>
    </div>
    <h1 class="<?php echo esc_attr( $title_class ); ?>">
      <?php echo esc_html( $title ?: 'Hero title' ); ?>
    </h1>
    <p class="hero-description">
      <?php echo esc_html( $description ?: 'Hero description' ); ?>
    </p>
    <div class="hero-actions-wrapper">
      <a class="csv-btn csv-btn--primary" href="<?php echo esc_url( $button1_url ); ?>">
        <?php echo esc_html( $button1_text ?: 'Button 1 text' ); ?>
      </a>
      <a class="csv-btn csv-btn--secondary" href="<?php echo esc_url( $button2_url ); ?>">
        <?php echo esc_html( $button2_text ?: 'Button 2 text' ); ?>
      </a>
    </div>
  </div>
</section>
