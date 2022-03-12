<?php

namespace Elementor;

use WP_Query;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class moda_header_elements extends Widget_Base
{

    public function get_name()
    {
        return 'header-elements';
    }

    public function get_title()
    {
        return __('Header Elements', 'moda');
    }

    public function get_icon()
    {
        return 'eicon-form-horizontal';
    }

    public function get_categories()
    {
        return ['moda-header'];
    }

    public function is_reload_preview_required()
    {
        return true;
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
                    'layout4' => __('Layout 4', 'moda'),
                    'layout5' => __('Layout 5', 'moda'),
                    'layout6' => __('Layout 6', 'moda'),
                    'layout7' => __('Layout 7', 'moda'),
                    'layout8' => __('Layout 8', 'moda'),
                    'layout9' => __('Layout 9', 'moda'),
                    'layout10' => __('Layout 10', 'moda'),
                ],
                'default' => 'layout1',
                'toggle' => true,
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
                'default' => 4,
            ]
        );
        $this->add_control(
            'main_nav',
            [
                'label' => __('Main Menu', 'moda'),
                'type' => Controls_Manager::SELECT2,
                'options' => king_menu_select_choices(),
                'multiple' => false,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => __('Nav Bar Image', 'moda'),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'layout' => 'layout5',
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'link', [
                'label' => __('Link', 'moda'),
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
            'nav_logo',
            [
                'label' => __('Nav Logo Image', 'moda'),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'layout' => 'layout5',
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'nav_content',
            [
                'label' => __('Description', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'condition' => [
                    'layout' => 'layout5',
                ],
                'default' => __('We proudly dedicate ourselves to shaping the world in which every woman feels the comfort and inspiration needed to develop and express her personal sense of style. Clothes and accessories are extensions that color the day of modern women.', 'moda'),
            ]
        );
        $this->add_control(
            'pnav_title',
            [
                'label' => __('Product Title', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'condition' => [
                    'layout' => 'layout5',
                ],
                'default' => __('New Arrivals', 'moda'),
            ]
        );
        $this->add_control(
            'nnav_title',
            [
                'label' => __('Newsletter Title', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'condition' => [
                    'layout' => 'layout5',
                ],
                'default' => __('Newsletter', 'moda'),
            ]
        );
        $this->add_control(
            'form',
            [
                'label' => __('Newsletter Shortcode', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'condition' => [
                    'layout' => 'layout5',
                ],
                'default' => __('[contact-form-7 id="1350" title="Nav Newsletter"]', 'moda'),
            ]
        );
        $this->add_control(
            'fnav_title',
            [
                'label' => __('Follow Title', 'moda'),
                'type' => Controls_Manager::TEXTAREA,
                'condition' => [
                    'layout' => 'layout5',
                ],
                'default' => __('Follow us :', 'moda'),
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'ititle',
            [
                'label' => __('Icon Title', 'moda'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Icon', 'moda'),
            ]
        );
        $repeater->add_control(
            'icon',
            [
                'label' => __('Icon', 'ahope'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-user',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
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
            'icon_list',
            [
                'label' => __('Promo Content', 'moda'),
                'type' => Controls_Manager::REPEATER,
                'condition' => [
                    'layout' => 'layout5',
                ],
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'ititle' => __('New Arrivals', 'moda'),
                    ],
                    [
                        'ititle' => __('New Arrivals', 'moda'),
                    ],

                ],
                'title_field' => '{{{ ititle }}}',
            ]
        );


        $this->end_controls_section();
        $this->start_controls_section(
            'section_settingas',
            [
                'label' => __('Mega Menu', 'moda'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater2 = new Repeater();
        $repeater2->add_control(
            'mtitle',
            [
                'label' => __('Title', 'moda'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Fashion', 'moda'),
            ]
        );
        $repeater2->add_control(
            'micon',
            [
                'label' => __('Icon', 'ahope'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-user',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater2->add_control(
            'mlink', [
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
        $repeater2->add_control(
            'mega',
            [
                'label' => __('Mega Template', 'moda'),
                'type' => Controls_Manager::SELECT2,
                'options' => ae_drop_posts('moda_builders'),
                'multiple' => false,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'menu_list',
            [
                'label' => __('Mega Menu', 'moda'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'mtitle' => __('Fashion', 'moda'),
                    ],
                    [
                        'mtitle' => __('Fashion', 'moda'),
                    ],
                    [
                        'mtitle' => __('Fashion', 'moda'),
                    ],
                    [
                        'mtitle' => __('Fashion', 'moda'),
                    ],
                    [
                        'mtitle' => __('Fashion', 'moda'),
                    ],
                    [
                        'mtitle' => __('Fashion', 'moda'),
                    ],

                ],
                'title_field' => '{{{ mtitle }}}',
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
        $per_page = $settings['posts_per_page'];
        $cat = $settings['cat_query'];
        $id = $settings['id_query'];

        $tax_args = array(
            'taxonomy' => 'product_cat',
            'number' => $settings['posts_per_page'],
            'include' => $settings['cat_query'],
            'hide_empty' => false,
        );
        $categories = get_terms($tax_args);

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
        $main_menu = $settings['main_nav'];

        if ($settings['layout'] == 'layout9' || $settings['layout'] == 'layout10') {
            include dirname(__FILE__) . '/' . $settings['layout'] . '.php';
        } else {
            echo '<div class="moda-header-elements">';
            include dirname(__FILE__) . '/' . $settings['layout'] . '.php';
            echo '</div>';
        }
    }


}

Plugin::instance()->widgets_manager->register(new moda_header_elements());