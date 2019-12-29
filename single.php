<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AA_Wetech_Clipping
 */

get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="col-12 my-5">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="post-thumbnail">
							<?php the_post_thumbnail( 'post-thumbnail', [ 'class' => 'img-fluid' ] ); ?>
						</div>
					<?php endif; ?>
					<h1 class="entry-title my-3"><?php the_title(); ?></h1>
					<?php if ( 'post' === get_post_type() ) : ?>
						<div class="entry-meta my-2">
							<?php wp_bootstrap_starter_posted_on(); ?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				<?php endwhile; ?>
			</div>
		</div>
	</div>
<?php
get_footer();
