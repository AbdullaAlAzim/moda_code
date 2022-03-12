<?php

namespace Elementor;

use WP_Query;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class moda_product_promo extends Widget_Base
{

    public function get_name()
    {
        return 'moda-product-promo';
    }

    public function get_title()
    {
        return __('Product Promo', 'moda');
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
            'query_type',
            [
                'label' => __('Query type', 'moda'),
                'type' => Controls_Manager::SELECT,
                'default' => 'individual',
                'options' => [
                    'category' => __('Category', 'moda'),
                    'individual' => __('Individual', 'moda'),
                ],
            ]
        );

        $this->add_control(
            'cat_query',
            [
                'label' => __('Category', 'moda'),
                'type' => Controls_Manager::SELECT2,
                'options' => ae_drop_cat('product_cat'),
                'multiple' => true,
                'label_block' => true,
                'condition' => [
                    'query_type' => 'category',
                ],
            ]
        );

        $this->add_control(
            'id_query',
            [
                'label' => __('Posts', 'moda'),
                'type' => Controls_Manager::SELECT2,
                'options' => ae_drop_posts('product'),
                'multiple' => true,
                'label_block' => true,
                'condition' => [
                    'query_type' => 'individual',
                ],
            ]
        );
        $this->add_control(
            'posts_per_page',
            [
                'label' => __('Posts Per Page', 'moda'),
                'type' => Controls_Manager::NUMBER,
                'default' => 1,
            ]
        );
        $this->add_control(
            'image_l4',
            [
                'label' => __('Background Image', 'moda'),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'layout' => ['layout4', 'layout7'],
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => __('Title', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'condition' => [
                    'layout' => ['layout2', 'layout3', 'layout7'],
                ],
                'default' => __('Enjoy this summer now with us', 'moda'),
            ]
        );
        $this->add_control(
            'sec_info',
            [
                'label' => __('Title', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'condition' => [
                    'layout' => ['layout2', 'layout3'],
                ],
                'default' => __('Enjoy this summer now with us', 'moda'),
            ]
        );
        $this->add_control(
            'sec_button',
            [
                'label' => __('Button', 'moda'),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'layout' => 'layout3',
                ],
                'default' => __('Shop Now', 'moda'),
            ]
        );
        $this->add_control(
            'sec_link', [
                'label' => __('Button Link', 'moda'),
                'type' => Controls_Manager::URL,
                'condition' => [
                    'layout' => ['layout3', 'layout7'],
                ],
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'vid_link', [
                'label' => __('Video Link', 'moda'),
                'type' => Controls_Manager::URL,
                'condition' => [
                    'layout' => 'layout3',
                ],
                'show_external' => true,
                'default' => [
                    'url' => 'https://www.youtube.com/watch?v=XqSXQkj_FnI',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'sec_image',
            [
                'label' => __('Choose Image', 'moda'),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'layout' => 'layout3',
                ],
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
                    'layout5' => [
                        'title' => __('Five', 'moda'),
                        'icon' => 'eicon-post-slider',
                    ],
                    'layout6' => [
                        'title' => __('Six', 'moda'),
                        'icon' => 'eicon-post-slider',
                    ],
                    'layout7' => [
                        'title' => __('Seven', 'moda'),
                        'icon' => 'eicon-post-slider',
                    ],
                    'layout8' => [
                        'title' => __('Eight', 'moda'),
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
                'default' => __('New Arrivals', 'moda'),
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
            'offer',
            [
                'label' => __('Offer', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('25% off', 'moda'),
            ]
        );
        $repeater->add_control(
            'button',
            [
                'label' => __('Button', 'moda'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Discover More', 'moda'),
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
            'slogo',
            [
                'label' => __('Choose Logo', 'moda'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'promo_list',
            [
                'label' => __('Promo Slider', 'moda'),
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

                ],
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'content_section2',
            [
                'label' => __('Content 2', 'moda'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater2 = new Repeater();
        $repeater2->add_control(
            'sub_title2',
            [
                'label' => __(' Sub Title', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('New Arrivals', 'moda'),
            ]
        );
        $repeater2->add_control(
            'title2',
            [
                'label' => __('Title', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Enjoy this summer now with us', 'moda'),
            ]
        );
        $repeater2->add_control(
            'button2',
            [
                'label' => __('Button', 'moda'),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'layout' => 'layout1',
                ],
                'default' => __('Discover More', 'moda'),
            ]
        );
        $repeater2->add_control(
            'link2', [
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

        $repeater2->add_control(
            'image2',
            [
                'label' => __('Choose Image', 'moda'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'promo_list2',
            [
                'label' => __('Promo Content', 'moda'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'title2' => __('New Arrivals', 'moda'),
                    ],
                    [
                        'title2' => __('New Arrivals', 'moda'),
                    ],

                ],
                'title_field' => '{{{ title2 }}}',
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
                'name' => 'background',
                'label' => __('Background', 'moda'),
                'types' => ['classic'],
                'selector' => '{{WRAPPER}} .moda-discount-section',
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $per_page = $settings['posts_per_page'];
        $cat = $settings['cat_query'];
        $id = $settings['id_query'];


        if ($settings['query_type'] == 'category') {
            $query_args = array(
                'post_type' => 'product',
                'posts_per_page' => $per_page,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'term_id',
                        'terms' => $cat,
                    ),
                ),
            );
        }

        if ($settings['query_type'] == 'individual') {
            $query_args = array(
                'post_type' => 'product',
                'posts_per_page' => $per_page,
                'post__in' => $id,
                'orderby' => 'post__in'
            );
        }

        $wp_query = new WP_Query($query_args);

        global $product;
        include dirname(__FILE__) . '/' . $settings['layout'] . '.php';
    }

    protected function content_template()
    {
    }

}

Plugin::instance()->widgets_manager->register(new moda_product_promo());
?>