<?php
echo '<!-- news letter section start  -->
    <section class="moda-furniture-newsletter moda-section">
        <div class="container">
            <div class="moda-newsletter-heading">
                ' . get_that_image($settings['image']) . '
                <h3>' . $settings['title'] . '</h3>
                <p>' . $settings['sub_title'] . '</p>
            </div>
            ' . do_shortcode($settings['form1']) . '
        </div>
    </section>
    <!-- news letter section end  -->';