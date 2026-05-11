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
                    Field::make( 'image', 'image', __( 'Image', 'ahadul' ) ),
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

    Block::make( __( 'Services CTA Home 1', 'ahadul' ) )
        ->set_icon( 'megaphone' )
        ->set_description( __( 'A services call-to-action block with background image and button.', 'ahadul' ) )
        ->set_category( 'design', __( 'Design', 'ahadul' ), 'star-filled' )
        ->set_keywords( [ __( 'services' ), __( 'cta' ), __( 'home' ) ] )
        ->add_fields( array(
            Field::make( 'text', 'title', __( 'Title', 'ahadul' ) ),

            Field::make( 'complex', 'services_cta_items', __( 'CTA Items', 'ahadul' ) )
                ->add_fields( array(
                    Field::make( 'image', 'bg_image', __( 'Background Image', 'ahadul' ) ),
                    Field::make( 'text', 'btn_title', __( 'Button Title', 'ahadul' ) ),
                    Field::make( 'text', 'btn_link', __( 'Button Link', 'ahadul' ) ),
                ) )
                ->set_layout( 'tabbed-horizontal' )
        ) )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
            set_query_var( 'block_data', $fields );
            get_template_part( 'components/services-cta-home' );
        } );

    Block::make( __( 'Shop Page Banner', 'ahadul' ) )
        ->set_icon( 'cart' )
        ->set_description( __( 'A shop page banner block with title, detail, and image.', 'ahadul' ) )
        ->set_category( 'design', __( 'Design', 'ahadul' ), 'star-filled' )
        ->set_keywords( [ __( 'shop' ), __( 'banner' ) ] )
        ->add_fields( array(
            Field::make( 'text', 'title', __( 'Title', 'ahadul' ) ),
            Field::make( 'textarea', 'detail', __( 'Detail', 'ahadul' ) ),
            Field::make( 'image', 'image', __( 'Image', 'ahadul' ) ),
        ) )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
            set_query_var( 'block_data', $fields );
            get_template_part( 'components/shop-page-banner' );
        } );

    Block::make( __( 'All Product Display', 'ahadul' ) )
        ->set_icon( 'store' )
        ->set_description( __( 'Displays a grid of all available published products.', 'ahadul' ) )
        ->set_category( 'design', __( 'Design', 'ahadul' ), 'star-filled' )
        ->set_keywords( [ __( 'products' ), __( 'shop' ), __( 'grid' ) ] )
        ->add_fields( array(
            Field::make( 'text', 'title', __( 'Section Title', 'ahadul' ) ),
        ) )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
            set_query_var( 'block_data', $fields );
            get_template_part( 'components/all-product-display' );
        } );

    Block::make( __( 'All Treatment Display', 'ahadul' ) )
        ->set_icon( 'heart' )
        ->set_description( __( 'Displays a grid of all available published treatments.', 'ahadul' ) )
        ->set_category( 'design', __( 'Design', 'ahadul' ), 'star-filled' )
        ->set_keywords( [ __( 'treatments' ), __( 'grid' ), __( 'list' ) ] )
        ->add_fields( array(
            Field::make( 'text', 'title', __( 'Section Title', 'ahadul' ) ),
        ) )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
            set_query_var( 'block_data', $fields );
            get_template_part( 'components/all-treatment-display' );
        } );


    Block::make( __( 'Treatment Page Banner', 'ahadul' ) )
        ->set_icon( 'cart' )
        ->set_description( __( 'Treatment page banner.', 'ahadul' ) )
        ->set_category( 'design', __( 'Design', 'ahadul' ), 'star-filled' )
        ->set_keywords( [ __( 'Treatment' ), __( 'banner' ) ] )
        ->add_fields( array(
            Field::make( 'text', 'title', __( 'Title', 'ahadul' ) ),
            Field::make( 'textarea', 'detail', __( 'Detail', 'ahadul' ) ),
        ) )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
            set_query_var( 'block_data', $fields );
            get_template_part( 'components/treatment-page-banner' );
        } );
}