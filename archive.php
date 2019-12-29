<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AA_Wetech_Clipping
 */

get_header(); ?>
	<header class="archive-header text-center border-bottom py-5">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php
					the_archive_title( '<h1 class="page-title theme-color font-weight-normal">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</div>
			</div>
		</div>
	</header><!-- .page-header -->
	<section class="archive-content py-5">
		<div class="container">
			<div class="row mt-4">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="col-12 mb-4">
							<h3 class="entry-title text-color"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div class="entry-content">
								<?php echo wp_trim_excerpt(); ?>
							</div><!-- .entry-content -->
							<div class="read-more">
								<a href="<?php the_permalink(); ?>" class="text-color">Read More <i class="fas fa-arrow-right"></i></a>
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
