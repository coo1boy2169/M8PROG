<?php

/*-----------------------------------------------------------------------------------*/
/* Enqueue script and styles */
/*-----------------------------------------------------------------------------------*/

function fresh_bakers_enqueue_google_fonts() {

	require_once get_theme_file_path( 'core/includes/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'google-fonts-inter',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap' ),
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'google-fonts-libre-baskerville',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap' ),
		array(),
		'1.0'
	);
	
}
add_action( 'wp_enqueue_scripts', 'fresh_bakers_enqueue_google_fonts' );

if (!function_exists('fresh_bakers_enqueue_scripts')) {

	function fresh_bakers_enqueue_scripts() {

		wp_enqueue_style(
			'bootstrap-css',
			get_template_directory_uri() . '/css/bootstrap.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'fontawesome-css',
			get_template_directory_uri() . '/css/fontawesome-all.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'owl.carousel-css',
			get_template_directory_uri() . '/css/owl.carousel.css',
			array(),'2.3.4'
		);

		wp_enqueue_style('fresh-bakers-style', get_stylesheet_uri(), array() );

		wp_enqueue_style('dashicons');

		wp_style_add_data('fresh-bakers-style', 'rtl', 'replace');

		wp_enqueue_style(
			'fresh-bakers-media-css',
			get_template_directory_uri() . '/css/media.css',
			array(),'2.3.4'
		);

		wp_enqueue_style(
			'fresh-bakers-woocommerce-css',
			get_template_directory_uri() . '/css/woocommerce.css',
			array(),'2.3.4'
		);

		wp_enqueue_script(
			'fresh-bakers-navigation',
			get_template_directory_uri() . '/js/navigation.js',
			FALSE,
			'1.0',
			TRUE
		);

		wp_enqueue_script(
			'owl.carousel-js',
			get_template_directory_uri() . '/js/owl.carousel.js',
			array('jquery'),
			'2.3.4',
			TRUE
		);

		wp_enqueue_script(
			'fresh-bakers-script',
			get_template_directory_uri() . '/js/script.js',
			array('jquery'),
			'1.0',
			TRUE
		);

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

		$fresh_bakers_css = '';

		if ( get_header_image() ) :

			$fresh_bakers_css .=  '
				.header-outter, .page-template-frontpage .header-outter{
					background-image: url('.esc_url(get_header_image()).');
					-webkit-background-size: cover !important;
					-moz-background-size: cover !important;
					-o-background-size: cover !important;
					background-size: cover !important;
				}';

		endif;

		wp_add_inline_style( 'fresh-bakers-style', $fresh_bakers_css );

		// Theme Customize CSS.
		require get_template_directory(). '/core/includes/inline.php';
		wp_add_inline_style( 'fresh-bakers-style',$fresh_bakers_custom_css );

	}

	add_action( 'wp_enqueue_scripts', 'fresh_bakers_enqueue_scripts' );
}

/*-----------------------------------------------------------------------------------*/
/* Setup theme */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('fresh_bakers_after_setup_theme')) {

	function fresh_bakers_after_setup_theme() {

		load_theme_textdomain( 'fresh-bakers', get_stylesheet_directory() . '/languages' );
		if ( ! isset( $fresh_bakers_content_width ) ) $fresh_bakers_content_width = 900;

		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'fresh-bakers' ),
		));

		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'align-wide' );
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support( 'wp-block-styles' );
		add_theme_support('post-thumbnails');
		add_theme_support( 'custom-background', array(
		  'default-color' => 'ffffff'
		));

		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 70,
		) );

		add_theme_support( 'custom-header', array(
			'header-text' => false,
			'width' => 1920,
			'height' => 100
		));

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		add_editor_style( array( '/css/editor-style.css' ) );

		add_action( 'wp_ajax_ive-check-plugin-exists', 'check_plugin_exists' );
		add_action( 'wp_ajax_ive_install_and_activate_plugin', 'mep_install_and_activate_plugin' );
	}

	add_action( 'after_setup_theme', 'fresh_bakers_after_setup_theme', 999 );

}

