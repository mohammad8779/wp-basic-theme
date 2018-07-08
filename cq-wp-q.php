<?php
/*
* Template Name:Custom WP Query
*/
?>
<?php get_header();?>
<body <?php body_class();?>>
<?php get_template_part("/template-parts/common/hero");?>

<div class="posts text-center">

   
    <?php
       $paged          = get_query_var('paged')?get_query_var('paged'):1;
       $posts_per_page = 2;
       //$post_ids       = array(36,34,32,30);
       
       $_p = new WP_QUERY (array(
           //'category_name'  => 'test-cat',
           // 'tag'            => 'special',
            //'post__in'       => $post_ids,
            //'orderby'        => 'post__in',
            'posts_per_page' => $posts_per_page,
            'paged'          => $paged,
            //'meta_key'       => 'featured',
            //'meta_value'     => '1',
             'meta_query'      =>array(
                'relation'   => 'AND',
                array(
                  'key' => 'featured',
                  'value'    => '1',
                  'compare'    => '='
                ),

                array(
                  'key' => 'homepage',
                  'value'    => '1',
                  'compare'    => '='
                )
            ) 
            
         /*   'tax_query'      =>array(
                'relation'   => 'OR',
                array(
                  'taxonomy' => 'category',
                  'field'    => 'slug',
                  'terms'    => array('test-cat')
                ),

                array(
                  'taxonomy' => 'post_tag',
                  'field'    => 'slug',
                  'terms'    => array('special')
                )

                array(
                  'taxonomy' => 'post_format',
                  'field'    => 'slug',
                  'terms'    => array('post-format-audio','post-format-video'),
                   'operator'   => 'NoT IN'
                ), 

            ) 
            //'monthnum' => 7,
            //'year'     => 2018,
            //'post_status' => 'publish' */
       ));
       while( $_p->have_posts() ){ 
         $_p->the_post();
    ?>
          

           <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> 

           
    <?php } wp_reset_query(); ?>
    
</div>

<div class="container post-pagination">
        <div class="row">
            
            <div class="col-md-12 text-center">
                <?php 
                   echo paginate_links(array(
                      'total'   => $_p->max_num_pages,
                      'current' => $paged
                   ));
                 ?>
            </div>
        </div>
    </div>

<?php get_footer();?>
