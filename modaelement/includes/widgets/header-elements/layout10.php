<div class="dropdown moda-header-categories-btn moda-ctg-btn-furniture">
    <span class="moda-all-categories"><?php echo esc_html('All Categories'); ?></span>
    <div class="header-categories-btn">
        <i class="fas fa-bars"></i>
    </div>
    <ul class="dropdown-menu d-none d-lg-block">
        <?php if ($categories) {
            foreach ($categories as $category) {
                $meta = get_term_meta($category->term_id, '_moda_product_cat', true);
                $icon = isset($meta['cate_icon']) ? $meta['cate_icon'] : ''
                ?>
                <li><a href="<?php echo get_term_link($category->slug, $category->taxonomy); ?>"><span><i
                                    class="<?php echo $icon; ?>"></i> <?php echo $category->name; ?></span><i
                                class="fas fa-angle-right"></i></a></li>
            <?php }
        } ?>
    </ul>
</div>