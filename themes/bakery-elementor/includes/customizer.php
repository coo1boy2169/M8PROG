<?php

if ( class_exists("Kirki")){

	Kirki::add_config('theme_config_id', array(
		'capability'   =>  'edit_theme_options',
		'option_type'  =>  'theme_mod',
	));


	Kirki::add_field( 'theme_config_id', [
		'label'       => esc_html__( 'Logo Size','bakery-elementor' ),
		'section'     => 'title_tagline',
		'priority'    => 9,
		'type'        => 'range',
		'settings'    => 'logo_size',
		'choices' => [
			'step'             => 5,
			'min'              => 0,
			'max'              => 100,
			'aria-valuemin'    => 0,
			'aria-valuemax'    => 100,
			'aria-valuenow'    => 50,
			'aria-orientation' => 'horizontal',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_enable_logo_text',
		'section'     => 'title_tagline',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'bakery-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

  	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'bakery_elementor_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'bakery-elementor' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'bakery-elementor' ),
			'off' => esc_html__( 'Disable', 'bakery-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'bakery_elementor_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'bakery-elementor' ),
		'section'     => 'title_tagline',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'bakery-elementor' ),
			'off' => esc_html__( 'Disable', 'bakery-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_site_tittle_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Title Font Size', 'bakery-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'bakery_elementor_site_tittle_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo a'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_site_tagline_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Tagline Font Size', 'bakery-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'bakery_elementor_site_tagline_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo span'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_logo_settings_premium_features',
		'section'     => 'title_tagline',
		'priority'    => 50,
		'default'     => '<h3 style="color: #2271b1; padding:5px 20px 5px 20px; background:#fff; margin:0;  box-shadow: 0 2px 4px rgba(0,0,0, .2); ">' . esc_html__( 'Unlock More Features in the Premium Version!', 'bakery-elementor' ) . '</h3><ul style="color: #121212; padding: 5px 20px 20px 30px; background:#fff; margin:0;" ><li style="list-style-type: square;" >' . esc_html__( 'Customizable Text Logo', 'bakery-elementor' ) . '</li><li style="list-style-type: square;" >'.esc_html__( 'Enhanced Typography Options', 'bakery-elementor' ) .'</li><li style="list-style-type: square;" >'.esc_html__( 'Priority Support', 'bakery-elementor' ) .'</li><li style="list-style-type: square;" >'.esc_html__( '....and Much More', 'bakery-elementor' ) . '</li></ul><div style="background: #fff; padding: 0px 10px 10px 20px;"><a href="' . esc_url( __( 'https://www.wpelemento.com/products/bakery-wordpress-theme', 'bakery-elementor' ) ) . '" class="button button-primary" target="_blank">'. esc_html__( 'Upgrade for more', 'bakery-elementor' ) .'</a></div>',
	) );

	// Theme color

	Kirki::add_section( 'bakery_elementor_theme_color_setting', array(
		'title'    => __( 'Color Option', 'bakery-elementor' ),
		'priority' => 10,
	) );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'bakery_elementor_theme_color',
		'label'       => __( 'Theme color', 'bakery-elementor'),
		'description'    => esc_html__( 'To customize the colors of the homepage, use the Elementor editor', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_theme_color_setting',
		'type'        => 'color',
		'default'     => '#DA2847',
	) );

	// TYPOGRAPHY SETTINGS

	Kirki::add_panel( 'bakery_elementor_typography_panel', array(
		'priority' => 10,
		'title'    => __( 'Typography', 'bakery-elementor' ),
	) );

	//Heading 1 Section

	Kirki::add_section( 'bakery_elementor_h1_typography_setting', array(
		'title'    => __( 'Heading 1', 'bakery-elementor' ),
		'panel'    => 'bakery_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_h1_typography_heading',
		'section'     => 'bakery_elementor_h1_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 1 Typography', 'bakery-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'bakery_elementor_h1_typography_font',
		'section'   =>  'bakery_elementor_h1_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Merienda', sans-serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  array('.header-image-box h1'),
				'suffix' => '!important'
			],
		],
	) );

	//Heading 2 Section

	Kirki::add_section( 'bakery_elementor_h2_typography_setting', array(
		'title'    => __( 'Heading 2', 'bakery-elementor' ),
		'panel'    => 'bakery_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_h2_typography_heading',
		'section'     => 'bakery_elementor_h2_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 2 Typography', 'bakery-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'bakery_elementor_h2_typography_font',
		'section'   =>  'bakery_elementor_h2_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Merienda', sans-serif",
			'font-size'       => '',
			'variant'       =>  '700',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h2',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 3 Section

	Kirki::add_section( 'bakery_elementor_h3_typography_setting', array(
		'title'    => __( 'Heading 3', 'bakery-elementor' ),
		'panel'    => 'bakery_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_h3_typography_heading',
		'section'     => 'bakery_elementor_h3_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 3 Typography', 'bakery-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'bakery_elementor_h3_typography_font',
		'section'   =>  'bakery_elementor_h3_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Merienda', sans-serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h3',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 4 Section

	Kirki::add_section( 'bakery_elementor_h4_typography_setting', array(
		'title'    => __( 'Heading 4', 'bakery-elementor' ),
		'panel'    => 'bakery_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_h4_typography_heading',
		'section'     => 'bakery_elementor_h4_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 4 Typography', 'bakery-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'bakery_elementor_h4_typography_font',
		'section'   =>  'bakery_elementor_h4_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Merienda', sans-serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h4',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 5 Section

	Kirki::add_section( 'bakery_elementor_h5_typography_setting', array(
		'title'    => __( 'Heading 5', 'bakery-elementor' ),
		'panel'    => 'bakery_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_h5_typography_heading',
		'section'     => 'bakery_elementor_h5_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 5 Typography', 'bakery-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'bakery_elementor_h5_typography_font',
		'section'   =>  'bakery_elementor_h5_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Merienda', sans-serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h5',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 6 Section

	Kirki::add_section( 'bakery_elementor_h6_typography_setting', array(
		'title'    => __( 'Heading 6', 'bakery-elementor' ),
		'panel'    => 'bakery_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_h6_typography_heading',
		'section'     => 'bakery_elementor_h6_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 6 Typography', 'bakery-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'bakery_elementor_h6_typography_font',
		'section'   =>  'bakery_elementor_h6_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Merienda', sans-serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h6',
				'suffix' => '!important'
			],
		],
	) );

	//body Typography

	Kirki::add_section( 'bakery_elementor_body_typography_setting', array(
		'title'    => __( 'Content Typography', 'bakery-elementor' ),
		'panel'    => 'bakery_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_body_typography_heading',
		'section'     => 'bakery_elementor_body_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Content  Typography', 'bakery-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'bakery_elementor_body_typography_font',
		'section'   =>  'bakery_elementor_body_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Inter', sans-serif",
			'variant'       =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   => 'body',
				'suffix' => '!important'
			],
		],
	) ); 

	// Theme Options Panel

	Kirki::add_panel( 'bakery_elementor_theme_options_panel', array(
		'priority' => 10,
		'title'    => __( 'Theme Options', 'bakery-elementor' ),
	) );

	// HEADER SECTION

	Kirki::add_section( 'bakery_elementor_section_header',array(
		'title' => esc_html__( 'Header Settings', 'bakery-elementor' ),
		'description'    => esc_html__( 'Here you can add header information.', 'bakery-elementor' ),
		'panel' => 'bakery_elementor_theme_options_panel',
		'tabs'  => [
			'header' => [
				'label' => esc_html__( 'Header', 'bakery-elementor' ),
			],
			'menu'  => [
				'label' => esc_html__( 'Menu', 'bakery-elementor' ),
			],
		],
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'menu',
		'settings'    => 'bakery_elementor_menu_size_heading',
		'section'     => 'bakery_elementor_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Menu Font Size(px)', 'bakery-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'bakery_elementor_menu_size',
		'tab'      => 'menu',
		'label'       => __( 'Enter a value in pixels. Example:20px', 'bakery-elementor' ),
		'type'        => 'text',
		'section'     => 'bakery_elementor_section_header',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array( '#main-menu a', '#main-menu ul li a', '#main-menu li a'),
				'property' => 'font-size',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'menu',
		'settings'    => 'bakery_elementor_menu_text_transform_heading',
		'section'     => 'bakery_elementor_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Menu Text Transform', 'bakery-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'menu',
		'settings'    => 'bakery_elementor_menu_text_transform',
		'section'     => 'bakery_elementor_section_header',
		'default'     => 'capitalize',
		'choices'     => [
			'none' => esc_html__( 'Normal', 'bakery-elementor' ),
			'uppercase' => esc_html__( 'Uppercase', 'bakery-elementor' ),
			'lowercase' => esc_html__( 'Lowercase', 'bakery-elementor' ),
			'capitalize' => esc_html__( 'Capitalize', 'bakery-elementor' ),
		],
		'output' => array(
			array(
				'element'  => array( '#main-menu a', '#main-menu ul li a', '#main-menu li a'),
				'property' => ' text-transform',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header',
		'settings'    => 'bakery_elementor_cart_button_heading',
		'section'     => 'bakery_elementor_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Cart Button', 'bakery-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'tab'      => 'header',
		'label'    =>  esc_html__( 'Button Url', 'bakery-elementor' ),
		'settings' => 'bakery_elementor_header_cart_url',
		'section'  => 'bakery_elementor_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header',
		'settings'    => 'bakery_elementor_enable_button_heading',
		'section'     => 'bakery_elementor_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Button', 'bakery-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'tab'      => 'header',
		'label'    => esc_html__( 'Button Text', 'bakery-elementor' ),
		'settings' => 'bakery_elementor_header_button_text',
		'section'  => 'bakery_elementor_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'tab'      => 'header',
		'label'    =>  esc_html__( 'Button Link', 'bakery-elementor' ),
		'settings' => 'bakery_elementor_header_button_url',
		'section'  => 'bakery_elementor_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'custom',
		'tab'      => 'header',
		'settings'    => 'bakery_elementor_logo_settings_premium_features_header',
		'section'     => 'bakery_elementor_section_header',
		'priority'    => 50,
		'default'     => '<h3 style="color: #2271b1; padding:5px 20px 5px 20px; background:#fff; margin:0;  box-shadow: 0 2px 4px rgba(0,0,0, .2); ">' . esc_html__( 'Enhance your header design now!', 'bakery-elementor' ) . '</h3><ul style="color: #121212; padding: 5px 20px 20px 30px; background:#fff; margin:0;" ><li style="list-style-type: square;" >' . esc_html__( 'Customize your header background color', 'bakery-elementor' ) . '</li><li style="list-style-type: square;" >'.esc_html__( 'Adjust icon and text font sizes', 'bakery-elementor' ) .'</li><li style="list-style-type: square;" >'.esc_html__( 'Explore enhanced typography options', 'bakery-elementor' ) .'</li><li style="list-style-type: square;" >'.esc_html__( '....and Much More', 'bakery-elementor' ) . '</li></ul><div style="background: #fff; padding: 0px 10px 10px 20px;"><a href="' . esc_url( __( 'https://www.wpelemento.com/products/bakery-wordpress-theme', 'bakery-elementor' ) ) . '" class="button button-primary" target="_blank">'. esc_html__( 'Upgrade for more', 'bakery-elementor' ) .'</a></div>',
	) );

	// WOOCOMMERCE SETTINGS

	Kirki::add_section( 'bakery_elementor_woocommerce_settings', array(
		'title'          => esc_html__( 'Woocommerce Settings', 'bakery-elementor' ),
		'description'    => esc_html__( 'Woocommerce Settings of themes', 'bakery-elementor' ),
		'panel'    => 'woocommerce',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'bakery_elementor_shop_page_sidebar',
		'label'       => esc_html__( 'Enable/Disable Shop Page Sidebar', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_woocommerce_settings',
		'default'     => 'false',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Shop Page Layouts', 'bakery-elementor' ),
		'settings'    => 'bakery_elementor_shop_page_layout',
		'section'     => 'bakery_elementor_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'bakery-elementor' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'bakery-elementor' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'bakery_elementor_shop_page_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'label'       => esc_html__( 'Products Per Row', 'bakery-elementor' ),
		'settings'    => 'bakery_elementor_products_per_row',
		'section'     => 'bakery_elementor_woocommerce_settings',
		'default'     => '4',
		'priority'    => 10,
		'choices'     => [
			'2' => '2',
			'3' => '3',
			'4' => '4',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'label'       => esc_html__( 'Products Per Page', 'bakery-elementor' ),
		'settings'    => 'bakery_elementor_products_per_page',
		'section'     => 'bakery_elementor_woocommerce_settings',
		'default'     => '9',
		'priority'    => 10,
		'choices'  => [
					'min'  => 0,
					'max'  => 50,
					'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'bakery_elementor_single_product_sidebar',
		'label'       => esc_html__( 'Enable / Disable Single Product Sidebar', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_woocommerce_settings',
		'default'     => 'true',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Single Product Layout', 'bakery-elementor' ),
		'settings'    => 'bakery_elementor_single_product_sidebar_layout',
		'section'     => 'bakery_elementor_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'bakery-elementor' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'bakery-elementor' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'bakery_elementor_single_product_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_products_button_border_radius_heading',
		'section'     => 'bakery_elementor_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Products Button Border Radius', 'bakery-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'bakery_elementor_products_button_border_radius',
		'section'     => 'bakery_elementor_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
		'choices'  => [
					'min'  => 1,
					'max'  => 50,
					'step' => 1,
				],
		'output' => array(
			array(
				'element'  => array('.woocommerce ul.products li.product .button',' a.checkout-button.button.alt.wc-forward','.woocommerce #respond input#submit', '.woocommerce a.button', '.woocommerce button.button','.woocommerce input.button','.woocommerce #respond input#submit.alt','.woocommerce button.button.alt','.woocommerce input.button.alt'),
				'property' => 'border-radius',
				'units' => 'px',
			),
		),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_sale_badge_position_heading',
		'section'     => 'bakery_elementor_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Badge Position', 'bakery-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'bakery_elementor_sale_badge_position',
		'section'     => 'bakery_elementor_woocommerce_settings',
		'default'     => 'right',
		'choices'     => [
			'right' => esc_html__( 'Right', 'bakery-elementor' ),
			'left' => esc_html__( 'Left', 'bakery-elementor' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_products_sale_font_size_heading',
		'section'     => 'bakery_elementor_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Font Size', 'bakery-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'text',
		'settings'    => 'bakery_elementor_products_sale_font_size',
		'section'     => 'bakery_elementor_woocommerce_settings',
		'priority'    => 10,
		'output' => array(
			array(
				'element'  => array('.woocommerce span.onsale','.woocommerce ul.products li.product .onsale'),
				'property' => 'font-size',
				'units' => 'px',
			),
		),
	] );
	
	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_show_related_product_heading',
		'section'     => 'bakery_elementor_woocommerce_settings',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Related Product', 'bakery-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'bakery_elementor_show_related_product',
		'label'       => esc_html__( 'Enable or Disable Related Product', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_woocommerce_settings',
		'default'     => true,
		'priority'    => 10,
	] );

	//ADDITIONAL SETTINGS

	Kirki::add_section( 'bakery_elementor_additional_setting', array(
		'title'          => esc_html__( 'Additional Settings', 'bakery-elementor' ),
		'description'    => esc_html__( 'Additional Settings of themes', 'bakery-elementor' ),
		'panel'    => 'bakery_elementor_theme_options_panel',
		'priority'       => 10,
		'tabs'  => [
			'general' => [
				'label' => esc_html__( 'General', 'bakery-elementor' ),
			],
			'header-image'  => [
				'label' => esc_html__( 'Header Image', 'bakery-elementor' ),
			],
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'bakery_elementor_preloader_hide',
		'label'       => esc_html__( 'Here you can enable or disable your preloader.', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_additional_setting',
		'default'     => '0',
		'priority'    => 10,
		'tab'      => 'general',
	] );
 
	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'bakery_elementor_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_additional_setting',
		'default'     => '0',
		'priority'    => 10,
		'tab'      => 'general',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'bakery_elementor_scroll_alignment_heading',
		'section'     => 'bakery_elementor_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Scroll To Top Position', 'bakery-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'radio-buttonset',
		'tab'      => 'general',
		'settings'    => 'bakery_elementor_scroll_alignment',
		'section'     => 'bakery_elementor_additional_setting',
		'default'     => 'right',
		'choices'     => [
			'left' => esc_html__( 'left', 'bakery-elementor' ),
			'center' => esc_html__( 'center', 'bakery-elementor' ),
			'right' => esc_html__( 'right', 'bakery-elementor' ),
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'bakery_elementor_scroller_border_radius_heading',
		'section'     => 'bakery_elementor_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Scroll To Top Border Radius', 'bakery-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'slider',
		'tab'      => 'general',
		'settings'    => 'bakery_elementor_scroller_border_radius',
		'section'     => 'bakery_elementor_additional_setting',
		'default'     => '3',
		'choices'     => [
			'min'  => 0,
			'max'  => 25,
			'step' => 1,
		],
		'output' => array(
			array(
				'element'  => '.scroll-up a',
				'property' => 'border-radius',
				'units' => 'px',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'bakery_elementor_cursor_outline_heading',
		'section'     => 'bakery_elementor_additional_setting',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Dot Cursor', 'bakery-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'general',
		'settings'    => 'bakery_elementor_cursor_outline',
		'label'       => esc_html__( 'Enable or Disable Dot Cursor', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_additional_setting',
		'default'     => false,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'bakery_elementor_progress_bar_heading',
		'section'     => 'bakery_elementor_additional_setting',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Progress Bar', 'bakery-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'general',
		'settings'    => 'bakery_elementor_progress_bar',
		'label'       => esc_html__( 'Enable or Disable Progress Bar', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_additional_setting',
		'default'     => true,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'bakery_elementor_progress_bar_position_heading',
		'section'     => 'bakery_elementor_additional_setting',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Progress Bar Position', 'bakery-elementor' ) . '</h3>',
		'priority'    => 10,
		'active_callback'  => [
			[
				'setting'  => 'bakery_elementor_progress_bar',
				'operator' => '===',
				'value'    => true,
			],
		]
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'general',
		'settings'    => 'bakery_elementor_progress_bar_position',
		'section'     => 'bakery_elementor_additional_setting',
		'default'     => 'top',
		'choices'     => [
			'top' => esc_html__( 'Top', 'bakery-elementor' ),
			'bottom' => esc_html__( 'Bottom', 'bakery-elementor' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'bakery_elementor_progress_bar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'bakery_elementor_progress_bar_color_heading',
		'section'     => 'bakery_elementor_additional_setting',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Progress Bar Color', 'bakery-elementor' ) . '</h3>',
		'priority'    => 10,
		'active_callback'  => [
			[
				'setting'  => 'bakery_elementor_progress_bar',
				'operator' => '===',
				'value'    => true,
			],
		]
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'bakery_elementor_progress_bar_color',
		'tab'      => 'general',
		'label'       => __( 'Color', 'bakery-elementor' ),
		'type'        => 'color',
		'section'     => 'bakery_elementor_additional_setting',
		'transport' => 'auto',
		'default'     => '#da2847',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '#elemento-progress-bar',
				'property' => 'background-color',
			),
		),
		'active_callback'  => [
			[
				'setting'  => 'bakery_elementor_progress_bar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'bakery_elementor_single_page_layout_heading',
		'section'     => 'bakery_elementor_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Page Layout', 'bakery-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'general',
		'settings'    => 'bakery_elementor_single_page_layout',
		'section'     => 'bakery_elementor_additional_setting',
		'default'     => 'One Column',
		'choices'     => [
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'bakery-elementor' ),
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'bakery-elementor' ),
			'One Column' => esc_html__( 'One Column', 'bakery-elementor' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header-image',
		'settings'    => 'bakery_elementor_header_background_attachment_heading',
		'section'     => 'bakery_elementor_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Attachment', 'bakery-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'header-image',
		'settings'    => 'bakery_elementor_header_background_attachment',
		'section'     => 'bakery_elementor_additional_setting',
		'default'     => 'scroll',
		'choices'     => [
			'scroll' => esc_html__( 'Scroll', 'bakery-elementor' ),
			'fixed' => esc_html__( 'Fixed', 'bakery-elementor' ),
		],
		'output' => array(
			array(
				'element'  => '.header-image-box',
				'property' => 'background-attachment',
			),
		),
	 ) );

	 Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header-image',
		'settings'    => 'bakery_elementor_header_image_height_heading',
		'section'     => 'bakery_elementor_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image height', 'bakery-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'bakery_elementor_header_image_height',
		'label'       => __( 'Image Height', 'bakery-elementor' ),
		'description'    => esc_html__( 'Enter a value in pixels. Example:500px', 'bakery-elementor' ),
		'type'        => 'text',
		'tab'      => 'header-image',
		'default'    => [
			'desktop' => '400px',
			'tablet'  => '350px',
			'mobile'  => '200px',
		],
		'responsive' => true,
		'section'     => 'bakery_elementor_additional_setting',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.header-image-box'),
				'property' => 'height',
				'media_query' => [
					'desktop' => '@media (min-width: 1024px)',
					'tablet'  => '@media (min-width: 768px) and (max-width: 1023px)',
					'mobile'  => '@media (max-width: 767px)',
				],
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header-image',
		'settings'    => 'bakery_elementor_header_overlay_heading',
		'section'     => 'bakery_elementor_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Overlay', 'bakery-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'bakery_elementor_header_overlay_setting',
		'tab'      => 'header-image',
		'label'       => __( 'Overlay Color', 'bakery-elementor' ),
		'type'        => 'color',
		'section'     => 'bakery_elementor_additional_setting',
		'transport' => 'auto',
		'default'     => '#00000000',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.header-image-box:before',
				'property' => 'background',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'header-image',
		'settings'    => 'bakery_elementor_header_page_title',
		'label'       => esc_html__( 'Enable / Disable Header Image Page Title.', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'header-image',
		'settings'    => 'bakery_elementor_header_breadcrumb',
		'label'       => esc_html__( 'Enable / Disable Header Image Breadcrumb.', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	// POST SECTION

	Kirki::add_section( 'bakery_elementor_blog_post', array(
		'title'          => esc_html__( 'Post Settings', 'bakery-elementor' ),
		'description'    => esc_html__( 'Here you can add post information.', 'bakery-elementor' ),
		'panel'    => 'bakery_elementor_theme_options_panel',
		'tabs'  => [
			'blog-post' => [
				'label' => esc_html__( 'Blog Post', 'bakery-elementor' ),
			],
			'single-post'  => [
				'label' => esc_html__( 'Single Post', 'bakery-elementor' ),
			],
		],
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'blog-post',
		'settings'    => 'bakery_elementor_post_layout_heading',
		'section'     => 'bakery_elementor_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Layout', 'bakery-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'blog-post',
		'settings'    => 'bakery_elementor_post_layout',
		'section'     => 'bakery_elementor_blog_post',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'bakery-elementor' ),
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'bakery-elementor' ),
			'One Column' => esc_html__( 'One Column', 'bakery-elementor' ),
			'Three Columns' => esc_html__( 'Three Columns', 'bakery-elementor' ),
			'Four Columns' => esc_html__( 'Four Columns', 'bakery-elementor' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'bakery_elementor_date_hide',
		'label'       => esc_html__( 'Enable / Disable Post Date', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'bakery_elementor_author_hide',
		'label'       => esc_html__( 'Enable / Disable Post Author', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'bakery_elementor_comment_hide',
		'label'       => esc_html__( 'Enable / Disable Post Comment', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'bakery_elementor_blog_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Post Image', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'blog-post',
		'settings'    => 'bakery_elementor_length_setting_heading',
		'section'     => 'bakery_elementor_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Post Content Limit', 'bakery-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'tab'      => 'blog-post',
		'settings'    => 'bakery_elementor_length_setting',
		'section'     => 'bakery_elementor_blog_post',
		'default'     => '15',
		'priority'    => 10,
		'choices'  => [
					'min'  => -10,
					'max'  => 40,
		 			'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'blog-post',
		'settings'    => 'bakery_elementor_show_pagination_heading',
		'section'     => 'bakery_elementor_blog_post',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Post Pagination', 'bakery-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'bakery_elementor_show_pagination',
		'label'       => esc_html__( 'Enable or Disable Blog Post Pagination', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_blog_post',
		'default'     => true,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'bakery_elementor_single_post_date_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Date', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'bakery_elementor_single_post_author_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Author', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'bakery_elementor_single_post_comment_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Comment', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'label'       => esc_html__( 'Enable / Disable Single Post Tag', 'bakery-elementor' ),
		'settings'    => 'bakery_elementor_single_post_tag',
		'section'     => 'bakery_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'label'       => esc_html__( 'Enable / Disable Single Post Category', 'bakery-elementor' ),
		'settings'    => 'bakery_elementor_single_post_category',
		'section'     => 'bakery_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'bakery_elementor_single_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Single Post Image', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'single-post',
		'settings'    => 'bakery_elementor_single_post_radius',
		'section'     => 'bakery_elementor_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Post Image Border Radius(px)', 'bakery-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'bakery_elementor_single_post_border_radius',
		'label'       => __( 'Enter a value in pixels. Example:15px', 'bakery-elementor' ),
		'type'        => 'text',
		'tab'      => 'single-post',
		'section'     => 'bakery_elementor_blog_post',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.post-img img'),
				'property' => 'border-radius',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'single-post',
		'settings'    => 'bakery_elementor_show_related_post_heading',
		'section'     => 'bakery_elementor_blog_post',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Related post', 'bakery-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'bakery_elementor_show_related_post',
		'label'       => esc_html__( 'Enable or Disable Related post', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_blog_post',
		'default'     => true,
		'priority'    => 10,
	] );

	// No Results Page Settings

	Kirki::add_section( 'bakery_elementor_no_result_section', array(
		'title'          => esc_html__( '404 & No Results Page Settings', 'bakery-elementor' ),
		'panel'    => 'bakery_elementor_theme_options_panel',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_page_not_found_title_heading',
		'section'     => 'bakery_elementor_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Page Title', 'bakery-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'bakery_elementor_page_not_found_title',
		'section'  => 'bakery_elementor_no_result_section',
		'default'  => esc_html__('404 Error!', 'bakery-elementor'),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_page_not_found_text_heading',
		'section'     => 'bakery_elementor_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Page Text', 'bakery-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'bakery_elementor_page_not_found_text',
		'section'  => 'bakery_elementor_no_result_section',
		'default'  => esc_html__('The page you are looking for may have been moved, deleted, or possibly never existed.', 'bakery-elementor'),
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'     => 'custom',
		'settings' => 'bakery_elementor_page_not_found_line_break',
		'section'  => 'bakery_elementor_no_result_section',
		'default'  => '<hr>',
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_no_results_title_heading',
		'section'     => 'bakery_elementor_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Results Title', 'bakery-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'bakery_elementor_no_results_title',
		'section'  => 'bakery_elementor_no_result_section',
		'default'  => esc_html__('Nothing Found', 'bakery-elementor'),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_no_results_content_heading',
		'section'     => 'bakery_elementor_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Results Content', 'bakery-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'bakery_elementor_no_results_content',
		'section'  => 'bakery_elementor_no_result_section',
		'default'  => esc_html__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'bakery-elementor'),
	] );
	
	// FOOTER SECTION

	Kirki::add_section( 'bakery_elementor_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'bakery-elementor' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'bakery-elementor' ),
        'panel'    => 'bakery_elementor_theme_options_panel',
		'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_show_footer_widget_heading',
		'section'     => 'bakery_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable', 'bakery-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'bakery_elementor_show_footer_widget',
		'label'       => esc_html__( 'Footer Widget', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_footer_section',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'bakery_elementor_show_footer_copyright',
		'label'       => esc_html__( 'Footer Copyright', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_footer_section',
		'default'     => '1',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_footer_text_heading',
		'section'     => 'bakery_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'bakery-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'bakery_elementor_footer_text',
		'section'  => 'bakery_elementor_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_footer_enable_heading',
		'section'     => 'bakery_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'bakery-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'bakery_elementor_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'bakery-elementor' ),
			'off' => esc_html__( 'Disable', 'bakery-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_footer_background_widget_heading',
		'section'     => 'bakery_elementor_footer_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Widget Background', 'bakery-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id',
	[
		'settings'    => 'bakery_elementor_footer_background_widget',
		'type'        => 'background',
		'section'     => 'bakery_elementor_footer_section',
		'default'     => [
			'background-color'      => 'rgba(23,20,20,1)',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output'      => [
			[
				'element' => '.footer-widget',
			],
		],
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_footer_copright_color_heading',
		'section'     => 'bakery_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Copyright Background Color', 'bakery-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'bakery_elementor_footer_copright_color',
		'type'        => 'color',
		'label'       => __( 'Background Color', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_footer_section',
		'transport' => 'auto',
		'default'     => '#DA2847',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.footer-copyright',
				'property' => 'background',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_footer_copright_text_color_heading',
		'section'     => 'bakery_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Copyright Text Color', 'bakery-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'bakery_elementor_footer_copright_text_color',
		'type'        => 'color',
		'label'       => __( 'Text Color', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_footer_section',
		'transport' => 'auto',
		'default'     => '#ffffff',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => array( '.footer-copyright a', '.footer-copyright p'),
				'property' => 'color',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_logo_settings_premium_features_footer',
		'section'     => 'bakery_elementor_footer_section',
		'priority'    => 50,
		'default'     => '<h3 style="color: #2271b1; padding:5px 20px 5px 20px; background:#fff; margin:0;  box-shadow: 0 2px 4px rgba(0,0,0, .2); ">' . esc_html__( 'Elevate your footer with premium features:', 'bakery-elementor' ) . '</h3><ul style="color: #121212; padding: 5px 20px 20px 30px; background:#fff; margin:0;" ><li style="list-style-type: square;" >' . esc_html__( 'Tailor your footer layout', 'bakery-elementor' ) . '</li><li style="list-style-type: square;" >'.esc_html__( 'Integrate an email subscription form', 'bakery-elementor' ) .'</li><li style="list-style-type: square;" >'.esc_html__( 'Personalize social media icons', 'bakery-elementor' ) .'</li><li style="list-style-type: square;" >'.esc_html__( '....and Much More', 'bakery-elementor' ) . '</li></ul><div style="background: #fff; padding: 0px 10px 10px 20px;"><a href="' . esc_url( __( 'https://www.wpelemento.com/products/bakery-wordpress-theme', 'bakery-elementor' ) ) . '" class="button button-primary" target="_blank">'. esc_html__( 'Upgrade for more', 'bakery-elementor' ) .'</a></div>',
	) );

	// Footer Social Icons Section

	Kirki::add_section( 'bakery_elementor_footer_social_media_section', array(
		'title'          => esc_html__( 'Footer Social Icons', 'bakery-elementor' ),
		'panel'    => 'bakery_elementor_theme_options_panel',
		'priority'       => 160,
	) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_footer_social_icon_hide_heading',
		'section'     => 'bakery_elementor_footer_social_media_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable or Disable your Footer Social Icon', 'bakery-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'bakery_elementor_footer_social_icon_hide',
		'label'       => esc_html__( 'Enable or Disable Social Icon.', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_footer_social_media_section',
		'default'     => false,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'bakery_elementor_enable_footer_socail_link_align_heading',
		'section'     => 'bakery_elementor_footer_social_media_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Social Media Text Align', 'bakery-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'bakery_elementor_enable_footer_socail_link_align',
		'type'        => 'select',
		'priority'    => 10,
		'label'       => __( 'Text Align', 'bakery-elementor' ),
		'section'     => 'bakery_elementor_footer_social_media_section',
		'default'     => 'left',
		'choices'     => [
			'center' => esc_html__( 'center', 'bakery-elementor' ),
			'right' => esc_html__( 'right', 'bakery-elementor' ),
			'left' => esc_html__( 'left', 'bakery-elementor' ),
		],
		'output' => array(
			array(
				'element'  => array( '.footer-links'),
				'property' => 'text-align',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'priority'    => 10,
		'settings'    => 'bakery_elementor_enable_footer_socail_link',
		'section'     => 'bakery_elementor_footer_social_media_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Social Media Link', 'bakery-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'priority'    => 10,
		'section'     => 'bakery_elementor_footer_social_media_section',
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Footer Social Icons', 'bakery-elementor' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'bakery-elementor' ),
		'settings'     => 'bakery_elementor_social_links_settings_footer',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'bakery-elementor' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'bakery-elementor' ). ' <a href="https://fontawesome.com/search?o=r&m=free&f=brands" target="_blank"><strong>' . esc_html__( 'View All', 'bakery-elementor' ) . ' </strong></a>',
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'bakery-elementor' ),
				'description' => esc_html__( 'Add the social icon url here.', 'bakery-elementor' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 20
		],
	] );

	load_template( trailingslashit( get_template_directory() ) . '/includes/logo/logo-resizer.php' );
}
