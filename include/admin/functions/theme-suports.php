<? php
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
	add_theme_support( 'custom-header' );
}

$background = get_option( 'background_future' );
if( @$background == 1 ){
	add_theme_support( 'custom-background' );
}