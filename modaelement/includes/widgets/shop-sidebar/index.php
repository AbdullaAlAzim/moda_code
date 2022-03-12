<?php

namespace Elementor;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class sidebar_shop extends Widget_Base
{
    public function get_name()
    {
        return 'sidebar-shop';
    }

    public function get_title()
    {
        return __('Sidebar Shop', 'moda');
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
                'label' => __('Blog', 'moda'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'cat',
            [
                'label' => __('Category', 'moda'),
                'type' => Controls_Manager::SELECT2,
                'options' => ae_drop_cat('product_cat'),
                'label_block' => true,
                'multiple' => true,
            ]
        );
        $this->add_control(
            'show_cat',
            [
                'label' => esc_html__('Show Category', 'moda'),
                'type' => Controls_Manager::NUMBER,
                'default' => esc_html__('5', 'moda'),
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
            'post_title_color',
            [
                'label' => __('Title Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .category-list ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __('Title Typography', 'moda'),
                'selector' => '{{WRAPPER}} .category-list ul li a',
            ]
        );
        $this->add_control(
            'bg',
            [
                'label' => __('BG Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .category-list ul li' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $tax_args = array(
            'taxonomy' => 'product_cat',
            'number' => $settings['show_cat'],
            'include' => $settings['cat'],
            'hide_empty' => false,
        );
        $categories = get_terms($tax_args);
        echo '
            <div class="moda-sidebar">
                        <div class="moda-sidebar-widgets wow fadeInUp">
                            <div class="moda-sidebar-category">
                                <h3 class="sidebar-title">Product categories</h3>
                                <ul>';
        if (!empty($categories)) {
            foreach ($categories as $category) {
                echo '<li><a href="' . get_term_link($category->slug, 'product_cat') . '">' . $category->name . ' (' . $category->count . ')</a></li>';
            }
        }
        echo '</ul>
                            </div>
                        </div>
                    </div>
            ';
    }

    protected function content_template()
    {
    }

}

Plugin::instance()->widgets_manager->register(new sidebar_shop());
?>