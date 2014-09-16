<?php

	/**
	 * Returns the log file path.
	 * 
	 * @since 4.0.4
	 */
	function wprss_log_file() {
		return WPRSS_LOG_FILE . '-' . get_current_blog_id() . WPRSS_LOG_FILE_EXT;
	}


	/**
	 * Clears the log file.
	 *
	 * @since 3.9.6
	 */
	function wprss_clear_log() {
		file_put_contents( wprss_log_file(), '' );
	}


	/**
	 * Alias for wprss_clear_log(). Used for code readability.
	 *
	 * @since 3.9.6
	 */
	function wprss_reset_log() {
		wprss_clear_log();
	}


	/**
	 * Adds a log entry to the log file.
	 *
	 * @since 3.9.6
	 */
	function wprss_log( $message, $src = NULL ) {
		if ( $src === NULL ) {
			$callers = debug_backtrace();
			$src = $callers[1]['function'];
		}
		$date =  date( 'd-m-Y H:i:s' );
		$source = 'WPRSS' . ( ( strlen( $src ) > 0 )? " > $src" : '' ) ;
		$str = "[$date] $source:\n";
		$str .= "$message\n";
		file_put_contents( wprss_log_file() , $str, FILE_APPEND );

		add_action( 'shutdown', 'wprss_log_separator' );
	}


	/**
	 * Dumps an object to the log file.
	 *
	 * @since 3.9.6
	 */
	function wprss_log_obj( $message, $obj, $src = '' ) {
		wprss_log( "$message: " . print_r( $obj, TRUE ), $src );
	}


	/**
	 * Returns the contents of the log file.
	 *
	 * @since 3.9.6
	 */
	function wprss_get_log() {
		if ( !file_exists( wprss_log_file() ) ) {
			wprss_clear_log();
		}
		$contents = file_get_contents(  wprss_log_file() , '' );
		// Trim the log file to a fixed number of chars
		$limit = 10000;
		if ( strlen( $contents ) > $limit ) {
			file_put_contents( wprss_log_file(), substr( $contents, 0, $limit ) );
			return wprss_get_log();
		} else {
			return $contents;
		}
	}


	/**
	 * Adds an empty line at the end of the log file.
	 *
	 * This function is called on wordpress shutdown, if at least one new line
	 * is logged in the log file, to separate logs from different page loads.
	 *
	 * @since 3.9.6
	 */
	function wprss_log_separator() {
		file_put_contents( wprss_log_file(), "\n", FILE_APPEND );	
	}