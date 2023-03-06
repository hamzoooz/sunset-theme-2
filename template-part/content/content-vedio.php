<?php 
/**
 * @package hamzoooz
 * 
 * Vedio post format 
 * 
 */
?>

<articale id="post-<?php the_ID(); ?>" <?php  post_class('hamzoooz-vedio-format'); ?> >
    <header class="entry-header">

        <div class="entry-meta" >
            <?php  get_template_part('/template-part/meta/meta', 'header' ) ?>
        </div><!-- .entry-meta -->

        <div class="entry-content" >
                <div class="emed-resposive embed-responsive-16by9" >
                    <?php hamzoooz_get_embedded_media(array('vedio', 'iframe')); ?>
                </div>  
        </div><!-- .entry-content -->

        <div class="entry-footer" >
            <?php  get_template_part('/template-part/meta/meta', 'footer' ) ?>
        </div><!-- .entry-meta --> 
    </header>
</articale>

<div class="clearfix"></div>


