<?php
?>
</main>
<footer class="footer">
  <div class="footer-wrapper mx-auto max-w-[1080px] space-y-10">

    <div class="footer-top">

      <div class="footer-brand">
        <?php get_template_part('partials/logo') ?>
        <p class="footer-desc">
          Retreats for clarity, steadiness, and grounded care.
          A calm path back to what is already present. 
        </p>
      </div>

      <nav class="footer-nav">
        <?php 
          wp_nav_menu(array(
            'theme_location'=> 'footer',
            'container'=> false,
            'menu_class'=> 'footer-nav-list flex flex-wrap justify-center gap-6',
            'fallback_cb'=> '__return_false',
          ));
        ?>
      </nav>

    </div>

    <div class="footer-links grid grid-cols-1 gap-12"><!-- grid grid-cols-2 gap-12 hidden sm:grid -->

      <div class="text-center" style="display:none;">
        <h3 class="mb-4">Site Links</h3>
        <a class="footer-link" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Blog</a>
        <a class="footer-link" href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">FAQs</a>
      </div>

      <div class="text-center space-y-4">
        <h3>Contat Us</h3>
        <div>
          <div class="footer-meta-label">Phone:</div>
          <a class="footer-link" href="tel:9284755551">928-475-5551</a>
        </div>
        <div>
          <div class="footer-meta-label">Contact Form:</div>
          <a class="footer-link" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Leave A Message</a>
        </div>
      </div>
    </div>


    <div class="footer-disclosure">

      <p>Lumina provides guided retreats and educational experiences designed to support personal reflection, emotional awareness, and spiritual exploration. Our facilitators offer guidance, practices, and frameworks that many people have found supportive in their healing and growth journeys. These approaches are not rigid systems or guaranteed outcomes, and each person’s experience will be unique.</p>

      <p>Lumina and its facilitators do not provide medical, psychological, or psychiatric diagnosis or treatment, and our services are not a substitute for professional healthcare. Nothing offered through this retreat should be interpreted as medical or mental health advice.</p>

      <p>If you are experiencing a medical or mental health condition, or if you require immediate support, please seek care from a licensed healthcare professional or qualified mental health provider.</p>

      <p>Participation in any retreat or program is voluntary and undertaken with personal responsibility. We encourage all guests to approach this work with honesty about their physical and mental health and to consult qualified professionals when appropriate.</p>

    </div>


    <div class="footer-bottom flex items-center justify-center gap-3">
      <span>© 2026 Lumina, Inc. All rights reserved.</span>
      <span class="opacity-50">|</span>
      <a class="footer-link" href="<?php echo esc_url( home_url( '/terms' ) ); ?>">Terms</a>
      <span class="opacity-50">|</span>
      <a class="footer-link" href="<?php echo esc_url( home_url( '/privacy' ) ); ?>">Privacy</a>
    </div>

  </div>
</footer>
<button id="scrollBtn">
  <i class="fas fa-angle-up"></i>
</button>
<?php wp_footer(); ?>
</body>
</html>
