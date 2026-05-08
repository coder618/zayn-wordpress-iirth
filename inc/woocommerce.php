<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package zayn-theme
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 */
function zayn_theme_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 150,
			'single_image_width'    => 300,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'zayn_theme_woocommerce_setup' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'zayn_theme_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function zayn_theme_woocommerce_wrapper_before() {
		?>
		<div id="primary" class="content-area container mx-auto px-4 py-8">
			<main id="main" class="site-main" role="main">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'zayn_theme_woocommerce_wrapper_before', 10 );

if ( ! function_exists( 'zayn_theme_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function zayn_theme_woocommerce_wrapper_after() {
		?>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'zayn_theme_woocommerce_wrapper_after', 10 );

/**
 * Change WooCommerce breadcrumb settings to match theme.
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'zayn_theme_woocommerce_breadcrumbs' );
function zayn_theme_woocommerce_breadcrumbs() {
	return array(
		'delimiter'   => ' &nbsp;&#47;&nbsp; ',
		'wrap_before' => '<nav class="woocommerce-breadcrumb text-sm text-gray-500 mb-8" aria-label="breadcrumb">',
		'wrap_after'  => '</nav>',
		'before'      => '',
		'after'       => '',
		'home'        => _x( 'Home', 'breadcrumb', 'zayn' ),
	);
}

/**
 * Remove decimals from WooCommerce prices.
 */
add_filter( 'wc_get_price_decimals', '__return_zero' );

/**
 * Change "Add to Cart" button text to "ADD TO BASKET" on single product pages.
 */
add_filter( 'woocommerce_product_single_add_to_cart_text', 'zayn_theme_custom_add_to_cart_text' );
function zayn_theme_custom_add_to_cart_text() {
	return __( 'ADD TO BASKET', 'zayn' );
}

/**
 * Remove quantity input field from single product pages
 */
add_filter( 'woocommerce_is_sold_individually', '__return_true' );
