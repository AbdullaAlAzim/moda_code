<?php

namespace Elementor;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class moda_about_us extends Widget_Base
{

    public function get_name()
    {
        return 'moda-about-us';
    }

    public function get_title()
    {
        return __('About us', 'moda');
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
        $this->add_control(
            'title',
            [
                'label' => __('Title Left', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Who We Are', 'moda'),
            ]
        );
        $this->add_control(
            'info',
            [
                'label' => __('Info', 'moda'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => __('The story of 4 Jahreszeiten began in 1985 with a small store located in Vienna, Austria and with one clear mission: to celebrate and empower women through exquisite clothing and refined accessories.
                 Today, we praise you for the exciting journey of trust and style. By closely listening and embracing your desires, it is a pleasure to invite you to your new online shopping destination.
                 We proudly dedicate ourselves to shaping the world in which every woman feels the comfort and inspiration needed to develop and express her personal sense of style. Clothes and accessories
                 are extensions that color the day of modern women. For this reason, partners with esteemed brands, such as Max Mara, Marina Rinaldi, Laurèl, Liu Jo, Coccinelle, Fabiana Filippi, Faliero Sarti and many more, who set high standards in crafting unique designs, using premium fabrics.', 'moda'),
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => __('Signature image', 'moda'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'desig',
            [
                'label' => __('Designation', 'moda'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Martin Frank / CEO', 'moda'),
            ]
        );
        $this->add_control(
            'image1',
            [
                'label' => __('About image', 'moda'),
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
        include dirname(__FILE__) . '/' . $settings['layout'] . '.php';
    }


}

Plugin::instance()->widgets_manager->register(new moda_about_us());
?>