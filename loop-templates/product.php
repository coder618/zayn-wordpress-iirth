<?php
/**
 * Product loop template component
 * 
 * Expects $args['id'] to be passed via get_template_part, 
 * otherwise falls back to the current global post ID.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$product_id = isset( $args['id'] ) ? $args['id'] : get_the_ID();

$product = wc_get_product( intval( $product_id ));

if ( ! is_a( $product, 'WC_Product' ) ) {
    return;
}
?>

<a <?php wc_product_class( 'product-item group flex flex-col each-product-card', $product ); ?> class=""
    href="<?php echo esc_url( $product->get_permalink() ); ?>">


    <div class="img-wrapper relative">
        <?php 
            $gallery_image_ids = $product->get_gallery_image_ids();
            $has_hover_image   = ! empty( $gallery_image_ids );
            $main_img_class    = 'product-img';
            
            if ( $has_hover_image ) {
                $main_img_class .= ' has-hover';
            }

            echo $product->get_image( 'large', array(
                'class' => $main_img_class
            ) ); 

            if ( $has_hover_image ) {
                echo wp_get_attachment_image( $gallery_image_ids[0], 'large', false, array(
                    'class' => 'product-img-hover'
                ) );
            }
        ?>
    </div>
    <h4><?php echo esc_html( $product->get_title() ); ?></h4>
    <div class="price-wrapper">
        <?php echo $product->get_price_html(); ?>
    </div>



</a>