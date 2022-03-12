<?php
echo '<!-- Shop Category start  -->
    <section class="moda-furniture-shop-category moda-section">
        <div class="container">
            <div class="moda-furniture-shop-category-wraper">
                <div class="moda-center-heading">
                    <h2>' . $settings['sec_title'] . '</h2>
                </div>
                <div class="row">';
if ($categories) {
    foreach ($categories as $cats) {
        $thumbnail_id = get_term_meta($cats->term_id, 'thumbnail_id', true);
        echo '<div class="col-lg-2 col-sm-4 col-6">
                        <div class="moda-furniture-card moda-effect-inner">
                            <a href="' . get_term_link($cats->slug, $cats->taxonomy) . '" class="furniture-thumb moda-effect">
                                ' . wp_get_attachment_image($thumbnail_id) . '
                            </a>
                            <a href="' . get_term_link($cats->slug, $cats->taxonomy) . '" class="title">' . $cats->name . '</a>
                        </div>
                    </div>';
    }
}
echo '</div>
            </div>
        </div>
    </section>
    <!-- Shop Category end  -->';