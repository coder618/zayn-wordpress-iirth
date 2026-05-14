<?php
/**
 * Booking Gallery CTA Component Template
 */

$fields = get_query_var( 'block_data' );

$title     = $fields['title'] ?? '';
$btn_title = $fields['btn_title'] ?? '';
$btn_link  = $fields['btn_link'] ?? '';
$bg_image  = $fields['bg_image'] ?? '';
$gallery_1 = $fields['gallery_img_1'] ?? '';
$gallery_2 = $fields['gallery_img_2'] ?? '';
$gallery_3 = $fields['gallery_img_3'] ?? '';
$gallery_4 = $fields['gallery_img_4'] ?? '';

$bg_url = $bg_image ? wp_get_attachment_url($bg_image) : '';

$arrow_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none" viewBox="0 0 12 12"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.33" d="M2.5 6h7M6 2.5 9.5 6 6 9.5"/></svg>';
?>

<section class="booking-gallery-cta">
    <div class="bgc-background " style="--bg-image: url('<?php echo esc_url($bg_url); ?>');"></div>
    <div class="container">
        <div class="left-text-part">
            <?php if ( $title ) : ?>
            <h2 class="bgc-title"><?php echo esc_html( $title ); ?></h2>
            <?php endif; ?>

            <?php if ( $btn_title ) : ?>
            <div class="btn-wrapper">
                <a href="<?php echo esc_url( $btn_link ); ?>" class="shop-btn"><?php echo esc_html( $btn_title ); ?>
                    <span><?php echo $arrow_svg; ?></span></a>
            </div>

            <?php endif; ?>
        </div>

        <div class="right-image-part">
            <?php if ( $gallery_1 ) : ?>
            <?php echo wp_get_attachment_image( $gallery_1, 'large', false, array( 'class' => 'bgc-img bgc-img-1' ) ); ?>
            <?php endif; ?>
            <?php if ( $gallery_2 ) : ?>
            <?php echo wp_get_attachment_image( $gallery_2, 'large', false, array( 'class' => 'bgc-img bgc-img-2' ) ); ?>
            <?php endif; ?>
            <?php if ( $gallery_3 ) : ?>
            <?php echo wp_get_attachment_image( $gallery_3, 'large', false, array( 'class' => 'bgc-img bgc-img-3' ) ); ?>
            <?php endif; ?>
            <?php if ( $gallery_4 ) : ?>
            <?php echo wp_get_attachment_image( $gallery_4, 'large', false, array( 'class' => 'bgc-img bgc-img-4' ) ); ?>
            <?php endif; ?>
        </div>

    </div>
</section>