<?php
/*
* Template Name: Pricing Page Template
*/
get_header();
?>
<?php
   $pricing = get_post_meta(get_the_ID(),"_first_pt_pricing_table",true);
   $services = get_post_meta(get_the_ID(),"_first_ss_services",true);
?>

<div class="container">
	<div class="row">
		<?php
			foreach( $pricing as $ptc ): 
		?>

			<div class="col-md-4">
				<h2> <?php echo esc_html($ptc['_first_pt_pricing_caption']); ?> </h2>

				<ul>
				<?php foreach( $ptc['_first_pt_pricing_option'] as $pto):?>
					<li><?php echo esc_html($pto);?></li>
			    <?php endforeach;?>
			     </ul>
			     <h3> <?php echo esc_html($ptc['_first_pt_price']); ?> </h3>
			</div>

			

		<?php endforeach;?>
	</div>
    <hr> <hr> <hr>
	<div class="row mt10">
		<?php
			foreach( $services as $service ): 

			$first_service_icon = $service['_first_ss_icon'];
		?>

			<div class="col-md-4">
				<i class="fa <?php echo esc_attr( $first_service_icon );?>"></i>
				<h2> <?php echo esc_html($service['_first_ss_title']); ?> </h2>
				<?php echo apply_filters("the_content", $service['_first_ss_content']); ?> 
			</div>
        <?php endforeach;?>
	</div>
</div>



<?php get_footer(); ?>
