<?php
/**
 * Template Name: Course Catalog
 */
get_header(
  null,
  array(
    // 'header_variant' => 'absolute',
    //'header_color' => 'white',
  )
);
?>

<?php
if ( have_posts() ) :
  while ( have_posts() ) :
    the_post();
    ?>

    <section id="course-catalog-hero" class="bg-[#f6f2ee]">
      <div class="max-w-6xl mx-auto px-6 py-20">
        <div class="flex flex-col gap-10 lg:flex-row lg:items-end lg:justify-between">
          <div class="max-w-2xl space-y-6">
            <p class="text-xs uppercase tracking-[0.35em] text-slate-500">Course Catalog</p>
            <h1 class="text-4xl md:text-5xl leading-tight">
              Learn herbal wellness with clear, grounded guidance.
            </h1>
            <p class="text-lg text-slate-600 leading-relaxed">
              Explore self-paced courses led by Feather Jones. Each course blends traditional herbal knowledge
              with practical tools you can apply right away.
            </p>
            <div class="flex flex-wrap gap-4">
              <a class="rounded-full bg-slate-900 px-6 py-3 text-sm uppercase tracking-[0.2em] text-white" href="http://localhost:8080/courses/womens-wellness/">
                View Featured Course
              </a>
              <a class="rounded-full border border-slate-300 px-6 py-3 text-sm uppercase tracking-[0.2em] text-slate-700" href="#course-catalog">
                Browse All Courses
              </a>
            </div>
            <div class="flex flex-wrap items-center gap-4 text-sm text-slate-500">
              <span>Instructor: Feather Jones</span>
              <span class="hidden sm:inline">•</span>
              <a class="underline" href="/about">Meet Feather on the About page</a>
            </div>
          </div>
          <div class="w-full max-w-md rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-xs uppercase tracking-[0.35em] text-slate-500">Course Match</p>
            <h2 class="mt-3 text-2xl leading-tight">Not sure where to start?</h2>
            <p class="mt-3 text-sm text-slate-600">
              Take a quick, logged-out quiz to find the right course for your goals.
            </p>
            <a class="mt-6 inline-flex items-center justify-center rounded-full bg-[#2f3b37] px-5 py-2.5 text-xs uppercase tracking-[0.3em] text-white" href="/course-quiz">
              Which Course Is Right For Me?
            </a>
          </div>
        </div>
      </div>
    </section>

    <section id="featured-course" class="bg-white py-20">
      <div class="max-w-6xl mx-auto px-6">
        <div class="flex flex-col gap-10 lg:flex-row lg:items-stretch">
          <div class="w-full lg:w-5/12">
            <div class="relative">
              <a
                class="block w-full aspect-[3/4] overflow-hidden rounded-3xl border border-slate-200 bg-gradient-to-br from-[#dfe7df] to-[#f7efe7]"
                href="http://localhost:8080/courses/womens-wellness/"
              >
                <img
                  src="http://localhost:8080/wp-content/uploads/7178818.webp"
                  alt="Herbal wellness course featured image"
                  class="h-full w-full object-cover"
                  loading="lazy"
                />
              </a>
              <a
                class="absolute left-4 top-4 rounded-full bg-white/90 px-4 py-2 text-[11px] uppercase tracking-[0.3em] text-slate-700 shadow-sm backdrop-blur"
                href="http://localhost:8080/courses/womens-wellness/"
              >
                <i class="fa fa-solid fa-list-ul"></i>
                <span class="ml-2">View Course Outline</span>
              </a>
            </div>
          </div>
          <div class="flex-1 space-y-8">
            <div class="space-y-4">
              <p class="text-sm uppercase tracking-[0.3em] text-slate-500">Flagship Program</p>
              <h3 class="text-3xl md:text-4xl leading-tight">
                <a href="http://localhost:8080/courses/womens-wellness/">Women’s Wellness Complete Herbal Course</a>
              </h3>
              <p class="text-lg text-slate-600 leading-relaxed">
                Learn how to care for your body with herbs through every stage of a woman’s life, from cycle health to
                menopause, with practical guidance you can use right away.
                <a class="ml-4 text-sm uppercase tracking-[0.2em] text-blue-600 underline" href="http://localhost:8080/courses/womens-wellness/">
                  Read more &raquo;
                </a>
              </p>
            </div>

            <div class="flex flex-wrap gap-4 text-sm text-slate-600">
              <span class="rounded-full border border-slate-200 px-4 py-1">20 hours</span>
              <span class="rounded-full border border-slate-200 px-4 py-1">18 lessons</span>
              <span class="rounded-full border border-slate-200 px-4 py-1">19 quizzes</span>
              <span class="rounded-full border border-slate-200 px-4 py-1">Course PDFs</span>
              <span class="rounded-full border border-slate-200 px-4 py-1">Beginner friendly</span>
              <span class="rounded-full border border-slate-200 px-4 py-1">Lifetime access</span>
            </div>

            <div class="grid gap-6 md:grid-cols-2">
              <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                <h4 class="text-lg font-semibold">What you’ll learn</h4>
                <ul class="mt-3 list-disc space-y-2 pl-5 text-sm text-slate-600">
                  <li>Herbal approaches to menstrual health and hormone balance</li>
                  <li>Foundational materia medica for women’s wellness</li>
                  <li>Safe, practical preparation methods and daily protocols</li>
                </ul>
              </div>
              <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                <h4 class="text-lg font-semibold">Who this is for</h4>
                <ul class="mt-3 list-disc space-y-2 pl-5 text-sm text-slate-600">
                  <li>Women who want to take an active role in their health</li>
                  <li>Herbal students building a strong foundation</li>
                  <li>Practitioners supporting women’s health</li>
                </ul>
              </div>
            </div>

            <div class="flex flex-wrap items-center gap-6 rounded-2xl border border-slate-200 bg-white p-6">
              <div>
                <p class="text-xs uppercase tracking-[0.35em] text-slate-500">Enrollment</p>
                <p class="text-3xl">$200</p>
                <p class="text-sm text-slate-500">One-time purchase • Immediate access</p>
              </div>
              <div class="flex flex-wrap gap-3">
                <a class="rounded-full bg-slate-900 px-6 py-3 text-xs uppercase tracking-[0.25em] text-white" href="#">
                  Enroll Today
                </a>
                <a class="rounded-full border border-slate-300 px-6 py-3 text-xs uppercase tracking-[0.25em] text-slate-700" href="http://localhost:8080/courses/womens-wellness/">
                  More Details
                </a>
              </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
              <div class="flex flex-wrap items-center justify-between gap-4">
                <div>
                  <p class="text-xs uppercase tracking-[0.35em] text-slate-500">Logged-in Preview</p>
                  <p class="text-sm text-slate-600">Your progress</p>
                </div>
                <p class="text-sm text-slate-600">10% complete • Last activity Apr 5, 2026</p>
              </div>
              <div class="mt-4 h-2 w-full overflow-hidden rounded-full bg-slate-200" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                <div class="h-full w-[10%] rounded-full bg-emerald-500"></div>
              </div>
              <div class="mt-4 flex flex-wrap gap-3">
                <a class="rounded-full bg-emerald-600 px-5 py-2 text-xs uppercase tracking-[0.25em] text-white" href="http://localhost:8080/courses/womens-wellness/">
                  Continue Course
                </a>
                <a class="rounded-full border border-emerald-200 px-5 py-2 text-xs uppercase tracking-[0.25em] text-emerald-700" href="http://localhost:8080/courses/womens-wellness/">
                  View Lessons
                </a>
              </div>
            </div>

            <p class="text-xs text-slate-500">
              Educational content only. Herbal information is not a substitute for professional medical advice.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section id="course-catalog" class="bg-[#f8f7f4] py-20">
      <div class="max-w-6xl mx-auto px-6 space-y-10">
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
          <div class="max-w-2xl space-y-3">
            <p class="text-xs uppercase tracking-[0.35em] text-slate-500">Course Catalog</p>
            <h2 class="text-3xl md:text-4xl leading-tight">Browse the full catalog</h2>
            <p class="text-sm text-slate-600">
              Choose a focused learning path or pair courses together for a deeper herbal practice.
            </p>
          </div>
          <a class="rounded-full border border-slate-300 px-6 py-2 text-xs uppercase tracking-[0.3em] text-slate-700" href="/course-quiz">
            Take The Course Quiz
          </a>
        </div>

        <div class="space-y-6">
          <article class="flex flex-col gap-6 rounded-3xl border border-slate-200 bg-white p-6 md:flex-row md:items-start">
            <img
              src="http://localhost:8080/wp-content/uploads/7178818.webp"
              alt="Course thumbnail"
              class="h-32 w-full rounded-2xl object-cover md:h-28 md:w-48"
              loading="lazy"
            />
            <div class="flex-1 space-y-3">
              <h3 class="text-2xl">Goddess Rhythms: Herbal Support for Women’s Moontime</h3>
              <p class="text-sm text-slate-600">
                Explore cyclical herbal support, comfort practices, and gentle protocols aligned with each phase of the
                menstrual cycle.
              </p>
              <div class="flex flex-wrap gap-3 text-xs uppercase tracking-[0.2em] text-slate-500">
                <span>12 hours</span>
                <span>48 lessons</span>
                <span>Beginner</span>
                <span>Lifetime access</span>
              </div>
            </div>
            <div class="flex w-full flex-col gap-3 md:w-56 md:items-end">
              <p class="text-2xl">$120</p>
              <a class="rounded-full bg-slate-900 px-5 py-2 text-xs uppercase tracking-[0.25em] text-white" href="#">
                Enroll Today
              </a>
              <a class="text-xs uppercase tracking-[0.3em] text-slate-500" href="#">More Details</a>
              <div class="mt-2 h-1.5 w-full overflow-hidden rounded-full bg-slate-200" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <div class="h-full w-[0%] bg-emerald-500"></div>
              </div>
            </div>
          </article>

          <article class="flex flex-col gap-6 rounded-3xl border border-slate-200 bg-white p-6 md:flex-row md:items-start">
            <img
              src="http://localhost:8080/wp-content/uploads/7178818.webp"
              alt="Course thumbnail"
              class="h-32 w-full rounded-2xl object-cover md:h-28 md:w-48"
              loading="lazy"
            />
            <div class="flex-1 space-y-3">
              <h3 class="text-2xl">Herbal Abortifacients Protocol</h3>
              <p class="text-sm text-slate-600">
                A historical and ethnobotanical overview of plants traditionally cited in abortifacient contexts, with
                an emphasis on safety, ethics, and research literacy.
              </p>
              <div class="flex flex-wrap gap-3 text-xs uppercase tracking-[0.2em] text-slate-500">
                <span>8 hours</span>
                <span>32 lessons</span>
                <span>All levels</span>
                <span>Self-paced</span>
              </div>
            </div>
            <div class="flex w-full flex-col gap-3 md:w-56 md:items-end">
              <p class="text-2xl">$95</p>
              <a class="rounded-full bg-slate-900 px-5 py-2 text-xs uppercase tracking-[0.25em] text-white" href="#">
                Enroll Today
              </a>
              <a class="text-xs uppercase tracking-[0.3em] text-slate-500" href="#">More Details</a>
              <div class="mt-2 h-1.5 w-full overflow-hidden rounded-full bg-slate-200" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                <div class="h-full w-[35%] bg-emerald-500"></div>
              </div>
            </div>
          </article>

          <article class="flex flex-col gap-6 rounded-3xl border border-slate-200 bg-white p-6 md:flex-row md:items-start">
            <img
              src="http://localhost:8080/wp-content/uploads/7178818.webp"
              alt="Course thumbnail"
              class="h-32 w-full rounded-2xl object-cover md:h-28 md:w-48"
              loading="lazy"
            />
            <div class="flex-1 space-y-3">
              <h3 class="text-2xl">Botanical Support for Motherhood</h3>
              <p class="text-sm text-slate-600">
                Learn safety-first herbal considerations for preconception, pregnancy, and postpartum restoration.
              </p>
              <div class="flex flex-wrap gap-3 text-xs uppercase tracking-[0.2em] text-slate-500">
                <span>10 hours</span>
                <span>36 lessons</span>
                <span>Intermediate</span>
                <span>Audio + PDF</span>
              </div>
            </div>
            <div class="flex w-full flex-col gap-3 md:w-56 md:items-end">
              <p class="text-2xl">$110</p>
              <a class="rounded-full bg-slate-900 px-5 py-2 text-xs uppercase tracking-[0.25em] text-white" href="#">
                Enroll Today
              </a>
              <a class="text-xs uppercase tracking-[0.3em] text-slate-500" href="#">More Details</a>
              <div class="mt-2 h-1.5 w-full overflow-hidden rounded-full bg-slate-200" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                <div class="h-full w-[65%] bg-emerald-500"></div>
              </div>
            </div>
          </article>

          <article class="flex flex-col gap-6 rounded-3xl border border-slate-200 bg-white p-6 md:flex-row md:items-start">
            <img
              src="http://localhost:8080/wp-content/uploads/7178818.webp"
              alt="Course thumbnail"
              class="h-32 w-full rounded-2xl object-cover md:h-28 md:w-48"
              loading="lazy"
            />
            <div class="flex-1 space-y-3">
              <h3 class="text-2xl">Menopause &amp; The Wise Elder Woman</h3>
              <p class="text-sm text-slate-600">
                Explore herbal approaches and lifestyle rhythms that support the menopausal transition with steadiness
                and vitality.
              </p>
              <div class="flex flex-wrap gap-3 text-xs uppercase tracking-[0.2em] text-slate-500">
                <span>6 hours</span>
                <span>24 lessons</span>
                <span>Beginner</span>
                <span>Worksheets</span>
              </div>
            </div>
            <div class="flex w-full flex-col gap-3 md:w-56 md:items-end">
              <p class="text-2xl">$75</p>
              <a class="rounded-full bg-slate-900 px-5 py-2 text-xs uppercase tracking-[0.25em] text-white" href="#">
                Enroll Today
              </a>
              <a class="text-xs uppercase tracking-[0.3em] text-slate-500" href="#">More Details</a>
              <div class="mt-2 h-1.5 w-full overflow-hidden rounded-full bg-slate-200" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <div class="h-full w-[0%] bg-emerald-500"></div>
              </div>
            </div>
          </article>

          <article class="flex flex-col gap-6 rounded-3xl border border-slate-200 bg-white p-6 md:flex-row md:items-start">
            <img
              src="http://localhost:8080/wp-content/uploads/7178818.webp"
              alt="Course thumbnail"
              class="h-32 w-full rounded-2xl object-cover md:h-28 md:w-48"
              loading="lazy"
            />
            <div class="flex-1 space-y-3">
              <h3 class="text-2xl">Get Your Feet Wet Series: Prickly Pear Harvest To Table</h3>
              <p class="text-sm text-slate-600">
                A hands-on seasonal mini-course on foraging prickly pear, safe preparation, and simple kitchen recipes.
              </p>
              <div class="flex flex-wrap gap-3 text-xs uppercase tracking-[0.2em] text-slate-500">
                <span>7 hours</span>
                <span>28 lessons</span>
                <span>All levels</span>
                <span>Printable guides</span>
              </div>
            </div>
            <div class="flex w-full flex-col gap-3 md:w-56 md:items-end">
              <p class="text-2xl">$85</p>
              <a class="rounded-full bg-slate-900 px-5 py-2 text-xs uppercase tracking-[0.25em] text-white" href="#">
                Enroll Today
              </a>
              <a class="text-xs uppercase tracking-[0.3em] text-slate-500" href="#">More Details</a>
              <div class="mt-2 h-1.5 w-full overflow-hidden rounded-full bg-slate-200" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <div class="h-full w-[0%] bg-emerald-500"></div>
              </div>
            </div>
          </article>

          <article class="flex flex-col gap-6 rounded-3xl border border-slate-200 bg-white p-6 md:flex-row md:items-start">
            <img
              src="http://localhost:8080/wp-content/uploads/7178818.webp"
              alt="Course thumbnail"
              class="h-32 w-full rounded-2xl object-cover md:h-28 md:w-48"
              loading="lazy"
            />
            <div class="flex-1 space-y-3">
              <h3 class="text-2xl">Get Your Feet Wet Series: Herbal Musings~ Stories Of The Plants</h3>
              <p class="text-sm text-slate-600">
                Short reflections and plant stories designed to deepen relationship, observation, and herbal practice.
              </p>
              <div class="flex flex-wrap gap-3 text-xs uppercase tracking-[0.2em] text-slate-500">
                <span>14 hours</span>
                <span>52 lessons</span>
                <span>Advanced</span>
                <span>Case studies</span>
              </div>
            </div>
            <div class="flex w-full flex-col gap-3 md:w-56 md:items-end">
              <p class="text-2xl">$150</p>
              <a class="rounded-full bg-slate-900 px-5 py-2 text-xs uppercase tracking-[0.25em] text-white" href="#">
                Enroll Today
              </a>
              <a class="text-xs uppercase tracking-[0.3em] text-slate-500" href="#">More Details</a>
              <div class="mt-2 h-1.5 w-full overflow-hidden rounded-full bg-slate-200" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <div class="h-full w-[0%] bg-emerald-500"></div>
              </div>
            </div>
          </article>
        </div>
      </div>
    </section>

    <section id="course-support" class="bg-white py-20">
      <div class="max-w-5xl mx-auto px-6">
        <div class="grid gap-8 rounded-3xl border border-slate-200 bg-slate-50 p-10 md:grid-cols-[1.2fr_1fr]">
          <div class="space-y-4">
            <p class="text-xs uppercase tracking-[0.35em] text-slate-500">Support</p>
            <h2 class="text-3xl leading-tight">Need help choosing a course?</h2>
            <p class="text-sm text-slate-600">
              If you want personal guidance, start with the quiz or reach out with questions about fit, access, or
              prerequisites.
            </p>
            <div class="flex flex-wrap gap-4">
              <a class="rounded-full bg-slate-900 px-6 py-3 text-xs uppercase tracking-[0.3em] text-white" href="/course-quiz">
                Take The Quiz
              </a>
              <a class="rounded-full border border-slate-300 px-6 py-3 text-xs uppercase tracking-[0.3em] text-slate-700" href="/contact">
                Contact Support
              </a>
            </div>
          </div>
          <div class="space-y-4 text-sm text-slate-600">
            <div>
              <h3 class="text-base text-slate-800">What you’ll receive</h3>
              <p>
                Immediate access to lessons, downloadable resources, and clear guidance for safe herbal practice.
              </p>
            </div>
            <div>
              <h3 class="text-base text-slate-800">Access details</h3>
              <p>
                Courses are self-paced with lifetime access unless otherwise noted in the course details.
              </p>
            </div>
            <div>
              <h3 class="text-base text-slate-800">Questions?</h3>
              <p>
                Visit the FAQ page for more answers or send a note for personalized help.
              </p>
              <a class="mt-2 inline-flex text-xs uppercase tracking-[0.3em] text-slate-500" href="/faq">
                Visit FAQ
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php
  endwhile;
endif;
?>

<?php
get_footer();
