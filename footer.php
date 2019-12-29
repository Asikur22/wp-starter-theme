<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */
?>
</div><!-- #content -->
<?php get_template_part( 'footer-widget' ); ?>
<footer id="colophon" class="site-footer border-top">
    <div class="container py-3">
        <div class="site-info text-center">
            &copy; <?php echo date( 'Y' ); ?> <?php echo '<a href="' . home_url() . '">' . get_bloginfo( 'name' ) . '</a>'; ?>
            <span class="sep"> | </span>
            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentyseventeen' ) ); ?>" class="imprint">
                <?php printf( __( 'Proudly powered by %s', 'twentyseventeen' ), 'WordPress' ); ?>
            </a>

        </div><!-- close .site-info -->
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>