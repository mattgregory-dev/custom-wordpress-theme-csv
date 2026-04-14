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
      <h1>We&rsquo;d Love to Hear From&nbsp;You</h1>
      <p>Have a question about a course, retreat, or the process? Not sure where to start? Reach out and we&rsquo;ll point you in the right direction.</p>
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






          <div class="form-row two-col">
            <div class="form-group">
              <label>First Name <span class="required">*</span></label>
              <input type="text" placeholder="Jane">
            </div>
            <div class="form-group">
              <label>Last Name <span class="required">*</span></label>
              <input type="text" placeholder="Doe">
            </div>
          </div>

          <div class="form-row two-col">
            <div class="form-group">
              <label>Email <span class="required">*</span></label>
              <input type="email" placeholder="jane@email.com">
            </div>
            <div class="form-group">
              <label>Phone Number</label>
              <input type="tel" placeholder="(555) 123-4567">
            </div>
          </div>

          <div class="form-row two-col">
            <div class="form-group">
              <label>City</label>
              <input type="text" placeholder="Sedona">
            </div>
            <div class="form-group">
              <label>State</label>
              <select>
                <option value="" disabled selected>Select state</option>
                <option>Alabama</option><option>Alaska</option><option>Arizona</option>
                <option>Arkansas</option><option>California</option><option>Colorado</option>
                <option>Connecticut</option><option>Delaware</option><option>Florida</option>
                <option>Georgia</option><option>Hawaii</option><option>Idaho</option>
                <option>Illinois</option><option>Indiana</option><option>Iowa</option>
                <option>Kansas</option><option>Kentucky</option><option>Louisiana</option>
                <option>Maine</option><option>Maryland</option><option>Massachusetts</option>
                <option>Michigan</option><option>Minnesota</option><option>Mississippi</option>
                <option>Missouri</option><option>Montana</option><option>Nebraska</option>
                <option>Nevada</option><option>New Hampshire</option><option>New Jersey</option>
                <option>New Mexico</option><option>New York</option><option>North Carolina</option>
                <option>North Dakota</option><option>Ohio</option><option>Oklahoma</option>
                <option>Oregon</option><option>Pennsylvania</option><option>Rhode Island</option>
                <option>South Carolina</option><option>South Dakota</option><option>Tennessee</option>
                <option>Texas</option><option>Utah</option><option>Vermont</option>
                <option>Virginia</option><option>Washington</option><option>West Virginia</option>
                <option>Wisconsin</option><option>Wyoming</option>
              </select>
            </div>
          </div>

          <div class="radio-group">
            <span class="radio-label">Would you like us to call?</span>
            <div class="radio-options">
              <label class="radio-option">
                <input type="radio" name="call" value="yes">
                <span class="radio-dot"></span>
                Yes, please
              </label>
              <label class="radio-option">
                <input type="radio" name="call" value="no">
                <span class="radio-dot"></span>
                No thanks
              </label>
            </div>
          </div>

          <div class="checkbox-group">
            <span class="checkbox-label">How did you learn of Feather Jones?</span>
            <div class="checkbox-options">
              <label class="checkbox-option">
                <input type="checkbox">
                <span class="checkbox-box"><svg viewBox="0 0 12 10" fill="none"><path d="M1 5L4.5 8.5L11 1.5" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                Internet Search
              </label>
              <label class="checkbox-option">
                <input type="checkbox">
                <span class="checkbox-box"><svg viewBox="0 0 12 10" fill="none"><path d="M1 5L4.5 8.5L11 1.5" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                Referral (from a past attendee)
              </label>
              <label class="checkbox-option">
                <input type="checkbox">
                <span class="checkbox-box"><svg viewBox="0 0 12 10" fill="none"><path d="M1 5L4.5 8.5L11 1.5" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                Spotify Podcast
              </label>
              <label class="checkbox-option">
                <input type="checkbox">
                <span class="checkbox-box"><svg viewBox="0 0 12 10" fill="none"><path d="M1 5L4.5 8.5L11 1.5" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                Other
              </label>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label>Comments <span class="required">*</span></label>
              <textarea placeholder="Tell us what you're looking for or any questions you have&hellip;"></textarea>
            </div>
          </div>

          <div class="form-submit-row">
            <button class="btn btn-primary" type="button">Send Message</button>
          </div>
        </div>

        <!-- RIGHT: SIDEBAR -->
        <div class="sidebar">
          <div class="info-card reveal" style="transition-delay:.08s">
            <div class="info-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            </div>
            <h3>Contact Details</h3>
            <div style="margin-top:14px">
              <div class="info-detail">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                <span><a href="tel:9284755551">928-475-5551</a></span>
              </div>
              <div class="info-detail">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                <span>Sedona, Arizona</span>
              </div>
            </div>
          </div>

          <div class="response-card reveal" style="transition-delay:.16s">
            <h3>Response Time</h3>
            <p>We typically respond within 2&ndash;3 business days. If your question is time-sensitive, give us a call.</p>
          </div>

          <div class="helpful-card reveal" style="transition-delay:.24s">
            <h3>Helpful to Include</h3>
            <ul>
              <li>Which program or course you&rsquo;re interested in</li>
              <li>Your experience level with herbalism</li>
              <li>Any scheduling questions or constraints</li>
              <li>Whether you&rsquo;re interested in online or in-person</li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </section>

  <div class="botanical-divider"></div>

  <?php /*
  <!-- ===== NOT SURE SECTION ===== -->
  <section class="notsure-section">
    <div class="container reveal">
      <div class="eyebrow">Not Sure Where to Begin?</div>
      <h2>We&rsquo;ll Help You Figure It&nbsp;Out</h2>
      <p>Not everyone comes in knowing what they need. That&rsquo;s fine. Reach out and we&rsquo;ll help you find the right fit based on your goals, your schedule, and where you are right now.</p>
      <a href="#" class="btn btn-secondary">Explore All Programs</a>
    </div>
  </section>

  <div class="botanical-divider"></div>
  */ ?>

</div>

<?php get_footer(); ?>
