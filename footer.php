			<!-- footer -->
			<footer class="footer" role="contentinfo">

				<!-- copyright -->
				<p class="copyright">
					&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>.
					<nav class="show"><?php 
						$args = array(
							'menu' => "footer"
							);
						wp_nav_menu($args);?>
					</nav>
					<nav class="hide">
					<?php 
						$args = array(
							'menu' => "footer-mobile"
							);
						wp_nav_menu($args);?>
					</nav>
				</p>
				<!-- /copyright -->

			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->		
		<script src="<?php echo get_template_directory_uri();?>/lightbox2-master/dist/js/lightbox.js"></script>
		<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-85007138-1', 'auto');
  ga('send', 'pageview');

</script>
		<?php wp_footer(); ?>

	</body>
</html>
