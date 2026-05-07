<?php
/**
 * Theme basic setup
 */

if ( ! function_exists( 'ahadul_setup' ) ) :
    function ahadul_setup() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        // Let WordPress manage the document title.
        add_theme_support( 'title-tag' );

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );

        // Switch default core markup for search form, comment form, and comments to output valid HTML5.
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Add support for core custom logo.
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );

        // Register navigation menus.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Menu', 'ahadul' ),
            'footer'  => esc_html__( 'Footer Menu', 'ahadul' ),
        ) );
    }
endif;
add_action( 'after_setup_theme', 'ahadul_setup' );


function allow_svg_uploads($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_uploads');

function fix_svg_upload_permission($data, $file, $filename, $mimes) {
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    if ($ext === 'svg') {
        $data['ext'] = 'svg';
        $data['type'] = 'image/svg+xml';
    }

    return $data;
}
add_filter('wp_check_filetype_and_ext', 'fix_svg_upload_permission', 10, 4);