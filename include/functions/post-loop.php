<?php
/**
 * 
 * 
 */

 function hamzoooz_get_attachment_url(){
    $output = '';

    if (has_post_thumbnail()){
        $output = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID() ) );
        // the_post_thumbnail('' , ['class' => ' img-responsive img-thumbnail' , 'title' => 'post-Image']);
    }else{

        $featured_image =get_posts(
            array(
                'post_type'     =>  'attachment',
                'post_per_page' =>  1,
                'post_parent'   =>  get_the_ID()
            ));
        if ( $featured_image ):
            foreach ($featured_image as $image ) :
                $output = wp_get_attachment_url($image->ID);
            endforeach;
        endif;
        wp_reset_postdata();
    }
    return $output;
 }


 function hamzoooz_get_embedded_media($type = array()){

    $content = do_shortcode(apply_filters('the_content', $post->post_content) );
    $embed = get_media_embedded_in_content($content, array('audio', 'iframe'));
    
    $output = str_replace('?visual=true', '?visual=fale', $embed[0]);
    return $output;

    // if (!empty($embed)) {
    //     echo $embed[0];
    // }
 }