<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
			</main>
		</div>
	</div>
	<div class="wpos-footer-wrap">
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info">
				<div class="powered-by">
					<?php	echo twenty_twenty_one_footer_copyright(); ?>		
				</div>
				<div class="site-name">
					<?php if ( has_nav_menu( 'footer' ) ) : ?>
						<nav aria-label="<?php esc_attr_e( 'Secondary menu', 'twentytwentyone' ); ?>" class="footer-navigation">
							<ul class="footer-navigation-wrapper">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'footer',
										'items_wrap'     => '%3$s',
										'container'      => false,
										'depth'          => 1,
										'link_before'    => '<span>',
										'link_after'     => '</span>',
										'fallback_cb'    => false,
									)
								);
								?>
							</ul>
						</nav>
			<?php endif; ?>
				</div>
			</div>
		</footer>
	</div>
</div>
<?php wp_footer(); ?>
<script type="text/javascript">
	
	jQuery(document).ready(function($) {
		  $(window).scroll(function() {
		    if ($(document).scrollTop() > 80) {
		      $("#wpos-header-sticky").addClass("sticky");
		    } else {
		      $("#wpos-header-sticky").removeClass("sticky");
		    }
		  });
		});
</script>
</body>
</html>
