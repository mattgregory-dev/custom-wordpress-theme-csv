<?php
/**
 * Template Name: Contact
 */
get_header(
  null,
  array(
    //'header_variant' => 'absolute',
    //'header_color' => 'white',
  )
);
?>

<div class="contact-page">

  <!-- ===== HERO ===== -->
  <section class="hero">
    <div class="container">
      <div class="eyebrow">Get in Touch</div>
      <h1>Questions? Let's Talk.</h1>
      <p>Whether you're curious about a course, thinking about mentorship, or not sure where to start — reach out. We'll point you in the right direction.</p>
    </div>
  </section>

  <div class="botanical-divider"></div>

  <!-- ===== CONTACT CONTENT ===== -->
  <section class="contact-section">
    <div class="contact-container">
      <div class="contact-grid">

        <!-- LEFT: FORM -->
        <div class="form-card reveal">

          <h2 class="form-title">Send Us a Message</h2>
          <p class="form-subtitle">Fill out the form and we&rsquo;ll get back to you soon.</p>

          <div class="mb-12 forminator-contact">
            <?php echo do_shortcode('[forminator_form id="213"]'); ?>
          </div>

        </div>

        <!-- RIGHT: SIDEBAR -->
        <div class="sidebar">
          <div class="response-card reveal" style="transition-delay:.16s">
            <h3>Before You Write</h3>
            <p>It helps to mention which program you're looking at and where you are in your herbal learning. If you're not sure yet, that's fine — say that.</p>
          </div>
          <div class="helpful-card reveal" style="transition-delay:.24s">
            <h3>Quick Links</h3>
            <ul class="quick-links">
              <li><a href="<?php echo esc_url( home_url( '/study-with-feather/' ) ); ?>"><span>Private Mentorship</span><span class="quick-link-arrow">&rarr;</span></a></li>
              <li><a href="<?php echo esc_url( home_url( '/live-group-classes/' ) ); ?>"><span>Live Group Classes</span><span class="quick-link-arrow">&rarr;</span></a></li>
              <li><a href="<?php echo esc_url( home_url( '/courses/' ) ); ?>"><span>Self-Paced Courses</span><span class="quick-link-arrow">&rarr;</span></a></li>
              <li><a href="<?php echo esc_url( home_url( '/field-trips/' ) ); ?>"><span>Sedona Field Trip</span><span class="quick-link-arrow">&rarr;</span></a></li>
              <li class="hidden"><a href="<?php echo esc_url( home_url( '/faqs/' ) ); ?>"><span>FAQ</span><span class="quick-link-arrow">&rarr;</span></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="botanical-divider"></div>

</div>

<?php get_footer(); ?>
