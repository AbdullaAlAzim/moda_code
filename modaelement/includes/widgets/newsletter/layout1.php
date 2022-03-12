<?php
echo '<!-- Join our newsletter start  -->
    <section class="moda-newsletter-section moda-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="moda-newsletter-content">
                        <p>' . $settings['sub_title'] . '</p>
                        <h4>' . $settings['title'] . '</h4>
                        ' . do_shortcode($settings['form']) . '
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="moda-newsletter-thumb">';
$loop = 0;
if ($settings['icon_list']) {
    foreach ($settings['icon_list'] as $list) {
        $loop++;
        if ($loop == 1) {
            $f_bg = 'top';
        } elseif ($loop == 2) {
            $f_bg = 'left';
        } else {
            $f_bg = 'right';
        }
        echo get_that_image($list['icon'], 'moda-animation-' . $f_bg . ' moda-spin-animation');
    }
}
echo '<div class="moda-thumb">
                            ' . get_that_image($settings['image']) . '
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Join our newsletter end -->';