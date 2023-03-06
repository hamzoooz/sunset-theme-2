<?php /**
 * 
 * The header for our theme.
 * Displays all of the <head> section and everything up till <div id="content">
 *  @link https:/www.ablbukhari1439.online
 *
 * @since 1.0
 * @version 1.0
 * @package hamzoooz
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); bloginfo('language'); ?>>
<head>
    <meta charset = "<?php bloginfo("charset"); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <meta name="description" content="<?php  bloginfo('description'); ?>">
    <meat rel="prorile" href="http://gmpg.org/xfn/11">
    <?php if(is_singular() && pings_open(get_queried_object() )): ?>
        <link rel="pingback"  href="<?php bloginfo('pingback_url'); ?>" />
    <?php endif; ?> 
    <title> <?php wp_title('|' , true , 'right') ?> <?php bloginfo('name') ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >

<?php do_action( 'wp_body_open' ); ?>
    <div id="page" class="hfeed site">
        <?php get_template_part('template-part/nav/navbar');