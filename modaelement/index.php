<?php

use Elementor\Controls_Manager;
use Elementor\Plugin;

if (!defined('ABSPATH')) {
    exit;
}
if (class_exists('ELEMENTOR')) {
    return;
}
if (!class_exists('ModaElement_Elementor_Addons')) :

    /**
     * Main ModaElement_Elementor_Addons Class
     *
     */
    final class ModaElement_Elementor_Addons
    {

        /** Singleton *************************************************************/
        const LIST_CONTROL = 'moda_lists_control';

        private static $instance;

        /**
         * Main ModaElement_Elementor_Addons Instance
         *
         * Insures that only one instance of ModaElement_Elementor_Addons exists in memory at any one
         * time. Also prevents needing to define globals all over the place.
         */
        public static function instance()
        {

            if (!isset(self::$instance) && !(self::$instance instanceof ModaElement_Elementor_Addons)) {

                self::$instance = new ModaElement_Elementor_Addons;

                self::$instance->setup_constants();

                self::$instance->includes();

                self::$instance->hooks();

            }
            return self::$instance;
        }

        /**
         * Throw error on object clone
         *
         * The whole idea of the singleton design pattern is that there is a single
         * object therefore, we don't want the object to be cloned.
         */
        public function __clone()
        {
            // Cloning instances of the class is forbidden
            _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'modaelement'), MODA_VERSION);
        }

        /**
         * Disable unserializing of the class
         *
         */
        public function __wakeup()
        {
            // Unserializing instances of the class is forbidden
            _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'modaelement'), MODA_VERSION);
        }

        /**
         * Setup plugin constants
         *
         */
        private function setup_constants()
        {

            // Plugin Folder Path
            if (!defined('Moda_PLUGIN_DIR')) {
                define('Moda_PLUGIN_DIR', plugin_dir_path(__FILE__));
            }

            // Plugin Folder URL
            if (!defined('Moda_PLUGIN_URL')) {
                define('Moda_PLUGIN_URL', plugin_dir_url(__FILE__));
            }

            // Plugin Folder Path
            if (!defined('Moda_ADDONS_DIR')) {
                define('Moda_ADDONS_DIR', plugin_dir_path(__FILE__) . 'includes/widgets/');
            }

            // Plugin Folder Path
            if (!defined('Moda_ADDONS_URL')) {
                define('Moda_ADDONS_URL', plugin_dir_url(__FILE__) . 'includes/widgets/');
            }

        }

        /**
         * Include required files
         *
         */
        private function includes()
        {


            require_once Moda_PLUGIN_DIR . 'includes/helper-functions.php';
            require_once Moda_PLUGIN_DIR . 'includes/query-functions.php';
            require_once Moda_PLUGIN_DIR . 'includes/template-lib.php';

        }

        /**
         * Load Plugin Text Domain
         *
         * Looks for the plugin translation files in certain directories and loads
         * them to allow the plugin to be localised
         */
        public function load_plugin_textdomain()
        {


        }

        /**
         * Setup the default hooks and actions
         */
        private function hooks()
        {
            add_action('elementor/controls/controls_registered', array($this, 'init_controls'), 10);
            add_action('plugins_loaded', array($this, 'load_plugin_textdomain'));
            add_action('elementor/frontend/after_register_scripts', array($this, 'register_frontend_scripts'), 10);
            add_action('elementor/frontend/after_enqueue_styles', array($this, 'register_frontend_styles'), 10);
            add_action('elementor/editor/before_enqueue_scripts', array($this, 'register_elementor_editor_css'), 10);
            add_action('elementor/init', array($this, 'add_elementor_category'));
            add_action('elementor/widgets/widgets_registered', array($this, 'include_widgets'));
            add_filter('elementor/icons_manager/additional_tabs', array($this, 'add_material_icons_tabs'));
            add_action('elementor/element/section/section_layout/after_section_end', array($this, 'register_section'), 10, 2);

        }

        public function register_section($element, $args)
        {

            $element->start_controls_section(
                'moda_parallax',
                array(
                    'label' => esc_html__('Parallax', 'moda'),
                    'tab' => Controls_Manager::TAB_LAYOUT,
                )
            );

            $element->add_control(
                'moda_parallax_on',
                array(
                    'label' => esc_html__('Parallax', 'moda'),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('Yes', 'moda'),
                    'label_off' => esc_html__('No', 'moda'),
                    'return_value' => 'true',
                    'default' => 'false',
                    'prefix_class' => 'xld-parallax',
                )
            );

            $element->end_controls_section();

        }

        public function add_material_icons_tabs($tabs = array())
        {

            $tabs['modaicon'] = array(
                'name' => 'modaicon',
                'label' => esc_html__('Moda', 'icon-element'),
                'labelIcon' => 'flaticon-dress',
                'prefix' => 'flaticon-',
                'displayPrefix' => 'moda-1',
                'url' => Moda_PLUGIN_URL . 'assets/css/moda/font/flaticon.css',
                'fetchJson' => Moda_PLUGIN_URL . 'assets/css/moda/moda.json',
                'ver' => '3.0.1',
            );
            return $tabs;
        }

        //Register Control
        public function init_controls()
        {

            require_once(plugin_dir_path(__FILE__) . 'includes/class-control-list.php');

            $controls_manager = Plugin::$instance->controls_manager;

            $controls_manager->register(new Moda_Lists_Control());
        }

        /**
         * Load Frontend Scripts
         *
         */
        public function register_frontend_scripts()
        {
            foreach (glob(MODA_PLUG_DIR . 'modaelement/assets/js/*.js') as $file) {
                $filename = substr($file, strrpos($file, '/') + 1);
                wp_enqueue_script($filename, Moda_PLUGIN_URL . 'assets/js/' . $filename, array('jquery'), MODA_VERSION, true);
            }
        }

        public function register_elementor_editor_css()
        {
            wp_enqueue_style('elementor-custom-editor', Moda_PLUGIN_URL . 'assets/css/elementor/elementor-custom-editor.css');
        }

        public function register_frontend_styles()
        {

            foreach (glob(MODA_PLUG_DIR . 'modaelement/assets/css/*.css') as $file) {
                $filename = substr($file, strrpos($file, '/') + 1);
                wp_enqueue_style($filename, Moda_PLUGIN_URL . 'assets/css/' . $filename);
                wp_enqueue_style('moda-icon', Moda_PLUGIN_URL . 'assets/css/moda/font/flaticon.css');
            }
        }

        public function add_elementor_category()
        {
            Plugin::instance()->elements_manager->add_category(
                'modaelement-addons',
                array(
                    'title' => __('Moda Addons', 'modaelement'),
                    'icon' => 'fa fa-plug',
                ),
                1);

            Plugin::instance()->elements_manager->add_category(
                'moda-header',
                array(
                    'title' => __('Moda Header', 'moda'),
                    'icon' => 'fa fa-plug',
                ),
                1);

            Plugin::instance()->elements_manager->add_category(
                'moda-footer',
                array(
                    'title' => __('Moda Footer', 'moda'),
                    'icon' => 'fa fa-plug',
                ),
                1);
        }

        public function include_widgets($widgets_manager)
        {
            $widgets[] = '';
            foreach (glob(MODA_PLUG_DIR . 'modaelement/includes/widgets/*') as $file) {

                $widgets[] = substr($file, strrpos($file, '/') + 1);
            }

            if (is_array($widgets)) {
                $widgets = array_filter($widgets);
                foreach ($widgets as $key => $value) {
                    if (!empty($value)) {
                        require_once Moda_ADDONS_DIR . '' . $value . '/index.php';
                    }

                }

            }

        }

    }

endif; // End if class_exists check


/**
 * The main function responsible for returning the one true ModaElement_Elementor_Addons
 * Instance to functions everywhere.
 *
 * Use this function like you would a global variable, except without needing
 * to declare the global.
 *
 * Example: <?php $ae = Moda(); ?>
 */
function Moda()
{
    return ModaElement_Elementor_Addons::instance();
}

// Get Moda Running
Moda();





