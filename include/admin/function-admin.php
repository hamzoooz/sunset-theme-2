<?php

/**
 * 
 * @package sunsettheme
 * 
 * ========================
 *      ADMIN PAGE
 * ========================
 * 
 */

function hamzoooz_add_admin_page() {
	 
	// add menu page 
	// add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);
	add_menu_page( 'Hamzoooz Theme Options', 'hamzoooz' , 'manage_options', 'hamzoooz_sunset', 'hamzoooz_theme_create_page', get_template_directory_uri() . '/include/admin/assets/images/sunset-icon.png', 110 );
     
	//  add submenu page 
	// add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function);
	add_submenu_page('hamzoooz_sunset', 'hamzoooz Theme Option', 'General', 'manage_options', 'hamzoooz_sunset', 'hamzoooz_theme_create_page');
	add_submenu_page('hamzoooz_sunset', 'Theme Suport', 'theme supot', 'manage_options', 'hamzoooz_custome_theme_suport', 'hamzoooz_custome_theme_suport_function');
	add_submenu_page('hamzoooz_sunset', 'Contact Form', 'Contact Form', 'manage_options', 'hamzoooz_custome_contact_form_slug', 'hamzoooz_custome_contact_form_subpage');
	add_submenu_page('hamzoooz_sunset', 'Custome CSS', 'custome css', 'manage_options', 'hamzoooz_custome_css_slug', 'hamzoooz_custome_css_subpage');

	add_action('admin_init', 'hamzoooz_add_custom_settings');
}

add_action( 'admin_menu', 'hamzoooz_add_admin_page' );
function hamzoooz_theme_create_page() {
	require_once(get_template_directory() . '/include/admin/template/hamzoooz-theme-option.php');
}
function hamzoooz_custome_theme_suport_function() {
	require_once(get_template_directory() . '/include/admin/template/hamzoooz-theme-suport.php');
}

function hamzoooz_custome_contact_form_subpage(){
	require_once(get_template_directory() . '/include/admin/template/contact-form.php');
}

function hamzoooz_custome_css_subpage(){
	require_once(get_template_directory() . '/include/admin/template/hamzoooz-custom-css.php');
} 


