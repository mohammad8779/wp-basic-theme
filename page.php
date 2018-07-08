<?php get_header();?>
<body <?php body_class();?>>
<?php get_template_part("/template-parts/common/hero");?>
        <div class="container">
            <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <?php 
                                    $attachments = new Attachments('testimonial','46');

                                    ?>
                                        <h2 class="text-center">
                                           <?php _e("Testimonials","first")?> 
                                        </h2>
                                    <?php
                                ?>
                                <div class="testimonials slider text-center">
                                    
                                    <?php

                                        if(class_exists("Attachments")){
                                            if($attachments->exist()){
                                                while($attachment = $attachments->get() ){ ?>
                                                <div>
                                                    <?php 
                                                        echo $attachments->image('thumbnail');
                                                    ?>
                                                    <h4>
                                                        <?php 
                                                            echo esc_html($attachments->field("name"));
                                                        ?>
                                                    </h4>
                                                    <p>
                                                        <?php 
                                                            echo esc_html($attachments->field("testimonial"));
                                                        ?>
                                                    </p>

                                                     <p>
                                                        <?php 
                                                            echo esc_html($attachments->field("position"));
                                                        ?>

                                                        <strong>
                                                            <?php 
                                                            echo esc_html($attachments->field("company"));
                                                        ?>
                                                        </strong>
                                                    </p>
                                                </div>
                                        

                                 <?php } } } ?>

                                </div>
                            </div>
                        </div>

        </div>
       
        <div class="posts">
         <div class="post">
                <?php while(have_posts()):?>
                <?php the_post();?>
                <div class="container">
                    
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <h2 class="post-title text-center">
                                 <?php the_title();?> 
                            </h2>
                            <p class="text-center">
                                <strong><?php the_author();?></strong><br/>
                                <?php echo get_the_date();?>
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <p>
                            <?php if(has_post_thumbnail()){
                               $thubmnail_url = get_the_post_thumbnail_url(null ,"large");
                               printf('<a href="%s"data-featherlight="image">',  $thubmnail_url);
                                the_post_thumbnail("large",array("class" => "img-fluid"));
                                echo'</a>';
                             }
                            ?>
                            </p>
                            
                            <?php the_content();?>
                            <?php 
                               /* next_post_link();
                                echo "</br>";
                                previous_post_link(); */
                            ?>

                            
                        </div>
                        <?php if(comments_open()) :?>
                        <div class="col-md-10 offset-md-1 ">
                           <?php  comments_template(); ?>
                       </div>
                       <?php endif; ?>
                    </div>
                </div>
            <?php endwhile;?>
         </div>
     </div>
   

   

  

<?php get_footer();?>
