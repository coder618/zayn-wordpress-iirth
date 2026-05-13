<?php 
$current_id = get_the_ID();

// Fetch related treatments (excluding the current one)
$related_treatments = get_posts(array(
    'post_type'      => 'treatment',
    'post_status'    => 'publish',
    'posts_per_page' => 3,
    'post__not_in'   => array($current_id),
    'orderby'        => 'rand', // Randomize to show different treatments
));

if (empty($related_treatments)) {
    return;
}
?>

<section class="other-treatment">
    <div class="container">
        <div class="content">
            <h2>OTHER TREATMENTS</h2>

            <div class="treatment-grid">
                <?php foreach ($related_treatments as $treatment) : ?>
                <?php get_template_part('loop-templates/treatment', null, array('id' => $treatment->ID)); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>