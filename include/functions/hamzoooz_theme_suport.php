<?php 

if ( ! function_exists( 'hamzooooz_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 * 
	 * @since repotheme 1.0
	 *
	 * @return void
	 */

	function hamzooooz_theme_setup() {
		// add_theme_support( 'post-thumbnails', 'title-tag', 'html5', 'automatic-feed-links', 'post-formats', 'menus', 'custom-background', 'custom-header', 'custom-logo', 'responsive-embeds', 'woocommerce', 'gutenberg', 'custom-css', 'custom-colors', 'custom-font-sizes', 'custom-fonts', 'custom-gradients', 'custom-line-height' );

		// Make theme available for translation. Translations can be filed in the /languages/ directory.
		// load_theme_hamzoooz( 'hamzoooz', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Set detfault Post Thumbnail size
		set_post_thumbnail_size( 820, 410, true );
		// use class nav walker to handel nav menu bootstrap
		require_once get_template_directory() . '/classes/bootstrap_5_wp_nav_menu_walker.php';

		// This future activet in 
		// add_theme_support( 'post-formats', array( 'Standard','aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );
		
		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		// add_theme_support( 'custom-background', apply_filters( 'hamzoooz_custom_background_args', array( 'default-color' => 'e5e5e5' ) ) );

		// Set up the WordPress core custom logo feature
		add_theme_support( 'custom-logo', apply_filters( 'hamzoooz_custom_logo_args', array(
			'height'      => 60,
			'width'       => 300,
			'flex-height' => true,
			'flex-width'  => true,
		) ) );


		// Add Theme Support for wooCommerce
		add_theme_support( 'woocommerce' );

		// Add extra theme styling to the visual editor
		add_editor_style( array( 'css/editor-style.css', get_template_directory_uri() . '/css/custom-fonts.css' ) );

		// Add Theme Support for Selective Refresh in Customizer
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add custom color palette for Gutenberg.
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => esc_html_x( 'Primary', 'Gutenberg Color Palette', 'hamzoooz' ),
				'slug'  => 'primary',
				'color' => apply_filters( 'hamzoooz_primary_color', '#2299cc' ),
			),
			array(
				'name'  => esc_html_x( 'White', 'Gutenberg Color Palette', 'hamzoooz' ),
				'slug'  => 'white',
				'color' => '#ffffff',
			),
			array(
				'name'  => esc_html_x( 'Light Gray', 'Gutenberg Color Palette', 'hamzoooz' ),
				'slug'  => 'light-gray',
				'color' => '#f0f0f0',
			),
			array(
				'name'  => esc_html_x( 'Dark Gray', 'Gutenberg Color Palette', 'hamzoooz' ),
				'slug'  => 'dark-gray',
				'color' => '#777777',
			),
			array(
				'name'  => esc_html_x( 'Black', 'Gutenberg Color Palette', 'hamzoooz' ),
				'slug'  => 'black',
				'color' => '#353535',
			),
		) );

	// Add image size for small post thumbnais
	add_image_size( 'hamzoooz-thumbnail-small', 360, 270, true );

	// Add Custom Header Image Size
	// add_image_size( 'hamzoooz-header-image', 1190, 250, true );

	// Add Slider Image Size
	add_image_size( 'hamzoooz-slider-image', 880, 440, true );

	// Add Category Post Widget image sizes
	add_image_size( 'hamzoooz-category-posts-widget-small', 135, 75, true );
	add_image_size( 'hamzoooz-category-posts-widget-medium', 270, 150, true );
	add_image_size( 'hamzoooz-category-posts-widget-large', 585, 325, true );

}
endif; // hamzoooz_setup
add_action( 'after_setup_theme', 'hamzooooz_theme_setup' );
