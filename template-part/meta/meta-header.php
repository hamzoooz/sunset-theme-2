<?php


?>

<small> 
    <?php
    $posted_on = human_time_diff( get_the_time('U'), current_time('timestamp' ) );
    echo  '<span class="posted_on">Posted <a href="' . esc_url( get_permalink()) . '">' . $posted_on .'</a> ago</span>';
    ?>
    <span class="post-date" > <i class="fa fa-calendar "></i> <?php the_time('F jS, Y'); ?> by  <i class="fa fa-user "></i> <?php the_author_posts_link(); ?></span> 
    <?php 
    if ( comments_open()){
        ?><span > <i class="fa fa-comments "></i> <?php comments_popup_link( __('no comments', 'hamzoooz' ) ,__('one comment', 'hamzoooz') , __('% comments', 'hamzoooz') , __('comment-url','hamzoooz') , __('comment disabled','hamzoooz')) ?></span><?php 
    }else {
        __('comments are closed', 'hamzoooz');
    } 
    ?>

</small>
