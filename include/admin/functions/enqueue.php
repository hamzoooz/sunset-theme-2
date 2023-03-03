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
    if('toplevel_page_hamzoooz_sunset' != $hook){
        return;
    }
    $theme_version = wp_get_theme()->get( 'Version' );
    $version_string = is_string( $theme_version ) ? $theme_version : false;
    wp_register_style('hamzoooz-sunset-admin-setting', get_template_directory_uri() . '/include/admin/assets/css/hamzoooz.admin.css', array(), 'all');
    wp_enqueue_style('hamzoooz-sunset-admin-setting');
    wp_enqueue_media();
    wp_register_script('hamzoooz-admin-script', get_template_directory_uri() . '/include/admin/assets/js/hamzoooz.admin.js', array('jquery'), $version_string, true);
    wp_enqueue_script('hamzoooz-admin-script');
 
}

add_action('admin_enqueue_scripts', 'hamzoooz_sunset_admin_scripts');