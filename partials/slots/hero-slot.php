<?php
require_once get_template_directory() . '/partials/slots/find-block.php';

$hero_block = csv_find_block_by_name( 'csv/hero', $blocks );

if ( $hero_block ) {
  echo render_block( $hero_block );
}
