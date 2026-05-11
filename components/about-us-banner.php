<?php
/**
 * About Us Banner Component Template
 */

$fields = get_query_var( 'block_data' );

$title    = $fields['title'] ?? '';
$detail   = $fields['detail'] ?? '';
$bg_image = $fields['bg_image'] ?? '';
?>

<section class="about-us-banner">
    <div class="content-wrapper">
        <?php if ( $bg_image ) : ?>
            <div class="background-image-wrapper">
                <?php 
                    echo wp_get_attachment_image( $bg_image, 'full', false, array( 
                        'class' => 'section-bg' 
                    ) ); 
                ?>
            </div>
        <?php endif; ?>

        <div class="text-content">
            <?php if ( $title ) : ?>
                <h1 class="banner-title">
                    <?php echo esc_html( $title ); ?>
                </h1>
            <?php endif; ?>

            <?php if ( $detail ) : ?>
                <div class="banner-detail">
                    <?php echo wpautop( wp_kses_post( $detail ) ); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
