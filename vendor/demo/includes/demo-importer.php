<?php
function moda_import_files()
{
    return array(
        array(
            'import_file_name' => 'Fashion',
            //'categories'                 => array( 'App Landing' ),
            'import_file_url' => 'https://www.dropbox.com/s/45coiwwapur7pte/fashion.xml?dl=1',
            'import_widget_file_url' => 'https://www.dropbox.com/s/paicacqt1hlhcoo/fashion.wie?dl=1',
            'import_customizer_file_url' => 'https://www.dropbox.com/s/j86j6rzyee4cry7/fashion.dat?dl=1',
            'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . '/screenshot.jpg',
            'import_notice' => __('All are set with one click demo import', 'moda'),
            'preview_url' => 'https://moda.maantheme.com/new-moda/fashion',
        ),
        array(
            'import_file_name' => 'Electronics',
            //'categories'                 => array( 'App Landing' ),
            'import_file_url' => 'https://www.dropbox.com/s/hxmq67oasb63fh3/electronics.xml?dl=1',
            'import_widget_file_url' => 'https://www.dropbox.com/s/ychguiygn5n8fmb/electronics.wie?dl=1',
            'import_customizer_file_url' => 'https://www.dropbox.com/s/nh0fxdw8anakpbb/electronics.dat?dl=1',
            'import_preview_image_url' => trailingslashit(MODA_DEMO_FILES) . 'home-2/home2.jpg',
            'import_notice' => __('All are set with one click demo import', 'moda'),
            'preview_url' => 'https://moda.maantheme.com/new-moda/electronics',
        ),
        array(
            'import_file_name' => 'Furniture',
            //'categories'                 => array( 'App Landing' ),
            'import_file_url' => 'https://www.dropbox.com/s/h9q7q88umoeemf1/furniture.xml?dl=1',
            'import_widget_file_url' => 'https://www.dropbox.com/s/d176g9q5y0yrqro/furniture.wie?dl=1',
            'import_customizer_file_url' => 'https://www.dropbox.com/s/gl4yrwvdic5wxxh/furniture.dat?dl=1',
            'import_preview_image_url' => trailingslashit(MODA_DEMO_FILES) . 'home-3/home3.jpg',
            'import_notice' => __('All are set with one click demo import', 'moda'),
            'preview_url' => 'https://moda.maantheme.com/new-moda/furniture',
        ),
    );
}

add_filter('pt-ocdi/import_files', 'moda_import_files');

// Before Import
function moda_clear_before_import()
{
    global $wpdb;
    //delete posts
    $tables = ['commentmeta', 'comments', 'postmeta', 'posts', 'termmeta', 'terms', 'term_relationships', 'term_taxonomy'];

    foreach ($tables as $table) {
        $table = $wpdb->prefix . $table;
        $wpdb->query("TRUNCATE TABLE $table");
    }
}

add_action('pt-ocdi/before_content_import', 'moda_clear_before_import');

// After Import
function moda_after_import_setup($selected_import)
{
    // Assign menus to their locations.
    $main_menu = get_term_by('name', 'Main Menu', 'nav_menu');


    set_theme_mod('nav_menu_locations', array(
            'primary' => $main_menu->term_id, // replace 'main-menu' here with the menu location identifier from register_nav_menu() function
        )
    );

    // Assign front page and posts page (blog page).

    $front_page_id = get_page_by_title('Home');
    $blog_page_id = get_page_by_title('Blog');

    update_option('show_on_front', 'page');
    update_option('page_on_front', $front_page_id->ID);
    update_option('page_for_posts', $blog_page_id->ID);

}

add_action('pt-ocdi/after_import', 'moda_after_import_setup');

//Personalize
function moda_plugin_page_setup($default_settings)
{
    $default_settings['parent_slug'] = 'themes.php';
    $default_settings['page_title'] = esc_html__('Demo Importer', 'moda');
    $default_settings['menu_title'] = esc_html__('Demo Importer', 'moda');
    $default_settings['capability'] = 'import';
    $default_settings['menu_slug'] = 'moda-demo-importer';

    return $default_settings;
}

add_filter('pt-ocdi/plugin_page_setup', 'moda_plugin_page_setup');

add_filter('pt-ocdi/disable_pt_branding', '__return_true');

function moda_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'moda_mime_types');
