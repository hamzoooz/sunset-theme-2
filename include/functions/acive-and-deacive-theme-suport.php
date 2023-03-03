<?php 
// Add submenu page
add_action('admin_menu', 'my_theme_submenu_page');
function my_theme_submenu_page() {
    add_submenu_page(
        'themes.php', // Parent slug
        'My Theme Settings', // Page title
        'My Theme Settings', // Menu title
        'manage_options', // Capability required
        'my-theme-settings', // Menu slug
        'my_theme_settings_page' // Callback function
    );
}

// Callback function for submenu page
function my_theme_settings_page() {
    if (isset($_POST['my-theme-settings-submit'])) {
        update_option('my-theme-settings-active', 1); // Set active
    } elseif (isset($_POST['my-theme-settings-reset'])) {
        update_option('my-theme-settings-active', 0); // Set inactive
    }
    $active = get_option('my-theme-settings-active', 0); // Get current active status

    ?>
    <div class="wrap">
        <h1>My Theme Settings</h1>
        <form method="post" action="">
            <p>
                <input type="submit" class="button button-primary" name="my-theme-settings-submit" value="Activate All Features"<?php echo $active ? ' disabled' : ''; ?>>
                <input type="submit" class="button" name="my-theme-settings-reset" value="Deactivate All Features"<?php echo !$active ? ' disabled' : ''; ?>>
            </p>
        </form>
    </div>
    <?php
}
