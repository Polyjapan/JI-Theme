    <div id="footer" class="footer">
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
