<?php
echo '<!-- hero section start  -->
    <section class="moda-banner-slider ">
        <div class="moda-electronic-banner swiper-container">
            <div class="swiper-wrapper">';
if ($settings['hero_list']) {
    foreach ($settings['hero_list'] as $hero) {
        echo '<div class="swiper-slide">
                    <div class="slide">
                        <div class="moda-slide-img">
                          ' . get_that_image($hero['image']) . '
                        </div>
                        <div class="moda-hero-wraper-two">
                            <div class="moda-hero-item">
                                <div class="content">
                                    <p >' . $hero['sub_title'] . '</p>
                                    <h2 >' . $hero['title'] . '</h2>
                                    <div class="moda-hero-btn-group">
                                        <a ' . get_that_link($hero['link']) . ' class="moda-btn red-btn"><span><i class="fas fa-shopping-cart"></i></span> ' . $hero['button'] . '</a>
                                        <a ' . get_that_link($hero['link2']) . ' class="moda-btn red-btn border-btn">' . $hero['button2'] . ' <span><i class="fal fa-long-arrow-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                </div>';
    }
}
echo ' </div>
            <div class="slider-button-group">
                <div class="swiper-button-next" id="electronic-banner-next"></div>
                <div class="swiper-button-prev" id="electronic-banner-prev"></div>
            </div>
        </div>
    </section>
    <!-- hero section end  -->';