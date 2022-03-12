<li><a class="moda-cart-open" href="#"> <i class="flaticon-add-to-basket"></i><span class="moda-cart-count"></span></a>
</li>

<div class="cart-overlay"></div>
<div class="moda-shop-cart">
    <div class="moda-cart-wraper">
        <div class="moda-cart-header">
            <div class="cart-close"><i class="fal fa-times"></i></div>
            <p><?php echo esc_html('My Cart'); ?></p>
        </div>
        <?php moda_cart_items(); ?>
    </div>
</div>
