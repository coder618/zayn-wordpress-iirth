<?php
/**
 * Register Custom Post Types
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function zayn_register_treatment_cpt() {
    $labels = array(
        'name'                  => _x( 'Treatments', 'Post Type General Name', 'zayn-theme' ),
        'singular_name'         => _x( 'Treatment', 'Post Type Singular Name', 'zayn-theme' ),
        'menu_name'             => __( 'Treatments', 'zayn-theme' ),
        'name_admin_bar'        => __( 'Treatment', 'zayn-theme' ),
        'archives'              => __( 'Treatment Archives', 'zayn-theme' ),
        'attributes'            => __( 'Treatment Attributes', 'zayn-theme' ),
        'parent_item_colon'     => __( 'Parent Treatment:', 'zayn-theme' ),
        'all_items'             => __( 'All Treatments', 'zayn-theme' ),
        'add_new_item'          => __( 'Add New Treatment', 'zayn-theme' ),
        'add_new'               => __( 'Add New', 'zayn-theme' ),
        'new_item'              => __( 'New Treatment', 'zayn-theme' ),
        'edit_item'             => __( 'Edit Treatment', 'zayn-theme' ),
        'update_item'           => __( 'Update Treatment', 'zayn-theme' ),
        'view_item'             => __( 'View Treatment', 'zayn-theme' ),
        'view_items'            => __( 'View Treatments', 'zayn-theme' ),
        'search_items'          => __( 'Search Treatment', 'zayn-theme' ),
        'not_found'             => __( 'Not found', 'zayn-theme' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'zayn-theme' ),
        'featured_image'        => __( 'Featured Image', 'zayn-theme' ),
        'set_featured_image'    => __( 'Set featured image', 'zayn-theme' ),
        'remove_featured_image' => __( 'Remove featured image', 'zayn-theme' ),
        'use_featured_image'    => __( 'Use as featured image', 'zayn-theme' ),
        'insert_into_item'      => __( 'Insert into treatment', 'zayn-theme' ),
        'uploaded_to_this_item' => __( 'Uploaded to this treatment', 'zayn-theme' ),
        'items_list'            => __( 'Treatments list', 'zayn-theme' ),
        'items_list_navigation' => __( 'Treatments list navigation', 'zayn-theme' ),
        'filter_items_list'     => __( 'Filter treatments list', 'zayn-theme' ),
    );
    $args = array(
        'label'                 => __( 'Treatment', 'zayn-theme' ),
        'description'           => __( 'Treatment post type', 'zayn-theme' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-heart',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'show_in_rest'          => true,
    );
    register_post_type( 'treatment', $args );
}
add_action( 'init', 'zayn_register_treatment_cpt', 0 );