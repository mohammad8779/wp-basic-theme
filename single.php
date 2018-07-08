<?php
    $first_layout_class = "col-md-8";
    $first_text_class   = "";

    if(!is_active_sidebar("sidebar-1")){

         $first_layout_class = "col-md-10 offset-md-1";
         $first_text_class   = "text-center";
    }
?>

<?php get_header();?>
<body <?php body_class(array("first_class","sesh_class"));?>>
<?php get_template_part("/template-parts/common/hero");?>
<div class="container">
    <div class="row">
       <div class="<?php echo $first_layout_class; ?>">
        <div class="posts">
         
        <?php 

            while(have_posts()):
             the_post();
         ?>

          <div <?php post_class(array("prothom_class","last_class"));?>>
          
          <div class="container">
                    
            <div class="row">
                <div class="col-md-12">
                    <h2 class="post-title <?php echo $first_text_class; ?>">
                         <?php the_title();?> 
                    </h2>
                    <p class="<?php echo $first_text_class;?>">
                        <strong><?php the_author();?></strong><br/>
                        <?php echo get_the_date();?>
                    </p>

                   
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                  
                 

                       <div class="slider">
                          <?php
                          if ( class_exists( 'Attachments' ) ) {
                              $attachments = new Attachments( 'slider' );
                              if ( $attachments->exist() ) {
                                  while ( $attachment = $attachments->get() ) { ?>
                                      <div>
                                          <?php echo $attachments->image('large'); ?>
                                      </div>
                                      <?php
                                  }
                              }
                          }
                          ?>
                        </div>

                    <div>
                    <?php
                    if(!class_exists('Attachments')){
                     if(has_post_thumbnail()){
                       $thubmnail_url = get_the_post_thumbnail_url(null ,"large");
                       printf('<a href="%s"data-featherlight="image">',  $thubmnail_url);
                        the_post_thumbnail("large",array("class" => "img-fluid"));
                        echo'</a>';
                     }
                   }
                    the_content();  

                     if(get_post_format() == "image" && function_exists( "the_field" )):

                      $camera_model = get_post_meta(get_the_ID(),"camera_model",true);
                    ?>
                      <div class="metainfo">
                        <strong>
                          Camera Model: </strong><?php echo esc_html( $camera_model );?> <br>
                         

                        <strong>
                           Location:  </strong> <?php 
                                     $first_location = the_field("location");
                                     echo esc_html($first_location);

                           ?> <br>

                           <strong>
                           Date:  </strong> <?php 
                                     $first_date = the_field("date");
                                     echo esc_html($first_date);

                           ?> <br>
                           <?php if(get_field("license_information")):?>
                           <p>
                              <?php 
                                echo apply_filters("the_content",get_field("license_information") ); 
                              ?>
                           </p> 
                           <?php endif; ?>

                           <p>
                             <?php 
                               $first_image = get_field("image");
                              $first_image_details = wp_get_attachment_image_src($first_image);
                              echo "<img src='".esc_url($first_image_details[0])."'/>'";
                               
                             ?>
                           </p>

                <p>
                            
                 <?php 
                  $file = get_field('attachment');
                  if($file){
                     $file_url = wp_get_attachment_url($file);
                     $file_thumb = get_field("thumbnail",$file);

                     if($file_thumb){

                       $file_thumb_details = wp_get_attachment_image_src($file_thumb);
                       echo "<a target='_blank' href='{$file_url}'><img src='".esc_url($file_thumb_details[0])."'/>'</a>";
                     }
                     else{

                        echo "<a target='_blank' href='{$file_url}'>{$file_url}</a>";
                     }
                  }
                 ?>
              </p>
             
              <?php 
                 if(function_exists("the_field")):   ?>

              <div>
                  <h1><?php _e("Ralated Posts","first");?></h1>
                  <?php 
                    $related_posts = get_field("related_post");
                    $first_rp_wp = new WP_QUERY(array(
                        'post__in' => $related_posts,
                        'order_by' => 'post__in'
                    ));

                    while($first_rp_wp->have_posts()){ $first_rp_wp->the_post(); ?>
                      <a href="<?php the_permalink();?>"><h4><?php the_title();?></h4></a>
                    <?php } ?>
              </div>

            <?php endif;?>
          </div>

          <?php 
                 endif;
          ?>

          <!--this below code for cmb2 metabox -->
          <?php
           if(get_post_format() == "image" && class_exists( "CMB2" )):

                      $first_camera_model = get_post_meta(get_the_ID(),"_first_camera_model",true);
                      $first_location = get_post_meta(get_the_ID(),"_first_location",true);
                      $first_date = get_post_meta(get_the_ID(),"_first_date",true);
                      $first_license = get_post_meta(get_the_ID(),"_first_license",true);
                      $first_license_information = get_post_meta(get_the_ID(),"_first_license_information",true);
                    ?>
                      <div class="metainfo">
                        <strong>
                          Camera Model: </strong><?php echo esc_html($first_camera_model);?> <br>
                         

                        <strong>
                           Location:  </strong> <?php 
                                     
                                     echo esc_html($first_location);

                           ?> <br>

                           <strong>
                           Date:  </strong> <?php echo esc_html($first_date);

                           ?> <br>
                           <?php if($first_license):?>
                           <p>
                              <?php 
                                echo apply_filters( "the_content", $first_license_information ); 
                              ?>
                           </p> 
                           <?php endif; ?>

                           <p>
                             <?php 
                              
                              $first_image = get_post_meta(get_the_ID(),"_first_image_id", true);
                              $first_image_details = wp_get_attachment_image_src($first_image);
                              echo "<img src='".esc_url($first_image_details[0])."'/>'";
                               
                             ?>
                           </p>

                           <p>
                             <?php 
                              
                              $first_file = get_post_meta(get_the_ID(),"_first_upload", true);
                              echo esc_url($first_file);
                              
                               
                             ?>
                           </p>



                          
                  </div>

          <?php 
            endif;
          ?>

        <!-- end cmb2 metabox code -->
          <?php
               wp_link_pages()
          ?>

          </div>
      </div>
                <?php if(!post_password_required() && comments_open()) :?>
                <div class="col-md-10 offset-md-1 ">
                   <?php  comments_template(); ?>
               </div>
               <?php endif; ?>
            </div>

                    <div class="authorsection">

                        <div class="row">
                            <div class="col-md-2 author-image">
                                <?php
                                   echo get_avatar(
                                    get_the_author_meta("ID")
                                   );
                                ?>
                            </div>
                            <div class="col-md-10">
                                <h4>
                                    <?php
                                        echo get_the_author_meta("display_name");
                                    ?>
                                </h4>
                                <p>
                                    <?php
                                      echo get_the_author_meta("description");
                                    ?>
                                </p>

                            <?php 
                               if(function_exists("the_field")):
                            ?>

                            <p> 
                                Facebook Url:<?php the_field('facebook',"user_".get_the_author_meta("ID"));?> <br/>

                                Twitter Url:<?php the_field('twitter',"user_".get_the_author_meta("ID"));?>
                            </p>

                            <?php 
                                endif;
                            ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            <?php endwhile;?>
        </div>
     </div>
    </div>

  
        <?php 
        if(is_active_sidebar("sidebar-1")):
        ?>
        <div class="col-md-4">
            <?php if(is_active_sidebar("sidebar-1")){

                    dynamic_sidebar("sidebar-1");
                 } 
            ?>
        </div>

       <?php endif; ?>

    </div>
 </div>

<?php get_footer();?>
