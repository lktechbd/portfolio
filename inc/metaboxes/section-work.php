<?php

	function portfolio_work_section_metabox($metaboxes){
		$section_id = 0;

		if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
			$section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
		}

		if('section'!=get_post_type($section_id)){
			return $metaboxes;
		}

		$section_meta = get_post_meta($section_id,'portfolio-section-type',true);
		$section_type = isset($section_meta['type'])? $section_meta['type']:'';
		if('work'!=$section_type){
			return $metaboxes;
		}

		$metaboxes[] = array(
			'id'        => 'portfolio-section-work',
			'title'     => __( 'Works Settings', 'portfolio' ),
			'post_type' => 'section',
			'context'   => 'normal',
			'priority'  => 'default',
			'sections'  => array(
				array(
					'name'     => 'portfolio-work-section-one',
					'icon'   => 'fa fa-image',
					'fields' => array(
						array(
							'id'    => 'sub-title',
							'title'   => __("Work Sub Title", 'portfolio' ),
							'type'    => 'text',
							),

						array(
							'id'    => 'works',
							'title' => __('Work Section', 'portfolio'),
							'type'  => 'group',
							'button_title'    => __('New work','portfolio'),
							'accordion_title' => __('Add New work','portfolio'),
							'fields' => array(
								array(
									'id'    => 'title',
									'title'   => __('Name of Work', 'portfolio' ),
									'type'    => 'text',
								),
								array(
									'id'    => 'sub-title',
									'title'   => __('Number of Works', 'portfolio' ),
									'type'    => 'text',
								),

								array(
									'id'    => 'category',
									'title'   => __('Works Category', 'portfolio' ),
									'type'    => 'text',
								),
								array(
										'id'    => 'image',
										'title'   => __('Works Image', 'portfolio' ),
										'type'    => 'image',
								)
							)
						),
					)
				),
			)
		);

		return $metaboxes;
	}
	add_filter('cs_metabox_options','portfolio_work_section_metabox');

