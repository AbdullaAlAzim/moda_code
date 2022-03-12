<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class moda_product_category extends Widget_Base
{

    public function get_name()
    {
        return 'moda-product-category';
    }

    public function get_title()
    {
        return __('Product Category', 'moda');
    }

    public function get_categories()
    {
        return ['modaelement-addons'];
    }

    public function get_icon()
    {
        return 'eicon-image';
    }

    public function render_plain_content($instance = [])
    {
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
        $this->add_control(
            'cat_query',
            [
                'label' => __('Category', 'landzai'),
                'type' => Controls_Manager::SELECT2,
                'options' => ae_drop_cat('product_cat'),
                'multiple' => true,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'cat_per_page',
            [
                'label' => __('Category Per Page', 'landzai'),
                'type' => Controls_Manager::NUMBER,
                'default' => 6,
            ]
        );
        $this->add_control(
            'title_image',
            [
                'label' => __('Title Image', 'moda'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => __('Title', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Enjoy this summer now with us', 'moda'),
            ]
        );
        $this->add_control(
            'sec_sub_title',
            [
                'label' => __('Sub Title', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Categories', 'moda'),
            ]
        );
        $this->add_control(
            'sec_image',
            [
                'label' => __('Choose Image', 'moda'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'layout',
            [
                'label' => __('Layout', 'moda'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'layout1' => [
                        'title' => __('One', 'moda'),
                        'icon' => 'eicon-form-horizontal',
                    ],
                    'layout2' => [
                        'title' => __('Two', 'moda'),
                        'icon' => 'eicon-post-slider',
                    ],
                    'layout3' => [
                        'title' => __('Three', 'moda'),
                        'icon' => 'eicon-post-slider',
                    ],
                    'layout4' => [
                        'title' => __('Four', 'moda'),
                        'icon' => 'eicon-post-slider',
                    ],
                ],
                'default' => 'layout1',
                'toggle' => true,
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Style', 'moda'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion .acc-btn p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'label' => __('Title Typography', 'moda'),
                'selector' => '{{WRAPPER}} .accordion .acc-btn p',
            ]
        );
        $this->add_control(
            'des_color',
            [
                'label' => __('Content Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-box .accordion .acc-content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'des_fonts',
                'label' => __('Content Typography', 'moda'),
                'selector' => '{{WRAPPER}} .accordion-box .accordion .acc-content p',
            ]
        );
        $this->add_control(
            'social_bg',
            [
                'label' => __('Box BG', 'moda'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'cat_background',
                'label' => __('Background', 'moda'),
                'types' => ['classic'],
                'selector' => '{{WRAPPER}} .moda-title-heading .title::after',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __('Background', 'moda'),
                'types' => ['classic'],
                'selector' => '{{WRAPPER}} .moda-categories-section',
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $tax_args = array(
            'taxonomy' => 'product_cat',
            'number' => $settings['cat_per_page'],
            'include' => $settings['cat_query'],
            'hide_empty' => false,
            'hierarchical' => true,
            'orderby' => 'name',
            'order' => 'DESC',
        );
        $categories = get_terms($tax_args);
        global $product;
        include dirname(__FILE__) . '/' . $settings['layout'] . '.php';
    }

    protected function content_template()
    {
    }

}

Plugin::instance()->widgets_manager->register(new moda_product_category());
?>