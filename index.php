<?php 
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://www.hamzoooz.com
 * @package WordPress
 * @subpackage "hamzoooz-ar"
 * @since 2020 
 */

get_header();?>

<?php echo get_template_part('/template-part/slider/slider-with-title' ); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">

            
            <?php
                if(have_posts()){
                    while(have_posts()):
                        the_post();
                            get_template_part('/template-part/content/content', get_post_format());
                endwhile;
            }else{
                get_template_part('/template-part/content/content-none' );  
            }?>
        </div>
    </main>
</div>

    <div class="clearfix"></div>
    <?php  get_template_part('/template-part/pagination/pagination', '' ); ?>

    <?php get_footer();?> 

    <!-- label:ghp_e93ubuerduzdvwkmaef926tv8nzbli1axk05  -->