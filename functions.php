<?php
/**
 * Business-lander functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package business-lander
 */

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
function business_lander_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on business-lander, use a find and replace
	 * to change 'business-lander' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'business-lander', get_template_directory() . '/languages' );

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
	add_image_size( 'business-lander-list-thumbnail', 792, 300, true );
	add_image_size( 'business-lander-widget-thumbnail', 70, 70, true );
	set_post_thumbnail_size( 384, 240, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Header', 'business-lander' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
	add_theme_support(
		'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	add_theme_support( 'custom-header' );

}

add_action( 'after_setup_theme', 'business_lander_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function business_lander_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'business_lander_content_width', 840 );
}
add_action( 'after_setup_theme', 'business_lander_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function business_lander_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'business-lander' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'business-lander' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'business-lander' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'business-lander' ),
			'before_widget' => '<section id="%1$s" class="widget-footer %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
	require_once get_template_directory() . '/inc/widgets/class-business-lander-recent-posts-widget.php';
	register_widget( 'Business_Lander_Recent_Posts_Widget' );
}
add_action( 'widgets_init', 'business_lander_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function business_lander_scripts() {
	wp_enqueue_style( 'business-lander-font-awesome', get_template_directory_uri() . '/css/fontawesome.css', '', '5.0.0' );
	wp_enqueue_style( 'business-lander-fonts', business_lander_fonts_url() );
	wp_enqueue_style( 'business-lander-style', get_stylesheet_uri() );

	wp_enqueue_script( 'business-lander-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'business-lander-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_front_page() && ! is_home() ) {
		wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/js/slick.js', array( 'jquery' ), '1.8.0', true );
	}

	wp_enqueue_script( 'business-lander-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'business_lander_scripts' );

/**
 * Get Google fonts URL for the theme.
 *
 * @return string Google fonts URL for the theme.
 */
function business_lander_fonts_url() {
	$fonts   = array();
	$subsets = 'latin,latin-ext';

	if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'business-lander' ) ) {
		$fonts[] = 'Poppins:100,200,300,400,600,700';
	}

	$fonts_url = add_query_arg(
		array(
			'family' => rawurlencode( implode( '|', $fonts ) ),
			'subset' => rawurlencode( $subsets ),
		), 'https://fonts.googleapis.com/css'
	);

	return $fonts_url;
}

/**
 * Load Gutenberg stylesheet.
 */
function business_lander_style_editor_gutenberg() {
	// Load the theme styles within Gutenberg.
	wp_enqueue_style( 'business-lander-fonts', business_lander_fonts_url() );
	wp_enqueue_style( 'business-lander-style-editor', get_theme_file_uri( '/style-editor.css' ), false );
}
add_action( 'enqueue_block_editor_assets', 'business_lander_style_editor_gutenberg' );

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if ( is_admin() ) {
	require_once get_template_directory() . '/inc/admin/class-tgm-plugin-activation.php';
	require_once get_template_directory() . '/inc/admin/plugins.php';

	/**
	 * Load dashboard
	 */
	require get_template_directory() . '/inc/dashboard/class-business-lander-dashboard.php';
	$dashboard = new Business_lander_Dashboard();
}

/**
 * Customizer Pro.
 */
require get_template_directory() . '/inc/customizer-pro/class-business-lander-customizer-pro.php';
$customizer_pro = new Business_Lander_Customizer_Pro();
$customizer_pro->init();

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Shim for wp_body_open, ensuring backwards compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}
