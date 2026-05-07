<?php
/**
 * Banner Black Component Template
 */

$fields = get_query_var( 'block_data' );

$video_id  = $fields['banner_black_video'] ?? '';
$video_url = $video_id ? wp_get_attachment_url( $video_id ) : '';
$heading   = $fields['banner_black_h1'] ?? '';
$details   = $fields['banner_black_p'] ?? '';
$social_platform = $fields['banner_black_social_platform'] ?? '';
$social_link     = $fields['banner_black_social_link'] ?? '';
?>

<section
    class="banner-black-section relative w-full min-h-[620px] md:min-h-[95vh] overflow-hidden bg-black flex  justify-center   items-end">
    <!-- Background Video -->
    <?php if ( $video_url ) : ?>
    <video src="<?php echo esc_url( $video_url ); ?>" autoplay muted loop playsinline
        class="absolute inset-0 w-full h-full object-cover z-0"></video>
    <?php endif; ?>

    <!-- Overlay to enhance text readability -->
    <div class="absolute inset-0 bg-black/50 z-10 pointer-events-none"></div>

    <!-- Content Slot -->
    <div class="relative z-20 text-left md:pl-[120px] pl-[20px] w-full">

        <div class="content md:pb-[100px] pb-[10px]">

            <div class="text-content relative">

                <?php if ( $heading ) : ?>
                <h1
                    class="text-4xl md:text-[102px]  font-accent leading-[1.0] text-[#edeacc] uppercase  font-extralight mb-6 drop-shadow-lg">
                    <?php echo ( $heading ); ?>
                </h1>
                <?php endif; ?>

                <?php if ( $details ) : ?>
                <p
                    class="text-[26px] md:text-[70px]  font-signature max-w-3xl  drop-shadow-md relative bottom-[10px] text-[#f0c58d] z-10">
                    <?php echo nl2br( esc_html( $details ) ); ?>
                </p>
                <?php endif; ?>
            </div>

            <?php if ( $social_platform && $social_link ) : ?>
            <div class="mt-8">
                <?php 
                    if ( ! preg_match( '~^(?:f|ht)tps?://~i', $social_link ) && ! preg_match( '/^(?:mailto|tel):/i', $social_link ) ) {
                        $social_link = 'https://' . ltrim( $social_link, '/' );
                    }
                ?>
                <a href="<?php echo esc_url( $social_link ); ?>" target="_blank" rel="noreferrer"
                    class="inline-flex items-center justify-center w-14 h-14 bg-transparent hover:bg-white/10 border border-white/50 rounded-full text-white transition-colors"
                    aria-label="<?php echo esc_attr( ucfirst( $social_platform ) ); ?>">
                    <?php echo get_footer_icon_svg( $social_platform, 24 ); ?>
                </a>
            </div>
            <?php endif; ?>

        </div>

    </div>

    <img src="<?php echo get_template_directory_uri(); ?>/dist/images/section-devider-1.svg"
        class="absolute -bottom-[30px] -left-[5%] min-w-[110vw] min-h-[120px] object-cover pointer-events-none">
</section>