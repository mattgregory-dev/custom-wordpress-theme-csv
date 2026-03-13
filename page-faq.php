<?php
/**
 * Template Name: FAQ
 */
get_header(
  null,
  array(
    //'header_variant' => 'absolute',
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

    <section id="faq-hero" class="page-title section">
      <div class="section-container">
        <p class="label">About Lumina</p>
        <h1>Frequently Asked Questions</h1>
        <p class="description">
          This is a prescreen application for retreat consideration. This application takes about 10-15 minutes to
          complete.
        </p>
      </div>
    </section>

    <section id="faq-topics" class="w-full py-8">
      <div class="max-w-[1240px] mx-auto px-6">
        <div class="flex flex-wrap items-center gap-3 text-xs uppercase tracking-[0.2em] text-[var(--muted)]">
          <a class="mini-pill border border-slate-300" href="#topic-retreat">The Retreat</a>
          <a class="mini-pill border border-slate-300" href="#topic-preparation">Preparation</a>
          <a class="mini-pill border border-slate-300" href="#topic-ceremony">The Ceremony</a>
          <a class="mini-pill border border-slate-300" href="#topic-aftercare">Aftercare</a>
          <a class="mini-pill border border-slate-300" href="#topic-safety">Safety</a>
          <a class="mini-pill border border-slate-300" href="#topic-logistics">Logistics</a>
          <a class="mini-pill border border-slate-300" href="#topic-payment">Payment</a>
        </div>
      </div>
    </section>

    <section id="topic-retreat" class="w-full py-16">
      <div class="max-w-[1240px] mx-auto px-6 space-y-8">
        <h2 class="text-4xl leading-tight">The Retreat</h2>
        <div class="grid grid-cols-2 gap-6">
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">What is the retreat format?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">How many participants are in a group?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">Can I speak with someone before applying?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">What is the retreat setting like?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
        </div>
      </div>
    </section>

    <section id="topic-preparation" class="w-full py-16">
      <div class="max-w-[1240px] mx-auto px-6 space-y-8">
        <h2 class="text-4xl leading-tight">Preparation</h2>
        <div class="grid grid-cols-2 gap-6">
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">What does preparation involve?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">How long is the preparation period?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">What should I bring?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">Is there a screening process?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
        </div>
      </div>
    </section>

    <section id="topic-ceremony" class="w-full py-16">
      <div class="max-w-[1240px] mx-auto px-6 space-y-8">
        <h2 class="text-4xl leading-tight">The Ceremony</h2>
        <div class="grid grid-cols-2 gap-6">
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">What does the ceremony day look like?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">How many ceremonies are included?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">What support is available during ceremony?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">Can I opt out if needed?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
        </div>
      </div>
    </section>

    <section id="topic-aftercare" class="w-full py-16">
      <div class="max-w-[1240px] mx-auto px-6 space-y-8">
        <h2 class="text-4xl leading-tight">Aftercare</h2>
        <div class="grid grid-cols-2 gap-6">
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">What support is available afterward?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">How long does aftercare last?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">Are check-ins included?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">What if I need more support?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
        </div>
      </div>
    </section>

    <section id="topic-safety" class="w-full py-16">
      <div class="max-w-[1240px] mx-auto px-6 space-y-8">
        <h2 class="text-4xl leading-tight">Safety</h2>
        <div class="grid grid-cols-2 gap-6">
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">Who is this not a fit for?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">How do you screen applicants?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">What medical support is available?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">What are the safety protocols?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
        </div>
      </div>
    </section>

    <section id="topic-logistics" class="w-full py-16">
      <div class="max-w-[1240px] mx-auto px-6 space-y-8">
        <h2 class="text-4xl leading-tight">Logistics</h2>
        <div class="grid grid-cols-2 gap-6">
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">What are the arrival and departure times?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">Is transportation provided?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">Do I need a passport?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">What accommodations are available?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
        </div>
      </div>
    </section>

    <section id="topic-payment" class="w-full py-16">
      <div class="max-w-[1240px] mx-auto px-6 space-y-8">
        <h2 class="text-4xl leading-tight">Payment</h2>
        <div class="grid grid-cols-2 gap-6">
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">How do payment and deposits work?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">What is the cancellation policy?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">Are payment plans available?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
          <article class="rounded-3xl border border-slate-300 bg-white/90 p-6 space-y-3">
            <div class="flex items-start justify-between gap-6">
              <h3 class="text-xl">When is the final balance due?</h3>
              <span class="text-xl text-[var(--muted)]">+</span>
            </div>
            <p class="text-lg text-[var(--muted)]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </article>
        </div>
      </div>
    </section>

    <section id="faq-close" class="w-full py-20">
      <div class="max-w-[1240px] mx-auto px-6">
        <div class="mx-auto max-w-3xl text-center space-y-4">
          <h3 class="text-3xl leading-tight">Still have questions?</h3>
          <p class="text-lg leading-relaxed text-[var(--muted)]">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sit amet neque ut nulla posuere vehicula.
          </p>
          <a class="underline text-sm uppercase tracking-[0.2em] text-[var(--muted)]" href="#">
            Contact
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
