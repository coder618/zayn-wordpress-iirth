<?php
$block_data = get_query_var( 'block_data' );
$slider_items = $block_data['slider_items'] ?? [];
?>
<section class="home-image-slider-section">
    <div class="container">
        <?php if ( ! empty( $slider_items ) ) : ?>
        <div class="home-image-slider">
            <div class="home-slider-carousel">
                <?php foreach ( $slider_items as $item ) : ?>
                <?php 
                        
                    $url = wp_get_attachment_url( $item['image'], 'full', false, array( 'class' => 'w-full h-auto object-cover ' ) ); 
                ?>
                <div class="carousel-cell ">
                    <div class="slider-item">
                        <a class="slider-content " href="<?php echo esc_url( $item['link'] ); ?>"
                            style="background-image: url(<?php echo $url; ?>);">
                            
                            <div class="text-content">

                                <?php if ( ! empty( $item['title'] ) ) : ?>
                                <h2 class=" slider-title text-4xl font-bold mb-4">
                                    <?php echo esc_html( $item['title'] ); ?>
                                </h2>
                                <?php endif; ?>

                                <?php if ( ! empty( $item['detail'] ) ) : ?>
                                <p class="slider-detail text-lg"><?php echo nl2br( esc_html( $item['detail'] ) ); ?></p>
                                <?php endif; ?>
                            </div>
                        </a>

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
    var elem = document.querySelector('.home-slider-carousel');
    if (elem && typeof Flickity !== 'undefined') {
        var flkty = new Flickity(elem, {
            cellAlign: 'left',
            contain: true,
            wrapAround: true,
            pageDots: true,
            prevNextButtons: true,
            imagesLoaded: true,
            arrowShape: 'M79.17 50L20.83 50M50 20.83L20.83 50L50 79.17'
        });

        // Fallback to force resize once all page resources (including images) finish loading
        window.addEventListener('load', function() {
            flkty.resize();
        });
    }
});
</script>