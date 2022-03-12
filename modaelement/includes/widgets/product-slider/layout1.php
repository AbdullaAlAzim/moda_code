<?php
echo ' <!-- product-category-section start  -->
    <section class="product-category-section moda-section">
        <div class="container">
            <div class="countdown-area" >
                <h2>' . $settings['title'] . '</h2>
                <div class="countdown-inner">
                    <h4>End in :</h4>
                    <div class="countdown" data-date="' . $settings['date'] . '"></div>
                </div>
            </div>
            <div class="product-category-inner">
             <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
                <div class="product-area swiper-container countdown-slide-arrow">
                    <div class="swiper-wrapper">';
if ($wp_query->have_posts()) {
    while ($wp_query->have_posts()) {
        $wp_query->the_post();
        echo '<div class="swiper-slide">
                            <div class="product-card wow fadeInUp">
                                <div class="product-images">';
        moda_wc_thumbnail('images');
        echo '<div class="product-save"><span>' . moda_discount_badge() . '</span></div>
                                    <div class="product-action">
                                        <a href="/?add-to-cart=' . get_the_ID() . '" data-quantity="1" data-product_id="' . get_the_ID() . '" data-product_sku="" class="ajax_add_to_cart add_to_cart_button">
                                            <span class="action-text">Add To cart</span>
                                            <span class="icon"><i class="fas fa-shopping-cart"></i></span>
                                        </a>';
        moda_wishlist_grid_button();
        moda_compare_icon_in_product_card();
        echo '</div>
                                </div>
                                <div class="product-title">
                                        <span class="categories">' . moda_product_category() . '</span>
                                        ' . moda_get_product_review() . '
                                    <a href="' . get_the_permalink() . '" class="title">' . get_the_title() . '</a>
                                    ';
        woocommerce_template_loop_price();
        echo '
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
    </section>
    <!-- product-category-section end  -->';