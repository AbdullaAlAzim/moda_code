<?php
echo '  <!-- Popular Collections start  -->
    <section class="moda-popular-collection-section">
        <div class="container-fluid">
            <div class="heading-area wow fadeInUp" >
                <h3>' . $settings['sec_title'] . '</h3>
                <p>' . $settings['sec_info'] . '</p>
            </div>
            <div class="popular-collection-wraper">
                <div class="row">';
if ($settings['promo_list']) {
    foreach ($settings['promo_list'] as $promo) {
        echo '<div class="col-lg-6">
                        <div class="big-collection-category wow fadeInUp"  data-wow-delay="0.3s">
                            <div class="moda-images">
                                ' . get_that_image($promo['image'], 'big-images') . '
                                <div class="moda-content">
                                    <div class="logo">
                                        ' . get_that_image($promo['slogo']) . '
                                    </div>
                                    <a href="shop-page.html" class="title">' . $promo['title'] . '</a>
                                    <p>' . $promo['sub_title'] . '</p>
                                    <a class="link" ' . get_that_link($promo['link']) . '>' . $promo['button'] . ' <span><i class="fal fa-long-arrow-right"></i></span></a>
                                </div>
                            </div>
                        </div>
                    </div>';
    }
}
echo '<div class="col-lg-6">
                        <div class="row">';
$loop = 0;
if ($settings['promo_list2']) {
    foreach ($settings['promo_list2'] as $promo2) {
        $loop++;
        if ($loop == 1) {
            $cls = 'col-md-6';
        } elseif ($loop == 2) {
            $cls = 'col-md-6';
        } else {
            $cls = 'col-md-12';
        }
        echo '<div class="' . $cls . '">
                                <div class="collection-category wow fadeInUp"  data-wow-delay="1.2s">
                                    <div class="moda-images">
                                        ' . get_that_image($promo2['image2']) . '
                                        <div class="moda-content">
                                            <a ' . get_that_link($promo2['link2']) . ' class="title">' . $promo2['title2'] . '</a>
                                            <p>' . $promo2['sub_title2'] . '</p>
                                        </div>
                                    </div>
                                </div>
                            </div>';
    }
}
echo '</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Popular Collections end  -->';