<?php
get_header();

/**
 * Lumina Blog Index layout.
 */

$posts_page_id = (int) get_option('page_for_posts');
$page_title = $posts_page_id ? get_the_title($posts_page_id) : 'Blog';
$intro_copy = $posts_page_id ? get_post_field('post_excerpt', $posts_page_id) : '';
$intro_copy = $intro_copy ? $intro_copy : 'Quiet reflections, guidance, and notes from the retreat path.';

$categories = get_categories(array('hide_empty' => true));

$paged = max(1, (int) get_query_var('paged'));
$featured_id = 0;
$highlight_ids = array();
$highlight_posts = array();
$highlight_count = 2;

if ($paged === 1) {
  $sticky_posts = get_option('sticky_posts');
  $featured_args = array(
    'post_status' => 'publish',
    'posts_per_page' => 1,
    'ignore_sticky_posts' => 1,
  );

  if (!empty($sticky_posts)) {
    $featured_args['post__in'] = $sticky_posts;
    $featured_args['orderby'] = 'date';
  }

  $featured_query = new WP_Query($featured_args);
  if ($featured_query->have_posts()) {
    $featured_query->the_post();
    $featured_id = get_the_ID();
  }
  wp_reset_postdata();

  $highlight_query = new WP_Query(array(
    'post_status' => 'publish',
    'posts_per_page' => $highlight_count,
    'post__not_in' => array_filter(array($featured_id)),
    'ignore_sticky_posts' => 1,
  ));

  if ($highlight_query->have_posts()) {
    while ($highlight_query->have_posts()) {
      $highlight_query->the_post();
      $highlight_ids[] = get_the_ID();
      $highlight_posts[] = get_post();
    }
  }
  wp_reset_postdata();
}

$excluded_ids = array_filter(array_merge(array($featured_id), $highlight_ids));
$grid_query = new WP_Query(array(
  'post_status' => 'publish',
  'posts_per_page' => 9,
  'paged' => $paged,
  'post__not_in' => $excluded_ids,
  'ignore_sticky_posts' => 1,
));
?>

<section id="blog-header" class="page-title section">

  <div class="section-container">

    <div class="space-y-6">

      <p class="label">Journal</p>

      <h1><?php echo esc_html($page_title ? $page_title : 'Blog'); ?></h1>

      <p class="description"><?php echo esc_html($intro_copy); ?></p>

      <?php if (!empty($categories)) : ?>

        <div class="flex flex-wrap gap-3 pt-2">

          <?php foreach ($categories as $category) : ?>

            <a
              class="mini-pill border border-slate-300 text-xs uppercase tracking-[0.2em] text-[var(--muted)]"
              href="<?php echo esc_url(get_category_link($category)); ?>"
            >
              <?php echo esc_html($category->name); ?>
            </a>

          <?php endforeach; ?>

        </div>

      <?php endif; ?>

    </div>

  </div>
</section>





<?php if ($paged === 1 && $featured_id) : ?>

  <section id="featured-story" class="w-full py-16">
    <div class="max-w-[1240px] mx-auto px-6 space-y-8">
      <div class="flex items-end justify-between">
        <div class="space-y-3">
          <p class="label text-base uppercase tracking-[0.25em] text-[var(--muted)]">Featured</p>
          <h2 class="text-4xl leading-tight">The hero story</h2>
        </div>
        <span class="mini-pill border border-slate-300">Latest insight</span>
      </div>
      <?php
        $featured_post = get_post($featured_id);
        setup_postdata($featured_post);
        $featured_categories = get_the_category($featured_id);
        $featured_category = !empty($featured_categories) ? $featured_categories[0]->name : 'Journal';
      ?>
      <article class="grid grid-cols-[1.15fr_0.85fr] gap-10 rounded-[32px] border border-slate-300 bg-white/95 p-6 soft-shadow">
        <a class="block overflow-hidden rounded-[26px] border border-slate-200 bg-white/90" href="<?php the_permalink(); ?>">
          <div class="h-[420px] w-full">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('large', array('class' => 'h-full w-full object-cover')); ?>
            <?php else : ?>
              <div class="h-full w-full bg-[var(--dusk)] flex items-center justify-center text-sm uppercase tracking-[0.25em] text-white opacity-80">
                No Image
              </div>
            <?php endif; ?>
          </div>
        </a>
        <div class="flex h-full flex-col justify-between space-y-6 py-2">
          <div class="space-y-4">
            <p class="text-xs uppercase tracking-[0.2em] text-[var(--muted)]"><?php echo esc_html($featured_category); ?></p>
            <h3 class="text-3xl leading-snug"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p class="text-lg leading-relaxed text-[var(--muted)]"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 34)); ?></p>
          </div>
          <div class="flex items-center justify-between text-xs uppercase tracking-[0.2em] text-[var(--muted)]">
            <span><?php echo esc_html(get_the_date()); ?></span>
            <a class="btn rounded-full border border-slate-300 bg-white/80 px-5 py-2 text-xs uppercase tracking-[0.25em] text-[var(--ink)]" href="<?php the_permalink(); ?>">
              Read
            </a>
          </div>
        </div>
      </article>
      <?php wp_reset_postdata(); ?>
    </div>
  </section>
<?php endif; ?>

