<?php
/**
 * Home Banner Component Template
 */

$fields = get_query_var( 'block_data' );
$items  = $fields['home_banner_items'] ?? [];
?>

<section class="home-banner-section relative w-full overflow-hidden bg-gray-50">
    <?php if ( ! empty( $items ) ) : ?>
        <div class="banner-slider w-full flex flex-col gap-8">
            <?php foreach ( $items as $item ) : ?>
                <?php
                    $title     = $item['title'] ?? '';
                    $detail    = $item['detail'] ?? '';
                    $btn_title = $item['btn_title'] ?? '';
                    $btn_link  = $item['btn_link'] ?? '';
                ?>
                <div class="banner-slide flex flex-col items-center justify-center min-h-[50vh] md:min-h-[70vh] px-4 py-16 text-center bg-white shadow-sm border border-gray-100 rounded-lg mx-4 md:mx-auto max-w-7xl w-full">
                    
                    <?php if ( $title ) : ?>
                        <h2 class="text-4xl md:text-6xl font-extrabold tracking-tight text-gray-900 mb-6">
                            <?php echo esc_html( $title ); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ( $detail ) : ?>
                        <p class="text-lg md:text-2xl text-gray-600 max-w-4xl mx-auto mb-10 leading-relaxed">
                            <?php echo nl2br( esc_html( $detail ) ); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ( $btn_title && $btn_link ) : ?>
                        <div class="mt-4 flex justify-center">
                            <?php 
                                if ( ! preg_match( '~^(?:f|ht)tps?://~i', $btn_link ) && ! preg_match( '/^(?:mailto|tel):/i', $btn_link ) && ! str_starts_with($btn_link, '/') && ! str_starts_with($btn_link, '#') ) {
                                    $btn_link = 'https://' . ltrim( $btn_link, '/' );
                                }
                            ?>
                            <a href="<?php echo esc_url( $btn_link ); ?>" class="inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white bg-black rounded-full hover:bg-gray-800 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-1">
                                <?php echo esc_html( $btn_title ); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div class="flex items-center justify-center min-h-[50vh] p-8 text-center bg-white m-4 rounded-lg shadow-sm">
            <p class="text-xl text-gray-500 font-medium"><?php esc_html_e( 'Please add items to the Home Banner component in the editor.', 'ahadul' ); ?></p>
        </div>
    <?php endif; ?>
</section>