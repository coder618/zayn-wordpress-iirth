<div class="desktop-header">
    <div class="top-message">
        <?php
        $banner_message = carbon_get_theme_option('site_banner_message');
        if (!empty($banner_message)) {
            echo esc_html($banner_message);
        }
        ?>
    </div>

    <?php
    $menu_items = carbon_get_theme_option('main_navigation_items');
    if (!is_array($menu_items)) {
        $menu_items = [];
    }
    
    // Split top-level items for left and right
    $half = ceil(count($menu_items) / 2);
    $left_items = array_slice($menu_items, 0, $half);
    $right_items = array_slice($menu_items, $half);
    ?>

    <div class="main-nav-container container">
        <div class="main-nav-inner">

            <!-- Left Navigation -->
            <nav class="nav-left">
                <ul class="nav-list">
                    <?php foreach ($left_items as $item) : ?>
                    <?php 
                        $is_mega_menu = !empty($item['has_mega_menu']); 
                        $has_children = !empty($item['sub_menu_links']);
                        ?>
                    <li
                        class="nav-item <?php echo $is_mega_menu ? 'is-mega-menu' : ''; ?> <?php echo $has_children ? 'has-dropdown' : ''; ?>">
                        <a href="<?php echo esc_url($item['url']); ?>"
                            class="nav-link <?php echo $has_children ? 'nav-toggle' : ''; ?>">
                            <?php echo esc_html($item['label']); ?>
                            <?php if ($has_children) : ?>
                            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                            <?php endif; ?>
                        </a>

                        <?php if ($has_children && $is_mega_menu) : ?>
                        <!-- Mega Menu -->
                        <div class="nav-dropdown mega-menu">

                            <!-- Mega Menu Left (Categories) -->
                            <?php $bg_image = !empty($item['mega_menu_bg']) ? $item['mega_menu_bg'] : ''; ?>
                            <div class="mega-menu-sidebar"
                                <?php if($bg_image) echo 'style="background-image: url('.esc_url($bg_image).');"'; ?>>
                                <?php if($bg_image): ?>
                                <div class="mega-menu-overlay"></div>
                                <?php endif; ?>
                                <ul class="mega-menu-sublist">
                                    <?php foreach ($item['sub_menu_links'] as $child) : ?>
                                    <li>
                                        <a href="<?php echo esc_url($child['url']); ?>" class="mega-menu-sublink">
                                            <?php echo esc_html($child['label']); ?>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <!-- Mega Menu Right (Products) -->
                            <div class="mega-menu-content">
                                <?php 
                                $mega_products = !empty($item['mega_menu_products']) ? $item['mega_menu_products'] : [];
                                if (!empty($mega_products)) :
                                    foreach ($mega_products as $prod_entry) :
                                        $prod_id = $prod_entry['id'];
                                        $prod_title = get_the_title($prod_id);
                                        $prod_link = get_permalink($prod_id);
                                        $prod_img = get_the_post_thumbnail_url($prod_id, 'medium');
                                        ?>
                                <a href="<?php echo esc_url($prod_link); ?>" class="mega-menu-product">
                                    <div class="mega-menu-product-image">
                                        <?php if ($prod_img) : ?>
                                        <img src="<?php echo esc_url($prod_img); ?>"
                                            alt="<?php echo esc_attr($prod_title); ?>" />
                                        <?php endif; ?>
                                    </div>
                                    <h3 class="mega-menu-product-title"><?php echo esc_html($prod_title); ?></h3>
                                </a>
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </div>
                        </div>
                        <?php elseif ($has_children) : ?>
                        <!-- Standard Dropdown -->
                        <ul class="nav-dropdown standard-dropdown">
                            <?php foreach ($item['sub_menu_links'] as $child) : ?>
                            <li class="standard-dropdown-item">
                                <a href="<?php echo esc_url($child['url']); ?>" class="standard-dropdown-link">
                                    <?php echo esc_html($child['label']); ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <!-- Center Logo -->
            <div class="nav-logo">
                <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
                <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/icons/desktop-nav-logo.svg"
                        alt="<?php bloginfo('name'); ?>" />
                </a>
                <?php endif; ?>
            </div>

            <!-- Right Navigation -->
            <nav class="nav-right">
                <ul class="nav-list">
                    <?php foreach ($right_items as $item) : ?>
                    <?php 
                        $is_mega_menu = !empty($item['has_mega_menu']); 
                        $has_children = !empty($item['sub_menu_links']);
                        ?>
                    <li
                        class="nav-item <?php echo $is_mega_menu ? 'is-mega-menu' : ''; ?> <?php echo $has_children ? 'has-dropdown' : ''; ?>">
                        <a href="<?php echo esc_url($item['url']); ?>"
                            class="nav-link <?php echo $has_children ? 'nav-toggle' : ''; ?>">
                            <?php echo esc_html($item['label']); ?>
                            <?php if ($has_children) : ?>
                            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                            <?php endif; ?>
                        </a>

                        <?php if ($has_children && $is_mega_menu) : ?>
                        <!-- Mega Menu -->
                        <div class="nav-dropdown mega-menu">

                            <!-- Mega Menu Left (Categories) -->
                            <?php $bg_image = !empty($item['mega_menu_bg']) ? $item['mega_menu_bg'] : ''; ?>
                            <div class="mega-menu-sidebar"
                                <?php if($bg_image) echo 'style="background-image: url('.esc_url($bg_image).');"'; ?>>
                                <?php if($bg_image): ?>
                                <div class="mega-menu-overlay"></div>
                                <?php endif; ?>
                                <ul class="mega-menu-sublist">
                                    <?php foreach ($item['sub_menu_links'] as $child) : ?>
                                    <li>
                                        <a href="<?php echo esc_url($child['url']); ?>" class="mega-menu-sublink">
                                            <?php echo esc_html($child['label']); ?>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <!-- Mega Menu Right (Products) -->
                            <div class="mega-menu-content">
                                <?php 
                                $mega_products = !empty($item['mega_menu_products']) ? $item['mega_menu_products'] : [];
                                if (!empty($mega_products)) :
                                    foreach ($mega_products as $prod_entry) :
                                        $prod_id = $prod_entry['id'];
                                        $prod_title = get_the_title($prod_id);
                                        $prod_link = get_permalink($prod_id);
                                        $prod_img = get_the_post_thumbnail_url($prod_id, 'medium');
                                        ?>
                                <a href="<?php echo esc_url($prod_link); ?>" class="mega-menu-product">
                                    <div class="mega-menu-product-image">
                                        <?php if ($prod_img) : ?>
                                        <img src="<?php echo esc_url($prod_img); ?>"
                                            alt="<?php echo esc_attr($prod_title); ?>" />
                                        <?php endif; ?>
                                    </div>
                                    <h3 class="mega-menu-product-title"><?php echo esc_html($prod_title); ?></h3>
                                </a>
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </div>
                        </div>
                        <?php elseif ($has_children) : ?>
                        <!-- Standard Dropdown -->
                        <ul class="nav-dropdown standard-dropdown">
                            <?php foreach ($item['sub_menu_links'] as $child) : ?>
                            <li class="standard-dropdown-item">
                                <a href="<?php echo esc_url($child['url']); ?>" class="standard-dropdown-link">
                                    <?php echo esc_html($child['label']); ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const navItems = document.querySelectorAll('.has-dropdown');

    navItems.forEach(item => {
        const toggle = item.querySelector('.nav-toggle');
        const dropdown = item.querySelector('.nav-dropdown');

        if (toggle && dropdown) {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();

                // Close other dropdowns
                navItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        const otherDropdown = otherItem.querySelector('.nav-dropdown');
                        if (otherDropdown) {
                            otherDropdown.classList.remove('is-open');
                        }
                    }
                });

                // Toggle current dropdown
                dropdown.classList.toggle('is-open');
            });
        }
    });

    // Close on click outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.has-dropdown')) {
            navItems.forEach(item => {
                const dropdown = item.querySelector('.nav-dropdown');
                if (dropdown) {
                    dropdown.classList.remove('is-open');
                }
            });
        }
    });
});
</script>