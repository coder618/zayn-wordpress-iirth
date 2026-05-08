<?php
/**
 * Theme functions and definitions
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Autoload composer dependencies
if ( file_exists( get_template_directory() . '/vendor/autoload.php' ) ) {
    require_once get_template_directory() . '/vendor/autoload.php';
}

// Boot Carbon Fields
add_action( 'after_setup_theme', 'ahadul_crb_load' );
function ahadul_crb_load() {
    \Carbon_Fields\Carbon_Fields::boot();
}

function getData (){
    return get_query_var( 'component_data', [] );
}

function setData ($data){
    return set_query_var( 'component_data', $data );
}

// Include theme setup features
require_once get_template_directory() . '/inc/setup.php';

// Include scripts and styles enqueues
require_once get_template_directory() . '/inc/enqueue.php';


require_once get_template_directory() . '/inc/helper.php';

// Register Carbon Fields Blocks
require_once get_template_directory() . '/inc/blocks.php';

// Register Custom Meta Fields
require_once get_template_directory() . '/inc/meta.php';

// Register Theme Options
require_once get_template_directory() . '/inc/theme-options.php';

// WooCommerce Integration
if ( class_exists( 'WooCommerce' ) ) {
    require_once get_template_directory() . '/inc/woocommerce.php';
}

function move_admin_bar_to_bottom() {
    if (is_admin_bar_showing()) {
        echo '<style>
            #wpadminbar {
                top: auto !important;
                bottom: 0;
            }
            html {
                margin-top: 0 !important;
                margin-bottom: 32px !important;
            }
            @media screen and (max-width: 782px) {
                html {
                    margin-bottom: 46px !important;
                }
            }
        </style>';
    }
}
add_action('wp_head', 'move_admin_bar_to_bottom');