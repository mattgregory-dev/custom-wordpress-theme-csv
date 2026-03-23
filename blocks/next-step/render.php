<?php
$eyebrow = isset( $attributes['eyebrow'] ) ? $attributes['eyebrow'] : 'NEXT STEP';
$title = isset( $attributes['title'] ) ? $attributes['title'] : 'Title';
$description = isset( $attributes['description'] ) ? $attributes['description'] : 'Description text';
$button_text = isset( $attributes['buttonText'] ) ? $attributes['buttonText'] : 'Continue';
$button_url = isset( $attributes['buttonUrl'] ) ? $attributes['buttonUrl'] : '#';
$image_id = isset( $attributes['imageId'] ) ? (int) $attributes['imageId'] : 0;

$image_url = '';
if ( $image_id ) {
  $image_url = wp_get_attachment_image_url( $image_id, 'full' );
}

$wrapper_attributes = get_block_wrapper_attributes(
  array(
    'class' => 'footer-banner',
  )
);
?>

<section <?php echo $wrapper_attributes; ?>>
  <div class="footer-banner-wrapper">
    <div class="footer-banner-grid">
      <div class="footer-banner-grid-col-5">
        <div class="image-wrapper">
          <?php if ( $image_url ) : ?>
            <img src="<?php echo esc_url( $image_url ); ?>" alt="">
          <?php else : ?>
            <span class="text-gray-400 text-sm">[ IMAGE ]</span>
          <?php endif; ?>
        </div>
      </div>
      <div class="footer-banner-grid-col-7">
        <div class="footer-eyebrow"><?php echo esc_html( $eyebrow ?: 'eyebrow' ); ?></div>
        <h2 class="footer-banner-title"><?php echo esc_html( $title ?: 'title' ); ?></h2>
        <p class="footer-banner-description"><?php echo esc_html( $description ?: 'description' ); ?></p>
        <div class="footer-button-wrapper">
          <a class="csv-btn csv-btn--primary" href="<?php echo esc_url( $button_url ?: '#' ); ?>">
            <?php echo esc_html( $button_text ?: 'button text' ); ?> &rarr;
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
