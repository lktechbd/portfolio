<?php  

function portfolio_skills_section_metabox($metaboxes){
    $section_id = 0;

    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }

    if('section'!=get_post_type($section_id)){
        return $metaboxes;
    }

    $section_meta = get_post_meta($section_id,'portfolio-section-type',true);
    $section_type = isset($section_meta['type'])? $section_meta['type']:'';
    if('skills'!=$section_type){
        return $metaboxes;
    }

    $metaboxes[] = array(
        'id'        => 'portfolio-section-skills',
        'title'     => __( 'Counter Settings', 'portfolio' ),
        'post_type' => 'section',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'     => 'portfolio-skills-section-one',
                'icon'   => 'fa fa-image',
                'fields' => array(

                    array(
                            'id'    => 'sub-title',
                            'title'   => __("Sub Title", 'portfolio' ),
                            'type'    => 'text',
                        ),

                    array(
                        'id'    => 'skills',
                        'title' => __('Skills Settings', 'portfolio'),
                        'type'  => 'group',
                        'button_title'    => __('New Skills','portfolio'),
                        'accordion_title' => __('Add New Skills','portfolio'),
                        'fields' => array(
                            
                            array(
                                'id'    => 'title',
                                'title'   => __("Skills Title", 'portfolio' ),
                                'type'    => 'text',
                            ),
                            
                            array(
                                'id'    	=> 'animate-effect',
                                'title'   	=> __("Select Effect", 'portfolio' ),
                                'type'    	=> 'select',
                                'options'	=> array(
                                	'fadeInRight' => __('Fade In Right', 'portfolio'),
                                	'fadeInLeft' => __('Fade In Left', 'portfolio'),
                                )
                            ),

                            array(
                                'id'    	=> 'bar-color',
                                'title'   	=> __("Select Color", 'portfolio' ),
                                'type'    	=> 'select',
                                'options'	=> array(
                                	'color-1' => __('Blue', 'portfolio'),
                                	'color-2' => __('Green', 'portfolio'),
                                	'color-3' => __('Yellow', 'portfolio'),
                                	'color-4' => __('Violet', 'portfolio'),
                                	'color-5' => __('Orange', 'portfolio'),
                                	'color-6' => __('Deep Blue', 'portfolio'),
                                )
                                
                            ),
                            array(
                                'id'   		=> 'skill-limit',
                                'title'   	=> __("Skill Limit", 'portfolio' ),
                                'type'    	=> 'text',
                            ),                            
                            
                        )
                    ),
                )
            ),

        )
    );

    return $metaboxes;
}
add_filter('cs_metabox_options','portfolio_skills_section_metabox');

