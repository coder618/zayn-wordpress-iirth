<?php
/**
 * Template Name: Blank Without 
 *
 * Template for displaying a search page.
 *
 * 
 */


defined( 'ABSPATH' ) || exit;

get_header();
if ( have_posts() ) {
    // Start the Loop.
    while ( have_posts() ) {
        the_post();

        /*
            * Include the Post-Format-specific template for the content.
            * If you want to override this in a child theme, then include a file
            * called content-___.php (where ___ is the Post Format name) and that will be used instead.
            */
        the_content();
    }
}
get_footer();