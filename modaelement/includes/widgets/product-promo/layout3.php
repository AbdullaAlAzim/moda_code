<?php
echo '<!-- New Arrivals start -->
    <section class="moda-discount-section moda-bg">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-md-6">
                    <div class="moda-discount-content wow fadeInUp">
                        <h5>' . $settings['sec_title'] . '</h5>
                        <h2>' . $settings['sec_info'] . '</h2>
                        <a class="link" ' . get_that_link($settings['sec_link']) . '>' . $settings['sec_button'] . '<span><i class="fal fa-long-arrow-right"></i></span></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="moda-video-area">
                        <a class="play-btn wow fadeInUp"  data-wow-delay="0.3s"   ' . get_that_link($settings['vid_link']) . ' data-lity><i class="fas fa-play"></i></a>
                        <div class="images">
                            ' . get_that_image($settings['sec_image']) . '
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- New Arrivals end -->';