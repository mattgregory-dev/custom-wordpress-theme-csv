<?php
/**
 * Template Name: Ceremony
 */
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
          <div class="w-24 h-24 mx-auto mb-8 flex items-center justify-center">
            <svg class="cwp-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
              <path d="M60,2.5A29.54577,29.54577,0,0,0,32,22.73132,29.54577,29.54577,0,0,0,4,2.5,1.50008,1.50008,0,0,0,2.5,4,29.54577,29.54577,0,0,0,22.73132,32,29.54577,29.54577,0,0,0,2.5,60,1.50008,1.50008,0,0,0,4,61.5,29.54577,29.54577,0,0,0,32,41.26868,29.54577,29.54577,0,0,0,60,61.5,1.50007,1.50007,0,0,0,61.5,60,29.54577,29.54577,0,0,0,41.26868,32,29.54577,29.54577,0,0,0,61.5,4,1.50007,1.50007,0,0,0,60,2.5ZM5.54492,58.45557A26.53723,26.53723,0,0,1,30.45508,33.54443,26.53723,26.53723,0,0,1,5.54492,58.45557Zm0-52.91114A26.53723,26.53723,0,0,1,30.45508,30.45557,26.53723,26.53723,0,0,1,5.54492,5.54443ZM58.45508,58.45557A26.53723,26.53723,0,0,1,33.54492,33.54443,26.53723,26.53723,0,0,1,58.45508,58.45557Zm-24.91016-28A26.53723,26.53723,0,0,1,58.45508,5.54443,26.53723,26.53723,0,0,1,33.54492,30.45557Z"/>
              <path d="M37.5,8C37.26862.73151,26.73035.73322,26.5,8.00012,26.73138,15.26849,37.26965,15.26678,37.5,8Zm-8,0a2.50016,2.50016,0,0,1,5,.00006A2.50016,2.50016,0,0,1,29.5,8Z"/>
              <path d="M32,50.5c-7.26849.23138-7.26678,10.76965.00012,11C39.26849,61.26862,39.26678,50.73029,32,50.5Zm0,8a2.50016,2.50016,0,0,1,.00006-5A2.50016,2.50016,0,0,1,32,58.5Z"/>
              <path d="M50.5,32c.23138,7.26849,10.76965,7.26678,11-.00012C61.26862,24.73151,50.73035,24.73322,50.5,32Zm8,0a2.50016,2.50016,0,0,1-5-.00006A2.50016,2.50016,0,0,1,58.5,32Z"/>
              <path d="M13.5,32c-.23138-7.26849-10.76965-7.26678-11,.00012C2.73138,39.26849,13.26965,39.26678,13.5,32Zm-8,0a2.50016,2.50016,0,0,1,5,.00006A2.50016,2.50016,0,0,1,5.5,32Z"/>
            </svg>
          </div>
          <h2 class="text-4xl text-center mb-12 tracking-tight">
            Staying Oriented When Intensity Arises
          </h2>
        </div>

        <div class="space-y-8 text-lg leading-relaxed">
          <p>
            Once ceremony begins, experiences may intensify.<br />
            Sensations may amplify.<br />
            Emotions may move quickly or slowly.<br />
            Thoughts may feel unfamiliar, poetic, fragmented, or insistent.
          </p>

          <div class="py-12">
            <div class="border-2 border-gray-300 p-10 text-center bg-white">
              <p class="text-xl">
                This is not a problem.
              </p>
            </div>
          </div>

          <p>
            This is the nature of altered perception.
          </p>

          <div class="pt-12">
            <div class="border-l-4 border-gray-900 pl-8">
              <p class="text-2xl leading-relaxed">
                And still &mdash; Awareness remains exactly as it always is.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-4xl mx-auto">
        <div class="text-center mb-16">
          <span class="text-xs tracking-[0.2em] text-gray-600 mb-6 block">THE MOST IMPORTANT ORIENTATION</span>
          <div class="w-32 h-px bg-gray-300 mx-auto"></div>
        </div>

        <div class="space-y-8 text-lg leading-relaxed text-center">
          <p class="text-2xl">
            Nothing that arises is outside of Awareness.
          </p>

          <div class="py-12">
            <div class="space-y-6">
              <p>Nothing that arises has authority over Awareness.</p>
              <p>Nothing that arises defines you.</p>
            </div>
          </div>

          <div class="py-8">
            <p class="mb-6">
              The experience may feel personal.<br />
              The noticing of it is impersonal, spacious, kind.
            </p>
          </div>

          <div class="py-12">
            <div class="border-2 border-gray-900 p-12 bg-white max-w-2xl mx-auto">
              <p class="text-xl leading-relaxed mb-4">
                When intensity builds, gently remember:
              </p>
              <div class="w-16 h-px bg-gray-900 mx-auto my-8"></div>
              <p class="text-2xl leading-relaxed">
                &ldquo;I am not inside this experience.<br />
                This experience is appearing inside what I am.&rdquo;
              </p>
            </div>
          </div>

          <div class="pt-8">
            <p class="text-sm text-gray-600">
              No need to repeat it like a mantra.
            </p>
            <p class="mt-4">
              Just let the recognition land softly.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="py-24 px-8">
      <div class="max-w-5xl mx-auto">
        <div class="grid grid-cols-12 gap-16">
          <div class="col-span-4">
            <div class="sticky top-24">
              <h2 class="text-3xl tracking-tight mb-6">
                When Sensation Feels Strong
              </h2>
              <div class="w-12 h-px bg-gray-900"></div>
            </div>
          </div>

          <div class="col-span-8 space-y-8 text-lg leading-relaxed">
            <p>Physical sensations may include:</p>

            <div class="grid grid-cols-2 gap-4">
              <div class="border-2 border-gray-300 p-6 text-center bg-white">
                <p>heat or cold</p>
              </div>
              <div class="border-2 border-gray-300 p-6 text-center bg-white">
                <p>pressure or vibration</p>
              </div>
              <div class="border-2 border-gray-300 p-6 text-center bg-white">
                <p>nausea or release</p>
              </div>
              <div class="border-2 border-gray-300 p-6 text-center bg-white">
                <p>expansion or contraction</p>
              </div>
            </div>

            <div class="pt-8">
              <p class="text-xl mb-6">
                Rather than asking why, try noticing how.
              </p>

              <div class="pl-8 border-l-2 border-gray-300 space-y-4 text-gray-600">
                <p>Where is the sensation located?</p>
                <p>Does it move?</p>
                <p>Does it change when it&rsquo;s allowed?</p>
              </div>
            </div>

            <div class="pt-12">
              <div class="border-2 border-gray-900 p-8 bg-white">
                <p class="text-xl text-center leading-relaxed">
                  Sensation is information, not danger.
                </p>
                <div class="w-24 h-px bg-gray-900 mx-auto my-6"></div>
                <p class="text-xl text-center leading-relaxed">
                  And it moves more easily when it&rsquo;s not resisted.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-4xl mx-auto">
        <h2 class="text-4xl text-center mb-16 tracking-tight">
          When Emotion Surfaces
        </h2>

        <div class="space-y-8 text-lg leading-relaxed">
          <p class="text-center">
            Emotions may come without explanation.
          </p>

          <div class="py-12">
            <div class="flex justify-start mb-6">
              <div class="max-w-xs">
                <div class="bg-white border-2 border-gray-300 p-6">
                  <p>Tears without story.</p>
                </div>
              </div>
            </div>

            <div class="flex justify-center mb-6">
              <div class="max-w-xs">
                <div class="bg-white border-2 border-gray-300 p-6">
                  <p>Joy without reason.</p>
                </div>
              </div>
            </div>

            <div class="flex justify-end">
              <div class="max-w-xs">
                <div class="bg-white border-2 border-gray-300 p-6">
                  <p>Fear without a clear object.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="pt-12 text-center">
            <p class="text-2xl mb-12">
              Let them pass through like weather.
            </p>

            <div class="space-y-6">
              <p>You don&rsquo;t need to analyze.</p>
              <p>You don&rsquo;t need to narrate.</p>
              <p>You don&rsquo;t need to make meaning in the moment.</p>
            </div>

            <div class="pt-12">
              <div class="inline-block border-t-2 border-b-2 border-gray-900 py-8 px-12">
                <p class="text-xl">
                  Awareness has room for all of it.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-24 px-8">
      <div class="max-w-4xl mx-auto">
        <h2 class="text-4xl text-center mb-16 tracking-tight">
          When the Mind Gets Loud
        </h2>

        <div class="space-y-8 text-lg leading-relaxed">
          <p>The mind may attempt to:</p>

          <div class="flex justify-center gap-4 flex-wrap">
            <div class="border-2 border-gray-300 px-6 py-3 bg-white">interpret</div>
            <div class="border-2 border-gray-300 px-6 py-3 bg-white">predict</div>
            <div class="border-2 border-gray-300 px-6 py-3 bg-white">control</div>
            <div class="border-2 border-gray-300 px-6 py-3 bg-white">compare</div>
            <div class="border-2 border-gray-300 px-6 py-3 bg-white">seek reassurance</div>
          </div>

          <div class="py-12">
            <div class="bg-gray-50 border-2 border-gray-300 p-10 text-center">
              <p class="text-xl mb-4">This is not failure.</p>
              <div class="w-16 h-px bg-gray-300 mx-auto my-6"></div>
              <p class="text-xl">It&rsquo;s habit.</p>
            </div>
          </div>

          <p class="text-center">
            You don&rsquo;t need to stop thinking.
          </p>

          <p class="text-center text-2xl">
            Just notice thinking.
          </p>

          <div class="pt-12">
            <div class="max-w-xl mx-auto border-l-4 border-gray-900 pl-8">
              <p class="text-lg mb-4">Sometimes simply saying inwardly,</p>
              <p class="text-2xl leading-relaxed">&ldquo;Ah&hellip; thinking,&rdquo;</p>
              <p class="text-lg mt-6">is enough to restore space.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-5xl mx-auto">
        <div class="grid grid-cols-12 gap-12 items-start">
          <div class="col-span-5">
            <div class="flex items-center justify-center sticky top-24">
              <img class="page-image" src="<?php echo esc_url( get_template_directory_uri() . '/images/bg/NybqKGVGizI.webp' ); ?>">
            </div>
          </div>

          <div class="col-span-7">
            <h2 class="text-3xl mb-12 tracking-tight">
              Breath as an Anchor
            </h2>

            <div class="space-y-8 text-lg leading-relaxed">
              <p>
                When things feel overwhelming, return to the breath.
              </p>

              <p class="text-sm text-gray-600">
                Not to change the experience &mdash; but to feel something familiar and present.
              </p>

              <div class="pt-8">
                <p class="mb-6">Notice:</p>

                <div class="space-y-6">
                  <div class="bg-white border-2 border-gray-300 p-8">
                    <p class="text-center">the inhale arriving</p>
                  </div>

                  <div class="bg-white border-2 border-gray-300 p-8">
                    <p class="text-center">the exhale leaving</p>
                  </div>
                </div>
              </div>

              <div class="pt-12">
                <div class="border-l-4 border-gray-900 pl-8 space-y-6">
                  <p class="text-xl">
                    Breath is always happening now.
                  </p>
                  <p class="text-xl">
                    And now is always safe enough.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-24 px-8">
      <div class="max-w-4xl mx-auto">
        <div class="mb-12">
          <div class="w-24 h-24 mx-auto mb-8 flex items-center justify-center">
            <svg class="cwp-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="512" height="512">
              <g id="Layer_42" data-name="Layer 42">
                <path d="M57.39,18A28.81,28.81,0,0,0,61,4a1,1,0,0,0-1-1A28.81,28.81,0,0,0,46,6.61a29,29,0,0,0-28,0A28.81,28.81,0,0,0,4,3,1,1,0,0,0,3,4,28.81,28.81,0,0,0,6.61,18a29,29,0,0,0,0,28A28.81,28.81,0,0,0,3,60a1,1,0,0,0,1,1,28.81,28.81,0,0,0,14-3.61,29,29,0,0,0,28,0A28.81,28.81,0,0,0,60,61a1,1,0,0,0,1-1,28.81,28.81,0,0,0-3.61-14,29,29,0,0,0,0-28ZM35.82,44A26.86,26.86,0,0,1,33,33a26.86,26.86,0,0,1,11,2.8A29.3,29.3,0,0,0,35.82,44ZM46,36.93A27.13,27.13,0,0,1,55.07,46,27.13,27.13,0,0,1,46,55.07,27.13,27.13,0,0,1,36.93,46,27.13,27.13,0,0,1,46,36.93ZM20,35.82A26.86,26.86,0,0,1,31,33a26.86,26.86,0,0,1-2.8,11A29.3,29.3,0,0,0,20,35.82ZM27.07,46A27.13,27.13,0,0,1,18,55.07,27.13,27.13,0,0,1,8.93,46,27.13,27.13,0,0,1,18,36.93,27.13,27.13,0,0,1,27.07,46Zm1.11-26A26.86,26.86,0,0,1,31,31a26.86,26.86,0,0,1-11-2.8A29.3,29.3,0,0,0,28.18,20ZM18,27.07A27.13,27.13,0,0,1,8.93,18,27.13,27.13,0,0,1,18,8.93,27.13,27.13,0,0,1,27.07,18,27.13,27.13,0,0,1,18,27.07Zm26,1.11A26.86,26.86,0,0,1,33,31a26.86,26.86,0,0,1,2.8-11A29.3,29.3,0,0,0,44,28.18ZM36.93,18A27.13,27.13,0,0,1,46,8.93,27.13,27.13,0,0,1,55.07,18,27.13,27.13,0,0,1,46,27.07,27.13,27.13,0,0,1,36.93,18ZM32,24.46A29,29,0,0,0,29.39,18,29,29,0,0,0,32,11.54,29,29,0,0,0,34.61,18,29,29,0,0,0,32,24.46ZM24.46,32A29,29,0,0,0,18,34.61,29,29,0,0,0,11.54,32,29,29,0,0,0,18,29.39,29,29,0,0,0,24.46,32ZM32,39.54A29,29,0,0,0,34.61,46,29,29,0,0,0,32,52.46,29,29,0,0,0,29.39,46,29,29,0,0,0,32,39.54ZM39.54,32A29,29,0,0,0,46,29.39,29,29,0,0,0,52.46,32,29,29,0,0,0,46,34.61,29,29,0,0,0,39.54,32ZM59,31a26.86,26.86,0,0,1-11-2.8A29.3,29.3,0,0,0,56.18,20,26.86,26.86,0,0,1,59,31ZM59,5a26.86,26.86,0,0,1-2.8,11A29.3,29.3,0,0,0,48,7.82,26.86,26.86,0,0,1,59,5ZM44,7.82A29.3,29.3,0,0,0,35.82,16,26.86,26.86,0,0,1,33,5,26.86,26.86,0,0,1,44,7.82ZM31,5a26.86,26.86,0,0,1-2.8,11A29.3,29.3,0,0,0,20,7.82,26.86,26.86,0,0,1,31,5ZM5,5a26.86,26.86,0,0,1,11,2.8A29.3,29.3,0,0,0,7.82,16,26.86,26.86,0,0,1,5,5Zm2.8,15A29.3,29.3,0,0,0,16,28.18,26.86,26.86,0,0,1,5,31,26.86,26.86,0,0,1,7.82,20ZM5,33a26.86,26.86,0,0,1,11,2.8A29.3,29.3,0,0,0,7.82,44,26.86,26.86,0,0,1,5,33ZM5,59a26.86,26.86,0,0,1,2.8-11A29.3,29.3,0,0,0,16,56.18,26.86,26.86,0,0,1,5,59Zm15-2.8A29.3,29.3,0,0,0,28.18,48,26.86,26.86,0,0,1,31,59,26.86,26.86,0,0,1,20,56.18ZM33,59a26.86,26.86,0,0,1,2.8-11A29.3,29.3,0,0,0,44,56.18,26.86,26.86,0,0,1,33,59Zm26,0a26.86,26.86,0,0,1-11-2.8A29.3,29.3,0,0,0,56.18,48,26.86,26.86,0,0,1,59,59Zm-2.8-15A29.3,29.3,0,0,0,48,35.82,26.86,26.86,0,0,1,59,33,26.86,26.86,0,0,1,56.18,44Z"/>
              </g>
            </svg>
          </div>
          <h2 class="text-4xl text-center mb-6 tracking-tight">
            Asking for Support
          </h2>
        </div>

        <div class="space-y-8 text-lg leading-relaxed">
          <p class="text-center text-xl">
            You are not meant to do this alone.
          </p>

          <div class="py-12">
            <p class="mb-8 text-center">
              If you feel stuck, looping, disoriented, or overwhelmed:
            </p>

            <div class="grid grid-cols-3 gap-6">
              <div class="border-2 border-gray-900 p-8 text-center bg-gray-50 flex justify-center items-center">
                <p>Raise your hand</p>
              </div>
              <div class="border-2 border-gray-900 p-8 text-center bg-gray-50 flex justify-center items-center">
                <p>Ask for support</p>
              </div>
              <div class="border-2 border-gray-900 p-8 text-center bg-gray-50 flex justify-center items-center">
                <p>Allow yourself to be helped</p>
              </div>
            </div>
          </div>

          <div class="pt-12 text-center space-y-8">
            <div class="inline-block border-2 border-gray-300 p-10 bg-gray-50">
              <p class="text-xl mb-4">This is not weakness.</p>
              <div class="w-16 h-px bg-gray-900 mx-auto my-6"></div>
              <p class="text-xl">It&rsquo;s wisdom.</p>
            </div>

            <p class="pt-8">
              Receiving support is part of staying present.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-3xl mx-auto text-center">
        <span class="text-xs tracking-[0.2em] text-gray-600 mb-12 block">A NOTE ON &ldquo;LETTING GO&rdquo;</span>

        <div class="space-y-12 text-lg leading-relaxed">
          <p class="text-2xl">
            Letting go is not something you do.
          </p>

          <div class="py-12">
            <div class="bg-white border-2 border-gray-300 p-12">
              <p class="text-xl leading-relaxed">
                It happens naturally when resistance is no longer needed.
              </p>
            </div>
          </div>

          <p>
            If you notice yourself trying to surrender &mdash; smile gently.
          </p>

          <div class="pt-8">
            <div class="inline-block border-t-2 border-b-2 border-gray-900 py-8 px-12">
              <p class="text-xl">
                Even effort is allowed.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-24 px-8">
      <div class="max-w-4xl mx-auto">
        <h2 class="text-4xl text-center mb-16 tracking-tight">
          Nothing Needs to Be Completed
        </h2>

        <div class="space-y-8 text-lg leading-relaxed">
          <p class="text-center text-xl">
            There is no finish line here.
          </p>

          <div class="py-12">
            <div class="flex justify-center gap-8">
              <div class="flex-1 max-w-xs border-2 border-gray-300 p-8 text-center bg-white">
                <p>No lesson that must land.</p>
              </div>
              <div class="flex-1 max-w-xs border-2 border-gray-300 p-8 text-center bg-white">
                <p>No breakthrough required.</p>
              </div>
            </div>
          </div>

          <div class="pt-8 space-y-6 text-center">
            <p>
              Some experiences feel unfinished because they are.
            </p>

            <p>
              Some feel quiet because quiet is enough.
            </p>
          </div>

          <div class="pt-12">
            <div class="bg-gray-50 border-2 border-gray-900 p-12 text-center">
              <p class="text-2xl leading-relaxed">
                Awareness is not waiting for resolution.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-3xl mx-auto">
        <div class="text-center mb-16">
          <div class="w-32 h-32 mx-auto mb-12 flex items-center justify-center">
            <svg class="cwp-icon" height="512" viewBox="0 0 100 100" width="512" xmlns="http://www.w3.org/2000/svg">
              <path d="m25 40c-8.271 0-15-6.729-15-15s6.729-15 15-15 15 6.729 15 15-6.729 15-15 15zm0-23.333c-4.597 0-8.333 3.739-8.333 8.333s3.736 8.333 8.333 8.333 8.333-3.739 8.333-8.333-3.736-8.333-8.333-8.333z"/>
              <path d="m75 90c-8.271 0-15-6.729-15-15s6.729-15 15-15 15 6.729 15 15-6.729 15-15 15zm0-23.333c-4.597 0-8.333 3.736-8.333 8.333s3.736 8.333 8.333 8.333 8.333-3.736 8.333-8.333-3.736-8.333-8.333-8.333z"/>
              <path d="m31.667 90c-11.947 0-21.667-9.72-21.667-21.667 0-11.946 9.72-21.666 21.667-21.666h15v-15c0-11.947 9.72-21.667 21.666-21.667 11.947 0 21.667 9.72 21.667 21.667s-9.72 21.667-21.667 21.667h-15v15c0 11.946-9.72 21.666-21.666 21.666zm0-36.667c-8.271 0-15 6.729-15 15s6.729 15 15 15 15-6.729 15-15v-15zm21.666-6.666h15c8.271 0 15-6.729 15-15s-6.729-15-15-15-15 6.729-15 15z"/>
            </svg>
          </div>
          <span class="text-xs tracking-[0.2em] text-gray-600">A SIMPLE TRUST</span>
        </div>

        <div class="space-y-12 text-lg leading-relaxed text-center">
          <div class="flex justify-start">
            <div class="max-w-md">
              <div class="bg-white border-2 border-gray-300 p-8">
                <p>Whatever arises is workable.</p>
              </div>
            </div>
          </div>

          <div class="flex justify-end">
            <div class="max-w-md">
              <div class="bg-white border-2 border-gray-300 p-8">
                <p>Whatever doesn&rsquo;t arise is also perfect.</p>
              </div>
            </div>
          </div>

          <div class="pt-12 space-y-6">
            <p>The medicine is not testing you.</p>
            <p>Life is not evaluating you.</p>
            <p>Awareness is not keeping score.</p>
          </div>

          <div class="pt-12">
            <div class="border-t-2 border-b-2 border-gray-900 py-12 px-12">
              <p class="text-2xl leading-relaxed">
                You are safe to be exactly where you are.
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

<?php
get_footer();
