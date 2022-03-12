<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class moda_testimonial extends Widget_Base
{

    public function get_name()
    {
        return 'moda-testimonial';
    }

    public function get_title()
    {
        return __('Testimonial', 'moda');
    }

    public function get_categories()
    {
        return ['modaelement-addons'];
    }

    public function get_icon()
    {
        return 'eicon-person';
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
            'sub_title',
            [
                'label' => __(' Sub Title', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Client Testimonial', 'moda'),
            ]
        );
        $this->add_control(
            'shape_right', [
                'label' => __('Left Shape Icon', 'moda'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'shape_left', [
                'label' => __('Right Shape Icon', 'moda'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('We Are Very Happy To Get Our Client’s Reviews.', 'moda'),
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'member_name',
            [
                'label' => __('Name', 'moda'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Al-Mahmud', 'moda'),
            ]
        );
        $repeater->add_control(
            'member_desi',
            [
                'label' => __('Designation', 'moda'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Ceo & Founder', 'moda'),
            ]
        );
        $repeater->add_control(
            'member_info',
            [
                'label' => __('Comment', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea', 'moda'),
            ]
        );
        $repeater->add_control(
            'member_photo', [
                'label' => __('Photo', 'moda'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'quote_icon', [
                'label' => __('Quote Icon', 'moda'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'member_list',
            [
                'label' => __('Client List', 'moda'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'member_name' => __('Al-Mahmud', 'moda'),
                    ],
                    [
                        'member_name' => __('Al-Mahmud', 'moda'),
                    ],
                    [
                        'member_name' => __('Al-Mahmud', 'moda'),
                    ],
                    [
                        'member_name' => __('Al-Mahmud', 'moda'),
                    ],

                ],
                'title_field' => '{{{ member_name }}}',
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
                    '{{WRAPPER}} .feed-box .feed-head .feed-bio h5' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'label' => __('Title Typography', 'moda'),
                'selector' => '{{WRAPPER}} .feed-box .feed-head .feed-bio h5',
            ]
        );
        $this->add_control(
            'inf_color',
            [
                'label' => __('Info Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feed-box p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'inf_fonts',
                'label' => __('Info Typography', 'moda'),
                'selector' => '{{WRAPPER}} .feed-box p',
            ]
        );
        $this->add_control(
            'social_bga',
            [
                'label' => __('Testimonial BG', 'moda'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'testi_sub_bg',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .moda-title-heading .title::after',
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include dirname(__FILE__) . '/' . $settings['layout'] . '.php';

    }

    protected function content_template()
    {
    }

}

Plugin::instance()->widgets_manager->register(new moda_testimonial());
?>