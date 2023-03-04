<h1> Active And Deactive Contact Form  </h1>
<?php settings_errors(); ?> 

<?php  // do_settings_sections($page) ?>
<form method="post" action="options.php" class="form-theme-suport-admin">
    <?php settings_fields('contact-form-group'); ?>
    <?php do_settings_sections('hamzoooz_custome_contact_form_subpage'); ?>
    <?php submit_button();?>
</form>
