<?php
/**
 * Gallery Showcase Component Template
 */

$fields = get_query_var( 'block_data' );
$gallery_images = $fields['gallery_images'] ?? array();

if ( empty( $gallery_images ) ) {
    return;
}
?>

<section class="gallery-showcase-section py-16">
    <div class="container">
        <div class="gallery-masonry-grid">
            <?php foreach ( $gallery_images as $image_id ) : ?>
                <?php 
                    $image_url = wp_get_attachment_image_url( $image_id, 'large' );
                    $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
                ?>
                <div class="masonry-item">
                    <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" loading="lazy" />
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
