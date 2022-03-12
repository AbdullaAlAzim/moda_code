<?php
echo '
    <section class="moda-payment-methods-section moda-section wow fadeInUp">
        <div class="container">
            <div class="moda-payment-wraper">
                <div class="moda-payment-header">
                    <div class="images">
                        ' . get_that_image($settings['img']) . '
                    </div>
                    <div class="order-id">
                        <p>Order ID : EVL770082994</p>
                        <h6>$650.00</h6>
                    </div>
                </div>
                <div class="payment-inner">
                    <h2>Select Payment Methods</h2>
                    <div class="row">';
if ($settings['payments']) {
    foreach ($settings['payments'] as $payment) {
        echo '<div class="col-md-6">
                            <div class="moda-payment-card">
                                <label class="payment-card">
                                    <span class="card-content">
                                        <span class="card-img">' . get_that_image($payment['img']) . '</span>
                                        <span class="card-detais">
                                            <span class="card-name">' . $payment['title'] . '</span>
                                            <span class="card-text">' . $payment['sub_title'] . '</span>
                                        </span>
                                    </span>
                                    <input type="radio" checked="checked" name="radio">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>';
    }
}
echo '</div>
                </div>
                <a href="' . wc_get_checkout_url() . '" class="pay-now-btn moda-btn">PAY NOW</a>
            </div>
        </div>
    </section>
';