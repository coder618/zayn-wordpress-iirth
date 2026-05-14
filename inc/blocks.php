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

    Block::make( __( 'Gallery Showcase', 'ahadul' ) )
        ->set_icon( 'format-gallery' )
        ->set_description( __( 'Displays a masonry gallery of multiple uploaded images.', 'ahadul' ) )
        ->set_category( 'design', __( 'Design', 'ahadul' ), 'star-filled' )
        ->set_keywords( [ __( 'gallery' ), __( 'showcase' ), __( 'images' ), __( 'masonry' ) ] )
        ->add_fields( array(
            Field::make( 'media_gallery', 'gallery_images', __( 'Gallery Images', 'ahadul' ) )
                ->set_type( array( 'image' ) ),
        ) )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
            set_query_var( 'block_data', $fields );
            get_template_part( 'components/gallery-showcase' );
        } );

    Block::make( __( 'Contact Form Shortcode', 'ahadul' ) )
        ->set_icon( 'email' )
        ->set_description( __( 'Displays a contact form using a shortcode.', 'ahadul' ) )
        ->set_category( 'design', __( 'Design', 'ahadul' ), 'star-filled' )
        ->set_keywords( [ __( 'contact' ), __( 'form' ), __( 'shortcode' ) ] )
        ->add_fields( array(
            Field::make( 'text', 'shortcode', __( 'Form Shortcode', 'ahadul' ) ),
        ) )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
            set_query_var( 'block_data', $fields );
            get_template_part( 'components/contact-form-shortcode' );
        } );

    Block::make( __( 'About Us Banner', 'ahadul' ) )
        ->set_icon( 'info' )
        ->set_description( __( 'An about us banner block with title, detail, and background image.', 'ahadul' ) )
        ->set_category( 'design', __( 'Design', 'ahadul' ), 'star-filled' )
        ->set_keywords( [ __( 'about' ), __( 'banner' ), __( 'us' ) ] )
        ->add_fields( array(
            Field::make( 'text', 'title', __( 'Title', 'ahadul' ) ),
            Field::make( 'textarea', 'detail', __( 'Detail', 'ahadul' ) ),
            Field::make( 'image', 'bg_image', __( 'Background Image', 'ahadul' ) ),
        ) )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
            set_query_var( 'block_data', $fields );
            get_template_part( 'components/about-us-banner' );
        } );

    Block::make( __( 'About Detail', 'ahadul' ) )
        ->set_icon( 'id' )
        ->set_description( __( 'An about detail block with title, detail, and image.', 'ahadul' ) )
        ->set_category( 'design', __( 'Design', 'ahadul' ), 'star-filled' )
        ->set_keywords( [ __( 'about' ), __( 'detail' ) ] )
        ->add_fields( array(
            Field::make( 'text', 'title', __( 'Title', 'ahadul' ) ),
            Field::make( 'textarea', 'detail', __( 'Detail', 'ahadul' ) ),
            Field::make( 'image', 'image', __( 'Image', 'ahadul' ) ),
        ) )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
            set_query_var( 'block_data', $fields );
            get_template_part( 'components/about-detail' );
        } );

    Block::make( __( 'About Quote', 'ahadul' ) )
        ->set_icon( 'testimonial' )
        ->set_description( __( 'An about quote block with detail and person name.', 'ahadul' ) )
        ->set_category( 'design', __( 'Design', 'ahadul' ), 'star-filled' )
        ->set_keywords( [ __( 'about' ), __( 'quote' ), __( 'testimonial' ) ] )
        ->add_fields( array(
            Field::make( 'textarea', 'detail', __( 'Detail', 'ahadul' ) ),
            Field::make( 'text', 'person_name', __( 'Person Name', 'ahadul' ) ),
        ) )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
            set_query_var( 'block_data', $fields );
            get_template_part( 'components/about-quote' );
        } );

    Block::make( __( 'Our Craftsmanship', 'ahadul' ) )
        ->set_icon( 'admin-tools' )
        ->set_description( __( 'Our craftsmanship block with title, detail, and image.', 'ahadul' ) )
        ->set_category( 'design', __( 'Design', 'ahadul' ), 'star-filled' )
        ->set_keywords( [ __( 'craftsmanship' ), __( 'about' ), __( 'detail' ) ] )
        ->add_fields( array(
            Field::make( 'text', 'title', __( 'Title', 'ahadul' ) ),
            Field::make( 'textarea', 'detail', __( 'Detail', 'ahadul' ) ),
            Field::make( 'image', 'image', __( 'Image', 'ahadul' ) ),
        ) )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
            set_query_var( 'block_data', $fields );
            get_template_part( 'components/our-craftsmanship' );
        } );

    Block::make( __( 'Product Listing', 'ahadul' ) )
        ->set_icon( 'store' )
        ->set_description( __( 'A product listing block with title, button, and selected products.', 'ahadul' ) )
        ->set_category( 'design', __( 'Design', 'ahadul' ), 'star-filled' )
        ->set_keywords( [ __( 'product' ), __( 'listing' ), __( 'shop' ) ] )
        ->add_fields( array(
            Field::make( 'text', 'title', __( 'Title', 'ahadul' ) ),
            Field::make( 'text', 'btn_title', __( 'Button Title', 'ahadul' ) ),
            Field::make( 'text', 'btn_link', __( 'Button Link', 'ahadul' ) ),
            Field::make( 'multiselect', 'product_ids', __( 'Products', 'ahadul' ) )
                ->set_options( function() {
                    $options = array();
                    $products = get_posts( array(
                        'post_type'   => 'product',
                        'post_status' => 'publish',
                        'numberposts' => -1,
                    ) );
                    
                    if ( ! empty( $products ) ) {
                        foreach ( $products as $product ) {
                            $options[ $product->ID ] = $product->post_title;
                        }
                    }
                    
                    return $options;
                } )
        ) )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
            $product_ids = [];
            if ( ! empty( $fields['product_ids'] ) && is_array( $fields['product_ids'] ) ) {
                $product_ids = $fields['product_ids'];
            }

            set_query_var( 'product_listing', array(
                'title'        => $fields['title'] ?? '',
                'has_shop_btn' => ! empty( $fields['btn_title'] ) || ! empty( $fields['btn_link'] ),
                'product_ids'  => $product_ids,
                'btn_title'    => $fields['btn_title'] ?? '',
                'btn_link'     => $fields['btn_link'] ?? '',
            ) );
            get_template_part( 'components/product-listing' );
        } );

    Block::make( __( 'Zayn Experience Home', 'ahadul' ) )
        ->set_icon( 'star-filled' )
        ->set_description( __( 'Zayn Experience Home block with title, detail, button and image.', 'ahadul' ) )
        ->set_category( 'design', __( 'Design', 'ahadul' ), 'star-filled' )
        ->set_keywords( [ __( 'experience' ), __( 'home' ), __( 'zayn' ) ] )
        ->add_fields( array(
            Field::make( 'checkbox', 'hide_logo', __( 'Hide Logo', 'ahadul' ) ),
            Field::make( 'rich_text', 'detail', __( 'Title with detail', 'ahadul' ) ),
            Field::make( 'text', 'btn_title', __( 'Button Title', 'ahadul' ) ),
            Field::make( 'text', 'btn_link', __( 'Button Link', 'ahadul' ) ),
            Field::make( 'image', 'image', __( 'Image', 'ahadul' ) ),
            
        ) )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
            set_query_var( 'block_data', $fields );
            get_template_part( 'components/zayn-experience-home' );
        } );

    Block::make( __( 'Home Image Slider', 'ahadul' ) )
        ->set_icon( 'images-alt2' )
        ->set_description( __( 'A home image slider block with title, detail, and image.', 'ahadul' ) )
        ->set_category( 'design', __( 'Design', 'ahadul' ), 'star-filled' )
        ->set_keywords( [ __( 'slider' ), __( 'image' ), __( 'home' ) ] )
        ->add_fields( array(
            Field::make( 'complex', 'slider_items', __( 'Slider Items', 'ahadul' ) )
                ->add_fields( array(
                    Field::make( 'text', 'title', __( 'Title', 'ahadul' ) ),
                    Field::make( 'textarea', 'detail', __( 'Detail', 'ahadul' ) ),
                    Field::make( 'image', 'image', __( 'Image', 'ahadul' ) ),
                    Field::make( 'text', 'link', __( 'Link', 'ahadul' ) ),
                ) )
                ->set_layout( 'tabbed-horizontal' )
        ) )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
            set_query_var( 'block_data', $fields );
            get_template_part( 'components/home-image-slider' );
        } );

    Block::make( __( 'Our Stores', 'ahadul' ) )
        ->set_icon( 'store' )
        ->set_description( __( 'Our Stores block with title and multiple stores.', 'ahadul' ) )
        ->set_category( 'design', __( 'Design', 'ahadul' ), 'star-filled' )
        ->set_keywords( [ __( 'stores' ), __( 'our' ), __( 'locations' ) ] )
        ->add_fields( array(
            Field::make( 'text', 'title', __( 'Title', 'ahadul' ) ),
            Field::make( 'complex', 'stores', __( 'Stores', 'ahadul' ) )
                ->add_fields( array(
                    Field::make( 'rich_text', 'title_with_detail', __( 'Title with detail', 'ahadul' ) ),
                    Field::make( 'image', 'image', __( 'Image', 'ahadul' ) ),
                    Field::make( 'text', 'view_details_link', __( 'View Details Link', 'ahadul' ) ),
                    Field::make( 'text', 'book_now_link', __( 'Book Now Link', 'ahadul' ) ),
                ) )
                ->set_layout( 'tabbed-horizontal' )
        ) )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
            set_query_var( 'block_data', $fields );
            get_template_part( 'components/our-stores' );
        } );

    Block::make( __( 'Quote Slider', 'ahadul' ) )
        ->set_icon( 'testimonial' )
        ->set_description( __( 'A slider block for quotes with detail and person name.', 'ahadul' ) )
        ->set_category( 'design', __( 'Design', 'ahadul' ), 'star-filled' )
        ->set_keywords( [ __( 'quote' ), __( 'slider' ), __( 'testimonial' ) ] )
        ->add_fields( array(
            Field::make( 'complex', 'quotes', __( 'Quotes', 'ahadul' ) )
                ->add_fields( array(
                    Field::make( 'textarea', 'detail', __( 'Detail', 'ahadul' ) ),
                    Field::make( 'text', 'person_name', __( 'Person Name', 'ahadul' ) ),
                ) )
                ->set_layout( 'tabbed-horizontal' )
        ) )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
            set_query_var( 'block_data', $fields );
            get_template_part( 'components/quote-slider' );
        } );

    Block::make( __( 'Booking Gallery CTA', 'ahadul' ) )
        ->set_icon( 'tickets-alt' )
        ->set_description( __( 'A booking CTA block with a large background and a 4-image gallery collage.', 'ahadul' ) )
        ->set_category( 'design', __( 'Design', 'ahadul' ), 'star-filled' )
        ->set_keywords( [ __( 'booking' ), __( 'gallery' ), __( 'cta' ) ] )
        ->add_fields( array(
            Field::make( 'text', 'title', __( 'Title', 'ahadul' ) ),
            Field::make( 'text', 'btn_title', __( 'Button Title', 'ahadul' ) ),
            Field::make( 'text', 'btn_link', __( 'Button Link', 'ahadul' ) ),
            Field::make( 'image', 'bg_image', __( 'Background Image', 'ahadul' ) ),
            Field::make( 'image', 'gallery_img_1', __( 'Gallery Image 1 (Top Right)', 'ahadul' ) ),
            Field::make( 'image', 'gallery_img_2', __( 'Gallery Image 2 (Middle Center)', 'ahadul' ) ),
            Field::make( 'image', 'gallery_img_3', __( 'Gallery Image 3 (Bottom Left)', 'ahadul' ) ),
            Field::make( 'image', 'gallery_img_4', __( 'Gallery Image 4 (Bottom Right)', 'ahadul' ) ),
        ) )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
            set_query_var( 'block_data', $fields );
            get_template_part( 'components/booking-gallery-cta' );
        } );
}