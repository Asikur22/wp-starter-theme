<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AA_Wetech_Clipping
 */

get_header(); ?>

<<<<<<< HEAD
	<section id="primary" class="content-area col-sm-12 col-lg-8">

		<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'page' );
		endwhile; // End of the loop.
		?>

	</section><!-- #primary -->
=======
<?php while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( \Elementor\Plugin::$instance->db->is_built_with_elementor( get_the_ID() ) ) : ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div><!-- .entry-content -->
		<?php else : ?>
			<div class="container">
				<div class="row my-5">
					<div class="col-12">
						<?php
						$page_data = get_post_meta( get_the_ID(), '_elementor_page_settings', true );
						if ( ! isset( $page_data['hide_title'] ) ) :
							?>
							<header class="entry-header">
								<h1 class="entry-title mb-3"><?php the_title(); ?></h1>
							</header><!-- .entry-header -->
						<?php endif; ?>
					</div>
					<div class="col-12">
						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- .entry-content -->
					</div>
				</div>
			</div>
		<?php endif; ?>
	</article><!-- #post-## -->
<?php endwhile; ?>
>>>>>>> a8107f9eed075d6803dc28447db88aa4125fd3e0

<?php
get_footer();
