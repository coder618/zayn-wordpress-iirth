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

<section class="gallery-showcase-section">
    <div class="container">
        <div class="gallery-masonry-grid">
            <?php foreach ( $gallery_images as $image_id ) : ?>
            <?php 
                    $image_url = wp_get_attachment_image_url( $image_id, 'large' );
                    $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
                ?>
            <div class="masonry-item js-gallery-item"
                data-image="<?php echo esc_url( wp_get_attachment_image_url( $image_id, 'full' ) ); ?>">
                <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>"
                    loading="lazy" />
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Image Modal -->
    <div id="gallery-modal" class="gallery-modal">
        <button id="gallery-modal-close" class="gallery-modal-close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <div class="gallery-modal-content">
            <img id="gallery-modal-image" src="" alt="Gallery Image" />
        </div>
    </div>
</section>