<?php

namespace Elementor;
use WP_Query;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class moda_product_grid extends Widget_Base
{

    public function get_name()
    {
        return 'moda-product-grid';
    }

    public function get_title()
    {
        return __('Product Grid', 'moda');
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
            'content_section1',
            [
                'label' => __('Product Slider', 'moda'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'query_type1',
            [
                'label' => __('Query type', 'moda'),
                'type' => Controls_Manager::SELECT,
                'default' => 'individual1',
                'options' => [
                    'category1' => __('Category', 'moda'),
                    'individual1' => __('Individual', 'moda'),
                ],
            ]
        );

        $this->add_control(
            'cat_query1',
            [
                'label' => __('Category', 'moda'),
                'type' => Controls_Manager::SELECT2,
                'options' => ae_drop_cat('product_cat'),
                'multiple' => true,
                'label_block' => true,
                'condition' => [
                    'query_type1' => 'category1',
                ],
            ]
        );

        $this->add_control(
            'id_query1',
            [
                'label' => __('Posts', 'moda'),
                'type' => Controls_Manager::SELECT2,
                'options' => ae_drop_posts('product'),
                'multiple' => true,
                'label_block' => true,
                'condition' => [
                    'query_type1' => 'individual1',
                ],
            ]
        );
        $this->add_control(
            'posts_per_page1',
            [
                'label' => __('Posts Per Page', 'moda'),
                'type' => Controls_Manager::NUMBER,
                'default' => 8,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Product Grid', 'moda'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Best Selling Products', 'moda'),
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'condition' => [
                    'layout' => 'layout4',
                ],
                'default' => __('Our Exciting Offer Deals', 'moda'),
            ]
        );
        $this->add_control(
            'time',
            [
                'label' => __('Date', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('12/24/2021 23:59:59', 'moda'),
            ]
        );
        $this->add_control(
            'button',
            [
                'label' => __('Button', 'moda'),
                'type' => Controls_Manager::TEXT,
                'default' => __('View All', 'moda'),
            ]
        );
        $this->add_control(
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
                'default' => 8,
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
                'condition' => [
                    'layout' => 'layout3',
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
                    'layout2' => [
                        'title' => __('Layout 2', 'moda'),
                        'icon' => 'eicon-post-slider',
                    ],
                    'layout3' => [
                        'title' => __('Layout 3', 'moda'),
                        'icon' => 'eicon-post-slider',
                    ],
                    'layout4' => [
                        'title' => __('Layout 4', 'moda'),
                        'icon' => 'eicon-post-slider',
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
            'post_inhaa_color',
            [
                'label' => __('Meta Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-box .blog-meta ul li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ttihiaai',
                'label' => __('Meta Typography', 'moda'),
                'selector' => '{{WRAPPER}} .blog-box .blog-meta ul li',
            ]
        );
        $this->add_control(
            'post_title_color',
            [
                'label' => __('Title Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-box .blog-desc h5' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __('Title Typography', 'moda'),
                'selector' => '{{WRAPPER}} .blog-box .blog-desc h5',
            ]
        );
        $this->add_control(
            'post_des_color',
            [
                'label' => __('Excerpt Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-box .blog-desc h5' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ttihexc',
                'label' => __('Excerpt Typography', 'moda'),
                'selector' => '{{WRAPPER}} .blog-box .blog-desc p',
            ]
        );
        $this->add_control(
            'post_btn_color',
            [
                'label' => __('Button Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-box .blog-desc .btn-2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ttihbtn',
                'label' => __('Button Typography', 'moda'),
                'selector' => '{{WRAPPER}} .blog-box .blog-desc .btn-2',
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
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'testi_sub_bgzc',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .moda-flash-sale-wraper',
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

        $per_page1 = $settings['posts_per_page1'];
        $cat1 = $settings['cat_query1'];
        $id1 = $settings['id_query1'];

        if ($settings['query_type1'] == 'category1') {
            $query_args1 = array(
                'post_type' => 'product',
                'posts_per_page' => $per_page1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'term_id',
                        'terms' => $cat1,
                    ),
                ),
            );
        }

        if ($settings['query_type1'] == 'individual1') {
            $query_args1 = array(
                'post_type' => 'product',
                'posts_per_page' => $per_page1,
                'post__in' => $id1,
                'orderby' => 'post__in'
            );
        }

        $wp_query1 = new WP_Query($query_args1);

        include dirname(__FILE__) . '/' . $settings['layout'] . '.php';
    }

    protected function content_template()
    {
    }

}

Plugin::instance()->widgets_manager->register(new moda_product_grid());
?>