<?php

	function portfolio_blog_section_metabox($metaboxes){
		$section_id = 0;

		if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
			$section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
		}

		if('section'!=get_post_type($section_id)){
			return $metaboxes;
		}

		$section_meta = get_post_meta($section_id,'portfolio-section-type',true);
		$section_type = isset($section_meta['type'])? $section_meta['type']:'';
		if('blog'!=$section_type){
			return $metaboxes;
		}

		$metaboxes[] = array(
			'id'        => 'portfolio-section-blog',
			'title'     => __( 'Blog Settings', 'portfolio' ),
			'post_type' => 'section',
			'context'   => 'normal',
			'priority'  => 'default',
			'sections'  => array(
				array(
					'name'     => 'portfolio-blog-section-one',
					'icon'   => 'fa fa-image',
					'fields' => array(
						array(
							'id'    	=> 'sub-title',
							'title'   	=> __("blog Sub Title", 'portfolio' ),
							'type'    	=> 'text',
							),
						array(
							'id'    	=> 'post-count',
							'title'   	=> __("Number of Post Shown", 'portfolio' ),
							'type'    	=> 'text',
							'default'	=> 6,
							),

					)
				),
			)
		);

		return $metaboxes;
	}
	add_filter('cs_metabox_options','portfolio_blog_section_metabox');

