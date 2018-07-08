<?php
 single_cat_title();
 $first_current_term = get_queried_object();
 $first_term_thumbnail_id = get_field("thumbnail", $first_current_term);
 if($first_term_thumbnail_id){

 	 $first_thumb_details = wp_get_attachment_image_src($first_term_thumbnail_id);

 	 echo "<br/><img src='".esc_url($first_thumb_details[0])."'/>";
 }





?>