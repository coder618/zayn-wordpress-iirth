<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
if ( have_posts() ) : while ( have_posts() ) : the_post();

    // Fetch meta information from Carbon Fields
    $price         = carbon_get_the_post_meta( 'treatment_price' );
    $booking_link  = carbon_get_the_post_meta( 'treatment_booking_link' );
    $gallery_ids   = carbon_get_the_post_meta( 'treatment_gallery' );
    $used_products = carbon_get_the_post_meta( 'treatment_used_products' );
    // var_dump($used_products);
    
    // Combine featured image with gallery images
    $all_image_ids = [];
    if ( has_post_thumbnail() ) {
        $all_image_ids[] = get_post_thumbnail_id();
    }
    if ( is_array( $gallery_ids ) ) {
        $all_image_ids = array_merge( $all_image_ids, $gallery_ids );
    }

?>

<div class="single-treatment-page ">
    <div class="container">

        <div class="top-part-gallery-title-with-detail">
            <div class="left-part">
                <?php
                    get_template_part( 'components/single-product-page/product-gallery', null, [
                        "image_ids" => $all_image_ids
                    ] );
                ?>
            </div>
            <div class="right-part">
                <div class="content">
                    <div class="title-and-price">
                        <h1><?php echo get_the_title(); ?></h1>
                        <?php if ( $price ) : ?>
                        <div class="price-wrapper">
                            <?php echo esc_html( $price ); ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="excerpt">
                        <?php the_content(); ?>
                    </div>

                    <?php if ( $booking_link ) : ?>
                    <div class="booking-btn-wrapper">
                        <!-- add booking link  -->
                        <a class="booking-btn" target="_blank"
                            href="<?php echo esc_url( $booking_link ); ?>">Booking</a>
                    </div>
                    <?php endif; ?>



                </div>

            </div>

        </div>


        <div class="product-listing-wrapper">

            <?php 
            if ( ! empty( $used_products ) && is_array( $used_products ) ) {
                // $product_ids = array_column( $used_products, 'id' );
                
                set_query_var("product_listing", [
                    "title" => "PRODUCTS USED IN THIS TREATMENT",
                    "has_shop_btn" => false,
                    "product_ids" => $used_products
                ]);
                
                get_template_part( 'components/product-listing' );

                get_template_part( 'components/other-treatment' );


            } 
            
        ?>
        </div>



    </div>

</div>

<?php
endwhile; endif;

get_footer();