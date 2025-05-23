<?php

if ( class_exists("Kirki")){

if ( ! defined( 'FRESH_BAKERS_BUY_NOW' ) ) {
define('FRESH_BAKERS_BUY_NOW',__('https://www.misbahwp.com/products/bakery-wordpress-theme','fresh-bakers'));
}

	// LOGO

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'fresh_bakers_logo_resizer',
		'label'       => esc_html__( 'Adjust Your Logo Size ', 'fresh-bakers' ),
		'section'     => 'title_tagline',
		'default'     => 70,
		'choices'     => [
			'min'  => 10,
			'max'  => 300,
			'step' => 10,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fresh_bakers_enable_logo_text',
		'section'     => 'title_tagline',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'fresh-bakers' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'fresh_bakers_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'fresh-bakers' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'fresh-bakers' ),
			'off' => esc_html__( 'Disable', 'fresh-bakers' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'fresh_bakers_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'fresh-bakers' ),
		'section'     => 'title_tagline',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'fresh-bakers' ),
			'off' => esc_html__( 'Disable', 'fresh-bakers' ),
		],
	] );

	// FONT STYLE TYPOGRAPHY

	Kirki::add_panel( 'fresh_bakers_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Typography', 'fresh-bakers' ),
	) );

	Kirki::add_section( 'fresh_bakers_font_style_section', array(
		'title'      => esc_html__( 'Typography Option',  'fresh-bakers' ),
		'priority'   => 2,
		'capability' => 'edit_theme_options',
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'fresh-bakers' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( FRESH_BAKERS_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'fresh-bakers' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'fresh_bakers_font_style_section',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. More Font Family Options </p><p>3. Color Pallete Setup </p><p>4. Section Reordering Facility</p><p>5. For More Options kindly Go For Premium Version.</p>', 'fresh-bakers' ) . '</div>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fresh_bakers_all_headings_typography',
		'section'     => 'fresh_bakers_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading Of All Sections',  'fresh-bakers' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'fresh_bakers_all_headings_typography',
		'label'       => esc_html__( 'Heading Typography',  'fresh-bakers' ),
		'description' => esc_html__( 'Select the typography options for your heading.',  'fresh-bakers' ),
		'section'     => 'fresh_bakers_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'h1','h2','h3','h4','h5','h6', ),
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fresh_bakers_body_content_typography',
		'section'     => 'fresh_bakers_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Body Content',  'fresh-bakers' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'fresh_bakers_body_content_typography',
		'label'       => esc_html__( 'Content Typography',  'fresh-bakers' ),
		'description' => esc_html__( 'Select the typography options for your content.',  'fresh-bakers' ),
		'section'     => 'fresh_bakers_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'body', ),
			),
		),
	) );

	// PANEL
	Kirki::add_panel( 'fresh_bakers_panel_id_3', array(
	    'priority'    => 10,
	    'title'       => esc_html__( '404 Settings / No Result', 'fresh-bakers' ),
	) );

	// 404 SECTION
	Kirki::add_section( 'fresh_bakers_section_404', array(
		'panel'          => 'fresh_bakers_panel_id_3',
	    'title'          => esc_html__( '404 Settings', 'fresh-bakers' ),
	    'priority'       => 3,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'fresh-bakers' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( FRESH_BAKERS_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'fresh-bakers' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'fresh_bakers_section_404',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'fresh-bakers' ) . '</div>',
		'priority'    => 10,
	]);

	Kirki::add_field( 'theme_config_id', [
	    'type'        => 'custom',
	    'settings'    => 'fresh_bakers_404_heading',
	    'section'     => 'fresh_bakers_section_404',
	    'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Heading', 'fresh-bakers' ) . '</h3>',
	    'priority'    => 10,
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'fresh_bakers_404_page_title',
		'section'  => 'fresh_bakers_section_404',
		'default'  => esc_html__('404 Not Found', 'fresh-bakers'),
		'priority' => 10,
	] );

		Kirki::add_field( 'theme_config_id', [
	    'type'        => 'custom',
	    'settings'    => 'fresh_bakers_404_text',
	    'section'     => 'fresh_bakers_section_404',
	    'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Content', 'fresh-bakers' ) . '</h3>',
	    'priority'    => 10,
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'fresh_bakers_404_page_content',
		'section'  => 'fresh_bakers_section_404',
		'default'  => esc_html__('Sorry, no posts matched your criteria.', 'fresh-bakers'),
		'priority' => 10,
	] );

	// NO Result
	Kirki::add_section( 'fresh_bakers_no_result', array(
		'panel'          => 'fresh_bakers_panel_id_3',
	    'title'          => esc_html__( 'No Result Page Settings', 'fresh-bakers' ),
	    'priority'       => 3,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'fresh-bakers' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( FRESH_BAKERS_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'fresh-bakers' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'fresh_bakers_no_result',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'fresh-bakers' ) . '</div>',
		'priority'    => 10,
	]);

	Kirki::add_field( 'theme_config_id', [
	    'type'        => 'custom',
	    'settings'    => 'fresh_bakers_not_found_heading',
	    'section'     => 'fresh_bakers_no_result',
	    'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Search Result Heading', 'fresh-bakers' ) . '</h3>',
	    'priority'    => 10,
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'fresh_bakers_no_results_page_title',
		'section'  => 'fresh_bakers_no_result',
		'default'  => esc_html__('404 Not Found', 'fresh-bakers'),
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
	    'type'        => 'custom',
	    'settings'    => 'fresh_bakers_not_found_text',
	    'section'     => 'fresh_bakers_no_result',
	    'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Search Result Content', 'fresh-bakers' ) . '</h3>',
	    'priority'    => 10,
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'fresh_bakers_no_results_page_content',
		'section'  => 'fresh_bakers_no_result',
		'default'  => esc_html__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'fresh-bakers'),
		'priority' => 10,
	] );

	// PANEL

	Kirki::add_panel( 'fresh_bakers_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Options', 'fresh-bakers' ),
	) );

	// COLOR SECTION

	Kirki::add_section( 'fresh_bakers_section_color', array(
	    'title'          => esc_html__( 'Global Color', 'fresh-bakers' ),
	    'panel'          => 'fresh_bakers_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'fresh-bakers' ) . '</span>',
		'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( FRESH_BAKERS_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'fresh-bakers' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'fresh_bakers_section_color',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'fresh-bakers' ) . '</div>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fresh_bakers_global_colors',
		'section'     => 'fresh_bakers_section_color',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Here you can change your theme color on one click.', 'fresh-bakers' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'fresh_bakers_global_color',
		'label'       => __( 'choose your Appropriate Color', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_section_color',
		'default'     => '#F88C91',
	] );

	// Additional Settings

	Kirki::add_section( 'fresh_bakers_additional_settings', array(
	    'title'          => esc_html__( 'Additional Settings', 'fresh-bakers' ),
	    'panel'          => 'fresh_bakers_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'fresh-bakers' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( FRESH_BAKERS_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'fresh-bakers' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'fresh_bakers_additional_settings',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'fresh-bakers' ) . '</div>',
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fresh_bakers_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_additional_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	new \Kirki\Field\Radio_Buttonset(
	[
		'settings'    => 'fresh_bakers_scroll_top_position',
		'label'       => esc_html__( 'Alignment for Scroll To Top', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_additional_settings',
		'default'     => 'Right',
		'priority'    => 10,
		'choices'     => [
			'Left'   => esc_html__( 'Left', 'fresh-bakers' ),
			'Center' => esc_html__( 'Center', 'fresh-bakers' ),
			'Right'  => esc_html__( 'Right', 'fresh-bakers' ),
		],
	]
	);

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'dashicons',
		'settings' => 'fresh_bakers_scroll_top_icon',
		'label'    => esc_html__( 'Select Appropriate Scroll Top Icon', 'fresh-bakers' ),
		'section'  => 'fresh_bakers_additional_settings',
		'default'  => 'dashicons dashicons-arrow-up-alt',
		'priority' => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'menu_text_transform_fresh_bakers',
		'label'       => esc_html__( 'Menus Text Transform', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_additional_settings',
		'default'     => 'CAPITALISE',
		'placeholder' => esc_html__( 'Choose an option', 'fresh-bakers' ),
		'choices'     => [
			'CAPITALISE' => esc_html__( 'CAPITALISE', 'fresh-bakers' ),
			'UPPERCASE' => esc_html__( 'UPPERCASE', 'fresh-bakers' ),
			'LOWERCASE' => esc_html__( 'LOWERCASE', 'fresh-bakers' ),

		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'fresh_bakers_menu_zoom',
		'label'       => esc_html__( 'Menu Transition', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_additional_settings',
		'default' => 'Zoom Out',
		'placeholder' => esc_html__( 'Choose an option', 'fresh-bakers' ),
		'choices'     => [
			'Zoomout' => __('Zoom Out','fresh-bakers'),
            'Zoominn' => __('Zoom Inn','fresh-bakers'),
            
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'fresh_bakers_container_width',
		'label'       => esc_html__( 'Theme Container Width', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_additional_settings',
		'default'     => 100,
		'choices'     => [
			'min'  => 50,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fresh_bakers_site_loader',
		'label'       => esc_html__( 'Here you can enable or disable your Site Loader.', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_additional_settings',
		'default'     => false,
		'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'fresh_bakers_preloader_type',
		'label'       => esc_html__( 'Preloader Type', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_additional_settings',
		'default' => 'four-way-loader',
		'placeholder' => esc_html__( 'Choose an option', 'fresh-bakers' ),
		'choices'     => [
			'four-way-loader' => __('Type 1','fresh-bakers'),
            'cube-loader' => __('Type 2','fresh-bakers'),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fresh_bakers_sticky_header',
		'label'       => esc_html__( 'Here you can enable or disable your Sticky Header.', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_additional_settings',
		'default'     => false,
		'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'fresh_bakers_page_layout',
		'label'       => esc_html__( 'Page Layout Setting', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_additional_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'fresh-bakers' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','fresh-bakers'),
            'Right Sidebar' => __('Right Sidebar','fresh-bakers'),
            'One Column' => __('One Column','fresh-bakers')
		],
	] );

	if ( class_exists("woocommerce")){

	// Woocommerce Settings

	Kirki::add_section( 'fresh_bakers_woocommerce_settings', array(
		'title'          => esc_html__( 'Woocommerce Settings', 'fresh-bakers' ),
		'panel'          => 'fresh_bakers_panel_id',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'fresh-bakers' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( FRESH_BAKERS_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'fresh-bakers' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'fresh_bakers_woocommerce_settings',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'fresh-bakers' ) . '</div>',
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fresh_bakers_shop_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable shop page sidebar.', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fresh_bakers_product_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable product page sidebar.', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fresh_bakers_related_product_setting',
		'label'       => esc_html__( 'Here you can enable or disable your related products.', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_woocommerce_settings',
		'default'     => true,
		'priority'    => 10,
	] );

	new \Kirki\Field\Number(
		[
			'settings' => 'fresh_bakers_per_columns',
			'label'    => esc_html__( 'Product Per Row', 'fresh-bakers' ),
			'section'  => 'fresh_bakers_woocommerce_settings',
			'default'  => 3,
			'choices'  => [
				'min'  => 1,
				'max'  => 4,
				'step' => 1,
			],
		]
	);

	new \Kirki\Field\Number(
		[
			'settings' => 'fresh_bakers_product_per_page',
			'label'    => esc_html__( 'Product Per Page', 'fresh-bakers' ),
			'section'  => 'fresh_bakers_woocommerce_settings',
			'default'  => 9,
			'choices'  => [
				'min'  => 1,
				'max'  => 15,
				'step' => 1,
			],
		]
	);

	new \Kirki\Field\Number(
	[
		'settings' => 'custom_related_products_number_per_row',
		'label'    => esc_html__( 'Related Product Per Column', 'fresh-bakers' ),
		'section'  => 'fresh_bakers_woocommerce_settings',
		'default'  => 3,
		'choices'  => [
			'min'  => 1,
			'max'  => 4,
			'step' => 1,
		],
	]
	);

	new \Kirki\Field\Number(
	[
		'settings' => 'custom_related_products_number',
		'label'    => esc_html__( 'Related Product Per Page', 'fresh-bakers' ),
		'section'  => 'fresh_bakers_woocommerce_settings',
		'default'  => 3,
		'choices'  => [
			'min'  => 1,
			'max'  => 10,
			'step' => 1,
		],
	]
	);

	new \Kirki\Field\Select(
	[
		'settings'    => 'fresh_bakers_shop_page_layout',
		'label'       => esc_html__( 'Shop Page Layout Setting', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_woocommerce_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'fresh-bakers' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','fresh-bakers'),
            'Right Sidebar' => __('Right Sidebar','fresh-bakers')
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'fresh_bakers_product_page_layout',
		'label'       => esc_html__( 'Product Page Layout Setting', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_woocommerce_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'fresh-bakers' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','fresh-bakers'),
            'Right Sidebar' => __('Right Sidebar','fresh-bakers')
		],
	] );

	new \Kirki\Field\Radio_Buttonset( [
		'settings'    => 'fresh_bakers_woocommerce_pagination_position',
		'label'       => esc_html__( 'Woocommerce Pagination Alignment', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_woocommerce_settings',
		'default'     => 'Center',
		'priority'    => 10,
		'choices'     => [
			'Left'   => esc_html__( 'Left', 'fresh-bakers' ),
			'Center' => esc_html__( 'Center', 'fresh-bakers' ),
			'Right'  => esc_html__( 'Right', 'fresh-bakers' ),
		],
	]
	);

}

	// POST SECTION

	Kirki::add_section( 'fresh_bakers_section_post', array(
	    'title'          => esc_html__( 'Post Settings', 'fresh-bakers' ),
	    'panel'          => 'fresh_bakers_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'fresh-bakers' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( FRESH_BAKERS_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'fresh-bakers' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'fresh_bakers_section_post',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'fresh-bakers' ) . '</div>',
	]);

	new \Kirki\Field\Sortable(
	[
		'settings' => 'fresh_bakers_archive_element_sortable',
		'label'    => __( 'Archive Post Page Element Reordering', 'fresh-bakers' ),
		'description'    => esc_html__( 'This setting is not favorable with post format.', 'fresh-bakers' ),
		'section'  => 'fresh_bakers_section_post',
		'default'  => [ 'option1', 'option2', 'option3', 'option4', 'option5' ],
		'choices'  => [
			'option1' => esc_html__( 'Post Image', 'fresh-bakers' ),
			'option2' => esc_html__( 'Post Meta', 'fresh-bakers' ),
			'option3' => esc_html__( 'Post Title', 'fresh-bakers' ),
			'option4' => esc_html__( 'Post Content', 'fresh-bakers' ),
			'option5' => esc_html__( 'Post Categories', 'fresh-bakers' ),
		],
	]
	);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'fresh_bakers_post_excerpt_number',
		'label'       => esc_html__( 'Post Content Range', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_section_post',
		'default'     => 15,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fresh_bakers_pagination_setting',
		'label'       => esc_html__( 'Here you can enable or disable your Pagination.', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_section_post',
		'default'     => true,
		'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'fresh_bakers_archive_sidebar_layout',
		'label'       => esc_html__( 'Archive Post Sidebar Layout Setting', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'fresh-bakers' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','fresh-bakers'),
            'Right Sidebar' => __('Right Sidebar','fresh-bakers'),
            'Three Column' => __('Three Column','fresh-bakers'),
            'Four Column' => __('Four Column','fresh-bakers'),
            'Grid Layout Without Sidebar' => __('Grid Layout Without Sidebar','fresh-bakers'),
            'Grid Layout With Right Sidebar' => __('Grid Layout With Right Sidebar','fresh-bakers'),
            'Grid Layout With Left Sidebar' => __('Grid Layout With Left Sidebar','fresh-bakers')
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'fresh_bakers_single_post_sidebar_layout',
		'label'       => esc_html__( 'Single Post Sidebar Layout Setting', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'fresh-bakers' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','fresh-bakers'),
            'Right Sidebar' => __('Right Sidebar','fresh-bakers'),
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'fresh_bakers_search_sidebar_layout',
		'label'       => esc_html__( 'Search Page Sidebar Layout Setting', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'fresh-bakers' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','fresh-bakers'),
            'Right Sidebar' => __('Right Sidebar','fresh-bakers'),
            'Three Column' => __('Three Column','fresh-bakers'),
            'Four Column' => __('Four Column','fresh-bakers'),
            'Grid Layout Without Sidebar' => __('Grid Layout Without Sidebar','fresh-bakers'),
            'Grid Layout With Right Sidebar' => __('Grid Layout With Right Sidebar','fresh-bakers'),
            'Grid Layout With Left Sidebar' => __('Grid Layout With Left Sidebar','fresh-bakers')
		],
	] );

	// Breadcrumb
	Kirki::add_section( 'fresh_bakers_bradcrumb', array(
	    'title'          => esc_html__( 'Breadcrumb Settings', 'fresh-bakers' ),
	    'panel'          => 'fresh_bakers_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'fresh-bakers' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( FRESH_BAKERS_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'fresh-bakers' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'fresh_bakers_bradcrumb',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'fresh-bakers' ) . '</div>',
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fresh_bakers_enable_breadcrumb_heading',
		'section'     => 'fresh_bakers_bradcrumb',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Single Page Breadcrumb', 'fresh-bakers' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'fresh_bakers_breadcrumb_enable',
		'label'       => esc_html__( 'Breadcrumb Enable / Disable', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_bradcrumb',
		'default'     => true,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'fresh-bakers' ),
			'off' => esc_html__( 'Disable', 'fresh-bakers' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'default'     => '/',
        'settings' => 'fresh_bakers_breadcrumb_separator' ,
        'label'    => esc_html__( 'Breadcrumb Separator',  'fresh-bakers' ),
        'section'  => 'fresh_bakers_bradcrumb',
    ] );

	// HEADER SECTION

	Kirki::add_section( 'fresh_bakers_header_section', array(
        'title'          => esc_html__( 'Header Settings', 'fresh-bakers' ),
        'panel'          => 'fresh_bakers_panel_id',
        'priority'       => 160,
    ) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'fresh-bakers' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( FRESH_BAKERS_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'fresh-bakers' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'fresh_bakers_header_section',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'fresh-bakers' ) . '</div>',
	]);

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fresh_bakers_header_inner_text_heading',
		'section'     => 'fresh_bakers_header_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Text',  'fresh-bakers' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'settings' => 'fresh_bakers_header_inner_text' ,
        'section'  => 'fresh_bakers_header_section',
    ] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fresh_bakers_phone_number_heading',
		'section'     => 'fresh_bakers_header_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Phone Number',  'fresh-bakers' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'settings' => 'fresh_bakers_phone_number' ,
        'section'  => 'fresh_bakers_header_section',
    ] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fresh_bakers_email_address_heading',
		'section'     => 'fresh_bakers_header_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Email Address',  'fresh-bakers' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'settings' => 'fresh_bakers_email_id' ,
        'section'  => 'fresh_bakers_header_section',
    ] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fresh_bakers_address_heading',
		'section'     => 'fresh_bakers_header_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Location',  'fresh-bakers' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'settings' => 'fresh_bakers_location' ,
        'section'  => 'fresh_bakers_header_section',
    ] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fresh_bakers_header_button_heading',
		'section'     => 'fresh_bakers_header_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Button',  'fresh-bakers' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
	  	'label'    => esc_html__( 'Text',  'fresh-bakers' ),
        'type'     => 'text',
        'settings' => 'fresh_bakers_header_btn' ,
        'section'  => 'fresh_bakers_header_section',
    ] );

	Kirki::add_field( 'theme_config_id', [
	  	'label'    => esc_html__( 'URL',  'fresh-bakers' ),
        'type'     => 'url',
        'settings' => 'fresh_bakers_header_btn_link' ,
        'section'  => 'fresh_bakers_header_section',
    ] );

	// SLIDER SECTION

	Kirki::add_section( 'fresh_bakers_blog_slide_section', array(
        'title'          => esc_html__( ' Slider Settings', 'fresh-bakers' ),
        'panel'          => 'fresh_bakers_panel_id',
        'priority'       => 160,
    ) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'fresh-bakers' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( FRESH_BAKERS_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'fresh-bakers' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'fresh_bakers_blog_slide_section',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'fresh-bakers' ) . '</div>',
	]);

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fresh_bakers_enable_heading',
		'section'     => 'fresh_bakers_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Slider', 'fresh-bakers' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'fresh_bakers_blog_box_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_blog_slide_section',
		'default'     => true,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'fresh-bakers' ),
			'off' => esc_html__( 'Disable', 'fresh-bakers' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fresh_bakers_slider_heading',
		'section'     => 'fresh_bakers_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slider', 'fresh-bakers' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'fresh_bakers_blog_slide_number',
		'label'       => esc_html__( 'Number of slides to show', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_blog_slide_section',
		'default'     => 0,
		'description' => esc_html__( 'After selecting no of slides publish them. Now you need to refresh the site After refreshing you will see further settings', 'fresh-bakers' ),
		'choices'     => [
			'min'  => 0,
			'max'  => 3,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'fresh_bakers_blog_slide_category',
		'label'       => esc_html__( 'Select the category to show slider ( Image Dimension 1600 x 600 )', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_blog_slide_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'fresh-bakers' ),
		'priority'    => 10,
		'choices'     => fresh_bakers_get_categories_select(),
	] );

	$count = get_theme_mod('fresh_bakers_blog_slide_number');

	for ($i=1; $i <= (int)$count; $i++) {

		Kirki::add_field( 'theme_config_id', [
			'type'        => 'custom',
			'settings'    => 'fresh_bakers_slider_enable_heading'.$i,
			'section'     => 'fresh_bakers_blog_slide_section',
				'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slide Content ', 'fresh-bakers' ).$i . '</h3>',
		] );

		Kirki::add_field( 'theme_config_id', [
			'type'        => 'custom',
			'settings'    => 'fresh_bakers_slider_text_heading'.$i,
			'section'     => 'fresh_bakers_blog_slide_section',
			'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Short Text', 'fresh-bakers' ).$i . '</h3>',
		] );

		Kirki::add_field( 'theme_config_id', [
			'type'     => 'text',
			'settings' => 'fresh_bakers_custmom_text'.$i,
			'section'  => 'fresh_bakers_blog_slide_section',
	    ] );

	    Kirki::add_field( 'theme_config_id', [
			'type'        => 'custom',
			'settings'    => 'fresh_bakers_slider_week_time_heading'.$i,
			'section'     => 'fresh_bakers_blog_slide_section',
			'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Week Days Timing', 'fresh-bakers' ).$i . '</h3>',
		] );

		Kirki::add_field( 'theme_config_id', [
			'type'     => 'text',
			'settings' => 'fresh_bakers_slider_date_time_1'.$i,
			'section'  => 'fresh_bakers_blog_slide_section',
	    ] );

	    Kirki::add_field( 'theme_config_id', [
			'type'        => 'custom',
			'settings'    => 'fresh_bakers_slider_week_time_i_heading'.$i,
			'section'     => 'fresh_bakers_blog_slide_section',
			'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'WeekEnds Timing', 'fresh-bakers' ).$i . '</h3>',
		] );

		Kirki::add_field( 'theme_config_id', [
			'type'     => 'text',
			'settings' => 'fresh_bakers_slider_date_time_2'.$i,
			'section'  => 'fresh_bakers_blog_slide_section',
	    ] );

	}

	//Services SECTION

	Kirki::add_section( 'fresh_bakers_testimonial_section', array(
	    'title'          => esc_html__( 'Services Settings', 'fresh-bakers' ),
	    'panel'          => 'fresh_bakers_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'fresh-bakers' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( FRESH_BAKERS_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'fresh-bakers' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'fresh_bakers_testimonial_section',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'fresh-bakers' ) . '</div>',
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fresh_bakers_enable_heading',
		'section'     => 'fresh_bakers_testimonial_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Services',  'fresh-bakers' ) . '</h3>',
		'priority'    => 1,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'fresh_bakers_testimonial_section_enable',
		'section'     => 'fresh_bakers_testimonial_section',
		'default'     => true,
		'priority'    => 2,
		'choices'     => [
			'on'  => esc_html__( 'Enable',  'fresh-bakers' ),
			'off' => esc_html__( 'Disable',  'fresh-bakers' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fresh_bakers_number_heading',
		'section'     => 'fresh_bakers_testimonial_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Number of Services post to show','fresh-bakers' ) . '</h3>',
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'fresh_bakers_testimonial_number',
		'section'     => 'fresh_bakers_testimonial_section',
		'default'     => 0,
		'choices'     => [
			'min'  => 1,
			'max'  => 8,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fresh_bakers_category_heading',
		'section'     => 'fresh_bakers_testimonial_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Select the category to show Services',  'fresh-bakers' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'fresh_bakers_testimonial_category',
		'section'     => 'fresh_bakers_testimonial_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'fresh-bakers' ),
		'priority'    => 10,
		'choices'     => fresh_bakers_get_categories_select(),
	] );

	// FOOTER SECTION

	Kirki::add_section( 'fresh_bakers_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'fresh-bakers' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'fresh-bakers' ),
        'panel'          => 'fresh_bakers_panel_id',
        'priority'       => 160,
    ) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'fresh-bakers' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( FRESH_BAKERS_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'fresh-bakers' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'fresh_bakers_footer_section',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'fresh-bakers' ) . '</div>',
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fresh_bakers_footer_enable_heading',
		'section'     => 'fresh_bakers_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'fresh-bakers' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'fresh_bakers_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'fresh-bakers' ),
			'off' => esc_html__( 'Disable', 'fresh-bakers' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fresh_bakers_footer_text_heading',
		'section'     => 'fresh_bakers_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'fresh-bakers' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'fresh_bakers_footer_text',
		'section'  => 'fresh_bakers_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
	'type'        => 'custom',
	'settings'    => 'fresh_bakers_footer_text_heading_2',
	'section'     => 'fresh_bakers_footer_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Alignment', 'fresh-bakers' ) . '</h3>',
	'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'fresh_bakers_copyright_text_alignment',
		'label'       => esc_html__( 'Copyright text Alignment', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_footer_section',
		'default'     => 'LEFT-ALIGN',
		'placeholder' => esc_html__( 'Choose an option', 'fresh-bakers' ),
		'choices'     => [
			'LEFT-ALIGN' => esc_html__( 'LEFT-ALIGN', 'fresh-bakers' ),
			'CENTER-ALIGN' => esc_html__( 'CENTER-ALIGN', 'fresh-bakers' ),
			'RIGHT-ALIGN' => esc_html__( 'RIGHT-ALIGN', 'fresh-bakers' ),

		],
	] );

	Kirki::add_field( 'theme_config_id', [
	'type'        => 'custom',
	'settings'    => 'fresh_bakers_footer_text_heading_1',
	'section'     => 'fresh_bakers_footer_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Background Color', 'fresh-bakers' ) . '</h3>',
	'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'fresh_bakers_copyright_bg',
		'label'       => __( 'Choose Your Copyright Background Color', 'fresh-bakers' ),
		'section'     => 'fresh_bakers_footer_section',
		'default'     => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fresh_bakers_enable_footer_socail_link',
		'section'     => 'fresh_bakers_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Social Media Link', 'fresh-bakers' ) . '</h3>',
		'priority'    => 11,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'section'     => 'fresh_bakers_footer_section',
		'priority'    => 11,
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Footer Social Icons', 'fresh-bakers' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'fresh-bakers' ),
		'settings'     => 'fresh_bakers_footer_social_links_settings',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'fresh-bakers' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'fresh-bakers' ),
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'fresh-bakers' ),
				'description' => esc_html__( 'Add the social icon url here.', 'fresh-bakers' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 5
		],
	] );
}

/*
 *  Customizer Notifications
 */

$fresh_bakers_config_customizer = array(
    'recommended_plugins' => array( 
        'kirki' => array(
            'recommended' => true,
            'description' => sprintf( 
                /* translators: %s: plugin name */
                esc_html__( 'If you want to show all the sections of the FrontPage, please install and activate %s plugin', 'fresh-bakers' ), 
                '<strong>' . esc_html__( 'Kirki Customizer', 'fresh-bakers' ) . '</strong>'
            ),
        ),
    ),
    'fresh_bakers_recommended_actions'       => array(),
    'fresh_bakers_recommended_actions_title' => esc_html__( 'Recommended Actions', 'fresh-bakers' ),
    'fresh_bakers_recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'fresh-bakers' ),
    'fresh_bakers_install_button_label'      => esc_html__( 'Install and Activate', 'fresh-bakers' ),
    'fresh_bakers_activate_button_label'     => esc_html__( 'Activate', 'fresh-bakers' ),
    'fresh_bakers_deactivate_button_label'   => esc_html__( 'Deactivate', 'fresh-bakers' ),
);

Fresh_Bakers_Customizer_Notify::init( apply_filters( 'fresh_bakers_customizer_notify_array', $fresh_bakers_config_customizer ) );