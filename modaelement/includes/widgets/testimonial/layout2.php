<?php
echo '<!-- testimonial section start  -->
    <section class="moda-furniture-testimonial-section moda-section">
        <div class="container">
            <div class="moda-center-heading">
                <h2 class="moda-white-bg">' . $settings['sub_title'] . '</h2>
            </div> 
            <div class="moda-furniture-testimonial-wraper swiper-container">
                <div class="swiper-wrapper">';
if ($settings['member_list']) {
    foreach ($settings['member_list'] as $members) {
        echo '<div class="swiper-slide">
                        <div class="moda-testimonial-items furniture-testimonial-item">
                            <div class="quote">
                                ' . get_that_image($members['quote_icon']) . '
                            </div>
                            <div class="thumb">
                                ' . get_that_image($members['member_photo']) . '
                            </div>
                            <div class="moda-testimonial-content">
                                <p>' . $members['member_info'] . '</p>
                                <div class="author-title">
                                    <a href="" class="title">' . $members['member_name'] . '</a>
                                    <small>' . $members['member_desi'] . '</small>
                                </div>
                            </div>
                        </div>
                    </div>';
    }
}
echo '</div>
            </div>
            <div class="furniture-slider-btn testimonial-slider-btn">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>
    <!-- testimonial section end  -->';