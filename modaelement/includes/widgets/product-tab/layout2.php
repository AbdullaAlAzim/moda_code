<?php
echo '<!-- Featured Products start  -->
    <section class="moda-furniture-product-featured moda-section">
        <div class="container">
            <div class="moda-center-heading">
                <h2 class="moda-white-bg">' . $settings['title'] . '</h2>
            </div>
            <div class="furniture-heading moda-header-wrp">
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
    echo '<button class="' . $act . '" id="nav-' . $category->slug . '-tab" data-bs-toggle="tab" data-bs-target="#nav-' . $category->slug . '-one" type="button" role="tab" >' . $category->name . ' </button>';
}
echo ' </div>
                </nav>
                <div class="furniture-slider-btn">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>

            <div class="tab-content" id="nav-tabContent">';
$loop2 = 0;
foreach ($categories as $category) {
    $loop2++;
    if ($loop2 == 1) {
        $act2 = 'show active';
    } else {
        $act2 = '';
    }
    echo '<div class="tab-pane ' . $act2 . ' fade" id="nav-' . $category->slug . '-one" role="tabpanel" >
                    <div class="moda-furniture-product-slider swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="row">';
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            echo '<div class="col-lg-4 col-md-6">
                                        <div class="moda-furniture-card moda-effect-inner moda-product-card-furniture">
                                            <a href="' . get_the_permalink() . '" class="furniture-thumb moda-effect ">
                                                ' . moda_wc_get_thumbnail() . '
                                                <span>' . moda_discount_badge() . '</span>
                                            </a>
                                            <div class="product-titile">
                                                <a href="' . get_the_permalink() . '" class="title">' . get_the_title() . '</a>
                                                ' . moda_get_product_review() . '
                                            </div>
                                            <div class="price">';
            woocommerce_template_loop_price();
            echo '</div>
                                        </div>
                                    </div>';
        }
        wp_reset_postdata();
    }
    echo '</div>
                            </div>
                        </div>
                    </div>
                </div>';
}
echo '</div>
        </div>
    </section>
    <!-- Featured Products end  -->';