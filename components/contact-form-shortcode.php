<?php
/**
 * Contact Form Shortcode Component Template
 */

$fields = get_query_var( 'block_data' );
$shortcode = $fields['shortcode'] ?? '';

if ( empty( $shortcode ) ) {
    return;
}
?>

<section class="contact-form-shortcode-section ">
    <div class="container">
        <div class="contact-form-wrapper">
            <?php echo do_shortcode( $shortcode ); ?>
        </div>
    </div>
</section>