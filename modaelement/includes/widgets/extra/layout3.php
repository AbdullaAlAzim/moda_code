<?php
global $post;
?>
<section class="order-tracking-section moda-section moda-bg"
         data-background="<?php echo get_template_directory_uri(); ?>/assets/img/background.png">
    <div class="container">
        <div class="order-tracking-wraper">
            <p><?php esc_html_e('To track your order please enter your Order ID in the box below and press the "Track Now" button. This was given to you on your receipt and in the confirmation email you should have received.', 'moda'); ?></p>
            <form action="<?php echo esc_url(get_permalink($post->ID)); ?>" method="post"
                  class="woocommerce-form woocommerce-form-track-order track_order">
                <input class="input-text" type="text" name="orderid" id="orderid"
                       value="<?php echo isset($_REQUEST['orderid']) ? esc_attr(wp_unslash($_REQUEST['orderid'])) : ''; ?>"
                       placeholder="<?php esc_attr_e('Found in your order confirmation email.', 'moda'); ?>"/><?php // @codingStandardsIgnoreLine ?>
                <input class="input-text" type="text" name="order_email" id="order_email"
                       value="<?php echo isset($_REQUEST['order_email']) ? esc_attr(wp_unslash($_REQUEST['order_email'])) : ''; ?>"
                       placeholder="<?php esc_attr_e('Email you used during checkout.', 'moda'); ?>"/><?php // @codingStandardsIgnoreLine ?>
                <div class="clear"></div>

                <p class="form-row">
                    <button type="submit" class="button moda-primary-btn moda-btn" name="track"
                            value="<?php esc_attr_e('Track', 'moda'); ?>"><?php esc_html_e('Track Now', 'moda'); ?></button>
                </p>
                <?php wp_nonce_field('woocommerce-order_tracking', 'woocommerce-order-tracking-nonce'); ?>

            </form>
        </div>
    </div>
</section>