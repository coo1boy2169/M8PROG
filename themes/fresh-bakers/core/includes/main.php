<?php

/**
* Get started notice
*/

add_action( 'wp_ajax_fresh_bakers_dismissed_notice_handler', 'fresh_bakers_ajax_notice_handler' );

/**
 * AJAX handler to store the state of dismissible notices.
 */
function fresh_bakers_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        // Pick up the notice "type" - passed via jQuery (the "data-notice" attribute on the notice)
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        // Store it in the options table
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function fresh_bakers_deprecated_hook_admin_notice() {
    if ( ! get_option('dismissed-get_started', FALSE ) ) { ?>
        <?php
        require_once get_template_directory() .'/core/includes/demo-import.php';
        $current_screen = get_current_screen();
			if ($current_screen->id !== 'appearance_page_fresh-bakers-guide-page') {
         $fresh_bakers_comments_theme = wp_get_theme(); ?>
		<div class="demo-importer-loader">
			<div class="loader-setup-wizard">
				<h2><?php echo esc_html('Importing...','fresh-bakers'); ?></h2>
			</div> 
		</div>
        <div class="fresh-bakers-notice-wrapper updated notice notice-get-started-class is-dismissible" data-notice="get_started">
		<div class="fresh-bakers-notice">
			<div class="fresh-bakers-notice-img">
				<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/admin-logo.png'); ?>" alt="<?php esc_attr_e('logo', 'fresh-bakers'); ?>">
			</div>
			<div class="fresh-bakers-notice-content">
				<div class="fresh-bakers-notice-heading"><?php esc_html_e('Thanks for installing ','fresh-bakers'); ?><?php echo esc_html( $fresh_bakers_comments_theme ); ?> <?php esc_html_e('Theme','fresh-bakers'); ?></div>
				<div class="diplay-flex-btn">
					<a class="button button-primary" href="<?php echo esc_url(admin_url('themes.php?page=fresh-bakers-guide-page')); ?>"><?php echo esc_html('More Option','fresh-bakers'); ?></a>
					<?php if(isset($_GET['import-demo']) && $_GET['import-demo'] == true){ ?>
			    		<a class="button button-success" href="<?php echo esc_url(home_url()); ?>" target="_blank"><?php echo esc_html('Go to Homepage','fresh-bakers'); ?></a> <span class="imp-success"><?php echo esc_html('Imported Successfully','fresh-bakers'); ?></span>
			    	<?php } else { ?>
					<form id="demo-importer-form" action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php" method="POST">
			        	<input  type="submit" name="submit" value="<?php esc_attr_e('Demo Import','fresh-bakers'); ?>" class="button button-primary">
			    	</form>
			    	<?php } ?>
				</div>
			</div>
		</div>
	</div>
    <?php }
	}
}

add_action( 'admin_notices', 'fresh_bakers_deprecated_hook_admin_notice' );

