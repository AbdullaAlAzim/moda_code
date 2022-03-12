<?php

namespace Elementor;
use WP_Query;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class moda_category_nav extends Widget_Base
{

    public function get_name()
    {
        return 'category-nav';
    }

    public function get_title()
    {
        return __('Category Nav', 'moda');
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
                'options' => ae_drop_cat('category'),
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
                'options' => ae_drop_posts('post'),
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
                'default' => 6,
            ]
        );
        $this->add_control(
            'grid',
            [
                'label' => __('Grid', 'moda'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3,
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
        $this->add_control(
            'post_bg',
            [
                'label' => __('Post BG', 'moda'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-box' => 'background-color: {{VALUE}}',
                ],
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
                'post_type' => 'post',
                'posts_per_page' => $per_page,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field' => 'term_id',
                        'terms' => $cat,
                    ),
                ),
            );
        }

        if ($settings['query_type'] == 'individual') {
            $query_args = array(
                'post_type' => 'post',
                'posts_per_page' => $per_page,
                'post__in' => $id,
                'orderby' => 'post__in'
            );
        }

        $wp_query = new WP_Query($query_args);
        echo '<!-- Start Blog
		============================================= -->
        <div class="blog-area">
                <div class="blog-wpr grid-' . $settings['grid'] . '">';
        if ($wp_query->have_posts()) {
            while ($wp_query->have_posts()) {
                $wp_query->the_post();
                echo '<div class="blog-box">
                        <div class="blog-pic">';
                if (has_post_thumbnail()) {
                    the_post_thumbnail('full');
                }
                echo '</div>
                        <div class="blog-desc">
                            <div class="blog-meta">
                                <ul>
                                    <li>
                                         <i class="fas fa-clock"></i>
                                        <span>' . get_the_time('M, Y') . '</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-comment"></i>
                                        <span>' . get_comments_number() . ' Comments</span>
                                    </li>
                                </ul>
                            </div>
                            <a href="' . get_the_permalink() . '">
                                <h5 class="work-title">
                                   ' . get_the_title() . '
                                </h5>
                            </a>
                            <p>
                                ' . get_the_excerpt() . '
                            </p>
                            <div class="work-btn">
                                <a href="' . get_the_permalink() . '" class="btn-2">Learn More 
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>';
            }
            wp_reset_postdata();
        }
        echo '</div>
        </div>
        <!-- End Blog -->';

        echo '<!-- Categories start  -->
    <section class="categories-section moda-section moda-bg" data-background="images/banner/banner1.png">
        <div class="container">
            <div class="top-title wow fadeInUp" >
                <span><img src="images/icons/title.svg" alt=""></span>
                <h3>Our Top Categories</h3>
            </div>
            <div class="row">';
        if ($wp_query->have_posts()) {
            while ($wp_query->have_posts()) {
                $wp_query->the_post();
                echo '<div class="col-lg-2 col-md-4 col-6" >
                    <a href="shop-page.html" class="cgt-items wow fadeInUp"  data-wow-delay="0.3s">
                        <div class="images">';
                if (has_post_thumbnail()) {
                    the_post_thumbnail('full');
                }
                echo '</div>
                        <span>' . get_the_category() . '</span>
                    </a>
                </div>';
            }
            wp_reset_postdata();
        }
        echo '</div>
        </div>
    </section>
    <!-- Categories end  -->';
    }

    protected function content_template()
    {
    }

}

Plugin::instance()->widgets_manager->register(new moda_category_nav());
?>