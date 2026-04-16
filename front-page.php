<?php
get_header();
?>

<section class="section bg-mint-green">
  <div class="container mx-auto px-4 md:px-6 lg:px-8">
    <div class="grid gap-10 lg:grid-cols-[1.1fr_0.9fr] items-center">
      <div>
        <p class="eyebrow">Herbal Medicine Education</p>
        <h1>Learn From a Herbalist Who Has Been Doing This for 40 Years</h1>
        <p class="text-lg text-neutral-700 mb-8">Feather Jones is a Registered Herbalist with a clinical practice, two terms as president of the American Herbalists Guild, and decades of teaching under her belt. Whether you're brand new to plants or deepening an existing practice, there's a path here for you.</p>
        <div class="flex flex-wrap gap-4">
          <a class="btn btn-primary" href="#paths">Find Your Path</a>
          <a class="btn btn-secondary" href="<?php echo esc_url( home_url( '/about/' ) ); ?>">Meet Feather &raquo;</a>
        </div>
      </div>
      <div class="w-full">
        <div class="bg-white/70 rounded-3xl shadow-sm aspect-[4/5]"></div>
      </div>
    </div>
  </div>
</section>

<!-- ========== SOCIAL PROOF BAR ========== -->
<div class="proof-bar bg-soft-cream">
  <div class="container">
    <div class="proof-stat">
      <div class="ps-num">40+ Years</div>
      <div class="ps-label">Teaching &amp;<br>Practicing</div>
    </div>
    <div class="proof-dot"></div>
    <div class="proof-stat">
      <div class="ps-num">Registered Herbalist</div>
      <div class="ps-label">American<br>Herbalists Guild</div>
    </div>

    <div class="proof-dot hidden"></div>
    <div class="proof-stat">
      <div class="ps-num">1000's of Students</div>
      <div class="ps-label">Taught in the<br>class and the field</div>
    </div>
  </div>
</div>

<!-- ========== OFFERING ROUTING CARDS ========== -->
<section class="section bg-white" id="paths">
  <div class="container">
    <div class="text-center reveal">
      <div class="eyebrow">Ways to Learn</div>
      <h2>Choose the Path That Fits Your Life</h2>
    </div>
    <!-- <div class="grid grid-cols-1 gap-5 mt-11 sm:grid-cols-2 reveal"> -->
    <div class="grid grid-cols-1 gap-5 mt-11 min-[600px]:grid-cols-2 min-[990px]:grid-cols-4 reveal">
      <div class="route-card">
        <div class="rc-label">Self-Paced Courses</div>
        <h3>Learn at Your Own Pace</h3>
        <p>Pick a topic, go at your speed, and come back whenever you want. Courses from $11. Lifetime access.</p>
        <a href="<?php echo esc_url( home_url( '/courses-catalog/' ) ); ?>" class="btn btn-secondary">Browse Courses</a>
      </div>
      <div class="route-card">
        <div class="rc-label">Live Group Classes</div>
        <h3>Join a Year-Long Apprenticeship</h3>
        <p>Weekly live classes with Feather and a small group of fellow students. A real curriculum&thinsp;&mdash;&thinsp;not drop-in workshops. Includes a Sedona field trip.</p>
        <a href="<?php echo esc_url( home_url( '/live-group-classes/' ) ); ?>" class="btn btn-secondary">Learn About Group Classes</a>
      </div>
      <div class="route-card">
        <div class="rc-label">Private Mentorship</div>
        <h3>Study One-on-One With Feather</h3>
        <p>A program built around your goals. Ideal for professionals adding herbal skills to an existing practice, or students who want a customized path.</p>
        <a href="<?php echo esc_url( home_url( '/study-with-feather/' ) ); ?>" class="btn btn-secondary">Explore Mentorship</a>
      </div>
      <div class="route-card">
        <div class="rc-label">Sedona Field Trip</div>
        <h3>Four Days in the High Desert</h3>
        <p>Plant walks, wild harvesting, and medicine making in Sedona, Arizona. Limited to 13 students. One trip per year.</p>
        <a href="<?php echo esc_url( home_url( '/field-trips/' ) ); ?>" class="btn btn-secondary">See Field Trip Details</a>
      </div>
    </div>
  </div>
