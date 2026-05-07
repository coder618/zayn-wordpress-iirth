<?php
/**
 * Register Carbon Fields Blocks
 */
use Carbon_Fields\Container;
use Carbon_Fields\Block;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'ahadul_register_custom_blocks' );
function ahadul_register_custom_blocks() {

    Block::make( __( 'Banner Black Component', 'ahadul' ) )
        ->set_icon( 'video-alt3' )
        ->set_description( __( 'A black banner block with background video, heading and details.', 'ahadul' ) )
        ->set_category( 'design', __( 'Design', 'ahadul' ), 'star-filled' )
        ->set_keywords( [ __( 'banner' ), __( 'black' ), __( 'video' ) ] )
        ->add_fields( array(
            Field::make( 'file', 'banner_black_video', __( 'Background Video', 'ahadul' ) )
                ->set_type( array( 'video' ) ),
            Field::make( 'text', 'banner_black_h1', __( 'Heading (H1)', 'ahadul' ) ),
            Field::make( 'textarea', 'banner_black_p', __( 'Details (P)', 'ahadul' ) ),
            Field::make( 'select', 'banner_black_social_platform', __( 'Social Media Platform', 'ahadul' ) )
                ->set_options( array(
                    ''            => __( 'None', 'ahadul' ),
                    'facebook'    => __( 'Facebook', 'ahadul' ),
                    'instagram'   => __( 'Instagram', 'ahadul' ),
                    'tripadvisor' => __( 'TripAdvisor', 'ahadul' ),
                ) ),
            Field::make( 'text', 'banner_black_social_link', __( 'Social Media Link', 'ahadul' ) ),
        ) )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
            set_query_var( 'block_data', $fields );
            get_template_part( 'components/banner-black' );
        } );

    Block::make( __( 'Home Banner Component', 'ahadul' ) )
        ->set_icon( 'cover-image' )
        ->set_description( __( 'A home banner block with title, details, and button.', 'ahadul' ) )
        ->set_category( 'design', __( 'Design', 'ahadul' ), 'star-filled' )
        ->set_keywords( [ __( 'banner' ), __( 'home' ) ] )
        ->add_fields( array(
            Field::make( 'complex', 'home_banner_items', __( 'Banner Items', 'ahadul' ) )
                ->add_fields( array(
                    Field::make( 'text', 'title', __( 'Title', 'ahadul' ) ),
                    Field::make( 'textarea', 'detail', __( 'Detail', 'ahadul' ) ),
                    Field::make( 'text', 'btn_title', __( 'Button Title', 'ahadul' ) ),
                    Field::make( 'text', 'btn_link', __( 'Button Link', 'ahadul' ) ),
                ) )
                ->set_layout( 'tabbed-horizontal' )
        ) )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
            set_query_var( 'block_data', $fields );
            get_template_part( 'components/home-banner' );
        } );
}