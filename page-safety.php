<?php
/**
 * Template Name: Safety
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

    <section class="py-24 px-8">
      <div class="max-w-4xl mx-auto">
        <div class="mb-16">
          <div class="w-24 h-24 mx-auto mb-8 flex items-center justify-center">
            <svg class="cwp-icon" enable-background="new 0 0 32 32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g id="Layer_2" display="none"><path d="m-12-86.339h410.667v203.333h-410.667z" display="inline" fill="rgb(0,0,0)"/></g><g id="Outline" display="none"><g display="inline"><g><g><g><g><path d="m16 15.827 6.641 7.374h-13.283zm0-1.494-8.889 9.868h17.776z"/></g></g><g><g><path d="m16 6.179 6.641 7.374h-13.283zm0-1.495-8.889 9.868h17.776z"/></g></g></g><g fill="none" stroke="rgb(0,0,0)" stroke-miterlimit="10"><path d="m16 23.884v-8.863"/><path d="m16.006 14.187v-8.912"/></g></g><g><path d="m16 1c8.271 0 15 6.729 15 15s-6.729 15-15 15-15-6.729-15-15 6.729-15 15-15m0-1c-8.837 0-16 7.163-16 16s7.163 16 16 16 16-7.163 16-16-7.163-16-16-16z"/></g></g></g><g id="Glyph" display="none"><g display="inline"><path d="m15.5 23.202v-6.819l-6.142 6.819z"/><path d="m15.506 13.553v-6.826l-6.148 6.826z"/><path d="m16.5 16.382v6.82h6.142z"/><path d="m16.506 6.74v6.813h6.136z"/><path d="m16 0c-8.837 0-16 7.163-16 16s7.163 16 16 16 16-7.163 16-16-7.163-16-16-16zm8.888 24.202h-17.776l8.691-9.649h-8.691l8.888-9.869 8.888 9.868h-8.69z"/></g></g><g id="Outline_BOLD" display="none"><g display="inline"><g><g><g><g><path d="m16 17.322 4.395 4.88h-8.79zm0-2.989-8.889 9.868h17.776z"/></g></g><g><g><path d="m16 7.673 4.395 4.88h-8.79zm0-2.989-8.889 9.868h17.776z"/></g></g></g><g fill="none" stroke="rgb(0,0,0)" stroke-miterlimit="10" stroke-width="2"><path d="m16 23.884v-7.079"/><path d="m16.006 14.187v-7.137"/></g></g><g><path d="m16 2c7.72 0 14 6.28 14 14s-6.28 14-14 14-14-6.28-14-14 6.28-14 14-14m0-2c-8.837 0-16 7.163-16 16s7.163 16 16 16 16-7.163 16-16-7.163-16-16-16z"/></g></g></g><g id="Outline_Light"><g><path d="m24.888 24.202-8.69-9.649h8.69l-8.888-9.869-8.888 9.868h8.691l-8.691 9.649h17.776zm-8.632-10.149v-8.337l7.509 8.337zm-.5-8.351v8.35h-7.521zm-.006 18h-7.515l7.515-8.343zm.5 0v-8.344l7.515 8.344z"/><path d="m16 32c8.837 0 16-7.163 16-16s-7.163-16-16-16-16 7.163-16 16 7.163 16 16 16zm0-31.5c8.547 0 15.5 6.953 15.5 15.5s-6.953 15.5-15.5 15.5-15.5-6.953-15.5-15.5 6.953-15.5 15.5-15.5z"/></g></g>
            </svg>
          </div>
          <h2 class="text-4xl text-center mb-12 tracking-tight">
            You Are Not Doing This Alone
          </h2>
        </div>

        <div class="space-y-8 text-lg leading-relaxed">
          <p>
            Even though Awareness is always whole, the human experience benefits from care, clarity, and connection.
          </p>

          <div class="py-12">
            <div class="border-l-4 border-gray-900 pl-8">
              <p class="text-2xl leading-relaxed">
                This retreat is held within a container of support &mdash; not to manage your awakening, but to tend to the body, the nervous system, and the practical realities of integration.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-24 px-8">
      <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-12 gap-12 items-start">
          <div class="col-span-5">
            <div class="flex items-center justify-center sticky top-24">
              <img class="page-image" src="<?php echo esc_url( get_template_directory_uri() . '/images/bg/EwKXn5CapA4.webp' ); ?>">
            </div>
          </div>

          <div class="col-span-7">
            <h2 class="text-4xl tracking-tight mb-12">
              Asking for Support Is Wisdom
            </h2>

            <div class="space-y-8 text-lg leading-relaxed">
              <p>
                If questions arise &mdash; before, during, or after ceremony &mdash; reach out.
              </p>

              <p>
                If something feels confusing, tender, or intense, you don&rsquo;t need to hold it by yourself.
              </p>

              <div class="py-8">
                <div class="h-px bg-gray-300 w-24"></div>
              </div>

              <div class="border-2 border-gray-900 p-8 bg-white">
                <p class="text-xl leading-relaxed">
                  Support is not a sign that something went wrong.
                </p>
                <p class="text-xl leading-relaxed mt-4">
                  It&rsquo;s a sign that something is being honored.
                </p>
              </div>

              <p class="pt-8">
                Sometimes all that&rsquo;s needed is to be heard without interpretation.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-5xl mx-auto">
        <div class="text-center mb-20">
          <h2 class="text-4xl tracking-tight mb-6">
            Safety Is Sacred (and Very Practical)
          </h2>
          <div class="flex justify-center">
            <div class="w-32 h-px bg-gray-300"></div>
          </div>
        </div>

        <div class="max-w-3xl mx-auto space-y-8 text-lg leading-relaxed">
          <p class="text-center">
            While the essence of who you are cannot be harmed, your body and mind deserve thoughtful care.
          </p>

          <div class="py-12">
            <p class="text-sm text-gray-600 mb-6 text-center">This is why we emphasize:</p>
            <div class="grid grid-cols-2 gap-6">
              <div class="border-2 border-gray-300 p-6 text-center bg-white">
                <div class="w-12 h-12 rounded-full border border-gray-300 mx-auto mb-4 flex items-center justify-center">
                  <span class="text-xs text-gray-400">&check;</span>
                </div>
                <p>Honest medical screening</p>
              </div>
              <div class="border-2 border-gray-300 p-6 text-center bg-white">
                <div class="w-12 h-12 rounded-full border border-gray-300 mx-auto mb-4 flex items-center justify-center">
                  <span class="text-xs text-gray-400">&check;</span>
                </div>
                <p>Transparent communication</p>
              </div>
              <div class="border-2 border-gray-300 p-6 text-center bg-white">
                <div class="w-12 h-12 rounded-full border border-gray-300 mx-auto mb-4 flex items-center justify-center">
                  <span class="text-xs text-gray-400">&check;</span>
                </div>
                <p>Adherence to substance guidelines</p>
              </div>
              <div class="border-2 border-gray-300 p-6 text-center bg-white">
                <div class="w-12 h-12 rounded-full border border-gray-300 mx-auto mb-4 flex items-center justify-center">
                  <span class="text-xs text-gray-400">&check;</span>
                </div>
                <p>Clear boundaries in ceremony</p>
              </div>
            </div>
          </div>

          <p class="text-center">
            These are not rules imposed from above &mdash; they are agreements rooted in respect.
          </p>

          <div class="pt-12">
            <div class="inline-block border-t-2 border-b-2 border-gray-900 py-6 px-12 w-full text-center">
              <p class="text-2xl">
                Safety allows surrender to be genuine.
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
              <div class="w-24 h-24 mb-6 flex items-center justify-center">
                <svg class="cwp-icon" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
                  <path d="m255.995 463.497c-.863-.001-1.727-.222-2.492-.661-.03-.018-180.075-108.045-180.075-108.045-1.506-.903-2.428-2.531-2.428-4.287 0 0 0-189 0-189.044.016-1.753.988-3.417 2.507-4.291l179.921-107.953c1.583-.95 3.563-.95 5.145 0 0 0 179.843 107.906 179.921 107.953 1.54.924 2.491 2.53 2.507 4.335v189c0 1.756-.922 3.384-2.428 4.287l-179.912 107.947c-.807.507-1.736.76-2.666.759zm5.005-96.64v82.815l170-102v-177.338l-71 42.6v92.569c0 1.769-.934 3.405-2.456 4.305zm-180-19.184 170 102v-82.815l-96.543-57.049c-1.522-.899-2.457-2.536-2.457-4.305v-92.569l-71-42.6zm180-75.338v82.906l89-52.591v-83.716zm-99 30.315 89 52.591v-82.906l-89-53.4zm5.529-92.06 88.471 53.083 88.472-53.083-88.472-52.279zm88.471-63.087c.88 0 1.759.232 2.544.695l95.681 56.539 72.058-43.234-170.283-102.169-170.281 102.169 72.057 43.234 95.681-56.539c.784-.463 1.664-.695 2.543-.695z" fill="rgb(0,0,0)"/>
                </svg>
              </div>
              <h2 class="text-3xl tracking-tight mb-6">
                Questions About Logistics &amp; Practicalities
              </h2>
              <div class="w-12 h-px bg-gray-900"></div>
            </div>
          </div>

          <div class="col-span-8">
            <div class="space-y-8 text-lg leading-relaxed">
              <p class="mb-8">Questions about:</p>

              <div class="space-y-4">
                <div class="bg-white border-2 border-gray-300 p-6 flex items-center gap-4">
                  <p>Travel</p>
                </div>
                <div class="bg-white border-2 border-gray-300 p-6 flex items-center gap-4">
                  <p>Transportation</p>
                </div>
                <div class="bg-white border-2 border-gray-300 p-6 flex items-center gap-4">
                  <p>Food</p>
                </div>
                <div class="bg-white border-2 border-gray-300 p-6 flex items-center gap-4">
                  <p>Scheduling</p>
                </div>
                <div class="bg-white border-2 border-gray-300 p-6 flex items-center gap-4">
                  <p>Accommodations</p>
                </div>
              </div>

              <p class="pt-8">
                &hellip;are welcome and encouraged.
              </p>

              <div class="pt-8 pl-8 border-l-4 border-gray-900">
                <p class="text-2xl leading-relaxed">
                  The smoother the practical details, the more spacious the inner experience can be.
                </p>
              </div>

              <p class="pt-8 text-xl">
                Nothing is too small to ask.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-4xl mx-auto">
        <div class="text-center mb-20">
          <div class="w-32 h-32 mx-auto flex items-center justify-center mb-8">
            <svg class="cwp-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="512" height="512">
              <path d="M57.39,18A28.81,28.81,0,0,0,61,4a1,1,0,0,0-1-1A28.81,28.81,0,0,0,46,6.61a29,29,0,0,0-28,0A28.81,28.81,0,0,0,4,3,1,1,0,0,0,3,4,28.81,28.81,0,0,0,6.61,18a29,29,0,0,0,0,28A28.81,28.81,0,0,0,3,60a1,1,0,0,0,1,1,28.81,28.81,0,0,0,14-3.61,29,29,0,0,0,28,0A28.81,28.81,0,0,0,60,61a1,1,0,0,0,1-1,28.81,28.81,0,0,0-3.61-14,29,29,0,0,0,0-28ZM35.82,44A26.86,26.86,0,0,1,33,33a26.86,26.86,0,0,1,11,2.8A29.3,29.3,0,0,0,35.82,44ZM46,36.93A27.13,27.13,0,0,1,55.07,46,27.13,27.13,0,0,1,46,55.07,27.13,27.13,0,0,1,36.93,46,27.13,27.13,0,0,1,46,36.93ZM20,35.82A26.86,26.86,0,0,1,31,33a26.86,26.86,0,0,1-2.8,11A29.3,29.3,0,0,0,20,35.82ZM27.07,46A27.13,27.13,0,0,1,18,55.07,27.13,27.13,0,0,1,8.93,46,27.13,27.13,0,0,1,18,36.93,27.13,27.13,0,0,1,27.07,46Zm1.11-26A26.86,26.86,0,0,1,31,31a26.86,26.86,0,0,1-11-2.8A29.3,29.3,0,0,0,28.18,20ZM18,27.07A27.13,27.13,0,0,1,8.93,18,27.13,27.13,0,0,1,18,8.93,27.13,27.13,0,0,1,27.07,18,27.13,27.13,0,0,1,18,27.07Zm26,1.11A26.86,26.86,0,0,1,33,31a26.86,26.86,0,0,1,2.8-11A29.3,29.3,0,0,0,44,28.18ZM36.93,18A27.13,27.13,0,0,1,46,8.93,27.13,27.13,0,0,1,55.07,18,27.13,27.13,0,0,1,46,27.07,27.13,27.13,0,0,1,36.93,18ZM32,24.46A29,29,0,0,0,29.39,18,29,29,0,0,0,32,11.54,29,29,0,0,0,34.61,18,29,29,0,0,0,32,24.46ZM24.46,32A29,29,0,0,0,18,34.61,29,29,0,0,0,11.54,32,29,29,0,0,0,18,29.39,29,29,0,0,0,24.46,32ZM32,39.54A29,29,0,0,0,34.61,46,29,29,0,0,0,32,52.46,29,29,0,0,0,29.39,46,29,29,0,0,0,32,39.54ZM39.54,32A29,29,0,0,0,46,29.39,29,29,0,0,0,52.46,32,29,29,0,0,0,46,34.61,29,29,0,0,0,39.54,32ZM59,31a26.86,26.86,0,0,1-11-2.8A29.3,29.3,0,0,0,56.18,20,26.86,26.86,0,0,1,59,31ZM59,5a26.86,26.86,0,0,1-2.8,11A29.3,29.3,0,0,0,48,7.82,26.86,26.86,0,0,1,59,5ZM44,7.82A29.3,29.3,0,0,0,35.82,16,26.86,26.86,0,0,1,33,5,26.86,26.86,0,0,1,44,7.82ZM31,5a26.86,26.86,0,0,1-2.8,11A29.3,29.3,0,0,0,20,7.82,26.86,26.86,0,0,1,31,5ZM5,5a26.86,26.86,0,0,1,11,2.8A29.3,29.3,0,0,0,7.82,16,26.86,26.86,0,0,1,5,5Zm2.8,15A29.3,29.3,0,0,0,16,28.18,26.86,26.86,0,0,1,5,31,26.86,26.86,0,0,1,7.82,20ZM5,33a26.86,26.86,0,0,1,11,2.8A29.3,29.3,0,0,0,7.82,44,26.86,26.86,0,0,1,5,33ZM5,59a26.86,26.86,0,0,1,2.8-11A29.3,29.3,0,0,0,16,56.18,26.86,26.86,0,0,1,5,59Zm15-2.8A29.3,29.3,0,0,0,28.18,48,26.86,26.86,0,0,1,31,59,26.86,26.86,0,0,1,20,56.18ZM33,59a26.86,26.86,0,0,1,2.8-11A29.3,29.3,0,0,0,44,56.18,26.86,26.86,0,0,1,33,59Zm26,0a26.86,26.86,0,0,1-11-2.8A29.3,29.3,0,0,0,56.18,48,26.86,26.86,0,0,1,59,59Zm-2.8-15A29.3,29.3,0,0,0,48,35.82,26.86,26.86,0,0,1,59,33,26.86,26.86,0,0,1,56.18,44Z"/>
            </svg>
          </div>
          <h2 class="text-4xl tracking-tight mb-6">
            Availability After Ceremony
          </h2>
          <div class="flex justify-center">
            <div class="w-32 h-px bg-gray-300"></div>
          </div>
        </div>

        <div class="space-y-8 text-lg leading-relaxed">
          <p class="text-center text-xl">
            Integration does not end when you leave Sedona.
          </p>

          <div class="py-12">
            <p class="text-sm text-gray-600 mb-8 text-center">Reach out if:</p>
            <div class="max-w-2xl mx-auto space-y-6">
              <div class="bg-gray-50 border-2 border-gray-300 p-8">
                <p>Emotions feel unexpectedly strong</p>
              </div>
              <div class="bg-gray-50 border-2 border-gray-300 p-8">
                <p>Insights feel destabilizing</p>
              </div>
              <div class="bg-gray-50 border-2 border-gray-300 p-8">
                <p>Old material resurfaces</p>
              </div>
              <div class="bg-gray-50 border-2 border-gray-300 p-8">
                <p>You simply want to share or check in</p>
              </div>
            </div>
          </div>

          <p class="text-center">
            No experience needs to be rushed into meaning.
          </p>

          <div class="pt-12 text-center">
            <div class="inline-block px-12 py-8 bg-gray-50 border-2 border-gray-300">
              <p class="text-2xl">
                Sometimes the most helpful thing is gentle orientation and reassurance.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-3xl mx-auto text-center">
        <h2 class="text-4xl mb-16 tracking-tight">
          Trusting Your Own Inner Timing
        </h2>

        <div class="space-y-8 text-lg leading-relaxed">
          <div class="py-8">
            <div class="inline-block border-t-2 border-b-2 border-gray-900 py-6 px-12 bg-white">
              <p class="text-xl">
                There is no timeline for &ldquo;being done.&rdquo;
              </p>
            </div>
          </div>

          <div class="space-y-12 py-12">
            <div class="flex justify-start">
              <div class="max-w-md text-left">
                <p>Some things integrate quickly.</p>
              </div>
            </div>

            <div class="flex justify-center">
              <div class="max-w-md">
                <p>Some things unfold over months or years.</p>
              </div>
            </div>

            <div class="flex justify-end">
              <div class="max-w-md text-right">
                <p>Some things quietly dissolve without announcement.</p>
              </div>
            </div>
          </div>

          <div class="pt-12">
            <p class="text-2xl">
              Awareness is never late.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="py-32 px-8">
      <div class="max-w-4xl mx-auto">
        <div class="mb-16">
          <div class="w-32 h-32 mx-auto flex items-center justify-center">
            <svg class="cwp-icon" height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg">
              <path d="m56.562 32c3.838-1.755 6.438-5.634 6.438-10 0-2.437-.819-4.795-2.299-6.703.855-4.309 1.299-8.447 1.299-12.297 0-.552-.447-1-1-1-3.849 0-7.987.443-12.297 1.298-1.909-1.48-4.266-2.298-6.703-2.298-4.367 0-8.245 2.6-10 6.438-1.755-3.838-5.633-6.438-10-6.438-2.437 0-4.795.818-6.703 2.298-4.31-.855-8.448-1.298-12.297-1.298-.553 0-1 .448-1 1 0 3.85.444 7.988 1.299 12.298-1.481 1.908-2.299 4.265-2.299 6.702 0 4.366 2.6 8.245 6.438 10-3.838 1.755-6.438 5.634-6.438 10 0 2.437.819 4.795 2.299 6.703-.855 4.309-1.299 8.447-1.299 12.297 0 .552.447 1 1 1 3.849 0 7.987-.443 12.297-1.298 1.909 1.48 4.266 2.298 6.703 2.298 4.367 0 8.245-2.6 10-6.438 1.755 3.838 5.633 6.438 10 6.438 2.437 0 4.795-.818 6.703-2.298 4.31.855 8.448 1.298 12.297 1.298.553 0 1-.448 1-1 0-3.85-.444-7.988-1.299-12.298 1.481-1.908 2.299-4.265 2.299-6.702 0-4.366-2.6-8.245-6.438-10zm4.438 10c0 2.127-.754 4.184-2.122 5.792-.023.027-.045.057-.065.087-1.361 1.571-3.199 2.599-5.201 2.964 1.084-2.893-.191-7.265-3.443-11.555 2.666-.985 4.303-2.976 4.718-5.805 3.599 1.218 6.113 4.631 6.113 8.517zm-24.169-5.169c2.672 1.649 5.935 3.169 8.919 3.169.817 0 1.579-.062 2.297-.172 3.588 4.422 4.965 9.169 3.137 11.253l-.065.076c-.038.025-.075.053-.109.083-2.015 1.775-6.758.394-11.181-3.193.109-.717.171-1.48.171-2.297 0-2.983-1.52-6.246-3.169-8.919zm-4.831 16.169c-3.981 0-6-2.439-6-7.25 0-4.48 4.25-10.091 6-12.212 1.75 2.121 6 7.732 6 12.212 0 4.811-2.019 7.25-6 7.25zm-8-7.25c0 .816.062 1.579.172 2.297-4.422 3.586-9.169 4.966-11.253 3.136l-.077-.068c-.024-.037-.052-.073-.082-.106-1.773-2.014-.394-6.76 3.193-11.181.718.11 1.48.172 2.297.172 2.984 0 6.247-1.52 8.919-3.169-1.649 2.673-3.169 5.936-3.169 8.919zm-11.184-32.831.065-.076c.038-.025.075-.053.109-.083 2.016-1.773 6.759-.394 11.181 3.193-.109.717-.171 1.48-.171 2.297 0 2.983 1.52 6.247 3.169 8.92-2.672-1.65-5.935-3.17-8.919-3.17-.817 0-1.579.062-2.297.172-3.587-4.421-4.965-9.169-3.137-11.253zm19.184-1.919c3.981 0 6 2.439 6 7.25 0 4.48-4.25 10.091-6 12.212-1.75-2.121-6-7.732-6-12.212 0-4.811 2.019-7.25 6-7.25zm8 7.25c0-.816-.062-1.579-.172-2.297 4.422-3.586 9.169-4.966 11.253-3.136l.077.068c.024.037.052.073.082.106 1.773 2.014.394 6.76-3.193 11.181-.718-.11-1.48-.172-2.297-.172-2.984 0-6.247 1.52-8.919 3.169 1.649-2.673 3.169-5.936 3.169-8.919zm5.75 19.75c-4.48 0-10.092-4.25-12.213-6 2.119-1.75 7.726-6 12.213-6 4.811 0 7.25 2.019 7.25 6s-2.439 6-7.25 6zm-27.5-12c4.48 0 10.092 4.25 12.213 6-2.119 1.75-7.726 6-12.213 6-4.811 0-7.25-2.019-7.25-6s2.439-6 7.25-6zm36.636 4.517c-.415-2.829-2.052-4.819-4.718-5.805 3.246-4.282 4.522-8.646 3.448-11.539 1.989.376 3.836 1.381 5.194 2.946.021.031.043.061.067.089 1.369 1.608 2.123 3.665 2.123 5.792 0 3.886-2.514 7.299-6.114 8.517zm4.107-16.984c-1.717-1.419-3.817-2.288-6.045-2.481-.193-2.229-1.062-4.328-2.481-6.046 3.312-.591 6.509-.936 9.523-.996-.061 3.014-.406 6.211-.997 9.523zm-16.993-10.533c2.127 0 4.184.753 5.793 2.122.026.023.055.044.084.064 1.572 1.362 2.601 3.2 2.966 5.203-2.894-1.084-7.265.191-11.555 3.443-.985-2.666-2.976-4.304-5.805-4.719 1.218-3.599 4.632-6.113 8.517-6.113zm-25.793 2.122c1.609-1.369 3.666-2.122 5.793-2.122 3.885 0 7.299 2.514 8.517 6.113-2.829.415-4.819 2.053-5.805 4.719-4.289-3.252-8.661-4.527-11.555-3.443.365-2.002 1.393-3.84 2.964-5.201.029-.021.059-.043.086-.066zm-2.674-.116c-1.419 1.718-2.288 3.817-2.481 6.046-2.228.193-4.328 1.062-6.045 2.481-.591-3.312-.936-6.509-.997-9.523 3.014.061 6.21.405 9.523.996zm-10.533 16.994c0-2.127.754-4.184 2.122-5.792.023-.027.045-.057.065-.087 1.362-1.571 3.199-2.599 5.201-2.964-1.084 2.893.191 7.265 3.443 11.555-2.666.985-4.303 2.976-4.718 5.805-3.599-1.218-6.113-4.631-6.113-8.517zm6.114 11.483c.415 2.829 2.052 4.819 4.718 5.805-3.252 4.29-4.527 8.662-3.443 11.555-2.001-.365-3.839-1.393-5.199-2.962-.021-.031-.043-.061-.067-.089-1.369-1.608-2.123-3.665-2.123-5.792 0-3.886 2.514-7.299 6.114-8.517zm-4.107 16.984c1.717 1.419 3.817 2.288 6.045 2.481.193 2.229 1.062 4.328 2.481 6.046-3.313.591-6.509.936-9.523.996.061-3.014.406-6.211.997-9.523zm16.993 10.533c-2.127 0-4.184-.753-5.793-2.122-.026-.023-.055-.044-.084-.064-1.573-1.363-2.602-3.204-2.967-5.209.677.254 1.427.393 2.247.393 2.683 0 6.021-1.342 9.308-3.833.985 2.668 2.976 4.306 5.806 4.721-1.218 3.6-4.632 6.114-8.517 6.114zm25.793-2.122c-1.609 1.369-3.666 2.122-5.793 2.122-3.885 0-7.299-2.514-8.517-6.113 2.83-.415 4.821-2.054 5.806-4.721 3.287 2.492 6.624 3.833 9.308 3.833.82 0 1.57-.139 2.247-.393-.364 2.004-1.393 3.844-2.965 5.207-.029.02-.059.042-.086.065zm2.674.116c1.419-1.718 2.288-3.817 2.481-6.046 2.228-.193 4.328-1.062 6.045-2.481.591 3.311.936 6.508.997 9.523-3.014-.061-6.21-.405-9.523-.996z"/>
            </svg>
          </div>
        </div>

        <div class="space-y-8 text-lg leading-relaxed max-w-3xl mx-auto">
          <p>
            Thank you for saying yes &mdash; not to an experience, but to presence.
          </p>

          <p>
            Thank you for trusting the intelligence of your own heart and the simplicity of being here.
          </p>

          <div class="py-12">
            <div class="border-t-2 border-b-2 border-gray-900 py-12 px-8 text-center">
              <p class="text-2xl leading-relaxed mb-6">
                Nothing about you needs improvement.
              </p>
              <p class="text-2xl leading-relaxed">
                Nothing essential is at risk.
              </p>
            </div>
          </div>

          <p class="text-xl text-center">
            May this retreat feel less like an event and more like a deep exhale.
          </p>

          <div class="pt-12 text-center">
            <div class="inline-block text-left border-l-2 border-gray-300 pl-8">
              <p class="mb-4">
                With love, celebration, and steady companionship,
              </p>
              <div class="pt-4">
                <p class="text-xl">Ash</p>
              </div>
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
