<?php
echo '<!-- .Deals & Offer start  -->
    <div class="moda-furnitures-deal-offer-section moda-section">
        <div class="moda-furniture-countdown-area moda-section">
            <div class="container">
                <div class="moda-center-heading">
                    <h2>' . $settings['title'] . '</h2>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-3 col-sm-6">
                        <div class="moda-furniture-countdown">
                            <h6>' . $settings['sub_title'] . '</h6>
                            <ul data-time="' . $settings['time'] . '" class="furniture-deals" id="coming-soon">
                                <li><span class="days">00</span><p class="time-text">Day</p></li>
                                <li><span class="hours">00</span><p class="time-text">Hour</p></li>
                                <li><span class="minutes">00</span><p class="time-text">Min</p></li>
                                <li><span class="seconds">00</span><p class="time-text">Sec</p></li>
                            </ul>
                        </div>
                    </div>';
if ($wp_query->have_posts()) {
    while ($wp_query->have_posts()) {
        $wp_query->the_post();
        echo ' <div class="col-lg-3 col-sm-6">
                        <div class="moda-furniture-card moda-effect-inner">
                            <a href="' . get_the_permalink() . '" class="furniture-thumb moda-effect moda-deal-card-thumb">
                                ' . moda_wc_get_thumbnail() . '
                                <span>' . moda_discount_badge() . '</span>
                            </a>
                            <a href="' . get_the_permalink() . '" class="title">' . get_the_title() . '</a>
                        </div>
                    </div>';
    }
    wp_reset_postdata();
}
echo '</div>
                <a ' . get_that_link($settings['link']) . ' class="link-arrow">' . $settings['button'] . '<span><i class="far fa-angle-right"></i></span></a>
            </div>
        </div>
    </div>
    <!-- .Deals & Offer end  -->';