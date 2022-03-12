<?php
echo '<!-- Featured Products start  -->
    <section class="moda-furniture-product-featured moda-section pt-0">
        <div class="container">
            <div class="moda-center-heading">
                <h2 class="moda-white-bg">Featured Products</h2>
            </div>  
            <div class="row">';
if ($wp_query->have_posts()) {
    while ($wp_query->have_posts()) {
        $wp_query->the_post();
        echo '<div class="col-lg-6">
                    <div class="moda-furniture-featured moda-furniture-featured-big moda-effect-inner">
                        <a href="' . get_the_permalink() . '" class="thumb moda-effect">' . moda_wc_get_thumbnail() . '</a>
                         <div class="featured-title">
                            <h6>' . get_the_title() . '</h6>
                            <small>10 Items</small>
                        </div>
                        <div class="moda-link-area">
                            <a href="' . get_the_permalink() . '" class="link-arrow">Shop Now<span><i class="far fa-angle-right"></i></span></a>
                        </div>
                    </div>
                </div>';
    }
}
echo '<div class="col-lg-6">
                    <div class="row">';
if ($wp_query1->have_posts()) {
    $loop = 0;
    while ($wp_query1->have_posts()) {
        $wp_query1->the_post();
        $loop++;
        if ($loop == 1) {
            $cls = 'col-lg-12';
            $cls1 = 'moda-furniture-featured-small';
            $offer = '<p>Sale up to 25% Off</p>';
        } elseif ($loop == 2) {
            $cls = 'col-md-6';
            $cls1 = 'moda-featured-small';
            $offer = '';
        } elseif ($loop == 3) {
            $cls = 'col-md-6';
            $cls1 = 'moda-featured-small';
            $offer = '';
        } else {
            $cls = 'col-md-6';
            $cls1 = 'moda-featured-small';
            $offer = '';
        }
        echo '<div class="' . $cls . '">
                            <div class="moda-furniture-featured moda-effect-inner ' . $cls1 . '">
                                <a href="' . get_the_permalink() . '" class="thumb moda-effect">
                                    ' . moda_wc_get_thumbnail() . '
                                </a>
                                 <div class="featured-title">
                                    <h6>' . get_the_title() . '</h6>
                                    <small>10 Items</small>
                                </div>
                                <div class="moda-link-area">
                                    ' . $offer . '
                                    <a href="' . get_the_permalink() . '" class="link-arrow">Shop Now<span><i class="far fa-angle-right"></i></span></a>
                                </div>
                            </div>
                        </div>';
    }
}
echo '</div>
                </div>';

echo '</div> 
        </div>
    </section>
    <!-- Featured Products end  -->';