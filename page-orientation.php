<?php
/**
 * Template Name: Orientation
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

      <section class="py-24 px-8">
        <div class="max-w-5xl mx-auto">
          <div class="text-center mb-12">
            <span class="text-xs tracking-[0.2em] text-gray-600">THE JOURNEY</span>
          </div>

          <?php get_template_part( 'partials/journey-steps' ); ?>
        </div>
      </section>

      <section class="py-12 pb-24 px-8" id="start">
        <div class="max-w-4xl mx-auto">
          <div class="mb-8">
            <div class="w-36 h-36 mx-auto mb-8 flex items-center justify-center"><!--rounded-full border-2 border-gray-300 -->
              <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 58.415 39.35"><g transform="translate(0.5 0.5)"><g transform="translate(0 0)"><path d="M491.939,190.138a19.11,19.11,0,0,1-21.945-18.963c0-.053,0,.054,0,0s0,.054,0,0a19.094,19.094,0,1,1,38.188-.081c0,.054,0,.107,0,.161v-.161q0,.081,0,.162a19.08,19.08,0,0,1-8.834,16.106" transform="translate(-469.993 -152)" fill="none" stroke="#aea17e" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"></path><line x2="9.02" y2="7.684" transform="translate(19.646 18.257)" fill="none" stroke="#aea17e" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"></line><path d="M567.09,200.014s3.238,2.537,7.318,6.364" transform="translate(-545.742 -189.457)" fill="none" stroke="#aea17e" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"></path><line x1="9.02" y2="7.684" transform="translate(28.666 18.257)" fill="none" stroke="#aea17e" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"></line><path d="M607.693,200.014s-3.238,2.537-7.318,6.364" transform="translate(-571.709 -189.457)" fill="none" stroke="#aea17e" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"></path><path d="M573.74,152.205a19.1,19.1,0,0,1,21.891,18.889c0,.054,0,.107,0,.161v-.161c0,.054,0,.108,0,.162a19.094,19.094,0,1,1-38.188-.081c0-.053,0,.054,0,0s0,.054,0,0a19.214,19.214,0,0,1,9.288-16.446" transform="translate(-538.216 -152)" fill="none" stroke="#aea17e" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"></path><line y2="32.407" transform="translate(28.666 2.889)" fill="none" stroke="#aea17e" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"></line></g></g></svg>
            </div>
          </div>

          <div class="space-y-8 text-lg leading-relaxed">
            <p class="text-xl italic">Beloved,</p>

            <p>
              Before we talk about preparation&hellip;<br />
              Before ceremony&hellip;<br />
              Before the medicine, the dieta, the intentions, or the calendar&hellip;
            </p>

            <p class="text-2xl">Let&rsquo;s pause.</p>

            <p>
              Right here, right now, something is already effortlessly present.
            </p>

            <div class="py-12 hidden">
              <div class="border border-gray-900 py-12 px-12 text-center">
                <p class="text-3xl tracking-tight">
                  Awareness.
                </p>
              </div>
            </div>

            <section class="parallax-banner mt-24 mb-18">
              <div class="parallax-wrap">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/images/bg/background.webp' ); ?>" alt="Banner" class="parallax-img">
              </div>
              <div class="content">
                <h2 class="title">
                  Awareness.
                </h2>
              </div>
            </section>

            <p>
              Not as a concept.<br />
              Not as a spiritual achievement.
            </p>

            <p>
              Simply the undeniable fact that this moment is being known.
            </p>

            <div class="py-8">
              <div class="h-px bg-gray-300 w-24 mx-auto"></div>
            </div>

            <p>
              Nothing you are about to do will improve Awareness.<br />
              Nothing you are about to experience could damage it.
            </p>

            <p>
              Nothing you forgot, suffered, or survived ever left a mark on it.
            </p>

            <div class="pt-12 pb-8">
              <div class="border-l-4 border-gray-900 pl-8">
                <p class="text-2xl leading-relaxed">
                  This retreat is not about becoming whole.
                </p>
                <p class="text-2xl leading-relaxed mt-4">
                  It is about gently noticing that wholeness was never missing.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="py-24 px-8 bg-gray-50">
        <div class="max-w-6xl mx-auto">
          <div class="grid grid-cols-12 gap-12">
            <div class="col-span-5">
              <div>
                <img src="<?php echo esc_url( get_template_directory_uri() . '/images/bg/8n00CqwnqO8.webp' ); ?>">
              </div>
            </div>

            <div class="col-span-7">
              <h2 class="text-4xl tracking-tight mb-12">
                What This Preparation Is Really For
              </h2>

              <div class="space-y-8 text-lg leading-relaxed">
                <p>
                  Preparation is not about earning a good ceremony.
                </p>

                <p>
                  It is not about pleasing the medicine.<br />
                  It is not about fixing yourself so you are &ldquo;ready.&rdquo;
                </p>

                <div class="py-8">
                  <div class="border-2 border-gray-900 p-8 bg-white">
                    <p class="text-xl">
                      Preparation is about simplifying.
                    </p>
                  </div>
                </div>

                <p>
                  Simplifying the nervous system.<br />
                  Simplifying the body.<br />
                  Simplifying the mental noise that insists something dramatic must happen.
                </p>

                <p>
                  Not so Awareness can arrive &mdash; but so it can be recognized more easily.
                </p>

                <div class="py-8">
                  <div class="h-px bg-gray-300 w-24"></div>
                </div>

                <p>
                  Think of preparation as creating quiet, clean space.
                </p>

                <div class="pt-8 pl-8 border-l-4 border-gray-900">
                  <p class="text-2xl leading-relaxed">
                    Not because silence is better than noise, but because it&rsquo;s easier to hear what&rsquo;s always been speaking.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="py-32 px-8">
        <div class="max-w-5xl mx-auto">
          <div class="text-center mb-20">
            <h2 class="text-4xl tracking-tight mb-10">
              A Gentle Reframing of the Medicine
            </h2>
            <div class="flex justify-center">
              <div class="w-32 h-px bg-gray-300"></div>
            </div>
          </div>

          <div class="space-y-8 text-lg leading-relaxed max-w-3xl mx-auto">
            <p>
              In this space, we honor Ayahuasca deeply &mdash; its lineage, intelligence, and power.
            </p>

            <p>
              And we hold this truth just as lovingly:
            </p>

            <div class="py-12 space-y-12">
              <div class="flex justify-start">
                <div class="max-w-xl">
                  <div class="border-2 border-gray-900 p-8 bg-[#f0f8ff]">
                    <p class="text-lg leading-relaxed">
                      The medicine does not awaken Awareness.<br />
                      The medicine appears within Awareness.
                    </p>
                  </div>
                </div>
              </div>

              <div class="flex justify-end">
                <div class="max-w-xl">
                  <div class="border-2 border-gray-900 p-8 bg-[#f0f8ff]">
                    <p class="text-lg leading-relaxed">
                      The medicine does not heal Awareness.
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <p>
              It may help reveal where the body-mind has been holding tension, fear, or unexamined belief.
            </p>

            <div class="py-8">
              <div class="border-2 border-gray-900 p-8 text-center max-w-xl mx-auto bg-[#f0f8ff]">
                <p class="text-lg leading-relaxed">
                  The medicine does not complete you.
                </p>
              </div>
            </div>

            <p>
              It may temporarily interrupt the habit of believing you are incomplete.
            </p>

            <div class="py-12">
              <div class="h-px bg-gray-300 w-24 mx-auto"></div>
            </div>

            <p class="text-center">
              This is why you may hear us say:
            </p>

            <div class="py-8">
              <div class="border-t-2 border-b-2 border-gray-900 py-12 px-8 text-center bg-[#f0f8ff]">
                <p class="text-3xl tracking-tight">
                  &ldquo;Imaginary medicine for an imaginary disease.&rdquo;
                </p>
              </div>
            </div>

            <p class="text-center">
              The disease was never real.
            </p>

            <p class="text-center text-xl">
              The belief in separation was simply convincing.
            </p>
          </div>
        </div>
      </section>

      <section class="py-24 px-8 bg-gray-50">
        <div class="max-w-5xl mx-auto">
          <div class="grid grid-cols-12 gap-16">
            <div class="col-span-4">
              <div class="sticky top-24">
                <div class="w-16 h-16 border-0 border-gray-900 mb-6 flex items-center justify-center">
                  <img src="<?php echo esc_url( get_template_directory_uri() . '/images/icons/rhombus.png' ); ?>">
                </div>
                <h2 class="text-3xl tracking-tight mb-6">
                  What to Expect (and Not Expect)
                </h2>
                <div class="w-12 h-px bg-gray-900"></div>
              </div>
            </div>

            <div class="col-span-8 space-y-8 text-lg leading-relaxed">
              <p>
                You may have visions.<br />
                You may purge.<br />
                You may feel clarity, confusion, bliss, fear, or nothing at all.
              </p>

              <div class="py-8">
                <div class="space-y-4">
                  <div class="bg-white border-2 border-gray-300 p-6">
                    <p>None of these are measures of success.</p>
                  </div>
                  <div class="bg-white border-2 border-gray-300 p-6">
                    <p>None of these define your awakening.</p>
                  </div>
                  <div class="bg-white border-2 border-gray-300 p-6">
                    <p>None of these determine your worth.</p>
                  </div>
                </div>
              </div>

              <div class="pt-8 pl-8 border-l-4 border-gray-900">
                <p class="text-2xl leading-relaxed">
                  What matters most is not what happens &mdash; but the noticing of what is happening.
                </p>
              </div>

              <div class="pt-12">
                <p>
                  Awareness remains unchanged whether the experience is quiet or explosive.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="py-32 px-8">
        <div class="max-w-4xl mx-auto">
          <div class="text-center mb-16">
            <div class="w-32 h-32 mx-auto rounded-full border-0 border-gray-300 bg-gray-000 flex items-center justify-center mb-8">
              <img class="w-lg translate-2" src="<?php echo esc_url( get_template_directory_uri() . '/images/icons/flower.png' ); ?>">
            </div>
            <h2 class="text-4xl tracking-tight">
              A Loving Word on Responsibility
            </h2>
          </div>

          <div class="space-y-8 text-lg leading-relaxed text-center max-w-3xl mx-auto">
            <p>
              While Awareness itself needs no protection, the body-mind does.
            </p>

            <p>
              That&rsquo;s why this preparation includes:
            </p>

            <div class="py-8 border-t border-b border-gray-900 py-8 space-y-4 text-left flex items-center flex-col">
              <ul class="space-y-4 text-left w-80 styled-list">
                <li><i class="fa fa-check"></i> Clear medical screening</li>
                <li><i class="fa fa-check"></i> Dieta guidelines</li>
                <li><i class="fa fa-check"></i> Nervous-system care</li>
                <li><i class="fa fa-check"></i> Honest self-inquiry</li>
                <li><i class="fa fa-check"></i> And ongoing support</li>
              </ul>
            </div>

            <p>
              Not as spiritual rules &mdash; but as acts of love toward the human experience you&rsquo;re inhabiting.
            </p>

            <div class="py-12">
              <div class="inline-block border-2 border-gray-900 px-16 py-8">
                <p class="text-xl">
                  This is not about fear.
                </p>
              </div>
            </div>

            <p class="text-2xl">
              It&rsquo;s about respect.
            </p>
          </div>
        </div>
      </section>

      <section class="py-32 px-8 bg-gray-50">
        <div class="max-w-6xl mx-auto">
          <div class="grid grid-cols-12 gap-12 items-center">
            <div class="col-span-7">
              <h2 class="text-4xl mb-12 tracking-tight">
                A Simple Invitation
              </h2>

              <div class="space-y-8 text-lg leading-relaxed">
                <p>
                  As you read the sections that follow, see if you can let go of trying to &ldquo;do this right.&rdquo;
                </p>

                <p>
                  Instead, try this:
                </p>

                <div class="py-8">
                  <div class="border-l-4 border-gray-900 pl-8 space-y-4">
                    <p class="text-xl">Stay curious.</p>
                    <p class="text-xl">Stay honest.</p>
                    <p class="text-xl">Stay kind to yourself.</p>
                  </div>
                </div>

                <p>
                  You are not preparing to become something extraordinary.
                </p>

                <div class="pt-8">
                  <div class="border-2 border-gray-900 p-8">
                    <p class="text-2xl leading-relaxed">
                      You are preparing to notice what has always been quietly extraordinary about being here at all.
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-span-5">
              <div class="aspect-square border-0 border-gray-300 bg-gray-100 flex items-center justify-center">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/images/bg/IQwFRLTQPLY.webp' ); ?>">
              </div>
            </div>
          </div>

          <div class="mt-24 text-center">
            <p class="text-3xl tracking-tight">
              Welcome.
            </p>
          </div>
        </div>
      </section>

      <?php include get_template_directory() . '/partials/slots/next-step-slot.php'; ?>
    </div>

    <?php
  endwhile;
endif;
?>

<?php
get_footer();
