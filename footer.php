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
<?php wp_footer(); ?>
</body>
</html>
