<?php
if ( ! class_exists( 'Bakery_Elementor_Plugin_Activation_WPElemento_Importer' ) ) {
    /**
     * Bakery_Elementor_Plugin_Activation_WPElemento_Importer initial setup
     *
     * @since 1.6.2
     */

    class Bakery_Elementor_Plugin_Activation_WPElemento_Importer {

        private static $bakery_elementor_instance;
        public $bakery_elementor_action_count;
        public $bakery_elementor_recommended_actions;

        /** Initiator **/
        public static function get_instance() {
          if ( ! isset( self::$bakery_elementor_instance) ) {
            self::$bakery_elementor_instance = new self();
          }
          return self::$bakery_elementor_instance;
        }

        /*  Constructor */
        public function __construct() {

            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

            // ---------- wpelementoimpoter Plugin Activation -------
            add_filter( 'bakery_elementor_recommended_plugins', array($this, 'bakery_elementor_recommended_elemento_importer_plugins_array') );

            $bakery_elementor_actions                   = $this->bakery_elementor_get_recommended_actions();
            $this->bakery_elementor_action_count        = $bakery_elementor_actions['count'];
            $this->bakery_elementor_recommended_actions = $bakery_elementor_actions['actions'];

            add_action( 'wp_ajax_create_pattern_setup_builder', array( $this, 'create_pattern_setup_builder' ) );
        }

        public function bakery_elementor_recommended_elemento_importer_plugins_array($bakery_elementor_plugins){
            $bakery_elementor_plugins[] = array(
                    'name'     => esc_html__('WPElemento Importer', 'bakery-elementor'),
                    'slug'     =>  'wpelemento-importer',
                    'function' => 'WPElemento_Importer_ThemeWhizzie',
                    'desc'     => esc_html__('We highly recommend installing the WPElemento Importer plugin for importing the demo content with Elementor.', 'bakery-elementor'),               
            );
            return $bakery_elementor_plugins;
        }

        public function enqueue_scripts() {
            wp_enqueue_script('updates');      
            wp_register_script( 'bakery-elementor-plugin-activation-script', esc_url(get_template_directory_uri()) . '/includes/getstart/js/plugin-activation.js', array('jquery') );
            wp_localize_script('bakery-elementor-plugin-activation-script', 'bakery_elementor_plugin_activate_plugin',
                array(
                    'installing' => esc_html__('Installing', 'bakery-elementor'),
                    'activating' => esc_html__('Activating', 'bakery-elementor'),
                    'error' => esc_html__('Error', 'bakery-elementor'),
                    'ajax_url' => esc_url(admin_url('admin-ajax.php')),
                    'wpelementoimpoter_admin_url' => esc_url(admin_url('admin.php?page=wpelemento-importer-tgmpa-install-plugins')),
                    'addon_admin_url' => esc_url(admin_url('admin.php?page=wpelementoimporter-wizard'))
                )
            );
            wp_enqueue_script( 'bakery-elementor-plugin-activation-script' );

        }

        // --------- Plugin Actions ---------
        public function bakery_elementor_get_recommended_actions() {

            $bakery_elementor_act_count  = 0;
            $bakery_elementor_actions_todo = get_option( 'recommending_actions', array());

            $bakery_elementor_plugins = $this->bakery_elementor_get_recommended_plugins();

            if ($bakery_elementor_plugins) {
                foreach ($bakery_elementor_plugins as $bakery_elementor_key => $bakery_elementor_plugin) {
                    $bakery_elementor_action = array();
                    if (!isset($bakery_elementor_plugin['slug'])) {
                        continue;
                    }

                    $bakery_elementor_action['id']   = 'install_' . $bakery_elementor_plugin['slug'];
                    $bakery_elementor_action['desc'] = '';
                    if (isset($bakery_elementor_plugin['desc'])) {
                        $bakery_elementor_action['desc'] = $bakery_elementor_plugin['desc'];
                    }

                    $bakery_elementor_action['name'] = '';
                    if (isset($bakery_elementor_plugin['name'])) {
                        $bakery_elementor_action['title'] = $bakery_elementor_plugin['name'];
                    }

                    $bakery_elementor_link_and_is_done  = $this->bakery_elementor_get_plugin_buttion($bakery_elementor_plugin['slug'], $bakery_elementor_plugin['name'], $bakery_elementor_plugin['function']);
                    $bakery_elementor_action['link']    = $bakery_elementor_link_and_is_done['button'];
                    $bakery_elementor_action['is_done'] = $bakery_elementor_link_and_is_done['done'];
                    if (!$bakery_elementor_action['is_done'] && (!isset($bakery_elementor_actions_todo[$bakery_elementor_action['id']]) || !$bakery_elementor_actions_todo[$bakery_elementor_action['id']])) {
                        $bakery_elementor_act_count++;
                    }
                    $bakery_elementor_recommended_actions[] = $bakery_elementor_action;
                    $bakery_elementor_actions_todo[]        = array('id' => $bakery_elementor_action['id'], 'watch' => true);
                }
                return array('count' => $bakery_elementor_act_count, 'actions' => $bakery_elementor_recommended_actions);
            }

        }

        public function bakery_elementor_get_recommended_plugins() {

            $bakery_elementor_plugins = apply_filters('bakery_elementor_recommended_plugins', array());
            return $bakery_elementor_plugins;
        }

        public function bakery_elementor_get_plugin_buttion($slug, $name, $function) {
                $bakery_elementor_is_done      = false;
                $bakery_elementor_button_html  = '';
                $bakery_elementor_is_installed = $this->is_plugin_installed($slug);
                $bakery_elementor_plugin_path  = $this->get_plugin_basename_from_slug($slug);
                $bakery_elementor_is_activeted = (class_exists($function)) ? true : false;
                if (!$bakery_elementor_is_installed) {
                    $bakery_elementor_plugin_install_url = add_query_arg(
                        array(
                            'action' => 'install-plugin',
                            'plugin' => $slug,
                        ),
                        self_admin_url('update.php')
                    );
                    $bakery_elementor_plugin_install_url = wp_nonce_url($bakery_elementor_plugin_install_url, 'install-plugin_' . esc_attr($slug));
                    $bakery_elementor_button_html        = sprintf('<a class="bakery-elementor-plugin-install install-now button-secondary button" data-slug="%1$s" href="%2$s" aria-label="%3$s" data-name="%4$s">%5$s</a>',
                        esc_attr($slug),
                        esc_url($bakery_elementor_plugin_install_url),
                        sprintf(esc_html__('Install %s Now', 'bakery-elementor'), esc_html($name)),
                        esc_html($name),
                        esc_html__('Install & Activate', 'bakery-elementor')
                    );
                } elseif ($bakery_elementor_is_installed && !$bakery_elementor_is_activeted) {

                    $bakery_elementor_plugin_activate_link = add_query_arg(
                        array(
                            'action'        => 'activate',
                            'plugin'        => rawurlencode($bakery_elementor_plugin_path),
                            'plugin_status' => 'all',
                            'paged'         => '1',
                            '_wpnonce'      => wp_create_nonce('activate-plugin_' . $bakery_elementor_plugin_path),
                        ), self_admin_url('plugins.php')
                    );

                    $bakery_elementor_button_html = sprintf('<a class="bakery-elementor-plugin-activate activate-now button-primary button" data-slug="%1$s" href="%2$s" aria-label="%3$s" data-name="%4$s">%5$s</a>',
                        esc_attr($slug),
                        esc_url($bakery_elementor_plugin_activate_link),
                        sprintf(esc_html__('Activate %s Now', 'bakery-elementor'), esc_html($name)),
                        esc_html($name),
                        esc_html__('Activate', 'bakery-elementor')
                    );
                } elseif ($bakery_elementor_is_activeted) {
                    $bakery_elementor_button_html = sprintf('<div class="action-link button disabled"><span class="dashicons dashicons-yes"></span> %s</div>', esc_html__('Active', 'bakery-elementor'));
                    $bakery_elementor_is_done     = true;
                }

                return array('done' => $bakery_elementor_is_done, 'button' => $bakery_elementor_button_html);
            }
        public function is_plugin_installed($slug) {
            $bakery_elementor_installed_plugins = $this->get_installed_plugins(); // Retrieve a list of all installed plugins (WP cached).
            $bakery_elementor_file_path         = $this->get_plugin_basename_from_slug($slug);
            return (!empty($bakery_elementor_installed_plugins[$bakery_elementor_file_path]));
        }
        public function get_plugin_basename_from_slug($slug) {
            $bakery_elementor_keys = array_keys($this->get_installed_plugins());
            foreach ($bakery_elementor_keys as $bakery_elementor_key) {
                if (preg_match('|^' . $slug . '/|', $bakery_elementor_key)) {
                    return $bakery_elementor_key;
                }
            }
            return $slug;
        }

        public function get_installed_plugins() {

            if (!function_exists('get_plugins')) {
                require_once ABSPATH . 'wp-admin/includes/plugin.php';
            }

            return get_plugins();
        }
        public function create_pattern_setup_builder() {

            $edit_page = admin_url().'post-new.php?post_type=page&create_pattern=true';
            echo json_encode(['page_id'=>'','edit_page_url'=> $edit_page ]);

            exit;
        }

    }
}
/**
 * Kicking this off by calling 'get_instance()' method
 */
Bakery_Elementor_Plugin_Activation_WPElemento_Importer::get_instance();