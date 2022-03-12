<?php
echo '<!-- Flash Sale Today start  -->
    <section class="moda-flash-sale-today-section moda-section">
        <div class="container">
            <div class="moda-section-heading">
                <div class="moda-title-heading m-0">
                    <h3 class="line-light">' . $settings['title'] . '</h3>
                </div>
                <ul data-time="' . $settings['time'] . '" class="moda-countdown" id="coming-soon">
                    <li><span class="days">00</span><p class="time-text">Day</p></li>
                    <li><span class="hours">00</span><p class="time-text">Hour</p></li>
                    <li><span class="minutes">00</span><p class="time-text">Min</p></li>
                    <li><span class="seconds">00</span><p class="time-text">Sec</p></li>
                </ul>
            </div>
            <div class="moda-flash-product-wraper">
                <div class="row" >
                    <div class="col-lg-6">
                        <div class="moda-flash-sale-wraper moda-bg" data-background="' . $settings['image']['url'] . '">
                            <div class="moda-flash-slide-inner swiper-container">
                                <div class="swiper-wrapper">';
if ($wp_query1->have_posts()) {
    while ($wp_query1->have_posts()) {
        $wp_query1->the_post();
        echo '<div class="swiper-slide">
                                        <div class="moda-flash-sale-items">
                                            <span class="moda-offer">' . moda_discount_badge() . '</span>
                                            <div class="thumb">
                                                ' . moda_wc_get_thumbnail() . '
                                            </div>
                                            <a href="' . get_the_permalink() . '" class="title">' . get_the_title() . '</a>
                                            <a href="' . get_the_permalink() . '" class="moda-btn moda-red-btn">Shop Now <span><i class="fal fa-long-arrow-right"></i></span></a>
                                        </div>
                                    </div>';
    }
    wp_reset_postdata();
}
echo '</div>
                            </div>
                            <div class="moda-slider-btn">
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="row">';
if ($wp_query->have_posts()) {
    while ($wp_query->have_posts()) {
        $wp_query->the_post();
        echo '<div class="col-lg-6 col-md-4 col-6">
                                <div class="moda-product-card-item moda-effect-inner">
                                    <a href="' . get_the_permalink() . '" class="product-thumb moda-effect moda-product-bg moda-white">
                                        ' . moda_wc_get_thumbnail() . '
                                    </a>
                                    <div class="card-description">
                                        <div class="product-title">
                                            <span>' . moda_product_category() . '</span>
                                            ' . moda_get_product_review() . '
                                            <a href="' . get_the_permalink() . '">' . get_the_title() . '</a>
                                        </div>
                                        <div class="product-price moda-price">';
        woocommerce_template_loop_price();
        echo '</div>
                                    </div>
                                </div>
                            </div>';
    }
    wp_reset_postdata();
}
echo '</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Flash Sale Today end  -->';