function fresh_bakers_admin_enqueue_scripts() {
	wp_enqueue_style( 'fresh-bakers-admin-style', esc_url( get_template_directory_uri() ).'/css/main.css' );
	wp_enqueue_script( 'fresh-bakers-admin-script', get_template_directory_uri() . '/js/fresh-bakers-admin-script.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'fresh-bakers-demo-script', get_template_directory_uri() . '/js/demo-script.js', array( 'jquery' ), '', true );
	wp_localize_script( 'fresh-bakers-demo-script', 'fresh_bakers_demo_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'fresh_bakers_admin_enqueue_scripts' );

add_action( 'admin_menu', 'fresh_bakers_getting_started' );
function fresh_bakers_getting_started() {
	add_theme_page( esc_html__('Get Started', 'fresh-bakers'), esc_html__('Get Started', 'fresh-bakers'), 'edit_theme_options', 'fresh-bakers-guide-page', 'fresh_bakers_test_guide');
}

if ( ! defined( 'FRESH_BAKERS_DOCS_FREE' ) ) {
define('FRESH_BAKERS_DOCS_FREE',__('https://demo.misbahwp.com/docs/fresh-bread-bakers-free-docs/','fresh-bakers'));
}
if ( ! defined( 'FRESH_BAKERS_DOCS_PRO' ) ) {
define('FRESH_BAKERS_DOCS_PRO',__('https://demo.misbahwp.com/docs/fresh-bread-bakers-pro-docs/','fresh-bakers'));
}
if ( ! defined( 'FRESH_BAKERS_BUY_NOW' ) ) {
define('FRESH_BAKERS_BUY_NOW',__('https://www.misbahwp.com/products/bakery-wordpress-theme','fresh-bakers'));
}
if ( ! defined( 'FRESH_BAKERS_SUPPORT_FREE' ) ) {
define('FRESH_BAKERS_SUPPORT_FREE',__('https://wordpress.org/support/theme/fresh-bakers','fresh-bakers'));
}
if ( ! defined( 'FRESH_BAKERS_REVIEW_FREE' ) ) {
define('FRESH_BAKERS_REVIEW_FREE',__('https://wordpress.org/support/theme/fresh-bakers/reviews/#new-post','fresh-bakers'));
}
if ( ! defined( 'FRESH_BAKERS_DEMO_PRO' ) ) {
define('FRESH_BAKERS_DEMO_PRO',__('https://demo.misbahwp.com/fresh-bread-bakers/','fresh-bakers'));
}
if( ! defined( 'FRESH_BAKERS_THEME_BUNDLE' ) ) {
define('FRESH_BAKERS_THEME_BUNDLE',__('https://www.misbahwp.com/products/wordpress-bundle','fresh-bakers'));
}

function fresh_bakers_test_guide() { ?>
	<?php $fresh_bakers_theme = wp_get_theme();
	require_once get_template_directory() .'/core/includes/demo-import.php'; ?>

	<div class="wrap" id="main-page">
		<div id="lefty">
			<div id="admin_links">
				<a href="<?php echo esc_url( FRESH_BAKERS_DOCS_FREE ); ?>" target="_blank" class="blue-button-1"><?php esc_html_e( 'Documentation', 'fresh-bakers' ) ?></a>
				<a href="<?php echo esc_url( admin_url('customize.php') ); ?>" id="customizer" target="_blank"><?php esc_html_e( 'Customize', 'fresh-bakers' ); ?> </a>
				<a class="blue-button-1" href="<?php echo esc_url( FRESH_BAKERS_SUPPORT_FREE ); ?>" target="_blank" class="btn3"><?php esc_html_e( 'Support', 'fresh-bakers' ) ?></a>
				<a class="blue-button-2" href="<?php echo esc_url( FRESH_BAKERS_REVIEW_FREE ); ?>" target="_blank" class="btn4"><?php esc_html_e( 'Review', 'fresh-bakers' ) ?></a>
			</div>
			<div id="description">
				<h3><?php esc_html_e('Welcome! Thank you for choosing ','fresh-bakers'); ?><?php echo esc_html( $fresh_bakers_theme ); ?>  <span><?php esc_html_e('Version: ', 'fresh-bakers'); ?><?php echo esc_html($fresh_bakers_theme['Version']);?></span></h3>
				<div class="demo-import-box">
					<div class="demo-importer-loader">
						<div class="loader-setup-wizard">
							<h2><?php echo esc_html('Importing...','fresh-bakers'); ?></h2>
						</div> 
					</div>
					<h4><?php echo esc_html__('Import homepage demo in just one click.','fresh-bakers'); ?></h4>
					<p><?php echo esc_html__('Get started with the wordpress theme installation','fresh-bakers'); ?></p>
					<?php if(isset($_GET['import-demo']) && $_GET['import-demo'] == true){ ?>
			    		<span class="imp-success"><?php echo esc_html__('Imported Successfully','fresh-bakers'); ?></span>  <a class="button button-success" href="<?php echo esc_url(home_url()); ?>" target="_blank"><?php echo esc_html__('Go to Homepage','fresh-bakers'); ?></a>
			    	<?php } else { ?>
					<form id="demo-importer-form" action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.phps" method="POST">
			        	<input  type="submit" name="submit" value="<?php esc_attr_e('Demo Import','fresh-bakers'); ?>" class="button button-primary">
			    	</form>
			    	<?php } ?>
				</div>
				<img class="img_responsive" style="width: 100%;" src="<?php echo esc_url( $fresh_bakers_theme->get_screenshot() ); ?>" />
				<div id="description-insidee">
					<?php
						$fresh_bakers_theme = wp_get_theme();
						echo wp_kses_post( apply_filters( 'misbah_theme_description', esc_html( $fresh_bakers_theme->get( 'Description' ) ) ) );
					?>
				</div>
			</div>
		</div>

		<div id="righty">
			<div class="postboxx donate">
				<h3 class="hndle"><?php esc_html_e( 'Upgrade to Premium', 'fresh-bakers' ); ?></h3>
				<div class="insidee">
					<p><?php esc_html_e('Discover upgraded pro features with premium version click to upgrade.','fresh-bakers'); ?></p>
					<div id="admin_pro_links">
						<a class="blue-button-2" href="<?php echo esc_url( FRESH_BAKERS_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Go Pro', 'fresh-bakers' ); ?></a>
						<a class="blue-button-1" href="<?php echo esc_url( FRESH_BAKERS_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'fresh-bakers' ) ?></a>
						<a class="blue-button-2" href="<?php echo esc_url( FRESH_BAKERS_DOCS_PRO ); ?>" target="_blank"><?php esc_html_e( 'Pro Docs', 'fresh-bakers' ) ?></a>
					</div>
				</div>
				<h3 class="hndle bundle"><?php esc_html_e( 'Go For Theme Bundle', 'fresh-bakers' ); ?></h3>
				<div class="insidee theme-bundle">
					<p class="offer"><?php esc_html_e('Get 80+ Perfect WordPress Theme In A Single Package at just $89."','fresh-bakers'); ?></p>
					<p class="coupon"><?php esc_html_e('Get Our Theme Pack of 80+ WordPress Themes At 15% Off','fresh-bakers'); ?><span class="coupon-code"><?php esc_html_e('"Bundleup15"','fresh-bakers'); ?></span></p>
					<div id="admin_pro_linkss">
						<a class="blue-button-1" href="<?php echo esc_url( FRESH_BAKERS_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e( 'Theme Bundle', 'fresh-bakers' ) ?></a>
					</div>
				</div>
				<div class="d-table">
			    <ul class="d-column">
			      <li class="feature"><?php esc_html_e('Features','fresh-bakers'); ?></li>
			      <li class="free"><?php esc_html_e('Pro','fresh-bakers'); ?></li>
			      <li class="plus"><?php esc_html_e('Free','fresh-bakers'); ?></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('24hrs Priority Support','fresh-bakers'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('LearnPress Campatiblity','fresh-bakers'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Kirki Framework','fresh-bakers'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Posttype','fresh-bakers'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('One Click Demo Import','fresh-bakers'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Reordering','fresh-bakers'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Enable / Disable Option','fresh-bakers'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Multiple Sections','fresh-bakers'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Color Pallete','fresh-bakers'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Widgets','fresh-bakers'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Page Templates','fresh-bakers'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Typography','fresh-bakers'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Background Image / Color ','fresh-bakers'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
	  		</div>
			</div>
		</div>
	</div>
<?php } ?>