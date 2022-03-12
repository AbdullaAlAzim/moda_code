<li class="dropdown">

    <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"><i
                class="flaticon-user"></i></a>
    <?php
    echo str_replace(
        ['menu-item-has-children', 'sub-menu'],
        ['dropdown', 'dropdown-menu clearfix'],
        wp_nav_menu(array(
            'echo' => false,
            'container' => false,
            'menu_id' => 'account-menu',
            'menu' => $main_menu,
            'items_wrap' => '<ul class="dropdown-menu">%3$s</ul>'
        ))
    );
    ?>
</li>