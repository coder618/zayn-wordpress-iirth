<?php
$block_data = get_query_var( 'block_data' );
$title = $block_data['title'] ?? '';
$stores = $block_data['stores'] ?? [];
?>
<section class="our-stores-section">
    <div class="container">
        <?php if ( ! empty( $title ) ) : ?>
        <h2 class="our-stores-section__title"><?php echo esc_html( $title ); ?></h2>
        <?php endif; ?>

        <?php if ( ! empty( $stores ) ) : ?>
        <div class="our-stores-grid">
            <?php foreach ( $stores as $store ) : ?>
            <div class="our-stores-item">
                <?php if ( ! empty( $store['image'] ) ) : ?>
                <div class="our-stores-item__image-wrap">
                    <?php echo wp_get_attachment_image( $store['image'], 'full', false, array( 'class' => 'our-stores-item__image' ) ); ?>
                </div>
                <?php endif; ?>

                <div class="our-stores-item__content">
                    <?php if ( ! empty( $store['title_with_detail'] ) ) : ?>
                    <div class="our-stores-item__details">
                        <?php echo apply_filters( 'the_content', $store['title_with_detail'] ); ?>
                    </div>
                    <?php endif; ?>

                    <div class="our-stores-item__actions">
                        <?php if ( ! empty( $store['view_details_link'] ) ) : ?>
                        <a href="<?php echo esc_url( $store['view_details_link'] ); ?>" target="_blank"
                            class="our-stores-item__btn our-stores-item__btn--details">
                            <?php esc_html_e( 'View Location', 'ahadul' ); ?>
                        </a>
                        <?php endif; ?>

                        <?php if ( ! empty( $store['book_now_link'] ) ) : ?>
                        <a href="<?php echo esc_url( $store['book_now_link'] ); ?>" target="_blank"
                            class="our-stores-item__btn our-stores-item__btn--book">
                            <?php esc_html_e( 'Book Now', 'ahadul' ); ?>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>