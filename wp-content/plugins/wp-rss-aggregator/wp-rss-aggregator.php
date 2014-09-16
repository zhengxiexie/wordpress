<?php
    /*
    Plugin Name: WP RSS Aggregator
    Plugin URI: http://www.wprssaggregator.com
    Description: Imports and aggregates multiple RSS Feeds using SimplePie
    Version: 4.5.3
    Author: Jean Galea
    Author URI: http://www.wprssaggregator.com
    License: GPLv2
    License URI: http://www.gnu.org/licenses/gpl-2.0.html
    */

    /*
    Copyright 2012-2014 Jean Galea (email : info@jeangalea.com)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.
    
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
    */

    /**
     * @package   WPRSSAggregator
     * @version   4.5.3
     * @since     1.0
     * @author    Jean Galea <info@wprssaggregator.com>
     * @copyright Copyright (c) 2012-2014, Jean Galea
     * @link      http://www.wprssaggregator.com/
     * @license   http://www.gnu.org/licenses/gpl.html
     */

    /**
     * Define constants used by the plugin.
     */

    // Set the version number of the plugin. 
    if( !defined( 'WPRSS_VERSION' ) )
        define( 'WPRSS_VERSION', '4.5.3', true );

    // Set the database version number of the plugin. 
    if( !defined( 'WPRSS_DB_VERSION' ) )
        define( 'WPRSS_DB_VERSION', 13 );

    // Set the plugin prefix 
    if( !defined( 'WPRSS_PREFIX' ) )
        define( 'WPRSS_PREFIX', 'wprss', true );            

    // Set the plugin prefix 
    if( !defined( 'WPRSS_FILE_CONSTANT' ) )
        define( 'WPRSS_FILE_CONSTANT', __FILE__, true );

    // Set constant path to the plugin directory. 
    if( !defined( 'WPRSS_DIR' ) )
        define( 'WPRSS_DIR', plugin_dir_path( __FILE__ ) );        

    // Set constant URI to the plugin URL. 
    if( !defined( 'WPRSS_URI' ) )
        define( 'WPRSS_URI', plugin_dir_url( __FILE__ ) );        

    // Set the constant path to the plugin's javascript directory. 
    if( !defined( 'WPRSS_JS' ) )
        define( 'WPRSS_JS', WPRSS_URI . trailingslashit( 'js' ), true );

    // Set the constant path to the plugin's CSS directory. 
    if( !defined( 'WPRSS_CSS' ) )
        define( 'WPRSS_CSS', WPRSS_URI . trailingslashit( 'css' ), true );

    // Set the constant path to the plugin's images directory. 
    if( !defined( 'WPRSS_IMG' ) )
        define( 'WPRSS_IMG', WPRSS_URI . trailingslashit( 'images' ), true );

    // Set the constant path to the plugin's includes directory. 
    if( !defined( 'WPRSS_INC' ) )
        define( 'WPRSS_INC', WPRSS_DIR . trailingslashit( 'includes' ), true );

    if( !defined( 'WPRSS_LANG' ) )
        define( 'WPRSS_LANG', WPRSS_DIR . trailingslashit( 'languages' ), true );
    
    // Set the constant path to the plugin's log file.
    if( !defined( 'WPRSS_LOG_FILE' ) )
        define( 'WPRSS_LOG_FILE', WPRSS_DIR . 'log', true );
    if( !defined( 'WPRSS_LOG_FILE_EXT' ) )
        define( 'WPRSS_LOG_FILE_EXT', '.txt', true );
    
	if ( !defined('WPRSS_SL_STORE_URL') ) {
		define( 'WPRSS_SL_STORE_URL', 'http://www.wprssaggregator.com', TRUE );
	}

    /**
     * Load required files.
     */

    /* Load install, upgrade and migration code. */
    require_once ( WPRSS_INC . 'update.php' );           
    
    /* Load the shortcodes functions file. */
    require_once ( WPRSS_INC . 'shortcodes.php' );

    /* Load the custom post types and taxonomies. */
    require_once ( WPRSS_INC . 'custom-post-types.php' );  

    /* Load the file for setting capabilities of our post types */
    require_once ( WPRSS_INC . 'roles-capabilities.php' ); 

    /* Load the feed processing functions file */
    require_once ( WPRSS_INC . 'feed-processing.php' );
	
	/* Load the blacklist functions file */
    require_once ( WPRSS_INC . 'feed-blacklist.php' );

    /* Load the feed importing functions file */
    require_once ( WPRSS_INC . 'feed-importing.php' );

    /* Load the feed states functions file */
    require_once ( WPRSS_INC . 'feed-states.php' );   

    /* Load the feed display functions file */
    require_once ( WPRSS_INC . 'feed-display.php' );            

    /* Load the custom feed file */
    require_once ( WPRSS_INC . 'custom-feed.php' );            

    /* Load the custom post type feeds file */
    require_once ( WPRSS_INC . 'cpt-feeds.php' );

    /* Load the cron job scheduling functions. */
    require_once ( WPRSS_INC . 'cron-jobs.php' ); 

    /* Load the admin functions file. */
    require_once ( WPRSS_INC . 'admin.php' );         

    /* Load the admin options functions file. */
    require_once ( WPRSS_INC . 'admin-options.php' );             

    /* Load the settings import/export file */
    require_once ( WPRSS_INC . 'admin-import-export.php' ); 

    /* Load the debugging file */
    require_once ( WPRSS_INC . 'system-info.php' ); 

    /* Load the miscellaneous functions file */
    require_once ( WPRSS_INC . 'misc-functions.php' ); 

    /* Load the OPML Class file */
    require_once ( WPRSS_INC . 'OPML.php' );

    /* Load the OPML Importer file */
    require_once ( WPRSS_INC . 'opml-importer.php' );

    /* Load the system info file */
    require_once ( WPRSS_INC . 'admin-debugging.php' );     

    /* Load the system info file */
    require_once ( WPRSS_INC . 'admin-help.php' );   
    
    /* Load the system info file */
    require_once ( WPRSS_INC . 'admin-addons.php' );   

    /* Load the admin display-related functions */
    require_once ( WPRSS_INC . 'admin-display.php' );     

    /* Load the admin metaboxes functions */
    require_once ( WPRSS_INC . 'admin-metaboxes.php' );     

    /* Load the scripts loading functions file */
    require_once ( WPRSS_INC . 'scripts.php' );   

    /* Load the Ajax notification file */
    require_once ( WPRSS_INC . 'admin-ajax-notice.php' ); 
    
    /* Load the dashboard welcome screen file */
    require_once ( WPRSS_INC . 'admin-dashboard.php' );  

    /* Load the logging class */
    require_once ( WPRSS_INC . 'roles-capabilities.php' );      

    /* Load the security reset file */
    require_once ( WPRSS_INC . 'secure-reset.php' );

	/* Load the licensing file */
	require_once ( WPRSS_INC . 'licensing.php' );
   
    /* Load the admin editor file */
    require_once ( WPRSS_INC . 'admin-editor.php' );

    /* Load the admin heartbeat functions */
    require_once ( WPRSS_INC . 'admin-heartbeat.php' );

    // Load the statistics functions file
    require_once ( WPRSS_INC . 'admin-statistics.php' );

    // Load the logging functions file
    require_once ( WPRSS_INC . 'admin-log.php' );

    
    register_activation_hook( __FILE__ , 'wprss_activate' );
    register_deactivation_hook( __FILE__ , 'wprss_deactivate' );


    add_action( 'init', 'wprss_init' );
    /**
     * Initialise the plugin
     *
     * @since  1.0
     * @return void
     */     
    function wprss_init() {
        //If user requested to download system info, generate the download.
        if ( isset( $_POST['wprss-sysinfo'] ) ) {
            do_action( 'wprss_download_sysinfo' );
        }

        do_action( 'wprss_init' );
    }


    add_filter( 'wprss_admin_pointers', 'wprss_check_tracking_notice' );
    /**
     * Сhecks the tracking option and if not set, shows a pointer with opt in and out options.
     * 
     * @since 3.6
     */
    function wprss_check_tracking_notice( $pointers ){
        $settings = get_option( 'wprss_settings_general', array( 'tracking' => '' ) );
        $wprss_tracking = ( isset( $settings['tracking'] ) )? $settings['tracking'] : '';

        if ( $wprss_tracking === '' ) {
            $tracking_pointer = array(
                'wprss_tracking_pointer'    =>  array(

                    'target'            =>  '#wpadminbar',
                    'options'           =>  array(
                        'content'           =>  '<h3>' . __( 'Help improve WP RSS Aggregator', 'wprss' ) . '</h3>' . '<p>' . __( 'You\'ve just installed WP RSS Aggregator. Please helps us improve it by allowing us to gather anonymous usage stats so we know which configurations, plugins and themes to test with.', 'wprss' ) . '</p>',
                        'position'          =>  array(
                            'edge'              =>  'top',
                            'align'             =>  'center',
                        ),
                        'active'            =>  TRUE,
                        'btns'              =>  array(
                            'wprss-tracking-opt-out'    =>  __( 'Do not allow tracking', 'wprss' ),
                            'wprss-tracking-opt-in'    =>  __( 'Allow tracking', 'wprss' ),
                        )
                    )
                )

            );
            return array_merge( $pointers, $tracking_pointer );
        }
        else return $pointers;
    }


    add_action( 'admin_enqueue_scripts', 'wprss_prepare_pointers', 1000 );
    /**
     * Prepare the admin pointers
     * 
     * @since 3.6
     */
    function wprss_prepare_pointers() {
        // Don't run on WP < 3.3
        if ( get_bloginfo( 'version' ) < '3.3' )
            return;

        // If the user is not an admin, do not show the pointer
        if ( !current_user_can( 'manage_options' ) )
            return;

        $screen = get_current_screen();
        $screen_id = $screen->id;

        // Get pointers
        $pointers = apply_filters( 'wprss_admin_pointers', array() );

        if ( ! $pointers || ! is_array( $pointers ) )
            return;

        $dismissed = explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );
        $valid_pointers = array();

        // Check pointers and remove dismissed ones.
        foreach ( $pointers as $pointer_id => $pointer ) {
            // Sanity check
            if ( in_array( $pointer_id, $dismissed ) || empty( $pointer )  || empty( $pointer_id ) || empty( $pointer['target'] ) || empty( $pointer['options'] ) )
                continue;
            $pointer['pointer_id'] = $pointer_id;
            // Add the pointer to $valid_pointers array
            $valid_pointers['pointers'][] =  $pointer;
        }

        // No valid pointers? Stop here.
        if ( empty( $valid_pointers ) )
            return;

        // Add pointers style to queue.
        wp_enqueue_style( 'wp-pointer' );
     
        // Add pointers script to queue. Add custom script.
        wp_enqueue_script( 'wprss-pointers', WPRSS_JS . 'pointers.js', array( 'wp-pointer' ) );
     
        // Add pointer options to script.
        wp_localize_script( 'wprss-pointers', 'wprssPointers', $valid_pointers );

        add_action( 'admin_print_footer_scripts', 'wprss_footer_pointer_scripts' );
    }


    /**
     * Print the scripts for the admin pointers
     * 
     * @since 3.6
     */
    function wprss_footer_pointer_scripts() {
        ?>
        <script type="text/javascript">

            jQuery(document).ready( function($) {

                for( i in wprssPointers.pointers ) {
                    pointer = wprssPointers.pointers[i];

                    options = $.extend( pointer.options, {
                        content: pointer.options.content,
                        position: pointer.options.position,
                        close: function() {
                            $.post( ajaxurl, {
                                pointer: pointer.pointer_id,
                                action: 'dismiss-wp-pointer'
                            });
                        },
                        buttons: function( event, t ){
                            btns = jQuery('<div></div>');
                            for( i in pointer.options.btns ) {
                                btn = jQuery('<a>').attr('id', i).css('margin-left','5px').text( pointer.options.btns[i] );
                                btn.bind('click.pointer', function () {
                                    t.element.pointer('close');
                                });
                                btns.append( btn );
                            }
                            return btns;
                        }
                    });

                    $(pointer.target).pointer( options ).pointer('open');
                }

                $('#wprss-tracking-opt-in').addClass('button-primary').click( function(){ wprssTrackingOptAJAX(1); } );
                $('#wprss-tracking-opt-out').addClass('button-secondary').click( function(){ wprssTrackingOptAJAX(0); } );;

            });

        </script>

        <?php
    }


    /**
     * Plugin activation procedure
     *
     * @since  1.0
     * @return void
     */  
    function wprss_activate() {
        /* Prevents activation of plugin if compatible version of WordPress not found */
        if ( version_compare( get_bloginfo( 'version' ), '3.3', '<' ) ) {
            deactivate_plugins ( basename( __FILE__ ));     // Deactivate plugin
            wp_die( __( 'This plugin requires WordPress version 3.3 or higher.' ), 'WP RSS Aggregator', array( 'back_link' => true ) );
        }  
        wprss_settings_initialize();
        flush_rewrite_rules();
        wprss_schedule_fetch_all_feeds_cron();

        // Get the previous welcome screen version
        $pwsv = get_option( 'wprss_pwsv', '0.0' );
        // If the aggregator version is higher than the previous version ...
        if ( version_compare( WPRSS_VERSION, $pwsv, '>' ) ) {
            // Sets a transient to trigger a redirect upon completion of activation procedure
            set_transient( '_wprss_activation_redirect', true, 30 );
        }
		
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		// Check if WordPress SEO is activate, if yes set its options for hiding the metaboxes on the wprss_feed and wprss_feed_item screens
		if ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) ) {
			$wpseo_titles = get_option( 'wpseo_titles', array() );
			if ( isset( $wpseo_titles['hideeditbox-wprss_feed'] ) ) {
				$wpseo_titles['hideeditbox-wprss_feed'] = TRUE;
				$wpseo_titles['hideeditbox-wprss_feed_item'] = TRUE;
			}
			update_option( 'wpseo_titles', $wpseo_titles );
		} 
    }    


    /**
     * Plugin deactivation procedure
     *
     * @since 1.0
     */           
    function wprss_deactivate() {
        // On deactivation remove the cron job  
        wp_clear_scheduled_hook( 'wprss_fetch_all_feeds_hook' );
        wp_clear_scheduled_hook( 'wprss_truncate_posts_hook' );
        // Uschedule cron jobs for all feed sources
        $feed_sources = wprss_get_all_feed_sources();
        if( $feed_sources->have_posts() ) {
            // For each feed source
            while ( $feed_sources->have_posts() ) {
                // Stop its cron job
                $feed_sources->the_post();
                wprss_feed_source_update_stop_schedule( get_the_ID() );
            }
            wp_reset_postdata();
        }
        // Flush the rewrite rules
        flush_rewrite_rules();
    }


    add_action( 'plugins_loaded', 'wprss_load_textdomain' );
    /**
     * Loads the plugin's translated strings.
     * 
     * @since  2.1
     * @return void     
     */  
    function wprss_load_textdomain() { 
        load_plugin_textdomain( 'wprss', false, WPRSS_LANG );
    }


    /**
     * Utility filter function that returns TRUE;
     *
     * @since 3.8
     */
    function wprss_enable() {
        return TRUE;
    }


     /**
     * Utility filter function that returns FALSE;
     *
     * @since 3.8
     */
    function wprss_disable() {
        return FALSE;
    }
    
    /**
     * Gets the timezone string that corresponds to the timezone set for
     * this site. If the timezone is a UTC offset, or if it is not set, still
     * returns a valid timezone string.
     * However, if no actual zone exists in the configured offset, the result
     * may be rounded up, or failure.
     * 
     * @see http://pl1.php.net/manual/en/function.timezone-name-from-abbr.php
     * @return string A valid timezone string, or false on failure.
     */
    function wprss_get_timezone_string() {
		$tzstring = get_option( 'timezone_string' );

		if ( empty($tzstring) ) { 
            $offset = ( int )get_option( 'gmt_offset' );
            $tzstring = timezone_name_from_abbr( '', $offset * 60 * 60, 1 );
		}

		return $tzstring;
	}
    

    /**
     * @see http://wordpress.stackexchange.com/questions/94755/converting-timestamps-to-local-time-with-date-l18n#135049
     * @param string|null $format Format to use. Default: Wordpress date and time format.
     * @param int|null $timestamp The timestamp to localize. Default: time().
     * @return string The formatted datetime, localized and offset for local timezone.
     */
    function wprss_local_date_i18n( $timestamp = null, $format = null ) {
        $format = is_null( $format ) ? get_option( 'date_format' ) . ' ' . get_option( 'time_format' ) : $format;
        $timestamp = $timestamp ? $timestamp : time();
        
        $timezone_str = wprss_get_timezone_string() ? wprss_get_timezone_string() : 'UTC';
        $timezone = new DateTimeZone( $timezone_str );

        // The date in the local timezone.
		$date = new DateTime( null, $timezone );
		if ( version_compare(PHP_VERSION, '5.3', '>=') ) {
			$date->setTimestamp( $timestamp );
		} else {
			$datetime = getdate( intval($timestamp) );
			$date->setDate( $datetime['year'] , $datetime['mon'] , $datetime['mday'] );
			$date->setTime( $datetime['hours'] , $datetime['minutes'] , $datetime['seconds'] );
		}
        $date_str = $date->format( 'Y-m-d H:i:s' );
        
        // Pretend the local date is UTC to get the timestamp
        // to pass to date_i18n().
        $utc_timezone = new DateTimeZone( 'UTC' );
        $utc_date = new DateTime( $date_str, $utc_timezone );
        $timestamp = intval( $utc_date->format('U') );

        return date_i18n( $format, $timestamp, true );
    }
    

    /**
     * Gets an internationalized and localized datetime string, defaulting
     * to WP RSS format.
     * 
     * @see wprss_local_date_i18n;
     * @param string|null $format Format to use. Default: Wordpress date and time format.
     * @param int|null $timestamp The timestamp to localize. Default: time().
     * @return string The formatted datetime, localized and offset for local timezone.
     */
    function wprss_date_i18n( $timestamp = null, $format = null ) {
        $format = is_null( $format ) ? wprss_get_general_setting( 'date_format' ) : $format;
        
        return wprss_local_date_i18n( $timestamp, $format );
    }
