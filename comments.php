<div class="comments"> 
<h2 class="comments-title">
	<?php
	    $comments_cn = get_comments_number();

		if(1 == $comments_cn){
			 _e("1","first");
		}
		else{

			echo $comments_cn.' '.__("comments","first");
		}
	?>
</h2>
<div class="comments-list"> 
	<?php
		wp_list_comments(); 
	?>
	<div class="comments-pagination">
		<?php 
		    
			the_comments_pagination(array(
			   'screen_reader_text' => __("pagination","first"),
               'prev_text'           => '>'.__("previous comments","first"),
               'prev_text'           => '>'.__("next comments","first")
			));

		?>
	</div>	 

	 <div class="comments-pagination">
            <?php
            the_comments_pagination( array(
                'screen_reader_text' => __( 'Pagination', 'alpha' ),
                'prev_text'          => '<' . __( 'Previous Comments', 'alpha' ),
                'next_text'          => '>' . __( 'Next Comments', 'alpha' ),
            ) );
            ?>
        </div>
		 
		
   <?php
   		if(!comments_open()){
		 	 echo _e("your comments are closed","first");
		 }
    ?>
</div>

<div class="comments-form">
	<?php comment_form(); ?>
</div>

</div>