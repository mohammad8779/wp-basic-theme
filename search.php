<?php get_header();?>
<body <?php body_class();?>>
<?php get_template_part("/template-parts/common/hero");?>

<div class="posts">
    <?php

      if(!have_posts()){
    ?>
      <div class="container">
         <div class="row">
           <div class="col-md-12 text-center">
              <h4>
                 <?php _e("No Result Found","first");?>
              </h4>
           </div>
         </div>
      </div>
    <?php } ?>

    <?php
       while(have_posts()){
       the_post();
       get_template_part("post-formats/content",get_post_format());
       }
    ?>

    <div class="container post-pagination">
        <div class="row">
            <div class="clo-md-4">
                
            </div>
            <div class="col-md-8">
                <?php 
                  the_posts_pagination(array(
                   "screen_reader_text" => ' ',
                   "prev_text"          => 'New Post',
                   "next_text"          => 'Old Post'
                 ));
                 ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer();?>
