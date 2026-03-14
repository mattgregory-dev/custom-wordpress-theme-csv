<?php
/**
 * Template Name: Approach
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

    <section class="py-32 px-8">
      <div class="max-w-lg mx-auto text-center">
        <div style="height:120px;" class="mx-auto mb-12 flex items-center justify-center">

          <svg class="cwp-icon" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
            <path d="m256.002 481.501c-.001 0-.003 0-.004 0-.039 0-.077 0-.116-.001-92.03-.064-166.882-74.955-166.882-167 0-38.142 27.551-97.322 81.888-175.896 39.773-57.516 80.08-104.908 81.287-106.324.066-.08.136-.157.208-.231 0-.001.001-.001.002-.002.003-.003.005-.005.008-.008.002-.002.004-.004.006-.006.001-.001.003-.003.004-.004.002-.003.005-.006.008-.009 0 0 .001-.001.001-.001.059-.061.119-.119.18-.176.001-.001.002-.002.003-.003.002-.002.005-.004.007-.007.002-.002.004-.004.007-.006.001-.001.002-.002.004-.003.882-.813 2.059-1.312 3.351-1.321.001-.001.01 0 .016 0h.02c.006 0 .014.001.02 0 .005 0 .006-.001.016 0 1.293.009 2.469.508 3.352 1.321.001.001.002.002.004.003.002.002.004.004.007.006.002.002.004.004.007.007.001.001.002.002.003.003.062.057.122.116.181.176 0 0 .001.001.001.001.003.003.006.006.009.009.001.001.002.003.004.004.002.002.004.004.006.006.003.003.006.005.008.008.001.001.002.001.003.002.071.075.141.152.207.231 1.207 1.416 41.514 48.808 81.287 106.324 54.334 78.574 81.885 137.754 81.885 175.896 0 92.045-74.853 166.936-166.882 167-.039.001-.077.001-.116.001zm124.577-71.556-103.608 60.16c42.067-5.637 78.912-28.003 103.608-60.16zm-249.158 0c24.697 32.156 61.541 54.522 103.608 60.16zm279.93-112.055-133.405 160.086 115.018-66.784c12.757-22.694 20.036-48.857 20.036-76.692 0-5.197-.572-10.75-1.649-16.61zm-292.313 93.301 115.017 66.784-133.405-160.084c-1.077 5.858-1.65 11.413-1.65 16.609 0 27.835 7.28 53.998 20.038 76.691zm266.776-160.552-105.566 208.953 128.264-153.917c-4.665-16.862-12.68-35.609-22.698-55.036zm-282.325 55.037 128.263 153.916-105.563-208.949c-10.019 19.426-18.034 38.173-22.7 55.033zm248.708-112.428-75.155 250.516 103.031-203.938c-8.427-15.445-17.942-31.175-27.876-46.578zm-220.267 46.582 103.029 203.934-75.153-250.511c-9.935 15.404-19.45 31.132-27.876 46.577zm176.989-108.934-39.926 304.894 76.044-253.48c-12.028-18.123-24.44-35.599-36.118-51.414zm-141.954 51.418 76.043 253.476-39.926-304.889c-11.678 15.816-24.09 33.29-36.117 51.413zm94.035-112.991v350.488l39.34-300.417c-16.418-21.796-30.684-39.528-39.34-50.071zm-49.34 50.075 39.34 300.413v-350.487c-8.655 10.543-22.921 28.276-39.34 50.074z" fill="rgb(0,0,0)"/>
          </svg>

          <svg class="hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="512" height="512">
            <path d="M61,32a15,15,0,0,0-9.66-14A15,15,0,0,0,61,4a1,1,0,0,0-1-1,15,15,0,0,0-14,9.66,15,15,0,0,0-28,0A15,15,0,0,0,4,3,1,1,0,0,0,3,4a15,15,0,0,0,9.66,14,15,15,0,0,0,0,28A15,15,0,0,0,3,60a1,1,0,0,0,1,1,15,15,0,0,0,14-9.66,15,15,0,0,0,28,0A15,15,0,0,0,60,61a1,1,0,0,0,1-1,15,15,0,0,0-9.66-14A15,15,0,0,0,61,32ZM32,26.66A15,15,0,0,0,23.34,18,15,15,0,0,0,32,9.34,15,15,0,0,0,40.66,18,15,15,0,0,0,32,26.66Zm13-7.61A13,13,0,0,1,33.05,31,13,13,0,0,1,45,19.05ZM31,31a13,13,0,0,1-11.9-11.9A13,13,0,0,1,31,31ZM26.66,32A15,15,0,0,0,18,40.66,15,15,0,0,0,9.34,32,15,15,0,0,0,18,23.34,15,15,0,0,0,26.66,32Zm4.29,1A13,13,0,0,1,19.05,45,13,13,0,0,1,31,33.05ZM32,37.34A15,15,0,0,0,40.66,46,15,15,0,0,0,32,54.66,15,15,0,0,0,23.34,46,15,15,0,0,0,32,37.34Zm1-4.29A13,13,0,0,1,45,45,13,13,0,0,1,33.05,33.05Zm4.29-1A15,15,0,0,0,46,23.34,15,15,0,0,0,54.66,32,15,15,0,0,0,46,40.66,15,15,0,0,0,37.34,32ZM59,31a13,13,0,0,1-11.9-11.9A13,13,0,0,1,59,31Zm0-25.9A13,13,0,0,1,47.05,17,13,13,0,0,1,59,5.05ZM45,17a13,13,0,0,1-11.9-11.9A13,13,0,0,1,45,17ZM31,5.05A13,13,0,0,1,19.05,17,13,13,0,0,1,31,5.05Zm-25.9,0A13,13,0,0,1,17,17,13,13,0,0,1,5.05,5.05Zm11.9,14A13,13,0,0,1,5.05,31,13,13,0,0,1,17,19.05Zm-11.9,14A13,13,0,0,1,17,45,13,13,0,0,1,5.05,33.05Zm0,25.9A13,13,0,0,1,17,47.05,13,13,0,0,1,5.05,59Zm14-11.9A13,13,0,0,1,31,59,13,13,0,0,1,19.05,47.05Zm14,11.9A13,13,0,0,1,45,47.05,13,13,0,0,1,33.05,59ZM59,59a13,13,0,0,1-11.9-11.9A13,13,0,0,1,59,59ZM47.05,45A13,13,0,0,1,59,33.05,13,13,0,0,1,47.05,45Z"/>
          </svg>

        </div>

        <p class="text-xs uppercase tracking-[0.2em] mb-6 text-gray-600">
          Our Philosophy
        </p>

        <p class="text-lg leading-relaxed text-gray-700 mb-6">
          At Lumina, healing is not passive &mdash; it is an active, soul-centered journey of rediscovering one&rsquo;s inherent wholeness. 
        </p>
        <p class="text-lg leading-relaxed text-gray-700 mb-6">
          With experienced facilitators and compassionate care, we aim to create the conditions for real transformation.
        </p>
        <p class="text-lg leading-relaxed text-gray-700">
          We welcome those from all paths who are ready to engage in deep growth and lasting change.
        </p>
      </div>
    </section>

    <section id="steps" class="py-32 px-8 bg-[#d6e3e5]">
      <div class="max-w-6xl mx-auto">
        <div class="max-w-3xl mx-auto text-center mb-16">
          <h2 class="text-[2.5rem] font-normal mb-6 text-gray-900">
            The Journey of the Work
          </h2>
          <p class="text-lg text-gray-700 leading-relaxed">
            Every retreat unfolds through a thoughtful process designed to support preparation, experience, and integration.
          </p>
        </div>

        <?php get_template_part( 'partials/journey-steps', null, [ 'start' => true ] ); ?>

      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-7xl mx-auto">
        <div class="grid md:grid-cols-2 gap-16 items-center">
          <div class="flex items-center justify-center">
            <img class="page-image" src="<?php echo esc_url( get_template_directory_uri() . '/images/bg/V8NoTp7Y10.webp' ); ?>">
          </div>

          <div class="space-y-6">
            <p class="text-xs uppercase tracking-[0.2em] text-gray-600">
              Our Work
            </p>

            <h2 class="text-[2.5rem] font-normal text-gray-900">
              Who We Are
            </h2>

            <div class="space-y-4 text-gray-700 leading-relaxed">
              <p>
                <strong>Lumina is a retreat for people seeking meaningful personal healing and inner clarity.</strong>
              </p>
              <p>
                Our work centers around carefully guided plant medicine ceremonies held in a safe and supportive environment. These ceremonies are part of a larger process that includes preparation, integration, and thoughtful support throughout the experience.
              </p>
              <p>
                The approach at Lumina blends traditional ceremonial wisdom with modern therapeutic practices. Each retreat is intentionally structured to help guests explore personal insight, emotional healing, and lasting change.
              </p>
              <p>
                Everything we do is guided by clear standards of safety and responsible facilitation.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-6xl mx-auto">
        <div class="max-w-2xl mb-16">
          <h2 class="text-[2.5rem] font-normal mb-6 text-gray-900">
            The Lumina Approach
          </h2>
          <p class="text-lg text-gray-700 leading-relaxed">
            The retreat experience is held within a broader structure of preparation, ceremony, support, and reflection.
          </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">

          <div class="bg-white border border-gray-300 p-8 rounded-lg soft-shadow">
            <div class="w-16 h-16 rounded-full mb-6 flex items-center justify-center">
              <svg class="cwp-icon" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
                <path d="m255.99 463.491c-.913 0-1.826-.245-2.621-.732l-175.444-107.967c-1.509-.904-2.457-2.601-2.434-4.357v-188.87c-.022-1.759.924-3.456 2.434-4.357l175.39-107.933c1.697-1.074 3.955-1.017 5.591.148 0 0 174.769 107.549 174.932 107.65 1.706 1.05 2.842 2.83 2.653 4.877v188.55c0 1.719-.917 3.359-2.38 4.259 0 0-175.382 107.928-175.5 108-.795.489-1.708.733-2.621.732zm-55.056-107.991 55.056 93.172 55.056-93.172zm121.727 0-52.093 88.158 143.257-88.158zm-224.505 0 143.257 88.158-52.094-88.158zm230.415-10h94.157l-47.078-79.672zm-133.545 0h121.93l52.887-89.5-52.887-89.5h-121.93l-52.887 89.5zm-105.773 0h94.157l-47.079-79.672zm292.204-89.5 45.033 76.21v-152.42zm-295.967-76.21v152.42l45.034-76.21zm243.081-13.29 47.079 79.671 47.078-79.671zm-239.318 0 47.079 79.671 47.078-79.671zm233.408-10h91.164l-143.256-88.158zm-121.727 0h110.112l-55.056-93.171zm-102.778 0h91.164l52.093-88.158z" fill="rgb(0,0,0)"/>
              </svg>
            </div>
            <h3 class="text-xl mb-3 text-gray-900 font-medium">Medicine Ceremony</h3>
            <p class="text-gray-600 leading-relaxed">Guided ceremonial experiences held within a safe and respectful container.</p>
          </div>

          <div class="bg-white border border-gray-300 p-8 rounded-lg soft-shadow">
            <!-- bg-gray-200 border-2 border-gray-400 -->
            <div class="w-16 h-16 rounded-full mb-6 flex items-center justify-center">
              <svg class="cwp-icon" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
                <path d="m255.99 463.491c-.913 0-1.826-.245-2.621-.732l-175.444-107.967c-1.509-.904-2.457-2.601-2.434-4.357v-188.87c-.022-1.759.924-3.456 2.434-4.357l175.39-107.933c1.697-1.074 3.955-1.017 5.591.148 0 0 174.769 107.549 174.932 107.65 1.706 1.05 2.842 2.83 2.653 4.877v188.55c0 1.719-.917 3.359-2.38 4.259 0 0-175.382 107.928-175.5 108-.795.489-1.708.733-2.621.732zm-55.056-107.991 55.056 93.172 55.056-93.172zm121.727 0-52.093 88.158 143.257-88.158zm-224.505 0 143.257 88.158-52.094-88.158zm230.415-10h94.157l-47.078-79.672zm-133.545 0h121.93l52.887-89.5-52.887-89.5h-121.93l-52.887 89.5zm-105.773 0h94.157l-47.079-79.672zm292.204-89.5 45.033 76.21v-152.42zm-295.967-76.21v152.42l45.034-76.21zm243.081-13.29 47.079 79.671 47.078-79.671zm-239.318 0 47.079 79.671 47.078-79.671zm233.408-10h91.164l-143.256-88.158zm-121.727 0h110.112l-55.056-93.171zm-102.778 0h91.164l52.093-88.158z" fill="rgb(0,0,0)"/>
              </svg>
            </div>
            <h3 class="text-xl mb-3 text-gray-900 font-medium">Somatic Therapy</h3>
            <p class="text-gray-600 leading-relaxed">Body-based practices that support emotional release and grounded awareness.</p>
          </div>

          <div class="bg-white border border-gray-300 p-8 rounded-lg soft-shadow">
            <div class="w-16 h-16 rounded-full mb-6 flex items-center justify-center">
              <svg class="cwp-icon" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
                <path d="m255.99 463.491c-.913 0-1.826-.245-2.621-.732l-175.444-107.967c-1.509-.904-2.457-2.601-2.434-4.357v-188.87c-.022-1.759.924-3.456 2.434-4.357l175.39-107.933c1.697-1.074 3.955-1.017 5.591.148 0 0 174.769 107.549 174.932 107.65 1.706 1.05 2.842 2.83 2.653 4.877v188.55c0 1.719-.917 3.359-2.38 4.259 0 0-175.382 107.928-175.5 108-.795.489-1.708.733-2.621.732zm-55.056-107.991 55.056 93.172 55.056-93.172zm121.727 0-52.093 88.158 143.257-88.158zm-224.505 0 143.257 88.158-52.094-88.158zm230.415-10h94.157l-47.078-79.672zm-133.545 0h121.93l52.887-89.5-52.887-89.5h-121.93l-52.887 89.5zm-105.773 0h94.157l-47.079-79.672zm292.204-89.5 45.033 76.21v-152.42zm-295.967-76.21v152.42l45.034-76.21zm243.081-13.29 47.079 79.671 47.078-79.671zm-239.318 0 47.079 79.671 47.078-79.671zm233.408-10h91.164l-143.256-88.158zm-121.727 0h110.112l-55.056-93.171zm-102.778 0h91.164l52.093-88.158z" fill="rgb(0,0,0)"/>
              </svg>
            </div>
            <h3 class="text-xl mb-3 text-gray-900 font-medium">Self Inquiry</h3>
            <p class="text-gray-600 leading-relaxed">Reflection practices that invite honesty, curiosity, and deeper understanding.</p>
          </div>

          <div class="bg-white border border-gray-300 p-8 rounded-lg soft-shadow">
            <div class="w-16 h-16 rounded-full mb-6 flex items-center justify-center">
              <svg class="cwp-icon" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
                <path d="m255.99 463.491c-.913 0-1.826-.245-2.621-.732l-175.444-107.967c-1.509-.904-2.457-2.601-2.434-4.357v-188.87c-.022-1.759.924-3.456 2.434-4.357l175.39-107.933c1.697-1.074 3.955-1.017 5.591.148 0 0 174.769 107.549 174.932 107.65 1.706 1.05 2.842 2.83 2.653 4.877v188.55c0 1.719-.917 3.359-2.38 4.259 0 0-175.382 107.928-175.5 108-.795.489-1.708.733-2.621.732zm-55.056-107.991 55.056 93.172 55.056-93.172zm121.727 0-52.093 88.158 143.257-88.158zm-224.505 0 143.257 88.158-52.094-88.158zm230.415-10h94.157l-47.078-79.672zm-133.545 0h121.93l52.887-89.5-52.887-89.5h-121.93l-52.887 89.5zm-105.773 0h94.157l-47.079-79.672zm292.204-89.5 45.033 76.21v-152.42zm-295.967-76.21v152.42l45.034-76.21zm243.081-13.29 47.079 79.671 47.078-79.671zm-239.318 0 47.079 79.671 47.078-79.671zm233.408-10h91.164l-143.256-88.158zm-121.727 0h110.112l-55.056-93.171zm-102.778 0h91.164l52.093-88.158z" fill="rgb(0,0,0)"/>
              </svg>
            </div>
            <h3 class="text-xl mb-3 text-gray-900 font-medium">Movement Practices</h3>
            <p class="text-gray-600 leading-relaxed">Breath, gentle movement, and embodiment exercises to support integration.</p>
          </div>

          <div class="bg-white border border-gray-300 p-8 rounded-lg soft-shadow">
            <div class="w-16 h-16 rounded-full mb-6 flex items-center justify-center">
              <svg class="cwp-icon" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
                <path d="m255.99 463.491c-.913 0-1.826-.245-2.621-.732l-175.444-107.967c-1.509-.904-2.457-2.601-2.434-4.357v-188.87c-.022-1.759.924-3.456 2.434-4.357l175.39-107.933c1.697-1.074 3.955-1.017 5.591.148 0 0 174.769 107.549 174.932 107.65 1.706 1.05 2.842 2.83 2.653 4.877v188.55c0 1.719-.917 3.359-2.38 4.259 0 0-175.382 107.928-175.5 108-.795.489-1.708.733-2.621.732zm-55.056-107.991 55.056 93.172 55.056-93.172zm121.727 0-52.093 88.158 143.257-88.158zm-224.505 0 143.257 88.158-52.094-88.158zm230.415-10h94.157l-47.078-79.672zm-133.545 0h121.93l52.887-89.5-52.887-89.5h-121.93l-52.887 89.5zm-105.773 0h94.157l-47.079-79.672zm292.204-89.5 45.033 76.21v-152.42zm-295.967-76.21v152.42l45.034-76.21zm243.081-13.29 47.079 79.671 47.078-79.671zm-239.318 0 47.079 79.671 47.078-79.671zm233.408-10h91.164l-143.256-88.158zm-121.727 0h110.112l-55.056-93.171zm-102.778 0h91.164l52.093-88.158z" fill="rgb(0,0,0)"/>
              </svg>
            </div>
            <h3 class="text-xl mb-3 text-gray-900 font-medium">Nourishing Meals</h3>
            <p class="text-gray-600 leading-relaxed">Simple, supportive meals designed to care for the body and nervous system.</p>
          </div>

          <div class="bg-white border border-gray-300 p-8 rounded-lg soft-shadow">
            <div class="w-16 h-16 rounded-full mb-6 flex items-center justify-center">
              <svg class="cwp-icon" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
                <path d="m255.99 463.491c-.913 0-1.826-.245-2.621-.732l-175.444-107.967c-1.509-.904-2.457-2.601-2.434-4.357v-188.87c-.022-1.759.924-3.456 2.434-4.357l175.39-107.933c1.697-1.074 3.955-1.017 5.591.148 0 0 174.769 107.549 174.932 107.65 1.706 1.05 2.842 2.83 2.653 4.877v188.55c0 1.719-.917 3.359-2.38 4.259 0 0-175.382 107.928-175.5 108-.795.489-1.708.733-2.621.732zm-55.056-107.991 55.056 93.172 55.056-93.172zm121.727 0-52.093 88.158 143.257-88.158zm-224.505 0 143.257 88.158-52.094-88.158zm230.415-10h94.157l-47.078-79.672zm-133.545 0h121.93l52.887-89.5-52.887-89.5h-121.93l-52.887 89.5zm-105.773 0h94.157l-47.079-79.672zm292.204-89.5 45.033 76.21v-152.42zm-295.967-76.21v152.42l45.034-76.21zm243.081-13.29 47.079 79.671 47.078-79.671zm-239.318 0 47.079 79.671 47.078-79.671zm233.408-10h91.164l-143.256-88.158zm-121.727 0h110.112l-55.056-93.171zm-102.778 0h91.164l52.093-88.158z" fill="rgb(0,0,0)"/>
              </svg>
            </div>
            <h3 class="text-xl mb-3 text-gray-900 font-medium">Reflective Space</h3>
            <p class="text-gray-600 leading-relaxed">Quiet time for rest, journaling, and personal contemplation.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-7xl mx-auto">
        <div class="grid md:grid-cols-2 gap-16 items-center">
          <div class="space-y-8 md:order-1">
            <h2 class="text-[2.5rem] font-normal text-gray-900">
              Where the Work Happens
            </h2>

            <div class="space-y-6 text-gray-700 leading-relaxed">
              <p>
                Transformation doesn&rsquo;t happen through intensity alone.
                <br />
                It unfolds in environments that support presence, safety, and care.
              </p>

              <p class="pt-2">
                Sedona offers a natural setting for this kind of work &mdash; quiet desert landscapes, open sky, and space to slow down and listen.
              </p>

              <p class="pt-2">
                At Lumina, retreats are intentionally designed to create a steady rhythm between ceremony, reflection, conversation, and rest.
              </p>

              <p class="pt-2">
                Small group settings allow for personal attention and genuine connection.
              </p>

              <p class="pt-2">
                Nature, quiet space, and supportive facilitation help create the conditions where insight can arise naturally.
              </p>

              <p class="pt-2">
                Nothing is forced. The environment simply supports the unfolding process.
              </p>
            </div>
          </div>

          <div class="flex items-center justify-center md:order-2">
            <img class="page-image" src="<?php echo esc_url( get_template_directory_uri() . '/images/sedona-sunset.webp' ); ?>">
          </div>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-6xl mx-auto">
        <div class="max-w-3xl mx-auto text-center mb-16">
          <h2 class="text-[2.5rem] font-normal mb-6 text-gray-900">
            Safety and Responsibility
          </h2>
          <p class="text-lg text-gray-700 leading-relaxed">
            While the deeper work is spiritual in nature, the human experience must be held with care, clarity, and responsibility.
          </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8 mb-12">
          <div class="bg-white border border-gray-300 p-8 rounded-lg soft-shadow">
            <h3 class="text-xl mb-3 text-gray-900 font-medium">Safety</h3>
            <p class="text-gray-600 leading-relaxed">Careful screening, preparation guidance, and responsible ceremonial practices.</p>
          </div>
          <div class="bg-white border border-gray-300 p-8 rounded-lg soft-shadow">
            <h3 class="text-xl mb-3 text-gray-900 font-medium">Ethics</h3>
            <p class="text-gray-600 leading-relaxed">Respectful facilitation grounded in transparency, humility, and integrity.</p>
          </div>
          <div class="bg-white border border-gray-300 p-8 rounded-lg soft-shadow">
            <h3 class="text-xl mb-3 text-gray-900 font-medium">Integration</h3>
            <p class="text-gray-600 leading-relaxed">Support before, during, and after the retreat experience.</p>
          </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
          <div class="bg-white border border-gray-300 p-6 text-center rounded-lg soft-shadow">
            <span class="text-sm text-gray-700">Medical Screening</span>
          </div>
          <div class="bg-white border border-gray-300 p-6 text-center rounded-lg soft-shadow">
            <span class="text-sm text-gray-700">Dieta Guidance</span>
          </div>
          <div class="bg-white border border-gray-300 p-6 text-center rounded-lg soft-shadow">
            <span class="text-sm text-gray-700">Nervous System Care</span>
          </div>
          <div class="bg-white border border-gray-300 p-6 text-center rounded-lg soft-shadow">
            <span class="text-sm text-gray-700">Ongoing Support</span>
          </div>
        </div>
      </div>
    </section>

    <section id="guides" class="py-32 px-8">
      <div class="max-w-6xl mx-auto">
        <div class="text-center max-w-3xl mx-auto">
          <h2 class="text-4xl">Meet Your Guides</h2>
        </div>
        <?php include get_template_directory() . '/partials/meet-guides-grid.php'; ?>
      </div>
    </section>

    <section class="py-32 px-8 bg-[#c3ddd5]">
      <div class="max-w-3xl mx-auto text-center">
        <h2 class="text-[2.4rem] font-light mb-8 text-gray-900 leading-[1.4]">
          Healing does not give you something new.<br />
          It reveals what has always been present.
        </h2>

        <p class="text-lg mb-12 text-gray-700 leading-relaxed">
          If you feel called to explore this work, we invite you to begin with the journey itself.
        </p>

        <div class="flex gap-4 justify-center">
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
