<?php
/**
 * Template Name: Integration
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

      <section id="start" class="py-24 px-8">
        <div class="max-w-4xl mx-auto">
          <div class="mb-16">
            <div class="w-24 h-24 rounded-full border-2 border-gray-300 mx-auto mb-8 flex items-center justify-center">
              <span class="text-gray-400 text-xs">ICON</span>
            </div>
            <h2 class="text-4xl text-center mb-12 tracking-tight">
              Living From What Never Left
            </h2>
          </div>

          <div class="space-y-8 text-lg leading-relaxed">
            <p>
              When the ceremony ends, nothing essential ends.
            </p>

            <p>
              Experiences fade.<br />
              Sensations settle.<br />
              Stories reorganize.
            </p>

            <div class="pt-8">
              <div class="border-l-4 border-gray-900 pl-8">
                <p class="text-2xl leading-relaxed">
                  And Awareness remains &mdash; quietly unchanged.
                </p>
              </div>
            </div>

            <p class="pt-8">
              Integration is not about holding onto an experience.
            </p>

            <div class="py-12">
              <div class="border-2 border-gray-300 p-10 text-center bg-gray-50">
                <p class="text-xl">
                  It&rsquo;s about noticing what didn&rsquo;t come and go.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="py-24 px-8 bg-gray-50">
        <div class="max-w-5xl mx-auto">
          <div class="grid grid-cols-12 gap-12">
            <div class="col-span-5">
              <h2 class="text-4xl tracking-tight sticky top-24">
                A Nondual Reframing of Integration
              </h2>
            </div>

            <div class="col-span-7 space-y-8 text-lg leading-relaxed">
              <p>
                Integration is often described as &ldquo;doing the work afterward.&rdquo;
              </p>

              <p>
                From this view, we soften that language.
              </p>

              <p>
                Nothing needs to be completed.<br />
                Nothing needs to be locked in.<br />
                Nothing needs to be protected from loss.
              </p>

              <div class="py-8">
                <div class="border-l-4 border-gray-900 pl-8">
                  <p class="text-2xl leading-relaxed">
                    Integration is simply the ongoing recognition that life itself is the practice.
                  </p>
                </div>
              </div>

              <p>
                The grocery store.<br />
                The difficult conversation.<br />
                The ordinary morning.<br />
                The unexpected tenderness.
              </p>

              <p class="pt-4">
                All of it appears in the same Awareness that held you in ceremony.
              </p>
            </div>
          </div>
        </div>
      </section>

      <section class="py-24 px-8">
        <div class="max-w-3xl mx-auto">
          <h2 class="text-4xl mb-12 tracking-tight">
            When Insights Arise
          </h2>

          <div class="space-y-8 text-lg leading-relaxed">
            <p>
              Insights may come in waves.<br />
              Or they may come quietly, later.<br />
              Or not at all in words.
            </p>

            <p>
              There is no rush to interpret.
            </p>

            <p>
              There is no requirement to act immediately.
            </p>

            <div class="py-8">
              <div class="border-2 border-gray-300 p-10 bg-gray-50">
                <p class="text-xl">
                  Insight ripens naturally when it&rsquo;s not squeezed for meaning.
                </p>
              </div>
            </div>

            <p>
              If clarity asks to be lived, you&rsquo;ll feel it &mdash; not as pressure, but as ease.
            </p>
          </div>
        </div>
      </section>

      <section class="py-24 px-8 border-t-2 border-gray-300">
        <div class="max-w-5xl mx-auto">
          <div class="grid grid-cols-12 gap-16">
            <div class="col-span-4">
              <div class="aspect-[3/4] border-2 border-gray-300 bg-gray-100 flex items-center justify-center sticky top-24">
                <span class="text-gray-400 text-sm">[ IMAGE ]</span>
              </div>
            </div>

            <div class="col-span-8">
              <h2 class="text-4xl mb-12 tracking-tight">
                When Old Patterns Reappear
              </h2>

              <div class="space-y-8 text-lg leading-relaxed">
                <p>
                  Old habits may return.
                </p>

                <p>
                  Old emotions may visit.<br />
                  Old stories may try to reclaim center stage.
                </p>

                <div class="py-8">
                  <div class="border-2 border-gray-300 p-10 text-center bg-gray-50">
                    <p class="text-xl">
                      This is not regression.
                    </p>
                  </div>
                </div>

                <p class="text-center text-2xl">
                  It&rsquo;s opportunity.
                </p>

                <p class="pt-8">
                  Awareness hasn&rsquo;t disappeared &mdash; it&rsquo;s simply noticing familiar movements again.
                </p>

                <p>
                  Instead of asking, &ldquo;Why am I back here?&rdquo; try noticing, &ldquo;Oh&hellip; this too is allowed.&rdquo;
                </p>

                <div class="pt-8">
                  <div class="border-l-4 border-gray-900 pl-8">
                    <p class="text-2xl leading-relaxed">
                      Freedom deepens through inclusion, not exclusion.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="py-24 px-8">
        <div class="max-w-3xl mx-auto">
          <h2 class="text-4xl mb-12 tracking-tight">
            The Role of Community
          </h2>

          <div class="space-y-8 text-lg leading-relaxed">
            <p>
              Integration doesn&rsquo;t mean explaining your experience.
            </p>

            <p>
              In fact, many experiences lose their vitality when translated too quickly.
            </p>

            <p>
              Speak when it feels nourishing.<br />
              Stay quiet when silence feels true.
            </p>

            <p>
              Choose companions who honor your pace and don&rsquo;t need you to make sense for them.
            </p>

            <div class="py-8">
              <div class="border-l-4 border-gray-900 pl-8">
                <p class="text-2xl leading-relaxed">
                  Community is not about agreement &mdash; it&rsquo;s about presence.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="py-24 px-8 bg-gray-50">
        <div class="max-w-4xl mx-auto">
          <div class="text-center mb-16">
            <h2 class="text-4xl mb-12 tracking-tight">
              Caring for the Body After Ceremony
            </h2>
          </div>

          <div class="grid grid-cols-2 gap-16">
            <div class="space-y-8 text-lg leading-relaxed">
              <p>
                The body may feel sensitive for a while.
              </p>

              <p>
                Rest.<br />
                Eat simply.<br />
                Hydrate.<br />
                Move gently.
              </p>
            </div>

            <div class="space-y-8 text-lg leading-relaxed">
              <div class="border-2 border-gray-300 p-10 bg-white">
                <p class="text-xl">
                  These are not afterthoughts.
                </p>
              </div>

              <p>
                They are part of the integration.
              </p>

              <p>
                The nervous system reorganizes best when it feels safe and unhurried.
              </p>
            </div>
          </div>
        </div>
      </section>

      <section class="py-24 px-8">
        <div class="max-w-3xl mx-auto">
          <h2 class="text-4xl mb-12 tracking-tight">
            When Life &ldquo;Tests&rdquo; You
          </h2>

          <div class="space-y-8 text-lg leading-relaxed">
            <div class="py-8">
              <div class="border-2 border-gray-300 p-10 text-center bg-gray-50">
                <p class="text-xl">
                  Life doesn&rsquo;t test.
                </p>
              </div>
            </div>

            <p class="text-center">
              It simply continues.
            </p>

            <p class="pt-8">
              Challenges may arise not to undo the ceremony, but to invite embodiment.
            </p>

            <div class="pt-8 pb-8 space-y-6">
              <p class="text-xl">
                Can you meet frustration with the same curiosity you met visions?
              </p>

              <p class="text-xl">
                Can you meet disappointment without making it a problem to solve?
              </p>
            </div>

            <div class="border-l-4 border-gray-900 pl-8">
              <p class="text-2xl leading-relaxed">
                This is where recognition becomes lived.
              </p>
            </div>
          </div>
        </div>
      </section>

      <section class="py-24 px-8 border-t-2 border-gray-300">
        <div class="max-w-5xl mx-auto">
          <div class="grid grid-cols-12 gap-12">
            <div class="col-span-5">
              <h2 class="text-4xl tracking-tight sticky top-24">
                No Special Identity Required
              </h2>
            </div>

            <div class="col-span-7 space-y-8 text-lg leading-relaxed">
              <p>
                You do not need to become:
              </p>

              <div class="border-l-2 border-gray-300 pl-8 space-y-4">
                <p>&bull; &ldquo;someone who did Ayahuasca&rdquo;</p>
                <p>&bull; &ldquo;someone awakened&rdquo;</p>
                <p>&bull; &ldquo;someone healed&rdquo;</p>
              </div>

              <div class="py-8">
                <div class="border-2 border-gray-300 p-10 bg-gray-50">
                  <p class="text-xl">
                    No new identity is necessary.
                  </p>
                </div>
              </div>

              <p>
                The most integrated expression often looks surprisingly ordinary.
              </p>

              <p>
                Kindness.<br />
                Honesty.<br />
                Listening.<br />
                Saying no when needed.<br />
                Resting when tired.
              </p>

              <div class="pt-8">
                <div class="border-l-4 border-gray-900 pl-8">
                  <p class="text-2xl leading-relaxed">
                    Awareness doesn&rsquo;t need a costume.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="py-32 px-8">
        <div class="max-w-2xl mx-auto text-center">
          <div class="mb-12">
            <div class="w-32 h-32 rounded-full border-2 border-gray-300 mx-auto flex items-center justify-center">
              <span class="text-gray-400 text-xs">ICON</span>
            </div>
          </div>

          <h2 class="text-4xl mb-12 tracking-tight">
            A Simple Ongoing Practice
          </h2>

          <div class="space-y-8 text-lg leading-relaxed">
            <p>
              When you forget, notice forgetting.<br />
              When you remember, notice remembering.
            </p>

            <p class="pt-8">
              Both appear in the same field.
            </p>

            <div class="py-12">
              <div class="border-2 border-gray-300 p-12 bg-gray-50">
                <p class="text-2xl">
                  Nothing has gone wrong.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="py-32 px-8 bg-gray-50">
        <div class="max-w-3xl mx-auto text-center">
          <h2 class="text-4xl mb-12 tracking-tight">
            A Final Integration Pointer
          </h2>

          <div class="space-y-8 text-lg leading-relaxed">
            <div class="border-2 border-gray-300 p-12 bg-white">
              <p class="text-xl mb-6">
                The ceremony was not the peak.
              </p>

              <p class="text-xl">
                Life is not the comedown.
              </p>
            </div>

            <div class="pt-12">
              <div class="border-l-4 border-gray-900 pl-8 text-left">
                <p class="text-2xl leading-relaxed">
                  There is only this &mdash; appearing, changing, passing &mdash; and the quiet intimacy of being aware of it.
                </p>
              </div>
            </div>

            <div class="pt-16">
              <div class="border-2 border-gray-900 p-12">
                <p class="text-2xl">
                  That is the integration.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <?php include get_template_directory() . '/partials/slots/next-step-slot.php'; ?>
    </div>

    <?php
  endwhile;
endif;
?>

<?php get_footer(); ?>
