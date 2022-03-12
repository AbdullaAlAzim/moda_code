<?php
echo '<!-- hero section start  -->
    <section class="moda-banner-slider ">
        <div class="moda-furniture-banner">
            <div class="swiper-wrapper">';
if ($settings['hero_list']) {
    foreach ($settings['hero_list'] as $hero) {
        echo '<div class="swiper-slide">
                    <div class="slide">
                        <div class="moda-slide-img">
                          ' . get_that_image($hero['image']) . '
                        </div>
                        <div class="moda-hero-wraper-two moda-hero-wraper-three">
                            <div class="moda-hero-item">
                                <div class="content moda-hero-content-three">
                                    <p ><span><i class="fa fa-check"></i></span> ' . $hero['sub_title'] . '</p>
                                    <h2 >' . $hero['title'] . '</h2>
                                    <h5 >' . $hero['sub_ifo3'] . '</h5>
                                    <a ' . get_that_link($hero['link']) . ' class="moda-btn moda-white-btn">' . $hero['button'] . ' <span><i class="far fa-chevron-right"></i></span></a>
                                </div>
                            </div>
                        </div>
                      </div>
                </div>';
    }
}
echo ' </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- hero section end  -->';