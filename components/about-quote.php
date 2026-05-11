<?php
/**
 * About Quote Component Template
 */

$fields = get_query_var( 'block_data' );

$detail      = $fields['detail'] ?? '';
$person_name = $fields['person_name'] ?? '';
?>

<section class="about-quote-section">
    <div class="logo-wrapper">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/icons/logo-pattern.svg" alt="Logo Pattern" />
    </div>
    <div class="container">
        <div class="quote-wrapper">
            <?php if ( $detail ) : ?>
            <blockquote class="quote-detail">
                <?php echo wpautop( wp_kses_post( $detail ) ); ?>
            </blockquote>
            <?php endif; ?>

            <?php if ( $person_name ) : ?>
            <div class="quote-author">
                <span class="author-name"><?php echo esc_html( $person_name ); ?></span>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>