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

    <div class="bg-white">
      <?php include get_template_directory() . '/partials/slots/hero-slot.php'; ?>

      <section class="py-24 px-8">
        <div class="max-w-3xl mx-auto text-center space-y-8">
          <?php get_template_part('partials/aya-motif') ?>

          <div class="text-gray-600 text-sm uppercase tracking-[0.2em]">
            OUR APPROACH
          </div>

          <h2 class="text-4xl md:text-5xl text-gray-900 font-normal leading-[1.3]">
            Nothing about you is broken.
          </h2>

          <div class="space-y-6 text-gray-700 leading-relaxed pt-4">
            <p>
              Many people come to this work believing they need to be fixed.
            </p>
            <p class="pt-2">
              At Lumina, we approach it differently.
            </p>
            <p class="pt-2">
              The retreat experience is not about becoming someone new.
              <br />
              It is about creating the space to see more clearly what has always been here.
            </p>
            <p class="pt-4">
              Through preparation, ceremony, and reflection, participants are supported in reconnecting with clarity, presence, and the deeper intelligence of life.
            </p>
          </div>
        </div>
      </section>

      <section id="steps" class="py-32 px-8 bg-gray-50">
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
              A Retreat Designed for Depth
            </h2>
            <p class="text-gray-700 leading-relaxed max-w-2xl mx-auto">
              Lumina retreats are intentionally structured to support meaningful personal exploration within a calm and steady environment.
            </p>
          </div>

          <div class="grid md:grid-cols-3 gap-8">
            <div class="space-y-4 p-8 bg-gray-50 border border-gray-200">
              <div class="w-10 h-10 rounded-full bg-gray-200 border-2 border-gray-300 flex items-center justify-center">
                <span class="text-gray-500 text-xs">&bull;</span>
              </div>
              <div class="space-y-3">
                <h3 class="text-xl text-gray-900 font-normal">Preparation</h3>
                <p class="text-gray-600 leading-relaxed text-sm">
                  Guidance before the retreat to help guests arrive grounded and ready.
                </p>
              </div>
            </div>

            <div class="space-y-4 p-8 bg-gray-50 border border-gray-200">
              <div class="w-10 h-10 rounded-full bg-gray-200 border-2 border-gray-300 flex items-center justify-center">
                <span class="text-gray-500 text-xs">&bull;</span>
              </div>
              <div class="space-y-3">
                <h3 class="text-xl text-gray-900 font-normal">Ceremony</h3>
                <p class="text-gray-600 leading-relaxed text-sm">
                  Held within a safe and supportive ceremonial environment.
                </p>
              </div>
            </div>

            <div class="space-y-4 p-8 bg-gray-50 border border-gray-200">
              <div class="w-10 h-10 rounded-full bg-gray-200 border-2 border-gray-300 flex items-center justify-center">
                <span class="text-gray-500 text-xs">&bull;</span>
              </div>
              <div class="space-y-3">
                <h3 class="text-xl text-gray-900 font-normal">Integration</h3>
                <p class="text-gray-600 leading-relaxed text-sm">
                  Space for reflection and continued support after the retreat.
                </p>
              </div>
            </div>

            <div class="space-y-4 p-8 bg-gray-50 border border-gray-200">
              <div class="w-10 h-10 rounded-full bg-gray-200 border-2 border-gray-300 flex items-center justify-center">
                <span class="text-gray-500 text-xs">&bull;</span>
              </div>
              <div class="space-y-3">
                <h3 class="text-xl text-gray-900 font-normal">Support</h3>
                <p class="text-gray-600 leading-relaxed text-sm">
                  Experienced facilitators and a small group container.
                </p>
              </div>
            </div>

            <div class="space-y-4 p-8 bg-gray-50 border border-gray-200">
              <div class="w-10 h-10 rounded-full bg-gray-200 border-2 border-gray-300 flex items-center justify-center">
                <span class="text-gray-500 text-xs">&bull;</span>
              </div>
              <div class="space-y-3">
                <h3 class="text-xl text-gray-900 font-normal">Nature</h3>
                <p class="text-gray-600 leading-relaxed text-sm">
                  Quiet landscapes and natural beauty support presence and grounding.
                </p>
              </div>
            </div>

            <div class="space-y-4 p-8 bg-gray-50 border border-gray-200">
              <div class="w-10 h-10 rounded-full bg-gray-200 border-2 border-gray-300 flex items-center justify-center">
                <span class="text-gray-500 text-xs">&bull;</span>
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

      <section class="py-32 px-8 bg-gray-50">
        <div class="max-w-7xl mx-auto">
          <div class="grid md:grid-cols-2 gap-16 items-center">
            <div class="aspect-[4/3] bg-gray-200 border-2 border-gray-400 flex items-center justify-center">
              <span class="text-gray-500 text-sm uppercase tracking-wider">Sedona Landscape</span>
            </div>

            <div class="space-y-6">
              <h2 class="text-4xl text-gray-900 font-normal">
                Held by the Landscape
              </h2>

              <div class="space-y-6 text-gray-700 leading-relaxed">
                <p>
                  Sedona offers a natural environment for deep inner work.
                </p>
                <p class="pt-2">
                  Quiet desert landscapes, open sky, and expansive red rock terrain create space for reflection, presence, and grounding.
                </p>
                <p class="pt-2">
                  At Lumina, retreats are designed to work in harmony with this environment &mdash; allowing nature itself to become part of the experience.
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
            <div class="border border-gray-200 overflow-hidden">
              <div class="aspect-[16/10] bg-gray-200 border-b-2 border-gray-400 flex items-center justify-center">
                <span class="text-gray-500 text-sm uppercase tracking-wider">Retreat Image</span>
              </div>
              <div class="p-8 space-y-6">
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
                <div class="flex gap-3 pt-2">
                  <a class="px-6 py-2.5 bg-gray-900 text-white hover:bg-gray-800 transition-colors text-sm" href="#">Apply</a>
                  <a class="px-6 py-2.5 border border-gray-900 text-gray-900 hover:bg-gray-50 transition-colors text-sm" href="#">View Details</a>
                </div>
              </div>
            </div>

            <div class="border border-gray-200 overflow-hidden">
              <div class="aspect-[16/10] bg-gray-200 border-b-2 border-gray-400 flex items-center justify-center">
                <span class="text-gray-500 text-sm uppercase tracking-wider">Retreat Image</span>
              </div>
              <div class="p-8 space-y-6">
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
                <div class="flex gap-3 pt-2">
                  <a class="px-6 py-2.5 bg-gray-900 text-white hover:bg-gray-800 transition-colors text-sm" href="#">Apply</a>
                  <a class="px-6 py-2.5 border border-gray-900 text-gray-900 hover:bg-gray-50 transition-colors text-sm" href="#">View Details</a>
                </div>
              </div>
            </div>
          </div>

          <div class="text-center">
            <a href="<?php echo esc_url( home_url( '/retreats/#retreats' ) ); ?>" class="inline-block text-gray-900 hover:text-gray-700 border-b border-gray-900 pb-1">
              View All Retreats
            </a>
          </div>
        </div>
      </section>

      <section class="py-32 px-8 bg-gray-50">
        <div class="max-w-6xl mx-auto">
          <div class="text-center mb-16">
            <h2 class="text-4xl text-gray-900 font-normal">
              What Guests Discovered
            </h2>
          </div>

          <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 border border-gray-200 space-y-6">
              <p class="text-gray-700 leading-relaxed italic">
                &ldquo;This retreat helped me reconnect with clarity and compassion for myself in a way I hadn&rsquo;t experienced before.&rdquo;
              </p>
              <div class="pt-4 border-t border-gray-200">
                <div class="text-sm text-gray-900 font-normal">Sarah M.</div>
                <div class="text-sm text-gray-600">Portland, OR</div>
              </div>
            </div>

            <div class="bg-white p-8 border border-gray-200 space-y-6">
              <p class="text-gray-700 leading-relaxed italic">
                &ldquo;The careful preparation and integration support made all the difference. I felt held throughout the entire process.&rdquo;
              </p>
              <div class="pt-4 border-t border-gray-200">
                <div class="text-sm text-gray-900 font-normal">David L.</div>
                <div class="text-sm text-gray-600">Austin, TX</div>
              </div>
            </div>

            <div class="bg-white p-8 border border-gray-200 space-y-6">
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

      <section class="py-32 px-8 bg-gray-50">
        <div class="max-w-5xl mx-auto">
          <div class="text-center space-y-6 mb-16">
            <h2 class="text-4xl text-gray-900 font-normal">
              Safety and Care
            </h2>

            <div class="space-y-4 text-gray-700 leading-relaxed max-w-2xl mx-auto">
              <p>
                Retreats are held within a thoughtful framework of preparation, ethical facilitation, and integration support.
              </p>
              <p class="pt-2">
                Participants are guided through clear preparation steps and supported throughout the entire experience.
              </p>
            </div>
          </div>

          <div class="grid md:grid-cols-4 gap-6">
            <div class="bg-white p-6 border border-gray-200 text-center space-y-4">
              <div class="w-12 h-12 mx-auto rounded-full bg-gray-100 border-2 border-gray-300 flex items-center justify-center">
                <span class="text-gray-500 text-sm">&bull;</span>
              </div>
              <h3 class="text-sm text-gray-900 font-normal">Medical Screening</h3>
            </div>
            <div class="bg-white p-6 border border-gray-200 text-center space-y-4">
              <div class="w-12 h-12 mx-auto rounded-full bg-gray-100 border-2 border-gray-300 flex items-center justify-center">
                <span class="text-gray-500 text-sm">&bull;</span>
              </div>
              <h3 class="text-sm text-gray-900 font-normal">Dieta Guidance</h3>
            </div>
            <div class="bg-white p-6 border border-gray-200 text-center space-y-4">
              <div class="w-12 h-12 mx-auto rounded-full bg-gray-100 border-2 border-gray-300 flex items-center justify-center">
                <span class="text-gray-500 text-sm">&bull;</span>
              </div>
              <h3 class="text-sm text-gray-900 font-normal">Nervous System Care</h3>
            </div>
            <div class="bg-white p-6 border border-gray-200 text-center space-y-4">
              <div class="w-12 h-12 mx-auto rounded-full bg-gray-100 border-2 border-gray-300 flex items-center justify-center">
                <span class="text-gray-500 text-sm">&bull;</span>
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
            <a class="px-8 py-3 bg-gray-900 text-white hover:bg-gray-800 transition-colors" href="<?php echo esc_url( home_url( '/orientation/' ) ); ?>">
              Explore The Journey
            </a>
            <a class="px-8 py-3 border-2 border-gray-900 text-gray-900 hover:bg-gray-50 transition-colors" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
              Contact Us
            </a>
          </div>
        </div>
      </section>

      <section class="py-32 px-8 bg-[#c3ddd5]">
        <div class="max-w-3xl mx-auto">

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
    </div>

    <?php
  endwhile;
endif;
?>

<?php
get_footer();
