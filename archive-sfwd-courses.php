<?php
get_header();
?>

<h1>My Courses</h1>

<?php
$profile_output = do_shortcode( '[ld_profile]' );
if ( '' !== trim( $profile_output ) ) {
  echo $profile_output;
} else {
  $learndash_profile_page = get_page_by_path( 'profile' );
  if ( $learndash_profile_page instanceof WP_Post ) {
    echo apply_filters( 'the_content', $learndash_profile_page->post_content );
  }
}
?>

<?php
get_footer();
?>
