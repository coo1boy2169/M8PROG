<?php
//about theme info
add_action( 'admin_menu', 'bakery_elementor_gettingstarted' );
function bakery_elementor_gettingstarted() {
	add_theme_page( esc_html__('Bakery Elementor', 'bakery-elementor'), esc_html__('Bakery Elementor', 'bakery-elementor'), 'edit_theme_options', 'bakery_elementor_about', 'bakery_elementor_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function bakery_elementor_admin_theme_style() {
	wp_enqueue_style('bakery-elementor-custom-admin-style', esc_url(get_template_directory_uri()) . '/includes/getstart/getstart.css');
	wp_enqueue_script('bakery-elementor-tabs', esc_url(get_template_directory_uri()) . '/includes/getstart/js/tab.js');
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
}
add_action('admin_enqueue_scripts', 'bakery_elementor_admin_theme_style');

// Changelog
if ( ! defined( 'BAKERY_ELEMENTOR_CHANGELOG_URL' ) ) {
    define( 'BAKERY_ELEMENTOR_CHANGELOG_URL', get_template_directory() . '/readme.txt' );
}

function bakery_elementor_changelog_screen() {	
	global $wp_filesystem;
	$bakery_elementor_changelog_file = apply_filters( 'bakery_elementor_changelog_file', BAKERY_ELEMENTOR_CHANGELOG_URL );
	if ( $bakery_elementor_changelog_file && is_readable( $bakery_elementor_changelog_file ) ) {
		WP_Filesystem();
		$bakery_elementor_changelog = $wp_filesystem->get_contents( $bakery_elementor_changelog_file );
		$bakery_elementor_changelog_list = bakery_elementor_parse_changelog( $bakery_elementor_changelog );
		echo wp_kses_post( $bakery_elementor_changelog_list );
	}
}

function bakery_elementor_parse_changelog( $bakery_elementor_content ) {
	$bakery_elementor_content = explode ( '== ', $bakery_elementor_content );
	$bakery_elementor_changelog_isolated = '';
	foreach ( $bakery_elementor_content as $key => $bakery_elementor_value ) {
		if (strpos( $bakery_elementor_value, 'Changelog ==') === 0) {
	    	$bakery_elementor_changelog_isolated = str_replace( 'Changelog ==', '', $bakery_elementor_value );
	    }
	}
	$bakery_elementor_changelog_array = explode( '= ', $bakery_elementor_changelog_isolated );
	unset( $bakery_elementor_changelog_array[0] );
	$bakery_elementor_changelog = '<div class="changelog">';
	foreach ( $bakery_elementor_changelog_array as $bakery_elementor_value) {
		$bakery_elementor_value = preg_replace( '/\n+/', '</span><span>', $bakery_elementor_value );
		$bakery_elementor_value = '<div class="block"><span class="heading">= ' . $bakery_elementor_value . '</span></div><hr>';
		$bakery_elementor_changelog .= str_replace( '<span></span>', '', $bakery_elementor_value );
	}
	$bakery_elementor_changelog .= '</div>';
	return wp_kses_post( $bakery_elementor_changelog );
}

//guidline for about theme
function bakery_elementor_mostrar_guide() { 
	//custom function about theme customizer
	$bakery_elementor_return = add_query_arg( array()) ;
	$bakery_elementor_theme = wp_get_theme( 'bakery-elementor' );
?>

    <div class="top-head">
		<div class="top-title">
			<h2><?php esc_html_e( 'Bakery Elementor', 'bakery-elementor' ); ?></h2>
		</div>
		<div class="top-right">
			<span class="version"><?php esc_html_e( 'Version', 'bakery-elementor' ); ?>: <?php echo esc_html($bakery_elementor_theme['Version']);?></span>
		</div>
    </div>

    <div class="inner-cont">
	    <div class="tab-sec">
	    	<div class="tab">
				<button class="tablinks" onclick="bakery_elementor_open_tab(event, 'wpelemento_importer_editor')"><?php esc_html_e( 'Setup With Elementor', 'bakery-elementor' ); ?></button>
				<button class="tablinks" onclick="bakery_elementor_open_tab(event, 'setup_customizer')"><?php esc_html_e( 'Setup With Customizer', 'bakery-elementor' ); ?></button>
				<button class="tablinks" onclick="bakery_elementor_open_tab(event, 'changelog_cont')"><?php esc_html_e( 'Changelog', 'bakery-elementor' ); ?></button>
			</div>

			<div id="wpelemento_importer_editor" class="tabcontent open">
				<?php if(!class_exists('WPElemento_Importer_ThemeWhizzie')){
					$bakery_elementor_plugin_ins = Bakery_Elementor_Plugin_Activation_WPElemento_Importer::get_instance();
					$bakery_elementor_actions = $bakery_elementor_plugin_ins->bakery_elementor_recommended_actions;
					?>
					<div class="bakery-elementor-recommended-plugins ">
						<div class="bakery-elementor-action-list">
							<?php if ($bakery_elementor_actions): foreach ($bakery_elementor_actions as $bakery_elementor_key => $bakery_elementor_actionValue): ?>
									<div class="bakery-elementor-action" id="<?php echo esc_attr($bakery_elementor_actionValue['id']);?>">
										<div class="action-inner plugin-activation-redirect">
											<h3 class="action-title"><?php echo esc_html($bakery_elementor_actionValue['title']); ?></h3>
											<div class="action-desc"><?php echo esc_html($bakery_elementor_actionValue['desc']); ?></div>
											<?php echo wp_kses_post($bakery_elementor_actionValue['link']); ?>
										</div>
									</div>
								<?php endforeach;
							endif; ?>
						</div>
					</div>
				<?php }else{ ?>
					<div class="tab-outer-box">
						<h3><?php esc_html_e('Welcome to WPElemento Theme!', 'bakery-elementor'); ?></h3>
						<p><?php esc_html_e('Click on the quick start button to import the demo.', 'bakery-elementor'); ?></p>
						<div class="info-link">
							<a  href="<?php echo esc_url( admin_url('admin.php?page=wpelementoimporter-wizard') ); ?>"><?php esc_html_e('Quick Start', 'bakery-elementor'); ?></a>
						</div>
					</div>
				<?php } ?>
			</div>

			<div id="setup_customizer" class="tabcontent">
				<div class="tab-outer-box">
				  	<div class="lite-theme-inner">
						<h3><?php esc_html_e('Theme Customizer', 'bakery-elementor'); ?></h3>
						<p><?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'bakery-elementor'); ?></p>
						<div class="info-link">
							<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'bakery-elementor'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Help Docs', 'bakery-elementor'); ?></h3>
						<p><?php esc_html_e('The complete procedure to configure and manage a WordPress Website from the beginning is shown in this documentation .', 'bakery-elementor'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( BAKERY_ELEMENTOR_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'bakery-elementor'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Need Support?', 'bakery-elementor'); ?></h3>
						<p><?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'bakery-elementor'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( BAKERY_ELEMENTOR_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'bakery-elementor'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Reviews & Testimonials', 'bakery-elementor'); ?></h3>
						<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'bakery-elementor'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( BAKERY_ELEMENTOR_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'bakery-elementor'); ?></a>
						</div>
						<hr>
						<div class="link-customizer">
							<h3><?php esc_html_e( 'Link to customizer', 'bakery-elementor' ); ?></h3>
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','bakery-elementor'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','bakery-elementor'); ?></a>
									</div>
								</div>
							
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=header_image') ); ?>" target="_blank"><?php esc_html_e('Header Image','bakery-elementor'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','bakery-elementor'); ?></a>
									</div>
								</div>
							</div>
						</div>
				  	</div>
				</div>
			</div>

			<div id="changelog_cont" class="tabcontent">
				<div class="tab-outer-box">
					<?php bakery_elementor_changelog_screen(); ?>
				</div>
			</div>			
		</div>

		<div class="inner-side-content">
			<h2><?php esc_html_e('Premium Theme', 'bakery-elementor'); ?></h2>
			<div class="tab-outer-box">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
				<h3><?php esc_html_e('Bakery Elementor WordPress Theme', 'bakery-elementor'); ?></h3>
				<div class="iner-sidebar-pro-btn">
					<span class="premium-btn"><a href="<?php echo esc_url( BAKERY_ELEMENTOR_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Premium', 'bakery-elementor'); ?></a>
					</span>
					<span class="demo-btn"><a href="<?php echo esc_url( BAKERY_ELEMENTOR_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'bakery-elementor'); ?></a>
					</span>
					<span class="doc-btn"><a href="<?php echo esc_url( BAKERY_ELEMENTOR_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e('Theme Bundle', 'bakery-elementor'); ?></a>
					</span>
				</div>
				<hr>
				<div class="premium-coupon">
					<div class="premium-features">
						<h3><?php esc_html_e('premium Features', 'bakery-elementor'); ?></h3>
						<ul>
							<li><?php esc_html_e( 'Multilingual', 'bakery-elementor' ); ?></li>
							<li><?php esc_html_e( 'Drag and drop features', 'bakery-elementor' ); ?></li>
							<li><?php esc_html_e( 'Zero Coding Required', 'bakery-elementor' ); ?></li>
							<li><?php esc_html_e( 'Mobile Friendly Layout', 'bakery-elementor' ); ?></li>
							<li><?php esc_html_e( 'Responsive Layout', 'bakery-elementor' ); ?></li>
							<li><?php esc_html_e( 'Unique Designs', 'bakery-elementor' ); ?></li>
						</ul>
					</div>
					<div class="coupon-box">
						<h3><?php esc_html_e('Use Coupon Code', 'bakery-elementor'); ?></h3>
						<a class="coupon-btn" href="<?php echo esc_url( BAKERY_ELEMENTOR_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('UPGRADE NOW', 'bakery-elementor'); ?></a>
						<div class="coupon-container">
							<h3><?php esc_html_e( 'elemento20', 'bakery-elementor' ); ?></h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } ?>