<?php
require_once get_theme_file_path("inc/tgm.php");
//require_once get_theme_file_path("inc/acf-mb.php");
require_once get_theme_file_path("inc/cmb2-mb.php");
if(class_exists('Attachments')){
    //require_once get_theme_file_path("/lib/attachmens.php");

    require_once get_theme_file_path("/lib/attachments.php");
}

 
if(site_url() == "http://localhost/first-wptheme"){
    define("VERSION",time());
}else{
    define("VERSION", wp_get_theme()->get("Version"));
}


function first_default_function(){
	add_theme_support('post-thumbnails');
	
	load_theme_textdomain( 'first');

    register_nav_menu("topmenu",__("Main Menu","first"));
    register_nav_menu("footermenu",__("Footer Menu","first"));
    $first_theme_custom_header = array(

            'width'                  => 1200,
            'height'                 => 600,
            'flex-height'            => true,
            'flex-width'             => true,
            'header-text'            => true,
            'default-text-color'     => '#222'
    );
    $first_theme_custom_logo = array(
        'width'                  => '100',
        'height'                 => '100'
    );
    add_theme_support("custom-header",$first_theme_custom_header);
    add_theme_support("custom-logo",$first_theme_custom_logo);
    add_theme_support("custom-background");
    add_theme_support("post-formats",array("aside","gallery","link ","image","quote","status","video","audio","chat"));
    add_theme_support( 'html5', array( 'search-form' ) );
    add_image_size("first-image-size",200,200);
}
add_action("after_setup_theme","first_default_function");

function first_theme_assets(){
	wp_enqueue_style("bootstrap","//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
    wp_enqueue_style("featherlight","//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.css");
    wp_enqueue_style("tiny-slider","//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.7.3/tiny-slider.css");

    wp_enqueue_style("font-awesome","//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css");
	wp_enqueue_style("first", get_stylesheet_uri(),null, VERSION );
    wp_enqueue_style("first-style",get_template_directory_uri()."/assets/css/first.css");
    wp_enqueue_script("featherlight-js","//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.js",array("jquery"), "0.0.1", true);
    wp_enqueue_script("tiny-slider-js","//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.7.3/min/tiny-slider.js",null, "0.0.1", true);
    wp_enqueue_script("Main", get_theme_file_uri("/assets/js/main.js"),null,VERSION,true);
}
add_action("wp_enqueue_scripts","first_theme_assets");

function first_sidebar(){
	register_sidebar( array(
        'name'          => __( 'Single Page Widget', 'first' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Right Sidebar', 'first' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Left Widget', 'first' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Footer Left Sidebar', 'first' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Right Widget', 'first' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Footer Right Sidebar', 'first' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
}
add_action("widgets_init","first_sidebar");

function first_the_excerpt($excerpt){
	if(!post_password_required()){
		return $excerpt;
	}else{
		echo get_the_password_form();
	}
}
add_filter("the_excerpt","first_the_excerpt");

function protected_title_format_change(){
	return "%s";
}
add_filter("protected_title_format","protected_title_format_change");

function first_menu_item_class($classes , $item ){
    $classes[] = "list-inline-item";
    return $classes;
}
add_filter("nav_menu_css_class","first_menu_item_class",10,2);

if(!function_exists("first_about_page_template_banner")){
function first_about_page_template_banner(){
    if(is_page()){
        $first_feat_image = get_the_post_thumbnail_url(null, "large");

        ?>
            <style>
                .page-header{
                    background-image:url(<?php echo $first_feat_image; ?>);
                }
            </style>

        <?php
    }

    if(is_front_page()){

        if(current_theme_supports("custom-header")){

            ?>
                <style>
                    .header{
                        background-image: url(<?php echo header_image()?>);
                        background-size: cover;
                        margin-bottom: 50px;
                    }
                    .header h1.heading a, h3.tagline{
                        color:#<?php echo get_header_textcolor();?>;

                        <?php 
                            if(!display_header_text()){
                                echo "display:none;";
                            }
                        ?>
                    }
                    
                </style>
            <?php
        }
    }
}
add_action("wp_head","first_about_page_template_banner");
}

//regular expression is used in below function.......
function first_highlight_search_results($text){
    if(is_search()){
        $pattern = '/('. join('|', explode(' ', get_search_query())).')/i';
        $text = preg_replace($pattern, '<span class="search-highlight">\0</span>', $text);
    }
    return $text;
}
add_filter('the_content', 'first_highlight_search_results');
add_filter('the_excerpt', 'first_highlight_search_results');
add_filter('the_title', 'first_highlight_search_results');

if(!function_exists("first_todays_date")) {
    function first_todays_date() {
        echo date( "d/m/y" );
    }
}

function first_modify_main_query($wpq){
    if(is_home() && $wpq->is_main_query()){
       // $wpq->set("post__not_in", array(95));
        $wpq->set("tag__not_in", array(4));
    }
    
}
add_action("pre_get_posts","first_modify_main_query");

//add_filter("acf/settings/show_admin","__return_false");


function first_admin_js($hook){
    if( isset($_REQUEST['post']) || isset($_REQUEST['post_ID']) ){
        $post_id = empty( $_REQUEST['post_ID']) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }
   
    
   
    if("post.php" == $hook){
        $post_format = get_post_format($post_id);
         wp_enqueue_script("admin-js",get_theme_file_uri("/assets/js/admin.js"),array("jquery"),VERSION,true);
         wp_localize_script("admin-js","first_pf",array("format" => $post_format ));
     }
      
    
}
add_action("admin_enqueue_scripts","first_admin_js");