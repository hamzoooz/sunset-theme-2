<?php 

if ( ! function_exists( 'mystyles' ) ) :
	/**
     * Enqueue styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	
	function mystyles() {
		$theme_version = wp_get_theme()->get( 'Version' );
		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_enqueue_style( 'hamzoooz-stylesheet', get_stylesheet_uri(), array(), $version_string );
		wp_style_add_data( 'hamzoooz-stylesheet','rtl','replace');
		wp_enqueue_style('bootstrap-css',get_template_directory_uri().'/assets/css/bootstrap.min.css');
		wp_style_add_data( 'bootstrap-css','rtl','replace');
		wp_enqueue_style('font-awesome-css',get_template_directory_uri().'/assets/css/fontawesome.min.css');
		wp_enqueue_style('main',get_template_directory_uri().'/assets/css/main.css');
	}
endif;

if ( ! function_exists( 'myscripts' ) ) :
	
	function myscripts(){
		wp_deregister_script('jquery'); // to remove old jquery from wordpress
		wp_register_script('jquery', includes_url('/js/jquery/jquery.js') , [] ,false, true);// add anew jquery to footer 
		wp_enqueue_script('bootstrap-js',get_template_directory_uri() .'/assets/js/bootstrap.min.js', array('jquery'), false, true );/* last true to put file script in last body becous the default value false */
		wp_enqueue_script('fontawesome-js',get_template_directory_uri() .'/assets/js/fontawesome.min.js', array(), false, true );
		wp_enqueue_script('main-js',get_template_directory_uri() . '/assets/js/main.js',array(),false,true);//array to tell what incluede this fun from libaraly
		wp_enqueue_script('HTML5 Shiv',get_template_directory_uri() . '/assets/js/HTML5 Shiv 3.7.3.js');
		wp_script_add_data('HTML5 Shiv','conditional','lt IE 9');
		wp_enqueue_script('Respond',get_template_directory_uri().'/assets/js/Respond.js');//array to tell what incluede this fun from libaraly
		wp_script_add_data('Respond','conditional','lt IE 9');
	}
endif;
add_action('wp_enqueue_scripts','mystyles');
add_action('wp_enqueue_scripts','myscripts');
