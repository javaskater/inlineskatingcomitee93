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
	<header id="masthead" class="container-fluid site-header navbar-static-top" role="banner">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" role="navigation">
                <?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
                    <a href="<?php echo esc_url( home_url( '/' )); ?>" class="navbar-brand">
                        <img src="<?php echo esc_attr(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                    </a>
                <?php else : ?>
                    <a class="site-title navbar-brand" href="<?php echo esc_url( home_url( '/' ));?>"><?php esc_url(bloginfo('name')); ?></a>
                <?php endif; ?>


                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarDropdown">
                  <?php // taken from https://github.com/SimonPadbury/b4st/blob/master/header.php
                    wp_nav_menu( array(
                      'theme_location'  => 'primary',
                      'container'       => false,
                      'menu_class'      => '',
                      'fallback_cb'     => '__return_false',
                      'items_wrap'      => '<ul id="%1$s" class="navbar-nav mr-auto mt-2 mt-lg-0 %2$s">%3$s</ul>',
                      'depth'           => 2,
                      'walker'          => new linlineskating93_navwalker()
                    ) );
                  ?>
                    <!--copy of themes/newspaper-x/searchform.php--> 
                    <form role="search" method="get" class="form-inline my-2 my-lg-0" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <input class="form-control mr-sm-2" name="s" type="search" placeholder="<?php echo esc_html__( 'Search for:', 'inlineskatingcomitee93' ) ?>" placaria-label="<?php echo esc_html__( 'Search...', 'inlineskatingcomitee93' ) ?>">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> <?php echo esc_html__( 'Search for:', 'inlineskatingcomitee93' ) ?></button>
                    </form>
                </div>
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
			<div class="row">
                <?php endif; ?>
