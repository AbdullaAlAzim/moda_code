<?php
echo '<!-- popular product section start  -->
    <section class="moda-product-popular-section moda-section pt-0">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-6">
                    <div class="moda-title-heading">
                        <h3 class="line-light">' . $settings['title'] . '</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="moda-header-wrp justify-content-lg-end align-items-center">
                        <nav class="moda-tablist">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">';
$loop = 0;
foreach ($categories as $category) {
    $loop++;
    if ($loop == 1) {
        $act = 'active';
    } else {
        $act = '';
    }
    echo '<button class="' . $act . '" id="nav-' . $category->slug . '-tab" data-bs-toggle="tab" data-bs-target="#nav-' . $category->slug . '" type="button" role="tab" >' . $category->name . '</button>';
}
echo '</div>
                        </nav>
                        <div class="slider-button-group moda-product-slider-btn">
                            <div class="swiper-button-prev" id="tab-prev"></div>
                            <div class="swiper-button-next" id="tab-next"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row moda-product-popular" >
                <div class="col-lg-9 pl-0">
                    <div class="tab-content " id="nav-tabContent">';
$loop2 = 0;
foreach ($categories as $category) {
    $loop2++;
    if ($loop2 == 1) {
        $act2 = 'show active';
    } else {
        $act2 = '';
    }
    echo '<div class="tab-pane ' . $act2 . ' fade" id="nav-' . $category->slug . '" role="tabpanel" >
                            <div class="moda-tabs-perslide">
                                <div class="moda-tabs-slider-inner swiper-container">
                                    <div class="moda-tabs-items swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="row">';
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            echo '<div class="col-md-4 col-4">
                                                    <div class="moda-product-card-item moda-effect-inner">
                                                        <a href="' . get_the_permalink() . '" class="product-thumb moda-effect moda-product-bg">
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
                        </div>';
}
echo '</div>
                </div>
                <div class="col-lg-3 pr-0 d-none d-lg-block">
                    <div class="moda-product-add">
                        ' . get_that_image($settings['image'], 'moda-add-bg') . '
                        <span class="moda-add-ctg-btn">' . $settings['lable'] . '</span>
                        <div class="moda-add-content">
                            <a ' . get_that_link($settings['link']) . ' class="title">' . $settings['ad_title'] . '</a>
                            <a ' . get_that_link($settings['link']) . ' class="moda-btn moda-red-btn">Shop Now <span><i class="fal fa-long-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- popular product section end  -->';