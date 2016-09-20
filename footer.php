			<!-- footer -->
			<footer class="footer" role="contentinfo">

				<!-- copyright -->
				<p class="copyright">
					&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>.
					<nav><?php 
						$args = array(
							'menu' => "footer"
							);
						wp_nav_menu($args);?>
					</nav>
				</p>
				<!-- /copyright -->

			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->		<?php wp_footer(); ?>

	</body>
</html>
