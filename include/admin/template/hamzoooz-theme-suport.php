<h1> Hamzoooz Theme Suport Options </h1>
<?php settings_errors(); ?> 

<?php  // settings_fields($option_group) ?>
<?php  // do_settings_sections($page) ?>
<form method="post" action="options.php" class="form-theme-suport-admin">
    <?php settings_fields('hamzoooz-theme-suport-setting'); ?>
    <?php do_settings_sections('hamzoooz_custome_theme_suport'); ?>
    <?php submit_button();?>
</form>
