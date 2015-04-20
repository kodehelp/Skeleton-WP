			</div>
			<footer class="footer" id="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<div id="inner-footer" class="container wrap clearfix">
					<div class="row">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
                        <?php endif; ?>
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
                        <?php endif; ?>
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : ?>
                        <?php endif; ?>
					</div>
                    <nav class="clearfix">
                        <?php skeleton_footer_links(); // Adjust using Menus in Wordpress Admin ?>
                    </nav>

                    <p class="pull-right"><a href="http://skeletonwp.kodehelp.com" id="credit" title="">Created in New Jersey</a></p>

                    <p class="attribution">&copy; <?php bloginfo('name'); ?></p>
				</div>

			</footer>

		<?php // all js scripts are loaded in library/skeleton.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
