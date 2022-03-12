<?php

namespace Elementor;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class sidebar_search extends Widget_Base
{
    public function get_name()
    {
        return 'sidebar-search';
    }

    public function get_title()
    {
        return __('Sidebar Search', 'moda');
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
                'label' => __('Search', 'moda'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'moda'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Search', 'moda'),
            ]
        );
        $this->add_control(
            'btn_color',
            [
                'label' => __('BG Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-sub' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btnc_color',
            [
                'label' => __('Button Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-sub' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();

        echo '
            <div class="moda-wedgets-area">
                <div class="widget wow fadeInUp"  data-wow-delay="0.1s">
                    <h2 class="wedgets-title">Search</h2>
                    <form id="searchform" action="' . home_url('/') . '" method="get">
                        <div class="moda-input-group">
                            <input type="text" name="s" value="" placeholder="' . $settings['title'] . '">
                             <input type="hidden" name="post_type" value="product" />
                            <button class="moda-btn" id="searchsubmit" type="submit"><i class="fal fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>';
    }

    protected function content_template()
    {
    }

}

Plugin::instance()->widgets_manager->register(new sidebar_search());
?>