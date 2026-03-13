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

    <div class="bg-white">
      <?php include get_template_directory() . '/partials/slots/hero-slot.php'; ?>

      <section class="py-32 px-8">
        <div class="max-w-lg mx-auto text-center">
          <div style="height:120px;" class="mx-auto mb-12 flex items-center justify-center">
            <img style="max-height:100%;" src="<?php echo esc_url( get_template_directory_uri() . '/images/icons/geometric.svg' ); ?>">
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

      <section id="steps" class="py-32 px-8 bg-gray-50">
        <div class="max-w-6xl mx-auto">
          <div class="max-w-3xl mx-auto text-center mb-16">
            <h2 class="text-[2.5rem] font-normal mb-6 text-gray-900">
              The Journey of the Work
            </h2>
            <p class="text-lg text-gray-700 leading-relaxed">
              Every retreat unfolds through a thoughtful process designed to support preparation, experience, and integration.
            </p>
          </div>

          <?php get_template_part( 'partials/journey-steps' ); ?>

        </div>
      </section>

      <section class="py-32 px-8">
        <div class="max-w-7xl mx-auto">
          <div class="grid md:grid-cols-2 gap-16 items-center">
            <div class="aspect-[3/4] flex items-center justify-center">
              <img src="<?php echo esc_url( get_template_directory_uri() . '/images/bg/V8NoTp7Y10.webp' ); ?>">
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

      <section class="py-32 px-8 bg-gray-50">
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
            <div class="bg-white border border-gray-300 p-8">
              <div class="w-16 h-16 rounded-full mb-6 flex items-center justify-center">
                <img style="max-height:100%;" src="<?php echo esc_url( get_template_directory_uri() . '/images/icons/geometric-2.svg' ); ?>">
              </div>
              <h3 class="text-xl mb-3 text-gray-900 font-medium">Medicine Ceremony</h3>
              <p class="text-gray-600 leading-relaxed">Guided ceremonial experiences held within a safe and respectful container.</p>
            </div>

            <div class="bg-white border border-gray-300 p-8">
              <!-- bg-gray-200 border-2 border-gray-400 -->
              <div class="w-16 h-16 rounded-full mb-6 flex items-center justify-center">
                <img style="max-height:100%;" src="<?php echo esc_url( get_template_directory_uri() . '/images/icons/geometric-2.svg' ); ?>">
              </div>
              <h3 class="text-xl mb-3 text-gray-900 font-medium">Somatic Therapy</h3>
              <p class="text-gray-600 leading-relaxed">Body-based practices that support emotional release and grounded awareness.</p>
            </div>

            <div class="bg-white border border-gray-300 p-8">
              <div class="w-16 h-16 rounded-full mb-6 flex items-center justify-center">
                <img style="max-height:100%;" src="<?php echo esc_url( get_template_directory_uri() . '/images/icons/geometric-2.svg' ); ?>">
              </div>
              <h3 class="text-xl mb-3 text-gray-900 font-medium">Self Inquiry</h3>
              <p class="text-gray-600 leading-relaxed">Reflection practices that invite honesty, curiosity, and deeper understanding.</p>
            </div>

            <div class="bg-white border border-gray-300 p-8">
              <div class="w-16 h-16 rounded-full mb-6 flex items-center justify-center">
                <img style="max-height:100%;" src="<?php echo esc_url( get_template_directory_uri() . '/images/icons/geometric-2.svg' ); ?>">
              </div>
              <h3 class="text-xl mb-3 text-gray-900 font-medium">Movement Practices</h3>
              <p class="text-gray-600 leading-relaxed">Breath, gentle movement, and embodiment exercises to support integration.</p>
            </div>

            <div class="bg-white border border-gray-300 p-8">
              <div class="w-16 h-16 rounded-full mb-6 flex items-center justify-center">
                <img style="max-height:100%;" src="<?php echo esc_url( get_template_directory_uri() . '/images/icons/geometric-2.svg' ); ?>">
              </div>
              <h3 class="text-xl mb-3 text-gray-900 font-medium">Nourishing Meals</h3>
              <p class="text-gray-600 leading-relaxed">Simple, supportive meals designed to care for the body and nervous system.</p>
            </div>

            <div class="bg-white border border-gray-300 p-8">
              <div class="w-16 h-16 rounded-full mb-6 flex items-center justify-center">
                <img style="max-height:100%;" src="<?php echo esc_url( get_template_directory_uri() . '/images/icons/geometric-2.svg' ); ?>">
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

            <div class="aspect-[4/3] bg-gray-200 border-2 border-gray-400 flex items-center justify-center md:order-2">
              <span class="text-gray-500 text-sm uppercase tracking-wider">Image Placeholder</span>
            </div>
          </div>
        </div>
      </section>

      <section class="py-32 px-8 bg-gray-50">
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
            <div class="bg-white border border-gray-300 p-8">
              <h3 class="text-xl mb-3 text-gray-900 font-medium">Safety</h3>
              <p class="text-gray-600 leading-relaxed">Careful screening, preparation guidance, and responsible ceremonial practices.</p>
            </div>
            <div class="bg-white border border-gray-300 p-8">
              <h3 class="text-xl mb-3 text-gray-900 font-medium">Ethics</h3>
              <p class="text-gray-600 leading-relaxed">Respectful facilitation grounded in transparency, humility, and integrity.</p>
            </div>
            <div class="bg-white border border-gray-300 p-8">
              <h3 class="text-xl mb-3 text-gray-900 font-medium">Integration</h3>
              <p class="text-gray-600 leading-relaxed">Support before, during, and after the retreat experience.</p>
            </div>
          </div>

          <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-white border border-gray-300 p-6 text-center">
              <span class="text-sm text-gray-700">Medical Screening</span>
            </div>
            <div class="bg-white border border-gray-300 p-6 text-center">
              <span class="text-sm text-gray-700">Dieta Guidance</span>
            </div>
            <div class="bg-white border border-gray-300 p-6 text-center">
              <span class="text-sm text-gray-700">Nervous System Care</span>
            </div>
            <div class="bg-white border border-gray-300 p-6 text-center">
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
    </div>

    <?php
  endwhile;
endif;
?>

<?php
get_footer();
