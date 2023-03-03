<?php

/**
 * repotheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since repotheme 1.0
 */

require(get_template_directory() . '/include/functions/hamzoooz_theme_suport.php');
require(get_template_directory() . '/include/functions/hamzoooz_theme_styles_scripts.php');




/**
 * add register nav menu
 * @since 1.0
 * 
 * add by @hamzoooz
 * 
 */

function wpk_bootstrap_menu() {
	register_nav_menu('bootstrap-menu',__( 'Bootstrap 5 Menu' ));
	}
	add_action( 'init', 'wpk_bootstrap_menu' );
	
			
function hamzoooz_bootstrap_menu(){ 
	wp_nav_menu(array(
		'theme_location' => 'bootstrap-menu',
		'container' => false,
		'menu_class' => '',
		'fallback_cb' => '__return_false',
		'items_wrap' => '<ul id="%1$s" class="nav justify-content-end navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
		'depth' => 2,
		'walker' => new bootstrap_5_wp_nav_menu_walker()
	));
}

// Add costomize The excerpt
function hamzoooz_extend_excetrpt_length($length) {
	if(is_author()){
		return 40;
	}elseif(is_category()){
		return 60;
	}
	else{
		return 15;
	}
}
add_filter('excerpt_length' , 'hamzoooz_extend_excetrpt_length');

function hamzoooz_extend_chinge_dots($more) {
	return ' ...' ;
}
add_filter('excerpt_more' , 'hamzoooz_extend_chinge_dots');

// Numbering Pagination


function numbering_pagination() {
	global $wp_query; //Make WP_Query Global
	$all_pages = $wp_query->max_num_pages;  // Get All Posts
	$current_page = max(1 , get_query_var('paged')); //Get Current Pages
	// echo $current_page;
	if($all_pages > 1){ // check if Total pages > 1
		return paginate_links(array(
			'base'      =>  get_pagenum_link() . '%_%',
			'format'    =>  'page/%#%',  
			'current'   =>  $current_page,
			'mid_size'  =>  2 ,
			'end_size'  =>  2,
		));
	}
}

