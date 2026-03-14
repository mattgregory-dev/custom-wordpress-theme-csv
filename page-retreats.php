<?php
/**
 * Template Name: Retreats
 */
get_header(
  null,
  array(
    'header_variant' => 'absolute',
    //'header_color' => 'white',
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

    <section class="page-hero">
      <div class="hero-wrapper">
        <div class="hero-eyebrow-wrapper">
          <span class="hero-eyebrow">Retreats</span>
        </div>
        <h1 class="hero-title">Upcoming Retreats in Sedona</h1>
        <p class="hero-description">Small group retreats designed for depth, care, and meaningful personal transformation.</p>
        <div class="hero-actions-wrapper">
          <a class="cwp-btn cwp-btn--primary" href="#retreats">
            View Upcoming Retreats
          </a>
          <a class="cwp-btn cwp-btn--secondary" href="/apply/">
            Apply
          </a>
        </div>
        <div class="flex flex-wrap gap-3 justify-center pt-24">
          <span class="px-4 py-2 border border-gray-400 text-gray-700 text-sm rounded-md bg-[#f0f8ff]">Small Groups</span>
          <span class="px-4 py-2 border border-gray-400 text-gray-700 text-sm rounded-md bg-[#f0f8ff]">Sedona, Arizona</span>
          <span class="px-4 py-2 border border-gray-400 text-gray-700 text-sm rounded-md bg-[#f0f8ff]">Guided Ceremonies</span>
        </div>
      </div>
    </section>

    <section id="retreats" class="py-32 px-8">
      <div class="max-w-7xl mx-auto">
        <div class="max-w-3xl mx-auto text-center mb-20">
          <h2 class="text-gray-900 mb-6 text-[2.5rem] font-normal">
            Choose Your Retreat
          </h2>
          <p class="text-gray-700 leading-relaxed text-lg">
            Each retreat is held in a small group setting with preparation, ceremony, and integration support.
          </p>
        </div>

        <div class="grid md:grid-cols-2 gap-12">

          <div class="soft-shadow rounded-b-lg">
            <div class="flex items-center justify-center relative">
              <img class="retreat-thumb" src="<?php echo esc_url( get_template_directory_uri() . '/images/bg/7AcMUSYRZpU-800.webp' ); ?>">
              <span class="absolute top-4 right-4 px-3 py-1 bg-white border border-gray-400 text-gray-700 text-xs uppercase tracking-wider rounded-md">
                Small Group
              </span>
            </div>
            <div class="p-8 space-y-6 border-2 border-gray-300 border-t-[0] rounded-b-lg">
              <h3 class="text-gray-900 text-[1.75rem] font-normal">Quiet River Retreat</h3>
              <div class="grid grid-cols-2 gap-4 text-sm">
                <div>
                  <p class="text-gray-500 uppercase tracking-wider text-xs mb-1">Dates</p>
                  <p class="text-gray-900">May 12&ndash;16</p>
                </div>
                <div>
                  <p class="text-gray-500 uppercase tracking-wider text-xs mb-1">Duration</p>
                  <p class="text-gray-900">5 Days</p>
                </div>
                <div class="col-span-2">
                  <p class="text-gray-500 uppercase tracking-wider text-xs mb-1">Location</p>
                  <p class="text-gray-900">Sedona, Arizona</p>
                </div>
              </div>
              <p class="text-gray-700 leading-relaxed">
                A small group retreat designed for deep personal reflection, guided ceremony, and integration support.
              </p>
              <div class="pt-2">
                <p class="text-gray-500 text-sm mb-1">Starting From</p>
                <p class="text-gray-900 text-2xl">$2,500</p>
              </div>
              <div class="grid md:grid-cols-2 gap-12">
                <a class="cwp-btn cwp-btn--primary" href="<?php echo esc_url( home_url( '/apply/' ) ); ?>">Apply</a>
                <a style="visibility:hidden;" class="cwp-btn cwp-btn--secondary" href="#">Details</a>
              </div>
            </div>
          </div>

          <div class="soft-shadow rounded-b-lg">
            <div class="flex items-center justify-center relative">
              <img class="retreat-thumb" src="<?php echo esc_url( get_template_directory_uri() . '/images/bg/7AcMUSYRZpU-800.webp' ); ?>">
              <span class="absolute top-4 right-4 px-3 py-1 bg-white border border-gray-400 text-gray-700 text-xs uppercase tracking-wider rounded-md">
                Limited Spots
              </span>
            </div>
            <div class="p-8 space-y-6 border-2 border-gray-300 border-t-[0] rounded-b-lg">
              <h3 class="text-gray-900 text-[1.75rem] font-normal">Desert Awakening Retreat</h3>
              <div class="grid grid-cols-2 gap-4 text-sm">
                <div>
                  <p class="text-gray-500 uppercase tracking-wider text-xs mb-1">Dates</p>
                  <p class="text-gray-900">June 8&ndash;12</p>
                </div>
                <div>
                  <p class="text-gray-500 uppercase tracking-wider text-xs mb-1">Duration</p>
                  <p class="text-gray-900">5 Days</p>
                </div>
                <div class="col-span-2">
                  <p class="text-gray-500 uppercase tracking-wider text-xs mb-1">Location</p>
                  <p class="text-gray-900">Sedona, Arizona</p>
                </div>
              </div>
              <p class="text-gray-700 leading-relaxed">
                An immersive experience for those seeking clarity, guided transformation, and meaningful connection.
              </p>
              <div class="pt-2">
                <p class="text-gray-500 text-sm mb-1">Starting From</p>
                <p class="text-gray-900 text-2xl">$2,500</p>
              </div>
              <div class="grid md:grid-cols-2 gap-12">
                <a class="cwp-btn cwp-btn--primary" href="<?php echo esc_url( home_url( '/apply/' ) ); ?>">Apply</a>
                <a style="visibility:hidden;" class="cwp-btn cwp-btn--secondary" href="#">Details</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-6xl mx-auto">
        <div class="max-w-xl mx-auto text-center mb-20">
          <h2 class="text-gray-900 mb-6 text-[2.5rem] font-normal">
            What&rsquo;s Included
          </h2>
          <p class="text-gray-700 leading-relaxed text-lg">
            Each retreat is designed to help guests feel safe, grounded, and supported throughout the experience.
          </p>
        </div>

        <div class="grid md:grid-cols-3 gap-12">
          <div class="space-y-4">
            <div class="w-16 h-16 flex items-center justify-center">
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
            <div class="space-y-2">
              <h3 class="text-gray-900 text-[1.25rem] font-normal">Preparation</h3>
              <p class="text-gray-700 leading-relaxed">Guidance before the retreat to help guests arrive grounded and ready.</p>
            </div>
          </div>

          <div class="space-y-4">
            <div class="w-16 h-16 flex items-center justify-center">
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
            <div class="space-y-2">
              <h3 class="text-gray-900 text-[1.25rem] font-normal">Ceremony</h3>
              <p class="text-gray-700 leading-relaxed">Guided ceremonial work held within a safe and intentional environment.</p>
            </div>
          </div>

          <div class="space-y-4">
            <div class="w-16 h-16 flex items-center justify-center">
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
            <div class="space-y-2">
              <h3 class="text-gray-900 text-[1.25rem] font-normal">Integration</h3>
              <p class="text-gray-700 leading-relaxed">Opportunities for reflection and continued support after the retreat.</p>
            </div>
          </div>

          <div class="space-y-4">
            <div class="w-16 h-16 flex items-center justify-center">
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
            <div class="space-y-2">
              <h3 class="text-gray-900 text-[1.25rem] font-normal">Accommodation Options</h3>
              <p class="text-gray-700 leading-relaxed">Retreat lodging options may be available depending on the retreat.</p>
            </div>
          </div>

          <div class="space-y-4">
            <div class="w-16 h-16 flex items-center justify-center">
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
            <div class="space-y-2">
              <h3 class="text-gray-900 text-[1.25rem] font-normal">Meals</h3>
              <p class="text-gray-700 leading-relaxed">Simple, nourishing meals are provided during the retreat.</p>
            </div>
          </div>

          <div class="space-y-4">
            <div class="w-16 h-16 flex items-center justify-center">
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
            <div class="space-y-2">
              <h3 class="text-gray-900 text-[1.25rem] font-normal">Support</h3>
              <p class="text-gray-700 leading-relaxed">Experienced facilitators and a small group environment.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-7xl mx-auto">
        <div class="grid md:grid-cols-2 gap-20 items-start">
          <div class="md:order-1">
            <div class="flex items-center justify-center ">
              <img class="page-image" src="<?php echo esc_url( get_template_directory_uri() . '/images/bg/ihMps87XgEQ.webp' ); ?>">
            </div>
          </div>

          <div class="space-y-8 md:order-2">
            <div class="space-y-6">
              <h2 class="text-gray-900 text-[2.5rem] font-normal">
                Bringing You the Best Possible Experience
              </h2>

              <p class="text-gray-700 leading-relaxed text-lg">

                Lumina retreats bring together the best of what we've learned across our collective journeys.
                <br><br>
                Our team pours this collective experience into every retreat — from thoughtful preparation and strong support to the care and safety that allow people to fully meet the experience.
                <br><br>
                Sedona is part of that intention. Its breathtaking landscapes invite people to slow down, breathe deeply, and step away from the noise of everyday life.
                <br><br>
                From the place we gather, to the structure of the retreats, to the food we share and the community we create — every detail is chosen with care.
                <br><br>
                Lumina retreats are designed to create the conditions for meaningful personal exploration. They offer a chance to step away from daily life, explore what's within, and share the experience with others walking a similar path.
                <br><br>
                We welcome you. Join us.

              </p>
            </div>

            <div class="py-8">
              <div class="h-px bg-gray-300 w-24"></div>
            </div>

            <div class="grid gap-8 pt-4 md:grid-cols-2">
              <ul class="space-y-4 text-left styled-list">
                <li><i class="fa fa-check"></i> Small group container</li>
                <li><i class="fa fa-check"></i> Guided ceremonies</li>
                <li><i class="fa fa-check"></i> Time for reflection and rest</li>
              </ul>
              <ul class="space-y-4 text-left styled-list">
                <li><i class="fa fa-check"></i> Supportive facilitation</li>
                <li><i class="fa fa-check"></i> Integration conversations</li>
                <li><i class="fa fa-check"></i> Nature and quiet surroundings</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-7xl mx-auto">
        <div class="grid md:grid-cols-2 gap-16 items-center">
          <div class="space-y-12">
            <div class="space-y-4">
              <h2 class="text-gray-900 text-[2.5rem] font-normal">
                Traveling to Sedona
              </h2>
              <p class="text-gray-700 leading-relaxed text-lg">
                Planning your visit helps create a smooth and relaxed arrival experience.
              </p>
            </div>

            <div class="space-y-8">
              <div class="space-y-2">
                <h3 class="text-gray-900 text-[1.25rem] font-normal">Getting Here</h3>
                <p class="text-gray-700 leading-relaxed">
                  Sedona is approximately 1 hour and 30 minutes from Phoenix Sky Harbor International Airport.
                </p>
              </div>
              <div class="space-y-2">
                <h3 class="text-gray-900 text-[1.25rem] font-normal">Transportation</h3>
                <p class="text-gray-700 leading-relaxed content">
                  Airport shuttle services are available, see <a href="https://groometransportation.com/sedona/" target="_blank">Groome Transportation</a> for details.
                </p>
              </div>
              <div class="space-y-2">
                <h3 class="text-gray-900 text-[1.25rem] font-normal">Accommodations</h3>
                <p class="text-gray-700 leading-relaxed">
                  If staying before or after the retreat, we recommend booking early. Sedona hotels can fill quickly during peak seasons.
                </p>
              </div>
              <div class="space-y-2">
                <h3 class="text-gray-900 text-[1.25rem] font-normal">Meals</h3>
                <p class="text-gray-700 leading-relaxed">
                  Meals are provided during the retreat. Additional details are listed on each retreat page.
                </p>
              </div>
            </div>
          </div>

          <div class="space-y-6">
            <div class="flex items-center justify-center">
              <img class="page-image" src="<?php echo esc_url( get_template_directory_uri() . '/images/sedona-red-rocks.webp' ); ?>">
            </div>
            <div class="flex items-center justify-center">
              <img class="page-image" src="<?php echo esc_url( get_template_directory_uri() . '/images/sedona-airport-shuttle.webp' ); ?>">
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-4xl mx-auto">
        <div class="text-center mb-20">
          <h2 class="text-gray-900 text-[2.5rem] font-normal">
            Frequently Asked Questions
          </h2>
        </div>

        <div class="space-y-4">
          <details class="border-2 border-gray-300 bg-white">
            <summary class="px-8 py-6 flex items-center justify-between cursor-pointer hover:bg-gray-50 transition-colors">
              <h3 class="text-gray-900 pr-8 text-[1.25rem] font-normal">How many people attend each retreat?</h3>
              <div class="flex-shrink-0">
                <div class="w-6 h-6 border-2 border-gray-900 flex items-center justify-center">
                  <div class="text-gray-900 text-xl leading-none plus-icon">+</div>
                </div>
              </div>
            </summary>
            <div class="px-8 pb-6 border-t-2 border-gray-200 pt-6">
              <p class="text-gray-700 leading-relaxed">
                Our retreats are intentionally kept small, typically hosting between 6-10 participants. This allows for personalized attention, meaningful connection, and a safe container for deep work.
              </p>
            </div>
          </details>

          <details class="border-2 border-gray-300 bg-white">
            <summary class="px-8 py-6 flex items-center justify-between cursor-pointer hover:bg-gray-50 transition-colors">
              <h3 class="text-gray-900 pr-8 text-[1.25rem] font-normal">Do I need previous experience with plant medicine?</h3>
              <div class="flex-shrink-0">
                <div class="w-6 h-6 border-2 border-gray-900 flex items-center justify-center">
                  <div class="text-gray-900 text-xl leading-none plus-icon">+</div>
                </div>
              </div>
            </summary>
            <div class="px-8 pb-6 border-t-2 border-gray-200 pt-6">
              <p class="text-gray-700 leading-relaxed">
                No prior experience is required. We welcome both first-time participants and those with previous experience. Our preparation process is designed to help everyone arrive feeling grounded and ready, regardless of their background.
              </p>
            </div>
          </details>

          <details class="border-2 border-gray-300 bg-white">
            <summary class="px-8 py-6 flex items-center justify-between cursor-pointer hover:bg-gray-50 transition-colors">
              <h3 class="text-gray-900 pr-8 text-[1.25rem] font-normal">Where do I stay during the retreat?</h3>
              <div class="flex-shrink-0">
                <div class="w-6 h-6 border-2 border-gray-900 flex items-center justify-center">
                  <div class="text-gray-900 text-xl leading-none plus-icon">+</div>
                </div>
              </div>
            </summary>
            <div class="px-8 pb-6 border-t-2 border-gray-200 pt-6">
              <p class="text-gray-700 leading-relaxed">
                Accommodation details vary by retreat and are outlined on each specific retreat page. Some retreats include on-site lodging, while others may require separate arrangements. We provide guidance to help you plan accordingly.
              </p>
            </div>
          </details>

          <details class="border-2 border-gray-300 bg-white">
            <summary class="px-8 py-6 flex items-center justify-between cursor-pointer hover:bg-gray-50 transition-colors">
              <h3 class="text-gray-900 pr-8 text-[1.25rem] font-normal">What should I bring with me?</h3>
              <div class="flex-shrink-0">
                <div class="w-6 h-6 border-2 border-gray-900 flex items-center justify-center">
                  <div class="text-gray-900 text-xl leading-none plus-icon">+</div>
                </div>
              </div>
            </summary>
            <div class="px-8 pb-6 border-t-2 border-gray-200 pt-6">
              <p class="text-gray-700 leading-relaxed">
                We provide a detailed packing list during the preparation phase. Generally, you&rsquo;ll want comfortable clothing, personal items, a journal, and an open heart. Specific recommendations will be shared based on your chosen retreat.
              </p>
            </div>
          </details>

          <details class="border-2 border-gray-300 bg-white">
            <summary class="px-8 py-6 flex items-center justify-between cursor-pointer hover:bg-gray-50 transition-colors">
              <h3 class="text-gray-900 pr-8 text-[1.25rem] font-normal">What happens after the retreat?</h3>
              <div class="flex-shrink-0">
                <div class="w-6 h-6 border-2 border-gray-900 flex items-center justify-center">
                  <div class="text-gray-900 text-xl leading-none plus-icon">+</div>
                </div>
              </div>
            </summary>
            <div class="px-8 pb-6 border-t-2 border-gray-200 pt-6">
              <p class="text-gray-700 leading-relaxed">
                Integration support is a core part of our offering. After the retreat, you&rsquo;ll have access to follow-up conversations, resources, and ongoing guidance to help you process and integrate your experience into daily life.
              </p>
            </div>
          </details>
        </div>
      </div>
    </section>

    <section class="relative py-32 px-8 bg-[#c3ddd5]">
      <div class="relative z-10 max-w-3xl mx-auto text-center space-y-8">
        <h2 class="text-gray-900 text-[2.5rem] font-normal">
          Begin the Journey
        </h2>

        <p class="text-gray-700 leading-relaxed text-lg max-w-2xl mx-auto">
          If you feel called to explore this work, we invite you to view upcoming retreats or reach out with any questions.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center pt-6">
          <a class="cwp-btn cwp-btn--primary" href="<?php echo esc_url( home_url( '/apply/' ) ); ?>">
            Apply
          </a>
          <a class="cwp-btn cwp-btn--secondary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
            Contact Us
          </a>
        </div>
      </div>
    </section>

    <?php
  endwhile;
endif;
?>

<?php
get_footer();
