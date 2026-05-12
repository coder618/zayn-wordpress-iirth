<?php
$block_data = get_query_var( 'block_data' );
$quotes = $block_data['quotes'] ?? [];
$pattern_url = get_template_directory_uri() ."/dist/images/pattern.jpg";
?>
<section class="quote-slider-section" style="background-image: url('<?php echo $pattern_url; ?>');">

    <div class="container">
        <?php if ( ! empty( $quotes ) ) : ?>
        <div class="quote-slider-wrapper">
            <div class="quote-slider-carousel">
                <?php foreach ( $quotes as $quote ) : ?>
                <div class="quote-slider-item">
                    <div class="quote-slider-content">
                        <?php if ( ! empty( $quote['detail'] ) ) : ?>
                        <blockquote class="quote-slider-detail">
                            <?php echo nl2br( esc_html( $quote['detail'] ) ); ?>
                        </blockquote>
                        <?php endif; ?>

                        <?php if ( ! empty( $quote['person_name'] ) ) : ?>
                        <cite class="quote-slider-person">
                            <?php echo esc_html( $quote['person_name'] ); ?>
                        </cite>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var quoteElems = document.querySelectorAll('.quote-slider-carousel');
    quoteElems.forEach(function(elem) {
        if (typeof Flickity !== 'undefined') {
            new Flickity(elem, {
                cellAlign: 'center',
                contain: true,
                wrapAround: true,
                pageDots: true,
                prevNextButtons: true,

                imagesLoaded: true,
                autoPlay: 5000,
                adaptiveHeight: true,
                arrowShape: 'M79.17 50L20.83 50M50 20.83L20.83 50L50 79.17'

            });
        }
    });
});
</script>