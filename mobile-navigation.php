<?php 

$calendar_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"><path stroke="#006d57" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 4H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2M16 2v4M8 2v4M3 10h18"/></svg>';


?>

<div class="mobile-header">
    <div class="mobile-top-bar">
        <!-- Hamburger Icon -->
        <button class="mobile-menu-toggle" aria-label="Toggle menu">
            <svg class="hamburger-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
            <svg class="close-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display:none;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <!-- Logo -->
        <div class="mobile-logo">
            <?php if (has_custom_logo()) : ?>
            <?php the_custom_logo(); ?>
            <?php else : ?>
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/icons/desktop-nav-logo.svg"
                    alt="<?php bloginfo('name'); ?>" />
            </a>
            <?php endif; ?>
        </div>

        <!-- Spacer for centering logo -->
        <div class="booking-link">
            <a href="<?php echo esc_url(carbon_get_theme_option('booking_page_link')); ?>" class="mobile-booking-link">
                <span><?php echo $calendar_icon; ?></span>
            </a>
        </div>
    </div>

    <?php
    $menu_items = carbon_get_theme_option('main_navigation_items');
    if (!is_array($menu_items)) {
        $menu_items = [];
    }
    ?>

    <div class="mobile-nav-menu">
        <ul class="mobile-nav-list">
            <?php foreach ($menu_items as $item) : ?>
            <?php 
                $has_children = !empty($item['sub_menu_links']);
                ?>
            <li class="mobile-nav-item <?php echo $has_children ? 'has-dropdown' : ''; ?>">
                <div class="mobile-nav-link-wrapper">
                    <a href="<?php echo esc_url($item['url']); ?>" class="mobile-nav-link">
                        <?php echo esc_html($item['label']); ?>
                    </a>
                    <?php if ($has_children) : ?>
                    <button class="mobile-submenu-toggle" aria-label="Toggle submenu">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <?php endif; ?>
                </div>

                <?php if ($has_children) : ?>
                <ul class="mobile-submenu">
                    <?php foreach ($item['sub_menu_links'] as $child) : ?>
                    <li class="mobile-submenu-item">
                        <a href="<?php echo esc_url($child['url']); ?>" class="mobile-submenu-link">
                            <?php echo esc_html($child['label']); ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.querySelector('.mobile-menu-toggle');
    const mobileMenu = document.querySelector('.mobile-nav-menu');
    const hamburgerIcon = document.querySelector('.hamburger-icon');
    const closeIcon = document.querySelector('.close-icon');

    if (toggleBtn && mobileMenu) {
        toggleBtn.addEventListener('click', function() {
            const isOpen = mobileMenu.classList.toggle('is-open');

            if (isOpen) {
                hamburgerIcon.style.display = 'none';
                closeIcon.style.display = 'block';
                document.body.style.overflow = 'hidden';
            } else {
                hamburgerIcon.style.display = 'block';
                closeIcon.style.display = 'none';
                document.body.style.overflow = '';
            }
        });
    }

    const submenuToggles = document.querySelectorAll('.mobile-submenu-toggle');
    submenuToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            const parentLi = this.closest('.mobile-nav-item');
            parentLi.classList.toggle('submenu-open');
            const icon = this.querySelector('svg');
            if (parentLi.classList.contains('submenu-open')) {
                icon.style.transform = 'rotate(180deg)';
            } else {
                icon.style.transform = 'rotate(0deg)';
            }
        });
    });
});
</script>