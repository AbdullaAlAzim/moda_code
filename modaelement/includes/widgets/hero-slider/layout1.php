<?php
echo '<section class="moda-hero-section">
        <div class="moda-hero-wraper swiper-container">
            <div class="swiper-wrapper">';
if ($settings['hero_list']) {
    foreach ($settings['hero_list'] as $hero) {
        echo '<div class="swiper-slide">
                    <div class="item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="hero-left">
                                    <h5 >' . $hero['sub_title'] . '</h5>
                                    <h2 >' . $hero['title'] . '</h2>
                                    <a ' . get_that_link($hero['link']) . ' class="arrow-btn"><i class="fal fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="banner-images-thumb" >
                                    ' . get_that_image($hero['image_bg'], 'banner-thumb-bg') . '
                                    ' . get_that_image($hero['image'], 'banner-thum') . '
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
    }
}
echo ' </div>
            <div class="swiper-pagination"></div>
              <div class="swiper-progress-bar">
                <span class="slide_progress-bar"></span>
              </div>
            </div>
        <div class="moda-social-link">
            <ul>';
if ($settings['social_list']) {
    foreach ($settings['social_list'] as $social) {
        echo '<li><a ' . get_that_link($social['sc_link']) . '>' . $social['sc_text'] . '</a></li>';
    }
}
echo '</ul>
        </div>
    </section>';