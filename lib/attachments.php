<?php
define( 'ATTACHMENTS_SETTINGS_SCREEN', false );
add_filter( 'attachments_default_instance', '__return_false' );
function first_slider_attachments($attachments){
	$fields = array(
		array(
			'name'  => 'title',
			'type'  => 'text',
			'label' => __('Title','first')
		)
	);

	$args = array(

		'label'       => 'Featured Slider',
		'post_type'   => array('post'),
		'file_type'   => array("image"),
		'note'       => 'Add Slider Image',
		'button_text' => __('Attach Files','first'),
		'fields'      => $fields
     );

	$attachments->register('slider', $args);

	
}
add_action("attachments_register","first_slider_attachments");


function first_testimonials_attachments($attachments){
	$fields = array(
		array(
			'name'  => 'name',
			'type'  => 'text',
			'label' => __('Name','first')
		),
		array(
			'name'  => 'position',
			'type'  => 'text',
			'label' => __('Position','first')
		),
		array(
			'name'  => 'company',
			'type'  => 'text',
			'label' => __('Company','first')
		),

		array(
			'name'  => 'testimonials',
			'type'  => 'text',
			'label' => __('Testimonial','first')
		),
	);

	$args = array(

		'label'       => 'Testimonials',
		'post_type'   => array('page'),
		'file_type'   => array("image"),
		'note'       => 'Add Testimonial',
		'button_text' => __('Attach Files','first'),
		'fields'      => $fields
     );

	$attachments->register('testimonial', $args);

	
}
add_action("attachments_register","first_testimonials_attachments");


function first_team_attachments($attachments){
	$fields = array(
		array(
			'name'  => 'name',
			'type'  => 'text',
			'label' => __('Name','first')
		),
		array(
			'name'  => 'email',
			'type'  => 'text',
			'label' => __('Email','first')
		),
		array(
			'name'  => 'position',
			'type'  => 'text',
			'label' => __('Position','first')
		),
		array(
			'name'  => 'company',
			'type'  => 'text',
			'label' => __('Company','first')
		),

		array(
			'name'  => 'bio',
			'type'  => 'textarea',
			'label' => __('Bio','first')
		),
	);

	$args = array(

		'label'       => 'Team Member',
		'post_type'   => array('page'),
		'file_type'   => array("image"),
		'note'       => 'Add Member',
		'button_text' => __('Attach Files','first'),
		'fields'      => $fields
     );

	$attachments->register('team', $args);

	
}
add_action("attachments_register","first_team_attachments");