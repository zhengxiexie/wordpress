<?php 
    /**
     * Scripts
     * 
     * @package WPRSSAggregator
     */ 


    add_action( 'admin_enqueue_scripts', 'wprss_admin_scripts_styles' ); 
    /**
     * Insert required scripts, styles and filters on the admin side
     * 
     * @since 2.0
     */   
    function wprss_admin_scripts_styles() {

        // Only load scripts if we are on particular pages of the plugin in admin
        if ( isset( $_GET['page'] ) && ( $_GET['page'] == 'wprss-aggregator' || $_GET['page'] == 'wprss-aggregator-settings' 
            || $_GET['page'] == 'wprss-import-export-settings' || $_GET['page'] == 'wprss-debugging' || $_GET['page'] == 'wprss-addons' ) ) {        
            wp_enqueue_style( 'wprss-styles', WPRSS_CSS . 'admin-styles.css' );
        } 

        if ( is_admin() ) {
            wp_enqueue_style( 'wprss-admin-3.8-styles', WPRSS_CSS . 'admin-3.8.css' );
        }

        $screen = get_current_screen();

        wp_enqueue_script( 'wprss-admin-addon-ajax', WPRSS_JS .'admin-addon-ajax.js', array('jquery') );
        wp_enqueue_style( 'wprss-admin-editor-styles', WPRSS_CSS . 'admin-editor.css' );
        wp_enqueue_style( 'wprss-admin-tracking-styles', WPRSS_CSS . 'admin-tracking-styles.css' );

		$page = isset( $_GET['page'] )? $_GET['page'] : '';
		
        if ( ( 'post' === $screen->base || 'edit' === $screen->base || 'wprss-debugging' === $screen->base ) && 
            ( 'wprss_feed' === $screen->post_type || 'wprss_feed_item' === $screen->post_type ) ||
			$page == 'wprss-aggregator-settings' || $screen->post_type === 'wprss_blacklist' ) {
            wp_enqueue_style( 'wprss-admin-styles', WPRSS_CSS . 'admin-styles.css' );
            wp_enqueue_style( 'wprss-fa', WPRSS_CSS . 'font-awesome.min.css' );
            wp_enqueue_script( 'wprss-admin-custom', WPRSS_JS .'admin-custom.js', array('jquery','jquery-ui-datepicker','jquery-ui-slider') );
            wp_enqueue_script( 'jquery-ui-timepicker-addon', WPRSS_JS .'jquery-ui-timepicker-addon.js', array('jquery','jquery-ui-datepicker') );
            wp_enqueue_style( 'jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css' );
            if ( 'post' === $screen->base && 'wprss_feed' === $screen->post_type ) {
                // Change text on post screen from 'Enter title here' to 'Enter feed name here'
                add_filter( 'enter_title_here', 'wprss_change_title_text' );
            }
			if ( 'wprss_feed' === $screen->post_type ) {
				wp_enqueue_script( 'wprss-custom-bulk-actions', WPRSS_JS . 'admin-custom-bulk-actions.js', array( 'jquery' ) );
			}
        }
        // Load Heartbeat script and set dependancy for Heartbeat to ensure Heartbeat is loaded
        if ( 'edit' === $screen->base && $screen->post_type === 'wprss_feed' && apply_filters('wprss_ajax_polling', TRUE) === TRUE ) {
            wp_enqueue_script( 'wprss-feed-source-table-heartbeat', WPRSS_JS .'heartbeat.js' );
        }

        else if ( 'dashboard_page_wprss-welcome' === $screen->base ) {
            wp_enqueue_style( 'wprss-admin-styles', WPRSS_CSS . 'admin-styles.css' );
        }

		// Creates the wprss_urls object in JS
		wp_localize_script( 'wprss-admin-custom', 'wprss_urls',
			array(
				'import_export' => admin_url('edit.php?post_type=wprss_feed&page=wprss-import-export-settings')
			)
		);
		
        do_action( 'wprss_admin_scripts_styles' );
    } // end wprss_admin_scripts_styles


    add_action( 'wp_enqueue_scripts', 'wprss_load_scripts' );
    /**
     * Enqueues the required scripts.
     * 
     * @since 3.0
     */      
    function wprss_load_scripts() {                     
      /*  wp_enqueue_script( 'jquery.colorbox-min', WPRSS_JS . 'jquery.colorbox-min.js', array( 'jquery' ) );         
        wp_enqueue_script( 'custom', WPRSS_JS . 'custom.js', array( 'jquery', 'jquery.colorbox-min' ) );  */
        do_action( 'wprss_register_scripts' );         
    } // end wprss_head_scripts_styles


    /**
     * Returns the path to the WPRSS templates directory
     *
     * @since       3.0
     * @return      string
     */
    function wprss_get_templates_dir() {
        return WPRSS_DIR . 'templates';
    }


    /**
     * Returns the URL to the WPRSS templates directory
     *
     * @since       3.0
     * @return      string
     */
    function wprss_get_templates_uri() {
        return WPRSS_URI . 'templates';
    }


    add_action( 'wp_enqueue_scripts', 'wprss_register_styles' );
    /**
     * Register front end CSS styling files
     * Inspiration from Easy Digital Downloads
     * 
     * @since 3.0
     */  
    function wprss_register_styles() {   

       /* $general_settings = get_option( 'wprss_settings_general' );

        if( $general_settings['styles_disable'] == 1 )
            return;
        wp_enqueue_style( 'colorbox', WPRSS_CSS . 'colorbox.css', array(), '1.4.1' );     
        wp_enqueue_style( 'styles', WPRSS_CSS . 'styles.css', array(), '' );       

        /* If using DISABLE CSS option: 
        global $edd_options;

        if( isset( $edd_options['disable_styles'] ) )
            return;

        */

      /*  $file = 'wprss.css';

        // Check child theme first
        if ( file_exists( trailingslashit( get_stylesheet_directory() ) . 'wprss_templates/' . $file ) ) {
            $url = trailingslashit( get_stylesheet_directory_uri() ) . 'wprss_templates/' . $file;

        // Check parent theme next            
        } elseif ( file_exists( trailingslashit( get_template_directory() ) . 'wprss_templates/' . $file ) ) {
            $url = trailingslashit( get_template_directory_uri() ) . 'wprss_templates/' . $file;

        // Check theme compatibility last            
        } elseif ( file_exists( trailingslashit( wprss_get_templates_dir() ) . $file ) ) {
            $url = trailingslashit( wprss_get_templates_uri() ) . $file;
        }        

        wp_enqueue_style( 'wprss-styles', $url, WPRSS_VERSION );*/
    }
