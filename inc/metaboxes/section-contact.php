<?php  

function portfolio_contact_section_metabox($metaboxes){
    $section_id = 0;

    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }

    if('section'!=get_post_type($section_id)){
        return $metaboxes;
    }

    $section_meta = get_post_meta($section_id,'portfolio-section-type',true);
    $section_type = isset($section_meta['type'])? $section_meta['type']:'';
    if('contact'!=$section_type){
        return $metaboxes;
    }

    $metaboxes[] = array(
        'id'        => 'portfolio-section-contact',
        'title'     => __( 'Contact Settings', 'portfolio' ),
        'post_type' => 'section',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'     => 'portfolio-contact-section-one',
                'icon'   => 'fa fa-image',
                'fields' => array(
                    array(
                        'id'    => 'sub-title',
                        'title'   => __("Contact Sub Title", 'portfolio' ),
                        'type'    => 'text',
                    ),
                    array(
                        'id'    => 'contacts',
                        'title' => __('Contact Section', 'portfolio'),
                        'type'  => 'group',
                        'button_title'    => __('New Contact','portfolio'),
                        'accordion_title' => __('Add New Contact','portfolio'),
                        'fields' => array(
                            array(
                                'id'    => 'title',
                                'title'   => __('Contact Title', 'portfolio' ),
                                'type'    => 'text',
                            ),
                            array(
                                'id'    => 'icon',
                                'title'   => __('Contact Icon', 'portfolio' ),
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
add_filter('cs_metabox_options','portfolio_contact_section_metabox');

