<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
if ( have_posts() ) : while ( have_posts() ) :         the_post();


?>

<div class="single-treatment-page bg-red-500 min-h-10">
    <div class="top-part-gallery-title-with-detail">
        <div class="left-part">
            <?php

                // Fetch the gallery images
                $gallery_ids = [];
	

				get_template_part( 'components/single-product-page/product-gallery', null, [
                    "image_ids" => $all_image_ids
                ] );
			?>
        </div>
        <div class="right-part">
            <div class="content">
                <div class="title-and-price">
                    <h1><?php echo get_the_title(); ?></h1>

                    <div class="price-wrapper">

                        <?php // echo the price  ?>
                    </div>
                </div>

                <div class="excerpt">
                    <?php  the_content(); ?>
                </div>

                <div class="add-to-cart-btn-wrapper">

                    <!-- add booking link  -->
                    <a href="">Booking</a>
                </div>

            </div>



        </div>



    </div>

</div>

<?php
endwhile; endif;

get_footer();