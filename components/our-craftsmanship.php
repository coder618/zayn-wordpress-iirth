<?php
/**
 * Our Craftsmanship Component Template
 */

$fields = get_query_var( 'block_data' );

$title  = $fields['title'] ?? '';
$detail = $fields['detail'] ?? '';
$image  = $fields['image'] ?? '';
?>

<section class="our-craftsmanship-section">
    <div class="container">
        <div class="craftsmanship-wrapper">
            <?php if ( $image ) : ?>
                <div class="image-content">
                    <?php 
                        echo wp_get_attachment_image( $image, 'large', false, array( 
                            'class' => 'craftsmanship-image' 
                        ) ); 
                    ?>
                </div>
            <?php endif; ?>

            <div class="text-content">
                <?php if ( $title ) : ?>
                    <h2 class="section-title">
                        <?php echo esc_html( $title ); ?>
                    </h2>
                <?php endif; ?>

                <?php if ( $detail ) : ?>
                    <div class="section-detail">
                        <?php echo wpautop( wp_kses_post( $detail ) ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
