<?php
	define( 'ATTACHMENTS_SETTINGS_SCREEN', false ); // disable the Settings screen
	add_filter( 'attachments_default_instance', '__return_false' ); // disable the default instance


	function portfolio_testimonial($attachments){
		$fields = array(
			array(
				'name' 		=> 'name',
				'type' 		=> 'text',
				'label' 	=> __('Name', 'portfolio'),
			),
			array(
				'name'		=> 'position',
				'type'		=>	'text',
				'label'		=> __('Position', 'portfolio'),
			),
			array(
				'name'		=> 'country',
				'type'		=>	'text',
				'label'		=> __('Country Name', 'portfolio'),
			),

		);

		$args = array(
			'label'			=> 'Testimonial Slider',
			'post_type'		=> array('page'),
			'field_type'	=> array('image'),
			'note'			=> 'Add Testimonial',
			'button_text'	=> __('Add Testimonial', 'portfolio'),
			'fields'		=> $fields,
		);

		$attachments->register( 'testimonials', $args );
	}
	add_action("attachments_register", "portfolio_testimonial");