function mep_install_and_activate_plugin() {

	$post_plugin_details = $_POST['plugin_details'];
	$plugin_text_domain = $post_plugin_details['plugin_text_domain'];
	$plugin_main_file		=	$post_plugin_details['plugin_main_file'];
	$plugin_url					=	$post_plugin_details['plugin_url'];

	$plugin = array(
		'text_domain'	=> $plugin_text_domain,
		'path' 				=> $plugin_url,
		'install' 		=> $plugin_text_domain . '/' . $plugin_main_file
	);

	wp_cache_flush();

	$plugin_path = plugin_basename( trim( $plugin['install'] ) );


	$activate_plugin = activate_plugin( $plugin_path );

	if($activate_plugin) {

		echo $activate_plugin;

	} else {
		echo $activate_plugin;
	}

	$msg = 'installed';

	$response = array( 'status' => true, 'msg' => $msg );
	wp_send_json( $response );
	exit;
}

function check_plugin_exists() {
		$plugin_text_domain = $_POST['plugin_text_domain'];
		$main_plugin_file 	= $_POST['main_plugin_file'];
		$plugin_path = $plugin_text_domain . '/' . $main_plugin_file;

		$get_plugins					= get_plugins();
		$is_plugin_installed	= false;
		$activation_status 		= false;
		if ( isset( $get_plugins[$plugin_path] ) ) {
		$is_plugin_installed = true;

		$activation_status = is_plugin_active( $plugin_path );
		}
		wp_send_json_success(
		array(
		'install_status'  =>	$is_plugin_installed,
			'active_status'		=>	$activation_status,
			'plugin_path'			=>	$plugin_path,
			'plugin_slug'			=>	$plugin_text_domain
		)
		);
}
function fresh_bakers_template_setup() {
require get_template_directory() .'/core/includes/customizer-notice/fresh-bakers-customizer-notify.php';
require get_template_directory() .'/core/includes/theme-breadcrumb.php';
require get_template_directory() .'/core/includes/tgm.php';
require get_template_directory() .'/core/includes/main.php';
require get_template_directory() . '/core/includes/customizer.php';
load_template( trailingslashit( get_template_directory() ) . '/core/includes/class-upgrade-pro.php' );
}
add_action('after_setup_theme', 'fresh_bakers_template_setup');

