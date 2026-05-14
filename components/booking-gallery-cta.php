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

<section class="booking-gallery-cta" style="--bg-image: url('<?php echo esc_url($bg_url); ?>');">
    <div class="bgc-background"></div>
    <div class="container">
        <div class="bgc-wrapper">
            <div class="bgc-content">
                <?php if ( $title ) : ?>
                    <h2 class="bgc-title"><?php echo esc_html( $title ); ?></h2>
                <?php endif; ?>

                <?php if ( $btn_title ) : ?>
                    <a href="<?php echo esc_url( $btn_link ); ?>" class="bgc-btn">
                        <?php echo esc_html( $btn_title ); ?>
                        <span class="icon"><?php echo $arrow_svg; ?></span>
                    </a>
                <?php endif; ?>
            </div>

            <div class="bgc-gallery">
                <?php if ( $gallery_1 ) : ?>
                    <div class="bgc-img bgc-img-1">
                        <?php echo wp_get_attachment_image( $gallery_1, 'large' ); ?>
                    </div>
                <?php endif; ?>
                <?php if ( $gallery_2 ) : ?>
                    <div class="bgc-img bgc-img-2">
                        <?php echo wp_get_attachment_image( $gallery_2, 'large' ); ?>
                    </div>
                <?php endif; ?>
                <?php if ( $gallery_3 ) : ?>
                    <div class="bgc-img bgc-img-3">
                        <?php echo wp_get_attachment_image( $gallery_3, 'large' ); ?>
                    </div>
                <?php endif; ?>
                <?php if ( $gallery_4 ) : ?>
                    <div class="bgc-img bgc-img-4">
                        <?php echo wp_get_attachment_image( $gallery_4, 'large' ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
