<?php
/**
 * InLineSkatingcomitee functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Inlineskatingcomitee93
 */

if ( ! function_exists( 'inlineskatingcomitee93_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function inlineskatingcomitee93_theme_setup() {
    load_theme_textdomain( 'inlineskatingcomitee93', get_template_directory() . '/languages' );
    
    $locale = get_locale();
    $locale_file = get_template_directory() . "/languages/$locale.php";
    
    if ( is_readable( $locale_file ) ) {
        require_once( $locale_file );
    }
}

function inlineskatingcomitee93_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on WP Bootstrap Starter, use a find and replace
	 * to change 'inlineskatingcomitee93' to the name of your theme in all the template files.
	 */
    inlineskatingcomitee93_theme_setup();

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'inlineskatingcomitee93' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'inlineskatingcomitee93_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

    function inlineskatingcomitee93_add_editor_styles() {
        add_editor_style( 'custom-editor-style.css' );
    }
    add_action( 'admin_init', 'inlineskatingcomitee93_add_editor_styles' );

}
endif;
add_action( 'after_setup_theme', 'inlineskatingcomitee93_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function inlineskatingcomitee93_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'inlineskatingcomitee93_content_width', 1170 );
}
add_action( 'after_setup_theme', 'inlineskatingcomitee93_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function inlineskatingcomitee93_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'inlineskatingcomitee93' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'inlineskatingcomitee93' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'inlineskatingcomitee93' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'inlineskatingcomitee93' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'inlineskatingcomitee93' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'inlineskatingcomitee93' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'inlineskatingcomitee93' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here.', 'inlineskatingcomitee93' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'inlineskatingcomitee93_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function inlineskatingcomitee93_scripts() {
	// load bootstrap css
	//wp_enqueue_style( 'inlineskatingcomitee93-bootstrap-css', get_template_directory_uri() . '/inc/assets/css/bootstrap.min.css' );
	// load bootstrap css
	wp_enqueue_style( 'inlineskatingcomitee93-font-awesome', get_stylesheet_directory_uri() . '/node_modules/font-awesome/css/font-awesome.min.css', false, '4.1.0' );
	// load AItheme styles
	// load WP Bootstrap Starter styles
	//wp_enqueue_style( 'inlineskatingcomitee93', get_stylesheet_uri() );
    if(get_theme_mod( 'preset_style_setting' ) === 'poppins-lora') {
        wp_enqueue_style( 'inlineskatingcomitee93-poppins-lora-font', '//fonts.googleapis.com/css?family=Lora:400,400i,700,700i|Poppins:300,400,500,600,700' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'montserrat-merriweather') {
        wp_enqueue_style( 'inlineskatingcomitee93-montserrat-merriweather-font', '//fonts.googleapis.com/css?family=Merriweather:300,400,400i,700,900|Montserrat:300,400,400i,500,700,800' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'poppins-poppins') {
        wp_enqueue_style( 'inlineskatingcomitee93-poppins-font', '//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'roboto-roboto') {
        wp_enqueue_style( 'inlineskatingcomitee93-roboto-font', '//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'arbutusslab-opensans') {
        wp_enqueue_style( 'inlineskatingcomitee93-arbutusslab-opensans-font', '//fonts.googleapis.com/css?family=Arbutus+Slab|Open+Sans:300,300i,400,400i,600,600i,700,800' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'oswald-muli') {
        wp_enqueue_style( 'inlineskatingcomitee93-oswald-muli-font', '//fonts.googleapis.com/css?family=Muli:300,400,600,700,800|Oswald:300,400,500,600,700' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'montserrat-opensans') {
        wp_enqueue_style( 'inlineskatingcomitee93-montserrat-opensans-font', '//fonts.googleapis.com/css?family=Montserrat|Open+Sans:300,300i,400,400i,600,600i,700,800' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'robotoslab-roboto') {
        wp_enqueue_style( 'inlineskatingcomitee93-robotoslab-roboto', '//fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700|Roboto:300,300i,400,400i,500,700,700i' );
    }
    /*if(get_theme_mod( 'preset_style_setting' ) && get_theme_mod( 'preset_style_setting' ) !== 'default') {
        wp_enqueue_style( 'inlineskatingcomitee93-'.get_theme_mod( 'preset_style_setting' ), get_template_directory_uri() . '/inc/assets/css/presets/typography/'.get_theme_mod( 'preset_style_setting' ).'.css', false, '' );
    }*/
    //Color Scheme
    /*if(get_theme_mod( 'preset_color_scheme_setting' ) && get_theme_mod( 'preset_color_scheme_setting' ) !== 'default') {
        wp_enqueue_style( 'inlineskatingcomitee93-'.get_theme_mod( 'preset_color_scheme_setting' ), get_template_directory_uri() . '/inc/assets/css/presets/color-scheme/'.get_theme_mod( 'preset_color_scheme_setting' ).'.css', false, '' );
    }else {
        wp_enqueue_style( 'inlineskatingcomitee93-default', get_template_directory_uri() . '/inc/assets/css/presets/color-scheme/blue.css', false, '' );
    }*/

	//wp_enqueue_script('jquery');

    // Internet Explorer HTML5 support
    wp_enqueue_script( 'html5hiv',get_stylesheet_directory_uri().'/inc/assets/js/html5.js', array(), '3.7.0', false );
    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

	// load bootstrap js
	wp_enqueue_script('inlineskatingcomitee93-jquery', get_stylesheet_directory_uri() . '/dist/js/jquery.js', array() );
	//the bootstrap-bundle now includes popper.js, no need to add it apart
	wp_enqueue_script('inlineskatingcomitee93-bootstrapjs', get_stylesheet_directory_uri() . '/dist/js/bootstrap.bundle.js', array('inlineskatingcomitee93-jquery') );
	wp_enqueue_script( 'inlineskatingcomitee93-skip-link-focus-fix', get_stylesheet_directory_uri() . '/inc/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script('inlineskatingcomitee93-themejs', get_stylesheet_directory_uri() . '/inc/assets/js/theme-script.js', array('inlineskatingcomitee93-bootstrapjs'), 1.0, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/*
 * firsT I Have to dequee parent's theme scripts !!!
 * see https://wordpress.stackexchange.com/questions/65523/how-do-i-dequeue-a-parent-themes-css-file
 */
function inlineskatingcomitee93_parent_scripts() {
	// load bootstrap css
	wp_dequeue_style( 'wp-bootstrap-starter-bootstrap-css');
	// load bootstrap css
	wp_dequeue_style( 'wp-bootstrap-starter-font-awesome');
	// load AItheme styles
	wp_dequeue_script( 'wp-bootstrap-starter-popper');
	wp_dequeue_script( 'wp-bootstrap-starter-bootstrapjs');
	wp_dequeue_script( 'wp-bootstrap-starter-themejs');
	wp_dequeue_script( 'wp-bootstrap-starter-skip-link-focus-fix');
	wp_dequeue_script( 'html5hiv');
}

add_action( 'wp_enqueue_scripts', 'inlineskatingcomitee93_parent_scripts', 15); // the default value used by the parent theme is 10
add_action( 'wp_enqueue_scripts', 'inlineskatingcomitee93_scripts', 20 );


function inlineskatingcomitee93_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    <div class="d-block mb-3">' . __("To view this protected post, enter the password below:", "inlineskatingcomitee93"). '</div>
    <div class="form-group form-inline"><label for="' . $label . '" class="mr-2">' . __( "Password:", "inlineskatingcomitee93" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control mr-2" /> <input type="submit" name="Submit" value="' . esc_attr__( "Submit", "inlineskatingcomitee93" ) . '" class="btn btn-primary"/></div>
    </form>';
    return $o;
}
add_filter( 'the_password_form', 'inlineskatingcomitee93_password_form' );

/**
 * Load the https://github.com/jprieton/wp-bootstrap4-navwalker NavWalker.
 */
if ( ! file_exists( get_stylesheet_directory() . '/inc/wp-bootstrap-navwalker.php' ) ) {
    // file does not exist... return an error.
    return new WP_Error( 'wp-bootstrap-navwalker_github-missing', __( 'It appears the wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // file exists... require it.
    require_once get_stylesheet_directory() . '/inc/wp-bootstrap-navwalker.php';
}

function inlineskatingcomitee93_breadcrumb() {
    global $post;
    echo '<ol class="breadcrumb">';
    if (!is_home()) {
        echo '<li class="breadcrumb-item"><a href="';
        echo home_url();
        echo '">';
        echo 'Home';
        echo '</a></li>';
        if (is_category() || is_single()) {
            echo '<li class="breadcrumb-item">';
            the_category('</li><li class="breadcrumb-item">');
            if (is_single()) {
                echo '<li class="breadcrumb-item active">';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $fanzone_act = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $fanzone_act as $fanzone_inherit ) {
                    $output .= '<li class="breadcrumb-item"><a href="'.get_permalink($fanzone_inherit).'" title="'.get_the_title($fanzone_inherit).'">'.get_the_title($fanzone_inherit).'</a></li>';
                }
                echo $output;
                echo '<li class="breadcrumb-item active">'.$title.'</li>';
            } else {
                echo '<li class="breadcrumb-item active">'.get_the_title().'</li>';
            }
        }
    }
    echo '</ol>';
}