<?php


	function portfolio_testimonial_section_metabox($metaboxes){
		$section_id = 0;


		if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
			$section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
		}

		if('section' != get_post_type($section_id)){
			return $metaboxes;
		}

		$section_meta = get_post_meta($section_id, 'portfolio-section-type', true);
		$section_type = isset($section_meta['type'])? $section_meta['type']:'';

		if('home' != $section_type){
			return $metaboxes;
		}

		$metaboxes[] = array(
			'id'        => 'portfolio-section-home',
			'title'     => __( 'Home Settings', 'portfolio' ),
			'post_type' => 'section',
			'context'   => 'normal',
			'priority'  => 'default',
			'sections'  => array(
				array(
					'id'     => 'portfolio-home-one',
					'icon'   => 'fa fa-image',
					'fields' => array(
						array(
							'id'    			=> 'sliders',
							'title'   			=> __( 'Home Slider', 'portfolio' ),
							'type'    			=> 'group',
							'button_title'    	=> __('New Slide','portfolio'),
							'accordion_title' 	=> __('Add New Slide','portfolio'),
							'fields'			=>array(

								array(
									'id'    => 'title',
									'type'  => 'text',
									'title' => __('Title','portfolio'),
								),
								array(
									'id'    => 'desc',
									'type'  => 'text',
									'title' => __('Slider Description ','portfolio'),
								),
								array(
									'id'    => 'image',
									'type'  => 'image',
									'title' => __('Image','portfolio'),
								),

								array(
									'id'    => 'button',
									'type'  => 'text',
									'title' => __('Button Text','portfolio'),
								)
							)
						)
					),
				)
			),


		);

		return $metaboxes;
	}
	add_filter('cs_metabox_options', 'portfolio_testimonial_section_metabox');