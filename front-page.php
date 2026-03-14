<?php
get_header(
  null,
  array(
    'header_variant' => 'absolute',
    'header_color' => 'white',
  )
);
?>

<?php
if ( have_posts() ) :
  while ( have_posts() ) :
    the_post();

    $raw_content = get_post_field( 'post_content', get_the_ID() );
    $blocks = parse_blocks( $raw_content );
    ?>

    <?php include get_template_directory() . '/partials/slots/hero-slot.php'; ?>

    <section class="py-24 px-8">
      <div class="max-w-3xl mx-auto text-center space-y-8">
        <?php get_template_part('partials/aya-motif') ?>

        <div class="text-gray-600 text-sm uppercase tracking-[0.2em] hidden">
          OUR APPROACH
        </div>

        <h2 class="text-3xl md:text-5xl text-gray-900 font-normal" style="line-height:1.4;">
          A Moment to Step Away
        </h2>

        <div class="space-y-6 text-gray-700 leading-relaxed pt-4 max-w-lg mx-auto text-lg">
          <p>
            Step away from daily life. Reconnect with yourself. Return home with greater clarity, perspective, and connection.
            <br><br>
            Lumina retreats create the space for meaningful personal exploration through preparation, ceremony, and integration — all held within the landscape and community of Sedona.
          </p>
        </div>
      </div>
    </section>

    <section id="steps" class="py-32 px-8 bg-[#d6e3e5]">
      <div class="max-w-6xl mx-auto">
        <div class="text-center space-y-4 mb-16">
          <h2 class="text-4xl text-gray-900 font-normal">
            The Journey of the Work
          </h2>
          <p class="text-gray-700 leading-relaxed max-w-2xl mx-auto">
            Each retreat unfolds through a thoughtful process designed to support safety, insight, and integration. Explore all steps.
          </p>
        </div>

        <?php get_template_part( 'partials/journey-steps', null, [ 'start' => true ] ); ?>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-6xl mx-auto">
        <div class="text-center space-y-4 mb-16">
          <h2 class="text-4xl text-gray-900 font-normal">
            What You'll Experience at Lumina
          </h2>
          <p class="text-gray-700 leading-relaxed max-w-2xl mx-auto">
            Lumina retreats are intentionally structured to support meaningful personal exploration within a calm and steady environment.
          </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
          <div class="space-y-4 p-8 bg-gray-50 border border-gray-200 rounded-lg soft-shadow">
            <div class="w-10 h-10 flex items-center justify-center">
              <svg class="cwp-icon" xmlns="http://www.w3.org/2000/svg" width="512px" height="512px" viewBox="-49 141 512 512">
                <polygon points="206.7,150 130.7,225.3 35.3,316 -40,391.3 -19.3,414.7 96,531.3 205.3,642.7 216,634.7 233.3,617.3 
                  426.7,420.7 452.7,392 446,380.7 352.7,290.7 252.7,192"/>
                <path d="M207.4,650.5c-1.6,0-3.2-0.6-4.3-1.8c0,0-247.8-253.3-247.9-253.4c-2.3-2.3-2.3-6.3,0.1-8.7l247.8-242.3
                  c0.1-0.1,0.1-0.1,0.2-0.2c2.3-2.1,5.9-2.1,8.2,0c0.1,0.1,0.1,0.1,0.2,0.2c0,0,247.7,242.2,247.9,242.3c2.3,2.3,2.5,6.2,0.1,8.7
                  c0,0-247.4,252.9-247.9,253.4C210.7,649.9,209.1,650.5,207.4,650.5L207.4,650.5z M117.8,430.2l89.7,199.3l89.7-199.3L117.8,430.2
                  L117.8,430.2z M311,429.4l-83.8,186.1l209.4-214L311,429.4z M-21.6,401.5l209.4,214L104,429.4L-21.6,401.5z M117.1,418h180.9
                  l-90.4-251.2L117.1,418z M222.3,171.7l88.3,245.3L443,387.5L222.3,171.7z M-28,387.5l132.4,29.4l88.3-245.3L-28,387.5z"/>
              </svg>
            </div>
            <div class="space-y-3">
              <h3 class="text-xl text-gray-900 font-normal">Preparation</h3>
              <p class="text-gray-600 leading-relaxed text-sm">
                Guidance before the retreat to help guests arrive grounded and ready.
              </p>
            </div>
          </div>

          <div class="space-y-4 p-8 bg-gray-50 border border-gray-200 rounded-lg soft-shadow">
            <div class="w-10 h-10 flex items-center justify-center">
              <svg class="cwp-icon" xmlns="http://www.w3.org/2000/svg" width="512px" height="512px" viewBox="-49 141 512 512">
                <polygon points="206.7,150 130.7,225.3 35.3,316 -40,391.3 -19.3,414.7 96,531.3 205.3,642.7 216,634.7 233.3,617.3 
                  426.7,420.7 452.7,392 446,380.7 352.7,290.7 252.7,192"/>
                <path d="M207.4,650.5c-1.6,0-3.2-0.6-4.3-1.8c0,0-247.8-253.3-247.9-253.4c-2.3-2.3-2.3-6.3,0.1-8.7l247.8-242.3
                  c0.1-0.1,0.1-0.1,0.2-0.2c2.3-2.1,5.9-2.1,8.2,0c0.1,0.1,0.1,0.1,0.2,0.2c0,0,247.7,242.2,247.9,242.3c2.3,2.3,2.5,6.2,0.1,8.7
                  c0,0-247.4,252.9-247.9,253.4C210.7,649.9,209.1,650.5,207.4,650.5L207.4,650.5z M117.8,430.2l89.7,199.3l89.7-199.3L117.8,430.2
                  L117.8,430.2z M311,429.4l-83.8,186.1l209.4-214L311,429.4z M-21.6,401.5l209.4,214L104,429.4L-21.6,401.5z M117.1,418h180.9
                  l-90.4-251.2L117.1,418z M222.3,171.7l88.3,245.3L443,387.5L222.3,171.7z M-28,387.5l132.4,29.4l88.3-245.3L-28,387.5z"/>
              </svg>
            </div>
            <div class="space-y-3">
              <h3 class="text-xl text-gray-900 font-normal">Ceremony</h3>
              <p class="text-gray-600 leading-relaxed text-sm">
                Held within a safe and supportive ceremonial environment.
              </p>
            </div>
          </div>

          <div class="space-y-4 p-8 bg-gray-50 border border-gray-200 rounded-lg soft-shadow">
            <div class="w-10 h-10 flex items-center justify-center">
              <svg class="cwp-icon" xmlns="http://www.w3.org/2000/svg" width="512px" height="512px" viewBox="-49 141 512 512">
                <polygon points="206.7,150 130.7,225.3 35.3,316 -40,391.3 -19.3,414.7 96,531.3 205.3,642.7 216,634.7 233.3,617.3 
                  426.7,420.7 452.7,392 446,380.7 352.7,290.7 252.7,192"/>
                <path d="M207.4,650.5c-1.6,0-3.2-0.6-4.3-1.8c0,0-247.8-253.3-247.9-253.4c-2.3-2.3-2.3-6.3,0.1-8.7l247.8-242.3
                  c0.1-0.1,0.1-0.1,0.2-0.2c2.3-2.1,5.9-2.1,8.2,0c0.1,0.1,0.1,0.1,0.2,0.2c0,0,247.7,242.2,247.9,242.3c2.3,2.3,2.5,6.2,0.1,8.7
                  c0,0-247.4,252.9-247.9,253.4C210.7,649.9,209.1,650.5,207.4,650.5L207.4,650.5z M117.8,430.2l89.7,199.3l89.7-199.3L117.8,430.2
                  L117.8,430.2z M311,429.4l-83.8,186.1l209.4-214L311,429.4z M-21.6,401.5l209.4,214L104,429.4L-21.6,401.5z M117.1,418h180.9
                  l-90.4-251.2L117.1,418z M222.3,171.7l88.3,245.3L443,387.5L222.3,171.7z M-28,387.5l132.4,29.4l88.3-245.3L-28,387.5z"/>
              </svg>
            </div>
            <div class="space-y-3">
              <h3 class="text-xl text-gray-900 font-normal">Integration</h3>
              <p class="text-gray-600 leading-relaxed text-sm">
                Space for reflection and continued support after the retreat.
              </p>
            </div>
          </div>

          <div class="space-y-4 p-8 bg-gray-50 border border-gray-200 rounded-lg soft-shadow">
            <div class="w-10 h-10 flex items-center justify-center">
              <svg class="cwp-icon" xmlns="http://www.w3.org/2000/svg" width="512px" height="512px" viewBox="-49 141 512 512">
                <polygon points="206.7,150 130.7,225.3 35.3,316 -40,391.3 -19.3,414.7 96,531.3 205.3,642.7 216,634.7 233.3,617.3 
                  426.7,420.7 452.7,392 446,380.7 352.7,290.7 252.7,192"/>
                <path d="M207.4,650.5c-1.6,0-3.2-0.6-4.3-1.8c0,0-247.8-253.3-247.9-253.4c-2.3-2.3-2.3-6.3,0.1-8.7l247.8-242.3
                  c0.1-0.1,0.1-0.1,0.2-0.2c2.3-2.1,5.9-2.1,8.2,0c0.1,0.1,0.1,0.1,0.2,0.2c0,0,247.7,242.2,247.9,242.3c2.3,2.3,2.5,6.2,0.1,8.7
                  c0,0-247.4,252.9-247.9,253.4C210.7,649.9,209.1,650.5,207.4,650.5L207.4,650.5z M117.8,430.2l89.7,199.3l89.7-199.3L117.8,430.2
                  L117.8,430.2z M311,429.4l-83.8,186.1l209.4-214L311,429.4z M-21.6,401.5l209.4,214L104,429.4L-21.6,401.5z M117.1,418h180.9
                  l-90.4-251.2L117.1,418z M222.3,171.7l88.3,245.3L443,387.5L222.3,171.7z M-28,387.5l132.4,29.4l88.3-245.3L-28,387.5z"/>
              </svg>
            </div>
            <div class="space-y-3">
              <h3 class="text-xl text-gray-900 font-normal">Support</h3>
              <p class="text-gray-600 leading-relaxed text-sm">
                Experienced facilitators and a small group container.
              </p>
            </div>
          </div>

          <div class="space-y-4 p-8 bg-gray-50 border border-gray-200 rounded-lg soft-shadow">
            <div class="w-10 h-10 flex items-center justify-center">
              <svg class="cwp-icon" xmlns="http://www.w3.org/2000/svg" width="512px" height="512px" viewBox="-49 141 512 512">
                <polygon points="206.7,150 130.7,225.3 35.3,316 -40,391.3 -19.3,414.7 96,531.3 205.3,642.7 216,634.7 233.3,617.3 
                  426.7,420.7 452.7,392 446,380.7 352.7,290.7 252.7,192"/>
                <path d="M207.4,650.5c-1.6,0-3.2-0.6-4.3-1.8c0,0-247.8-253.3-247.9-253.4c-2.3-2.3-2.3-6.3,0.1-8.7l247.8-242.3
                  c0.1-0.1,0.1-0.1,0.2-0.2c2.3-2.1,5.9-2.1,8.2,0c0.1,0.1,0.1,0.1,0.2,0.2c0,0,247.7,242.2,247.9,242.3c2.3,2.3,2.5,6.2,0.1,8.7
                  c0,0-247.4,252.9-247.9,253.4C210.7,649.9,209.1,650.5,207.4,650.5L207.4,650.5z M117.8,430.2l89.7,199.3l89.7-199.3L117.8,430.2
                  L117.8,430.2z M311,429.4l-83.8,186.1l209.4-214L311,429.4z M-21.6,401.5l209.4,214L104,429.4L-21.6,401.5z M117.1,418h180.9
                  l-90.4-251.2L117.1,418z M222.3,171.7l88.3,245.3L443,387.5L222.3,171.7z M-28,387.5l132.4,29.4l88.3-245.3L-28,387.5z"/>
              </svg>
            </div>
            <div class="space-y-3">
              <h3 class="text-xl text-gray-900 font-normal">Nature</h3>
              <p class="text-gray-600 leading-relaxed text-sm">
                Quiet landscapes and natural beauty support presence and grounding.
              </p>
            </div>
          </div>

          <div class="space-y-4 p-8 bg-gray-50 border border-gray-200 rounded-lg soft-shadow">
            <div class="w-10 h-10 flex items-center justify-center">
              <svg class="cwp-icon" xmlns="http://www.w3.org/2000/svg" width="512px" height="512px" viewBox="-49 141 512 512">
                <polygon points="206.7,150 130.7,225.3 35.3,316 -40,391.3 -19.3,414.7 96,531.3 205.3,642.7 216,634.7 233.3,617.3 
                  426.7,420.7 452.7,392 446,380.7 352.7,290.7 252.7,192"/>
                <path d="M207.4,650.5c-1.6,0-3.2-0.6-4.3-1.8c0,0-247.8-253.3-247.9-253.4c-2.3-2.3-2.3-6.3,0.1-8.7l247.8-242.3
                  c0.1-0.1,0.1-0.1,0.2-0.2c2.3-2.1,5.9-2.1,8.2,0c0.1,0.1,0.1,0.1,0.2,0.2c0,0,247.7,242.2,247.9,242.3c2.3,2.3,2.5,6.2,0.1,8.7
                  c0,0-247.4,252.9-247.9,253.4C210.7,649.9,209.1,650.5,207.4,650.5L207.4,650.5z M117.8,430.2l89.7,199.3l89.7-199.3L117.8,430.2
                  L117.8,430.2z M311,429.4l-83.8,186.1l209.4-214L311,429.4z M-21.6,401.5l209.4,214L104,429.4L-21.6,401.5z M117.1,418h180.9
                  l-90.4-251.2L117.1,418z M222.3,171.7l88.3,245.3L443,387.5L222.3,171.7z M-28,387.5l132.4,29.4l88.3-245.3L-28,387.5z"/>
              </svg>
            </div>
            <div class="space-y-3">
              <h3 class="text-xl text-gray-900 font-normal">Small Groups</h3>
              <p class="text-gray-600 leading-relaxed text-sm">
                Limited group sizes allow for meaningful connection and personal attention.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-7xl mx-auto">
        <div class="grid md:grid-cols-2 gap-16 items-center">
          <div class="flex items-center justify-center">
            <img class="page-image" src="<?php echo esc_url( get_template_directory_uri() . '/images/bg/mdsH0k7uoQk.webp' ); ?>">
          </div>

          <div class="space-y-6">
            <h2 class="text-4xl text-gray-900 font-normal">
              Sedona, The Perfect Place for a Reset
            </h2>

            <div class="space-y-6 text-gray-700 leading-relaxed">
              <p>
                Sedona is known for taking one's breath away. It's the perfect place to unplug, unwind, turn our focus inward, and ask the deeper questions — surrounded by both natural beauty and a supportive community.
              </p>
              <p class="pt-2">
                The quiet desert landscapes, open skies, and sweeping red rock formations create a sense of space — the kind that invites reflection, presence, and grounding.
              </p>
              <p class="pt-2">
                <strong>At Lumina, the natural beauty of Sedona is part of every retreat experience.</strong>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="retreats" class="py-32 px-8">
      <div class="max-w-6xl mx-auto">
        <div class="text-center space-y-4 mb-16">
          <h2 class="text-4xl text-gray-900 font-normal">
            Upcoming Retreats
          </h2>
          <p class="text-gray-700 leading-relaxed">
            Explore upcoming retreat opportunities held in Sedona.
          </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8 mb-8">

          <div class="overflow-hidden soft-shadow rounded-b-lg">
            <div class="flex items-center justify-center">
              <img class="retreat-thumb" src="<?php echo esc_url( get_template_directory_uri() . '/images/bg/7AcMUSYRZpU-800.webp' ); ?>">
            </div>
            <div class="p-8 space-y-6 border-2 border-gray-300 border-t-[0] rounded-b-lg">
              <div class="space-y-3">
                <h3 class="text-2xl text-gray-900 font-normal">Quiet River Retreat</h3>
                <div class="text-sm text-gray-600">
                  <div>May 12&ndash;16</div>
                  <div>5 Days &bull; Sedona, Arizona</div>
                </div>
              </div>
              <p class="text-gray-700 leading-relaxed">
                A small group retreat designed for deep personal reflection, guided ceremony, and integration support.
              </p>
              <div class="grid md:grid-cols-2 gap-4">
                <a class="cwp-btn cwp-btn--primary" href="<?php echo esc_url( home_url( '/apply/' ) ); ?>">Apply</a>
                <a style="display:none;" class="cwp-btn cwp-btn--secondary hidden" href="<?php echo esc_url( home_url( '/' ) ); ?>">View Details</a>
              </div>
            </div>
          </div>

          <div class="overflow-hidden soft-shadow rounded-b-lg">
            <div class="aspect-[16/10] flex items-center justify-center">
              <img class="retreat-thumb" src="<?php echo esc_url( get_template_directory_uri() . '/images/bg/7AcMUSYRZpU-800.webp' ); ?>">
            </div>
            <div class="p-8 space-y-6 border-2 border-gray-300 border-t-[0] rounded-b-lg">
              <div class="space-y-3">
                <h3 class="text-2xl text-gray-900 font-normal">Desert Spring Retreat</h3>
                <div class="text-sm text-gray-600">
                  <div>June 8&ndash;12</div>
                  <div>5 Days &bull; Sedona, Arizona</div>
                </div>
              </div>
              <p class="text-gray-700 leading-relaxed">
                An intimate retreat experience focused on inner clarity, nervous system care, and supported transformation.
              </p>
              <div class="grid md:grid-cols-2 gap-4">
                <a class="cwp-btn cwp-btn--primary" href="<?php echo esc_url( home_url( '/apply/' ) ); ?>">Apply</a>
                <a style="display:none;" class="cwp-btn cwp-btn--secondary" href="<?php echo esc_url( home_url( '/' ) ); ?>">View Details</a>
              </div>
            </div>
          </div>

        </div>

        <div class="text-center mt-18">
          <a href="<?php echo esc_url( home_url( '/retreats/#retreats' ) ); ?>" class="inline-block text-gray-900 hover:text-gray-700 border-b border-gray-900 pb-1">
            View All Retreats
          </a>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
          <h2 class="text-4xl text-gray-900 font-normal">
            What Guests Discovered
          </h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
          <div class="bg-white p-8 border border-gray-200 space-y-6 soft-shadow rounded-lg">
            <p class="text-gray-700 leading-relaxed italic">
              &ldquo;This retreat helped me reconnect with clarity and compassion for myself in a way I hadn&rsquo;t experienced before.&rdquo;
            </p>
            <div class="pt-4 border-t border-gray-200">
              <div class="text-sm text-gray-900 font-normal">Sarah M.</div>
              <div class="text-sm text-gray-600">Portland, OR</div>
            </div>
          </div>

          <div class="bg-white p-8 border border-gray-200 space-y-6 soft-shadow rounded-lg">
            <p class="text-gray-700 leading-relaxed italic">
              &ldquo;The careful preparation and integration support made all the difference. I felt held throughout the entire process.&rdquo;
            </p>
            <div class="pt-4 border-t border-gray-200">
              <div class="text-sm text-gray-900 font-normal">David L.</div>
              <div class="text-sm text-gray-600">Austin, TX</div>
            </div>
          </div>

          <div class="bg-white p-8 border border-gray-200 space-y-6 soft-shadow rounded-lg">
            <p class="text-gray-700 leading-relaxed italic">
              &ldquo;Lumina created a space where I could finally slow down and listen to what was already within me.&rdquo;
            </p>
            <div class="pt-4 border-t border-gray-200">
              <div class="text-sm text-gray-900 font-normal">Jennifer K.</div>
              <div class="text-sm text-gray-600">Seattle, WA</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-5xl mx-auto">
        <div class="text-center mb-16">
          <h2 class="text-4xl text-gray-900 font-normal">
            Meet Your Guides
          </h2>
        </div>

        <?php include get_template_directory() . '/partials/meet-guides-grid.php'; ?>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-5xl mx-auto">
        <div class="text-center space-y-6 mb-16">
          <h2 class="text-4xl text-gray-900 font-normal">
            Safety and Care
          </h2>

          <div class="space-y-4 text-gray-700 leading-relaxed max-w-xl mx-auto">
            <p>
              Retreats are held within a thoughtful framework of preparation, ethical facilitation, and integration support.
            </p>
            <p class="pt-2">
              Participants are guided through clear preparation steps and supported throughout the entire experience.
            </p>
          </div>
        </div>

        <div class="grid md:grid-cols-4 gap-6">
          <div class="bg-white p-6 border border-gray-200 text-center space-y-4 rounded-lg soft-shadow">
            <div class="w-12 h-12 mx-auto flex items-center justify-center">
              <svg class="cwp-icon" xmlns="http://www.w3.org/2000/svg" width="512px" height="512px" viewBox="-49 141 512 512">
                <polygon points="206.7,150 130.7,225.3 35.3,316 -40,391.3 -19.3,414.7 96,531.3 205.3,642.7 216,634.7 233.3,617.3 
                  426.7,420.7 452.7,392 446,380.7 352.7,290.7 252.7,192"/>
                <path d="M207.4,650.5c-1.6,0-3.2-0.6-4.3-1.8c0,0-247.8-253.3-247.9-253.4c-2.3-2.3-2.3-6.3,0.1-8.7l247.8-242.3
                  c0.1-0.1,0.1-0.1,0.2-0.2c2.3-2.1,5.9-2.1,8.2,0c0.1,0.1,0.1,0.1,0.2,0.2c0,0,247.7,242.2,247.9,242.3c2.3,2.3,2.5,6.2,0.1,8.7
                  c0,0-247.4,252.9-247.9,253.4C210.7,649.9,209.1,650.5,207.4,650.5L207.4,650.5z M117.8,430.2l89.7,199.3l89.7-199.3L117.8,430.2
                  L117.8,430.2z M311,429.4l-83.8,186.1l209.4-214L311,429.4z M-21.6,401.5l209.4,214L104,429.4L-21.6,401.5z M117.1,418h180.9
                  l-90.4-251.2L117.1,418z M222.3,171.7l88.3,245.3L443,387.5L222.3,171.7z M-28,387.5l132.4,29.4l88.3-245.3L-28,387.5z"/>
              </svg>
            </div>
            <h3 class="text-sm text-gray-900 font-normal">Medical Screening</h3>
          </div>
          <div class="bg-white p-6 border border-gray-200 text-center space-y-4 rounded-lg soft-shadow">
            <div class="w-12 h-12 mx-auto flex items-center justify-center">
              <svg class="cwp-icon" xmlns="http://www.w3.org/2000/svg" width="512px" height="512px" viewBox="-49 141 512 512">
                <polygon points="206.7,150 130.7,225.3 35.3,316 -40,391.3 -19.3,414.7 96,531.3 205.3,642.7 216,634.7 233.3,617.3 
                  426.7,420.7 452.7,392 446,380.7 352.7,290.7 252.7,192"/>
                <path d="M207.4,650.5c-1.6,0-3.2-0.6-4.3-1.8c0,0-247.8-253.3-247.9-253.4c-2.3-2.3-2.3-6.3,0.1-8.7l247.8-242.3
                  c0.1-0.1,0.1-0.1,0.2-0.2c2.3-2.1,5.9-2.1,8.2,0c0.1,0.1,0.1,0.1,0.2,0.2c0,0,247.7,242.2,247.9,242.3c2.3,2.3,2.5,6.2,0.1,8.7
                  c0,0-247.4,252.9-247.9,253.4C210.7,649.9,209.1,650.5,207.4,650.5L207.4,650.5z M117.8,430.2l89.7,199.3l89.7-199.3L117.8,430.2
                  L117.8,430.2z M311,429.4l-83.8,186.1l209.4-214L311,429.4z M-21.6,401.5l209.4,214L104,429.4L-21.6,401.5z M117.1,418h180.9
                  l-90.4-251.2L117.1,418z M222.3,171.7l88.3,245.3L443,387.5L222.3,171.7z M-28,387.5l132.4,29.4l88.3-245.3L-28,387.5z"/>
              </svg>
            </div>
            <h3 class="text-sm text-gray-900 font-normal">Dieta Guidance</h3>
          </div>
          <div class="bg-white p-6 border border-gray-200 text-center space-y-4 rounded-lg soft-shadow">
            <div class="w-12 h-12 mx-auto flex items-center justify-center">
              <svg class="cwp-icon" xmlns="http://www.w3.org/2000/svg" width="512px" height="512px" viewBox="-49 141 512 512">
                <polygon points="206.7,150 130.7,225.3 35.3,316 -40,391.3 -19.3,414.7 96,531.3 205.3,642.7 216,634.7 233.3,617.3 
                  426.7,420.7 452.7,392 446,380.7 352.7,290.7 252.7,192"/>
                <path d="M207.4,650.5c-1.6,0-3.2-0.6-4.3-1.8c0,0-247.8-253.3-247.9-253.4c-2.3-2.3-2.3-6.3,0.1-8.7l247.8-242.3
                  c0.1-0.1,0.1-0.1,0.2-0.2c2.3-2.1,5.9-2.1,8.2,0c0.1,0.1,0.1,0.1,0.2,0.2c0,0,247.7,242.2,247.9,242.3c2.3,2.3,2.5,6.2,0.1,8.7
                  c0,0-247.4,252.9-247.9,253.4C210.7,649.9,209.1,650.5,207.4,650.5L207.4,650.5z M117.8,430.2l89.7,199.3l89.7-199.3L117.8,430.2
                  L117.8,430.2z M311,429.4l-83.8,186.1l209.4-214L311,429.4z M-21.6,401.5l209.4,214L104,429.4L-21.6,401.5z M117.1,418h180.9
                  l-90.4-251.2L117.1,418z M222.3,171.7l88.3,245.3L443,387.5L222.3,171.7z M-28,387.5l132.4,29.4l88.3-245.3L-28,387.5z"/>
              </svg>
            </div>
            <h3 class="text-sm text-gray-900 font-normal">Nervous System Care</h3>
          </div>
          <div class="bg-white p-6 border border-gray-200 text-center space-y-4 rounded-lg soft-shadow">
            <div class="w-12 h-12 mx-auto flex items-center justify-center">
              <svg class="cwp-icon" xmlns="http://www.w3.org/2000/svg" width="512px" height="512px" viewBox="-49 141 512 512">
                <polygon points="206.7,150 130.7,225.3 35.3,316 -40,391.3 -19.3,414.7 96,531.3 205.3,642.7 216,634.7 233.3,617.3 
                  426.7,420.7 452.7,392 446,380.7 352.7,290.7 252.7,192"/>
                <path d="M207.4,650.5c-1.6,0-3.2-0.6-4.3-1.8c0,0-247.8-253.3-247.9-253.4c-2.3-2.3-2.3-6.3,0.1-8.7l247.8-242.3
                  c0.1-0.1,0.1-0.1,0.2-0.2c2.3-2.1,5.9-2.1,8.2,0c0.1,0.1,0.1,0.1,0.2,0.2c0,0,247.7,242.2,247.9,242.3c2.3,2.3,2.5,6.2,0.1,8.7
                  c0,0-247.4,252.9-247.9,253.4C210.7,649.9,209.1,650.5,207.4,650.5L207.4,650.5z M117.8,430.2l89.7,199.3l89.7-199.3L117.8,430.2
                  L117.8,430.2z M311,429.4l-83.8,186.1l209.4-214L311,429.4z M-21.6,401.5l209.4,214L104,429.4L-21.6,401.5z M117.1,418h180.9
                  l-90.4-251.2L117.1,418z M222.3,171.7l88.3,245.3L443,387.5L222.3,171.7z M-28,387.5l132.4,29.4l88.3-245.3L-28,387.5z"/>
              </svg>
            </div>
            <h3 class="text-sm text-gray-900 font-normal">Integration Support</h3>
          </div>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-3xl mx-auto text-center space-y-8">
        <h2 class="text-4xl md:text-5xl text-gray-900 font-normal leading-[1.3]">
          Ready to explore this work?
        </h2>

        <p class="text-lg text-gray-700 leading-relaxed">
          If you feel called to explore this work, we invite you to learn more about the retreat process or begin a conversation.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4">
          <a class="cwp-btn cwp-btn--primary" href="<?php echo esc_url( home_url( '/orientation/' ) ); ?>">
            Explore The Journey
          </a>
          <a class="cwp-btn cwp-btn--secondary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
            Contact Us
          </a>
        </div>
      </div>
    </section>

    <section class="py-32 px-8 bg-[#c3ddd5]">
      <div class="max-w-2xl mx-auto">

        <div class="text-center space-y-4 mb-12">
          <h2 class="text-4xl text-gray-900 font-normal">
            Have Questions? Let's Talk
          </h2>
          <p class="text-gray-700 leading-relaxed">
            If you have questions or would like to learn more, reach out and we will respond with care.
          </p>
        </div>

        <?php echo do_shortcode('[forminator_form id="213"]'); ?>
      </div>
    </section>

    <?php
  endwhile;
endif;
?>

<?php
get_footer();
