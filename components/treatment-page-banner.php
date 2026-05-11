<?php
/**
 * Shop Page Banner Component Template
 */

$fields = get_query_var( 'block_data' );

$title  = $fields['title'] ?? '';
$detail = $fields['detail'] ?? '';
?>

<section class="treatment-page-banner ">

    <div class="content">
        <div class="overlay-wrapper">
            <img class="section-bg" src="<?php echo get_template_directory_uri(); ?>/dist/images/pattern.jpg"
                alt="pattern">
        </div>

        <div class="text-wrapper">

            <?php if ( $title ) : ?>
            <h1 class="">
                <?php echo esc_html( $title ); ?>
            </h1>
            <?php endif; ?>

            <?php if ( $detail ) : ?>
            <div class="detail">
                <?php echo wpautop( wp_kses_post( $detail ) ); ?>
            </div>
            <?php endif; ?>

        </div>
    </div>



</section>