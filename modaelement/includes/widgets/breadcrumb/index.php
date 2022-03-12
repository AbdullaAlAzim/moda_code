<?php

namespace Elementor;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor image widget.
 *
 * Elementor widget that displays an image into the page.
 *
 * @since 1.0.0
 */
class Widget_Moda_breadcrumb extends Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve image widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name()
    {
        return 'moda-breadcrumb';
    }

    /**
     * Get widget title.
     *
     * Retrieve image widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title()
    {
        return esc_html__('Moda Breadcrumb', 'moda');
    }

    /**
     * Get widget icon.
     *
     * Retrieve image widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon()
    {
        return 'eicon-image';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the image widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * @return array Widget categories.
     * @since 2.0.0
     * @access public
     *
     */
    public function get_categories()
    {
        return ['moda-header'];
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the widget belongs to.
     *
     * @return array Widget keywords.
     * @since 2.1.0
     * @access public
     *
     */
    public function get_keywords()
    {
        return ['breadcrumb'];
    }

    /**
     * Register image widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls()
    {
        $this->start_controls_section(
            'section_image',
            [
                'label' => esc_html__('Site breadcrumb', 'moda'),
            ]
        );

        $this->add_control(
            'custom_breadcrumb_upload',
            [
                'label' => __('Choose Custom breadcrumb', 'moda'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__('Alignment', 'moda'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'moda'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'moda'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'moda'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .breadcrumb-section' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'label' => __('Title Typography', 'moda'),
                'selector' => '{{WRAPPER}} .breadcrumb-section h2',
            ]
        );
        $this->add_control(
            'tt_color',
            [
                'label' => __('Title Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .breadcrumb-section h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'titlen_fonts',
                'label' => __('Nav Typography', 'moda'),
                'selector' => '{{WRAPPER}} .breadcrumb-section .breadcrumb li a',
            ]
        );
        $this->add_control(
            'ttn_color',
            [
                'label' => __('Nav Color', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .breadcrumb-section .breadcrumb li a, 
                    {{WRAPPER}} .moda-blog-page-breadcrumb .breadcrumb li,
                    {{WRAPPER}} .moda-blog-page-breadcrumb .breadcrumb li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'bg',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .breadcrumb-section',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'bgsd',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .moda-blog-page-breadcrumb::after',
            ]
        );
        $this->end_controls_section();

    }


    /**
     * Render image widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if (is_home() && get_option('page_for_posts')) {
            $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')), 'full');
            $url = isset($img[0]) ? $img[0] : '';
        } else {
            if (isset($settings['custom_breadcrumb_upload']['url'])) {
                $url = $settings['custom_breadcrumb_upload']['url'];
            } else {
                $url = get_the_post_thumbnail_url();
            }
        }
        $arg = [
            'cat' => '<span class="niotitle">' . esc_html__('Category', 'moda') . '</span>',
            'tag' => '<span  class="niotitle">' . esc_html__('Tag', 'moda') . '</span>',
            'author' => '<span  class="niotitle">' . esc_html__('Author', 'moda') . '</span>',
            'year' => '<span  class="niotitle">' . esc_html__('Year', 'moda') . '</span>',
            'notfound' => '<span  class="niotitle">' . esc_html__('Not found', 'moda') . '</span>',
            'search' => '<span  class="niotitle">' . esc_html__('Search for', 'moda') . '</span>',
            'marchive' => '<span  class="niotitle">' . esc_html__('Monthly archive', 'moda') . '</span>',
            'yarchive' => '<span  class="niotitle">' . esc_html__('Yearly archive', 'moda') . '</span>',
        ];

        if (is_home() && get_option('page_for_posts')) {
            $title = 'Blog';
        } elseif (is_front_page()) {
            $title = 'Front Page';
        } elseif (is_singular('post')) {
            $title = 'Blog Details';
        } elseif (is_shop()) {
            $title = 'Shop';
        } elseif (is_singular('product')) {
            $title = 'Product Details';
        } elseif (is_404()) {
            $title = 'Error 404';
        } else {
            $title = get_the_title();
        }
        if (!is_404()) {
            ?>
            <!-- BreadCrumb Area -->
            <section class="breadcrumb-section product-page-breadcrumb moda-blog-page-breadcrumb moda-section"
                     data-background="<?php echo esc_url($url); ?>">
                <div class="container">
                    <h2><?php echo wp_kses_post($title); ?></h2>
                    <nav aria-label="breadcrumb">
                        <?php moda_unit_breadcumb(); ?>
                    </nav>
                </div>
            </section>
            <!-- End of breadcrumb section
                ============================================= -->
            <?php
        }
    }

    /**
     * Render image widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 2.9.0
     * @access protected
     */
    protected function content_template()
    {
    }
}

Plugin::instance()->widgets_manager->register(new Widget_Moda_breadcrumb());