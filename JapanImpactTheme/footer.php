	<footer class="footer">
			<div class="socialMediaButton">
			<?php
				// Use For social media button
				echo do_shortcode( '[DISPLAY_ULTIMATE_SOCIAL_ICONS]' );
			?>
			</div>
	</footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
	<!-- custom script ( LOL ) -->
	<script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
	<?php wp_footer(); ?>
  </body>
</html>
