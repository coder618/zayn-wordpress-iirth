<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}


?>
<div class="single-product-page" id="product-<?php the_ID(); ?>"
    <?php wc_product_class( 'grid grid-cols-1 lg:grid-cols-2 gap-12', $product ); ?>>

    <div class="container">

        <div class="top-part-gallery-title-with-detail">
            <div class="left-part">
                <?php
				$main_image_id  = $product->get_image_id();
				$attachment_ids = $product->get_gallery_image_ids();
				
				$all_image_ids = array();
				if ( $main_image_id ) {
					$all_image_ids[] = $main_image_id;
				}
				if ( $attachment_ids ) {
					$all_image_ids = array_merge( $all_image_ids, $attachment_ids );
				}

				get_template_part( 'components/single-product-page/product-gallery', null, [
                    "image_ids" => $all_image_ids
                ] );
			?>
            </div>
            <div class="right-part">
                <div class="content">
                    <div class="title-and-price">
                        <h1><?php echo get_the_title(); ?></h1>

                        <div class="price-wrapper">
                            <?php echo $product->get_price_html(); ?>
                        </div>
                    </div>

                    <div class="excerpt">
                        <?php  the_excerpt(); ?>
                    </div>

                    <div class="add-to-cart-btn-wrapper">
                        <?php woocommerce_template_single_add_to_cart(); ?>
                    </div>
                    <div class="anchor-links-wrapper">
                        <button data-target-tab="tab-details">Product Details</button>
                        <button data-target-tab="tab-how-to-use">How to Use</button>
                        <button data-target-tab="tab-ingredients">INGREDIENTS</button>
                    </div>
                </div>



            </div>



        </div>
    </div>

    <div class="container">

        <div class="product-full-detail-breakdown">
            <div id="key-ingredients-section">
                <?php
				get_template_part( 'components/single-product-page/key-ingredients' );
			?>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="products-tabs-wrapper w-full clear-both" id="products-tabs-wrapper">
            <?php
			get_template_part( 'components/single-product-page/products-tabs' );
		?>
        </div>
    </div>

    <div class="product-listing-wrapper">
        <?php
            // Fetch up to 4 related product IDs based on the current product
            $related_product_ids = wc_get_related_products( $product->get_id(), 4 );
            
            // If no related products found, show random products excluding the current one
            if ( empty( $related_product_ids ) ) {
                $related_product_ids = wc_get_products( array(
                    'status'  => 'publish',
                    'limit'   => 4,
                    'orderby' => 'rand',
                    'exclude' => array( $product->get_id() ),
                    'return'  => 'ids',
                ) );
            }

            set_query_var("product_listing", [
                "title" => "YOU MIGHT ALSO LIKE",
                "has_shop_btn" => false,
                "product_ids" => $related_product_ids
            ]);
			get_template_part( 'components/product-listing' );
            
		?>
    </div>

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>