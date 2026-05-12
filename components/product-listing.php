<?php 
    $component_data = get_query_var("product_listing");
    
    $title = $component_data["title"] ?? "";
    $has_shop_btn = $component_data["has_shop_btn"] ?? false;
    $product_ids = $component_data["product_ids"] ?? []; // [1,2,3]

    // var_dump($product_ids);

    if(empty($product_ids)){
        return;
    }

    $has_shop_btn = $component_data["has_shop_btn"] ?? false;



    $btn_title = $component_data["btn_title"] ?? "";
    $btn_link = $component_data["btn_link"] ?? "";


    $arrow_right ='<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none"><path stroke="#006d57" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.33" d="M2.5 6h7M6 2.5 9.5 6 6 9.5"/></svg>';
?>

<section class="product-listing">

    <div class="container">
        <div class="content">
            <div class="title-part">
                <h2><?php echo $title; ?></h2>

                <?php if ( $has_shop_btn ) : ?>
                <a href="<?php echo $btn_link ; ?>" class="shop-btn"><?php esc_html_e( $btn_title, 'zayn' ); ?>

                    <span>
                        <?php echo $arrow_right; ?>
                    </span>
                </a>


                <?php endif; ?>

            </div>

            <div class="product-items">
                <?php foreach ( $product_ids as $product_id ) : ?>
                <?php  get_template_part( 'loop-templates/product', null, array( 'id' => $product_id ) ); ?>
                <?php endforeach; ?>
            </div>



        </div>
    </div>



</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.product-listing .product-items');
    elems.forEach(function(elem) {
        if (typeof Flickity !== 'undefined') {
            new Flickity(elem, {
                watchCSS: true,
                cellAlign: 'left',
                contain: true,
                wrapAround: true,
                pageDots: false,
                prevNextButtons: false
            });
        }
    });
});
</script>