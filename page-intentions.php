<?php
/**
 * Template Name: Intentions
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
          <div class="w-24 h-24 mx-auto mb-8 flex items-center justify-center">

            <svg class="cwp-icon" enable-background="new 0 0 100 100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
              <g>
                <path d="m24.423 68.236.989 1.713 11.222-6.48h4.532l-20.214 11.671.989 1.713 26.606-15.362h-42.732v1.978h26.863z"/>
                <path d="m37.413 86.296 1.714.989 15.307-26.513-10.758 6.193-.002-.001-.002.003-26.19 15.077.987 1.714 23.231-13.374-4.733 8.198 1.713.989 6.441-11.156 3.918-2.256z"/><path d="m18.732 53.004v1.978h12.958l3.924 2.266h-23.341v1.978h30.723l-37.007-21.366-.989 1.713 23.264 13.431z"/>
                <path d="m17.956 17.48-1.714.989 13.432 23.265-8.255-4.767-.989 1.713 11.223 6.481 2.264 3.922-20.213-11.67-.989 1.714 26.606 15.361z"/>
                <path d="m38.508 5.815h-1.978v26.862l-4.766-8.254-1.713.989 6.479 11.222v4.532l-11.67-20.214-1.713.989 15.361 26.607z"/>
                <path d="m60.427 5-13.431 23.263v-9.532h-1.978v12.958l-2.266 3.925v-23.34h-1.978v30.723l21.366-37.008z"/>
                <path d="m62.587 13.704-1.714-.989-15.361 26.607 37.008-21.366-.989-1.714-23.264 13.431 4.766-8.255-1.713-.989-6.48 11.222-3.924 2.266z"/>
                <path d="m79.048 24.86-.989-1.713-26.607 15.362h42.733v-1.978h-26.863l8.255-4.767-.989-1.713-11.222 6.48h-4.532z"/>
                <path d="m71.737 46.996h9.532v-1.978h-12.958l-3.925-2.266h23.34v-1.978h-30.723l37.008 21.366.989-1.713z"/>
                <path d="m82.044 82.52 1.714-.989-13.431-23.264 8.255 4.766.989-1.713-11.223-6.48-2.265-3.923 20.213 11.67.989-1.714-26.607-15.361z"/>
                <path d="m39.573 95 13.431-23.263v9.532h1.978v-12.958l2.266-3.925v23.34h1.978v-30.723l-21.366 37.008z"/>
                <path d="m61.491 94.185h1.978v-26.863l4.767 8.255 1.713-.989-6.48-11.222v-4.532l11.671 20.214 1.713-.989-15.362-26.607z"/>
              </g>
            </svg>

          </div>
          <h2 class="text-4xl text-center mb-12 tracking-tight">
            Curiosity Without Control
          </h2>
        </div>

        <div class="space-y-8 text-lg leading-relaxed">
          <p>
            Before ceremony, many traditions invite you to set an intention.<br />
            Not as a demand.<br />
            Not as a contract with the universe.<br />
            Not as a way to control the experience.
          </p>

          <div class="py-12">
            <div class="border-l-4 border-gray-900 pl-8">
              <p class="text-2xl leading-relaxed">
                An intention, in this context, is simply a direction of curiosity.
              </p>
            </div>
          </div>

          <p>
            It&rsquo;s not about what you want to get.<br />
            It&rsquo;s about what you&rsquo;re willing to look at &mdash;<br />
            gently, honestly, without knowing how it will unfold.
          </p>
        </div>
      </div>
    </section>

    <section class="py-24 px-8">
      <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-12 gap-12 items-start">
          <div class="col-span-5">
            <div class="flex items-center justify-center sticky top-24">
              <img class="page-image" src="<?php echo esc_url( get_template_directory_uri() . '/images/bg/xMMhVFGL9M.webp' ); ?>">
            </div>
          </div>

          <div class="col-span-7">
            <div class="space-y-8 text-lg leading-relaxed">
              <p>
                From the perspective of Awareness, nothing is lacking.
              </p>

              <p>
                From the perspective of being human, there may be tenderness, confusion, longing, or fatigue.
              </p>

              <p>
                Both are welcome.
              </p>

              <div class="py-8">
                <div class="h-px bg-gray-300 w-24"></div>
              </div>

              <p>
                An intention is not meant to override what is already here.
              </p>

              <p>
                It&rsquo;s meant to include it.
              </p>

              <div class="pt-12 space-y-8">
                <div>
                  <p class="text-sm text-gray-600 mb-4">Rather than asking:</p>
                  <ul class="space-y-3 pl-6 border-l-2 border-gray-300 text-gray-600">
                    <li>&ldquo;What do I need to fix?&rdquo;</li>
                    <li>&ldquo;What&rsquo;s wrong with me?&rdquo;</li>
                    <li>&ldquo;What should happen?&rdquo;</li>
                  </ul>
                </div>

                <div>
                  <p class="text-sm mb-4">We lean toward:</p>
                  <ul class="space-y-3 pl-6 border-l-2 border-gray-900">
                    <li>&ldquo;What is asking to be seen?&rdquo;</li>
                    <li>&ldquo;What am I willing to feel?&rdquo;</li>
                    <li>&ldquo;What am I ready to tell the truth about &mdash; without trying to change it?&rdquo;</li>
                  </ul>
                </div>
              </div>

              <div class="py-16">
                <div class="border border-gray-900 p-12 text-center bg-white">
                  <p class="text-3xl tracking-tight">
                    &ldquo;I&rsquo;m available.&rdquo;
                  </p>
                  <p class="text-sm text-gray-600 mt-4">
                    Often the most powerful intention sounds like:
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-3xl mx-auto text-center">
        <h2 class="text-4xl mb-16 tracking-tight">
          Holding Intentions Lightly
        </h2>

        <div class="space-y-8 text-lg leading-relaxed">
          <p>
            Intentions work best when they are held loosely.
          </p>

          <div class="py-8">
            <div class="inline-block border-t-2 border-b-2 border-gray-900 py-6 px-12 bg-white">
              <p class="text-xl">
                The mind loves to cling.<br />
                The heart knows how to listen.
              </p>
            </div>
          </div>

          <p>
            You may discover that the intention you arrive with<br />
            is not the one that remains relevant.
          </p>

          <p>
            That&rsquo;s not failure.<br />
            That&rsquo;s intelligence.
          </p>

          <div class="pt-12">
            <p class="text-2xl">
              Awareness is far more creative than planning.
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
              <div class="w-16 h-16 mb-6 flex items-center justify-center">
                <svg class="cwp-icon" height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg">
                  <path d="m54.72949 32.52637a21.93969 21.93969 0 0 0 -8.46856-5.92432 24.15394 24.15394 0 0 0 -1.82734-9.94678c-2.65234-6.46484-5.957-10.377-9.82226-11.626-2.80078-.90327-5.90133-.3779-8.96582 1.52932-6.53743 4.35584-8.25541 10.85267-7.76688 19.71182-10.99549 4.97504-16.11057 16.55924-13.03457 24.52659 4.51373 12.47938 18.27309 8.1319 26.84029 1.7421 4.52087 3.79674 10.69409 6.76972 16.37425 6.87408a9.56592 9.56592 0 0 0 6.54589-2.28229c7.13574-6.25489 7.1836-15.68265.125-24.60452zm-10.13 2.50482c6.21559 3.29759 8.9116 8.83167 7.55209 13.35941-2.80265 3.27705-9.67829 3.40213-14.66164-1.38226a40.53931 40.53931 0 0 0 7.10955-11.97715zm-23.54676-19.60639c1.5641-5.14847 7.74221-10.18291 12.94345-8.4922 3.27921 1.05959 6.16882 4.58595 8.58782 10.4824a22.72 22.72 0 0 1 .49315 15.917 37.40361 37.40361 0 0 1 -6.9679 12.203c-1.04257-1.28433-2.06842-2.78791-2.93782-4.0186.14247-.16163.2831-.32606.42623-.48707a28.81224 28.81224 0 0 0 5.76173-8.91892 20.007 20.007 0 0 0 1.4287-6.56741c.42046-4.90476-3.0358-13.3158-6.9884-14.28022-3.93643-1.18258-7.92546 2.67831-8.98712 6.56047a19.66129 19.66129 0 0 0 -.74073 6.39315 29.754 29.754 0 0 0 -4.241 1.23743 25.5826 25.5826 0 0 1 1.22189-10.02903zm4.98981 8.43482c.05353-4.37455.65187-7.47426 3.7083-9.85678a3.89438 3.89438 0 0 1 3.45131-.83194c2.67937.58343 5.61406 7.36766 5.57436 11.09881a36.96257 36.96257 0 0 0 -12.73397-.41009zm6.34613 15.52026c-.07257.06421-.30779.35928-.37688.42623-3.39839-5.18489-4.15644-7.59261-4.25984-7.96236a29.67965 29.67965 0 0 1 9.27173.63229 27.31813 27.31813 0 0 1 -4.63501 6.90384zm-17.81543 17.35938c-3.46094-.083-6.46484-2.60938-7.83886-6.59375-3.6859-10.01331 6.11124-22.19512 18.5481-24.14532a34.721 34.721 0 0 1 13.43752.30081c-.88921 5.56476-.19132 4.12712-5.27272 3.57681a23.773 23.773 0 0 0 -13.6494 2.2736c-7.126 3.67187-10.5957 10.76562-9.833 15.502 1.72909 8.23187 12.06841 4.83954 17.16.246a35.287 35.287 0 0 0 3.04932 3.29375c-3.26398 2.42165-8.97608 5.74117-15.60096 5.5461zm5.12018-22.23694a48.25551 48.25551 0 0 0 6.21527 11.82268c-2.82361 2.39539-6.83093 4.821-10.981 4.16724a3.4722 3.4722 0 0 1 -2.98828-3.15625c-.59981-3.7235 2.19584-9.49316 7.75401-12.83367zm33.59174 21.12561c-5.13675 4.5318-15.92284-.54252-20.90029-5.11132-4.9749-4.32918-8.839-11.01283-10.89631-16.951 1.26471-.48007 3.03962-1.40779 4.31608-1.26419.14556.556 1.046 3.46224 5.27251 9.71029a55.23212 55.23212 0 0 0 4.32907 5.74416 14.49255 14.49255 0 0 0 10.71683 4.95506c2.9737.09121 6.80141-1.3838 7.788-3.37019 2.038-5.46554-1.22692-12.44657-8.689-16.23157a26.9742 26.9742 0 0 0 .88995-4.39312 19.274 19.274 0 0 1 7.04913 5.05054c6.42676 8.12306 6.47364 16.29591.12403 21.86134z"/>
                </svg>
              </div>
              <h2 class="text-3xl tracking-tight mb-6">
                Inquiry Instead of Expectation
              </h2>
              <div class="w-12 h-px bg-gray-900"></div>
            </div>
          </div>

          <div class="col-span-8 space-y-8 text-lg leading-relaxed">
            <p>
              During ceremony, if questions arise,<br />
              let them be invitations, not interrogations.
            </p>

            <div class="py-8">
              <p class="text-sm text-gray-600 mb-6">Helpful inquiries might sound like:</p>
              <div class="space-y-6">
                <div class="border-2 border-gray-300 p-6 bg-white">
                  <p>&ldquo;What is this experience inviting me to notice?&rdquo;</p>
                </div>
                <div class="border-2 border-gray-300 p-6 bg-white">
                  <p>&ldquo;Can I allow this moment exactly as it is?&rdquo;</p>
                </div>
                <div class="border-2 border-gray-300 p-6 bg-white">
                  <p>&ldquo;What happens if I stop resisting?&rdquo;</p>
                </div>
              </div>
            </div>

            <p>
              You don&rsquo;t need answers in words.
            </p>

            <div class="pt-8 pl-8 border-l-4 border-gray-900">
              <p class="text-2xl leading-relaxed">
                Clarity often arrives as relaxation.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-4xl mx-auto">
        <div class="text-center mb-20">
          <h2 class="text-4xl tracking-tight mb-6">
            A Note on Outcomes
          </h2>
          <div class="flex justify-center">
            <div class="w-32 h-px bg-gray-300"></div>
          </div>
        </div>

        <div class="space-y-12">
          <div class="flex justify-start">
            <div class="max-w-xl">
              <div class="border-2 border-gray-900 p-8 bg-white">
                <p class="text-lg leading-relaxed">
                  Visions do not mean you did it &ldquo;right.&rdquo;
                </p>
              </div>
            </div>
          </div>

          <div class="flex justify-end">
            <div class="max-w-xl">
              <div class="border-2 border-gray-900 p-8 bg-white">
                <p class="text-lg leading-relaxed">
                  Discomfort does not mean you did it &ldquo;wrong.&rdquo;
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-20 text-center space-y-8 text-lg leading-relaxed">
          <p>
            Sometimes the deepest shifts feel surprisingly ordinary.
          </p>

          <p>
            Sometimes nothing dramatic happens &mdash;<br />
            and something essential loosens anyway.
          </p>

          <div class="pt-12">
            <div class="inline-block px-12 py-8 bg-gray-50 border-2 border-gray-300">
              <p class="text-2xl">
                Awareness doesn&rsquo;t advertise itself.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-24 px-8">
      <div class="max-w-5xl mx-auto">
        <div class="mb-16">
          <span class="text-xs tracking-[0.2em] text-gray-600">REFLECTION</span>
        </div>

        <div class="grid grid-cols-12 gap-12">
          <div class="col-span-5">
            <p class="text-lg leading-relaxed">
              If it feels supportive, you might sit with these prompts:
            </p>
          </div>

          <div class="col-span-7 space-y-6">
            <div class="bg-white border-2 border-gray-300 p-8 bg-white">
              <p class="text-lg leading-relaxed">
                What feels alive or tender in my life right now?
              </p>
            </div>

            <div class="bg-white border-2 border-gray-300 p-8">
              <p class="text-lg leading-relaxed">
                Where do I notice contraction or effort?
              </p>
            </div>

            <div class="bg-white border-2 border-gray-300 p-8">
              <p class="text-lg leading-relaxed">
                What would it feel like to trust the process without knowing the outcome?
              </p>
            </div>

            <div class="bg-white border-2 border-gray-300 p-8">
              <p class="text-lg leading-relaxed">
                If nothing needed to change, what would I allow myself to feel?
              </p>
            </div>
          </div>
        </div>

        <div class="mt-20 text-center space-y-6 text-lg leading-relaxed max-w-2xl mx-auto">
          <p>
            You don&rsquo;t need perfect answers.
          </p>

          <p class="text-xl">
            Honest ones are more than enough.
          </p>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-3xl mx-auto">
        <div class="mb-16">
          <div class="w-32 h-32 mx-auto flex items-center justify-center">
            <svg class="cwp-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
              <path d="M60,2.5A29.54577,29.54577,0,0,0,32,22.73132,29.54577,29.54577,0,0,0,4,2.5,1.50008,1.50008,0,0,0,2.5,4,29.54577,29.54577,0,0,0,22.73132,32,29.54577,29.54577,0,0,0,2.5,60,1.50008,1.50008,0,0,0,4,61.5,29.54577,29.54577,0,0,0,32,41.26868,29.54577,29.54577,0,0,0,60,61.5,1.50007,1.50007,0,0,0,61.5,60,29.54577,29.54577,0,0,0,41.26868,32,29.54577,29.54577,0,0,0,61.5,4,1.50007,1.50007,0,0,0,60,2.5ZM5.54492,58.45557A26.53723,26.53723,0,0,1,30.45508,33.54443,26.53723,26.53723,0,0,1,5.54492,58.45557Zm0-52.91114A26.53723,26.53723,0,0,1,30.45508,30.45557,26.53723,26.53723,0,0,1,5.54492,5.54443ZM58.45508,58.45557A26.53723,26.53723,0,0,1,33.54492,33.54443,26.53723,26.53723,0,0,1,58.45508,58.45557Zm-24.91016-28A26.53723,26.53723,0,0,1,58.45508,5.54443,26.53723,26.53723,0,0,1,33.54492,30.45557Z"/>
              <path d="M37.5,8C37.26862.73151,26.73035.73322,26.5,8.00012,26.73138,15.26849,37.26965,15.26678,37.5,8Zm-8,0a2.50016,2.50016,0,0,1,5,.00006A2.50016,2.50016,0,0,1,29.5,8Z"/>
              <path d="M32,50.5c-7.26849.23138-7.26678,10.76965.00012,11C39.26849,61.26862,39.26678,50.73029,32,50.5Zm0,8a2.50016,2.50016,0,0,1,.00006-5A2.50016,2.50016,0,0,1,32,58.5Z"/>
              <path d="M50.5,32c.23138,7.26849,10.76965,7.26678,11-.00012C61.26862,24.73151,50.73035,24.73322,50.5,32Zm8,0a2.50016,2.50016,0,0,1-5-.00006A2.50016,2.50016,0,0,1,58.5,32Z"/>
              <path d="M13.5,32c-.23138-7.26849-10.76965-7.26678-11,.00012C2.73138,39.26849,13.26965,39.26678,13.5,32Zm-8,0a2.50016,2.50016,0,0,1,5,.00006A2.50016,2.50016,0,0,1,5.5,32Z"/>
            </svg>
          </div>
        </div>

        <div class="text-center space-y-8 text-lg leading-relaxed">
          <p>
            You are not here to perform spirituality.<br />
            You are not here to impress the medicine.<br />
            You are not here to earn insight.
          </p>

          <div class="py-12">
            <div class="border-t-2 border-b-2 border-gray-900 py-12 px-8 bg-white">
              <p class="text-2xl leading-relaxed">
                You are here because something in you recognized<br />
                that it was safe to pause.
              </p>
            </div>
          </div>

          <p class="text-xl">
            That willingness alone is enough.
          </p>
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
