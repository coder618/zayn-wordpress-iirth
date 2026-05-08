<?php 
    $component_data = get_query_var("product_listing");
    
    $title = $component_data["title"] ?? "";
    $has_shop_btn = $component_data["has_shop_btn"] ?? false;
    $product_ids = $component_data["product_ids"] ?? []; // [1,2,3]

    // var_dump($product_ids);

    if(empty($product_ids)){
        return;
    }

?>

<section class="product-listing">

    <div class="content">
        <div class="title-part">
            <h2><?php echo $title; ?></h2>

            <?php if ( $has_shop_btn ) : ?>
            <a href="<?php echo get_home_url("/shop") ; ?>"
                class="shop-btn"><?php esc_html_e( 'SHOP ALL', 'zayn' ); ?></a>
            <?php endif; ?>

        </div>

        <div class="product-items">
            <?php foreach ( $product_ids as $product_id ) : ?>
            <?php  get_template_part( 'loop-templates/product', null, array( 'id' => $product_id ) ); ?>
            <?php endforeach; ?>
        </div>



    </div>



</section>