<?php
echo '<!-- Categories start  -->
    <section class="categories-section moda-section moda-bg" data-background="' . $settings['sec_image']['url'] . '">
        <div class="container">
            <div class="top-title wow fadeInUp" >
                <span>' . get_that_image($settings['title_image']) . '</span>
                <h3>' . $settings['sec_title'] . '</h3>
            </div>
            <div class="row">';
if ($categories) {
    foreach ($categories as $cats) {
        $thumbnail_id = get_term_meta($cats->term_id, 'thumbnail_id', true);
        echo '<div class="col-lg-2 col-md-4 col-6" >
                            <a href="' . get_term_link($cats->slug, $cats->taxonomy) . '" class="cgt-items wow fadeInUp"  data-wow-delay="0.3s">
                                <div class="images">
                                    ' . wp_get_attachment_image($thumbnail_id) . '
                                </div>
                                <span>' . $cats->name . '</span>
                            </a>
                        </div>';
    }
}
echo '</div>
        </div>
    </section>
    <!-- Categories end  -->';