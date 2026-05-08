<?php
/**
 * Enqueue scripts and styles
 */

function ahadul_scripts() {
    // Theme stylesheet (header info)
    wp_enqueue_style( 'ahadul-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

    // Compiled Tailwind CSS
    wp_enqueue_style( 'ahadul-tailwind', get_template_directory_uri() . '/dist/css/main.css', array(), wp_get_theme()->get( 'Version' ) );

    // Headroom JS
    wp_enqueue_script( 'headroom', 'https://cdnjs.cloudflare.com/ajax/libs/headroom/0.12.0/headroom.min.js', array(), '0.12.0', true );

    // Theme JS
    wp_enqueue_script( 'ahadul-scripts', get_template_directory_uri() . '/dist/js/main.js', array('headroom'), wp_get_theme()->get( 'Version' ), true );

    // Simple Parallax JS
    wp_enqueue_script( 'simple-parallax', 'https://cdn.jsdelivr.net/npm/simple-parallax-js@5.6.2/dist/simpleParallax.min.js', array(), '5.6.2', true );

    // Enqueue Flickity globally
    wp_enqueue_style( 'flickity-css', 'https://unpkg.com/flickity@2/dist/flickity.min.css', array(), '2.3.0' );
    wp_enqueue_script( 'flickity-js', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js', array(), '2.3.0', true );
}
add_action( 'wp_enqueue_scripts', 'ahadul_scripts' );

/**
 * Enqueue block editor assets
 */
function ahadul_enqueue_block_editor_assets() {
    wp_enqueue_style( 'ahadul-tailwind-editor', get_template_directory_uri() . '/dist/css/main.css', array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'enqueue_block_editor_assets', 'ahadul_enqueue_block_editor_assets' );