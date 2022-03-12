<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class moda_team extends Widget_Base
{

    public function get_name()
    {
        return 'moda-team';
    }

    public function get_title()
    {
        return __('Team', 'moda');
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
            'title',
            [
                'label' => __('Title', 'moda'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Company Leadership', 'moda'),
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'member_name',
            [
                'label' => __('Name', 'moda'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Al Mahmud', 'moda'),
            ]
        );
        $repeater->add_control(
            'member_designation',
            [
                'label' => __('Designation', 'moda'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Founder & CEO', 'moda'),
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
        $this->add_control(
            'member_list',
            [
                'label' => __('List', 'moda'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'member_name' => __('Al Mahmud', 'moda'),
                    ],
                    [
                        'member_name' => __('Al Mahmud', 'moda'),
                    ],
                    [
                        'member_name' => __('Al Mahmud', 'moda'),
                    ],
                    [
                        'member_name' => __('Al Mahmud', 'moda'),
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
                        'title' => __('Layout 1', 'moda'),
                        'icon' => 'eicon-form-horizontal',
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
                    '{{WRAPPER}} .team-box .team-overlay .team-bio h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'label' => __('Title Typography', 'moda'),
                'selector' => '{{WRAPPER}} .team-box .team-overlay .team-bio h4',
            ]
        );
        $this->add_control(
            'des_color',
            [
                'label' => __('Designation Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-box .team-overlay .team-bio span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'des_fonts',
                'label' => __('Designation Typography', 'moda'),
                'selector' => '{{WRAPPER}} .team-box .team-overlay .team-bio span',
            ]
        );
        $this->add_control(
            'ic_color',
            [
                'label' => __('Social Icon Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-social li a i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'ic_colorb',
            [
                'label' => __('Social Icon BG', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-social li a i' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'ic_colorbh',
            [
                'label' => __('Social Icon Hover BG', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-social li a i:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'social_bg',
            [
                'label' => __('Team Overlay', 'moda'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'team_socials_bg',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .team-box .team-overlay',
            ]
        );
        $this->add_responsive_control(
            'wrapper_margin',
            [
                'label' => __('Item Margin', 'moda'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .team-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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

Plugin::instance()->widgets_manager->register(new moda_team());
?>