<div class="dropdown moda-header-categories-btn">
    <span class="moda-all-categories"><?php echo esc_html('All Categories'); ?></span>
    <div class="header-categories-btn">
        <i class="fas fa-bars"></i>
    </div>
    <ul class="dropdown-menu d-none d-lg-block">
        <?php
        if ($settings['menu_list']) {
            foreach ($settings['menu_list'] as $menu) { ?>
                <li class="dropdown">
                    <a <?php echo get_that_link($menu['mlink']); ?>>
                        <span><i class="<?php echo $menu['micon']['value']; ?>"></i><?php echo $menu['mtitle']; ?></span>
                        <i class="fas fa-angle-right"></i>
                    </a>
                    <?php if (!empty($menu['mega'])) { ?>
                        <div class="dropdown-menu moda-mega-menu" style="width: 800px;">
                            <?php echo do_shortcode('[INSERT_ELEMENTOR id="' . $menu['mega'] . '"]'); ?>
                        </div>
                    <?php } ?>
                </li>
            <?php }
        } ?>
    </ul>
</div>
