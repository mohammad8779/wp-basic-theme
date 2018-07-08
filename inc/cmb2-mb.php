<?php
add_action( 'cmb2_init', 'first_image_info_cmb2_add_metabox' );
function first_image_info_cmb2_add_metabox() {
   
   $prefix = '_first_';
   $cmb = new_cmb2_box( array(
		'id'           => $prefix.'image_information',
		'title'        => __( 'Image Information', 'first' ),
		'object_types' => array( 'post' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );

	$cmb->add_field( array(
		'name' => __( 'Camera Model', 'first' ),
		'id' => $prefix.'camera_model',
		'type' => 'text',
		'default' => 'canon',
	) );

	$cmb->add_field( array(
		'name' => __( 'Location', 'first' ),
		'id' => $prefix.'location',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Date', 'first' ),
		'id' => $prefix.'date',
		'type' => 'text_date',
	) );

	$cmb->add_field( array(
		'name' => __( 'License', 'first' ),
		'id' => $prefix.'license',
		'type' => 'checkbox',
	) );

	$cmb->add_field( array(
		'name' => __( 'License Information', 'first' ),
		'id' => $prefix.'license_information',
		'type' => 'textarea',
		'attributes' => array(
			'data-conditional-id' => $prefix.'license',
		),
	) );

	$cmb->add_field( array(
		'name' => __( 'Image', 'first' ),
		'id' => $prefix.'image',
		'type' => 'file',
	) );

	$cmb->add_field( array(
		'name' => __( 'Upload Resume', 'first' ),
		'id'   => $prefix.'upload',
		'type' => 'file',
		'text' => array(
           'add_upload_file_text' => __('Upload Pdf file','first')
		),
		'query_args' => array(
			'type' => array('application/pdf'),
		),
		'options' => array(
           'url' => false,
		),
	) );
}


function first_cmb2_add_pricing_table_metabox() {

	$prefix = '_first_pt_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'pricing_table',
		'title'        => __( 'Pricing Table', 'first' ),
		'object_types' => array( 'page' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );

	$group = $cmb->add_field( array(
		'name' => __( 'Pricing Table', 'first' ),
		'id' => $prefix . 'pricing_table',
		'type' => 'group',
	) );
   
   $cmb->add_group_field($group, array(
		'name' => __( 'Caption', 'first' ),
		'id' => $prefix . 'pricing_caption',
		'type' => 'text',
		
	) );

	$cmb->add_group_field($group, array(
		'name' => __( 'Pricing Option', 'first' ),
		'id' => $prefix . 'pricing_option',
		'type' => 'text',
		'repeatable' => true
	) );

	$cmb->add_group_field($group, array(
		'name' => __( 'Price', 'first' ),
		'id' => $prefix . 'price',
		'type' => 'text',
		
	) );

}

add_action( 'cmb2_init', 'first_cmb2_add_pricing_table_metabox' );

//Services Section metabox code

add_action( 'cmb2_init', 'first_cmb2_ss_add_metabox' );
function first_cmb2_ss_add_metabox() {

	$prefix = '_first_ss_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'services',
		'title'        => __( 'Service Section', 'first' ),
		'object_types' => array( 'page' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );

	$servic = $cmb->add_field( array(
		'name' => __( 'services', 'first' ),
		'id' => $prefix . 'services',
		'type' => 'group',
	) );

	$cmb->add_group_field($servic, array(
		'name' => __( 'icon', 'first' ),
		'id' => $prefix . 'icon',
		'type' => 'text',
	) );

	$cmb->add_group_field($servic, array(
		'name' => __( 'title', 'first' ),
		'id' => $prefix . 'title',
		'type' => 'text',
	) );

	$cmb->add_group_field($servic, array(
		'name' => __( 'content', 'first' ),
		'id' => $prefix . 'content',
		'type' => 'textarea',
	) );

}



