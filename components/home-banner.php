<?php
/**
 * Home Banner Component Template
 */

$fields = get_query_var( 'block_data' );
$items  = $fields['home_banner_items'] ?? [];
$arrow_svg = '<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.5 6H9.5" stroke="#006D57" stroke-width="1.33" stroke-linecap="round" stroke-linejoin="round"/><path d="M6 2.5L9.5 6L6 9.5" stroke="#006D57" stroke-width="1.33" stroke-linecap="round" stroke-linejoin="round"/></svg>';
  
?>

<section class="home-banner-section">
    <?php if ( ! empty( $items ) ) : ?>
    <div class="banner-items">
        <?php foreach ( $items as $item ) : ?>
        <?php
                    $image_id  = $item['image'] ?? '';
                    $title     = $item['title'] ?? '';
                    $detail    = $item['detail'] ?? '';
                    $btn_title = $item['btn_title'] ?? '';
                    $btn_link  = $item['btn_link'] ?? '';
                ?>
        <div class="banner-item">

            <?php if ( $image_id ) : ?>
            <div class="img-wrapper">

                <?php echo wp_get_attachment_image( $image_id, 'large' ); ?>
                <div class="overlay"></div>
            </div>
            <?php endif; ?>

            <div class="text-part">
                <?php if ( $title ) : ?>
                <h2>
                    <?php echo esc_html( $title ); ?>
                </h2>
                <?php endif; ?>

                <?php if ( $detail ) : ?>
                <p>
                    <?php echo nl2br( esc_html( $detail ) ); ?>
                </p>
                <?php endif; ?>

                <?php if ( $btn_title && $btn_link ) : ?>
                <div>
                    <?php 
                                if ( ! preg_match( '~^(?:f|ht)tps?://~i', $btn_link ) && ! preg_match( '/^(?:mailto|tel):/i', $btn_link ) && ! str_starts_with($btn_link, '/') && ! str_starts_with($btn_link, '#') ) {
                                    $btn_link = 'https://' . ltrim( $btn_link, '/' );
                                }
                            ?>
                    <a href="<?php echo esc_url( $btn_link ); ?>">
                        <?php echo esc_html( $btn_title ); ?>
                        <span><?php echo $arrow_svg; ?></span>
                    </a>
                </div>
                <?php endif; ?>

            </div>



        </div>
        <?php endforeach; ?>
    </div>
    <?php else : ?>
    <div>
        <p>
            <?php esc_html_e( 'Please add items to the Home Banner component in the editor.', 'ahadul' ); ?></p>
    </div>
    <?php endif; ?>
</section>