<!DOCTYPE html>
<html lang="en">

<head>
    <?php wp_head(); ?>
</head>

<body>
    <main>
        <?php get_header(); ?>
        <?php get_avancedSearch() ?>
        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/image(1).png" alt="" alt=""></div>
                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/image(1).png" alt="" alt=""></div>
                <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/image(1).png" alt="" alt=""></div>
            </div>
            <div class="swiper-scrollbar"></div>
        </div>
    </main>
</body>

</html>