<?php
?>
</main>

<footer class="site-footer">
  <div class="footer-inner">
    <div class="footer-brand">
      <div class="footer-brand-name">Feather Jones</div>
      <div class="footer-brand-tag">Herbalist</div>
    </div>
    <nav class="footer-nav" aria-label="Footer navigation">
      <a href="/contact">Contact</a>
      <?php /* <a href="/faqs">FAQs</a> */ ?>
      <a href="/blog">Blog</a>
      <a href="/about">About</a>
    </nav>
    <div class="footer-social">
      <a href="https://instagram.com/" aria-label="Follow on Instagram" target="_blank" rel="noopener">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.17.054 1.97.24 2.43.403a4.088 4.088 0 011.47.957c.453.453.757.91.957 1.47.163.46.35 1.26.403 2.43.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.054 1.17-.24 1.97-.403 2.43a4.088 4.088 0 01-.957 1.47 4.088 4.088 0 01-1.47.957c-.46.163-1.26.35-2.43.403-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.17-.054-1.97-.24-2.43-.403a4.088 4.088 0 01-1.47-.957 4.088 4.088 0 01-.957-1.47c-.163-.46-.35-1.26-.403-2.43C2.175 15.584 2.163 15.204 2.163 12s.012-3.584.07-4.85c.054-1.17.24-1.97.403-2.43a4.088 4.088 0 01.957-1.47A4.088 4.088 0 015.063 2.3c.46-.163 1.26-.35 2.43-.403C8.759 1.84 9.139 1.827 12 1.827L12 2.163zM12 0C8.741 0 8.333.014 7.053.072 5.775.131 4.902.333 4.14.63a5.882 5.882 0 00-2.126 1.384A5.882 5.882 0 00.63 4.14C.333 4.902.131 5.775.072 7.053.014 8.333 0 8.741 0 12s.014 3.667.072 4.947c.059 1.278.261 2.15.558 2.913a5.882 5.882 0 001.384 2.126 5.882 5.882 0 002.126 1.384c.763.297 1.636.499 2.913.558C8.333 23.986 8.741 24 12 24s3.667-.014 4.947-.072c1.278-.059 2.15-.261 2.913-.558a5.882 5.882 0 002.126-1.384 5.882 5.882 0 001.384-2.126c.297-.763.499-1.636.558-2.913.058-1.28.072-1.688.072-4.947s-.014-3.667-.072-4.947c-.059-1.278-.261-2.15-.558-2.913a5.882 5.882 0 00-1.384-2.126A5.882 5.882 0 0019.86.63C19.097.333 18.225.131 16.947.072 15.667.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 11-2.88 0 1.44 1.44 0 012.88 0z"/>
        </svg>
      </a>
    </div>
    <div class="footer-divider"></div>
  </div>
  <div class="footer-disclosure">
    <div class="footer-disclosure-inner">
      <p>Feather Jones provides educational courses and resources focused on herbal traditions, plant knowledge, and practical preparation skills such as teas, tinctures, and topical applications. The information shared is intended for learning and personal growth, and individual results may vary.</p>
      <p>Feather Jones does not provide medical diagnosis or treatment. Content on this site and within courses is not a substitute for professional medical advice, diagnosis, or care from a licensed healthcare provider.</p>
      <p>If you are pregnant, nursing, taking medications, or managing a medical condition, consult a qualified healthcare professional before using herbal products or protocols.</p>
    </div>
  </div>
  <div class="footer-divider-full"></div>
  <div class="footer-bottom">
    <div class="footer-bottom-inner">
      <span class="footer-copy">&copy; 2026 Feather Jones. All rights reserved.</span>
      <div class="footer-legal">
        <a href="/terms">Terms</a>
        <a href="/refunds">Refund Policy</a>
        <a href="/privacy-policy">Privacy</a>
      </div>
    </div>
  </div>
</footer>
<button id="scrollBtn">
  <i class="fas fa-angle-up"></i>
</button>
<?php
$popup_excluded_slugs = array( 'contact', 'faqs', 'profile', 'terms', 'refunds' );
$is_woocommerce_page = function_exists( 'is_woocommerce' ) && is_woocommerce();
$is_cart = function_exists( 'is_cart' ) && is_cart();
$is_checkout = function_exists( 'is_checkout' ) && is_checkout();
$is_account = function_exists( 'is_account_page' ) && is_account_page();
$is_shop = function_exists( 'is_shop' ) && is_shop();
$is_privacy_policy = function_exists( 'is_privacy_policy' ) && is_privacy_policy();
$is_excluded_slug = is_page( $popup_excluded_slugs );
$show_popup = ! ( $is_woocommerce_page || $is_cart || $is_checkout || $is_account || $is_shop || $is_privacy_policy || $is_excluded_slug );

if ( $show_popup ) {
  //get_template_part( 'partials/popup-free-class' );
}
?>
<?php wp_footer(); ?>
</body>
</html>
