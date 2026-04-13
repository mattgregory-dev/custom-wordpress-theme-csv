<?php
?>
</main>
<footer class="footer">
  <div class="footer-wrapper mx-auto max-w-[1080px] space-y-10">

    <div class="footer-disclosure">
      <p>
        Feather Jones provides educational courses and resources focused on herbal traditions, plant knowledge, and
        practical preparation skills such as teas, tinctures, and topical applications. The information shared is
        intended for learning and personal growth, and individual results may vary.
      </p>
      <p>
        Feather Jones does not provide medical diagnosis or treatment. Content on this site and within courses is not
        a substitute for professional medical advice, diagnosis, or care from a licensed healthcare provider.
      </p>
      <p>
        If you are pregnant, nursing, taking medications, or managing a medical condition, consult a qualified
        healthcare professional before using herbal products or protocols.
      </p>
      <p>
        Participation in any course or program is voluntary and undertaken with personal responsibility. We encourage
        all students to make informed decisions and seek professional guidance when appropriate.
      </p>
    </div>

    <div class="footer-bottom">
      <span class="footer-bottom__copyright">&copy; 2026 Feather Jones. All rights reserved.</span>
      <div class="footer-bottom__links">
        <span class="footer-bottom__separator footer-bottom__separator--desktop" aria-hidden="true">|</span>
        <a class="footer-link" href="<?php echo esc_url( home_url( '/terms' ) ); ?>">Terms</a>
        <span class="footer-bottom__separator" aria-hidden="true">|</span>
        <a class="footer-link" href="<?php echo esc_url( home_url( '/privacy' ) ); ?>">Privacy</a>
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
  get_template_part( 'partials/popup-free-class' );
}
?>
<?php wp_footer(); ?>
</body>
</html>
