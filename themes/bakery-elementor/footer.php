<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bakery Elementor
 */
?>

<footer class="footer-side">
  <?php if( get_theme_mod( 'bakery_elementor_show_footer_widget',true)) : ?>
    <div class="footer-widget">
      <div class="container">
        <?php
          // Check if any footer sidebar is active
          $bakery_elementor_any_sidebar_active = false;
          for ( $bakery_elementor_i = 1; $bakery_elementor_i <= 4; $bakery_elementor_i++ ) {
            if ( is_active_sidebar( "footer{$bakery_elementor_i}-sidebar" ) ) {
              $bakery_elementor_any_sidebar_active = true;
              break;
            }
          }
          // Count active for responsive column classes
          $bakery_elementor_active_sidebars = 0;
          if ( $bakery_elementor_any_sidebar_active ) {
            for ( $bakery_elementor_i = 1; $bakery_elementor_i <= 4; $bakery_elementor_i++ ) {
              if ( is_active_sidebar( "footer{$bakery_elementor_i}-sidebar" ) ) {
                $bakery_elementor_active_sidebars++;
              }
            }
          }
          $bakery_elementor_col_class = $bakery_elementor_active_sidebars > 0 ? 'col-lg-' . (12 / $bakery_elementor_active_sidebars) . ' col-md-6 col-sm-12' : 'col-lg-3 col-md-6 col-sm-12';
        ?>
        <div class="row pt-2">
          <?php for ( $bakery_elementor_i = 1; $bakery_elementor_i <= 4; $bakery_elementor_i++ ) : ?>
            <div class="footer-area <?php echo esc_attr($bakery_elementor_col_class); ?>">
              <?php if ( $bakery_elementor_any_sidebar_active && is_active_sidebar("footer{$bakery_elementor_i}-sidebar") ) : ?>
                <?php dynamic_sidebar("footer{$bakery_elementor_i}-sidebar"); ?>
              <?php elseif ( ! $bakery_elementor_any_sidebar_active ) : ?>
                  <?php if ( $bakery_elementor_i === 1 ) : ?>
                    <aside role="complementary" aria-label="<?php echo esc_attr__( 'footer1', 'bakery-elementor' ); ?>" id="Search" class="sidebar-widget">
                      <h4 class="title" ><?php esc_html_e( 'Search', 'bakery-elementor' ); ?></h4>
                      <?php get_search_form(); ?>
                    </aside>

                  <?php elseif ( $bakery_elementor_i === 2 ) : ?>
                      <aside role="complementary" aria-label="<?php echo esc_attr__( 'footer2', 'bakery-elementor' ); ?>" id="archives" class="sidebar-widget">
                      <h4 class="title" ><?php esc_html_e( 'Archives', 'bakery-elementor' ); ?></h4>
                      <ul>
                          <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                      </ul>
                      </aside>
                  <?php elseif ( $bakery_elementor_i === 3 ) : ?>
                    <aside role="complementary" aria-label="<?php echo esc_attr__( 'footer3', 'bakery-elementor' ); ?>" id="meta" class="sidebar-widget">
                      <h4 class="title"><?php esc_html_e( 'Meta', 'bakery-elementor' ); ?></h4>
                      <ul>
                        <?php wp_register(); ?>
                        <li><?php wp_loginout(); ?></li>
                        <?php wp_meta(); ?>
                      </ul>
                    </aside>
                  <?php elseif ( $bakery_elementor_i === 4 ) : ?>
                    <aside role="complementary" aria-label="<?php echo esc_attr__( 'footer4', 'bakery-elementor' ); ?>" id="categories" class="sidebar-widget">
                      <h4 class="title" ><?php esc_html_e( 'Categories', 'bakery-elementor' ); ?></h4>
                      <ul>
                          <?php wp_list_categories('title_li=');  ?>
                      </ul>
                    </aside>
                  <?php endif; ?>
              <?php endif; ?>
            </div>
          <?php endfor; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <?php if( get_theme_mod( 'bakery_elementor_show_footer_copyright',true)) : ?>
    <div class="footer-copyright">
      <div class="container">
        <div class="row pt-2">
          <div class="col-lg-6 col-md-6 align-self-center">
            <p class="mb-0 py-3 text-center text-md-start">
              <?php
                if (!get_theme_mod('bakery_elementor_footer_text') ) { ?>
                  <a href="<?php echo esc_url(__('https://www.wpelemento.com/products/free-bakery-shop-wordpress-theme', 'bakery-elementor' )); ?>" target="_blank">
                      <?php esc_html_e('Bakery Elementor WordPress Theme','bakery-elementor'); ?>
                  </a>
                <?php } else {
                  echo esc_html(get_theme_mod('bakery_elementor_footer_text'));
                }
              ?>
              <?php if ( get_theme_mod('bakery_elementor_copyright_enable', true) == true ) : ?>
              <?php
                /* translators: %s: WP Elemento */
                printf( esc_html__( ' By %s', 'bakery-elementor' ), 'WP Elemento' ); ?>
              <?php endif; ?>
            </p>
          </div>
          <div class="col-lg-6 col-md-6 align-self-center text-center text-md-end">
            <?php if ( get_theme_mod('bakery_elementor_copyright_enable', true) == true ) : ?>
              <a href="<?php echo esc_url(__('https://wordpress.org','bakery-elementor') ); ?>" rel="generator"><?php  /* translators: %s: WordPress */ printf( esc_html__( 'Proudly powered by %s', 'bakery-elementor' ), 'WordPress' ); ?></a>
            <?php endif; ?>
          </div>
          <?php if(get_theme_mod('bakery_elementor_footer_social_icon_hide', false )== true){ ?>
            <div class="row">
              <div class="col-12 align-self-center py-1">
                <div class="footer-links">
                  <?php $bakery_elementor_settings_footer = get_theme_mod( 'bakery_elementor_social_links_settings_footer' ); ?>
                  <?php if ( is_array($bakery_elementor_settings_footer) || is_object($bakery_elementor_settings_footer) ){ ?>
                    <?php foreach( $bakery_elementor_settings_footer as $bakery_elementor_setting_footer ) { ?>
                      <a href="<?php echo esc_url( $bakery_elementor_setting_footer['link_url'] ); ?>" target="_blank">
                        <i class="<?php echo esc_attr( $bakery_elementor_setting_footer['link_text'] ); ?> me-2"></i>
                      </a>
                    <?php } ?>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <?php if ( get_theme_mod('bakery_elementor_scroll_enable_setting')) : ?>
    <div class="scroll-up">
      <a href="#tobottom"><i class="fa fa-arrow-up"></i></a>
    </div>
  <?php endif; ?>
  <?php if(get_theme_mod('bakery_elementor_progress_bar', true )== true): ?>
    <div id="elemento-progress-bar" class="theme-progress-bar <?php if( get_theme_mod( 'bakery_elementor_progress_bar_position','top') == 'top') { ?> top <?php } else { ?> bottom <?php } ?>"></div>
  <?php endif; ?>
  <?php if(get_theme_mod('bakery_elementor_cursor_outline', false )== true): ?>
			<!-- Custom cursor -->
			<div class="cursor-point-outline"></div>
			<div class="cursor-point"></div>
			<!-- .Custom cursor -->
  <?php endif; ?>
</footer>

<?php wp_footer(); ?>

</body>
</html>