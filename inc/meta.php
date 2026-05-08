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
                ' )
        ) );
}