function hamzoooz_add_custom_settings(){
	// register_setting($option_group, $option_name, $sanitize_callback)
	register_setting('hamzoooz-settings-group', 'pictuer_user');
	register_setting('hamzoooz-settings-group', 'first_name');
	register_setting('hamzoooz-settings-group', 'last_name');
	register_setting('hamzoooz-settings-group', 'description');
	register_setting('hamzoooz-settings-group', 'twitter','twitter_sanitize_handler');
	register_setting('hamzoooz-settings-group', 'facebook');
	register_setting('hamzoooz-settings-group', 'instgram');
	register_setting('hamzoooz-settings-group', 'telegram');
	register_setting('hamzoooz-settings-group', 'youtube');

	// add_settings_section($id, $title, $callback, $page)
	add_settings_section('hamzoooz-sidbar-option', 'Sidbar Options', 'sunset_sidbar_first_name', 'hamzoooz_sunset');
	
	// add_settings_field($id, $title, $callback, $page, $section, $args)
	add_settings_field('Pictuer-User', __('Pictuer', 'hamzoooz'), 'hamzoooz_sidbar_pictuer_user', 'hamzoooz_sunset', 'hamzoooz-sidbar-option');
	add_settings_field('sidbar-full-Name', __('Full name', 'hamzoooz'), 'hamzoooz_sidbar_name', 'hamzoooz_sunset', 'hamzoooz-sidbar-option');
	add_settings_field('sidbar-description', __('Description', 'hamzoooz'), 'hamzoooz_sidbar_description', 'hamzoooz_sunset', 'hamzoooz-sidbar-option');
	
	// Social Media Secion 
	add_settings_section('hamzoooz-sidbar-option-social', 'Social Media ', 'sunset_sidbar_social', 'hamzoooz_sunset');
	add_settings_field('twitter', __('Twitter', 'hamzoooz'), 'hamzoooz_sidbar_twitter', 'hamzoooz_sunset', 'hamzoooz-sidbar-option-social');
	add_settings_field('facebook', __('Facebook', 'hamzoooz'), 'hamzoooz_sidbar_facebook', 'hamzoooz_sunset', 'hamzoooz-sidbar-option-social');
	add_settings_field('instgram', __('Instgram', 'hamzoooz'), 'hamzoooz_sidbar_instgram', 'hamzoooz_sunset', 'hamzoooz-sidbar-option-social');
	add_settings_field('Youtube', __('Youtube', 'hamzoooz'), 'hamzoooz_sidbar_youtube', 'hamzoooz_sunset', 'hamzoooz-sidbar-option-social');
	add_settings_field('Telegram', __('Telegram', 'hamzoooz'), 'hamzoooz_sidbar_telegram', 'hamzoooz_sunset', 'hamzoooz-sidbar-option-social');
	
    //  theme suport section 
	// register_setting($option_group, $option_name, $sanitize_callback)
	register_setting('hamzoooz-theme-suport-setting', 'post_formats', 'hamzoooz_post_formats_callback');
	register_setting('hamzoooz-theme-suport-setting', 'header_image_future');
	register_setting('hamzoooz-theme-suport-setting', 'background_future');
	// add_settings_section($id, $title, $callback, $page)
	add_settings_section('hamzoooz-theme-option', 'Theme Option', 'hamzoooz_theme_options', 'hamzoooz_custome_theme_suport');
	// add_settings_field($id, $title, $callback, $page, $section, $args)
	add_settings_field('post-formats', __('Post Format', 'hamzoooz'), 'hamzoooz_sidbar_post_format', 'hamzoooz_custome_theme_suport', 'hamzoooz-theme-option');
	add_settings_field('header-future', 'header image', 'header_image_future_callback', 'hamzoooz_custome_theme_suport', 'hamzoooz-theme-option');
	add_settings_field('background future', 'background future', 'background_future_callback', 'hamzoooz_custome_theme_suport', 'hamzoooz-theme-option');

	// Contact Form Setting and Section
	register_setting('contact-form-group', 'hamzoooz_contact_form');
	add_settings_section('contact-form-id', 'contact-form', 'hamzoooz_contact_form_callback_section', 'hamzoooz_custome_contact_form_subpage');
	add_settings_field('contact-form-field-id', 'Contact Form', 'hamzoooz_contact_form_field_callback', 'hamzoooz_custome_contact_form_subpage', 'contact-form-id' );
	
	// Active all future  Setting and Section
	register_setting('custom-css-group', 'hamzoooz_custome_css','sanitize_custom_css');
	add_settings_section('custom-css-id', 'custom-css', 'hamzoooz_custom_css_group_section', 'hamzoooz_custome_css_subpage');
	add_settings_field('custom-css-field-id', 'custom css', 'hamzoooz_custom_css_field_callback', 'hamzoooz_custome_css_subpage', 'custom-css-id' );


};
// sections of settings 
function sunset_sidbar_first_name(){
	echo 'Customize Your Sidebar Information';
};
function sunset_sidbar_social(){
	echo 'Customize Your Social Media ';
};
function hamzoooz_theme_options(){
	echo 'Activate andd Deactivate Specific Theme Suport';
};
// section of inforamtion about user 
function hamzoooz_sidbar_pictuer_user(){
	// get_option($option, $default)
	$pictuer_user = esc_attr(get_option('pictuer_user'));
	if (empty($pictuer_user)){
		echo '<input type="button" class="button button-secondery" value="Upload Profile Picture" id="upload-button" />
		<input type="hidden" name="pictuer_user"  id="profile-picture-hamzoooz" value="'.$pictuer_user.'" />';
	}else {
		echo '<input type="button" class="button button-secondery" value="Replace Profile Picture" id="upload-button" />
		<input type="hidden" name="pictuer_user"  id="profile-picture-hamzoooz" value="'.$pictuer_user.'"  />  
		<input type="button" class="button button-secondery" value="Remove" id="remove-picture" /> ';
	}
};
function hamzoooz_sidbar_name(){
	// get_option($option, $default)
	$first_name = esc_attr(get_option('first_name'));
	$last_name = esc_attr(get_option('last_name'));
	echo '<input type="text" name="first_name" value="'.$first_name.'" placeholder="First Name " />';
	echo '<input type="text" name="last_name" value="'.$last_name.'" placeholder="Last Name " /><p class="description"> Write Full  Nmae </p>';
};
function hamzoooz_sidbar_description(){
	// get_option($option, $default)
	$description = esc_attr(get_option('description'));
	echo '<input type="text" name="description" value="'.$description.'" placeholder="description " /><p class="description"> Write Some thing abuot you ^_^ ! </p>';
};
function hamzoooz_sidbar_twitter(){
		$twitter = esc_attr(get_option('twitter'));
	echo '<input type="text" name="twitter" value="'.$twitter.'" placeholder="twitter " /><p class="description"> Write Twitter User Nmae without @ Character</p>';
};
function hamzoooz_sidbar_facebook(){
	$facebook = esc_attr(get_option('facebook'));
	echo '<input type="text" name="facebook" value="'.$facebook.'" placeholder="facebook" />';
};
function hamzoooz_sidbar_instgram(){
		$instgram = esc_attr(get_option('instgram'));
	echo '<input type="text" name="instgram" value="'.$instgram.'" placeholder="instgram " />';
};
function hamzoooz_sidbar_youtube(){
	$youtube = esc_attr(get_option('youtube'));
	echo '<input type="text" name="youtube" value="'.$youtube.'" placeholder="youtube " />';
};
function hamzoooz_sidbar_telegram(){	
		$telegram = esc_attr(get_option('telegram'));
	echo '<input type="text" name="telegram" value="'.$telegram.'" placeholder="telegram " />';
};
// Sanitize Settings sections 
function twitter_sanitize_handler($input){

	$output = sanitize_text_field($input );
	$output = str_replace('@', '', $input);
	$output = str_replace(' ', '', $input);
	return $output;
};
// Sanitize Textaera in Custom Css  
function sanitize_custom_css($input){

	$output = esc_textarea($input);
	return $output;
};
function hamzoooz_post_formats_callback($input){
    return $input;
};
function hamzoooz_sidbar_post_format() {
	$formats = array('standard', 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
	$output = '';

	if (isset($_POST['post_formats'])) {
		$options = $_POST['post_formats'];
		
		update_option('post_formats', $options);
	} else {
		$options = get_option('post_formats');
	}

	foreach ($formats as $format) {
		$checked = (!empty($options[$format]) ? 'checked' : '');
		$output .= '<label>
			<input type="checkbox" id="' . $format . '" name="post_formats[' . $format . ']" value="1" ' . $checked . '>
			' . ucfirst($format) . '
		</label>
		<br>';
	}

	echo $output;
}
function header_image_future_callback() {
	if (isset($_POST['header_image_future'])) {
		$header_image_future = $_POST['header_image_future'];
		
		update_option('header_image_future', $header_image_future);
	} else {
		$header_image_future = get_option('header_image_future');
	}
		$checked = (!empty($header_image_future) ? 'checked' : '');
		echo  '<label> <input type="checkbox" id="header_image_future" name="header_image_future" value="1" ' . $checked . '> Activate the Custome header image </label>';
}
function background_future_callback() {
	if (isset($_POST['background_future'])) {
		$background_future = $_POST['background_future'];
		
		update_option('background_future', $background_future);
	} else {
		$background_future = get_option('background_future');
	}
		$checked = (!empty($background_future) ? 'checked' : '');
		echo  '<label> <input type="checkbox" id="background_future" name="background_future" value="1" ' . $checked . '>  Activate the Custome Background image </label>';
}

// Contact Form 
function hamzoooz_contact_form_callback_section(){
	echo 'Active And Deactive contact form page ';
}
function hamzoooz_contact_form_field_callback(){
	if (isset($_POST['hamzoooz_contact_form'])) {
		$hamzoooz_contact_form = $_POST['hamzoooz_contact_form'];
		
		update_option('hamzoooz_contact_form', $hamzoooz_contact_form);
	} else {
		$hamzoooz_contact_form = get_option('hamzoooz_contact_form');
	}
		$checked = (!empty($hamzoooz_contact_form) ? 'checked' : '');
		echo  '<label> <input type="checkbox" id="hamzoooz_contact_form" name="hamzoooz_contact_form" value="1" ' . $checked . '>  </label>';
}


// Custom Css setting section 
function hamzoooz_custom_css_group_section(){
	echo 'Customize Your Theme With Your own CSS';
}

function hamzoooz_custom_css_field_callback(){			
	$hamzoooz_custome_css = get_option('hamzoooz_custome_css');
	$css = (empty($hamzoooz_custome_css) ? '' : '');
	echo '<div id="editor"> '  . $css .  ' </div><texterea id="hamzoooz_custome_css" name="hamzoooz_custome_css" style="display:none;visibility:hidden" >' .$css. '</texterea>'; 
}