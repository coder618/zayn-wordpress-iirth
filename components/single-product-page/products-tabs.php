<?php
/**
 * Single Product - Products Tabs Component
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}

$product_details    = apply_filters( 'the_content', $product->get_description() );
$how_to_use         = apply_filters( 'the_content', carbon_get_post_meta( $product->get_id(), 'how_to_use' ) );
$ingredients_detail = apply_filters( 'the_content', carbon_get_post_meta( $product->get_id(), 'ingredients_detail' ) );

// Only render tabs if at least one section has content
if ( empty( $product_details ) && empty( $how_to_use ) && empty( $ingredients_detail ) ) {
    return;
}
?>

<div class="custom-product-tabs-container">
    <div class="tabs-nav">
        <?php if ( ! empty( $product_details ) ) : ?>
        <button class="tab-btn active" data-tab="tab-details"><?php esc_html_e( 'PRODUCT DETAILS', 'zayn' ); ?></button>
        <?php endif; ?>

        <?php if ( ! empty( $how_to_use ) ) : ?>
        <button class="tab-btn <?php echo empty( $product_details ) ? 'active' : ''; ?>"
            data-tab="tab-how-to-use"><?php esc_html_e( 'HOW TO USE', 'zayn' ); ?></button>
        <?php endif; ?>

        <?php if ( ! empty( $ingredients_detail ) ) : ?>
        <button class="tab-btn <?php echo empty( $product_details ) && empty( $how_to_use ) ? 'active' : ''; ?>"
            data-tab="tab-ingredients"><?php esc_html_e( 'INGREDIENTS', 'zayn' ); ?></button>
        <?php endif; ?>
    </div>

    <div class="tabs-content">
        <?php if ( ! empty( $product_details ) ) : ?>
        <div id="tab-details" class="tab-pane active">
            <?php echo $product_details; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        </div>
        <?php endif; ?>

        <?php if ( ! empty( $how_to_use ) ) : ?>
        <div id="tab-how-to-use" class="tab-pane <?php echo empty( $product_details ) ? 'active' : ''; ?>">
            <?php echo $how_to_use; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        </div>
        <?php endif; ?>

        <?php if ( ! empty( $ingredients_detail ) ) : ?>
        <div id="tab-ingredients"
            class="tab-pane <?php echo empty( $product_details ) && empty( $how_to_use ) ? 'active' : ''; ?>">
            <?php echo $ingredients_detail; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<style>

</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabsContainer = document.querySelector('.custom-product-tabs-container');

    if (!tabsContainer) return;

    const tabButtons = tabsContainer.querySelectorAll('.tab-btn');
    const tabPanes = tabsContainer.querySelectorAll('.tab-pane');

    function switchTab(targetId) {
        // Remove active class from all buttons and panes
        tabButtons.forEach(btn => btn.classList.remove('active'));
        tabPanes.forEach(pane => pane.classList.remove('active'));

        // Add active class to corresponding button
        const targetBtn = tabsContainer.querySelector(`.tab-btn[data-tab="${targetId}"]`);
        if (targetBtn) {
            targetBtn.classList.add('active');
        }

        // Show corresponding pane
        const targetPane = document.getElementById(targetId);
        if (targetPane) {
            targetPane.classList.add('active');
        }
    }

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            switchTab(button.getAttribute('data-tab'));
        });
    });

    // Handle anchor links from the product details section
    const anchorLinks = document.querySelectorAll('.anchor-links-wrapper button[data-target-tab]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = link.getAttribute('data-target-tab');

            // Switch tab
            switchTab(targetId);

            // Scroll to tabs wrapper
            const tabsWrapper = document.getElementById('products-tabs-wrapper');
            if (tabsWrapper) {
                // Smooth scroll with some offset for header if needed
                const yOffset = -150;
                const y = tabsWrapper.getBoundingClientRect().top + window.scrollY + yOffset;
                window.scrollTo({
                    top: y,
                    behavior: 'smooth'
                });
            }
        });
    });
});
</script>