<?php
/**
 * Popup - Free Class (Feather Jones)
 *
 * Static multi-step popup: CTA -> Email capture -> Success.
 * Included via footer.php. Styles in _mockups.scss, JS in main.js.
 */
?>

<div class="popup-overlay offer offer-a" id="fjPopup">
  <div class="popup-card">
    <div class="popup-drag-handle"></div>

    <button class="popup-close" aria-label="Close popup">
      <svg viewBox="0 0 24 24" fill="none">
        <line x1="6" y1="6" x2="18" y2="18"></line>
        <line x1="18" y1="6" x2="6" y2="18"></line>
      </svg>
    </button>

    <div class="popup-content">
      <div class="popup-step active" id="fjStep1">
        <div class="popup-eyebrow">Free Course (earth ceremony)</div>
        <h2 class="popup-heading">New to Herbs?<br>Start Here - No Cost.</h2>

        <p class="popup-description">
          Get instant access to <em>Natural Pest Control with Plants</em> - a short, practical course on using herbs and essential oils to repel common pests, naturally. It's 25-35 minutes and you can use what you learn right away.
        </p>

        <div class="popup-social-proof">
          <div class="stars">
            <svg viewBox="0 0 20 20"><polygon points="10,1 12.6,7 19,7.6 14,12 15.6,19 10,15.4 4.4,19 6,12 1,7.6 7.4,7"></polygon></svg>
            <svg viewBox="0 0 20 20"><polygon points="10,1 12.6,7 19,7.6 14,12 15.6,19 10,15.4 4.4,19 6,12 1,7.6 7.4,7"></polygon></svg>
            <svg viewBox="0 0 20 20"><polygon points="10,1 12.6,7 19,7.6 14,12 15.6,19 10,15.4 4.4,19 6,12 1,7.6 7.4,7"></polygon></svg>
            <svg viewBox="0 0 20 20"><polygon points="10,1 12.6,7 19,7.6 14,12 15.6,19 10,15.4 4.4,19 6,12 1,7.6 7.4,7"></polygon></svg>
            <svg viewBox="0 0 20 20"><polygon points="10,1 12.6,7 19,7.6 14,12 15.6,19 10,15.4 4.4,19 6,12 1,7.6 7.4,7"></polygon></svg>
          </div>
          <span class="proof-text">Trusted by thousands of students over 20+ years</span>
        </div>

        <button class="popup-step1-cta" id="fjCtaBtn">
          Yes, Send Me the Free Course
        </button>

        <button class="popup-step1-skip" id="fjSkipBtn">
          No thanks, I'm not interested
        </button>
      </div>

      <div class="popup-step" id="fjStep2">
        <div class="popup-eyebrow">Almost There</div>
        <h2 class="step2-heading">Where Should We Send It?</h2>
        <p class="step2-subtext">Enter your email and we'll send your free course link right away.</p>

        <p class="popup-error" id="fjError"></p>

        <?php echo do_shortcode( '[forminator_form id="2338"]' ); ?>

        <p class="popup-disclaimer">
          You'll also receive herbal insights and program updates. Unsubscribe any time.
        </p>
      </div>

      <div class="popup-step" id="fjStep3">
        <div class="popup-success show">
          <div class="check-circle">
            <svg viewBox="0 0 24 24"><polyline points="6 12 10 16 18 8"></polyline></svg>
          </div>
          <h3>Check Your Inbox!</h3>
          <p>We've sent your free course link to your email.<br>Look for a message from Feather Jones.</p>
        </div>
      </div>
    </div>
  </div>
</div>
