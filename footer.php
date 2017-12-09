    <div id="footer" class="footer">
        <div class="row hidden-sm-down footer-menu">
            <!-- Don't show the large footer menu to mobile users -->
            <?php get_template_part('inc/footer-navigation');?>
        </div>

        <hr/>

        <div class="row">
            <div class="col-md-3">
                <p>&copy; PolyJapan 2017</p>
            </div>
            <div class="col-md-6">
            </div>
            <div class="col-md-3">
                <div class="languages">
                    <ul><?php  pll_the_languages(array('show_flags'=>1,'show_names'=>0));   ?></ul>
                </div>
            </div>
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
