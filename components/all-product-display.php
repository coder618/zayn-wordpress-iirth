<?php
/**
 * All Product Display Component Template
 */

$fields = get_query_var( 'block_data' );
$title  = $fields['title'] ?? '';

// Query all published products
$args = array(
    'post_type'      => 'product',
    'post_status'    => 'publish',
    'posts_per_page' => -1, // Display all products
);

if ( is_product_category() || is_product_tag() ) {
    $queried_object = get_queried_object();
    if ( $queried_object && is_a( $queried_object, 'WP_Term' ) ) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => $queried_object->taxonomy,
                'field'    => 'term_id',
                'terms'    => $queried_object->term_id,
            ),
        );
        // Optionally override title with category/tag name
        // $title = $queried_object->name;
    }
}

$products_query = new WP_Query( $args );
?>

<section class="all-product-display-section ">
    <div class="container ">
        <?php if ( $title ) : ?>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-8 text-center">
            <?php echo esc_html( $title ); ?>
        </h2>
        <?php endif; ?>

        <?php if ( $products_query->have_posts() ) : ?>
        <div class="items">
            <?php while ( $products_query->have_posts() ) : $products_query->the_post(); ?>
            <?php 
                        // Using the existing product loop template part
                        get_template_part( 'loop-templates/product', null, array( 'id' => get_the_ID() ) ); 
                    ?>
            <?php endwhile; ?>
        </div>
        <?php wp_reset_postdata(); ?>
        <?php else : ?>
        <p class="text-center text-gray-500 text-lg">
            <?php esc_html_e( 'No products found.', 'ahadul' ); ?>
        </p>
        <?php endif; ?>
    </div>
</section>