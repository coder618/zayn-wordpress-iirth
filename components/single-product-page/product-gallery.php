<?php
/**
 * Single Product Image Gallery Component (Flickity Slider)
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Enqueue Flickity assets
// wp_enqueue_style( 'flickity-css' );
// wp_enqueue_script( 'flickity-js' );

// Get Image IDs from args
$all_image_ids = isset( $args['image_ids'] ) && is_array( $args['image_ids'] ) ? $args['image_ids'] : array();

if ( empty( $all_image_ids ) ) {
	// Fallback to placeholder if no images
	echo '<div class="woocommerce-product-gallery__wrapper">';
	echo sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
	echo '</div>';
	return;
}
$arrow_right= '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"><path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.333 8h9.334M8 3.333 12.667 8 8 12.667"/></svg>';
?>

<style>
.product-gallery-flickity .flickity-button-icon {
    fill: none !important;
    stroke: #fff;
    stroke-width: 9.375;
    stroke-linecap: round;
    stroke-linejoin: round;

}
</style>

<div class="product-gallery-flickity">
    <!-- Flickity Slider -->
    <div class="single-product-carousel">
        <?php foreach ( $all_image_ids as $image_id ) : ?>
        <?php 
            // $image_url = wp_get_attachment_image_url( $image_id, 'woocommerce_single' );
            $image_url = wp_get_attachment_image_url( $image_id, 'large' );
            $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
            $full_image_url = wp_get_attachment_image_url( $image_id, 'full' );
            ?>
        <div class="s-item ">
            <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>"
                class=" block" />
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var elem = document.querySelector('.single-product-carousel');
    if (elem && typeof Flickity !== 'undefined') {
        var flkty = new Flickity(elem, {
            cellAlign: 'left',
            contain: true,
            wrapAround: true,
            pageDots: false,
            prevNextButtons: true,
            adaptiveHeight: true,
            imagesLoaded: true,
            arrowShape: 'M79.17 50L20.83 50M50 20.83L20.83 50L50 79.17'
        });

        // Fallback to force resize once all page resources (including images) finish loading
        window.addEventListener('load', function() {
            flkty.resize();
        });
    }
});
</script>