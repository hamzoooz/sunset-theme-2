<h1> hamzoooz Custom Css  </h1>
<?php settings_errors(); ?> 

<?php  // do_settings_sections($page) ?>
<form method="post" action="options.php">
    <?php settings_fields('custom-css-group'); ?>
    <?php do_settings_sections('hamzoooz_custome_css_subpage'); ?>
    <?php submit_button();?>
</form>