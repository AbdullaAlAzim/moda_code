<?php
echo '<div class="moda-contact-section moda-section">
        <div class="container">
            <div class="moda-contact-wraper">
                <div class="row">
                    <div class="col-lg-8 col-sm-7 wow fadeInUp" >
                        <div class="contact-form">
                            <h3>' . $settings['title'] . '</h3>
                            <p>' . $settings['info'] . '</p>
                            ' . do_shortcode($settings['form']) . '
                          
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-5 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="moda-contact-content">';
if ($settings['contact_list']) {
    foreach ($settings['contact_list'] as $contact) {
        echo '<div class="contact-item">
                                <div class="icon">
                                    <i class="' . $contact['icon']['value'] . '"></i>
                                </div>
                                <div class="content">
                                    <h4>' . $contact['contact_title'] . '</h4>
                                    <p>' . $contact['contact_des'] . '</p>
                                </div>
                            </div>';
    }
}
echo '<div class="contact-item">
                                <div class="content">
                                    <h4>' . $settings['icon_titleee'] . '</h4>
                                    <ul>';
if ($settings['icon_list2']) {
    foreach ($settings['icon_list2'] as $icon) {
        echo '<li><a href="' . $icon['link']['url'] . '"><i class="' . $icon['icon2']['value'] . '"></i></a></li>';
    }
}
echo '</ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>';