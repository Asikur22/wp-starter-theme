<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AA_Wetech_Clipping
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
<<<<<<< HEAD
	<header id="masthead" class="site-header navbar-static-top">
		<div class="container">
			<nav class="navbar navbar-expand-xl p-0">
				<div class="navbar-brand">
					<?php if ( has_custom_logo() ): ?>
						<?php the_custom_logo(); ?>
					<?php else : ?>
						<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php echo esc_url( get_bloginfo( 'name' ) ); ?>
						</a>
					<?php endif; ?>
				</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
					<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img" focusable="false"><title>Menu</title>
						<path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
					</svg>
				</button>
				<?php
				wp_nav_menu( array(
					'theme_location'  => 'primary',
					'container'       => 'div',
					'container_id'    => 'main-nav',
					'container_class' => 'collapse navbar-collapse justify-content-end',
					'menu_id'         => false,
					'menu_class'      => 'navbar-nav',
					'depth'           => 3,
					'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
					'walker'          => new wp_bootstrap_navwalker()
				) );
				?>
			</nav>
		</div>
	</header><!-- #masthead -->
=======
	<header class="header-area">
		<div class="container">
			<div class="row">
				<div class="col-3">
					<div class="main-logo">
						<?php if ( has_custom_logo() ) : ?>
							<?php the_custom_logo(); ?>
						<?php else : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-9">
					<button class="navbar-toggler slicknav_btn">
						<i class="fas fa-bars" aria-hidden="true"></i>
					</button>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'depth'          => 3,
						'container'      => false,
						'menu_class'     => 'primary-menu',
					) );
					?>
				</div>
				<div class="col-12">
					<div class="mobile_menu"></div>
				</div>
			</div>
		</div>
	</header>
	<!-- / Header-->
>>>>>>> a8107f9eed075d6803dc28447db88aa4125fd3e0
	<div id="content" class="site-content">