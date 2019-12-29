<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AA_Wetech_Clipping
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title theme-color"><?php esc_html_e( 'Nothing Found', AA_THEME_SLUG ); ?></h1>
	</header><!-- .page-header -->
	
	<div class="page-content">
		<p>
			<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
				<?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s" class="text-color">Get started here</a>.', AA_THEME_SLUG ),
					array( 'a' => array( 'href' => array(), 'class' => array() ) ) ),
					esc_url( admin_url( 'post-new.php' ) ) ); ?>
			<?php elseif ( is_search() ) : ?>
				<?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', AA_THEME_SLUG ); ?>
			<?php else : ?>
				<?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', AA_THEME_SLUG ); ?>
			<?php endif; ?>
		</p>
	</div><!-- .page-content -->
</section><!-- .no-results -->
