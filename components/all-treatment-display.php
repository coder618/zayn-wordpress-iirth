<?php
/**
 * All Treatment Display Component Template
 */

$fields = get_query_var( 'block_data' );
$title  = $fields['title'] ?? '';

// Query all published treatments
$args = array(
    'post_type'      => 'treatment',
    'post_status'    => 'publish',
    'posts_per_page' => -1, // Display all treatments
);

$treatments_query = new WP_Query( $args );
?>

<section class="all-treatment-display-section ">
    <div class="container">
        <?php if ( $title ) : ?>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-12 text-center uppercase tracking-widest">
            <?php echo esc_html( $title ); ?>
        </h2>
        <?php endif; ?>

        <?php if ( $treatments_query->have_posts() ) : ?>
        <div class="items">
            <?php while ( $treatments_query->have_posts() ) : $treatments_query->the_post(); ?>
            <?php 
                // Using the existing treatment loop template part
                get_template_part( 'loop-templates/treatment', null, array( 'id' => get_the_ID() ) ); 
            ?>
            <?php endwhile; ?>
        </div>
        <?php wp_reset_postdata(); ?>
        <?php else : ?>
        <p class="text-center text-gray-500 text-lg">
            <?php esc_html_e( 'No treatments found.', 'ahadul' ); ?>
        </p>
        <?php endif; ?>
    </div>
</section>