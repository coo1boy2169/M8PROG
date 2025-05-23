<?php
if (isset($_GET['import-demo']) && $_GET['import-demo'] == true) {
    class FreshBakersDemoImporter {

        public function fresh_bakers_customizer_primary_menu() {
            // Create Primary Menu
            $fresh_bakers_themename = 'Fresh Bakers'; // Define the theme name
            $fresh_bakers_menuname = $fresh_bakers_themename . 'Main Menus';
            $fresh_bakers_bpmenulocation = 'main-menu';
            $fresh_bakers_menu_exists = wp_get_nav_menu_object($fresh_bakers_menuname);

            if (!$fresh_bakers_menu_exists) {
                $fresh_bakers_menu_id = wp_create_nav_menu($fresh_bakers_menuname);

                wp_update_nav_menu_item($fresh_bakers_menu_id, 0, array(
                    'menu-item-title' => __('Home', 'fresh-bakers'),
                    'menu-item-classes' => 'home',
                    'menu-item-url' => home_url('/'),
                    'menu-item-status' => 'publish',
                ));

                wp_update_nav_menu_item($fresh_bakers_menu_id, 0, array(
                    'menu-item-title' => __('About Us', 'fresh-bakers'),
                    'menu-item-classes' => 'about-us',
                    'menu-item-url' => get_permalink(get_page_id_by_title('About Us')),
                    'menu-item-status' => 'publish',
                ));

                wp_update_nav_menu_item($fresh_bakers_menu_id, 0, array(
                    'menu-item-title' => __('Blogs', 'fresh-bakers'),
                    'menu-item-classes' => 'blogs',
                    'menu-item-url' => get_permalink(get_page_id_by_title('Blogs')),
                    'menu-item-status' => 'publish',
                ));

                wp_update_nav_menu_item($fresh_bakers_menu_id, 0, array(
                    'menu-item-title' => __('Contact Us', 'fresh-bakers'),
                    'menu-item-classes' => 'contact-us',
                    'menu-item-url' => get_permalink(get_page_id_by_title('Contact Us')),
                    'menu-item-status' => 'publish',
                ));

                wp_update_nav_menu_item($fresh_bakers_menu_id, 0, array(
                    'menu-item-title' => __('Menu', 'fresh-bakers'),
                    'menu-item-classes' => 'menu',
                    'menu-item-url' => get_permalink(get_page_id_by_title('Menu')),
                    'menu-item-status' => 'publish',
                ));

                wp_update_nav_menu_item($fresh_bakers_menu_id, 0, array(
                    'menu-item-title' => __('Gallery', 'fresh-bakers'),
                    'menu-item-classes' => 'gallery',
                    'menu-item-url' => get_permalink(get_page_id_by_title('Gallery')),
                    'menu-item-status' => 'publish',
                ));

                if (!has_nav_menu($fresh_bakers_bpmenulocation)) {
                    $locations = get_theme_mod('nav_menu_locations');
                    $locations[$fresh_bakers_bpmenulocation] = $fresh_bakers_menu_id;
                    set_theme_mod('nav_menu_locations', $locations);
                }
            }
        }

        public function setup_widgets() {

        $fresh_bakers_home_id='';
        $fresh_bakers_home_content = '';
        $fresh_bakers_home_title = 'HOME';
        $fresh_bakers_home = array(
            'post_type' => 'page',
            'post_title' => $fresh_bakers_home_title,
            'post_content' => $fresh_bakers_home_content,
            'post_status' => 'publish',
            'post_author' => 1,
            'post_slug' => 'home'
        );
        $fresh_bakers_home_id = wp_insert_post($fresh_bakers_home);

        add_post_meta( $fresh_bakers_home_id, '_wp_page_template', 'frontpage.php' );

        update_option( 'page_on_front', $fresh_bakers_home_id );
        update_option( 'show_on_front', 'page' );

                        // Create a Posts Page
            $fresh_bakers_blog_title = 'About Us';
            $fresh_bakers_blog_check = get_page_id_by_title($fresh_bakers_blog_title);

            if ($fresh_bakers_blog_check == 1) {
                $fresh_bakers_blog = array(
                    'post_type' => 'page',
                    'post_title' => $fresh_bakers_blog_title,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_name' => 'about-us',
                    'post_content' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                );
                $fresh_bakers_blog_id = wp_insert_post($fresh_bakers_blog);

                if (!is_wp_error($fresh_bakers_blog_id)) {
                    // update_option('page_for_posts', $fresh_bakers_blog_id);
                }
            }

                        // Create a Posts Page
            $fresh_bakers_blog_title = 'Blogs';
            $fresh_bakers_blog_check = get_page_id_by_title($fresh_bakers_blog_title);

            if ($fresh_bakers_blog_check  == 1) {
                $fresh_bakers_blog = array(
                    'post_type' => 'page',
                    'post_title' => $fresh_bakers_blog_title,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_name' => 'blogs',
                    'post_content' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                );
                $fresh_bakers_blog_id = wp_insert_post($fresh_bakers_blog);

                if (!is_wp_error($fresh_bakers_blog_id)) {
                    // update_option('page_for_posts', $fresh_bakers_blog_id);
                }
            }

                         // Create a Posts Page
            $fresh_bakers_blog_title = 'Contact Us';
            $fresh_bakers_blog_check = get_page_id_by_title($fresh_bakers_blog_title);

            if ($fresh_bakers_blog_check  == 1) {
                $fresh_bakers_blog = array(
                    'post_type' => 'page',
                    'post_title' => $fresh_bakers_blog_title,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_name' => 'contact-us',
                    'post_content' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                );
                $fresh_bakers_blog_id = wp_insert_post($fresh_bakers_blog);

                if (!is_wp_error($fresh_bakers_blog_id)) {
                    // update_option('page_for_posts', $fresh_bakers_blog_id);
                }
            }

                         // Create a Posts Page
            $fresh_bakers_blog_title = 'Menu';
            $fresh_bakers_blog_check = get_page_id_by_title($fresh_bakers_blog_title);

            if ($fresh_bakers_blog_check  == 1) {
                $fresh_bakers_blog = array(
                    'post_type' => 'page',
                    'post_title' => $fresh_bakers_blog_title,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_name' => 'menu',
                    'post_content' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                );
                $fresh_bakers_blog_id = wp_insert_post($fresh_bakers_blog);

                if (!is_wp_error($fresh_bakers_blog_id)) {
                    // update_option('page_for_posts', $fresh_bakers_blog_id);
                }
            }

                                     // Create a Posts Page
            $fresh_bakers_blog_title = 'Gallery';
            $fresh_bakers_blog_check = get_page_id_by_title($fresh_bakers_blog_title);

            if ($fresh_bakers_blog_check  == 1) {
                $fresh_bakers_blog = array(
                    'post_type' => 'page',
                    'post_title' => $fresh_bakers_blog_title,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_name' => 'gallery',
                    'post_content' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                );
                $fresh_bakers_blog_id = wp_insert_post($fresh_bakers_blog);

                if (!is_wp_error($fresh_bakers_blog_id)) {
                    // update_option('page_for_posts', $fresh_bakers_blog_id);
                }
            }

                                                 // Create a Posts Page
            $fresh_bakers_blog_title = 'CONTACT';
            $fresh_bakers_blog_check = get_page_id_by_title($fresh_bakers_blog_title);

            if ($fresh_bakers_blog_check  == 1) {
                $fresh_bakers_blog = array(
                    'post_type' => 'page',
                    'post_title' => $fresh_bakers_blog_title,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_name' => 'contact',
                    'post_content' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                );
                $fresh_bakers_blog_id = wp_insert_post($fresh_bakers_blog);

                if (!is_wp_error($fresh_bakers_blog_id)) {
                    // update_option('page_for_posts', $fresh_bakers_blog_id);
                }
            }

		//-----Header -----//

		set_theme_mod( 'fresh_bakers_header_inner_text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' );
		set_theme_mod( 'fresh_bakers_phone_number', '123456789' );
		set_theme_mod( 'fresh_bakers_email_id', 'bakersinfo@example.com' );
		set_theme_mod( 'fresh_bakers_location', 'No. 22 B, Street 123, New York' );
		set_theme_mod( 'fresh_bakers_header_btn', 'Make A Reservation' );
		set_theme_mod( 'fresh_bakers_header_btn_link', '#' );

		//-----Slider-----//

		set_theme_mod( 'fresh_bakers_blog_box_enable', true);

		set_theme_mod( 'fresh_bakers_blog_slide_number', '3' );
		$fresh_bakers_latest_post_category = wp_create_category('Slider Post');
		set_theme_mod( 'fresh_bakers_blog_slide_category', 'Slider Post' ); 

		for($i=1; $i<=3; $i++) {

			set_theme_mod( 'fresh_bakers_custmom_text', 'Lorem ipsum dolor '.$i );
			set_theme_mod( 'fresh_bakers_slider_date_time_1', 'Week Days- 10:00 - 07:00 '.$i );
			set_theme_mod( 'fresh_bakers_slider_date_time_2', 'WeekEnds- 11:00 - 05:00 '.$i );

			$title =   'Freshly Baked A Bite Of Joy';
			$content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';

			// Create post object
			$fresh_bakers_my_post = array(
				'post_title'    => wp_strip_all_tags( $title ),
				'post_content'  => $content,
				'post_status'   => 'publish',
				'post_type'     => 'post',
				'post_category' => array($fresh_bakers_latest_post_category) 
			);

			// Insert the post into the database
			$fresh_bakers_post_id = wp_insert_post( $fresh_bakers_my_post );

			$fresh_bakers_image_url = get_template_directory_uri().'/assets/images/slider.png';

			$fresh_bakers_image_name= 'slider.png';
			$fresh_bakers_upload_dir       = wp_upload_dir(); 
			// Set upload folder
			$fresh_bakers_image_data       = file_get_contents($fresh_bakers_image_url); 
			 
			// Get image data
			$fresh_bakers_unique_file_name = wp_unique_filename( $fresh_bakers_upload_dir['path'], $fresh_bakers_image_name ); 
			// Generate unique name
			$filename= basename( $fresh_bakers_unique_file_name ); 
			// Create image file name
			// Check folder permission and define file location
			if( wp_mkdir_p( $fresh_bakers_upload_dir['path'] ) ) {
				$file = $fresh_bakers_upload_dir['path'] . '/' . $filename;
			} else {
				$file = $fresh_bakers_upload_dir['basedir'] . '/' . $filename;
			}
			if ( ! function_exists( 'WP_Filesystem' ) ) {
                    require_once( ABSPATH . 'wp-admin/includes/file.php' );
                }
                
                WP_Filesystem();
                global $wp_filesystem;
                
                if ( ! $wp_filesystem->put_contents( $file, $fresh_bakers_image_data, FS_CHMOD_FILE ) ) {
                    wp_die( 'Error saving file!' );
                }
			$fresh_bakers_wp_filetype = wp_check_filetype( $filename, null );
			$fresh_bakers_attachment = array(
				'post_mime_type' => $fresh_bakers_wp_filetype['type'],
				'post_title'     => sanitize_file_name( $filename ),
				'post_content'   => '',
				'post_type'     => 'post',
				'post_status'    => 'inherit'
			);
			$fresh_bakers_attach_id = wp_insert_attachment( $fresh_bakers_attachment, $file, $fresh_bakers_post_id );
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$fresh_bakers_attach_data = wp_generate_attachment_metadata( $fresh_bakers_attach_id, $file );
				wp_update_attachment_metadata( $fresh_bakers_attach_id, $fresh_bakers_attach_data );
				set_post_thumbnail( $fresh_bakers_post_id, $fresh_bakers_attach_id );
		}

		//-----Slider-----//

		set_theme_mod( 'fresh_bakers_testimonial_section_enable', true);

		set_theme_mod( 'fresh_bakers_testimonial_number', '4' );
		$fresh_bakers_latest_post_category = wp_create_category('Services');
			set_theme_mod( 'fresh_bakers_testimonial_category', 'Services' ); 
		
		$featured_product=array('Break Fast', 'Lunch', 'Dessert', 'Cakes');

		for($i=1; $i<=4; $i++) {

			$title =   $featured_product[$i-1];
			$content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam';

			// Create post object
			$fresh_bakers_my_post = array(
				'post_title'    => wp_strip_all_tags( $title ),
				'post_content'  => $content,
				'post_status'   => 'publish',
				'post_type'     => 'post',
				'post_category' => array($fresh_bakers_latest_post_category) 
			);

			// Insert the post into the database
			$fresh_bakers_post_id = wp_insert_post( $fresh_bakers_my_post );

			$fresh_bakers_image_url = get_template_directory_uri().'/assets/images/services'.$i.'.png';

			$fresh_bakers_image_name= 'services'.$i.'.png';
			$fresh_bakers_upload_dir       = wp_upload_dir(); 
			// Set upload folder
			$fresh_bakers_image_data       = file_get_contents($fresh_bakers_image_url); 
			 
			// Get image data
			$fresh_bakers_unique_file_name = wp_unique_filename( $fresh_bakers_upload_dir['path'], $fresh_bakers_image_name ); 
			// Generate unique name
			$filename= basename( $fresh_bakers_unique_file_name ); 
			// Create image file name
			// Check folder permission and define file location
			if( wp_mkdir_p( $fresh_bakers_upload_dir['path'] ) ) {
				$file = $fresh_bakers_upload_dir['path'] . '/' . $filename;
			} else {
				$file = $fresh_bakers_upload_dir['basedir'] . '/' . $filename;
			}
						if ( ! function_exists( 'WP_Filesystem' ) ) {
                    require_once( ABSPATH . 'wp-admin/includes/file.php' );
                }
                
                WP_Filesystem();
                global $wp_filesystem;
                
                if ( ! $wp_filesystem->put_contents( $file, $fresh_bakers_image_data, FS_CHMOD_FILE ) ) {
                    wp_die( 'Error saving file!' );
                }
			$fresh_bakers_wp_filetype = wp_check_filetype( $filename, null );
			$fresh_bakers_attachment = array(
				'post_mime_type' => $fresh_bakers_wp_filetype['type'],
				'post_title'     => sanitize_file_name( $filename ),
				'post_content'   => '',
				'post_type'     => 'post',
				'post_status'    => 'inherit'
			);
			$fresh_bakers_attach_id = wp_insert_attachment( $fresh_bakers_attachment, $file, $fresh_bakers_post_id );
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$fresh_bakers_attach_data = wp_generate_attachment_metadata( $fresh_bakers_attach_id, $file );
				wp_update_attachment_metadata( $fresh_bakers_attach_id, $fresh_bakers_attach_data );
				set_post_thumbnail( $fresh_bakers_post_id, $fresh_bakers_attach_id );
		}

	    }
    }
	// Instantiate the class and call its methods
    $demo_importer = new FreshBakersDemoImporter();
    $demo_importer->setup_widgets();
    $demo_importer->fresh_bakers_customizer_primary_menu();
	}
?>