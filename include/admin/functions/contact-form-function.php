<?php
/**
 * 
 * @package sunsettheme
 * 
 * ==================================
 *      ADMIN PAGE Contact Form 
 * ==================================
 * 
 */


$contact = get_option( 'hamzoooz_contact_form' );
if( @$contact == 1 ){

}


/**
 * 
 * Contact custome post type
 * 
 */

function  hamzoooz_contact_custom_post_type(){
$labels = array(
	'name'               => __( 'Contact' ),
	'singular_name'      => __( 'Comment' ),
	'add_new'            => __( 'Add New Comment' ),
	'add_new_item'       => __( 'Add New Comment' ),
	'edit_item'          => __( 'Edit Comment' ),
	'new_item'           => __( 'New Comment' ),
	'view_item'          => __( 'View Comment' ),
	'search_items'       => __( 'Search Contact' ),
	'not_found'          => __( 'No contacts found' ),
	'not_found_in_trash' => __( 'No contacts found in trash' )
);

$args = array(
	'labels'             => $labels,
	'public'             => true,
	'publicly_queryable' => true,
	'show_ui'            => true,
	'show_in_menu'       => true,
	'query_var'          => true,
	'rewrite'            => array( 'slug' => 'contacts' ),
	'capability_type'    => 'post',
	'has_archive'        => true,
	'hierarchical'       => false,
	'menu_position'      => null,
	'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'contacts' )
);

register_post_type( 'contacts', $args );
}
add_action( 'init', 'hamzoooz_contact_custom_post_type' );