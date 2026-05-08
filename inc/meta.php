<?php
/**
 * Register Custom Meta Fields
 */
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'zayn_register_custom_meta_fields' );
function zayn_register_custom_meta_fields() {
    // Product Post Type Meta Fields
    Container::make( 'post_meta', __( 'Product Settings', 'zayn' ) )
        ->where( 'post_type', '=', 'product' )
        ->add_fields( array(
            Field::make( 'complex', 'key_ingredients', __( 'Key Ingredients', 'zayn' ) )
                ->add_fields( array(
                    Field::make( 'image', 'image', __( 'Image', 'zayn' ) )
                        ->set_value_type( 'url' ),
                    Field::make( 'text', 'title', __( 'Title', 'zayn' ) ),
                    Field::make( 'textarea', 'description', __( 'Description', 'zayn' ) ),
                ) )
                ->set_layout( 'tabbed-horizontal' )
                ->set_header_template( '
                    <% if (title) { %>
                        <%- title %>
                    <% } else { %>
                        Ingredient
                    <% } %>
                ' ),
            Field::make( 'rich_text', 'how_to_use', __( 'How to Use', 'zayn' ) ),
            Field::make( 'rich_text', 'ingredients_detail', __( 'Ingredients Detail', 'zayn' ) ),
        ) );

    // Treatment Post Type Meta Fields
    Container::make( 'post_meta', __( 'Treatment Details', 'zayn' ) )
        ->where( 'post_type', '=', 'treatment' )
        ->add_fields( array(
            Field::make( 'text', 'treatment_price', __( 'Price', 'zayn' ) )
                ->set_attribute( 'placeholder', 'e.g. $150' ),
            Field::make( 'text', 'treatment_booking_link', __( 'Booking Link', 'zayn' ) )
                ->set_attribute( 'type', 'url' )
                ->set_attribute( 'placeholder', 'https://...' ),
            Field::make( 'media_gallery', 'treatment_gallery', __( 'Gallery', 'zayn' ) )
                ->set_type( array( 'image' ) ),
            Field::make( 'association', 'treatment_used_products', __( 'Used Products', 'zayn' ) )
                ->set_types( array(
                    array(
                        'type'      => 'post',
                        'post_type' => 'product',
                    )
                ) ),
        ) );
}
