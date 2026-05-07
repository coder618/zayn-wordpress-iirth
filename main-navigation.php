<div class="desktop-header">
    <div class="top-message">
        <?php
        $banner_message = carbon_get_theme_option('site_banner_message');
        if (!empty($banner_message)) {
            echo esc_html($banner_message);
        }
        ?>
    </div>



</div>