<?php
function add_dumketo_theme_functions($sections){
    global $container_list, $animations, $section_list, $bootstrap_grids, $col_ratio;
    $page_sections = array_diff($section_list,array('banner' => 'Banner Section', 'welcome' => 'Welcome Section'));

    // $sections[] = array(
    //     'title'            => __( 'Child theme', 'redux-framework-demo' ),
    //     'id'               => 'child-theme',
    //     'desc'             => '',
    //     'customizer_width' => '400px',
    //     'icon'             => 'el el-move'
    // );
    $sections[] = array(
        'title'            => __( 'Testimonial Section', 'redux-framework-demo' ),
        'id'               => 'sections-testimonial',
        'desc'             => '',
        'customizer_width' => '450px',
        'subsection' => true,
        'icon'             => 'el el-move',
        'fields'     => array(
            array(
                'id'       => 'sections-testimonial-text-layout',
                'type'     => 'radio',
                'title'    => __( 'Inner Content Width', 'redux-framework-demo' ),
                'options'  => $container_list,
                'default'  => 'container'
            ),
            array(
                'id'             => 'sections-testimonial-padding',
                'type'           => 'spacing',
                'mode'           => 'padding',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-testimonial .content-wrap' ),
                'title'          => __( 'Section Padding', 'redux-framework-demo' ),
            ),  
            array(
                'id'             => 'sections-testimonial-margin',
                'type'           => 'spacing',
                'mode'           => 'margin',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-testimonial .content-wrap' ),
                'title'          => __( 'Section Margin', 'redux-framework-demo' ),
            ),        
            array(
                'id'       => 'sections-testimonial-border',
                'type'     => 'border',
                'title'    => __( 'Section Border', 'redux-framework-demo' ),
                'output'   => array( '#section-testimonial .content-wrap' ),
                'all'      => false,
            ),
            array(
                'id'       => 'sections-testimonial-animation',
                'type'     => 'select',
                'title'    => __( 'Animation Style for this section', 'redux-framework-demo' ),
                'options'  => $animations,
                'validate' => 'no_html',
            ),
            array(
                'id'       => 'sections-testimonial-animation-delay',
                'type'     => 'text',
                'title'    => __( 'Animation Delay for this section', 'redux-framework-demo' ),
                'subtitle' => __( 'This must be numeric.', 'redux-framework-demo' ),
                'desc'     => __( 'Unit will be second.', 'redux-framework-demo' ),
                'validate' => 'numeric',
                'default'  => '0',
            ),
            array(
                'id'       => 'sections-testimonial-title',
                'type'     => 'text',
                'title'    => __( 'Section Title', 'redux-framework-demo' ),
                'desc'     => 'You can use span tag ( &lt;span&gt;&lt;/span&gt;, &lt;strong&gt;&lt;/strong&gt;, &lt;em&gt;&lt;/em&gt;, &lt;br /&gt;) here.',
                'validate'     => 'html_custom',
                'allowed_html' => array(
                    'br'     => array(),
                    'em'     => array(),
                    'strong' => array(),
                    
                    'span' => array(
                        'id' => array(),
                        'class' => array()
                    )
                )
            ),
            array(
                'id'      => 'sections-testimonial-content',
                'type'    => 'editor',
                'title'   => __( 'Section Content', 'redux-framework-demo' ),
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    //'tabindex' => 1,
                    //'editor_css' => '',
                    'teeny'         => false,
                    //'tinymce' => array(),
                    //'quicktags'     => false,
                )
            ),
            array(
                'id'       => 'sections-testimonial-shortcode',
                'type'     => 'text',
                'title'    => __( 'Shortcode', 'redux-framework-demo' ),
                'desc'     => __( 'All HTML will be stripped', 'redux-framework-demo' ),
                'validate'     => 'no_html',
            ),
            array(
                'id'       => 'sections-testimonial-view-more',
                'type'     => 'mos_group',                
                'title'    => 'View More Link(if any)',
                'show' => array (
                    'text_field_1' => true,
                    'text_field_2' => true,
                    'text_field_3' => true,
                    'text_field_4' => true,
                ),
                'placeholder' => array(
                   'text_field_1' => 'Text',
                   'text_field_2' => 'URL',
                   'text_field_3' => 'Container Class',
                   'text_field_4' => 'Link Class',
                )
            ),

            array(
                'id'       => 'sections-testimonial-background-type',
                'type'     => 'button_set',
                'title'    => __( 'Background Type', 'redux-framework-demo' ),
                'options'  => array(
                    '1' => 'Gradient',
                    '2' => 'Solid Color/Image',
                    '3' => 'RGBA Color'
                ),
                'default'  => '2',
            ),

            array(
                'id'     => 'sections-testimonial-background-start',
                'type'   => 'section',
                'indent' => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'sections-testimonial-background-gradient',
                'type'     => 'color_gradient',
                'title'    => __( 'Section Background', 'redux-framework-demo' ),
                'validate' => 'color',  
                'output'   => array( '#section-testimonial' ),            
                'required' => array( 'sections-testimonial-background-type', '=', '1' ),
            ),
            array(
                'id'       => 'sections-testimonial-background-solid',
                'type'     => 'background',                
                'title'    => __( 'Section Background', 'redux-framework-demo' ),
                'output'   => array( '#section-testimonial' ),
                'required' => array( 'sections-testimonial-background-type', '=', '2' ),
            ),
            array(
                'id'       => 'sections-testimonial-background-rgba',
                'type'     => 'color_rgba',
                'title'    => __( 'Section Background', 'redux-framework-demo' ),
                'validate' => 'colorrgba',
                'output'   => array( '#section-testimonial' ),
                'mode'     => 'background',
                'required' => array( 'sections-testimonial-background-type', '=', '3' ),
            ),
            array(
                'id'     => 'sections-testimonial-background-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),
        )
    ); 
    $sections[] = array(
        'title'            => __( 'Opening Hours', 'redux-framework-demo' ),
        'id'               => 'sections-opening',
        'desc'             => '',
        'customizer_width' => '450px',
        'subsection' => true,
        'icon'             => 'el el-move',
        'fields'     => array(
            array(
                'id'       => 'sections-opening-text-layout',
                'type'     => 'radio',
                'title'    => __( 'Inner Content Width', 'redux-framework-demo' ),
                'options'  => $container_list,
                'default'  => 'container'
            ),
            array(
                'id'             => 'sections-opening-padding',
                'type'           => 'spacing',
                'mode'           => 'padding',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-opening .content-wrap' ),
                'title'          => __( 'Section Padding', 'redux-framework-demo' ),
            ),  
            array(
                'id'             => 'sections-opening-margin',
                'type'           => 'spacing',
                'mode'           => 'margin',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-opening .content-wrap' ),
                'title'          => __( 'Section Margin', 'redux-framework-demo' ),
            ),        
            array(
                'id'       => 'sections-opening-border',
                'type'     => 'border',
                'title'    => __( 'Section Border', 'redux-framework-demo' ),
                'output'   => array( '#section-opening .content-wrap' ),
                'all'      => false,
            ),
            array(
                'id'       => 'sections-opening-animation',
                'type'     => 'select',
                'title'    => __( 'Animation Style for this section', 'redux-framework-demo' ),
                'options'  => $animations,
                'validate' => 'no_html',
            ),
            array(
                'id'       => 'sections-opening-animation-delay',
                'type'     => 'text',
                'title'    => __( 'Animation Delay for this section', 'redux-framework-demo' ),
                'subtitle' => __( 'This must be numeric.', 'redux-framework-demo' ),
                'desc'     => __( 'Unit will be second.', 'redux-framework-demo' ),
                'validate' => 'numeric',
                'default'  => '0',
            ),
            array(
                'id'       => 'sections-opening-title',
                'type'     => 'text',
                'title'    => __( 'Section Title', 'redux-framework-demo' ),
                'desc'     => 'You can use span tag ( &lt;span&gt;&lt;/span&gt;, &lt;strong&gt;&lt;/strong&gt;, &lt;em&gt;&lt;/em&gt;, &lt;br /&gt;) here.',
                'validate'     => 'html_custom',
                'allowed_html' => array(
                    'br'     => array(),
                    'em'     => array(),
                    'strong' => array(),
                    
                    'span' => array(
                        'id' => array(),
                        'class' => array()
                    )
                )
            ),
            array(
                'id'      => 'sections-opening-content',
                'type'    => 'editor',
                'title'   => __( 'Section Content', 'redux-framework-demo' ),
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    //'tabindex' => 1,
                    //'editor_css' => '',
                    'teeny'         => false,
                    //'tinymce' => array(),
                    //'quicktags'     => false,
                )
            ),
            array(
                'id'       => 'sections-opening-background-type',
                'type'     => 'button_set',
                'title'    => __( 'Background Type', 'redux-framework-demo' ),
                'options'  => array(
                    '1' => 'Gradient',
                    '2' => 'Solid Color/Image',
                    '3' => 'RGBA Color'
                ),
                'default'  => '2',
            ),
            array(
                'id'     => 'sections-opening-background-start',
                'type'   => 'section',
                'indent' => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'sections-opening-background-gradient',
                'type'     => 'color_gradient',
                'title'    => __( 'Section Background', 'redux-framework-demo' ),
                'validate' => 'color',  
                'output'   => array( '#section-opening' ),            
                'required' => array( 'sections-opening-background-type', '=', '1' ),
            ),
            array(
                'id'       => 'sections-opening-background-solid',
                'type'     => 'background',                
                'title'    => __( 'Section Background', 'redux-framework-demo' ),
                'output'   => array( '#section-opening' ),
                'required' => array( 'sections-opening-background-type', '=', '2' ),
            ),
            array(
                'id'       => 'sections-opening-background-rgba',
                'type'     => 'color_rgba',
                'title'    => __( 'Section Background', 'redux-framework-demo' ),
                'validate' => 'colorrgba',
                'output'   => array( '#section-opening' ),
                'mode'     => 'background',
                'required' => array( 'sections-opening-background-type', '=', '3' ),
            ),
            array(
                'id'     => 'sections-opening-background-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),
        )
    ); 
    return $sections;
}
add_filter("redux/options/mosacademy_options/sections", 'add_dumketo_theme_functions');