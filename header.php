<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class( 'antialiased bg-gray-50 text-gray-900 min-h-screen flex flex-col' ); ?>>
    <?php wp_body_open(); ?>
    <div id="page-content" class="site-content">
        <?php get_template_part('main-navigation'); ?>