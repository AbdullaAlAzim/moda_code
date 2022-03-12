<?php

namespace Elementor;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class moda_services extends Widget_Base
{

    public function get_name()
    {
        return 'moda-services';
    }

    public function get_title()
    {
        return __('Moda Services', 'moda');
    }

    public function get_categories()
    {
        return ['modaelement-addons'];
    }

    public function get_icon()
    {
        return 'eicon-posts-group';
    }

    public function render_plain_content($instance = [])
    {
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Services', 'moda'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'title',
            [
                'label' => __('Service Name', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('moda', 'moda'),
            ]
        );
        $repeater->add_control(
            'info',
            [
                'label' => __('Service info', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('moda', 'moda'),
            ]
        );
        $repeater->add_control(
            'image',
            [
                'label' => __('Icon Image', 'moda'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'services_list',
            [
                'label' => __('Service List', 'moda'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __('FREE FAST DELIVERY', 'moda'),
                    ],
                    [
                        'title' => __('24 X 7 SUPPORTS', 'moda'),
                    ],
                    [
                        'title' => __('BEST QUALITY', 'moda'),
                    ],
                    [
                        'title' => __('GIFT VOUCHER', 'moda'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
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
                    'layout2' => [
                        'title' => __('Layout 2', 'moda'),
                        'icon' => 'eicon-form-horizontal',
                    ],
                ],
                'default' => 'layout1',
                'toggle' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'content_sty',
            [
                'label' => __('Style', 'moda'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'bg',
            [
                'label' => __('BG', 'moda'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'post_title_color',
            [
                'label' => __('Title Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-box .service-desc h5' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __('Title Typography', 'moda'),
                'selector' => '{{WRAPPER}} .service-box .service-desc h5',
            ]
        );
        $this->add_control(
            'post_in_color',
            [
                'label' => __('Info Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-box .service-desc p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ttihii',
                'label' => __('Info Typography', 'moda'),
                'selector' => '{{WRAPPER}} .service-box .service-desc p',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'Background',
                'label' => __('Background', 'moda'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .mann-services-section',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'Backgroundd',
                'label' => __('Shape', 'moda'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .moda-services-items .moda-services-icon',
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

Plugin::instance()->widgets_manager->register(new moda_services());
?>