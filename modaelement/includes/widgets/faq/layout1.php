<?php
echo '<section class="moda-faq-section moda-section">
        <div class="container">
            <div class="moda-faq-wraper">
                <div class="row">
                    <div class="col-lg-6 wow fadeInUp" >
                        <div class="left-content">
                            <h3 class="moda-faq-title"><span>' . $settings['title'] . '</span></h3>
                            <div class="accordion" id="accordionExample">';

if ($settings['faq_list']) {
    $index = 0;
    foreach ($settings['faq_list'] as $faq) {
        $index++;
        if ($index == 1) {
            $show = 'show';
            $collapsed = '';
            $border = '';
        } else {
            $show = '';
            $collapsed = 'collapsed';
            $border = 'border_bottom';
        }
        echo '<div class="accordion-item ' . $border . '">
                                    <button class="accordion-button ' . $collapsed . '" id="heading' . $faq['_id'] . '" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $faq['_id'] . '" >
                                         ' . $faq['f_title'] . '
                                    </button>
                                <div id="collapse' . $faq['_id'] . '" class="accordion-collapse collapse ' . $show . '" aria-labelledby="heading' . $faq['_id'] . '" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>' . $faq['f_info'] . '</p>
                                    </div>
                                </div>
                                </div>';
    }
}
echo '</div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                        <h3 class="moda-faq-title"><span>' . $settings['title1'] . '</span></h3>
                        <div class="accordion" id="accordionExample1">';

if ($settings['faq_list2']) {
    $index2 = 0;
    foreach ($settings['faq_list2'] as $faq2) {
        $index2++;
        if ($index2 == 1) {
            $show2 = 'show';
            $collapsed2 = '';
            $border2 = '';
        } else {
            $show2 = '';
            $collapsed2 = 'collapsed';
            $border2 = 'border_bottom';
        }
        echo '<div class="accordion-item ' . $border2 . '">
                                <button class="accordion-button ' . $collapsed2 . '" id="heading' . $faq2['_id'] . '" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $faq2['_id'] . '" >
                                    ' . $faq2['f_title2'] . '
                                </button>
                              <div id="collapse' . $faq2['_id'] . '" class="accordion-collapse collapse ' . $show2 . ' " aria-labelledby="heading' . $faq2['_id'] . '" data-bs-parent="#accordionExample1">
                                <div class="accordion-body">
                                    <p>' . $faq2['f_info2'] . '</p>
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
    </section>';