// add coustoum post type 
/**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */
function hamzoooz_post_book() {
    $labels = array(
        'name'                  => _x( 'books', 'Post type general name', 'hamzoooz' ),
        'singular_name'         => _x( 'book', 'Post type singular name', 'hamzoooz' ),
        'menu_name'             => _x( 'books', 'Admin Menu text', 'hamzoooz' ),
        'name_admin_bar'        => _x( 'book', 'Add New on Toolbar', 'hamzoooz' ),
        'add_new'               => __( 'Add New', 'hamzoooz' ),
        'add_new_item'          => __( 'Add New book', 'hamzoooz' ),
        'new_item'              => __( 'New book', 'hamzoooz' ),
        'edit_item'             => __( 'Edit book', 'hamzoooz' ),
        'view_item'             => __( 'View book', 'hamzoooz' ),
        'all_items'             => __( 'All books', 'hamzoooz' ),
        'search_items'          => __( 'Search books', 'hamzoooz' ),
        'parent_item_colon'     => __( 'Parent books:', 'hamzoooz' ),
        'not_found'             => __( 'No books found.', 'hamzoooz' ),
        'not_found_in_trash'    => __( 'No books found in Trash.', 'hamzoooz' ),
        'featured_image'        => _x( 'book Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'hamzoooz' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'hamzoooz' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'hamzoooz' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'hamzoooz' ),
        'archives'              => _x( 'book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'hamzoooz' ),
        'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'hamzoooz' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'hamzoooz' ),
        'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'hamzoooz' ),
        'items_list_navigation' => _x( 'books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'hamzoooz' ),
        'items_list'            => _x( 'books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'hamzoooz' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'book' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );
 
    register_post_type( 'book', $args );
}
//hook into the init action and call create_writers_nonhierarchical_taxonomy when it fires
  
add_action( 'init', 'hamzoooz_post_book', 0 );
  
function create_writers_nonhierarchical_taxonomy() {
  
	// Labels part for the GUI
  
  $labels = array(
    'name' => _x( 'writers', 'taxonomy general name' ),
    'singular_name' => _x( 'writers', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search writerss' ),
    'popular_items' => __( 'Popular writers' ),
    'all_items' => __( 'All writers' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Writer' ), 
    'update_item' => __( 'Update Writer' ),
    'add_new_item' => __( 'Add New Writer' ),
    'new_item_name' => __( 'New Writer Name' ),
    'separate_items_with_commas' => __( 'Separate writers with commas' ),
    'add_or_remove_items' => __( 'Add or remove writers' ),
    'choose_from_most_used' => __( 'Choose from the most used writers' ),
    'menu_name' => __( 'writers' ),
  ); 
  
	// Now register the non-hierarchical taxonomy like tag
  
  register_taxonomy('writers','book',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'writer' ),
  ));
}
add_action( 'init', 'create_writers_nonhierarchical_taxonomy', 0 );

function create_publishers_nonhierarchical_taxonomy() {
  
	// Labels part for the GUI
  
  $labels = array(
    'name' => _x( 'publishers', 'taxonomy general name' ),
    'singular_name' => _x( 'publishers', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search writerss' ),
    'popular_items' => __( 'Popular publishers' ),
    'all_items' => __( 'All publishers' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Publisher' ), 
    'update_item' => __( 'Update Publisher' ),
    'add_new_item' => __( 'Add New Publisher' ),
    'new_item_name' => __( 'New Publisher Name' ),
    'separate_items_with_commas' => __( 'Separate publishers with commas' ),
    'add_or_remove_items' => __( 'Add or remove publishers' ),
    'choose_from_most_used' => __( 'Choose from the most used publishers' ),
    'menu_name' => __( 'publishers' ),
  ); 
  
	// Now register the non-hierarchical taxonomy like tag
  
  register_taxonomy('publishers','book',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'writer' ),
  ));
}
add_action( 'init', 'create_publishers_nonhierarchical_taxonomy', 0 );

/**
 *  Create Custo Post Type for Slideres
 * 
 */
function create_slider_post_type() {
 
	$labels = array(
		'name' => __( 'Slider' ),
		'singular_name' => __( 'Slider', 'hamzoooz' ),
		'all_items'           => __( 'All Sliders' , 'hamzoooz'),
		'view_item'           => __( 'View Slider' , 'hamzoooz'),
		'add_new_item'        => __( 'Add New Slider', 'hamzoooz' ),
		'add_new'             => __( 'Add New Slider' , 'hamzoooz'),
		'edit_item'           => __( 'Edit Slider' , 'hamzoooz'),
		'update_item'         => __( 'Update Slider' , 'hamzoooz'),
		'search_items' => __('Search Sliders', 'hamzoooz'),
	);
 
	$args = array(
		'labels' => $labels,
		'description' => 'Add New Slider contents',
		'menu_position' => 27,
		'public' => true,
		'has_archive' => true,
		'map_meta_cap' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'rewrite' => array('slug' => false),
		'menu_icon'=>'dashicons-format-image',
		'supports' => array(
			'title',
			'thumbnail','excerpt','content','comments'
		),
	);
	register_post_type( 'slider', $args);
 
}
add_action( 'init', 'create_slider_post_type' );
add_action( 'init', function() {
    remove_post_type_support( 'slider', 'editor' );
    remove_post_type_support( 'slider', 'slug' );
} );


/**
 * Register widget areas and custom widgets.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function hamzoooz_widgets_init() {

	register_sidebar( array(
		'name' 				=> esc_html__( 'Sidebar', 'hamzoooz' ),
        'id' 				=> 'main-sidebar',
        'class'  			=>  'main-sidebar',
		'description' 		=> esc_html__( 'Appears on posts and pages except the full width template.', 'hamzoooz' ),
        'before_widget'     =>  '<div class="widget-content">',
        'after_widget'      =>  '</div>',
        'befor'             =>  '<h3 class="widget-title">',
        'after'             =>  '</h3>'
	));

	register_sidebar( array(
		'name' 				=> esc_html__( 'Header', 'hamzoooz' ),
        'id' 				=> 'main-sidebar',
        'class'  			=>  'main-sidebar',
		'description' 		=> esc_html__( 'Appears on header area. You can use a search or ad widget here.', 'hamzoooz' ),
        'before_widget'     =>  '<div class="widget-content">',
        'after_widget'      =>  '</div>',
        'befor_title'       =>  '<h3 class="widget-title">',
        'after_title'       =>  '</h3>'
	));

	register_sidebar( array(
		'name' 				=> esc_html__( 'Magazine Homepage', 'hamzoooz' ),
		'id' 				=> 'main-sidebar',
        'class' 			=>  'main-sidebar',
        'description' 		=> esc_html__( 'Appears on Magazine Homepage template only. You can use the Category Posts widgets here.', 'hamzoooz' ),
        'before_widget'     =>  '<div class="widget-content">',
        'after_widget'      =>  '</div>',
        'befor_title'       =>  '<h3 class="widget-title">',
        'after_title'       =>  '</h3>'
	));
}
add_action( 'widgets_init', 'hamzoooz_widgets_init' );


// add_action('widgets_init' , 'hamzoooz_main_sidebar');
// Remove Paragraph Element From posts

function hamzoooz_remove_p($content){
	remove_filter('the_content' , 'wpautop');
	return $content;
}
add_filter('the_content' ,'hamzoooz_remove_p', 0);

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hamzoooz_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hamzoooz_content_width', 810 );
}
add_action( 'after_setup_theme', 'hamzoooz_content_width', 0 );

/**
 * Enqueue custom fonts.
 */
function hamzoooz_custom_fonts() {
	wp_enqueue_style( 'hamzoooz-custom-fonts', get_template_directory_uri() . '/css/custom-fonts.css', array(), '14420113' );
}
add_action( 'wp_enqueue_scripts', 'hamzoooz_custom_fonts', 1 );
add_action( 'enqueue_block_editor_assets', 'hamzoooz_custom_fonts', 1 );

/**
 * Enqueue editor styles for the new Gutenberg Editor.
 */
function hamzoooz_block_editor_assets() {
	wp_enqueue_style( 'hamzoooz-editor-styles', get_template_directory_uri() . '/css/gutenberg-styles.css', array(), '20181102', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'hamzoooz_block_editor_assets' );







// Admin Page  

require get_template_directory() . '/include/admin/function-admin.php';
require get_template_directory() . '/include/admin/functions/enqueue.php';
require get_template_directory() . '/include/admin/functions/theme-suports.php';
// require get_template_directory() . '/include/admin/template/hamzoooz-theme-suport.php';
require get_template_directory() . '/include/functions/acive-and-deacive-theme-suport.php';
// /opt/lampp/htdocs/wordpress/wp-content/themes/sunset-theme-2/


// require get_template_directory() . '/include/theme-info.php';

// include Theme Customizer Options
//"/opt/lampp/htdocs/wordpress/wp-content/themes/hamzoooz-theme/include/customizer/customizer.php"
require get_template_directory() . '/include/customizer/customizer.php';
// require get_template_directory() . '/include/customizer/default-options.php';
require get_template_directory() . '/include/customizer/customize-colors.php';
require get_template_directory() . '/include/customizer/customize-media.php';

// Include Extra Functions
// require get_template_directory() . '/include/extras.php';

// include Template Functions
// require get_template_directory() . '/include/template-tags.php';

// Include support functions for Theme Addons
// require get_template_directory() . '/include/addons.php';

// Include Post Slider Setup
// require get_template_directory() . '/include/slider.php';

// include Widget Files
// require get_template_directory() . '/include/widgets/widget-category-posts-boxed.php';
// require get_template_directory() . '/include/widgets/widget-category-posts-columns.php';
// require get_template_directory() . '/include/widgets/widget-category-posts-grid.php';

