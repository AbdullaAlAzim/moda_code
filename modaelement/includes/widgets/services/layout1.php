<?php
echo '<!-- services section start  -->
        <section class="mann-services-section moda-section moda-bg">
            <div class="container">
                <div class="row">';
if ($settings['services_list']) {
    foreach ($settings['services_list'] as $service) {
        echo '<div class="col-lg-3 col-sm-6">
                        <div class="moda-services-items">
                            <span class="moda-services-icon" data-background="' . $settings['bg']['url'] . '">
                                ' . get_that_image($service['image']) . '
                            </span>
                            <span>' . $service['title'] . '</span>
                        </div>
                    </div>';
    }
}
echo ' </div>
            </div>
        </section>
        <!-- services section end  -->
            ';