/*-----------------------------------------------------------------------------------*/
/* Enqueue theme logo style */
/*-----------------------------------------------------------------------------------*/
function fresh_bakers_logo_resizer() {

    $fresh_bakers_theme_logo_size_css = '';
    $fresh_bakers_logo_resizer = get_theme_mod('fresh_bakers_logo_resizer');

	$fresh_bakers_theme_logo_size_css = '
		.custom-logo{
			height: '.esc_attr($fresh_bakers_logo_resizer).'px !important;
			width: '.esc_attr($fresh_bakers_logo_resizer).'px !important;
		}
	';
    wp_add_inline_style( 'fresh-bakers-style',$fresh_bakers_theme_logo_size_css );

}
add_action( 'wp_enqueue_scripts', 'fresh_bakers_logo_resizer' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Global color style */
/*-----------------------------------------------------------------------------------*/
function fresh_bakers_global_color() {

    $fresh_bakers_theme_color_css = '';
    $fresh_bakers_global_color = get_theme_mod('fresh_bakers_global_color');
    $fresh_bakers_global_color_2 = get_theme_mod('fresh_bakers_global_color_2');
    $fresh_bakers_copyright_bg = get_theme_mod('fresh_bakers_copyright_bg');

	$fresh_bakers_theme_color_css = '
		.header-inner,.button-header a,#main-menu ul.children ,#main-menu ul.sub-menu,p.slider-button a,#trending button.active span,.wp-block-woocommerce-cart .wc-block-cart__submit-button, .wc-block-components-checkout-place-order-button, .wc-block-components-totals-coupon__button,.wp-block-woocommerce-cart .wc-block-components-product-badge,.scroll-up a,.triangle35b:nth-child(1),.triangle35b:nth-child(3),.pagination .nav-links a:hover,.pagination .nav-links a:focus,.pagination .nav-links span.current,.fresh-bakers-pagination span.current,.fresh-bakers-pagination span.current:hover,.fresh-bakers-pagination span.current:focus,.fresh-bakers-pagination a span:hover,.fresh-bakers-pagination a span:focus,.woocommerce nav.woocommerce-pagination ul li span.current,.comment-respond input#submit,.comment-reply a ,.sidebar-area h4.title, .sidebar-area h1.wp-block-heading,.sidebar-area h2.wp-block-heading,.sidebar-area h3.wp-block-heading,.sidebar-area h4.wp-block-heading,.sidebar-area h5.wp-block-heading,.sidebar-area h6.wp-block-heading,.sidebar-area .wp-block-search__label,.sidebar-area .tagcloud a,.searchform input[type=submit], .sidebar-area .wp-block-search__button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce a.added_to_cart,nav.woocommerce-MyAccount-navigation ul li{
		background: '.esc_attr($fresh_bakers_global_color).';
		}
		@media screen and (min-width: 320px) and (max-width: 767px) {
		    .menu-toggle, .dropdown-toggle,button.close-menu {
		        background: '.esc_attr($fresh_bakers_global_color).';
		    }
		}
		.searchform input[type=submit]:hover ,.searchform input[type=submit]:focus{
		background-color: '.esc_attr($fresh_bakers_global_color).';
		}
		a:hover,a:focus,.post-single a, .page-single a,.sidebar-area .textwidget a,.comment-content a,.woocommerce-product-details__short-description a,#tab-description a,.extra-home-content a,.post-single a, .page-single a,.sidebar-area .textwidget a,.comment-content a,.woocommerce-product-details__short-description a,#tab-description a,.extra-home-content a,.header-inner h6,#main-menu a:hover,#main-menu ul li a:hover,#main-menu li:hover > a,#main-menu a:focus,#main-menu ul li a:focus,#main-menu li.focus > a,#main-menu li:focus > a,#main-menu ul li.current-menu-item > a,#main-menu ul li.current_page_item > a,#main-menu ul li.current-menu-parent > a,#main-menu ul li.current_page_ancestor > a,#main-menu ul li.current-menu-ancestor > a,.post-meta i,p.heading_short,.trending_post:hover a,.logo a,.bread_crumb a:hover,.bread_crumb span,.woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price{
			color: '.esc_attr($fresh_bakers_global_color).';
		}
		.sh2{
			border-color: '.esc_attr($fresh_bakers_global_color).';
		}
		#trending button.active span{
			outline-color: '.esc_attr($fresh_bakers_global_color).';
		}
		.header-outter input.search-submit,.header-outter .searchform input[type=text]{
			background-color: '.esc_attr($fresh_bakers_global_color).' !important;
		}
    	.copyright {
			background: '.esc_attr($fresh_bakers_copyright_bg).';
		}
	';
    wp_add_inline_style( 'fresh-bakers-style',$fresh_bakers_theme_color_css );
    wp_add_inline_style( 'fresh-bakers-woocommerce-css',$fresh_bakers_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'fresh_bakers_global_color' );

/*-----------------------------------------------------------------------------------*/
/* Get post comments */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('fresh_bakers_comment')) :
    /**
     * Template for comments and pingbacks.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     */
    function fresh_bakers_comment($comment, $args, $depth){

        if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class('media'); ?>>
            <div class="comment-body">
                <?php esc_html_e('Pingback:', 'fresh-bakers');
                comment_author_link(); ?><?php edit_comment_link(__('Edit', 'fresh-bakers'), '<span class="edit-link">', '</span>'); ?>
            </div>

        <?php else : ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body media mb-4">
                <a class="pull-left" href="#">
                    <?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>
                </a>
                <div class="media-body">
                    <div class="media-body-wrap card">
                        <div class="card-header">
                            <h5 class="mt-0"><?php /* translators: %s: author */ printf('<cite class="fn">%s</cite>', get_comment_author_link() ); ?></h5>
                            <div class="comment-meta">
							    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							        <time datetime="<?php comment_time( 'c' ); ?>">
							            <?php printf(
							                esc_html__( '%1$s at %2$s', 'fresh-bakers' ),
							                esc_html( get_comment_date() ), esc_html( get_comment_time() ) ); ?>
							        </time>
							    </a>
							    <?php
							    edit_comment_link(esc_html__( 'Edit', 'fresh-bakers' ),'<span class="edit-link">','</span>');?>
							</div>
                        </div>
                        <?php if ('0' == $comment->comment_approved) : ?>
                            <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'fresh-bakers'); ?></p>
                        <?php endif; ?>

                        <div class="comment-content card-block">
                            <?php comment_text(); ?>
                        </div>

                        <?php comment_reply_link(
                            array_merge(
                                $args, array(
                                    'add_below' => 'div-comment',
                                    'depth' => $depth,
                                    'max_depth' => $args['max_depth'],
                                    'before' => '<footer class="reply comment-reply card-footer">',
                                    'after' => '</footer><!-- .reply -->'
                                )
                            )
                        ); ?>
                    </div>
                </div>
            </article>

            <?php
        endif;
    }
