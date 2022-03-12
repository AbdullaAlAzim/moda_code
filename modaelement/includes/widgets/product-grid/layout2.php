<?php
echo '<!-- Recently Viewed start  -->
    <section class="moda-product-recently-viewed moda-section">
        <div class="container">
            <div class="moda-header-wrp align-items-start">
                <div class="moda-title-heading">
                    <h3 class="line-light">' . $settings['title'] . '</h3>
                </div>
    
                <div class="slider-button-group">
                    <div class="swiper-button-prev" id="product-prev"></div>
                    <div class="swiper-button-next" id="product-next"></div>
                </div>
            </div>
            <div class="moda-recent-product-wraper swiper-container">
                <div class="moda-recent-viewed-items swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="row">';
if ($wp_query->have_posts()) {
    while ($wp_query->have_posts()) {
        $wp_query->the_post();
        echo '<div class="col-xl-2 col-md-3 col-6">
                                <div class="moda-product-card-item moda-effect-inner">
                                    <a href="' . get_the_permalink() . '" class="product-thumb moda-effect">
                                        ' . moda_wc_get_thumbnail() . '
                                    </a>
                                    <div class="card-description">
                                        <div class="product-title">
                                            <span>' . moda_product_category() . '</span>
                                            <a href="' . get_the_permalink() . '">' . get_the_title() . '</a>
                                        </div>
                                        <div class="product-price">';
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
    <!-- Recently Viewed end  -->';