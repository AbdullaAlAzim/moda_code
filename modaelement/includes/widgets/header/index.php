<?php

namespace Elementor;

use WP_Query;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class moda_header1 extends Widget_Base
{

    public function get_name()
    {
        return 'moda-header-1';
    }

    public function get_title()
    {
        return __('Header', 'moda');
    }

    public function get_icon()
    {
        return 'eicon-nav-menu';
    }

    public function get_categories()
    {
        return array('moda-header');
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Main Nav', 'moda'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'custom_logo_upload',
            [
                'label' => __('Choose Custom Logo', 'moda'),
                'type' => Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'mobile_logo_upload',
            [
                'label' => __('Choose Custom Logo', 'moda'),
                'type' => Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'main_nav',
            [
                'label' => __('Main Menu', 'moda'),
                'type' => Controls_Manager::SELECT2,
                'options' => king_menu_select_choices(),
                'multiple' => false,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'main_m_nav',
            [
                'label' => __('Mobile Menu', 'moda'),
                'type' => Controls_Manager::SELECT2,
                'options' => king_menu_select_choices(),
                'multiple' => false,
                'label_block' => true,
            ]
        );
        $this->add_responsive_control(
            'menu_align',
            [
                'label' => __('Menu Alignment', 'moda'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => __('Left', 'moda'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'moda'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => __('Right', 'moda'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .header-section.moda-nav-builder' => 'justify-content: {{VALUE}};',
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
            'menu_style',
            [
                'label' => __('Main Menu', 'moda'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'nav_color',
            [
                'label' => __('Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .moda-nav-builder .main-menu ul > li a, {{WRAPPER}} .header-main-menu ul > .dropdown:before' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'nav_fonts',
                'label' => __('Typography', 'moda'),
                'selector' => '{{WRAPPER}} .moda-nav-builder .main-menu ul > li a',
            ]
        );
        $this->add_responsive_control(
            'sdpda',
            [
                'label' => esc_html__('Item Padding', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .moda-nav-builder .main-menu ul > li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );
        $this->add_responsive_control(
            'sdpd',
            [
                'label' => esc_html__('Item Margin', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .moda-nav-builder .main-menu ul > li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'sub_menu_style',
            [
                'label' => __('Sub Menu', 'moda'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sub_color',
            [
                'label' => __('Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .moda-nav-builder .main-menu ul > li .dropdown-menu > li > a' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_responsive_control(
            'sdpdaa',
            [
                'label' => esc_html__('Item Padding', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .moda-nav-builder .main-menu ul > li .dropdown-menu > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );
        $this->add_control(
            'hsub_color',
            [
                'label' => __('Hover Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .moda-nav-builder .main-menu ul > li .dropdown-menu > li > a:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_fonts',
                'label' => __('Typography', 'moda'),
                'selector' => '{{WRAPPER}} .moda-nav-builder .main-menu ul > li .dropdown-menu > li > a',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'sub_shadow',
                'label' => __('Shadow', 'moda'),
                'selector' => '{{WRAPPER}} .moda-nav-builder .main-menu ul > li .dropdown-menu',
            ]
        );
        $this->add_control(
            'droph',
            [
                'label' => __('DropDown Hover BG', 'moda'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'dropbgh',
                'label' => __('Main BG', 'moda'),
                'types' => ['classic', 'gradient'],
                'show_label' => true,
                'selector' => '{{WRAPPER}} .moda-nav-builder .main-menu ul > li a:hover',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => __('Menu Border', 'moda'),
                'selector' => '{{WRAPPER}} .moda-nav-builder .main-menu ul > li .dropdown-menu li',
            ]
        );
        $this->add_responsive_control(
            'dropwi',
            [
                'label' => __('DropDown Width', 'moda'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .moda-nav-builder .main-menu ul > li .dropdown-menu' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'drop',
            [
                'label' => __('DropDown BG', 'moda'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'dropbg',
                'label' => __('Main BG', 'moda'),
                'types' => ['classic', 'gradient'],
                'show_label' => true,
                'selector' => '{{WRAPPER}} .moda-nav-builder .main-menu ul > li .dropdown-menu',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'droborder',
                'label' => __('Main Border', 'moda'),
                'selector' => '{{WRAPPER}} .moda-nav-builder .main-menu ul > li .dropdown-menu',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'mobile_style',
            [
                'label' => __('Mobile Menu', 'moda'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'm_color',
            [
                'label' => __('Main Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .moda-nav-builder .mobile-menu > li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'm_fonts',
                'label' => __('Main Typography', 'moda'),
                'selector' => '{{WRAPPER}} .moda-nav-builder .mobile-menu > li a',
            ]
        );
        $this->add_control(
            's_color',
            [
                'label' => __('Sub Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .moda-nav-builder .mobile-menu > li ul > li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 's_fonts',
                'label' => __('Sub Typography', 'moda'),
                'selector' => '{{WRAPPER}} .moda-nav-builder .mobile-menu > li ul > li a',
            ]
        );
        $this->add_control(
            'tgcolor',
            [
                'label' => __('Toggle Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .str-mobile_menu_button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'tgbg',
            [
                'label' => __('Mobile Menu BG', 'moda'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'tbg',
                'label' => __('Main BG', 'moda'),
                'types' => ['classic', 'gradient'],
                'show_label' => true,
                'selector' => '{{WRAPPER}} .moda-nav-builder .mobile-menu',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {

        $settings = $this->get_settings();

        $main_menu = $settings['main_nav'];
        $mobile_menu = $settings['main_m_nav'];
        $custom_logo_id = get_theme_mod('custom_logo');

        if ($settings['custom_logo_upload']['id']) {
            $url = wp_get_attachment_image($settings['custom_logo_upload']['id'], 'full');
        } else {
            $url = wp_get_attachment_image($custom_logo_id, 'full');
        }

        if ($settings['mobile_logo_upload']['id']) {
            $mobile_url = wp_get_attachment_image($settings['mobile_logo_upload']['id'], 'full');
        } else {
            $mobile_url = wp_get_attachment_image($custom_logo_id, 'full');
        }

        $query_args = array(
            'post_type' => 'product',
            'posts_per_page' => 4,
        );
        $product_thumb = new WP_Query($query_args);

        include dirname(__FILE__) . '/' . $settings['layout'] . '.php';

    }

}

Plugin::instance()->widgets_manager->register(new moda_header1());