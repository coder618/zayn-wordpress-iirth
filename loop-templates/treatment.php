<?php 
/**
 * Treatment loop template component
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$id = isset( $args['id'] ) ? $args['id'] : get_the_ID();
$price = carbon_get_post_meta($id, 'treatment_price');
$booking_link = carbon_get_post_meta($id, 'treatment_booking_link');
$gallery = carbon_get_post_meta($id, 'treatment_gallery');

// Get image
$image_url = get_the_post_thumbnail_url($id, 'large');
if (!$image_url && !empty($gallery)) {
    $image_url = wp_get_attachment_image_url($gallery[0], 'large');
}
?>

<div class="treatment-card">
    <div class="treatment-image">
        <?php if ($image_url): ?>
        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(get_the_title($id)); ?>">
        <?php endif; ?>
        <?php if ($price): ?>
        <div class="treatment-price">
            £<?php echo esc_html($price); ?>
        </div>
        <?php endif; ?>
    </div>

    <div class="treatment-content">
        <h3 class="treatment-title"><?php echo get_the_title($id); ?></h3>
        <div class="treatment-description">
            <?php echo get_the_excerpt($id); ?>
        </div>
    </div>

    <div class="treatment-actions">
        <a href="<?php echo get_permalink($id); ?>" class="btn-view-details">VIEW DETAILS</a>
        <?php if ($booking_link): ?>
        <a href="<?php echo esc_url($booking_link); ?>" class="btn-book-now">BOOK NOW</a>
        <?php else: ?>
        <a href="<?php echo get_permalink($id); ?>" class="btn-book-now">BOOK NOW</a>
        <?php endif; ?>
    </div>
</div>