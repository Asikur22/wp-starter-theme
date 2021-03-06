<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<header class="search-results-header border-bottom py-5">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<h1 class="page-title theme-color font-weight-normal">
						<?php printf( esc_html__( 'Search Results for: %s', AA_THEME_SLUG ), '<span>' . get_search_query() . '</span>' ); ?>
					</h1>
				</div>
			</div>
		</div>
	</header>
	
	<section class="search-results py-5">
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
								<a href="<?php the_permalink(); ?>" class="text-color">Read More <i class="fas fa-arrow-right ml-1"></i></a>
							</div>
						</div>
					<?php endwhile; ?>
					
					<?php global $wp_query; ?>
					<?php if ( $wp_query->max_num_pages > 1 ) : ?>
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
