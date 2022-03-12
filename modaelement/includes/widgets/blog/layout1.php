<?php
echo '<!-- Moda Latest News start  -->
    <section class="moda-latest-news-section moda-section">';
$loop = 0;
if ($settings['bg_list']) {
    foreach ($settings['bg_list'] as $list) {
        $loop++;
        if ($loop == 1) {
            $f_bg = 'line-animation';
        } elseif ($loop == 2) {
            $f_bg = 'line-animation-two';
        } elseif ($loop == 3) {
            $f_bg = 'shape-animation';
        } elseif ($loop == 4) {
            $f_bg = 'shape-animation-two';
        } elseif ($loop == 5) {
            $f_bg = 'round-animation';
        } else {
            $f_bg = 'round-animation-two';
        }
        echo '<span class="' . $f_bg . '">' . get_that_image($list['image']) . '</span>';
    }
}
echo '<div class="container">
            <div class="heading-area wow fadeInUp"  data-wow-delay="0.3s">
                <h3>' . $settings['title'] . '</h3>
                <p>' . $settings['info'] . '</p>
            </div>
            <div class="moda-card-area">
                <div class="row">';
if ($wp_query->have_posts()) {
    while ($wp_query->have_posts()) {
        $wp_query->the_post();
        echo '<div class="col-lg-4 col-md-6">
                <div class="blog-card" >';
        if (has_post_thumbnail()) :
            echo '<a href="' . get_the_permalink() . '" class="card-thumb">';
            the_post_thumbnail('full');
            echo '<span class="moda-category-btn moda-btn">';
            moda_loop_category();
            echo '</span>
                        </a>';
        endif;
        echo '<div class="card-description">
                            <div class="author-date">
                                <a href="' . get_day_link(get_the_time('Y'), get_the_time('M'), get_the_time('j')) . '" class="date"><span><i class="far fa-calendar-alt"></i></span>' . get_the_time('M j, Y') . '</a>
                                <a href="' . get_author_posts_url(get_the_author_meta('ID')) . '" class="author"><span><i class="flaticon-user-1"></i></span>' . get_the_author() . '</a>
                            </div>
                            <h5><a href="' . get_the_permalink() . '" class="post-title">' . get_the_title() . '</a></h5>
                            <a href="' . get_the_permalink() . '" class="link"><i class="fal fa-long-arrow-right"></i></a>
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
    <!-- Moda Latest News end  -->';