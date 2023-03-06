<?php 
/**
 * @package hamzoooz
 * 
 * Stander post format 
 * 
 */

?>


<articale id="post-<?php the_ID(); ?>" <?php  post_class(); ?> class="main-post single-post" >
    <header class="entry-header">
        <h3><a href="<?php the_permalink() ?>"> <?php the_title() ?> </a></h3>

        <div class="entry-meta" >
            <?php  get_template_part('/template-part/meta/meta-header') ?>
        </div><!-- .entry-meta -->

        
        <div class="entry-content" ><?php 
            if (has_post_thumbnail()):
                the_post_thumbnail('' , ['class' => ' img-responsive img-thumbnail' , 'title' => 'post-Image']);
            else : 
                $default_thumbnail = hamzoooz_customize_medai_1()['default_thumbnail'];?>
                <?php echo wp_get_attachment_image($default_thumbnail) ; ?>
            <?php 
            endif ; ?>
        </div><!-- .entry-content -->

        <div class="entry-excerpt" >
            <div class="post-content" ><?php the_excerpt(); ?></div>
        </div><!-- .entry-excerpt -->
        
        <div class="button-container" >
            <a href="<?php the_permalink();?>" class="btn btn-primary"> <?php _e('Read More'); ?> </a>
        </div><!-- .button-container -->

        <div class="entry-footer" >
            <?php  get_template_part('/template-part/meta/meta', 'footer' ) ?>
        </div><!-- .entry-meta --> 
    </header>
</articale>

<div class="clearfix"></div>


