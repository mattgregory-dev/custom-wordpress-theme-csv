<?php
/**
 * Template Name: Earth Ceremony
 */
get_header(
  null,
  array(
    //'header_variant' => 'absolute',
    //'header_color' => 'white',
  )
);

while ( have_posts() ) :
  the_post();
?>

<section class="section bg-soft-cream">
  <div class="container mx-auto px-4 md:px-6 lg:px-8">
    <div class="text-center reveal mb-12">
      <div class="eyebrow">Free Teaching &middot; About 26 Minutes</div>
      <h1>You&rsquo;re in &mdash; press play whenever you&rsquo;re ready.</h1>
    </div>

    <div class="earth-ceremony-video reveal">
      <div class="earth-ceremony-video__frame">
        <?php /*
        <figure class="wp-block-video">
          <video controls preload="metadata" src="https://d2xya1zc5sh39g.cloudfront.net/get-your-feet-wet/how-to-create-earth-ceremony-with-sacred-plants.mp4"></video>
        </figure>
        */ ?>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/WLeFxda-BMA?si=03bJcqU0LU7TVAt2" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</section>

<div class="botanical-divider"></div>

<section class="section bg-warm-linen">
  <div class="container mx-auto px-4 md:px-6 lg:px-8">
    <div class="text-block mx-auto text-center reveal">
      <p class="pull-quote">
        For generations, <span class="accent">sage, sweetgrass, juniper,</span> and their plant kin have been called upon to mark sacred moments and carry our intentions into the world.
      </p>
      <p class="text-lg text-neutral-700">
        In this 26-minute teaching, Feather introduces the sacred plants, the meaning of ceremony, and how to set intention with care&thinsp;&mdash;&thinsp;closing with a live ceremony to the four directions, filmed from a vortex in the Sedona Red Rocks.
      </p>
    </div>
  </div>
</section>

<div class="botanical-divider"></div>

<section class="section bg-white">
  <div class="container mx-auto px-4 md:px-6 lg:px-8">
    <div class="text-block mx-auto text-center reveal">
      <div class="eyebrow">Go Deeper</div>
      <h2>Want to Spend More Time With the Plants?</h2>
      <p class="text-lg text-neutral-700 mb-10"><em>The Sacred Plants — Stories, Medicine, and Ceremony</em> explores each plant in greater depth&thinsp;&mdash;&thinsp;their stories, their medicine, and how they ask to be approached.</p>
      <a href="<?php echo esc_url( home_url( '/courses/' ) ); ?>" class="btn btn-primary">Explore Courses</a>
    </div>
  </div>
</section>

<section class="section bg-pale-sage-cream">
  <div class="container mx-auto px-4 md:px-6 lg:px-8">
    <div class="text-block mx-auto text-center reveal">
      <p class="text-lg italic text-neutral-700 mb-2">With care,</p>
      <h2 class="mb-0 italic">Feather</h2>
    </div>
  </div>
</section>

<?php
endwhile;

get_footer();
?>
