</div><!-- #content -->

</div><!-- #content -->

<footer class="bg-white ">
    <div class="container ">


        <!-- Logo -->
        <div class="footer-logo-wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/icons/footer-logo.png" alt="zayn logo">
        </div>

        <!-- Menus -->
        <div class="footer-link-list">

            <!-- Shop & Book -->
            <div>
                <h3>Shop & Book</h3>
                <?php
                if ( has_nav_menu( 'footer_1' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'footer_1',
                        'container'      => false,
                        'menu_class'     => '',
                        'fallback_cb'    => false,
                    ) );
                }
                ?>
            </div>

            <!-- General -->
            <div>
                <h3>General</h3>


                <?php
                if ( has_nav_menu( 'footer_2' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'footer_2',
                        'container'      => false,
                        'menu_class'     => '',
                        'fallback_cb'    => false,
                    ) );
                }
                ?>
            </div>

            <!-- Legal -->
            <div>
                <h3>Shop & Book</h3>

                <?php
                if ( has_nav_menu( 'footer_3' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'footer_3',
                        'container'      => false,
                        'menu_class'     => '',
                        'fallback_cb'    => false,
                    ) );
                }
                ?>
            </div>
        </div>


    </div>

    <!-- Bottom Bar -->
    <div class="copyright-section">

        <div class="container">
            <div class="content">


                <div class="left-part">
                    <div class="site-name">
                        <?php echo esc_html( strtoupper( get_bloginfo( 'name' ) ) ); ?>
                    </div>

                    <?php
                    $phone = carbon_get_theme_option( 'site_phone_number' );
                    if ( ! empty( $phone ) ) {
                        echo '<div>T: ' . esc_html( $phone ) . '</div>';
                    }
                ?>

                </div>

                <div class="right-part">
                    SITE BY IIRTH
                </div>

            </div>
        </div>

    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>

<?php wp_footer(); ?>
</body>

</html>