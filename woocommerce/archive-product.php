<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template overrides the default WooCommerce archive-product.php
 * to display ONLY the Gutenberg content from the Shop page, 
 * stripping away all default WooCommerce archive elements.
 */

defined( 'ABSPATH' ) || exit;

get_header();

if ( ( is_shop() || is_product_category() || is_product_tag() ) ) {
    // We are on the main shop page or a category/tag page
    $shop_page_id = wc_get_page_id( 'shop' );
    if ( $shop_page_id ) {
        $shop_page = get_post( $shop_page_id );
        if ( $shop_page ) {
            // Setup postdata to allow Gutenberg blocks to render correctly
            global $post;
            $post = $shop_page;
            setup_postdata( $post );
            
            the_content();
            
            wp_reset_postdata();
        }
    }
} else {
    // For other WooCommerce archives (categories, tags), you can either
    // render products here or just display nothing if the whole store is custom.
    // Assuming we fallback to standard loop or leave it blank as per "custom shop page" request.
    if ( woocommerce_product_loop() ) {
        woocommerce_product_loop_start();
        if ( wc_get_loop_prop( 'total' ) ) {
            while ( have_posts() ) {
                the_post();
                do_action( 'woocommerce_shop_loop' );
                wc_get_template_part( 'content', 'product' );
            }
        }
        woocommerce_product_loop_end();
    }
}

get_footer();