<?php

class Fresh_Bakers_Customizer_Notify {

	private $config = array(); // Declare $config property
	
	private $fresh_bakers_recommended_actions;
	
	private $recommended_plugins;
	
	private static $instance;
	
	private $fresh_bakers_recommended_actions_title;
	
	private $fresh_bakers_recommended_plugins_title;
	
	private $dismiss_button;
	
	private $fresh_bakers_install_button_label;
	
	private $fresh_bakers_activate_button_label;
	
	private $fresh_bakers_deactivate_button_label;

	
	public static function init( $config ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Fresh_Bakers_Customizer_Notify ) ) {
			self::$instance = new Fresh_Bakers_Customizer_Notify;
			if ( ! empty( $config ) && is_array( $config ) ) {
				self::$instance->config = $config;
				self::$instance->setup_config();
				self::$instance->setup_actions();
			}
		}

	}

	
	public function setup_config() {

		global $fresh_bakers_customizer_notify_recommended_plugins;
		global $fresh_bakers_customizer_notify_fresh_bakers_recommended_actions;

		global $fresh_bakers_install_button_label;
		global $fresh_bakers_activate_button_label;
		global $fresh_bakers_deactivate_button_label;

		$this->fresh_bakers_recommended_actions = isset( $this->config['fresh_bakers_recommended_actions'] ) ? $this->config['fresh_bakers_recommended_actions'] : array();
		$this->recommended_plugins = isset( $this->config['recommended_plugins'] ) ? $this->config['recommended_plugins'] : array();

		$this->fresh_bakers_recommended_actions_title = isset( $this->config['fresh_bakers_recommended_actions_title'] ) ? $this->config['fresh_bakers_recommended_actions_title'] : '';
		$this->fresh_bakers_recommended_plugins_title = isset( $this->config['fresh_bakers_recommended_plugins_title'] ) ? $this->config['fresh_bakers_recommended_plugins_title'] : '';
		$this->dismiss_button            = isset( $this->config['dismiss_button'] ) ? $this->config['dismiss_button'] : '';

		$fresh_bakers_customizer_notify_recommended_plugins = array();
		$fresh_bakers_customizer_notify_fresh_bakers_recommended_actions = array();

		if ( isset( $this->recommended_plugins ) ) {
			$fresh_bakers_customizer_notify_recommended_plugins = $this->recommended_plugins;
		}

		if ( isset( $this->fresh_bakers_recommended_actions ) ) {
			$fresh_bakers_customizer_notify_fresh_bakers_recommended_actions = $this->fresh_bakers_recommended_actions;
		}

		$fresh_bakers_install_button_label    = isset( $this->config['fresh_bakers_install_button_label'] ) ? $this->config['fresh_bakers_install_button_label'] : '';
		$fresh_bakers_activate_button_label   = isset( $this->config['fresh_bakers_activate_button_label'] ) ? $this->config['fresh_bakers_activate_button_label'] : '';
		$fresh_bakers_deactivate_button_label = isset( $this->config['fresh_bakers_deactivate_button_label'] ) ? $this->config['fresh_bakers_deactivate_button_label'] : '';

	}

	
	public function setup_actions() {

		// Register the section
		add_action( 'customize_register', array( $this, 'fresh_bakers_plugin_notification_customize_register' ) );

		// Enqueue scripts and styles
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'fresh_bakers_customizer_notify_scripts_for_customizer' ), 0 );

		/* ajax callback for dismissable recommended actions */
		add_action( 'wp_ajax_quality_customizer_notify_dismiss_action', array( $this, 'fresh_bakers_customizer_notify_dismiss_recommended_action_callback' ) );

		add_action( 'wp_ajax_ti_customizer_notify_dismiss_recommended_plugins', array( $this, 'fresh_bakers_customizer_notify_dismiss_recommended_plugins_callback' ) );

	}

	
	public function fresh_bakers_customizer_notify_scripts_for_customizer() {

		wp_enqueue_style( 'fresh-bakers-customizer-notify-css', get_template_directory_uri() . '/core/includes/customizer-notice/css/fresh-bakers-customizer-notify.css', array());

		wp_enqueue_style( 'plugin-install' );
		wp_enqueue_script( 'plugin-install' );
		wp_add_inline_script( 'plugin-install', 'var pagenow = "customizer";' );

		wp_enqueue_script( 'updates' );

		wp_enqueue_script( 'fresh-bakers-customizer-notify-js', get_template_directory_uri() . '/core/includes/customizer-notice/js/fresh-bakers-customizer-notify.js', array( 'customize-controls' ));
		wp_localize_script(
			'fresh-bakers-customizer-notify-js', 'freshbakersCustomizercompanionObject', array(
				'ajaxurl'            => admin_url( 'admin-ajax.php' ),
				'template_directory' => get_template_directory_uri(),
				'base_path'          => admin_url(),
				'activating_string'  => __( 'Activating', 'fresh-bakers' ),
			)
		);

	}

	
	public function fresh_bakers_plugin_notification_customize_register( $wp_customize ) {

		
		require_once get_template_directory() . '/core/includes/customizer-notice/fresh-bakers-customizer-notify-section.php';

		$wp_customize->register_section_type( 'Fresh_Bakers_Customizer_Notify_Section' );

		$wp_customize->add_section(
			new Fresh_Bakers_Customizer_Notify_Section(
				$wp_customize,
				'fresh-bakers-customizer-notify-section',
				array(
					'title'          => $this->fresh_bakers_recommended_actions_title,
					'plugin_text'    => $this->fresh_bakers_recommended_plugins_title,
					'dismiss_button' => $this->dismiss_button,
					'priority'       => 0,
				)
			)
		);

	}

	
	public function fresh_bakers_customizer_notify_dismiss_recommended_action_callback() {

		global $fresh_bakers_customizer_notify_fresh_bakers_recommended_actions;

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html( $action_id ); /* this is needed and it's the id of the dismissable required action */ 

		if ( ! empty( $action_id ) ) {
			
			if ( get_option( 'fresh_bakers_customizer_notify_show' ) ) {

				$fresh_bakers_customizer_notify_show_fresh_bakers_recommended_actions = get_option( 'fresh_bakers_customizer_notify_show' );
				switch ( $_GET['todo'] ) {
					case 'add':
						$fresh_bakers_customizer_notify_show_fresh_bakers_recommended_actions[ $action_id ] = true;
						break;
					case 'dismiss':
						$fresh_bakers_customizer_notify_show_fresh_bakers_recommended_actions[ $action_id ] = false;
						break;
				}
				update_option( 'fresh_bakers_customizer_notify_show', $fresh_bakers_customizer_notify_show_fresh_bakers_recommended_actions );

				
			} else {
				$fresh_bakers_customizer_notify_show_fresh_bakers_recommended_actions = array();
				if ( ! empty( $fresh_bakers_customizer_notify_fresh_bakers_recommended_actions ) ) {
					foreach ( $fresh_bakers_customizer_notify_fresh_bakers_recommended_actions as $fresh_bakers_lite_customizer_notify_recommended_action ) {
						if ( $fresh_bakers_lite_customizer_notify_recommended_action['id'] == $action_id ) {
							$fresh_bakers_customizer_notify_show_fresh_bakers_recommended_actions[ $fresh_bakers_lite_customizer_notify_recommended_action['id'] ] = false;
						} else {
							$fresh_bakers_customizer_notify_show_fresh_bakers_recommended_actions[ $fresh_bakers_lite_customizer_notify_recommended_action['id'] ] = true;
						}
					}
					update_option( 'fresh_bakers_customizer_notify_show', $fresh_bakers_customizer_notify_show_fresh_bakers_recommended_actions );
				}
			}
		}
		die(); 
	}

	
	public function fresh_bakers_customizer_notify_dismiss_recommended_plugins_callback() {

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html( $action_id ); /* this is needed and it's the id of the dismissable required action */

		if ( ! empty( $action_id ) ) {

			$fresh_bakers_lite_customizer_notify_show_recommended_plugins = get_option( 'fresh_bakers_customizer_notify_show_recommended_plugins' );

			switch ( $_GET['todo'] ) {
				case 'add':
					$fresh_bakers_lite_customizer_notify_show_recommended_plugins[ $action_id ] = false;
					break;
				case 'dismiss':
					$fresh_bakers_lite_customizer_notify_show_recommended_plugins[ $action_id ] = true;
					break;
			}
			update_option( 'fresh_bakers_customizer_notify_show_recommended_plugins', $fresh_bakers_lite_customizer_notify_show_recommended_plugins );
		}
		die(); 
	}

}
