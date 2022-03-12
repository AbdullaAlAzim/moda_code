<?php
function moda_welcome_page()
{
    require_once 'moda-welcome.php';
}

function moda_demo_importer_function()
{
    admin_url('admin.php?page=moda-demo-importer');
}

add_action('admin_menu', 'moda_admin_meu');
function moda_admin_meu()
{
    // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    add_menu_page('Moda', 'Moda', 'administrator', 'moda-admin-menu', 'moda_welcome_page', 'dashicons-smiley', 2);
    add_submenu_page('moda-admin-menu', 'Theme Options', 'Theme Options', 'manage_options', 'customize.php');
    add_submenu_page('moda-admin-menu', esc_html__('Demo Importer', 'moda'), esc_html__('Demo Importer', 'moda'), 'administrator', 'moda-demo-importer', 'moda_demo_importer_function');
}