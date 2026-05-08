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


    <div class="top-part-gallery-title-with-detail">
        <div class="left-part">
            <?php
				get_template_part( 'components/single-product-page/product-gallery' );
				
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
                    <button>Product Details</button>
                    <button>How to Use</button>
                    <button>INGREDIENTS</button>
                </div>
            </div>



        </div>



    </div>

    <div class="product-full-detail-breakdown">
        <div id="key-ingredients-section">
            <?php
				get_template_part( 'components/single-product-page/key-ingredients' );
			?>
        </div>
    </div>

    <div class="products-tabs-wrapper w-full clear-both">
        <?php
			get_template_part( 'components/single-product-page/products-tabs' );
		?>
    </div>

    <div class="summary entry-summary flex flex-col justify-center">
        <?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		// do_action( 'woocommerce_single_product_summary' );
		?>
    </div>

    <div class="product-footer col-span-1 lg:col-span-2 mt-16 pt-12 border-t border-gray-200">
        <?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
		?>
    </div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>