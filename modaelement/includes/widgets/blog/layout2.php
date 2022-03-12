<?php
echo '<!-- blog section start  -->
    <section class="moda-blog-section-home-two moda-section pt-0">
        <div class="container">
          <div class="moda-news-blog-inner">
            <div class="moda-title-heading moda-blog-section-heading">
                <div class="title">
                    <h6>' . $settings['title'] . '</h6>
                </div>
                <h3>' . $settings['info'] . '</h3>
            </div>
            <div class="row">';
if ($wp_query->have_posts()) {
    while ($wp_query->have_posts()) {
        $wp_query->the_post();
        echo '<div class="col-lg-4 col-md-6">
                    <div class="moda-news-blogs moda-effect-inner">
                        <a href="' . get_the_permalink() . '" class="blog-thumb moda-effect">';
        if (has_post_thumbnail()) {
            the_post_thumbnail('full');
        }
        echo '<span class="moda-blog-ctg-btn">' . moda_post_category() . '</span>
                        </a>
                        <div class="moda-blog-content">
                            <a href="' . get_day_link(get_the_time('Y'), get_the_time('M'), get_the_time('j')) . '" class="author-date">' . get_the_date() . '</a>
                            <a href="' . get_the_permalink() . '" class="title">' . get_the_title() . '</a>
                            <a href="' . get_the_permalink() . '" class="moda-ctg-btn"> <span>Read More</span><i class="fal fa-long-arrow-right"></i></a>
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
    <!-- blog section end  -->';