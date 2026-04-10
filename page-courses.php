<?php
/**
 * Template Name: Courses
 */
get_header();
?>

<section class="section bg-mint-green">
  <div class="container mx-auto px-4 md:px-6 lg:px-8">
    <div class="grid gap-10 lg:grid-cols-[1.1fr_0.9fr] items-center">
      <div>
        <p class="eyebrow">Self-Paced Courses</p>
        <h1>Self-Paced Herbal Courses You Can Start Today</h1>
        <p class="text-lg text-neutral-700 mb-4">Learn at your own pace with Feather Jones. Each course blends traditional herbal knowledge with hands-on tools you can use right away. Courses start at $75.</p>
        <p class="text-neutral-600 mb-8">Instructor: Feather Jones | Meet Feather on the About page</p>
        <div class="flex flex-wrap gap-4">
          <a class="btn btn-primary" href="#catalog">Browse All Courses</a>
          <a class="btn btn-secondary" href="/contact/">Contact Us</a>
        </div>
      </div>
      <div class="w-full">
        <div class="bg-white/70 rounded-3xl shadow-sm aspect-[4/5]"></div>
      </div>
    </div>
  </div>
</section>

<section class="section bg-white" id="featured">
  <div class="container">
    <div class="featured-card reveal">
      <div class="featured-inner">
        <div class="featured-img">
          <div class="badge-rec">Recommended Starting Point</div>
          <img src="<?php echo get_template_directory_uri(); ?>/images/bg/2760649.webp" alt="" class="w-full h-full object-cover">
        </div>
        <div class="featured-body">
          <div class="eyebrow">Flagship Program</div>
          <h2><a href="/courses/womens-wellness/">Women&rsquo;s Wellness Complete Herbal Course</a></h2>

          <p class="desc mb-8">Learn how to care for your body with herbs through every stage of a woman&rsquo;s life&thinsp;&mdash;&thinsp;from cycle health to menopause. This is Feather&rsquo;s most complete course, with practical guidance you can use right away.</p>

          <p class="desc mb-12 hidden"><a href="#">Read more &raquo;</a></p>

          <div class="meta-strip mb-8">
            <span class="meta-tag">20 Hours</span>
            <span class="meta-tag">18 Lessons</span>
            <span class="meta-tag">19 Quizzes</span>
            <span class="meta-tag">Course PDFs</span>
            <span class="meta-tag">Beginner Friendly</span>
            <span class="meta-tag">Lifetime Access</span>
          </div>
          <div class="featured-cols">
            <div>
              <h4>What You&rsquo;ll Learn</h4>
              <ul>
                <li>Herbal approaches to menstrual health and hormone balance</li>
                <li>Foundational materia medica for women&rsquo;s wellness</li>
                <li>Safe, practical preparation methods and daily protocols</li>
              </ul>
            </div>
            <div>
              <h4>Who This Is For</h4>
              <ul>
                <li>Women who want to take an active role in their health</li>
                <li>Herbal students building a strong foundation</li>
                <li>Practitioners supporting women&rsquo;s health</li>
              </ul>
            </div>
          </div>
          <div class="featured-enroll">
            <div>
              <div class="featured-price">$200</div>
              <div class="featured-price-note">One-time purchase &middot; Immediate access</div>
            </div>
            <a href="#" class="btn btn-secondary btn-sm">View Full Course</a>
            <a href="#" class="btn btn-primary btn-sm">Enroll Today</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section bg-warm-linen" id="catalog">
  <div class="container">
    <div class="text-center reveal">
      <div class="eyebrow">Course Catalog</div>
      <h2>Browse All Courses</h2>
      <p style="font-size:16px;color:#888;max-width:560px;margin:0 auto;">Choose a focused learning path or pair courses together for a deeper herbal practice.</p>
    </div>
    <div class="flex flex-col gap-4 mt-10 reveal">

      <!-- COURSE 0 -->
      <div class="course-row">
        <div class="course-thumb">
          <img src="<?php echo get_template_directory_uri(); ?>/images/bg/2760649.webp" alt="Herbs in a jar" style="object-position:center">
        </div>
        <div class="course-info">
          <h3><a href="#">Goddess Rhythms&thinsp;&mdash;&thinsp;Herbal Support for Women&rsquo;s Moontime</a></h3>
          <p class="cd">Learn how to support your body through each phase of the menstrual cycle with herbs, comfort practices, and gentle daily protocols.</p>
          <div class="course-meta">
            <span class="cm">12 Hours</span><span class="cm">48 Lessons</span><span class="cm">Beginner</span><span class="cm">Lifetime Access</span>
          </div>
        </div>
        <div class="course-actions">
          <div class="course-price">$120</div>
          <a href="#" class="btn btn-secondary btn-sm" style="width:100%">View Course</a>
          <a href="#" class="btn-ghost">Enroll Today &rarr;</a>
        </div>
      </div>

      <!-- COURSE 1 -->
      <div class="course-row">
        <div class="course-thumb">
          <img src="<?php echo get_template_directory_uri(); ?>/images/bg/2760649.webp" alt="Herbs in a jar" style="object-position:center">
        </div>
        <div class="course-info">
          <h3><a href="#">Goddess Rhythms&thinsp;&mdash;&thinsp;Herbal Support for Women&rsquo;s Moontime</a></h3>
          <p class="cd">Learn how to support your body through each phase of the menstrual cycle with herbs, comfort practices, and gentle daily protocols.</p>
          <div class="course-meta">
            <span class="cm">12 Hours</span><span class="cm">48 Lessons</span><span class="cm">Beginner</span><span class="cm">Lifetime Access</span>
          </div>
        </div>
        <div class="course-actions">
          <div class="course-price">$120</div>
          <a href="#" class="btn btn-secondary btn-sm" style="width:100%">View Course</a>
          <a href="#" class="btn-ghost">Enroll Today &rarr;</a>
        </div>
      </div>

      <!-- COURSE 2 -->
      <div class="course-row">
        <div class="course-thumb">
          <img src="<?php echo get_template_directory_uri(); ?>/images/bg/2760649.webp" alt="Botanical illustration" style="object-position:center">
        </div>
        <div class="course-info">
          <h3><a href="#">Botanical Support for Motherhood</a></h3>
          <p class="cd">Safety-first herbal guidance for preconception, pregnancy, and postpartum care&thinsp;&mdash;&thinsp;for mothers and the practitioners who support them.</p>
          <div class="course-meta">
            <span class="cm">10 Hours</span><span class="cm">36 Lessons</span><span class="cm">Intermediate</span><span class="cm">Audio + PDF</span>
          </div>
        </div>
        <div class="course-actions">
          <div class="course-price">$110</div>
          <a href="#" class="btn btn-secondary btn-sm" style="width:100%">View Course</a>
          <a href="#" class="btn-ghost">Enroll Today &rarr;</a>
        </div>
      </div>

      <!-- COURSE 3 -->
      <div class="course-row">
        <div class="course-thumb">
          <img src="<?php echo get_template_directory_uri(); ?>/images/bg/2760649.webp" alt="Yarrow plant" style="object-position:center">
        </div>
        <div class="course-info">
          <h3><a href="#">Menopause &amp; The Wise Elder Woman</a></h3>
          <p class="cd">Herbal approaches and lifestyle rhythms that support the menopausal transition with steadiness and vitality.</p>
          <div class="course-meta">
            <span class="cm">6 Hours</span><span class="cm">24 Lessons</span><span class="cm">Beginner</span><span class="cm">Worksheets</span>
          </div>
        </div>
        <div class="course-actions">
          <div class="course-price">$75</div>
          <a href="#" class="btn btn-secondary btn-sm" style="width:100%">View Course</a>
          <a href="#" class="btn-ghost">Enroll Today &rarr;</a>
        </div>
      </div>

      <!-- COURSE 4 -->
      <div class="course-row">
        <div class="course-thumb">
          <img src="<?php echo get_template_directory_uri(); ?>/images/bg/2760649.webp" alt="Hands holding roots" style="object-position:center">
        </div>
        <div class="course-info">
          <h3><a href="#">Herbal Abortifacients Protocol</a></h3>
          <p class="cd">A research-grounded overview of plants historically cited as abortifacients, with emphasis on safety, ethics, and informed practice.</p>
          <div class="course-meta">
            <span class="cm">8 Hours</span><span class="cm">32 Lessons</span><span class="cm">All Levels</span><span class="cm">Self-Paced</span>
          </div>
        </div>
        <div class="course-actions">
          <div class="course-price">$95</div>
          <a href="#" class="btn btn-secondary btn-sm" style="width:100%">View Course</a>
          <a href="#" class="btn-ghost">Enroll Today &rarr;</a>
        </div>
      </div>

      <!-- COURSE 5 -->
      <div class="course-row">
        <div class="course-thumb">
          <img src="<?php echo get_template_directory_uri(); ?>/images/bg/2760649.webp" alt="Prickly pear cactus" style="object-position:center">
        </div>
        <div class="course-info">
          <span class="series-label">Get Your Feet Wet Series</span>
          <h3><a href="#">Prickly Pear&thinsp;&mdash;&thinsp;Harvest to Table</a></h3>
          <p class="cd">A hands-on seasonal mini-course on foraging prickly pear, safe preparation, and simple kitchen recipes you can try at home.</p>
          <div class="course-meta">
            <span class="cm">7 Hours</span><span class="cm">28 Lessons</span><span class="cm">All Levels</span><span class="cm">Printable Guides</span>
          </div>
        </div>
        <div class="course-actions">
          <div class="course-price">$85</div>
          <a href="#" class="btn btn-secondary btn-sm" style="width:100%">View Course</a>
          <a href="#" class="btn-ghost">Enroll Today &rarr;</a>
        </div>
      </div>

      <!-- COURSE 6 -->
      <div class="course-row">
        <div class="course-thumb">
          <img src="<?php echo get_template_directory_uri(); ?>/images/bg/2760649.webp" alt="Feather teaching" style="object-position:center top">
        </div>
        <div class="course-info">
          <span class="series-label">Get Your Feet Wet Series</span>
          <h3><a href="#">Herbal Musings&thinsp;&mdash;&thinsp;Stories of the Plants</a></h3>
          <p class="cd">Plant stories, clinical reflections, and case studies for experienced herbalists looking to deepen their observation and practice.</p>
          <div class="course-meta">
            <span class="cm">14 Hours</span><span class="cm">52 Lessons</span><span class="cm">Advanced</span><span class="cm">Case Studies</span>
          </div>
        </div>
        <div class="course-actions">
          <div class="course-price">$150</div>
          <a href="#" class="btn btn-secondary btn-sm" style="width:100%">View Course</a>
          <a href="#" class="btn-ghost">Enroll Today &rarr;</a>
        </div>
      </div>

    </div>
  </div>
</section>

<div class="botanical-divider"></div>

<section class="section bg-white">
  <div class="container">
    <div class="text-center reveal mb-6">
      <div class="eyebrow">Support</div>
      <h2>Need Help Choosing a Course?</h2>
      <p class="max-w-2xl mx-auto mb-6">Not sure where to start? Reach out with questions about which course fits your experience level, what&rsquo;s included, or how access works. We&rsquo;re happy to help.</p>
      <a href="#" class="btn btn-primary" style="margin-bottom:36px">Contact Support</a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mt-9 reveal">
      <div class="support-card">
        <h3>What You&rsquo;ll Receive</h3>
        <p>Immediate access to lessons, downloadable resources, and clear guidance for safe herbal practice.</p>
      </div>
      <div class="support-card">
        <h3>Access Details</h3>
        <p>All courses are self-paced with lifetime access unless noted otherwise in the course details.</p>
      </div>
      <div class="support-card">
        <h3>Questions?</h3>
        <p>Visit the <a href="#" style="color:var(--forest-green)">FAQ page</a> for more answers, or send us a note for personal help.</p>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
?>


