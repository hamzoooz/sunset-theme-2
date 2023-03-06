<?php 
/**
 * @package hamzoooz
 * 
 * Stander post format 
 * 
 */

?>


<articale id="post-<?php the_ID(); ?>" <?php  post_class(); ?> class="main-post single-post hamzoooz-audio-format" >
    <header class="entry-header">
        <h3><a href="<?php the_permalink() ?>"> <?php the_title() ?> </a></h3>

        <div class="entry-meta" >
            <?php  get_template_part('/template-part/meta/meta', 'header' ) ?>
        </div><!-- .entry-meta -->

        <div class="entry-content" >
            <div class="entry-content" >

        <?php 
                $content = do_shortcode(apply_filters('the_content', $post->post_content) );
                $embed = get_media_embedded_in_content($content, array('audio', 'iframe'));

                if (!empty($embed)) {
                    echo $embed[0];
                }
            ?>

            <div class="post-content" ><?php  // the_content(); ?></div>
        </div><!-- .entry-excerpt -->
            
        </div><!-- .entry-content -->

        <div class="entry-footer" >
            <?php  get_template_part('/template-part/meta/meta', 'footer' ) ?>
        </div><!-- .entry-meta --> 
    </header>
</articale>

<div class="clearfix"></div>


