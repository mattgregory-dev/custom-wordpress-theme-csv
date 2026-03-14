<?php
/**
 * Template Name: Preparation
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
            <svg class="cwp-icon" height="512" viewBox="0 0 55 55" width="512" xmlns="http://www.w3.org/2000/svg">
              <g>
                <path d="m39.3580322 41.8481216c-3.4921875-.2919312-6.9359741-1.3843384-9.7655029-3.3300171 1.5283813-.5916748 2.9857788-1.3482056 4.3417969-2.246582 2.8721313-.7720947 5.9441528-.9058838 8.9362793-.4526978 1.5229492.2281494 3.0216064.6344604 4.477356 1.1878662 1.4470215.5734863 2.8468628 1.3008423 4.1520386 2.2179565-3.6894112-3.8455467-9.3400116-5.5715179-14.680603-5.2501221 1.6975708-1.3929443 3.2127075-3.0089741 4.5344849-4.7666035 1.6824341-2.2839966 3.0107422-4.8329468 3.9197998-7.5353394.8724976-2.7109985 1.3220825-5.5841675 1.1673584-8.4533072l-.0015869-.0325928c-.0042725-.0714722-.0169067-.1436157-.0386353-.21521-.149231-.4920654-.6691284-.7700195-1.1611938-.6207886-2.7261963.8266602-5.2740479 2.1638184-7.4750977 3.907836-1.690979 1.3149414-3.1901855 2.8482666-4.4902954 4.5236206-.1033936-2.1469116-.4755859-4.2874756-1.0878296-6.3623037-.8310547-2.7206421-2.1360474-5.3198853-3.9085083-7.5883183-.4132595-.5212717-1.1788712-.4982815-1.5681763.0003662-3.137146 4.0168462-4.7593994 9.0001831-4.994873 13.9786377-1.36623-1.7573872-2.7495766-3.1774311-4.5049438-4.5465088-2.1954346-1.7297964-4.72229-3.0765371-7.4378052-3.8978262-.0653078-.0193483-.1383669-.0332033-.2092897-.0375979-.5059815-.0311279-.9413452.3537598-.9725342.8597413l-.0019531.0316162c-.1765747 2.8673697.2880859 5.7407827 1.1570435 8.4508047.8889771 2.710083 2.2427979 5.2493896 3.9107056 7.5401611 1.0061035 1.3491211 2.1411743 2.6011963 3.3717651 3.7491474-4.8372184-.3542404-9.9475108.9705773-13.5278321 4.1269531 4.5151405-2.6311722 10.3563271-3.4404297 16.0217896-1.9616699 1.7024536 1.3602295 3.6109009 2.4769897 5.6525879 3.2940674-1.1786499.6443481-2.4358521 1.1593628-3.7410889 1.5274658-1.9594727.5802612-4.0211792.8085938-6.0874023.8083496-4.1274415-.0454712-8.3170167-1.1914672-11.8458863-3.6682129 1.4799194 1.5716553 3.3502808 2.7855225 5.3615112 3.6671143 2.0223389.8634033 4.2007446 1.3963013 6.4146729 1.5602417 3.9033203.3156128 7.9804077-.4705811 11.4506226-2.4906616.0153198.0275879.0223999.0576782.0410156.0839844.0264282.0373535.0649414.0584106.0957642.090332-.0596924.2556152-.1138916.5112915-.1610718.7669678-.2761478 1.6288452-.2997437 3.4369049-.0026855 5.1905518.1583862.8651123.3673096 1.7302246.7863159 2.5952759.7315731-1.5105743 1.0027599-3.5191193.9996948-5.1905518-.0011597-.8651123-.069458-1.7301636-.2161255-2.5952759-.0472412-.2561035-.1016235-.512207-.161438-.7683105.0170288-.0178223.0352783-.0346069.0505371-.0535889 3.2692261 2.2883301 7.2349854 3.4227295 11.1309814 3.4579468 2.2242432.0301514 4.4430542-.3104248 6.5366821-.9932251 2.0842285-.7012329 4.057312-1.7469482 5.6735229-3.1831665-3.7373656 2.1634521-8.0200805 2.9386596-12.1419677 2.623474zm-.6640014-24.3338642c1.814209-1.2484131 3.7751465-2.2673941 5.8380127-2.9574575-.0639648 2.199645-.4510498 4.394042-1.1578369 6.4909048-.8068237 2.5090332-2.0316772 4.8872681-3.5542603 7.053833-1.5080566 2.1812744-3.3629761 4.1176167-5.4396362 5.776247-.2433472.1905518-.5018311.3619385-.7520142.5440063-.2191391.0485764-.3675957.0534592-.5460205.164978l-.0287476.0179443c-1.2769165.7977905-2.6220703 1.4782104-4.0176392 2.0106201.3173828-.5600586.6091919-1.1325073.8756104-1.7148438.72052-1.2174072 1.3292236-2.5100708 1.8377686-3.8381367.9559326-2.6308594 1.4783325-5.4326782 1.5441284-8.2521973.0030518-.0907593-.0045776-.1817627-.0025635-.272583 1.5820313-1.9133909 3.3989258-3.6148679 5.4031983-5.0233152zm-14.0891724-2.5217275c.6867065-2.0765991 1.6532593-4.0530396 2.8890991-5.8346558 1.2359009 1.7808838 2.2046509 3.7559204 2.8869629 5.8337402.8502808 2.5037222 1.2601318 5.1539297 1.3516846 7.8185415.0686035 2.6655884-.2175903 5.3553467-.9180298 7.9559937-.3273315 1.305727-.7766724 2.5805073-1.3330688 3.8149433-.5119019.8685303-1.0950928 1.6836548-1.7189331 2.4647827-.0830078.0252075-.1646118.0550537-.2479248.0791016-.0789795-.022583-.1551514-.053833-.2337646-.0775146-.6929932-.8760376-1.3425293-1.791687-1.8995361-2.7736816-.4951172-1.1394043-.9103394-2.3082905-1.2119141-3.507021-.7012329-2.6005249-.9891357-5.2912598-.9241943-7.9561768.093994-2.6635742.5095213-5.3143921 1.359619-7.8180532zm-9.3939819 13.0974722c-1.5427246-2.1554565-2.7462158-4.5415649-3.5755615-7.0419312-.713623-2.1020508-1.0924072-4.3018799-1.1634521-6.5074453 2.0606079.6912842 4.0274048 1.6939077 5.8425293 2.9387197 1.0819092.7498779 2.1039429 1.5912476 3.0775757 2.4911499.8217773.7591553 1.5737305 1.5921631 2.3034058 2.4483032.0016479.1304321-.0083008.2615356-.0047607.3917847.0689697 2.8204346.5931396 5.6203613 1.5498047 8.2508545.4108887 1.0736103.9036865 2.1143208 1.4509277 3.1212177.0303955.0725708.0563354.1467285.0875244.2190552.3170776.7371216.6707764 1.4631958 1.0648804 2.1693115-1.911274-.7426758-3.7181396-1.77771-5.3959351-2.9923096l-.0390625-.0285034c-.0748901-.0537109-.1636353-.0894165-.2568359-.1156006-1.8768313-1.5545673-3.5553591-3.3437518-4.9410402-5.3446063z"/>
              </g>
            </svg>
          </div>
          <h2 class="text-4xl text-center mb-12 tracking-tight">
            Care, Not Compliance
          </h2>
        </div>

        <div class="space-y-8 text-lg leading-relaxed">
          <p>
            Before ceremony, much emphasis is placed on preparing the body.<br />
            Not because the body is a problem.<br />
            Not because purity earns grace.<br />
            And not because the medicine needs you to be &ldquo;good.&rdquo;
          </p>

          <div class="py-12">
            <div class="border-l-4 border-gray-900 pl-8">
              <p class="text-2xl leading-relaxed">
                Preparation is simply an act of care.
              </p>
            </div>
          </div>

          <p>
            The body is the instrument through which this experience will move.<br />
            The nervous system is the landscape in which sensations, emotions, and perceptions will arise.
          </p>

          <p>
            So we tend to them kindly.
          </p>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-3xl mx-auto text-center">
        <div class="space-y-8 text-lg leading-relaxed">
          <p class="text-2xl">
            Awareness does not need preparation.<br />
            The body-mind does.
          </p>

          <div class="py-12">
            <div class="inline-block border-t-2 border-b-2 border-gray-900 py-6 px-12 bg-white">
              <p class="text-xl">
                And tending to the body-mind is not spiritual hierarchy &mdash; it&rsquo;s basic love.
              </p>
            </div>
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
                The Dieta (Reframed)
              </h2>
              <div class="w-12 h-px bg-gray-900"></div>
            </div>
          </div>

          <div class="col-span-8 space-y-8 text-lg leading-relaxed">
            <p>
              The dieta is not a test.<br />
              It is not a moral measure.<br />
              It is not about deprivation or punishment.
            </p>

            <p>
              It is about reducing unnecessary stimulation so the nervous system can be more responsive and less reactive.
            </p>

            <div class="py-8 pl-8 border-l-2 border-gray-300">
              <p class="text-gray-600">
                Heavy foods, intoxicants, excess sugar, alcohol, recreational drugs, and certain medications can dull sensitivity, strain the body, or create unsafe interactions with the medicine.
              </p>
            </div>

            <p>
              The dieta creates space.<br />
              Less interference.<br />
              Less noise.
            </p>

            <div class="pt-8">
              <div class="border-2 border-gray-900 p-8 bg-white">
                <p class="text-xl leading-relaxed">
                  Not to make something special happen &mdash;<br />
                  but to allow what&rsquo;s already present to be felt more clearly.
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
          Food as Support, Not Control
        </h2>

        <div class="space-y-8 text-lg leading-relaxed">
          <p>
            In the days leading up to ceremony, we recommend:
          </p>

          <ul class="pl-8 border-l-2 border-gray-900 space-y-3">
            <li>simple, clean, nourishing foods</li>
            <li>plenty of hydration</li>
            <li>fewer extremes</li>
          </ul>

          <div class="py-12 text-center">
            <p class="text-2xl">
              Think: gentle, grounding, uncomplicated.
            </p>
          </div>

          <div class="py-8">
            <div class="bg-white border-2 border-gray-300 p-12 text-center">
              <p class="text-xl leading-relaxed">
                Eat in a way that says to your body:<br />
                &ldquo;I&rsquo;m listening.&rdquo;
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-24 px-8">
      <div class="max-w-4xl mx-auto">
        <div class="mb-12">
          <div class="w-24 h-24 mx-auto mb-6 flex items-center justify-center">
            <svg class="cwp-icon" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
              <path d="m480 441h-448c-1.816 0-3.489-.984-4.371-2.572-.882-1.587-.834-3.527.125-5.069l224-360c.914-1.467 2.519-2.359 4.246-2.359s3.333.892 4.245 2.358l224 360c.96 1.542 1.008 3.482.126 5.069-.881 1.589-2.555 2.573-4.371 2.573zm-215-10h206l-103-165.536zm-224 0h206l-103-165.536zm112-170 103 165.536 103-165.536zm0-10h206l-103-165.536z" fill="rgb(0,0,0)"/>
            </svg>
          </div>
          <h2 class="text-4xl text-center mb-6 tracking-tight">
            Substances &amp; Safety
          </h2>
        </div>

        <div class="space-y-8 text-lg leading-relaxed">
          <p>
            Some substances and medications cannot be combined safely with Ayahuasca.
          </p>

          <div class="py-8">
            <div class="border-2 border-gray-900 p-8 bg-white">
              <p class="text-xl text-center">
                This is not symbolic.<br />
                This is biochemical reality.
              </p>
            </div>
          </div>

          <p>
            Please follow all medical guidelines, disclosures, and timelines carefully.
          </p>

          <p>
            If you are unsure about a medication or supplement, ask.<br />
            If something feels unclear, speak up.
          </p>

          <div class="pt-12 space-y-6">
            <div class="text-center">
              <p class="text-2xl mb-4">
                There is no virtue in silence here.
              </p>
              <div class="w-24 h-px bg-gray-300 mx-auto mb-4"></div>
              <p class="text-xl">
                Transparency is protection.
              </p>
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
              <img class="page-image" src="<?php echo esc_url( get_template_directory_uri() . '/images/bg/ZahNAlIc3o.webp' ); ?>">
            </div>
          </div>

          <div class="col-span-7">
            <h2 class="text-3xl mb-12 tracking-tight">
              Sleep, Rest, and Rhythm
            </h2>

            <div class="space-y-8 text-lg leading-relaxed">
              <div class="flex justify-start gap-8">
                <div class="flex-1 border-2 border-gray-900 p-6 text-center bg-white">
                  <p>Fatigue amplifies intensity.</p>
                </div>
                <div class="flex-1 border-2 border-gray-900 p-6 text-center bg-white">
                  <p>Rest supports resilience.</p>
                </div>
              </div>

              <div class="pt-8">
                <p class="mb-6">In the weeks leading up to ceremony:</p>
                <ul class="space-y-4 pl-8 border-l-2 border-gray-900">
                  <li>prioritize sleep</li>
                  <li>reduce late nights and overstimulation</li>
                  <li>notice how much input your system actually needs</li>
                </ul>
              </div>

              <div class="pt-12 pl-8 border-l-4 border-gray-300">
                <p class="text-xl leading-relaxed">
                  Turning down the volume on the world often reveals how sensitive and intelligent the body already is.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-24 px-8">
      <div class="max-w-3xl mx-auto text-center">
        <h2 class="text-4xl mb-16 tracking-tight">
          Movement &amp; the Body
        </h2>

        <div class="space-y-8 text-lg leading-relaxed">
          <p class="text-xl">
            Gentle movement helps energy move.
          </p>

          <div class="py-12">
            <div class="flex justify-center gap-4 flex-wrap">
              <div class="border-2 border-gray-300 px-6 py-3 bg-white">Walking.</div>
              <div class="border-2 border-gray-300 px-6 py-3 bg-white">Stretching.</div>
              <div class="border-2 border-gray-300 px-6 py-3 bg-white">Yoga.</div>
              <div class="border-2 border-gray-300 px-6 py-3 bg-white">Qi Gong.</div>
              <div class="border-2 border-gray-300 px-6 py-3 bg-white">Dancing in your kitchen.</div>
            </div>
          </div>

          <p>
            Nothing extreme is required.
          </p>

          <p>
            Just enough to stay in relationship with your body.
          </p>

          <div class="pt-12">
            <div class="inline-block border-t-2 border-b-2 border-gray-900 py-6 px-12 bg-white">
              <p class="text-xl">
                The goal is not fitness.<br />
                The goal is presence.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-24 px-8">
      <div class="max-w-4xl mx-auto">
        <h2 class="text-4xl text-center mb-16 tracking-tight">
          A Word About Discomfort
        </h2>

        <div class="space-y-8 text-lg leading-relaxed">
          <p>
            As preparation deepens, emotions or memories may surface.
          </p>

          <div class="py-8">
            <div class="bg-white border-2 border-gray-300 p-10 text-center">
              <p class="text-xl">
                This is not a sign something is wrong.
              </p>
            </div>
          </div>

          <p>
            It&rsquo;s often a sign that the system feels safe enough to reveal what&rsquo;s been waiting.
          </p>

          <p>
            Meet this with curiosity, not urgency.
          </p>

          <div class="pt-12 text-center">
            <p class="text-xl mb-8">
              You don&rsquo;t need to solve anything.
            </p>

            <div class="space-y-4">
              <p class="text-2xl">
                Let what arises arise.<br />
                Let what passes pass.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-24 px-8">
      <div class="max-w-5xl mx-auto">
        <div class="mb-12">
          <span class="text-xs tracking-[0.2em] text-gray-600">GENTLE REFLECTION</span>
        </div>

        <div class="grid grid-cols-12 gap-12">
          <div class="col-span-5">
            <p class="text-lg leading-relaxed">
              You might ask yourself:
            </p>
          </div>

          <div class="col-span-7 space-y-6">
            <div class="bg-gray-50 border-2 border-gray-300 p-8">
              <p class="text-lg leading-relaxed">
                What does my body need more of right now?
              </p>
            </div>

            <div class="bg-gray-50 border-2 border-gray-300 p-8">
              <p class="text-lg leading-relaxed">
                What does it need less of?
              </p>
            </div>

            <div class="bg-gray-50 border-2 border-gray-300 p-8">
              <p class="text-lg leading-relaxed">
                Where am I pushing when I could be listening?
              </p>
            </div>
          </div>
        </div>

        <div class="mt-16 text-center">
          <p class="text-lg leading-relaxed">
            There are no right answers &mdash; only honest noticing.
          </p>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-3xl mx-auto text-center">
        <div class="w-32 h-32 mx-auto mb-16 flex items-center justify-center">
          <svg class="cwp-icon" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
            <path d="m256 463.5c-1.28 0-2.559-.488-3.536-1.465l-144-144c-1.953-1.952-1.953-5.118 0-7.07l54.965-54.965-54.964-54.964c-1.953-1.953-1.953-5.119 0-7.071l144-144c1.953-1.952 5.119-1.952 7.071 0l144 144c1.953 1.953 1.953 5.119 0 7.071l-54.964 54.964 54.964 54.965c1.953 1.952 1.953 5.118 0 7.07l-144 144c-.976.977-2.256 1.465-3.536 1.465zm-94.178-106.25 94.178 94.179 94.179-94.179-51.429-51.429-39.215 39.214c-1.951 1.954-5.118 1.953-7.071 0l-39.214-39.214zm144-58.5 51.429 51.429 35.679-35.679-51.43-51.429zm-186.75 15.75 35.679 35.679 51.429-51.429-35.68-35.679zm101.25-15.75 35.678 35.679 35.679-35.679-35.679-35.679zm42.75-42.75 35.679 35.679 35.678-35.679-35.679-35.679zm-85.5 0 35.679 35.679 35.678-35.679-35.679-35.679zm128.25-42.75 35.679 35.679 51.429-51.429-35.679-35.679zm-85.5 0 35.678 35.679 35.679-35.679-35.679-35.679zm-101.25-15.75 51.429 51.429 35.679-35.679-51.429-51.429zm136.928-32c1.279 0 2.56.488 3.535 1.464l39.215 39.214 51.429-51.429-94.179-94.178-94.179 94.179 51.429 51.429 39.214-39.214c.977-.977 2.256-1.465 3.536-1.465z" fill="rgb(0,0,0)"/>
          </svg>
        </div>

        <div class="space-y-8 text-lg leading-relaxed">
          <p>
            Preparation is not about getting ready for ceremony.
          </p>

          <div class="py-12">
            <div class="border-t-2 border-b-2 border-gray-900 py-12 px-8 bg-white">
              <p class="text-2xl leading-relaxed">
                It&rsquo;s about practicing the art of listening.
              </p>
            </div>
          </div>

          <p>
            And that practice doesn&rsquo;t end when the dieta does or when ceremony begins.
          </p>

          <p class="text-xl pt-8">
            It becomes a way of living.
          </p>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-4xl mx-auto">
        <div class="text-center mb-16">
          <span class="text-xs tracking-[0.2em] text-gray-600 mb-4 block">DIETA GUIDELINES</span>
          <h2 class="text-4xl mb-6 tracking-tight">
            Nourishing the Body, Supporting the Nervous System
          </h2>
        </div>

        <div class="space-y-8 text-lg leading-relaxed">
          <h3 class="text-2xl">
            Care, Not Perfection
          </h3>

          <p>
            The purpose of the dieta is not purity.<br />
            It is not sacrifice.<br />
            And it is not about pleasing the medicine.
          </p>

          <div class="py-8 pl-8 border-l-2 border-gray-900">
            <p>
              The dieta exists to support safety, sensitivity, and nervous-system regulation, so the body-mind is not unnecessarily taxed during ceremony.
            </p>
          </div>

          <p>
            Awareness needs none of this.<br />
            The body does.
          </p>

          <div class="pt-12">
            <div class="bg-gray-50 border-2 border-gray-300 p-10 text-center">
              <p class="text-xl leading-relaxed">
                Think of the dieta as turning down background noise &mdash; not to force something to happen, but to make space for what naturally unfolds.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-6xl mx-auto">
        <div class="text-center mb-20">
          <span class="text-xs tracking-[0.2em] text-gray-600 mb-4 block">TIMELINE OVERVIEW</span>
          <div class="w-32 h-px bg-gray-300 mx-auto"></div>
        </div>

        <div class="grid grid-cols-2 gap-12">

          <div class="border-2 border-gray-300 p-10 bg-white">
            <h3 class="text-2xl mb-6 tracking-tight">
              2 Weeks Before Ceremony
            </h3>

            <p class="text-sm text-gray-600 mb-8">
              (If possible &mdash; earlier is welcome, later is still okay. This is not about being perfect.)
            </p>

            <p class="mb-6">Please avoid:</p>

            <ul class="space-y-3 pl-6 border-l-2 border-gray-900 mb-8">
              <li>Alcohol</li>
              <li>Recreational drugs (including cannabis)</li>
              <li>Red meat &amp; pork</li>
              <li>Processed foods &amp; fast food</li>
              <li>Excess sugar</li>
              <li>Energy drinks</li>
            </ul>

            <p class="text-sm text-gray-600">
              This helps stabilize mood, digestion, sleep, and emotional reactivity.
            </p>
          </div>

          <div class="border-2 border-gray-900 p-10 bg-white">
            <h3 class="text-2xl mb-6 tracking-tight">
              48&ndash;72 Hours Before Ceremony
            </h3>

            <p class="text-sm mb-8">
              (This window matters most.)
            </p>

            <p class="mb-6">Please avoid:</p>

            <ul class="space-y-3 pl-6 border-l-2 border-gray-900 mb-8 text-sm">
              <li>Alcohol &amp; all recreational substances</li>
              <li>Sexual activity</li>
              <li>Caffeine</li>
              <li>Spicy foods</li>
              <li>Fried or very oily foods</li>
              <li>Fermented foods</li>
              <li>Aged or processed foods</li>
              <li>Dairy</li>
              <li>Overripe fruits</li>
              <li>Avocados</li>
              <li>Protein powders or supplements</li>
              <li>Excess salt and refined sugar</li>
            </ul>

            <p class="mb-6">Eat simply:</p>

            <ul class="space-y-3 pl-6 border-l-2 border-gray-300 mb-8 text-sm">
              <li>Fresh vegetables</li>
              <li>Light grains (rice, quinoa, oats)</li>
              <li>Fruits in moderation</li>
              <li>Soups, broths</li>
              <li>Well-cooked, easy-to-digest foods</li>
              <li>Plenty of water</li>
            </ul>

            <p class="text-sm">
              If your body feels calm and light, you&rsquo;re doing it right.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-4xl mx-auto">
        <div class="mb-12">
          <div class="w-36 h-36 mx-auto mb-8 flex items-center justify-center">
            <svg class="cwp-icon" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
              <path d="m51.25 441c-1.776 0-3.419-.942-4.316-2.476-.897-1.533-.913-3.428-.042-4.976l202.5-360c.881-1.567 2.537-2.54 4.334-2.549h.023c1.789 0 3.442.956 4.335 2.508l207 360c.89 1.547.887 3.451-.007 4.996s-2.542 2.497-4.327 2.497zm371.839-10h29.019l-175.37-304.991-17.076 31.139zm-363.289 0h351.644l-18.201-30.5h-316.287zm291.31-40.5h36.165l-106.452-178.379-16.877 30.2zm-219.415 0h207.813l-17.941-30.5h-173.146zm-49.114 0h37.709l150.611-274.643-17.103-29.743zm121.191-40.5h111.913l-57.392-97.565zm-49.867 0h38.412l82.59-147.792-20.822-34.89z" fill="rgb(0,0,0)"/>
            </svg>
          </div>
          <h2 class="text-4xl text-center mb-12 tracking-tight">
            Medications &amp; Safety
          </h2>
        </div>

        <div class="space-y-8 text-lg leading-relaxed">
          <div class="border-2 border-gray-900 bg-gray-50 p-10">
            <p class="text-xl text-center">
              Ayahuasca contains MAOIs, which can interact dangerously with certain medications and supplements.
            </p>
          </div>

          <p class="pt-8">
            You must disclose:
          </p>

          <ul class="pl-8 border-l-2 border-gray-900 space-y-3">
            <li>All prescription medications</li>
            <li>Supplements</li>
            <li>Herbal remedies</li>
            <li>Mental health history</li>
          </ul>

          <div class="py-12 text-center space-y-6">
            <p>
              Do not stop medications abruptly.
            </p>
            <p>
              Always consult with your doctor and the retreat team.
            </p>
          </div>

          <div class="bg-gray-50 border-2 border-gray-300 p-10 text-center">
            <p class="text-xl mb-4">
              This is not negotiable &mdash; it is about safety, not spirituality.
            </p>
            <div class="w-24 h-px bg-gray-300 mx-auto my-6"></div>
            <p class="text-2xl">
              When in doubt: ask.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="py-24 px-8">
      <div class="max-w-4xl mx-auto">
        <h2 class="text-3xl mb-16 tracking-tight">
          Sleep &amp; Stimulation
        </h2>

        <div class="space-y-8 text-lg leading-relaxed">
          <p>
            In the week leading up to ceremony:
          </p>

          <div class="grid grid-cols-2 gap-6">
            <div class="border-2 border-gray-300 p-8 bg-white">
              <p>Prioritize rest</p>
            </div>
            <div class="border-2 border-gray-300 p-8 bg-white">
              <p>Reduce late nights</p>
            </div>
            <div class="border-2 border-gray-300 p-8 bg-white">
              <p>Limit screens and intense media</p>
            </div>
            <div class="border-2 border-gray-300 p-8 bg-white">
              <p>Avoid violent or emotionally charged content</p>
            </div>
          </div>

          <div class="pt-12 text-center">
            <div class="inline-block border-t border-b border-gray-900 py-8 px-12">
              <p class="text-xl leading-relaxed">
                A regulated nervous system integrates more smoothly than an overstimulated one.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-24 px-8">
      <div class="max-w-5xl mx-auto">
        <div class="grid grid-cols-12 gap-12 items-start">
          <div class="col-span-5">
            <div class="sticky top-24">
              <span class="text-xs tracking-[0.2em] text-gray-600 mb-6 block">INTEGRATION</span>
              <h2 class="text-3xl tracking-tight mb-8">
                After Ceremony (Integration Dieta)
              </h2>
              <div class="w-16 h-px bg-gray-900"></div>
            </div>
          </div>

          <div class="col-span-7 space-y-8 text-lg leading-relaxed">
            <p>
              For 3&ndash;7 days after ceremony, we recommend continuing gentle care.
            </p>

            <div>
              <p class="mb-4">Favor:</p>
              <ul class="bg-gray-50 border-2 border-gray-300 p-8 space-y-3">
                <li>Simple, nourishing foods</li>
                <li>Warm meals</li>
                <li>Hydration</li>
                <li>Light movement</li>
              </ul>
            </div>

            <div>
              <p class="mb-4">Avoid or minimize:</p>
              <ul class="border-2 border-gray-900 p-8 space-y-3 bg-white">
                <li>Alcohol</li>
                <li>Recreational substances</li>
                <li>Excess caffeine</li>
                <li>Heavy or highly processed foods</li>
              </ul>
            </div>

            <div class="pt-8 pl-8 border-l-2 border-gray-300">
              <p class="text-gray-600">
                Not because something bad will happen &mdash; but because sensitivity is often heightened, and kindness goes a long way.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-4xl mx-auto">
        <h2 class="text-4xl text-center mb-16 tracking-tight">
          A Compassionate Note
        </h2>

        <div class="space-y-12 text-lg leading-relaxed">
          <p class="text-center">
            If you &ldquo;mess up&rdquo; the dieta:
          </p>

          <div class="flex justify-start">
            <div class="max-w-md">
              <div class="bg-white border-2 border-gray-300 p-8">
                <p>Nothing bad happens</p>
              </div>
            </div>
          </div>

          <div class="flex justify-center">
            <div class="max-w-md">
              <div class="bg-white border-2 border-gray-300 p-8">
                <p>You have not failed</p>
              </div>
            </div>
          </div>

          <div class="flex justify-end">
            <div class="max-w-md">
              <div class="bg-white border-2 border-gray-300 p-8">
                <p>Awareness has not been offended</p>
              </div>
            </div>
          </div>

          <div class="pt-12 text-center space-y-8">
            <p class="text-xl">
              Just return to simplicity.
            </p>

            <div class="inline-block border-t-2 border-b-2 border-gray-900 py-8 px-12">
              <p class="text-2xl">
                The dieta is not a rulebook.
              </p>
              <div class="w-16 h-px bg-gray-900 mx-auto my-6"></div>
              <p class="text-2xl">
                It&rsquo;s a listening practice.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-3xl mx-auto text-center">
        <div class="space-y-8 text-lg leading-relaxed">
          <p>
            Notice how your body responds when you eat simply, rest more, and stimulate less.
          </p>

          <div class="py-16">
            <div class="border-2 border-gray-900 p-12 bg-white">
              <p class="text-2xl leading-relaxed">
                That noticing &mdash; not the menu &mdash; is the real preparation.
              </p>
            </div>
          </div>

          <div class="pt-12">
            <p class="text-sm text-gray-600 mb-2">
              With clarity, care, and love,
            </p>
            <p class="text-lg">
              Ash
            </p>
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
