<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class moda_contact extends Widget_Base
{

    public function get_name()
    {
        return 'moda-contact';
    }

    public function get_title()
    {
        return __('Contact us', 'moda');
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
                'default' => __('Get Intouch', 'moda'),
            ]
        );
        $this->add_control(
            'form',
            [
                'label' => __('Form', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );
        $this->add_control(
            'info',
            [
                'label' => __('Info', 'moda'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Have a question or just want to say hi? love to hear from you.', 'moda'),
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'contact_title',
            [
                'label' => __('Title', 'moda'),
                'type' => Controls_Manager::TEXT,
                'default' => __('New York Office', 'moda'),
            ]
        );
        $repeater->add_control(
            'contact_des',
            [
                'label' => __('Description', 'moda'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Maypole Crescent 70-80 Upper <br>St Norwich NR2 1LT', 'moda'),
            ]
        );
        $repeater->add_control(
            'icon',
            [
                'label' => __('Icon', 'moda'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-user',
                    'library' => 'solid',
                ],
            ]
        );
        $this->add_control(
            'contact_list',
            [
                'label' => __('Work List', 'moda'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'contact_title' => __('New York Office', 'moda'),
                    ],
                    [
                        'contact_title' => __('New York Office', 'moda'),
                    ],
                    [
                        'contact_title' => __('New York Office', 'moda'),
                    ],
                ],
                'title_field' => '{{{ contact_title }}}',
            ]
        );
        $repeater2 = new Repeater();
        $this->add_control(
            'icon_titleee',
            [
                'label' => __('Title', 'moda'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Follow Us', 'moda'),
            ]
        );
        $repeater2->add_control(
            'icon_title2',
            [
                'label' => __('Title', 'moda'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Follow Us', 'moda'),
            ]
        );
        $repeater2->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'moda'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'moda'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
            ]
        );
        $repeater2->add_control(
            'icon2',
            [
                'label' => __('Icon', 'moda'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-user',
                    'library' => 'solid',
                ],
            ]
        );
        $this->add_control(
            'icon_list2',
            [
                'label' => __('Icon List', 'moda'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'icon_title2' => __('moda', 'moda'),
                    ],
                    [
                        'icon_title2' => __('moda', 'moda'),
                    ],
                    [
                        'icon_title2' => __('moda', 'moda'),
                    ],
                ],
                'title_field' => '{{{ icon_title2 }}}',
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

Plugin::instance()->widgets_manager->register(new moda_contact());
?>