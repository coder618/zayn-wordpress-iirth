<?php
/**
 * Services - CTA Home Component Template
 */

$fields = get_query_var( 'block_data' );
$items  = $fields['services_cta_items'] ?? [];
?>

<!-- DEBUG: services-cta-home component loaded -->
<section class="services-cta-home-section py-12">
    <div class="container mx-auto px-4">
        <?php if ( ! empty( $items ) ) : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ( $items as $item ) : ?>
            <?php
                        $bg_image_id = $item['bg_image'] ?? '';
                        $btn_title   = $item['btn_title'] ?? '';
                        $btn_link    = $item['btn_link'] ?? '';
                        
                        $bg_image_url = $bg_image_id ? wp_get_attachment_image_url( $bg_image_id, 'large' ) : '';
                    ?>
            <div class="cta-item relative overflow-hidden rounded-lg shadow-lg group flex items-center justify-center min-h-[300px]"
                style="<?php echo $bg_image_url ? 'background-image: url(' . esc_url( $bg_image_url ) . '); background-size: cover; background-position: center;' : 'background-color: #f3f4f6;'; ?>">

                <!-- Overlay -->
                <div
                    class="absolute inset-0 bg-black bg-opacity-40 transition-opacity duration-300 group-hover:bg-opacity-50">
                </div>

                <!-- Content -->
                <div class="relative z-10 text-center p-6 w-full h-full flex flex-col items-center justify-center">
                    <?php if ( $btn_title ) : ?>
                    <?php 
                                    if ( $btn_link && ! preg_match( '~^(?:f|ht)tps?://~i', $btn_link ) && ! preg_match( '/^(?:mailto|tel):/i', $btn_link ) && ! str_starts_with($btn_link, '/') && ! str_starts_with($btn_link, '#') ) {
                                        $btn_link = 'https://' . ltrim( $btn_link, '/' );
                                    }
                                ?>
                    <?php if ( $btn_link ) : ?>
                    <a href="<?php echo esc_url( $btn_link ); ?>"
                        class="inline-block bg-white text-gray-900 font-semibold py-3 px-6 rounded hover:bg-gray-100 transition-colors duration-300">
                        <?php echo esc_html( $btn_title ); ?>
                    </a>
                    <?php else : ?>
                    <span class="inline-block bg-white text-gray-900 font-semibold py-3 px-6 rounded">
                        <?php echo esc_html( $btn_title ); ?>
                    </span>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else : ?>
        <div class="text-center p-8 bg-gray-50 rounded">
            <p class="text-gray-600">
                <?php esc_html_e( 'Please add items to the Services - CTA Home component in the editor.', 'ahadul' ); ?>
            </p>
        </div>
        <?php endif; ?>
    </div>
</section>