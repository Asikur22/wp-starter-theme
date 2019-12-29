<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package AA_Wetech_Clipping
 */

get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="col-12 my-5">
				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title theme-color"><?php echo esc_html( 'Oops! That page can&rsquo;t be found.', AA_THEME_SLUG ); ?></h1>
					</header><!-- .page-header -->
					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', AA_THEME_SLUG ); ?></p>
					</div><!-- .page-content -->
				</section><!-- .error-404 -->
			</div>
		</div>
	</div>
<?php
get_footer();
