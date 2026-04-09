<?php
/**
 * Template Name: Field Trip
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
    ?>

    <main class="upcoming-events">
      <section class="upcoming-events-hero min-h-screen flex items-center justify-center">
        <div class="upcoming-events-hero-inner max-w-6xl mx-auto px-8 py-24 md:py-32 text-center">
          <h1 class="upcoming-events-title upcoming-events-fade-up" style="--delay: 0.1s;">
            Walk the Desert. Learn the Plants.<br>
            Make Your Own Medicine.
          </h1>

          <p class="upcoming-events-subtitle upcoming-events-fade-up" style="--delay: 0.25s;">
            A four-day herbal field trip in Sedona, Arizona &mdash; where you&rsquo;ll identify wild plants, harvest them by hand, and
            turn them into remedies you can keep making at home.
          </p>

          <div class="upcoming-events-fade-up" style="--delay: 0.4s;">
            <a href="#reserve" class="upcoming-events-btn">
              Reserve My Spot
            </a>
            <p class="upcoming-events-microcopy">
              June 2&ndash;5, 2026 &middot; Sedona, AZ &middot; $450 &middot; Only 13 spots
            </p>
          </div>

          <div class="upcoming-events-proof upcoming-events-fade-up" style="--delay: 0.55s;">
            <blockquote>
              &ldquo;One of the most meaningful learning experiences I&rsquo;ve had in 20 years of studying plants.&rdquo;
            </blockquote>
            <cite>&mdash; Rachel M., past participant</cite>
          </div>
        </div>
      </section>

      <section class="py-24 md:py-28 px-8">
        <div class="max-w-3xl mx-auto reveal">
          <p class="upcoming-events-label">The Gap</p>
          <h2 class="upcoming-events-section-title">
            You&rsquo;ve Read the Books. You&rsquo;ve Watched the Videos. But You Still Hesitate in the Field.
          </h2>

          <p class="upcoming-events-body">
            You know what chamomile looks like in a textbook. But could you find it growing wild and feel sure enough to pick it?
          </p>

          <p class="upcoming-events-body">
            Most herbal students hit the same wall. You study hard. You take notes. You memorize Latin names. But when you&rsquo;re
            standing outside, looking at an actual plant, doubt creeps in.
          </p>

          <div class="upcoming-events-callout">
            <em>Is this the right one? Am I harvesting it correctly? Am I taking too much?</em>
          </div>

          <p class="upcoming-events-body">
            Online courses can teach you concepts. They can&rsquo;t teach you how a leaf feels between your fingers. They can&rsquo;t show
            you where a plant chooses to grow &mdash; and what that tells you about its medicine.
          </p>

          <p class="upcoming-events-body">
            That gap between knowing and <em>doing</em> is where confidence lives. And it&rsquo;s hard to close it alone, from behind a screen.
          </p>
        </div>
      </section>

      <div class="upcoming-events-divider reveal">* * *</div>

      <section class="py-24 md:py-28 px-8 upcoming-events-solution">
        <div class="max-w-3xl mx-auto reveal">
          <p class="upcoming-events-label">The Experience</p>
          <h2 class="upcoming-events-section-title">
            Four Days in the Desert That Change How You See Plants Forever
          </h2>

          <p class="upcoming-events-body">
            The Sedona Arizona Herbal Field Trip is a four-day, camping-based immersion led by Feather Jones Herbalist.
          </p>

          <p class="upcoming-events-body">
            For three days, you&rsquo;ll walk through some of the richest plant country in the Southwest. Sedona&rsquo;s Verde Valley sits
            between the Mingus Mountains and the Mogollon Rim &mdash; and it holds seven of Arizona&rsquo;s nine plant zone communities in
            one compact area. That means more variety in a short walk than most people see in a lifetime of study.
          </p>

          <p class="upcoming-events-body">
            You won&rsquo;t just look at plants. You&rsquo;ll crouch beside them. Smell them. Learn to read the landscape they chose. Practice
            harvesting them with care and intention.
          </p>

          <p class="upcoming-events-body">
            On the fourth day, everything comes together. At a private residence in Sedona, you&rsquo;ll take what you&rsquo;ve gathered and
            make real medicine with your own hands &mdash; preparations you can continue making in your kitchen long after you get home.
          </p>

          <p class="upcoming-events-body">
            In the evenings, the group gathers. Stories are told. Songs are shared. And the kind of learning happens that only happens
            when people slow down together.
          </p>

          <p class="upcoming-events-body">
            This is not a lecture series with a nice view. It&rsquo;s a practice. And you&rsquo;ll leave knowing how to keep practicing.
          </p>
        </div>
      </section>

      <section class="upcoming-events-included py-24 md:py-28 px-8">
        <div class="max-w-6xl mx-auto reveal">
          <p class="upcoming-events-label">What&rsquo;s Inside</p>
          <h2 class="upcoming-events-section-title">
            What Your Four Days Look Like
          </h2>

          <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 mt-12">
            <div class="upcoming-events-card">
              <h3>3 Days of Guided Field Study</h3>
              <p>
                Walking multiple plant zones in Sedona&rsquo;s high desert and Oak Creek Canyon with expert instruction on identification,
                growth patterns, scent, and habitat.
              </p>
            </div>
            <div class="upcoming-events-card">
              <h3>1 Full Day of Hands-On Medicine Making</h3>
              <p>
                At a private Sedona residence, you&rsquo;ll transform harvested plant material into preparations you can replicate at home.
              </p>
            </div>
            <div class="upcoming-events-card">
              <h3>Ethical Wild Harvesting Training</h3>
              <p>
                Learn when, where, and how to harvest respectfully, with real-time practice in the field.
              </p>
            </div>
            <div class="upcoming-events-card">
              <h3>Expert-Led Instruction</h3>
              <p>
                Covering plant identification, materia medica, ecological observation, and the relationships between plants and place.
              </p>
            </div>
            <div class="upcoming-events-card">
              <h3>Evening Community Circles</h3>
              <p>
                Storytelling, songs, and the kind of conversation that only happens around a shared table after a long day outside.
              </p>
            </div>
            <div class="upcoming-events-card">
              <h3>A Small Group of 13 People</h3>
              <p>
                Enough for community. Small enough that you&rsquo;re never lost in a crowd.
              </p>
            </div>
          </div>
        </div>
      </section>

      <section class="py-24 md:py-28 px-8">
        <div class="max-w-4xl mx-auto reveal">
          <p class="upcoming-events-label">Voices from the Field</p>
          <h2 class="upcoming-events-section-title">
            What Past Participants Say
          </h2>

          <div class="grid gap-8 mt-12">
            <div class="upcoming-events-testimonial">
              <blockquote>
                &ldquo;I came thinking I&rsquo;d learn some plant names. I left knowing how to actually make medicine. That shift &mdash; from
                reading about plants to working with them &mdash; changed everything for me.&rdquo;
              </blockquote>
              <cite>&mdash; Past Participant</cite>
            </div>
            <div class="upcoming-events-testimonial">
              <blockquote>
                &ldquo;Feather doesn&rsquo;t just teach you what a plant is. She teaches you how to pay attention. I&rsquo;ve been back to the desert
                three times since, and I see it completely differently now.&rdquo;
              </blockquote>
              <cite>&mdash; Past Participant</cite>
            </div>
            <div class="upcoming-events-testimonial">
              <blockquote>
                &ldquo;I was nervous about camping and worried I didn&rsquo;t know enough. By day two, I forgot both of those concerns. The group
                was warm, the pace was gentle, and I learned more in the field than I did in a full year of online study.&rdquo;
              </blockquote>
              <cite>&mdash; Past Participant</cite>
            </div>
          </div>
        </div>
      </section>

      <section class="py-24 md:py-28 px-8 upcoming-events-faq">
        <div class="max-w-3xl mx-auto reveal">
          <p class="upcoming-events-label">Before You Go</p>
          <h2 class="upcoming-events-section-title">
            Questions Before You Go
          </h2>

          <div class="mt-10 space-y-4">
            <details class="upcoming-events-faq-item">
              <summary>Do I need herbal experience to attend?</summary>
              <div>
                <p>No. Curious beginners and seasoned students both find value here. The field is the teacher &mdash; and it meets you where you are.</p>
              </div>
            </details>
            <details class="upcoming-events-faq-item">
              <summary>What do I need to bring?</summary>
              <div>
                <p>Your own camping gear, food, water, a notebook or field journal, sun protection, and sturdy walking shoes. A detailed packing list is sent after registration.</p>
              </div>
            </details>
            <details class="upcoming-events-faq-item">
              <summary>How physically demanding is it?</summary>
              <div>
                <p>You should be comfortable walking on uneven desert terrain for several hours a day. The pace is steady, not rushed. We stop often to observe and learn.</p>
              </div>
            </details>
            <details class="upcoming-events-faq-item">
              <summary>Where exactly do we camp?</summary>
              <div>
                <p>Camping details and the exact location are shared with registered participants. The medicine making day takes place at a private residence in Sedona.</p>
              </div>
            </details>
            <details class="upcoming-events-faq-item">
              <summary>Is food provided?</summary>
              <div>
                <p>No. Participants are responsible for their own meals. Past groups have enjoyed sharing food around the picnic tables in the evenings &mdash; it tends to become part of the experience.</p>
              </div>
            </details>
            <details class="upcoming-events-faq-item">
              <summary>What if it sells out?</summary>
              <div>
                <p>There are only 13 spots and no waitlist once they&rsquo;re filled. If you&rsquo;re thinking about it, don&rsquo;t wait.</p>
              </div>
            </details>
          </div>
        </div>
      </section>

      <section id="reserve" class="upcoming-events-final py-24 md:py-32 px-8">
        <div class="max-w-4xl mx-auto text-center reveal">
          <p class="upcoming-events-label">Your Invitation</p>
          <h2 class="upcoming-events-section-title">
            13 Spots. Four Days.<br>
            A Practice You&rsquo;ll Carry Home.
          </h2>

          <p class="upcoming-events-body">
            June 2&ndash;5, 2026. Sedona, Arizona.
          </p>

          <p class="upcoming-events-body">
            You&rsquo;ll walk the desert with people who care about plants the way you do. You&rsquo;ll learn to see what&rsquo;s growing around you &mdash; really see it. And on the last day, you&rsquo;ll make medicine with your own hands from plants you harvested yourself.
          </p>

          <p class="upcoming-events-body">
            That&rsquo;s the kind of learning that stays with you.
          </p>

          <div class="mt-10">
            <a href="#reserve" class="upcoming-events-btn upcoming-events-btn--light">
              Reserve My Spot &mdash; $450
            </a>
            <p class="upcoming-events-microcopy upcoming-events-microcopy--light">
              Only 13 spots available &middot; No experience required &middot; Questions? Contact us
            </p>
          </div>
        </div>
      </section>
    </main>

    <?php
  endwhile;
endif;
?>

<?php
get_footer();
