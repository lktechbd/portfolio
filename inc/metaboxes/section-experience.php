<?php

	function portfolio_experience_section_metabox($metaboxes){
		$section_id = 0;

		if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
			$section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
		}

		if('section'!=get_post_type($section_id)){
			return $metaboxes;
		}

		$section_meta = get_post_meta($section_id,'portfolio-section-type',true);
		$section_type = isset($section_meta['type'])? $section_meta['type']:'';
		if('experience'!=$section_type){
			return $metaboxes;
		}

		$metaboxes[] = array(
			'id'        => 'portfolio-section-experience',
			'title'     => __( 'Experience Settings', 'portfolio' ),
			'post_type' => 'section',
			'context'   => 'normal',
			'priority'  => 'default',
			'sections'  => array(
				array(
					'name'     => 'portfolio-experience-section-one',
					'icon'   => 'fa fa-image',
					'fields' => array(
						array(
							'id'    => 'sub-title',
							'title'   => __("Experience Sub Title", 'portfolio' ),
							'type'    => 'text',
						),

						array(
							'id'    => 'experiences',
							'title' => __('Experience Section', 'portfolio'),
							'type'  => 'group',
							'button_title'    => __('New Experience','portfolio'),
							'accordion_title' => __('Add New Experience','portfolio'),
							'fields' => array(
								array(
									'id'    => 'title',
									'title'   => __('Title', 'portfolio' ),
									'type'    => 'text',
								),
								array(
									'id'    => 'Year',
									'title'   => __('Year of Experience', 'portfolio' ),
									'type'    => 'text',
								),
								array(
									'id'    => 'desc',
									'title'   => __('Experience Detail', 'portfolio' ),
									'type'    => 'textarea',
								),
								array(
									'id'    => 'icon',
									'title'   => __('Icon Text', 'portfolio' ),
									'type'    => 'text',
								),
								array(
									'id'    => 'icon-class',
									'title'   => __('Icon color class', 'portfolio' ),
									'type'    => 'text',
								),
							)
						),
					)
				),

			)
		);

		return $metaboxes;
	}
	add_filter('cs_metabox_options','portfolio_experience_section_metabox');