</section>

<div class="botanical-divider"></div>

<!-- ========== NOT SURE ========== -->
<section class="section bg-warm-linen text-center">
  <div class="container reveal">
    <div class="eyebrow">Not Sure Where to Begin?</div>
    <h2>We&rsquo;ll Help You Figure It Out</h2>
    <p class="max-w-xl mx-auto">Not everyone comes in knowing what they need. That&rsquo;s fine. Reach out and we&rsquo;ll help you find the right fit based on your goals, your schedule, and where you are right now.</p>
    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary">Get in Touch</a>
  </div>
</section>

<!-- ========== CREDIBILITY ========== -->
<section class="section bg-white">
  <div class="container">
    <div class="grid grid-cols-1 gap-12 items-center md:grid-cols-[1fr_2.2fr] md:gap-14">
      <div class="reveal">
        <div class="content-img">
          <img class="object-top" src="https://featherjones.com/wp-content/uploads/feather-jones.webp" alt="Feather Jones, Registered Herbalist">
        </div>
      </div>
      <div class="reveal">
        <div class="eyebrow">Your Teacher</div>
        <h2>Feather Jones, Registered Herbalist (AHG)</h2>
        <p>Feather has been studying, practicing, and teaching herbal medicine since the early 1980s. She is a Registered Herbalist with the American Herbalists Guild&thinsp;&mdash;&thinsp;an organization she has served as president twice&thinsp;&mdash;&thinsp;and a Botanical Field Guide at the Sonoran University of Health Sciences.</p>
        <p>Her students range from complete beginners to licensed practitioners looking to add herbal knowledge to their work. What they have in common is that they come to her to learn the real thing.</p>
        <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="btn-ghost">Read Feather&rsquo;s Full Story &rarr;</a>
      </div>
    </div>
  </div>
</section>

<!-- ========== TESTIMONIAL ========== -->
<section class="section test-section">
  <div class="container reveal">
    <div class="eyebrow">From the Community</div>
    <blockquote>&ldquo;I went from knowing only the barest of basics about herbalism to confidently crafting an array of herbal medicines&hellip; I signed up for year two!&rdquo;</blockquote>
    <cite>&mdash; Kim Foxx, Student</cite>
    <div style="margin-top:24px">
      <a href="#" class="btn-ghost hidden">Read More Student Stories &rarr;</a>
    </div>
  </div>
</section>

<div class="botanical-divider"></div>

<!-- ========== FOOTER CTA + EMAIL CAPTURE ========== -->
<section class="section footer-cta">
  <div class="container text-center reveal">
    <div class="eyebrow">Free Course</div>
    <h2>New to Herbs? Start Here&thinsp;&mdash;&thinsp;No Cost.</h2>
    <p class="mx-auto mb-4 descriptor">Sign up and get instant access to <em>Natural Pest Control with Plants: Safe, Herbal Solutions for Home & Pets</em>&thinsp;&mdash;&thinsp;a short, practical course on using herbs and essential oils to repel common pests, naturally. It&rsquo;s 25&ndash;35 minutes and you can use what you learn right away.</p>
    <p class="mx-auto mb-10 sub-line">Part of Feather&rsquo;s Get Your Feet Wet Series: short, focused lessons designed for people just getting started.</p>

    <div class="forminator-cta-form mt-12 mb-10">
      <?php echo do_shortcode( '[forminator_form id="2348"]' ); ?>
    </div>

    <p class="email-micro">You&rsquo;ll also receive herbal insights and program updates. Unsubscribe any time.</p>
    <div class="footer-links">
      <a href="<?php echo esc_url( home_url( '/courses/' ) ); ?>">Explore All Courses</a>
      <a class="hidden" href="<?php echo esc_url( home_url( '/' ) ); ?>">Follow on Facebook</a>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Follow on Instagram</a>
    </div>
  </div>
</section>

<?php
get_footer();
?>


