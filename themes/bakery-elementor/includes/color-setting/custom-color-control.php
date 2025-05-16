<?php

  $bakery_elementor_theme_custom_setting_css = '';

	// Global Color
	$bakery_elementor_theme_color = get_theme_mod('bakery_elementor_theme_color', '#DA2847');

	$bakery_elementor_theme_custom_setting_css .=':root {';
		$bakery_elementor_theme_custom_setting_css .='--primary-theme-color: '.esc_attr($bakery_elementor_theme_color ).'!important;';
	$bakery_elementor_theme_custom_setting_css .='}';

	// Scroll to top alignment
	$bakery_elementor_scroll_alignment = get_theme_mod('bakery_elementor_scroll_alignment', 'right');

	if($bakery_elementor_scroll_alignment == 'right'){
		$bakery_elementor_theme_custom_setting_css .='.scroll-up{';
			$bakery_elementor_theme_custom_setting_css .='right: 30px;!important;';
			$bakery_elementor_theme_custom_setting_css .='left: auto;!important;';
		$bakery_elementor_theme_custom_setting_css .='}';
	}else if($bakery_elementor_scroll_alignment == 'center'){
		$bakery_elementor_theme_custom_setting_css .='.scroll-up{';
			$bakery_elementor_theme_custom_setting_css .='left: calc(50% - 10px) !important;';
		$bakery_elementor_theme_custom_setting_css .='}';
	}else if($bakery_elementor_scroll_alignment == 'left'){
		$bakery_elementor_theme_custom_setting_css .='.scroll-up{';
			$bakery_elementor_theme_custom_setting_css .='left: 30px;!important;';
			$bakery_elementor_theme_custom_setting_css .='right: auto;!important;';
		$bakery_elementor_theme_custom_setting_css .='}';
	}

	// Related Product

	$bakery_elementor_show_related_product = get_theme_mod('bakery_elementor_show_related_product', true );

	if($bakery_elementor_show_related_product != true){
		$bakery_elementor_theme_custom_setting_css .='.related.products{';
			$bakery_elementor_theme_custom_setting_css .='display: none;';
		$bakery_elementor_theme_custom_setting_css .='}';
	}    