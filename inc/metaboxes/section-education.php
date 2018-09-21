<?php

	function portfolio_education_section_metabox($metaboxes){
		$section_id = 0;

		if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
			$section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
		}

		if('section'!=get_post_type($section_id)){
			return $metaboxes;
		}

		$section_meta = get_post_meta($section_id,'portfolio-section-type',true);
		$section_type = isset($section_meta['type'])? $section_meta['type']:'';
		if('education'!=$section_type){
			return $metaboxes;
		}

		$metaboxes[] = array(
			'id'        => 'portfolio-section-education',
			'title'     => __( 'Education Settings', 'portfolio' ),
			'post_type' => 'section',
			'context'   => 'normal',
			'priority'  => 'default',
			'sections'  => array(
				array(
					'name'     => 'portfolio-about-section-one',
					'icon'   => 'fa fa-image',
					'fields' => array(
						array(
							'id'    => 'sub-title',
							'title'   => __("Education Sub Title", 'portfolio' ),
							'type'    => 'text',
						),

						array(
							'id'    => 'educations',
							'title' => __('Education Section', 'portfolio'),
							'type'  => 'group',
							'button_title'    => __('New Tab','portfolio'),
							'accordion_title' => __('Add New Tab','portfolio'),
							'fields' => array(
								array(
									'id'    => 'title',
									'title'   => __('Tab Title', 'portfolio' ),
									'type'    => 'text',
								),
								array(
									'id'    => 'tab-content',
									'title'   => __('Tab Content', 'portfolio' ),
									'type'    => 'textarea',
								),

								array(
									'id'    => 'tab-heading',
									'title'   => __('Tab Heading', 'portfolio' ),
									'type'    => 'text',
								),
								array(
									'id'    => 'tab-id',
									'title'   => __('Tab ID', 'portfolio' ),
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
	add_filter('cs_metabox_options','portfolio_education_section_metabox');

