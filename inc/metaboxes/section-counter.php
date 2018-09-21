<?php  

function portfolio_counter_section_metabox($metaboxes){
    $section_id = 0;

    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }

    if('section'!=get_post_type($section_id)){
        return $metaboxes;
    }

    $section_meta = get_post_meta($section_id,'portfolio-section-type',true);
    $section_type = isset($section_meta['type'])? $section_meta['type']:'';
    if('counter'!=$section_type){
        return $metaboxes;
    }

    $metaboxes[] = array(
        'id'        => 'portfolio-section-counter',
        'title'     => __( 'Counter Settings', 'portfolio' ),
        'post_type' => 'section',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'     => 'portfolio-counter-section-one',
                'icon'   => 'fa fa-image',
                'fields' => array(

                    array(
                            'id'    => 'counter_image',
                            'title'   => __("Background Image", 'portfolio' ),
                            'type'    => 'image',
                        ),

                    array(
                        'id'    => 'counters',
                        'title' => __('Counter Settings', 'portfolio'),
                        'type'  => 'group',
                        'button_title'    => __('New Counter','portfolio'),
                        'accordion_title' => __('Add New Counter','portfolio'),
                        'fields' => array(
                            
                            array(
                                'id'    => 'title',
                                'title'   => __("Counter Title", 'portfolio' ),
                                'type'    => 'text',
                            ),
                            
                            array(
                                'id'    => 'data-to',
                                'title'   => __("Data To", 'portfolio' ),
                                'type'    => 'text',
                            ),
                            array(
                                'id'    => 'data-speed',
                                'title'   => __("Data Speed", 'portfolio' ),
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
add_filter('cs_metabox_options','portfolio_counter_section_metabox');

