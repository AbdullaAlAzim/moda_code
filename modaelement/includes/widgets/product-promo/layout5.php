<?php
echo ' <section class="moda-news-categories-section moda-section">
        <div class="container">
            <div class="row">';
if ($wp_query->have_posts()) {
    $index = 0;
    while ($wp_query->have_posts()) {
        $index++;
        if ($index == 1) {
            $txt = 'NEW ARRIVAL';
        } elseif ($index == 2) {
            $txt = 'COMING SOON';
        } else {
            $txt = 'BEST SELLING';
        }
        $wp_query->the_post();
        echo '<div class="col-lg-4 col-md-6">
                    <div class="moda-recentviewed-items moda-product-news-categories moda-effect-inner">
                        <a class="moda-product-thumb moda-effect" href="' . get_the_permalink() . '">
                            ' . moda_wc_get_thumbnail() . '
                        </a>
                        <div class="moda-content">
                            <span>' . $txt . '</span>
                            <a href="' . get_the_permalink() . '" class="title">' . get_the_title() . '</a>
                            <a href="' . get_the_permalink() . '" class="shop-now">Shop Now <span><i class="fal fa-long-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>';
    }
    wp_reset_postdata();
}
echo '</div>
        </div>
    </section>';