<?php
/**
 * 
 * @package sunsettheme
 * 
 * ==================================
 *      ADMIN PAGE Theme Suport
 * ==================================
 * 
 */

$options = get_option( 'post_formats' );
$formats = array( 'standard', 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
$output = array();
foreach ( $formats as $format ){
	$output[] = ( @$options[$format] == 1 ? $format : '' );

}
if(!empty($options)){
    add_theme_support('post-formats', $output);
}

$header = get_option( 'header_image_future' );
if( @$header == 1 ){
	add_theme_support('custom-header');
}

$background = get_option( 'background_future' );
if( @$background == 1 ){
	add_theme_support( 'custom-background' );
}
?>
<?php 

// add_theme_support( 'post-thumbnails', 'title-tag', 'html5', 'automatic-feed-links', 'post-formats', 'menus', 'custom-background', 'custom-header', 'custom-logo', 'responsive-embeds', 'woocommerce', 'gutenberg', 'custom-css', 'custom-colors', 'custom-font-sizes', 'custom-fonts', 'custom-gradients', 'custom-line-height' );

    // Post Thumbnails - add_theme_support('post-thumbnails'): Allows you to add a featured image to your posts and pages.

    // Post Formats - add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio')): Allows you to add specific formatting to your posts, such as a video or audio format.

    // Automatic Feed Links - add_theme_support('automatic-feed-links'): Adds automatic RSS and Atom feed links to your site.

    // HTML5 - add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption')): Enables HTML5 support for various elements on your site, such as search forms, comment forms, galleries, and captions.

    // Title Tag - add_theme_support('title-tag'): Adds the ability to customize the title tag for each page.

    // Custom Logo - add_theme_support('custom-logo'): Adds the ability to upload a custom logo to your site.

    // Custom Header - add_theme_support('custom-header'): Adds the ability to upload a custom header image to your site.

    // Custom Background - add_theme_support('custom-background'): Adds the ability to customize the background image or color of your site.

    // Customize Selective Refresh Widgets - add_theme_support('customize-selective-refresh-widgets'): Allows you to preview changes made to widgets without refreshing the entire page.

    // Starter Content - add_theme_support('starter-content'): Allows you to provide a set of pre-defined content for users to use when setting up your theme.

	// Gutenberg Wide Images - add_theme_support('align-wide'): Allows you to use the "wide" and "full" image alignment options in the Gutenberg editor.

    // Gutenberg Color Palettes - add_theme_support('editor-color-palette', array( array('name' => __('Primary Color', 'text-domain'), 'slug' => 'primary', 'color' => '#0073aa'), array('name' => __('Secondary Color', 'text-domain'), 'slug' => 'secondary', 'color' => '#767676'), )): Adds a custom color palette to the Gutenberg editor.

    // Gutenberg Font Sizes - add_theme_support('editor-font-sizes', array( array( 'name' => __('Small', 'text-domain'), 'size' => 12, 'slug' => 'small' ), array( 'name' => __('Normal', 'text-domain'), 'size' => 16, 'slug' => 'normal' ), array( 'name' => __('Large', 'text-domain'), 'size' => 24, 'slug' => 'large' ), )): Adds custom font sizes to the Gutenberg editor.

    // Navigation Menus - add_theme_support('menus'): Enables the creation of custom navigation menus in your theme.

    // Widgets - add_theme_support('widgets'): Enables the creation of custom widgets in your theme.

    // Custom Post Types - add_theme_support('post-types', array('my_custom_post_type')): Enables support for custom post types in your theme.

    // Custom Taxonomies - add_theme_support('taxonomies', array('my_custom_taxonomy')): Enables support for custom taxonomies in your theme.

    // WooCommerce - add_theme_support('woocommerce'): Enables support for the WooCommerce plugin in your theme.