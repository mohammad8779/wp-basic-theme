<?php
/*
* Template Name:Custom Query
*/
?>
<?php get_header();?>
<body <?php body_class();?>>
<?php get_template_part("/template-parts/common/hero");?>

<div class="posts text-center">

   
    <?php
       $paged          = get_query_var('paged')?get_query_var('paged'):1;
       $posts_per_page = 2;
       $post_ids       = array(32,34,36,31);
       $total          = 6;
       $_p = get_posts(array(
            //'post__in'       => $post_ids,
            'author__in'     => array( 1 ),
            'numberposts'    => $total,
            'orderby'        => 'post__in',
            'posts_per_page' => $posts_per_page,
            'paged'          => $paged
       ));
       foreach($_p as $p){ 
       //setup_postdata($post);
    ?>
          

          <!-- <h2><a href="<?php //the_permalink(); ?>"><?php //the_title(); ?></a></h2> -->

            <h2>
                <a href="<?php echo esc_url($p->guid);?>">
                 <?php echo apply_filters( "the-title", $p->post_title ) ?>
                </a>
            </h2>

    <?php } //wp_reset_postdata(); ?>

</div>

<div class="container post-pagination">
        <div class="row">
            <div class="clo-md-4">
                
            </div>
            <div class="col-md-8">
                <?php 
                   echo paginate_links(array(
                      'total' => ceil( $total/$posts_per_page)
                   ));
                 ?>
            </div>
        </div>
    </div>

<?php get_footer();?>
