<h1> Hamzoooz Theme Options </h1>
<?php settings_errors(); ?> 

<?php 
 
	$picture = esc_attr( get_option( 'pictuer_user' ) );
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	$fullName = $firstName . ' ' . $lastName;
	$description = esc_attr( get_option( 'description' ) );
	
?>
<div class="sunset-sidebar-preview">
	<div class="sunset-sidebar">
		<div class="image-container">
			<div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture; ?>);"></div>
		</div>
		<h1 class="sunset-username"><?php print $fullName; ?></h1>
		<h2 class="sunset-description"><?php print $description; ?></h2>
		<div class="icons-wrapper">
			
		</div>
	</div>
</div>

<form method="post" action="options.php" class="sunset-general-form">
    <?php settings_fields('hamzoooz-settings-group'); ?>
    <?php do_settings_sections('hamzoooz_sunset'); ?>
    <?php submit_button();?>
</form>