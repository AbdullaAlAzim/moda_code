<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class moda_newsletter extends Widget_Base
{

    public function get_name()
    {
        return 'moda-newsletter';
    }

    public function get_title()
    {
        return __('Newsletter', 'moda');
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
            'form',
            [
                'label' => __('Newsletter Shortcode One', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('[contact-form-7 id="2328" title="Newsletter Form"]', 'moda'),
                'condition' => [
                    'layout' => 'layout1',
                ],
            ]
        );
        $this->add_control(
            'form1',
            [
                'label' => __('Newsletter Shortcode Two', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'condition' => [
                    'layout' => 'layout2',
                ],
                'default' => __('[contact-form-7 id="2334" title="Newsletter2"]', 'moda'),
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => __(' Sub Title', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('50% discount for your first order', 'moda'),
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Join our newsletter and get...', 'moda'),
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => __('Choose Image', 'moda'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'ititle',
            [
                'label' => __('Title', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('moda', 'moda'),
            ]
        );
        $repeater->add_control(
            'icon',
            [
                'label' => __('Icon Image', 'moda'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'icon_list',
            [
                'label' => __('Icon', 'moda'),
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
                'title_field' => '{{{ ititle }}}',
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
            'social_bg',
            [
                'label' => __('Nav BG', 'moda'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'team_socials_bngn',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .owl-theme .owl-dots .owl-dot span',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'team_socials_bsg',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .owl-theme .owl-dots .owl-dot.active span::before, 
                {{WRAPPER}} .owl-theme .owl-dots .owl-dot:hover span::before',
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
                'name' => 'team_socials_bgt',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .feed-box.bg-2',
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

Plugin::instance()->widgets_manager->register(new moda_newsletter());
?>