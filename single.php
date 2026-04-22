<?php
get_header();

$posts_page_id = (int) get_option( 'page_for_posts' );
$journal_url = $posts_page_id ? get_permalink( $posts_page_id ) : home_url( '/blog/' );
?>

<!-- ========== BREADCRUMB ========== -->
<div class="breadcrumb-bar">
  <nav>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
    <span class="sep">/</span>
    <a href="<?php echo esc_url( $journal_url ); ?>">Journal</a>
    <span class="sep">/</span>
    <span style="color:#999"><?php the_title(); ?></span>
  </nav>
</div>

<!-- ========== POST LAYOUT ========== -->
<div class="post-layout">

  <!-- ===== MAIN: ARTICLE ===== -->
  <article>
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php
        $fallback_image = get_template_directory_uri() . '/images/bg/7178818.webp';
        $thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
        $image_url = $thumbnail_url ? $thumbnail_url : $fallback_image;
        $image_alt = '';
        if ( $thumbnail_url ) {
          $alt_id = get_post_thumbnail_id( get_the_ID() );
          $image_alt = $alt_id ? get_post_meta( $alt_id, '_wp_attachment_image_alt', true ) : '';
        }
        if ( '' === $image_alt ) {
          $image_alt = get_the_title();
        }

        $content = wp_strip_all_tags( get_the_content() );
        $word_count = str_word_count( $content );
        $reading_minutes = max( 1, (int) ceil( $word_count / 200 ) );
        $reading_time = sprintf( '%d min read', $reading_minutes );

        $author_id = (int) get_the_author_meta( 'ID' );
        $author_name = get_the_author();
        $author_bio = get_the_author_meta( 'description' );
        $author_link = get_the_author_meta( 'user_url', $author_id );
        if ( '' === $author_link ) {
          $author_link = get_author_posts_url( $author_id );
        }
        $author_avatar = get_avatar_url( $author_id, array( 'size' => 112 ) );
        $author_profile_image = null;
        $author_profile_image_alt = '';
        if ( function_exists( 'get_field' ) ) {
          $author_profile_image = get_field( 'user_profile_image', 'user_' . $author_id );
        }
        if ( is_array( $author_profile_image ) ) {
          $author_profile_image_alt = isset( $author_profile_image['alt'] ) ? $author_profile_image['alt'] : '';
          $author_profile_image = isset( $author_profile_image['url'] ) ? $author_profile_image['url'] : '';
        } elseif ( is_numeric( $author_profile_image ) ) {
          $author_profile_image_alt = get_post_meta( (int) $author_profile_image, '_wp_attachment_image_alt', true );
          $author_profile_image = wp_get_attachment_image_url( (int) $author_profile_image, 'thumbnail' );
        }
        if ( '' === $author_profile_image_alt ) {
          $author_profile_image_alt = $author_name;
        }
        if ( $author_profile_image ) {
          $author_avatar = $author_profile_image;
        }
        ?>

        <!-- Article header -->
        <header class="article-header">
          <div class="eyebrow">Journal</div>
          <h1><?php the_title(); ?></h1>
          <div class="article-meta">
            <span><?php echo esc_html( get_the_date() ); ?></span>
            <span class="dot"></span>
            <span><?php echo esc_html( $reading_time ); ?></span>
          </div>
          <div class="featured-image">
            <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
          </div>
        </header>

        <!-- Article body -->
        <div class="article-body">
          <?php the_content(); ?>
        </div>

        <!-- Post footer -->
        <div class="post-footer">

          <!-- Previous / Next -->
          <nav class="post-nav">
            <?php
            $prev_post = get_previous_post();
            if ( $prev_post ) :
            ?>
              <a href="<?php echo esc_url( get_permalink( $prev_post ) ); ?>" class="post-nav-link prev">
                <span class="nav-label">&larr; Previous</span>
                <span class="nav-title"><?php echo esc_html( get_the_title( $prev_post ) ); ?></span>
              </a>
            <?php endif; ?>

            <?php
            $next_post = get_next_post();
            if ( $next_post ) :
            ?>
              <a href="<?php echo esc_url( get_permalink( $next_post ) ); ?>" class="post-nav-link next">
                <span class="nav-label">Next &rarr;</span>
                <span class="nav-title"><?php echo esc_html( get_the_title( $next_post ) ); ?></span>
              </a>
            <?php endif; ?>
          </nav>

          <!-- Author card -->
          <div class="author-card">
            <div class="author-avatar">
              <a href="<?php echo esc_url( $author_link ); ?>" aria-label="About <?php echo esc_attr( $author_name ); ?>">
                <img src="<?php echo esc_url( $author_avatar ); ?>" alt="<?php echo esc_attr( $author_profile_image_alt ); ?>">
              </a>
            </div>
            <div class="author-info">
              <div class="author-name">
                <a href="<?php echo esc_url( $author_link ); ?>"><?php echo esc_html( $author_name ); ?></a>
              </div>
              <?php if ( $author_bio ) : ?>
                <p class="author-bio"><?php echo esc_html( $author_bio ); ?></p>
              <?php endif; ?>
              <a href="<?php echo esc_url( $author_link ); ?>" class="author-link">About <?php echo esc_html( $author_name ); ?> &rarr;</a>
            </div>
          </div>

        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </article>

  <!-- ===== SIDEBAR ===== -->
  <aside class="sidebar">

    <!-- Free class offer -->
    <?php get_template_part( 'partials/offers/earth-ceremony/sidebar' ); ?>
    <?php get_template_part( 'partials/offers/pest-control/sidebar' ); ?>

    <?php /*
    <!-- Ad slot 1 -->
    <div class="ad-slot">Ad</div>
    */ ?>

    <?php /*
    <!-- Ad slot 2 -->
    <!-- <div class="ad-slot">Ad</div> -->
    */ ?>
  
  </aside>

</div>

<?php
get_footer();
?>
