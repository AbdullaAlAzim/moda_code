<?php
/*
Plugin Name: Moda Core
Plugin URI: https://modatheme.com/
Description: Moda Core.
Author: Moda Theme
Author URI: https://modatheme.com/
Version: 1.0.0
*/

use Elementor\Plugin;

if (!defined('ABSPATH')) exit;
define('MODA_VERSION', '1.0.0');
define('MODA_PLUG_DIR', dirname(__FILE__) . '/');
define('MODA_PLUG_URL', plugin_dir_url(__FILE__));
define('MODA_DEMO_FILES', plugin_dir_url(__FILE__) . 'vendor/demo/data/xml/');
define('MODA_DEMO_SLIDER', plugin_dir_path(__FILE__) . 'vendor/demo/data/xml/');

function cs_framework_init_check()
{

    if (!function_exists('cs_framework_init') && !class_exists('CSFramework')) {

        require_once MODA_PLUG_DIR . '/vendor/codestar-framework/codestar-framework.php';
        require_once MODA_PLUG_DIR . '/vendor/configstar/customiser.php';
        require_once MODA_PLUG_DIR . '/vendor/configstar/pagemeta.php';
        require_once MODA_PLUG_DIR . '/vendor/configstar/nav.php';
        require_once MODA_PLUG_DIR . '/modaelement/includes/class-mega-menu.php';
        require_once MODA_PLUG_DIR . '/vendor/configstar/profile.php';
        require_once MODA_PLUG_DIR . '/vendor/configstar/product_cat.php';
        require_once MODA_PLUG_DIR . '/vendor/admin-pages/admin.php';
        require_once MODA_PLUG_DIR . '/vendor/demo/includes/demo-importer.php';

    }

    if (!class_exists('ModaElement_Elementor_Addons')) {
        require_once MODA_PLUG_DIR . '/modaelement/index.php';
        require_once MODA_PLUG_DIR . '/helper/customiser-extra.php';
        require_once MODA_PLUG_DIR . '/helper/cpt.php';
    }

}

add_action('plugins_loaded', 'cs_framework_init_check');

function modaelement_footer_select($type = '')
{

    $type = $type ? $type : 'elementor_library';
    global $post;
    $args = array('numberposts' => -1, 'post_type' => $type,);
    $posts = get_posts($args);
    $categories = array(
        '' => __('Select', 'moda'),
    );
    foreach ($posts as $pn_cat) {
        $categories[$pn_cat->ID] = get_the_title($pn_cat->ID);
    }
    return $categories;
}

//elementor template
if (class_exists('ELEMENTOR')) {
    add_action('template_redirect', function () {
        $instance = Plugin::$instance->templates_manager->get_source('local');
        remove_action('template_redirect', [$instance, 'block_template_frontend']);
    }, 9);
}
add_filter('csf_fa4', '__return_true');
