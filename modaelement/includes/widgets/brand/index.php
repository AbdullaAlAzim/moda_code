<?php

namespace Elementor;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class moda_brand extends Widget_Base
{

    public function get_name()
    {
        return 'moda-brand';
    }

    public function get_title()
    {
        return __('Moda Brand', 'moda');
    }

    public function get_icon()
    {
        return 'eicon-form-horizontal';
    }

    public function get_categories()
    {
        return ['modaelement-addons'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'moda'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'title',
            [
                'label' => __('Brand Name', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('moda', 'moda'),
            ]
        );
        $repeater->add_control(
            'image',
            [
                'label' => __('Choose Image', 'moda'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'link', [
                'label' => __('Link', 'moda'),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'brand_list',
            [
                'label' => __('Brand List', 'moda'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __('moda', 'moda'),
                    ],
                    [
                        'title' => __('moda', 'moda'),
                    ],
                    [
                        'title' => __('moda', 'moda'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_settings',
            [
                'label' => __('General', 'moda'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'post_title_color',
            [
                'label' => __('Title Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fun-fact .fun-desc .timer' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __('Title Typography', 'moda'),
                'selector' => '{{WRAPPER}} .fun-fact .fun-desc .timer',
            ]
        );
        $this->add_control(
            'hh_c',
            [
                'label' => __('Content Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fun-fact .fun-desc .medium' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ttihaa',
                'label' => __('Content Typography', 'moda'),
                'selector' => '{{WRAPPER}} .fun-fact .fun-desc .medium',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {

        $settings = $this->get_settings();
        ?>

        <?php echo '<!-- brand-section start  -->
    <section class="brand-section wow fadeInUp moda-section" >
        <div class="container">
            <div class="swiper-container brand-wraper">
            <div class="swiper-wrapper">';
        if ($settings['brand_list']) {
            foreach ($settings['brand_list'] as $brand) {
                echo '<div class="swiper-slide">
                        <div class="brand-items">
                            ' . get_that_image($brand['image']) . '
                        </div>
                    </div>';
            }
        }
        echo '</div>
                </div>
        </div>
    </section>
    <!-- brand-section end  -->
';
    }


}

Plugin::instance()->widgets_manager->register(new moda_brand());