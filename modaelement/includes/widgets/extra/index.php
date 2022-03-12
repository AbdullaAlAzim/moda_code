<?php

namespace Elementor;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class moda_extra_elements extends Widget_Base
{

    public function get_name()
    {
        return 'extra-elements';
    }

    public function get_title()
    {
        return __('Extra Elements', 'moda');
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
            'layout',
            [
                'label' => __('Layout', 'moda'),
                'type' => Controls_Manager::SELECT2,
                'multiple' => false,
                'options' => [
                    'layout1' => __('Layout 1', 'moda'),
                    'layout2' => __('Layout 2', 'moda'),
                    'layout3' => __('Layout 3', 'moda'),
                ],
                'default' => 'layout1',
                'toggle' => true,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('We’re Building Something New', 'moda'),
            ]
        );
        $this->add_control(
            'time',
            [
                'label' => __('Time', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('12/24/2021 23:59:59', 'moda'),
            ]
        );
        $this->add_control(
            'img',
            [
                'label' => __('Image', 'moda'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => __('Image 2', 'moda'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'bg',
            [
                'label' => __('BG Image', 'moda'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'title',
            [
                'label' => __('Title', 'moda'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Master Card', 'moda'),
            ]
        );
        $repeater->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'moda'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Pay with master card', 'moda'),
            ]
        );
        $repeater->add_control(
            'img',
            [
                'label' => __('Image', 'moda'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'payments',
            [
                'label' => __('Payment Method', 'moda'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __('New Arrivals', 'moda'),
                    ],
                    [
                        'title' => __('New Arrivals', 'moda'),
                    ],
                    [
                        'title' => __('New Arrivals', 'moda'),
                    ],
                    [
                        'title' => __('New Arrivals', 'moda'),
                    ],
                    [
                        'title' => __('New Arrivals', 'moda'),
                    ],
                    [
                        'title' => __('New Arrivals', 'moda'),
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
        $this->add_responsive_control(
            'dropwiaa',
            [
                'label' => __('Input Height', 'moda'),
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
                    '{{WRAPPER}} .searchbox input' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'nav_content_color',
            [
                'label' => __('Description Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .moda-right-side-nav .moda-nav-wraper .moda-modal-content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'nav_content_typo',
                'label' => __('Description Typography', 'moda'),
                'selector' => '{{WRAPPER}} .moda-right-side-nav .moda-nav-wraper .moda-modal-content p',
            ]
        );
        $this->add_control(
            'product_title_color',
            [
                'label' => __('Product Title Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .moda-new-arrivals h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'product_title_typo',
                'label' => __('Title Typography', 'moda'),
                'selector' => '{{WRAPPER}} .moda-new-arrivals h2',
            ]
        );
        $this->add_control(
            'newsletter_title_color',
            [
                'label' => __('Newsletter Title Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .moda-right-side-nav .moda-news-letter-form h3' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'newsletter_title_typo',
                'label' => __('Newsletter Title Typography', 'moda'),
                'selector' => '{{WRAPPER}} .moda-right-side-nav .moda-news-letter-form h3',
            ]
        );
        $this->add_control(
            'iconnn',
            [
                'label' => __('Icon Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .moda-header-elements li a i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_round',
            [
                'label' => __('Icon Up', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .moda-header-elements li a span' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'iconnnnn',
            [
                'label' => __('Icon hover Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .moda-header-elements li a:hover i' => 'color: {{VALUE}}',
                ],
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

Plugin::instance()->widgets_manager->register(new moda_extra_elements());