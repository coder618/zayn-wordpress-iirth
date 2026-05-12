<?php
/**
 * Zayn Experience Home Component Template
 */

$fields = get_query_var( 'block_data' );

$detail    = $fields['detail'] ?? '';
$btn_title = $fields['btn_title'] ?? '';
$btn_link  = $fields['btn_link'] ?? '';
$image_id  = $fields['image'] ?? '';
$hide_logo = $fields['hide_logo'] ?? false;

$arrow_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.33" d="M2.5 6h7M6 2.5 9.5 6 6 9.5"/></svg>';

?>

<section class="zayn-experience-home">
    <div class="container">
        <div class="content">
            <div class="text-content">

                <?php if ( ! $hide_logo ) : ?>
                <div class="logo-wrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/icons/logo-pattern.svg"
                        alt="Logo Pattern" />
                </div>
                <?php endif; ?>

                <?php if ( $detail ) : ?>
                <div class="detail-wrapper">
                    <?php echo apply_filters( 'the_content', $detail ); ?>
                </div>
                <?php endif; ?>

                <div class="btn-wrapper">
                    <a href="<?php echo esc_url( $btn_link ); ?>" class="shop-btn"><?php echo esc_html( $btn_title ); ?>
                        <span><?php echo $arrow_svg; ?></span></a>
                </div>
            </div>

            <?php if ( $image_id ) : ?>
            <div class="image-content">
                <?php 
                        echo wp_get_attachment_image( $image_id, 'large', false, array( 
                            'class' => 'right-image' 
                        ) ); 
                    ?>
                <img class="pattern-image"
                    src="<?php echo get_template_directory_uri(); ?>/dist/images/tiles-pattern.jpg" alt="pattern">
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>