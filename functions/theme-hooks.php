<?php
// add_action( 'action_before_footer', 'bottom_section_fnc', 10, 1 );
// function bottom_section_fnc ($page_details) {
//  get_template_part( 'template-parts/section', 'bottom' );
// }

add_action( 'wp_head', 'remove_theme_actions' );
function remove_theme_actions () {
    remove_action( 'action_above_header', 'small_device_logo_fnc' );
    remove_action( 'mos_welcome_content', 'mos_welcome_media_fnc', 15, 1 );
}
add_action( 'init', 'child_text_layout_manager' );
function child_text_layout_manager () {
    global $mosacademy_options;
    //Testimonial
    if ($mosacademy_options['sections-testimonial-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_testimonial', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_testimonial', 'start_row', 11, 1 );
        add_action( 'action_before_testimonial', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_testimonial', 'end_div', 10, 1 );
        add_action( 'action_after_testimonial', 'end_div', 11, 1 );
        add_action( 'action_after_testimonial', 'end_div', 12, 1 );   
    } elseif ($mosacademy_options['sections-testimonial-text-layout'] == 'container-fliud') {
        add_action( 'action_before_testimonial', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_testimonial', 'end_div', 10, 1 );
    } elseif ($mosacademy_options['sections-testimonial-text-layout'] == 'container-full') {
        add_action( 'action_before_testimonial', 'start_full_width', 10, 1 );
        add_action( 'action_after_testimonial', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_testimonial', 'start_container', 10, 1 );
        add_action( 'action_after_testimonial', 'end_div', 10, 1 );
    }
    //Opening Hours
    if ($mosacademy_options['sections-opening-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_opening', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_opening', 'start_row', 11, 1 );
        add_action( 'action_before_opening', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_opening', 'end_div', 10, 1 );
        add_action( 'action_after_opening', 'end_div', 11, 1 );
        add_action( 'action_after_opening', 'end_div', 12, 1 );   
    } elseif ($mosacademy_options['sections-opening-text-layout'] == 'container-fliud') {
        add_action( 'action_before_opening', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_opening', 'end_div', 10, 1 );
    } elseif ($mosacademy_options['sections-opening-text-layout'] == 'container-full') {
        add_action( 'action_before_opening', 'start_full_width', 10, 1 );
        add_action( 'action_after_opening', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_opening', 'start_container', 10, 1 );
        add_action( 'action_after_opening', 'end_div', 10, 1 );
    }
}
add_action( 'action_after_welcome', 'mos_welcome_media_fnc_custom', 999, 1 );
function mos_welcome_media_fnc_custom(){

    global $mosacademy_options;
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
        $alt_tag = mos_alt_generator(get_the_ID());
    }  
    $title = $mosacademy_options['sections-welcome-title'];   
    $image = wp_get_attachment_url( $mosacademy_options['sections-welcome-media']['id']);    
    $image_align = $mosacademy_options['sections-welcome-media-align'];
    echo '</div>';
    if ($image) echo '<div class="img-'. $image_align .'"><img class="img-welcome" src="'.$image.'" width="'.$mosacademy_options['sections-welcome-media']['width'].'" height="'.$mosacademy_options['sections-welcome-media']['height'].'" alt="'.$alt_tag['inner'] . strip_tags(do_shortcode($title)) . '"></div>';
}



