<?php
echo '<!-- Categories start  -->
    <section class="moda-categories-section moda-section pb-0">
        <div class="container">
            <div class="moda-header-wrp">
                <div class="moda-title-heading">
                    <div class="title">
                        <h6>' . $settings['sec_sub_title'] . '</h6>
                    </div>
                    <h3 class="line">' . $settings['sec_title'] . '</h3>
                </div>
                <div class="slider-button-group">
                    <div class="swiper-button-prev" id="ctg-prev"></div>
                    <div class="swiper-button-next" id="ctg-next"></div>
                </div>
            </div>
        </div>
        <div class="moda-categories-section-wraper swiper-container">
            <div class="swiper-wrapper">';
if ($categories) {
    foreach ($categories as $cats) {
        $thumbnail_id = get_term_meta($cats->term_id, 'thumbnail_id', true);
        echo '<div class="swiper-slide">
                    <div class="moda-categories-gadget-item moda-effect-inner">
                        <a href="' . get_term_link($cats->slug, $cats->taxonomy) . '" class="thumb moda-effect">
                            ' . wp_get_attachment_image($thumbnail_id, 'full') . '
                            <span class="moda-blog-ctg-btn">' . $cats->name . '</span>
                        </a>
                        <a href="' . get_term_link($cats->slug, $cats->taxonomy) . '" class="moda-ctg-btn"> <span>Details More</span><i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>';
    }
}
echo '</div>
        </div>
    </section>
    <!-- Categories end  -->';