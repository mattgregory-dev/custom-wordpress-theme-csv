<?php
get_header();

/**
 * Feather Jones Blog Index layout
 */

?>

<!-- ========== PAGE HEADER ========== -->
<section class="page-header">
  <div class="container">
    <div class="eyebrow">Journal</div>
    <h1>Blog</h1>
    <p>Quiet reflections, guidance, and notes from the retreat path.</p>
  </div>
</section>

<div class="botanical-divider"></div>

<!-- ========== BLOG LAYOUT ========== -->
<div class="blog-layout">

  <!-- ===== MAIN: POST LIST ===== -->
  <div>
    <ul class="post-list">
      <?php if ( have_posts() ) : ?>
        <?php $fallback_image = get_template_directory_uri() . '/images/bg/7178818.webp'; ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <?php
          $thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
          $image_url = $thumbnail_url ? $thumbnail_url : $fallback_image;
          $image_alt = '';
          if ( $thumbnail_url ) {
            $alt_id = get_post_thumbnail_id( get_the_ID() );
            $image_alt = $alt_id ? get_post_meta( $alt_id, '_wp_attachment_image_alt', true ) : '';
          }
          if ( '' === $image_alt ) {
            $image_alt = get_the_title();
          }
          ?>
          <li class="post-item">
            <div class="post-thumb">
              <a href="<?php the_permalink(); ?>">
                <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
              </a>
            </div>
            <div class="post-body">
              <span class="post-date"><?php echo esc_html( get_the_date() ); ?></span>
              <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <p class="post-excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
            </div>
          </li>
        <?php endwhile; ?>
      <?php else : ?>
        <li class="post-item">
          <div class="post-body">
            <p class="post-excerpt">No posts found.</p>
          </div>
        </li>
      <?php endif; ?>
    </ul>
  </div>

  <!-- ===== SIDEBAR ===== -->
  <aside class="sidebar">

    <!-- Free class offer -->
    <div class="sidebar-card">
      <div class="eyebrow">Free Class</div>
      <h3>Try a Live Class — On Us</h3>
      <p>Join a real session with Feather and a small group of students. No pitch, no pressure — just plants.</p>
      <div class="email-input">
        <input type="email" placeholder="Your email address">
        <button class="btn btn-primary">Get Your Free Class</button>
        <p class="micro">Unsubscribe anytime. We don't share your email.</p>
      </div>
    </div>

    <!-- Ad slot 1 -->
    <div class="ad-slot">Ad</div>

    <!-- Ad slot 2 -->
    <div class="ad-slot">Ad</div>

  </aside>

</div>



<?php
get_footer();
