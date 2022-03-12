<?php
echo '<!-- Categories start  -->
    <section class="moda-furniture-categories moda-section">
        <div class="container">
            <div class="row">';
if ($wp_query->have_posts()) {
    while ($wp_query->have_posts()) {
        $wp_query->the_post();
        echo '<div class="col-lg-4 col-md-6">
                    <div class="moda-furniture-cetegories-items moda-effect-inner">
                        <div class="moda-furnitures-description">
                            <a href="' . get_the_permalink() . '" class="title">' . get_the_title() . '</a>
                            <a href="' . get_the_permalink() . '" class="link-arrow">Shop Now <span><i class="far fa-angle-right"></i></span></a>
                        </div>
                        <div class="furnitures-thumb moda-effect">
                            ' . moda_wc_get_thumbnail() . '
                        </div>
                    </div>
                </div>';
    }
    wp_reset_postdata();
}
echo '</div>
        </div>
    </section>
    <!-- Categories end  -->';