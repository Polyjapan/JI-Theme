    <div id="footer">
      <div class="socialMediaButton">
        <?php
        // Use For social media button
        echo do_shortcode( '[DISPLAY_ULTIMATE_PLUS]' );
        ?>
      </div>
      <div class="languages">
        <ul><?php  pll_the_languages(array('show_flags'=>1,'show_names'=>0));   ?></ul>
      </div>
    </div>
    <?php
        /*
         * * Always have wp_footer() just before the closing </body>
         * tag of your theme, or you will break many plugins, which
         * generally use this hook to reference JavaScript files.
         * */
        wp_footer();
    ?>
  </body>
</html>
