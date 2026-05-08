<?php
/**
 * Single Product - Key Ingredients Component
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}

// Fetch the 'key_ingredients' complex field data using Carbon Fields
$key_ingredients = carbon_get_post_meta( $product->get_id(), 'key_ingredients' );

// If there are no ingredients, don't render the section
if ( empty( $key_ingredients ) ) {
    return;
}
?>

<div class="product-key-ingredients ">
    <h2 id="key-ingredients-section"><?php esc_html_e( 'Key Ingredients', 'zayn' ); ?></h2>

    <div class="items">
        <?php foreach ( $key_ingredients as $ingredient ) : ?>
        <?php 
                $image_url   = $ingredient['image'] ?? '';
                $title       = $ingredient['title'] ?? '';
                $description = $ingredient['description'] ?? '';
            ?>
        <div class="item">
            <?php if ( $image_url ) : ?>
            <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="">
            <?php endif; ?>

            <?php echo $title ? "<h3>$title</h3>" : ''; ?>
            <?php echo $description ? "<p>$description</p>" : ''; ?>


        </div>
        <?php endforeach; ?>
    </div>
</div>