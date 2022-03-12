<?php
echo '<section class="moda-coming-soon-section moda-bg" data-background="' . $settings['bg']['url'] . '">
    <div class="container">
        <div class="moda-coming-soon-wraper">
            <div class="moda-content">
                ' . get_that_image($settings['image']) . '
                <h4>' . $settings['title'] . '</h4>
            </div>
            <ul data-time="' . $settings['time'] . '" class="coming-soon-countdown" id="coming-soon">
                <li><span class="days">00</span><p class="time-text">Day</p></li>
                <li><span class="hours">00</span><p class="time-text">Hour</p></li>
                <li><span class="minutes">00</span><p class="time-text">Min</p></li>
                <li><span class="seconds">00</span><p class="time-text">Sec</p></li>
            </ul>
            <a href="' . home_url('/') . '" class="back-btn back-primary-btn moda-btn">Back to Home<span><i class="fal fa-long-arrow-right"></i></span></a>
        </div>
    </div>
</section>';