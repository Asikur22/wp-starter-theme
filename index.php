<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AA_Wetech_Clipping
 */

get_header();
?>

<?php if ( ! empty( get_theme_mod( 'blog_title' ) && ! empty( get_theme_mod( 'blog_text' ) ) ) ) : ?>
	<!-- Page Header -->
	<section class="page-intro d-flex justify-content-center align-items-center card-overlay" style="background-image: url('<?php echo esc_url( get_theme_mod( 'blog_bg' ) ); ?>');">
		<div class="container">
			<div class="row text-center">
				<div class="col-12">
					<h1 class="page-title">
						<?php echo esc_html( get_theme_mod( 'blog_title' ) ); ?>
					</h1>
					<p class="page-subtitle">
						<?php echo esc_html( get_theme_mod( 'blog_text' ) ); ?>
					</p>
				</div>
			</div>
		</div>
	</section>
	<!-- / Page Header -->
<?php endif; ?>

<?php if ( is_home() && ! is_front_page() ) : ?>
	<header class="blog-header text-center py-5">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2 class="page-title theme-color"><?php single_post_title(); ?></h2>
				</div>
			</div>
		</div>
	</header>
<?php endif; ?>
	
	<section class="blog-content py-5">
		<div class="container mt-5">
			<div class="row">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="col-12 col-md-6">
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="post-thumbnail shadow-sm">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'blog-thumb', [ 'class' => 'img-fluid' ] ); ?>
									</a>
								</div>
							<?php endif; ?>
							<div class="post-inner shadow-sm">
								<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<div class="entry-content">
									<?php echo wp_trim_excerpt(); ?>
								</div><!-- .entry-content -->
								<div class="read-more">
									<a href="<?php the_permalink(); ?>">Read More <i class="fas fa-arrow-right"></i></a>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
					<?php if ( show_posts_nav() ) : ?>
						<div class="col-12 text-center">
							<?php the_posts_pagination(); ?>
						</div>
					<?php endif; ?>
				<?php else : ?>
					<div class="col-12 text-center">
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php
get_footer();