endif; // ends check for fresh_bakers_comment()

if (!function_exists('fresh_bakers_widgets_init')) {

	function fresh_bakers_widgets_init() {

		register_sidebar(array(

			'name' => esc_html__('Sidebar','fresh-bakers'),
			'id'   => 'fresh-bakers-sidebar',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'fresh-bakers'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Sidebar 2','fresh-bakers'),
			'id'   => 'fresh-bakers-sidebar-2',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'fresh-bakers'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Sidebar 3','fresh-bakers'),
			'id'   => 'fresh-bakers-sidebar-3',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'fresh-bakers'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Footer Sidebar','fresh-bakers'),
			'id'   => 'fresh-bakers-footer-sidebar',
			'description'   => esc_html__('This sidebar will be shown next at the bottom of your content.', 'fresh-bakers'),
			'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

	}

	add_action( 'widgets_init', 'fresh_bakers_widgets_init' );

}

function fresh_bakers_get_categories_select() {
	$teh_cats = get_categories();
	$results = array();
	$count = count($teh_cats);
	for ($i=0; $i < $count; $i++) {
	if (isset($teh_cats[$i]))
  		$results[$teh_cats[$i]->slug] = $teh_cats[$i]->name;
	else
  		$count++;
	}
	return $results;
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'fresh_bakers_loop_columns');
if (!function_exists('fresh_bakers_loop_columns')) {
	function fresh_bakers_loop_columns() {
		$fresh_bakers_columns = get_theme_mod( 'fresh_bakers_per_columns', 3 );
		return $fresh_bakers_columns;
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'fresh_bakers_per_page', 20 );
function fresh_bakers_per_page( $fresh_bakers_cols ) {
  	$fresh_bakers_cols = get_theme_mod( 'fresh_bakers_product_per_page', 9 );
	return $fresh_bakers_cols;
}

// Add filter to modify the number of related products
add_filter( 'woocommerce_output_related_products_args', 'fresh_bakers_products_args' );
function fresh_bakers_products_args( $args ) {
    $args['posts_per_page'] = get_theme_mod( 'custom_related_products_number', 6 );
    $args['columns'] = get_theme_mod( 'custom_related_products_number_per_row', 3 );
    return $args;
}

function get_page_id_by_title($pagename){

    $args = array(
        'post_type' => 'page',
        'posts_per_page' => 1,
        'post_status' => 'publish',
        'title' => $pagename
    );
    $query = new WP_Query( $args );

    $page_id = '1';
    if (isset($query->post->ID)) {
        $page_id = $query->post->ID;
    }

    return $page_id;
}

add_action( 'customize_register', 'fresh_bakers_remove_setting', 20 );
function fresh_bakers_remove_setting( $wp_customize ) {
    // Check if the setting or control exists before removing
    if ( $wp_customize->get_setting( 'header_textcolor' ) ) {
        $wp_customize->remove_setting( 'header_textcolor' );
    }

    if ( $wp_customize->get_control( 'header_textcolor' ) ) {
        $wp_customize->remove_control( 'header_textcolor' );
    }
}

// edit link option
if (!function_exists('fresh_bakers_edit_link')) :

    function fresh_bakers_edit_link($view = 'default')
    {
        global $post;
            edit_post_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'fresh-bakers'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<span class="edit-link"><i class="fas fa-edit"></i>',
                '</span>'
            );

    }
endif;

add_filter( 'woocommerce_prevent_automatic_wizard_redirect', '__return_true' );