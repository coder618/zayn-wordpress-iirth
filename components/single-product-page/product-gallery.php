<?php
/**
 * Single Product Image Gallery Component (Flickity Slider)
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}

// Enqueue Flickity assets
wp_enqueue_style( 'flickity-css' );
wp_enqueue_script( 'flickity-js' );

// Get Image IDs
$main_image_id  = $product->get_image_id();
$attachment_ids = $product->get_gallery_image_ids();

$all_image_ids = array();
if ( $main_image_id ) {
	$all_image_ids[] = $main_image_id;
}
if ( $attachment_ids ) {
	$all_image_ids = array_merge( $all_image_ids, $attachment_ids );
}

if ( empty( $all_image_ids ) ) {
	// Fallback to placeholder if no images
	echo '<div class="woocommerce-product-gallery__wrapper">';
	echo sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
	echo '</div>';
	return;
}
?>

<div class="product-gallery-flickity relative overflow-hidden ">
    <!-- Flickity Slider -->
    <div class="main-carousel single-product-carousel"
        data-flickity='{ "cellAlign": "left", "contain": true, "wrapAround": true, "pageDots": false, "prevNextButtons": true, "arrowShape": "M65.3 14.5L30.9 48.9c-.6.6-.6 1.6 0 2.2l34.4 34.4c.6.6 1.6.6 2.2 0 .6-.6.6-1.6 0-2.2L34.2 50l33.3-33.3c.6-.6.6-1.6 0-2.2-.3-.3-.7-.5-1.1-.5s-.8.2-1.1.5z" }'>
        <?php foreach ( $all_image_ids as $image_id ) : ?>
        <?php 
            // $image_url = wp_get_attachment_image_url( $image_id, 'woocommerce_single' );
            $image_url = wp_get_attachment_image_url( $image_id, 'large' );
            $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
            $full_image_url = wp_get_attachment_image_url( $image_id, 'full' );
            ?>
        <div class="s-item">
            <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" class="" />
        </div>
        <?php endforeach; ?>
    </div>
</div>