<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class moda_hero_slider extends Widget_Base
{

    public function get_name()
    {
        return 'moda-hero-slider';
    }

    public function get_title()
    {
        return __('Hero Slider', 'moda');
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
        $repeater = new Repeater();
        $repeater->add_control(
            'sub_title',
            [
                'label' => __(' Sub Title', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Up To <span>60% off</span> Regular Pricet', 'moda'),
            ]
        );
        $repeater->add_control(
            'sub_ifo3',
            [
                'label' => __(' Sub Title', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('The Latest Decore', 'moda'),
            ]
        );
        $repeater->add_control(
            'title',
            [
                'label' => __('Title', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Enjoy this summer now with us', 'moda'),
            ]
        );
        $repeater->add_control(
            'button',
            [
                'label' => __('Button', 'moda'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Add To Cart', 'moda'),
            ]
        );
        $repeater->add_control(
            'link', [
                'label' => __('Button Link', 'moda'),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $repeater->add_control(
            'button2',
            [
                'label' => __('Button 2', 'moda'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Details', 'moda'),
            ]
        );
        $repeater->add_control(
            'link2', [
                'label' => __('Button Link 2', 'moda'),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => __('Choose Image', 'moda'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'image_bg',
            [
                'label' => __('Background Image', 'moda'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'hero_list',
            [
                'label' => __('Hero Slider', 'moda'),
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
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'content_sectiona',
            [
                'label' => __('Social List', 'moda'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater2 = new Repeater();
        $repeater2->add_control(
            'sc_text',
            [
                'label' => __(' Social Name', 'moda'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Facebook', 'moda'),
            ]
        );
        $repeater2->add_control(
            'sc_link', [
                'label' => __('Social Link', 'moda'),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'social_list',
            [
                'label' => __('Social List', 'moda'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'sc_text' => __('facebook', 'moda'),
                    ],
                    [
                        'sc_text' => __('instagram', 'moda'),
                    ],
                    [
                        'sc_text' => __('twitter', 'moda'),
                    ],
                    [
                        'sc_text' => __('youtube', 'moda'),
                    ],

                ],
                'title_field' => '{{{ sc_text }}}',
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
                'name' => 'banner-area-v3',
                'label' => __('banner-area-v3', 'moda'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .banner-area-v3',
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

Plugin::instance()->widgets_manager->register(new moda_hero_slider());
?>