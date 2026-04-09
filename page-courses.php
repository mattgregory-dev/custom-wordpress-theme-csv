<?php
/**
 * Template Name: Courses
 */
get_header();
?>

<section class="section bg-[var(--color-accent)]">
  <div class="container mx-auto px-4 md:px-6 lg:px-8">
    <div class="grid gap-10 lg:grid-cols-[1.1fr_0.9fr] items-center">
      <div>
        <p class="eyebrow">Self-Paced Courses</p>
        <h1>Self-Paced Herbal Courses You Can Start Today</h1>
        <p class="text-lg text-neutral-700 mb-4">Learn at your own pace with Feather Jones. Each course blends traditional herbal knowledge with hands-on tools you can use right away. Courses start at $75.</p>
        <p class="text-neutral-600 mb-8">Instructor: Feather Jones | Meet Feather on the About page</p>
        <div class="flex flex-wrap gap-4">
          <a class="btn btn-primary" href="#catalog">Browse All Courses</a>
          <a class="btn btn-secondary" href="#">Contact Us</a>
        </div>
      </div>
      <div class="w-full">
        <div class="bg-white/70 rounded-3xl shadow-sm aspect-[4/5]"></div>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container mx-auto px-4 md:px-6 lg:px-8">
    <p class="eyebrow">Featured Course</p>
    <h2>Women's Wellness Complete Herbal Course</h2>
    <div class="grid gap-8 lg:grid-cols-[0.9fr_1.1fr] items-start">
      <div class="card">
        <div class="bg-[var(--color-muted)] rounded-2xl aspect-[4/3] mb-6"></div>
        <p class="text-neutral-700">Learn how to care for your body with herbs through every stage of a woman's life -- from cycle health to menopause. This is Feather's most complete course, with practical guidance you can use right away.</p>
        <a class="text-[var(--color-primary)] font-semibold hover:opacity-80 mt-4 inline-block" href="#">Read more -></a>
      </div>
      <div class="grid gap-6 md:grid-cols-2">
        <div class="card">
          <h3>What You'll Learn</h3>
          <ul class="text-neutral-600 space-y-2">
            <li>Herbal approaches to menstrual health and hormone balance</li>
            <li>Foundational materia medica for women's wellness</li>
            <li>Safe, practical preparation methods and daily protocols</li>
          </ul>
        </div>
        <div class="card">
          <h3>Who It's For</h3>
          <ul class="text-neutral-600 space-y-2">
            <li>Women who want to take an active role in their health</li>
            <li>Herbal students building a strong foundation</li>
            <li>Practitioners supporting women's health</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="catalog" class="section bg-[var(--color-muted)]">
  <div class="container mx-auto px-4 md:px-6 lg:px-8">
    <p class="eyebrow">Course Catalog</p>
    <h2>Browse All Courses</h2>
    <p class="text-base text-neutral-700 mb-10">Choose a focused learning path or pair courses together for a deeper herbal practice.</p>
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
      <div class="card">
        <h3>Goddess Rhythms -- Herbal Support for Women's Moontime</h3>
        <p class="text-neutral-600">Learn how to support your body through each phase of the menstrual cycle with herbs, comfort practices, and gentle daily protocols.</p>
      </div>
      <div class="card">
        <h3>Botanical Support for Motherhood</h3>
        <p class="text-neutral-600">Safety-first herbal guidance for preconception, pregnancy, and postpartum care -- for mothers and the practitioners who support them.</p>
      </div>
      <div class="card">
        <h3>Menopause &amp; The Wise Elder Woman</h3>
        <p class="text-neutral-600">Herbal approaches and lifestyle rhythms that support the menopausal transition with steadiness and vitality.</p>
      </div>
      <div class="card">
        <h3>Herbal Abortifacients Protocol</h3>
        <p class="text-neutral-600">A research-grounded overview of plants historically cited as abortifacients, with emphasis on safety, ethics, and informed practice.</p>
      </div>
      <div class="card">
        <h3>Prickly Pear -- Harvest to Table</h3>
        <p class="text-neutral-600">A hands-on seasonal mini-course on foraging prickly pear, safe preparation, and simple kitchen recipes you can try at home.</p>
      </div>
      <div class="card">
        <h3>Herbal Musings -- Stories of the Plants</h3>
        <p class="text-neutral-600">Plant stories, clinical reflections, and case studies for experienced herbalists looking to deepen their observation and practice.</p>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container mx-auto px-4 md:px-6 lg:px-8">
    <p class="eyebrow">Need Help?</p>
    <h2>Need Help Choosing a Course?</h2>
    <p class="text-base text-neutral-700 mb-10 max-w-3xl">Not sure where to start? Reach out with questions about which course fits your experience level, what's included, or how access works. We're happy to help.</p>
    <div class="grid gap-6 md:grid-cols-3">
      <div class="card">
        <h3>What You'll Receive</h3>
        <p class="text-neutral-600">Immediate access to lessons, downloadable resources, and clear guidance for safe herbal practice.</p>
      </div>
      <div class="card">
        <h3>Access Details</h3>
        <p class="text-neutral-600">All courses are self-paced with lifetime access unless noted otherwise in the course details.</p>
      </div>
      <div class="card">
        <h3>Questions?</h3>
        <p class="text-neutral-600">Visit the FAQ page for more answers, or send us a note for personal help.</p>
      </div>
    </div>
  </div>
</section>

<section class="section bg-[var(--color-muted)]">
  <div class="container mx-auto px-4 md:px-6 lg:px-8">
    <p class="text-xs text-neutral-600 max-w-5xl">
      Feather Jones provides educational courses and resources focused on herbal traditions, plant knowledge, and practical preparation skills such as teas, tinctures, and topical applications. The information shared is intended for learning and personal growth, and individual results may vary. Feather Jones does not provide medical diagnosis or treatment. Content on this site and within courses is not a substitute for professional medical advice, diagnosis, or care from a licensed healthcare provider. If you are pregnant, nursing, taking medications, or managing a medical condition, consult a qualified healthcare professional before using herbal products or protocols.
    </p>
  </div>
</section>

<?php
get_footer();
?>




