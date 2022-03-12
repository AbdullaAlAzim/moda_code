<?php

class moda_custom_post_type
{

    function __construct()
    {

        add_action('init', array(&$this, 'moda_builder_post_type'));
        add_action('init', array(&$this, 'create_builder_post_taxonomy'));
    }

    // Builder Post Type
    function moda_builder_post_type()
    {
        $labels = array(
            'name' => __('Moda Builder', 'moda'),
            'singular_name' => __('Moda Builder', 'moda'),
            'add_new' => __('Add builder', 'moda'),
            'add_new_item' => __('Add builder', 'moda'),
            'edit_item' => __('Edit builder', 'moda'),
            'new_item' => __('New builder', 'moda'),
            'all_items' => __('All builder', 'moda'),
            'view_item' => __('View builder', 'moda'),
            'search_items' => __('Search builder', 'moda'),
            'not_found' => __('No builder found', 'moda'),
            'not_found_in_trash' => __('No portfolio found in the trash', 'moda'),
            'parent_item_colon' => '',
            'menu_name' => __('Moda Theme Builder', 'moda')
        );
        $args = array(
            'labels' => $labels,
            'public' => true,
            'menu_position' => 4,
            'menu_icon' => 'dashicons-admin-multisite',
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'elementor'),
            'has_archive' => false,
        );
        register_post_type('moda_builders', $args);
    }

    function create_builder_post_taxonomy()
    {
        $labels = array(
            'name' => __('Category', 'moda'),
            'singular_name' => __('Category', 'moda'),
            'search_items' => __('Search categories', 'moda'),
            'all_items' => __('Categories', 'moda'),
            'parent_item' => __('Parent category', 'moda'),
            'parent_item_colon' => __('Parent category:', 'moda'),
            'edit_item' => __('Edit category', 'moda'),
            'update_item' => __('Update category', 'moda'),
            'add_new_item' => __('Add category', 'moda'),
            'new_item_name' => __('New category', 'moda'),
            'menu_name' => __('Category', 'moda'),
        );
        $args = array(
            'labels' => $labels,
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'rewrite' => array('slug' => 'moda_builder_cat'),
        );
        register_taxonomy('moda_builder_cat', 'moda_builders', $args);
    }

}

new moda_custom_post_type();

