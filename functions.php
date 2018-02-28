<?php
/**
 * bussiness-lander functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bussiness-lander
 */

if ( ! function_exists( 'bussiness_lander_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bussiness_lander_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on bussiness-lander, use a find and replace
		 * to change 'bussiness-lander' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bussiness-lander', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'bussiness-lander' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'bussiness_lander_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'bussiness_lander_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bussiness_lander_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bussiness_lander_content_width', 640 );
}
add_action( 'after_setup_theme', 'bussiness_lander_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bussiness_lander_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bussiness-lander' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bussiness-lander' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bussiness_lander_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bussiness_lander_scripts() {
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', '', '4.7.0' );
	wp_enqueue_style( 'bussiness-lander-fonts', business_lander_fonts_url() );
	wp_enqueue_style( 'bussiness-lander-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bussiness-lander-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'bussiness-lander-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bussiness_lander_scripts' );

/**
 * Get Google fonts URL for the theme.
 *
 * @return string Google fonts URL for the theme.
 */
function business_lander_fonts_url() {
	$fonts   = array();
	$subsets = 'latin,latin-ext';

	if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'business-lander' ) ) {
		$fonts[] = 'Poppins:400,700';
	}
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'greentech' ) ) {
		$fonts[] = 'Open Sans:400,600,700';
	}

	$fonts_url = add_query_arg( array(
		'family' => rawurlencode( implode( '|', $fonts ) ),
		'subset' => rawurlencode( $subsets ),
	), 'https://fonts.googleapis.com/css' );

	return $fonts_url;
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

