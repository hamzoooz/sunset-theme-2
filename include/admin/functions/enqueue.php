<?php
/**
 * 
 * @package sunsettheme
 * 
 * ========================
 *      ADMIN ENQUEUE 
 * ========================
 * 
 */

 function hamzoooz_sunset_admin_scripts( $hook ){
    // echo $hook;
    // wp_die();
    $theme_version = wp_get_theme()->get( 'Version' );
    $version_string = is_string( $theme_version ) ? $theme_version : false;

    if('toplevel_page_hamzoooz_sunset' == $hook){
        wp_register_style('hamzoooz-sunset-admin-setting', get_template_directory_uri() . '/include/admin/assets/css/hamzoooz.admin.css', array(), 'all');
        wp_enqueue_style('hamzoooz-sunset-admin-setting');
        wp_enqueue_media();
        wp_register_script('hamzoooz-admin-script', get_template_directory_uri() . '/include/admin/assets/js/hamzoooz.admin.js', array('jquery'), $version_string, true );
        wp_enqueue_script('hamzoooz-admin-script');

    }elseif ('hamzoooz_page_hamzoooz_custome_css_slug' == $hook ){

        wp_enqueue_style('hamzoooz-admin-script-css-editor-style', get_template_directory_uri() . '/include/admin/assets/css/custom-css-editor.css', array(), '1.0.0', '' );
        wp_enqueue_script('hamzoooz-admin-script-css-editor-script', get_template_directory_uri() . '/include/admin/assets/js/src/ace.js', array('jquery'), '1.15.3', true );
        wp_enqueue_script('hamzoooz-admin-script-css-editor', get_template_directory_uri() . '/include/admin/assets/js/custom-css-editor.js', array('jquery'), '1.0.0', true );
        
    }else{
        return;
    }

}

add_action('admin_enqueue_scripts', 'hamzoooz_sunset_admin_scripts');