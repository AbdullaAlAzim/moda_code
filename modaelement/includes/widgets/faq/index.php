<?php

namespace Elementor;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class moda_faq extends Widget_Base
{

    public function get_name()
    {
        return 'moda-faq';
    }

    public function get_title()
    {
        return __('FAQ', 'moda');
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
                'default' => __('Shopping Information', 'moda'),
            ]
        );
        $this->add_control(
            'title1',
            [
                'label' => __('Title Right', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Payment Information', 'moda'),
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'f_title',
            [
                'label' => __('Title', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('How Can I Integrate Avocode To My Current Tool Stack?', 'moda'),
            ]
        );
        $repeater->add_control(
            'f_info',
            [
                'label' => __('Info', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dolor tempus sit id commu
                 tincidunt. Tempor etiam at in nisl ac tortor, ut vitae fermentum. Nibh eget blandit suscipit
                  ornare donec eget semper orci. Malesuada tortor neque, posuere egtnhet viverra auctor ac
                   egestas tellus. Turpis venenatis, viverra nisi aliquet diam 
                odio condimentum. In vel consectetur auctor interdum pulvinar tortor. Duis turpis in sit', 'moda'),
            ]
        );
        $this->add_control(
            'faq_list',
            [
                'label' => __('Faq List One', 'moda'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'f_title' => __('How Can I Integrate Avocode To My Current Tool Stack?', 'moda'),
                    ],
                    [
                        'f_title' => __('How Can I Integrate Avocode To My Current Tool Stack?', 'moda'),
                    ],
                    [
                        'f_title' => __('How Can I Integrate Avocode To My Current Tool Stack?', 'moda'),
                    ],
                    [
                        'f_title' => __('How Can I Integrate Avocode To My Current Tool Stack?', 'moda'),
                    ],

                ],
                'title_field' => '{{{ f_title }}}',
            ]
        );
        $repeater2 = new Repeater();
        $repeater2->add_control(
            'f_title2',
            [
                'label' => __('Title', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('How Can I Integrate Avocode To My Current Tool Stack?', 'moda'),
            ]
        );
        $repeater2->add_control(
            'f_info2',
            [
                'label' => __('Info', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dolor tempus sit id commu
                 tincidunt. Tempor etiam at in nisl ac tortor, ut vitae fermentum. Nibh eget blandit suscipit
                  ornare donec eget semper orci. Malesuada tortor neque, posuere egtnhet viverra auctor ac
                   egestas tellus. Turpis venenatis, viverra nisi aliquet diam 
                odio condimentum. In vel consectetur auctor interdum pulvinar tortor. Duis turpis in sit', 'moda'),
            ]
        );
        $this->add_control(
            'faq_list2',
            [
                'label' => __('Faq List Two', 'moda'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'f_title' => __('How Can I Integrate Avocode To My Current Tool Stack?', 'moda'),
                    ],
                    [
                        'f_title' => __('How Can I Integrate Avocode To My Current Tool Stack?', 'moda'),
                    ],
                    [
                        'f_title' => __('How Can I Integrate Avocode To My Current Tool Stack?', 'moda'),
                    ],
                    [
                        'f_title' => __('How Can I Integrate Avocode To My Current Tool Stack?', 'moda'),
                    ],

                ],
                'title_field' => '{{{ f_title2 }}}',
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
                        'icon' => 'eicon-post-slider',
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

Plugin::instance()->widgets_manager->register(new moda_faq());
?>