<?php 
/**
 * @package hamzoooz
 * 
 * Image post format 
 * 
 */

?>

<articale id="post-<?php the_ID(); ?>" <?php  post_class(); ?> class="main-post single-post" >

    <?php $featured_image = hamzoooz_get_attachment_url();?>
    <header class="entry-header text-center background-image "  style=" background-image:url(<?php echo $featured_image; ?>);">
        <div class="entry-meta" >
            <?php  get_template_part('/template-part/meta/meta', 'header' ) ?>
        </div><!-- .entry-meta -->
        
        <div class="entry-content" >
            <h3><a href="<?php the_permalink() ?>"> <?php the_title() ?> </a></h3>
        </div><!-- .entry-content -->

        <div class="entry-footer" >
            <?php  get_template_part('/template-part/meta/meta', 'footer' ) ?>
        </div><!-- .entry-meta --> 
    </header>
</articale>

<div class="clearfix"></div>


