<?php
require_once get_template_directory() . '/partials/slots/find-block.php';

$banner_block = csv_find_block_by_name( 'csv/banner', $blocks );

echo '<section class="banner-slot">';

if ( $banner_block ) {
  echo render_block( $banner_block );
} else {
  echo '<p>No banner block found.</p>';
}

echo '</section>';
