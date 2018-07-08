<?php get_header();?>
<body <?php body_class();?>>
<?php get_template_part("/template-parts/common/hero");?>

<div class="posts text-center">

    <h1>
       Posts Under <?php single_cat_title();?>
    </h1>
    <?php
       while(have_posts()){
       the_post();

       ?>
          <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
       <?php 
       
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
