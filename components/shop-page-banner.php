<?php
/**
 * Shop Page Banner Component Template
 */

$fields = get_query_var( 'block_data' );

$title  = $fields['title'] ?? '';
$detail = $fields['detail'] ?? '';
$image  = $fields['image'] ?? '';
?>

<section class="shop-page-banner ">
    <div class=" ">

        <div class="content">
            <div class="left-part">
                <div class="overlay-wrapper">
                    <img class="section-bg" src="<?php echo get_template_directory_uri(); ?>/dist/images/pattern.jpg"
                        alt="">
                </div>

                <div class="text-wrapper">

                    <?php if ( $title ) : ?>
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 md:mb-6">
                        <?php echo esc_html( $title ); ?>
                    </h1>
                    <?php endif; ?>

                    <?php if ( $detail ) : ?>
                    <div class="text-content">
                        <?php echo wpautop( wp_kses_post( $detail ) ); ?>
                    </div>
                    <?php endif; ?>
                </div>

            </div>
            <?php if ( $image ) : ?>

            <div class="right-part">
                <?php 
                    echo wp_get_attachment_image( $image, 'full', false, array( 
                        'class' => 'w-full h-auto object-cover rounded-xl shadow-md transition-transform duration-300 hover:scale-[1.02]' 
                    ) ); 
                ?>
            </div>
            <?php endif; ?>


        </div>


    </div>
</section>