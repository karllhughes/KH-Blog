<?php
/**
 * @package KH_Custom_Code
 * @version 0.1.1
 */
/*
Plugin Name: Custom Wordpress Code
Plugin URI: http://www.karllhughes.com/
Description: Just some custom stuff I like
Author: Karl Hughes
Version: 0.1.1
Author URI: http://www.karllhughes.com/
*/

    // Don't send admin core update emails.
    add_filter( 'auto_core_update_send_email', '__return_false' );
?>
