<?php
echo '<!-- Best Selling Products start -->
    <section class="moda-best-selling-product-section moda-section">
        <div class="container">
            <div class="moda-heading-title wow fadeInUp">
                <h4>' . $settings['title'] . '</h4>
                <a class="link" ' . get_that_link($settings['link']) . '>' . $settings['button'] . '<span><i class="fal fa-long-arrow-right"></i></span></a>
            </div>
            <div class="moda-best-product-wraper">
                <div class="row">';
if ($wp_query->have_posts()) {
    while ($wp_query->have_posts()) {
        $wp_query->the_post();
        echo '<div class="col-lg-3 col-6">
                        <div class="product-card wow fadeInUp"  data-wow-delay="0.3s">
                            <div class="product-images">';
        moda_wc_thumbnail('images img-radius');
        echo '    <div class="product-save"><span>' . moda_discount_badge() . '</span></div>
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
    </section>
    <!-- Best Selling Products end -->';