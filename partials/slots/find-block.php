<?php
function csv_find_block_by_name( $block_name, $blocks ) {
  foreach ( $blocks as $block ) {
    if ( isset( $block['blockName'] ) && $block['blockName'] === $block_name ) {
      return $block;
    }

    if ( ! empty( $block['innerBlocks'] ) ) {
      $found = csv_find_block_by_name( $block_name, $block['innerBlocks'] );
      if ( $found ) {
        return $found;
      }
    }
  }

  return null;
}