<?php if ($paged === 1 && !empty($highlight_posts)) : ?>

  <section id="highlight-row" class="w-full py-10">
    <div class="max-w-[1240px] mx-auto px-6 grid grid-cols-[1.25fr_0.75fr] gap-10 items-start">
      <div class="space-y-6">
        <div class="space-y-3">
          <p class="label text-base uppercase tracking-[0.25em] text-[var(--muted)]">Highlights</p>
          <h2 class="text-4xl leading-tight">Recent moments</h2>
        </div>
        <div class="grid grid-cols-2 gap-6">
          <?php foreach ($highlight_posts as $highlight_post) : ?>
            <?php
              setup_postdata($highlight_post);
              $highlight_categories = get_the_category($highlight_post->ID);
              $highlight_category = !empty($highlight_categories) ? $highlight_categories[0]->name : 'Journal';
            ?>
            <article class="rounded-3xl border border-slate-300 bg-white/90 soft-shadow overflow-hidden">
              <a class="block" href="<?php the_permalink(); ?>">
                <div class="h-[240px] w-full">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large', array('class' => 'h-full w-full object-cover')); ?>
                  <?php else : ?>
                    <div class="h-full w-full bg-[var(--dusk)] flex items-center justify-center text-xs uppercase tracking-[0.25em] text-white opacity-80">
                      No Image
                    </div>
                  <?php endif; ?>
                </div>
              </a>
              <div class="p-5 space-y-2">
                <p class="text-xs uppercase tracking-[0.2em] text-[var(--muted)]"><?php echo esc_html($highlight_category); ?></p>
                <h3 class="text-2xl leading-snug"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p class="text-xs uppercase tracking-[0.2em] text-[var(--muted)]"><?php echo esc_html(get_the_date()); ?></p>
              </div>
            </article>
          <?php endforeach; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
      <aside class="rounded-3xl border border-slate-300 bg-white/90 soft-shadow p-6 space-y-6">
        <div class="space-y-2">
          <p class="label text-base uppercase tracking-[0.25em] text-[var(--muted)]">Popular</p>
          <p class="text-lg text-[var(--muted)]">Most discussed this season.</p>
        </div>
        <div class="space-y-5">
          <?php
            $popular_query = new WP_Query(array(
              'post_status' => 'publish',
              'posts_per_page' => 3,
              'orderby' => 'comment_count',
              'post__not_in' => $excluded_ids,
              'ignore_sticky_posts' => 1,
            ));
          ?>
          <?php if ($popular_query->have_posts()) : ?>
            <?php while ($popular_query->have_posts()) : $popular_query->the_post(); ?>
              <article class="space-y-2">
                <p class="text-xs uppercase tracking-[0.2em] text-[var(--muted)]"><?php echo esc_html(get_the_date()); ?></p>
                <h3 class="text-xl leading-snug"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <a class="text-xs uppercase tracking-[0.2em] text-[var(--muted)]" href="<?php the_permalink(); ?>">Read</a>
              </article>
            <?php endwhile; ?>
          <?php else : ?>
            <p class="text-sm text-[var(--muted)]">No popular posts yet.</p>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </aside>
    </div>
  </section>
<?php endif; ?>



<section id="editorial-grid" class="w-full py-16">
  <div class="max-w-[1240px] mx-auto px-6 space-y-10">
    <div class="space-y-3">
      <p class="label text-base uppercase tracking-[0.25em] text-[var(--muted)]">Editorial</p>
      <h2 class="text-4xl leading-tight">All recent posts</h2>
    </div>
    <?php if ($grid_query->have_posts()) : ?>
      <div class="grid grid-cols-3 gap-8">
        <?php while ($grid_query->have_posts()) : $grid_query->the_post(); ?>
          <?php
            $grid_categories = get_the_category();
            $grid_category = !empty($grid_categories) ? $grid_categories[0]->name : 'Journal';
          ?>
          <article class="rounded-3xl border border-slate-300 bg-white/90 soft-shadow overflow-hidden flex flex-col">
            <a class="block" href="<?php the_permalink(); ?>">
              <div class="h-[220px] w-full">
                <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('large', array('class' => 'h-full w-full object-cover')); ?>
                <?php else : ?>
                  <div class="h-full w-full bg-[var(--dusk)] flex items-center justify-center text-xs uppercase tracking-[0.25em] text-white opacity-80">
                    No Image
                  </div>
                <?php endif; ?>
              </div>
            </a>
            <div class="p-6 space-y-3 flex-1 flex flex-col">
              <p class="text-xs uppercase tracking-[0.2em] text-[var(--muted)]"><?php echo esc_html($grid_category); ?></p>
              <h3 class="text-2xl leading-snug"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <p class="text-base text-[var(--muted)]"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?></p>
              <div class="mt-auto flex items-center justify-between text-xs uppercase tracking-[0.2em] text-[var(--muted)]">
                <span><?php echo esc_html(get_the_date()); ?></span>
                <a class="text-[var(--ink)]" href="<?php the_permalink(); ?>">Read</a>
              </div>
            </div>
          </article>
        <?php endwhile; ?>
      </div>
    <?php else : ?>
      <div class="rounded-3xl border border-slate-300 bg-white/90 soft-shadow p-10 text-center">
        <p class="text-lg text-[var(--muted)]">No posts found yet.</p>
      </div>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>

    <?php
      $pagination_links = paginate_links(array(
        'total' => $grid_query->max_num_pages,
        'current' => $paged,
        'type' => 'array',
        'prev_text' => 'Previous',
        'next_text' => 'Next',
      ));
    ?>
    <?php if (!empty($pagination_links)) : ?>
      <nav class="pt-6">
        <div class="flex flex-wrap gap-3">
          <?php foreach ($pagination_links as $link) : ?>
            <?php
              $link = str_replace('page-numbers', 'mini-pill border border-slate-300 text-xs uppercase tracking-[0.2em] text-[var(--muted)]', $link);
              $link = str_replace('current', 'current bg-white/90 text-[var(--ink)]', $link);
            ?>
            <?php echo $link; ?>
          <?php endforeach; ?>
        </div>
      </nav>
    <?php endif; ?>
  </div>
</section>

<?php
get_footer();
