<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	<header id="masthead" class="site-header navbar-static-top" role="banner">
        <nav class="container-fluid navbar navbar-expand-lg navbar-light bg-lcd93" role="navigation">
                <?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
                    <a href="<?php echo esc_url( home_url( '/' )); ?>" class="navbar-brand">
                        <img src="<?php echo esc_attr(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                    </a>
                <?php else : ?>
                    <a class="site-title navbar-brand" href="<?php echo esc_url( home_url( '/' ));?>"><?php esc_url(bloginfo('name')); ?></a>
                <?php endif; ?>


                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarDropdown"
                        aria-controls="navbarDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                  <?php // copy from https://github.com/jprieton/wp-bootstrap4-navwalker
                        $form_html = "<form role=\"search\" method=\"get\" class=\"form-inline my-2 my-lg-0\" action=\"".esc_url( home_url( '/' ) )."\">";
                        $form_html .=  "<input class=\"form-control mr-sm-2\" name=\"s\" type=\"search\" placeholder=\"".esc_html__( 'Search...', 'inlineskatingcomitee93' )."\" placaria-label=\"".esc_html__( 'Search...', 'inlineskatingcomitee93' )."\">";
                        $form_html .=  "<button class=\"btn btn-outline-info my-2 my-sm-0\" type=\"submit\">".esc_html__( 'Search', 'inlineskatingcomitee93' )."</button>";
                        $form_html .= "</form>";
                        wp_nav_menu( array(
                            'menu'              => 'primary',
                            'theme_location'    => 'primary',
                            'depth'             => 2,
                            'container'         => 'div',
                            'container_class'   => 'collapse navbar-collapse',
                            'container_id'      => 'navbarDropdown',
                            'menu_class'        => 'navbar-nav mr-auto',
                            'fallback_cb'       => 'WP_Bootstrap_Navwalker_GitHub::fallback',
                            // https://wordpress.stackexchange.com/questions/19245/any-docs-for-wp-nav-menus-items-wrap-argument/19247
                            'items_wrap'        => '<div id="%1$s" class="%2$s">%3$s</div>'.$form_html,
                            'walker'            => new WP_Bootstrap_Navwalker_GitHub()
                            )
                        );
                  ?>
            </nav>
	</header><!-- #masthead -->
    <?php if(is_front_page() && !get_theme_mod( 'header_banner_visibility' )): ?>
        <div id="page-sub-header" <?php if(has_header_image()) { ?>style="background-image: url('<?php header_image(); ?>');" <?php } ?>>
            <div class="container">
                <h1>
                    <?php
                    if(get_theme_mod( 'header_banner_title_setting' )){
                        echo get_theme_mod( 'header_banner_title_setting' );
                    }else{
                        echo 'Wordpress + Bootstrap';
                    }
                    ?>
                </h1>
                <h2>
                    <?php
                    if(get_theme_mod( 'header_banner_tagline_setting' )){
                        echo get_theme_mod( 'header_banner_tagline_setting' );
                }else{
                        echo esc_html__('To customize the contents of this header banner and other elements of your site, go to Dashboard > Appearance > Customize','wp-bootstrap-starter');
                    }
                    ?>
                </h2>
                <a href="#content" class="page-scroller"><i class="fa fa-fw fa-angle-down"></i></a>
            </div>
        </div>
    <?php endif; ?>
	<div id="content" class="site-content">
		<div class="container">
			<nav aria-label="breadcrumb">
            	<?php inlineskatingcomitee93_breadcrumb() ?>
            </nav>
			<div class="row">
                <?php endif; ?>
