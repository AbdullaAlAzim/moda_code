<?php
echo '<section class="moda-services-section moda-section">
        <div class="container">
            <div class="moda-services-wraper">
                <div class="row">';
if ($settings['services_list']) {
    foreach ($settings['services_list'] as $service) {
        echo '<div class="col-lg-4 col-md-6">
                        <div class="moda-services-items wow fadeInUp"  data-wow-delay="0.3s">
                            <div class="icon">
                                ' . get_that_image($service['image']) . '
                            </div>
                            <h3>' . $service['title'] . '</h3>
                            <p>' . $service['info'] . '</p>
                        </div>
                    </div>';
    }
}
echo '</div>
            </div>
        </div>
    </section>';