<?php
echo '<!-- product-fashion-section start  -->
    <section class="product-fashion-section moda-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 wow fadeInUp" >
                    <div class="swiper-container mySwiper-one">
                        <div class="swiper-wrapper">';
if ($settings['promo_list']) {
    foreach ($settings['promo_list'] as $promo) {
        echo '<div class="swiper-slide">
                            <div class="fashion-slider">
                                <div class="images">
                                    ' . get_that_image($promo['image']) . '
                                    <div class="content">
                                        <h4>' . $promo['sub_title'] . '</h4>
                                        <a ' . get_that_link($promo['link']) . ' class="title-link">' . $promo['title'] . '</a>
                                        <a ' . get_that_link($promo['link']) . ' class="link">' . $promo['button'] . ' <span><i class="fal fa-long-arrow-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                          </div>';
    }
}
echo '</div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <div class="col-lg-6 ">
                    <div class="row">';
$loop = 0;
if ($settings['promo_list2']) {
    foreach ($settings['promo_list2'] as $promo2) {
        $loop++;
        if ($loop == 2) {
            $cls = 'images-extra m-0';
        } else {
            $cls = '';
        }
        echo '<div class="col-lg-12 wow fadeInUp"  data-wow-delay="0.3s">
                            <div class="images-items ' . $cls . '">
                                ' . get_that_image($promo2['image2']) . '
                                <div class="content">
                                    <h4>' . $promo2['sub_title2'] . '</h4>
                                    <a ' . get_that_link($promo2['link2']) . ' class="title-link">' . $promo2['title2'] . '</a>
                                    <a ' . get_that_link($promo2['link2']) . ' class="link">' . $promo['button'] . '<span><i class="fal fa-long-arrow-right"></i></span></a>
                                </div>
                            </div>
                        </div>';
    }
}
echo '</div>
                </div>
            </div>
        </div>
    </section>
    <!-- product-fashion-section end  -->';