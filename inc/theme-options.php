<?php
/**
 * Theme Options
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// add_action( 'carbon_fields_register_fields', 'ahadul_register_theme_options' );
// function ahadul_register_theme_options() {
//     Container::make( 'theme_options', __( 'Site Settings', 'ahadul' ) )
//         ->set_page_menu_title( 'Site Settings' )
//         ->add_fields( array(
//             Field::make( 'textarea', 'top_message', __( 'Top Message', 'ahadul' ) ),
//             Field::make( 'text', 'phone_number', __( 'Phone Number', 'ahadul' ) ),
//         ) );
// }

/**
 * Create Site Settings Page
 */
add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );

function crb_attach_theme_options() {

    Container::make( 'theme_options', __( 'Site Settings', 'your-textdomain' ) )
        ->set_page_menu_position( 2 ) // top-level position
        ->set_icon( 'dashicons-admin-generic' )

        ->add_fields( array(

            Field::make( 'text', 'site_phone_number', 'Phone Number' )
                ->set_help_text( 'Enter the site contact phone number.' ),

            Field::make( 'textarea', 'site_banner_message', 'Banner Message' )
                ->set_rows( 4 )
                ->set_help_text( 'This message can be shown in the site banner.' ),

        ) );
}