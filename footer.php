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
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
    <?php get_template_part( 'footer-widget' ); ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container-fluid p-3 p-md-5">
            <div class="row site-info">
                <div class="col-md-12">
                <p>&copy; <?php echo date('Y'); ?> <?php echo '<a href="'.home_url().'" title="Comité de Roller de Seine Saint Denis" alt="Comité de Roller de Seine Saint Denis" data-toggle="tooltip"
            data-placement="top">'.get_bloginfo('name').'</a>'; ?>
				<span class="sep"> | </span>
                <a class="credits" href="https://github.com/javaskater/inlineskatingcomitee93" target="_blank" title="GitHub Sources of the Theme" alt="GitHub Sources of the Theme" data-toggle="tooltip"
            data-placement="top"><i
                class="fa fa-github-square" aria-hidden="true"></i></a>
                <span class="sep"> | </span>
                <a class="credits" href="http://jpmena.eu" target="_blank" title="Webmaster's portal" alt="Jean-Pierre MENA (Webmaster)" data-toggle="tooltip"
            data-placement="top"><?php echo esc_html__('jpmena.eu','inlineskatingcomitee93'); ?></a></p>
                </div> <!-- .col-md12 -->
            </div><!-- close .row .site-info -->
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
