<?php
	
require get_template_directory() . '/includes/tgm/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function bakery_elementor_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Kirki Customizer Framework', 'bakery-elementor' ),
			'slug'             => 'kirki',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'WPElemento Importer', 'bakery-elementor' ),
			'slug'             => 'wpelemento-importer',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Element Pack Elementor Addons', 'bakery-elementor' ),
			'slug'             => 'bdthemes-element-pack-lite',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	bakery_elementor_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'bakery_elementor_register_recommended_plugins' );
