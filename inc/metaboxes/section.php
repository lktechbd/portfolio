<?php
	function portfolio_section_type_metabox( $metaboxes ) {
		$metaboxes[] = array(
			'id'        => 'portfolio-section-type',
			'title'     => __( 'section type', 'portfolio' ),
			'post_type' => 'section',
			'context'   => 'normal',
			'priority'  => 'default',
			'sections'  => array(
				array(
					'name'     => 'portfolio-section-type-section-one',
					'icon'   => 'fa fa-image',
					'fields' => array(
						array(
							'id'    => 'type',
							'title'   => __( 'Select section type', 'portfolio' ),
							'type'    => 'select',
							'options' => array(
								'home'       	=> __( 'Home', 'portfolio' ),
								'about'     	=> __( 'About', 'portfolio' ),
								'services'     	=> __( 'Services', 'portfolio' ),
								'skills'      	=> __( 'Skills', 'portfolio' ),
								'counter'      	=> __( 'Counter', 'portfolio' ),
								'education'     => __( 'Education', 'portfolio' ),
								'experience'    => __( 'Experience', 'portfolio' ),
								'work'  		=> __( 'Work', 'portfolio' ),
								'blog' 			=> __( 'Blog', 'portfolio' ),
								'contact'      	=> __( 'Contact', 'portfolio' ),


							)
						),
					)
				),

			)
		);

		return $metaboxes;
	}

	add_filter( 'cs_metabox_options', 'portfolio_section_type_metabox' );

