<?php
echo '<!-- Company Leadership start  -->
    <section class="company-leadership-section moda-section">
        <div class="container">
            <h2 class="wow fadeInUp" >' . $settings['title'] . '</h2>
            <div class="moda-leadership-wraper">
                <div class="row">';
if ($settings['member_list']) {
    foreach ($settings['member_list'] as $member) {
        echo '<div class="col-lg-3 col-sm-6">
                        <div class="moda-leader-items wow fadeInUp"  data-wow-delay="0.3s">
                            <div class="moda-leader-thumb">
                                ' . get_that_image($member['member_photo']) . '
                            </div>
                            <div class="moda-leader-title">
                                <h3 class="title">' . $member['member_name'] . '</h3>
                                <p>' . $member['member_designation'] . '</p>
                            </div>
                        </div>
                    </div>';
    }
}
echo '</div>
            </div>
        </div>
    </section>
    <!-- Company Leadership end  -->';