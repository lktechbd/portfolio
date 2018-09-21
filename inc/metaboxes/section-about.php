<?php  

function portfolio_about_section_metabox($metaboxes){
    $section_id = 0;

    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }

    if('section'!=get_post_type($section_id)){
        return $metaboxes;
    }

    $section_meta = get_post_meta($section_id,'portfolio-section-type',true);
    $section_type = isset($section_meta['type'])? $section_meta['type']:'';
    if('about'!=$section_type){
        return $metaboxes;
    }

    $metaboxes[] = array(
        'id'        => 'portfolio-section-about',
        'title'     => __( 'About Settings', 'portfolio' ),
        'post_type' => 'section',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'     => 'portfolio-about-section-one',
                'icon'   => 'fa fa-image',
                'fields' => array(
                    array(
                        'id'    => 'title',
                        'title'   => __("About Title", 'portfolio' ),
                        'type'    => 'text',
                    ),
                    array(
                        'id'    => 'hire',
                        'title' => __( 'Hire Text', 'portfolio' ),
                        'type'  => 'textarea',
                    ),
                    array(
                        'id'    => 'button',
                        'title' => __( 'Hire Button', 'portfolio' ),
                        'type'  => 'text',
                    ),
                    array(
                        'id'    => 'services',
                        'title' => __('Service Section', 'portfolio'),
                        'type'  => 'group',
                        'button_title'    => __('New Service','portfolio'),
                        'accordion_title' => __('Add New Service','portfolio'),
                        'fields' => array(
                            array(
                                'id'    => 'title',
                                'title'   => __('Service Title', 'portfolio' ),
                                'type'    => 'text',
                            ),
                            array(
                                'id'    => 'icon',
                                'title'   => __('Service Icon', 'portfolio' ),
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
add_filter('cs_metabox_options','portfolio_about_section_metabox');

