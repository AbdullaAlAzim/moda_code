<li><a class="open-nav" href="#"><?php echo get_that_image($settings['image']); ?></a></li>
<!-- right side nav start  -->
<div class="right-overlaly"></div>
<div class="moda-right-side-nav">
    <div class="moda-nav-wraper">
        <div class="moda-modal-content p-0">
            <div class="content-wraper">
                <a href="#" class="nav-close-btn"><i class="fal fa-times"></i></a>
                <div class="logo"><?php echo get_that_image($settings['nav_logo']); ?></div>
                <p><?php echo $settings['nav_content']; ?> </p>
                <div class="moda-new-arrivals">
                    <h2><?php echo $settings['pnav_title']; ?></h2>
                    <div class="images-thumb">
                        <?php
                        if ($wp_query->have_posts()) {
                            while ($wp_query->have_posts()) {
                                $wp_query->the_post();
                                ?>
                            <a class="moda-arrival-thumb" href=" <?php the_permalink(); ?>">
                                <?php echo moda_wc_get_thumbnail() ?>
                                </a><?php
                            }
                            wp_reset_postdata();
                        }
                        ?>
                    </div>

                    <li>
                        <?php
                        echo str_replace(
                            ['menu-item-has-children', 'sub-menu'],
                            ['dropdown', 'dropdown-menu clearfix'],
                            wp_nav_menu(array(
                                'echo' => false,
                                'container' => false,
                                'menu_id' => 'account-menu',
                                'menu' => $main_menu,
                                'items_wrap' => '<ul>%3$s</ul>'
                            ))
                        );
                        ?>
                    </li>

                </div>
                <div class="moda-news-letter-form">
                    <h3><?php echo $settings['nnav_title']; ?></h3>
                    <?php echo do_shortcode($settings['form']) ?>
                    <div class="follow-us">
                        <h4><?php echo $settings['fnav_title']; ?></h4>
                        <ul><?php
                            if ($settings['icon_list']) {
                                foreach ($settings['icon_list'] as $icon_list) { ?>
                                    <li><a <?php echo get_that_link($icon_list['sc_link']) ?>><i
                                                class="<?php echo $icon_list['icon']['value'] ?>"></i></a></li><?php
                                }
                            }
                            ?></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- right side nav  end-->