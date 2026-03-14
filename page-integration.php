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

    <?php include get_template_directory() . '/partials/slots/hero-slot.php'; ?>

    <section class="py-24 px-8 bg-[#d6e3e5]">
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
          <div class="w-36 h-36 mx-auto mb-8 flex items-center justify-center">
            <svg class="cwp-icon" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
              <path d="m256 463.5c-1.28 0-2.559-.488-3.536-1.465l-57.035-57.035h-83.429c-2.761 0-5-2.238-5-5v-83.429l-57.036-57.036c-1.953-1.952-1.953-5.118 0-7.071l57.036-57.035v-83.429c0-2.761 2.239-5 5-5h83.429l57.036-57.036c1.953-1.952 5.119-1.952 7.071 0l57.036 57.036h83.428c2.762 0 5 2.239 5 5v83.429l57.035 57.036c1.953 1.953 1.953 5.119 0 7.071l-57.035 57.035v83.429c0 2.762-2.238 5-5 5h-83.429l-57.036 57.035c-.975.977-2.255 1.465-3.535 1.465zm-46.428-58.5 46.428 46.429 46.429-46.429zm117-10h68.428v-68.429zm-58.5 0h44.357l30.5-30.5h-44.357zm-68.5 0h44.357l-30.5-30.5h-44.357zm-82.572 0h68.429l-68.429-68.429zm110.572-30.5 28.428 28.429 28.429-28.429zm81-10h41.428v-41.429zm-91 0h76.857l55.571-55.571v-85.857l-55.571-55.572h-76.857l-55.572 55.571v85.857zm-55.572 0h41.429l-41.429-41.429zm198-51.429v44.357l35-35v-44.357zm-243 9.358 35 35v-44.357l-35-35zm288-102.858v92.857l46.429-46.428zm-344.428 46.429 46.428 46.429v-92.857zm299.428-32.929v65.857l32.929-32.928zm-240.928 32.929 32.928 32.929v-65.857zm240.928-47.071 35 35v-44.357l-35-35zm-243-9.358v44.357l35-35v-44.357zm191.572-42.071 41.428 41.429v-41.429zm-146.572 0v41.429l41.429-41.429zm164.572-40.5 68.428 68.429v-68.429zm-209.572 0v68.429l68.429-68.429zm181.572 30.5h44.357l-30.5-30.5h-44.357zm-71 0h56.857l-28.429-28.429zm-58.5 0h44.357l30.5-30.5h-44.357zm40.5-40.5h92.857l-46.429-46.429z" fill="rgb(0,0,0)"/>
            </svg>
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

    <section class="py-24 px-8">
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
            <div class="border-2 border-gray-300 p-10 bg-gray-50 flex justify-center items-center">
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

    <section class="py-24 px-8">
      <div class="max-w-5xl mx-auto">
        <div class="grid grid-cols-12 gap-16">
          <div class="col-span-4">
            <div class="flex items-center justify-center sticky top-24">
              <img class="page-image" src="<?php echo esc_url( get_template_directory_uri() . '/images/bg/47JaGXkaZU2.webp' ); ?>">
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

    <section class="py-24 px-8">
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
            <div class="border-2 border-gray-300 p-10 bg-white flex justify-center items-center">
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

    <section class="py-24 px-8">
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
              <p>&ldquo;someone who did Ayahuasca&rdquo;</p>
              <p>&ldquo;someone awakened&rdquo;</p>
              <p>&ldquo;someone healed&rdquo;</p>
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
          <div class="w-36 h-36 mx-auto flex items-center justify-center">
            <svg class="cwp-icon" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
              <path d="m93.393 52.95-.73-1.615-41.071 18.598-2.597-2.098 46.005-17.732-.106-.787-12.488-21.63-.542.314-1.042-3.023-1.053.363-.567-3.098-1.446.264-.194-3.027-1.73.112.078-2.896-1.772-.047-1.071 40.01-3.156 1.216 4.341-43.98-1.764-.175-4.429 44.868-3.115 1.201 7.648-48.708-.736-.301h-24.976v.626l-3.139-.609-.212 1.093-2.967-1.058-.494 1.386-2.718-1.345-.768 1.553-2.468-1.515-.928 1.511 34.114 20.933-.525 3.341-35.917-25.749-1.033 1.44 36.643 26.269-.518 3.298-38.36-30.977-.628.486-12.488 21.63.542.313-2.097 2.413.841.731-2.4 2.04.952 1.12-2.524 1.682.962 1.442-2.546 1.381.845 1.558 35.184-19.078 2.632 2.125-40.258 18.231.73 1.615 41.071-18.599 2.598 2.098-46.006 17.732.107.788 12.487 21.629.542-.313 1.042 3.023 1.053-.363.567 3.098 1.446-.264.194 3.027 1.73-.112-.078 2.897 1.772.047 1.071-40.011 3.156-1.216-4.339 43.979 1.764.175 4.429-44.869 3.115-1.201-7.648 48.709.736.301h24.974v-.626l3.14.609.212-1.093 2.967 1.058.494-1.386 2.718 1.345.768-1.553 2.468 1.515.928-1.511-34.114-20.932.525-3.341 35.916 25.749 1.033-1.44-36.641-26.269.518-3.298 38.359 30.977.628-.487 12.488-21.629-.542-.313 2.097-2.413-.841-.731 2.399-2.04-.952-1.12 2.524-1.682-.962-1.442 2.546-1.381-.845-1.558-35.184 19.077-2.632-2.125zm-.679-3.864-3.162 1.219-5.726-16.613zm-4.817 1.857-3.215 1.239-4.124-22.533zm-4.898 1.887-3.216 1.24-1.862-28.984zm-7.179-32.804 2.229 34.713-3.191 1.23zm-5.254-7.474-.526 3.348-17.252-3.348zm-.801 5.1-.534 3.403-21.573-7.693zm-.814 5.186-.535 3.405-26.026-12.878zm-31.999-10.185 31.176 15.425-.531 3.379zm-9.1.813 2.636 2.129-11.523 13.264zm4.017 3.244 2.68 2.164-17.453 14.839zm4.083 3.297 2.682 2.165-24.17 16.105zm-24.826 22.623 28.952-19.291 2.661 2.149zm-3.839 8.283 3.162-1.218 5.727 16.614zm4.816-1.856 3.215-1.239 4.125 22.533zm4.898-1.888 3.216-1.24 1.862 28.984zm7.18 32.805-2.23-34.713 3.192-1.23zm5.254 7.474.526-3.348 17.252 3.348zm.801-5.1.534-3.403 21.573 7.693zm.814-5.186.535-3.405 26.025 12.878zm31.999 10.185-31.176-15.424.531-3.379zm-26.082-47.873 15.63-6.024 13.034 10.526-2.599 16.551-15.629 6.023-13.034-10.525zm35.181 47.06-2.636-2.129 11.523-13.264zm-4.016-3.244-2.68-2.164 17.45-14.837zm-4.083-3.297-2.682-2.166 24.171-16.105zm24.826-22.624-28.953 19.291-2.662-2.15z"/>
            </svg>
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

    <section class="py-32 px-8">
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
            <div class="border-2 border-gray-900 p-12 bg-white">
              <p class="text-2xl">
                That is the integration.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php include get_template_directory() . '/partials/slots/next-step-slot.php'; ?>


    <?php
  endwhile;
endif;
?>

<?php get_footer(); ?>
