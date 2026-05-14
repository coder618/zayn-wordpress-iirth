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
<style>
.contact-form-wrapper select {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none'%3E%3Cpath d='M6 9L12 15L18 9' stroke='%230A2515' stroke-opacity='0.5' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 16px center;
    background-size: 24px;
    padding-right: 40px;
}
</style>

<section class="contact-form-shortcode-section ">
    <div class="container">
        <div class="contact-form-wrapper">
            <?php echo do_shortcode( $shortcode ); ?>
        </div>
    </div>
</section>