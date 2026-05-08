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
$product = wc_get_product( $product_id );

if ( ! is_a( $product, 'WC_Product' ) ) {
    return;
}
?>

<a <?php wc_product_class( 'product-item group flex flex-col each-product-card', $product ); ?> class=""
    href="<?php echo esc_url( $product->get_permalink() ); ?>">


    <div class="img-wrapper">

        <?php 
            echo $product->get_image( 'large', array(
                'class' => 'product-img'
            ) ); 
        ?>
    </div>
    <h4><?php echo esc_html( $product->get_title() ); ?></h4>
    <div class="price-wrapper">
        <?php echo $product->get_price_html(); ?>
    </div>



</a>