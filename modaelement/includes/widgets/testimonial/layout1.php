<?php
echo '<!-- Testimonial start  -->
    <section class="moda-testimonial-section moda-section">
        <div class="moda-left-bg">' . get_that_image($settings['shape_left']) . '</div>
        <div class="container">
            <div class="moda-header-wrp  moda-testimonial-heading">
                <div class="moda-title-heading mb-0">
                    <div class="title">
                        <h6>' . $settings['sub_title'] . '</h6>
                    </div>
                    <h3 class="line">' . $settings['title'] . '</h3>
                </div>
                <div class="slider-button-group">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next" ></div>
                </div>
            </div>
        </div>
        <div class="testimonial-wraper">
            <div class="right-shape">' . get_that_image($settings['shape_right']) . '</div>
            <div class="moda-testimonial-inner swiper-container">
                <div class="swiper-wrapper">';
if ($settings['member_list']) {
    foreach ($settings['member_list'] as $members) {
        echo '<div class="swiper-slide">
                        <div class="moda-testimonial-items ">
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
        </div>
    </section>
    <!-- Testimonial end  -->';