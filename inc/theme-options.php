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

    Container::make( 'theme_options', __( 'Navigation', 'zayn' ) )
        ->set_page_menu_position( 3 )
        ->set_icon( 'dashicons-menu' )
        ->add_fields( array(
            Field::make( 'complex', 'main_navigation_items', __( 'Top Menu Items', 'zayn' ) )
                ->add_fields( array(
                    Field::make( 'text', 'label', __( 'Label', 'zayn' ) )
                        ->set_required( true ),
                    Field::make( 'text', 'url', __( 'URL', 'zayn' ) )
                        ->set_required( true ),
                    Field::make( 'checkbox', 'has_mega_menu', __( 'Has Mega Menu', 'zayn' ) ),
                    
                    Field::make( 'complex', 'sub_menu_links', __( 'Sub Menu Links', 'zayn' ) )
                        ->add_fields( array(
                            Field::make( 'text', 'label', __( 'Label', 'zayn' ) )->set_required( true ),
                            Field::make( 'text', 'url', __( 'URL', 'zayn' ) )->set_required( true ),
                        ) )
                        ->set_layout( 'tabbed-horizontal' )
                        ->set_header_template( '<% if (label) { %><%- label %><% } else { %>Sub Link<% } %>' )
                        ->set_conditional_logic( array(
                            array(
                                'field' => 'has_mega_menu',
                                'value' => true,
                            )
                        ) ),
                        
                    Field::make( 'image', 'mega_menu_bg', __( 'Mega Menu Background Image', 'zayn' ) )
                        ->set_value_type( 'url' )
                        ->set_conditional_logic( array(
                            array(
                                'field' => 'has_mega_menu',
                                'value' => true,
                            )
                        ) ),
                        
                    Field::make( 'association', 'mega_menu_products', __( 'Featured Products', 'zayn' ) )
                        ->set_types( array(
                            array(
                                'type' => 'post',
                                'post_type' => 'product',
                            )
                        ) )
                        ->set_max( 3 )
                        ->set_conditional_logic( array(
                            array(
                                'field' => 'has_mega_menu',
                                'value' => true,
                            )
                        ) ),
                ) )
                ->set_layout( 'tabbed-vertical' )
                ->set_header_template( '<% if (label) { %><%- label %><% } else { %>Menu Item<% } %>' ),
        ) );
}