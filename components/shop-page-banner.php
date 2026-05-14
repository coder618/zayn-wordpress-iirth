<?php
/**
 * Shop Page Banner Component Template
 */

$fields = get_query_var( 'block_data' );

$title  = $fields['title'] ?? '';
$detail = $fields['detail'] ?? '';
$image  = $fields['image'] ?? '';

if ( is_product_category() || is_product_tag() ) {
    $queried_object = get_queried_object();
    if ( $queried_object && is_a( $queried_object, 'WP_Term' ) ) {
        $title = $queried_object->name;
        if ( ! empty( $queried_object->description ) ) {
            $detail = $queried_object->description;
        } else {
            $detail = ''; // Clear default shop description if category has none
        }
    }
}
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
                    <h1 class="">
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
                        'class' => '' 
                    ) ); 
                ?>
            </div>
            <?php endif; ?>


        </div>


    </div>
</section>