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

    <div class="bg-white">
      <?php include get_template_directory() . '/partials/slots/hero-slot.php'; ?>

      <section class="page-hero">
        <div class="hero-wrapper">
          <div class="hero-eyebrow-wrapper">
            <span class="hero-eyebrow">Retreats</span>
          </div>
          <h1 class="hero-title">Upcoming Retreats in Sedona</h1>
          <p class="hero-description">Small group retreats designed for depth, care, and meaningful personal transformation.</p>
          <div class="hero-actions-wrapper">
            <a class="cwp-btn cwp-btn--primary" href="#">
              View Upcoming Retreats
            </a>
            <a class="cwp-btn cwp-btn--secondary" href="#">
              Apply
            </a>
          </div>
          <div class="flex flex-wrap gap-3 justify-center pt-12">
            <span class="px-4 py-2 border border-gray-400 text-gray-700 text-sm">Small Groups</span>
            <span class="px-4 py-2 border border-gray-400 text-gray-700 text-sm">Sedona, Arizona</span>
            <span class="px-4 py-2 border border-gray-400 text-gray-700 text-sm">Guided Ceremonies</span>
          </div>
        </div>
      </section>

      <section class="py-32 px-8">
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
            <div class="border-2 border-gray-300 bg-white">
              <div class="aspect-[16/10] bg-gray-200 border-b-2 border-gray-300 flex items-center justify-center relative">
                <span class="text-gray-500 text-sm uppercase tracking-wider">Retreat Image</span>
                <span class="absolute top-4 right-4 px-3 py-1 bg-white border border-gray-400 text-gray-700 text-xs uppercase tracking-wider">
                  Small Group
                </span>
              </div>
              <div class="p-8 space-y-6">
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
                <div class="flex gap-3 pt-4">
                  <a class="flex-1 px-6 py-3 bg-gray-900 text-white border-2 border-gray-900 hover:bg-gray-800 transition-colors text-center" href="#">Apply</a>
                  <a class="flex-1 px-6 py-3 bg-white text-gray-900 border-2 border-gray-900 hover:bg-gray-50 transition-colors text-center" href="#">Details</a>
                </div>
              </div>
            </div>

            <div class="border-2 border-gray-300 bg-white">
              <div class="aspect-[16/10] bg-gray-200 border-b-2 border-gray-300 flex items-center justify-center relative">
                <span class="text-gray-500 text-sm uppercase tracking-wider">Retreat Image</span>
                <span class="absolute top-4 right-4 px-3 py-1 bg-white border border-gray-400 text-gray-700 text-xs uppercase tracking-wider">
                  Limited Spots
                </span>
              </div>
              <div class="p-8 space-y-6">
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
                <div class="flex gap-3 pt-4">
                  <a class="flex-1 px-6 py-3 bg-gray-900 text-white border-2 border-gray-900 hover:bg-gray-800 transition-colors text-center" href="#">Apply</a>
                  <a class="flex-1 px-6 py-3 bg-white text-gray-900 border-2 border-gray-900 hover:bg-gray-50 transition-colors text-center" href="#">Details</a>
                </div>
              </div>
            </div>

            <div class="border-2 border-gray-300 bg-white">
              <div class="aspect-[16/10] bg-gray-200 border-b-2 border-gray-300 flex items-center justify-center relative">
                <span class="text-gray-500 text-sm uppercase tracking-wider">Retreat Image</span>
                <span class="absolute top-4 right-4 px-3 py-1 bg-white border border-gray-400 text-gray-700 text-xs uppercase tracking-wider">
                  Small Group
                </span>
              </div>
              <div class="p-8 space-y-6">
                <h3 class="text-gray-900 text-[1.75rem] font-normal">Healing Light Retreat</h3>
                <div class="grid grid-cols-2 gap-4 text-sm">
                  <div>
                    <p class="text-gray-500 uppercase tracking-wider text-xs mb-1">Dates</p>
                    <p class="text-gray-900">July 15&ndash;19</p>
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
                  A carefully held container for personal healing work, introspection, and supported growth.
                </p>
                <div class="pt-2">
                  <p class="text-gray-500 text-sm mb-1">Starting From</p>
                  <p class="text-gray-900 text-2xl">$2,500</p>
                </div>
                <div class="flex gap-3 pt-4">
                  <a class="flex-1 px-6 py-3 bg-gray-900 text-white border-2 border-gray-900 hover:bg-gray-800 transition-colors text-center" href="#">Apply</a>
                  <a class="flex-1 px-6 py-3 bg-white text-gray-900 border-2 border-gray-900 hover:bg-gray-50 transition-colors text-center" href="#">Details</a>
                </div>
              </div>
            </div>

            <div class="border-2 border-gray-300 bg-white">
              <div class="aspect-[16/10] bg-gray-200 border-b-2 border-gray-300 flex items-center justify-center relative">
                <span class="text-gray-500 text-sm uppercase tracking-wider">Retreat Image</span>
                <span class="absolute top-4 right-4 px-3 py-1 bg-white border border-gray-400 text-gray-700 text-xs uppercase tracking-wider">
                  Limited Spots
                </span>
              </div>
              <div class="p-8 space-y-6">
                <h3 class="text-gray-900 text-[1.75rem] font-normal">Canyon Spirit Retreat</h3>
                <div class="grid grid-cols-2 gap-4 text-sm">
                  <div>
                    <p class="text-gray-500 uppercase tracking-wider text-xs mb-1">Dates</p>
                    <p class="text-gray-900">September 4&ndash;8</p>
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
                  A grounded retreat experience with time for ceremony, nature, and integration conversations.
                </p>
                <div class="pt-2">
                  <p class="text-gray-500 text-sm mb-1">Starting From</p>
                  <p class="text-gray-900 text-2xl">$2,500</p>
                </div>
                <div class="flex gap-3 pt-4">
                  <a class="flex-1 px-6 py-3 bg-gray-900 text-white border-2 border-gray-900 hover:bg-gray-800 transition-colors text-center" href="#">Apply</a>
                  <a class="flex-1 px-6 py-3 bg-white text-gray-900 border-2 border-gray-900 hover:bg-gray-50 transition-colors text-center" href="#">Details</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="py-32 px-8 bg-gray-50">
        <div class="max-w-7xl mx-auto">
          <div class="max-w-3xl mx-auto text-center mb-20">
            <h2 class="text-gray-900 mb-6 text-[2.5rem] font-normal">
              What&rsquo;s Included
            </h2>
            <p class="text-gray-700 leading-relaxed text-lg">
              Each retreat includes a supportive structure designed to help guests feel safe, grounded, and supported throughout the experience.
            </p>
          </div>

          <div class="grid md:grid-cols-3 gap-12">
            <div class="space-y-4">
              <div class="w-16 h-16 rounded-full border-2 border-gray-400 bg-white flex items-center justify-center">
                <div class="w-8 h-8 bg-gray-300"></div>
              </div>
              <div class="space-y-2">
                <h3 class="text-gray-900 text-[1.25rem] font-normal">Preparation</h3>
                <p class="text-gray-700 leading-relaxed">Guidance before the retreat to help guests arrive grounded and ready.</p>
              </div>
            </div>

            <div class="space-y-4">
              <div class="w-16 h-16 rounded-full border-2 border-gray-400 bg-white flex items-center justify-center">
                <div class="w-8 h-8 bg-gray-300"></div>
              </div>
              <div class="space-y-2">
                <h3 class="text-gray-900 text-[1.25rem] font-normal">Ceremony</h3>
                <p class="text-gray-700 leading-relaxed">Guided ceremonial work held within a safe and intentional environment.</p>
              </div>
            </div>

            <div class="space-y-4">
              <div class="w-16 h-16 rounded-full border-2 border-gray-400 bg-white flex items-center justify-center">
                <div class="w-8 h-8 bg-gray-300"></div>
              </div>
              <div class="space-y-2">
                <h3 class="text-gray-900 text-[1.25rem] font-normal">Integration</h3>
                <p class="text-gray-700 leading-relaxed">Opportunities for reflection and continued support after the retreat.</p>
              </div>
            </div>

            <div class="space-y-4">
              <div class="w-16 h-16 rounded-full border-2 border-gray-400 bg-white flex items-center justify-center">
                <div class="w-8 h-8 bg-gray-300"></div>
              </div>
              <div class="space-y-2">
                <h3 class="text-gray-900 text-[1.25rem] font-normal">Accommodation Options</h3>
                <p class="text-gray-700 leading-relaxed">Retreat lodging options may be available depending on the retreat.</p>
              </div>
            </div>

            <div class="space-y-4">
              <div class="w-16 h-16 rounded-full border-2 border-gray-400 bg-white flex items-center justify-center">
                <div class="w-8 h-8 bg-gray-300"></div>
              </div>
              <div class="space-y-2">
                <h3 class="text-gray-900 text-[1.25rem] font-normal">Meals</h3>
                <p class="text-gray-700 leading-relaxed">Simple, nourishing meals are provided during the retreat.</p>
              </div>
            </div>

            <div class="space-y-4">
              <div class="w-16 h-16 rounded-full border-2 border-gray-400 bg-white flex items-center justify-center">
                <div class="w-8 h-8 bg-gray-300"></div>
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
                  <p class="text-gray-700 leading-relaxed">
                    Airport shuttle services are available, including Groome Transportation.
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
              <div class="aspect-[4/3] bg-gray-200 border-2 border-gray-400 flex items-center justify-center">
                <span class="text-gray-500 text-sm uppercase tracking-wider">Sedona Landscape</span>
              </div>
              <div class="aspect-[16/9] bg-gray-200 border-2 border-gray-400 flex items-center justify-center">
                <span class="text-gray-500 text-sm uppercase tracking-wider">Travel Image</span>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="py-32 px-8 bg-gray-50">
        <div class="max-w-7xl mx-auto">
          <div class="grid md:grid-cols-2 gap-20 items-center">
            <div class="md:order-1">
              <div class="aspect-[3/4] bg-gray-200 border-2 border-gray-400 flex items-center justify-center">
                <span class="text-gray-500 text-sm uppercase tracking-wider">Sedona Environment</span>
              </div>
            </div>

            <div class="space-y-8 md:order-2">
              <div class="space-y-6">
                <h2 class="text-gray-900 text-[2.5rem] font-normal">
                  A Retreat Designed for Depth
                </h2>

                <p class="text-gray-700 leading-relaxed text-lg">
                  Lumina retreats are intentionally structured to support meaningful personal exploration within a calm and steady environment.
                </p>
              </div>

              <div class="space-y-4 pt-4">
                <div class="flex items-start gap-4">
                  <div class="mt-1.5">
                    <div class="w-1.5 h-1.5 bg-gray-400"></div>
                  </div>
                  <p class="text-gray-700 leading-relaxed">Small group container</p>
                </div>
                <div class="flex items-start gap-4">
                  <div class="mt-1.5">
                    <div class="w-1.5 h-1.5 bg-gray-400"></div>
                  </div>
                  <p class="text-gray-700 leading-relaxed">Guided ceremonies</p>
                </div>
                <div class="flex items-start gap-4">
                  <div class="mt-1.5">
                    <div class="w-1.5 h-1.5 bg-gray-400"></div>
                  </div>
                  <p class="text-gray-700 leading-relaxed">Time for reflection and rest</p>
                </div>
                <div class="flex items-start gap-4">
                  <div class="mt-1.5">
                    <div class="w-1.5 h-1.5 bg-gray-400"></div>
                  </div>
                  <p class="text-gray-700 leading-relaxed">Supportive facilitation</p>
                </div>
                <div class="flex items-start gap-4">
                  <div class="mt-1.5">
                    <div class="w-1.5 h-1.5 bg-gray-400"></div>
                  </div>
                  <p class="text-gray-700 leading-relaxed">Integration conversations</p>
                </div>
                <div class="flex items-start gap-4">
                  <div class="mt-1.5">
                    <div class="w-1.5 h-1.5 bg-gray-400"></div>
                  </div>
                  <p class="text-gray-700 leading-relaxed">Nature and quiet surroundings</p>
                </div>
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
                    <div class="text-gray-900 text-xl leading-none">+</div>
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
                    <div class="text-gray-900 text-xl leading-none">+</div>
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
                    <div class="text-gray-900 text-xl leading-none">+</div>
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
                    <div class="text-gray-900 text-xl leading-none">+</div>
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
                    <div class="text-gray-900 text-xl leading-none">+</div>
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
        <div class="absolute inset-0 bg-gray-100 border-y-2 border-gray-300"></div>

        <div class="relative z-10 max-w-3xl mx-auto text-center space-y-8">
          <h2 class="text-gray-900 text-[2.5rem] font-normal">
            Begin the Journey
          </h2>

          <p class="text-gray-700 leading-relaxed text-lg max-w-2xl mx-auto">
            If you feel called to explore this work, we invite you to view upcoming retreats or reach out with any questions.
          </p>

          <div class="flex flex-col sm:flex-row gap-4 justify-center pt-6">
            <a class="cwp-btn cwp-btn--primary" href="#">
              View Retreats
            </a>
            <a class="cwp-btn cwp-btn--secondary" href="#">
              Contact Us
            </a>
          </div>
        </div>
      </section>
    </div>

    <?php
  endwhile;
endif;
?>

<?php
get_footer();
