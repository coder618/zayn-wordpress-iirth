<?php
/**
 * Services - CTA Home Component Template
 */

$fields = get_query_var( 'block_data' );
$items  = $fields['services_cta_items'] ?? [];
?>

<!-- DEBUG: services-cta-home component loaded -->
<section class="services-cta-home-section">
    <div class="container">
        <?php if ( ! empty( $items ) ) : ?>
        <div class="cta-items">
            <?php foreach ( $items as $item ) : ?>
            <?php
                        $bg_image_id = $item['bg_image'] ?? '';
                        $btn_title   = $item['btn_title'] ?? '';
                        $btn_link    = $item['btn_link'] ?? '';
                        
                        $bg_image_url = $bg_image_id ? wp_get_attachment_image_url( $bg_image_id, 'large' ) : '';
                    ?>
            <div class="cta-item"
                style="<?php echo $bg_image_url ? 'background-image: url(' . esc_url( $bg_image_url ) . '); background-size: cover; background-position: center;' : 'background-color: #f3f4f6;'; ?>">

                <?php if ( $btn_link && $btn_title ) : ?>
                <?php 
                        if ( $btn_link && ! preg_match( '~^(?:f|ht)tps?://~i', $btn_link ) && ! preg_match( '/^(?:mailto|tel):/i', $btn_link ) && ! str_starts_with($btn_link, '/') && ! str_starts_with($btn_link, '#') ) {
                            $btn_link = 'https://' . ltrim( $btn_link, '/' );
                        }
                    ?>
                <a class="btn-gray" href="<?php echo esc_url( $btn_link ); ?>">
                    <?php echo esc_html( $btn_title ); ?>
                </a>
                <div class="btn-wrapper">
                </div>

                <?php endif; ?>

            </div>
            <?php endforeach; ?>
        </div>
        <?php else : ?>
        <div>
            <p>
                <?php esc_html_e( 'Please add items to the Services - CTA Home component in the editor.', 'ahadul' ); ?>
            </p>
        </div>
        <?php endif; ?>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var elem = document.querySelector('.services-cta-home-section .cta-items');
    if (elem && typeof Flickity !== 'undefined') {
        var flkty = new Flickity(elem, {
            watchCSS: true,
            cellAlign: 'center',
            contain: true,
            wrapAround: true,
            pageDots: false,
            prevNextButtons: false
        });
    }
});
</script>