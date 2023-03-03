<div class="container">
   <div class="row">
      <?php
      $arg = array(
         'post_type'         => 'slider',
         'posts_per_page'    => 5,
         'order'             => 'ASC'
      );
      $slider = new WP_Query($arg);
      $j = 0;
      $post_count = wp_count_posts('slider')->publish;
      ?>
      <!-- Carousel -->
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
         <!-- Indicators -->
 
 
         <ol class="carousel-indicators">
                <?php for($i=0;$i<$post_count; $i++): ?>
            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" class="active"></li>
                <?php endfor; ?>
         </ol>
         <!-- Wrapper for slides -->
         <div class="carousel-inner">
                <?php while($slider->have_posts()) : $slider->the_post(); ?>
            <div class="item<?php echo $j==0 ? ' active': '';?>">
               <?php if(has_post_thumbnail()): the_post_thumbnail('slider'); endif; ?>
               <!-- Static Header -->
               <div class="header-text hidden-xs">
                  <div class="col-md-12 text-center">
                     <h2>
                        <span>Welcome to <strong><?php the_title() ?></strong></span>
                     </h2>
                     <br>
                     <h3>
                        <a href="<?php echo get_post_meta(get_the_ID(),'_slider_link_value_key', true); ?>"><span><?php the_excerpt(); ?></span></a>
                     </h3>
                  </div>
               </div><!-- /header-text -->
            </div>
                <?php $j++; endWhile; wp_reset_query(); ?>
         </div>
         <!-- Controls -->
         <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
         </a>
         <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
         </a>
      </div><!-- /carousel -->
   </div>
</div>