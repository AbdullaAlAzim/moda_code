<?php
do_action('woocommerce_before_shop_loop');
echo '<section class="moda-product-shop-section moda-section">

    <div class="moda-product-shop-area">
        <div class="moda-product-fillter wow fadeInUp">
            <div class="fillter-left-side">
                <h5>';
woocommerce_result_count();
echo '</h5>
            </div>
            <div class="fillter-right-side">
                <div class="fillter">
                <p>Sort by :</p>';
woocommerce_catalog_ordering();
echo '</div>
                <div class="fillter-grid">
                    <a ' . get_that_link($settings['link1']) . '>View</a>
                    <a ' . get_that_link($settings['link1']) . '>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24"
                             height="26" viewBox="0 0 24 26">
                            <defs>
                                <clipPath id="clip-path">
                                    <rect width="24" height="26" fill="none"/>
                                </clipPath>
                            </defs>
                            <g id="Repeat_Grid_1" data-name="Repeat Grid 1" clip-path="url(#clip-path)">
                                <g transform="translate(-1676 -611)">
                                    <rect id="Rectangle_146" data-name="Rectangle 146" width="6" height="6"
                                          transform="translate(1676 611)" fill="#e60c5e"/>
                                </g>
                                <g transform="translate(-1667 -611)">
                                    <rect id="Rectangle_146-2" data-name="Rectangle 146" width="6" height="6"
                                          transform="translate(1676 611)" fill="#e60c5e"/>
                                </g>
                                <g transform="translate(-1658 -611)">
                                    <rect id="Rectangle_146-3" data-name="Rectangle 146" width="6" height="6"
                                          transform="translate(1676 611)" fill="#e60c5e"/>
                                </g>
                                <g transform="translate(-1676 -601)">
                                    <rect id="Rectangle_146-4" data-name="Rectangle 146" width="6" height="6"
                                          transform="translate(1676 611)" fill="#e60c5e"/>
                                </g>
                                <g transform="translate(-1667 -601)">
                                    <rect id="Rectangle_146-5" data-name="Rectangle 146" width="6" height="6"
                                          transform="translate(1676 611)" fill="#e60c5e"/>
                                </g>
                                <g transform="translate(-1658 -601)">
                                    <rect id="Rectangle_146-6" data-name="Rectangle 146" width="6" height="6"
                                          transform="translate(1676 611)" fill="#e60c5e"/>
                                </g>
                                <g transform="translate(-1676 -591)">
                                    <rect id="Rectangle_146-7" data-name="Rectangle 146" width="6" height="6"
                                          transform="translate(1676 611)" fill="#e60c5e"/>
                                </g>
                                <g transform="translate(-1667 -591)">
                                    <rect id="Rectangle_146-8" data-name="Rectangle 146" width="6" height="6"
                                          transform="translate(1676 611)" fill="#e60c5e"/>
                                </g>
                                <g transform="translate(-1658 -591)">
                                    <rect id="Rectangle_146-9" data-name="Rectangle 146" width="6" height="6"
                                          transform="translate(1676 611)" fill="#e60c5e"/>
                                </g>
                            </g>
                        </svg>
                    </a>
                    <a ' . get_that_link($settings['link2']) . '>
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26">
                            <g id="Group_182" data-name="Group 182" transform="translate(-1430 -578)">
                                <rect id="Rectangle_147" data-name="Rectangle 147" width="26" height="4"
                                      transform="translate(1430 578)" fill="#9d9d9d"/>
                                <rect id="Rectangle_148" data-name="Rectangle 148" width="26" height="4"
                                      transform="translate(1430 585)" fill="#9d9d9d"/>
                                <rect id="Rectangle_149" data-name="Rectangle 149" width="26" height="4"
                                      transform="translate(1430 593)" fill="#9d9d9d"/>
                                <rect id="Rectangle_150" data-name="Rectangle 150" width="26" height="4"
                                      transform="translate(1430 600)" fill="#9d9d9d"/>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="row" id="loadmoreproducts">';
if ($wp_query->have_posts()) {
    $index = 0;
    while ($wp_query->have_posts()) {
        $index++;
        $wp_query->the_post();
        echo '<div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="' . $index . '0ms">
                <div class="moda-product-card-items">
                    <div class="product-card">
                        <div class="product-images">';
        moda_wc_thumbnail();
        echo '<div class="product-action">';
        woocommerce_template_loop_add_to_cart();
        moda_wishlist_button();
        moda_compare_icon_only_product_card();
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
                </div>
            </div>';
    }
    wp_reset_postdata();
}
echo '</div>
        <div class="button-wraper">
            <a href="#" class="load-more-btn moda-btn" id="loadMore">Load More</a>
        </div>
    </div>
       
</section>';