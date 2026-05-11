<?php
/**
 * About Detail Component Template
 */

$fields = get_query_var( 'block_data' );

$title  = $fields['title'] ?? '';
$detail = $fields['detail'] ?? '';
$image  = $fields['image'] ?? '';
?>

<section class="about-detail-section">
    <div class="container">
        <div class="about-detail-wrapper">
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

            <?php if ( $image ) : ?>
            <div class="image-content">
                <?php 
                        echo wp_get_attachment_image( $image, 'large', false, array( 
                            'class' => 'about-image' 
                        ) ); 
                    ?>
                <img class="pattern-image"
                    src="<?php echo get_template_directory_uri(); ?>/dist/images/tiles-pattern.jpg" alt="pattern">
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>