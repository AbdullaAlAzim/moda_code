<?php
echo '<!-- product offer start -->
    <section class="moda-product-discount-section">
        <div class="moda-bg-images">' . get_that_image($settings['image_l4']) . '</div>
        <div class="container">
            <div class="moda-discount-wrapper swiper-container">
                <div class="swiper-wrapper">';
if ($wp_query->have_posts()) {
    while ($wp_query->have_posts()) {
        $wp_query->the_post();
        echo '<div class="swiper-slide">
                        <div class="moda-discount-items">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-6">
                                    <div class="content">
                                        <p>25% Off for all products</p>
                                        <h6>' . get_the_title() . '</h6>
                                        <a href="' . get_the_permalink() . '" class="link-arrow">Shop Now<span><i class="far fa-angle-right"></i></span></a>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <div class="moda-discount-thumb">
                                        <span class="top-round round"></span>
                                        <span class="bottom-round round"></span>
                                        <span class="middle-round round"></span>
                                        <div class="thumb">
                                            <a href="' . get_the_permalink() . '">
                                                ' . woocommerce_get_product_thumbnail('woocommerce_full_size') . '
                                            </a>
                                        <div class="moda-offer">
                                                <p>25% off</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
    }
    wp_reset_postdata();
}
echo '</div>
                <div class="moda-slider-dotted swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- product offer end -->';