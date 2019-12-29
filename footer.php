<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AA_Wetech_Clipping
 */
?>
</div><!-- #content -->
<<<<<<< HEAD
<?php get_template_part( 'footer-widget' ); ?>
<footer id="colophon" class="site-footer border-top">
	<div class="container pt-3 pb-3">
		<div class="site-info text-center">
			&copy; <?php echo date( 'Y' ); ?> <?php echo '<a href="' . home_url() . '">' . get_bloginfo( 'name' ) . '</a>'; ?>
			<span class="sep"> | </span>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentyseventeen' ) ); ?>" class="imprint">
				<?php printf( __( 'Proudly powered by %s', 'twentyseventeen' ), 'WordPress' ); ?>
			</a>
		
		</div><!-- close .site-info -->
	</div>
</footer><!-- #colophon -->
=======
<!-- Footer Widgets-->
<div class="footer-widgets py-6" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/bg-pattern.png');">
	<div class="container">
		<div class="row justify-content-center justify-content-lg-between">
			<?php if ( is_active_sidebar( 'footer' ) ) : ?>
				<?php dynamic_sidebar( 'footer' ); ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<!-- / Footer Widgets-->
<!-- Site Footer-->
<footer class="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<p class="copyright-text mb-0">
					<?php echo get_theme_mod( 'copyright_text',
						'&copy; All rights reserved' ); ?> | Design by Wetechclipping Team &amp; Developed By :<a href="https://greenlifeit.com/" target="_blank"> Green Life IT</a>
				</p>
			</div>
		</div>
	</div>
</footer>
>>>>>>> a8107f9eed075d6803dc28447db88aa4125fd3e0
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>