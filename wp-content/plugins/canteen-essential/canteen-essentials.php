<?php
/**
 * Plugin Name: Canteen Essentials
 * Plugin URI: http://themeforest.net/user/design_story
 * Description: This is plugin bundle for Canteen WordPress Theme.
 * Author: design_story
 * Author URI: http://themeforest.net/user/design_story
 * Version: 1.0
 * text domain: canteen-essential
 */


define('ALLOW_UNFILTERED_UPLOADS', true);
function canteen_mime_types( $mimes ) {
	
        // New allowed mime types.
        $mimes['svg'] = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';
        $mimes['doc'] = 'application/msword'; 

        // Optional. Remove a mime type.
        unset( $mimes['exe'] );

	return $mimes;
}
add_filter( 'upload_mimes', 'canteen_mime_types' );

add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
// add your extension to the array
$existing_mimes['otf'] = 'application/otf';
return $existing_mimes;
}



if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'CANTEEN__FILE__', __FILE__ );
define( 'CANTEEN_URL', plugins_url( '/', CANTEEN__FILE__ ) );
define( 'CANTEEN_PLUGIN_BASE', plugin_basename( CANTEEN__FILE__ ) );


/**
 * Load Hello World
 *
 * Load the plugin after Elementor (and other plugins) are loaded.
 *
 * @since 1.0.0
 */
function canteen_plg_load() {
	// Load localization file
	load_plugin_textdomain( 'canteen_plg' ); 

	// Require the main plugin file
	require( __DIR__ . '/plugin.php' );
	// require __DIR__ . '/modules/plugin.php';
	//require __DIR__ . '/control/animation.php';


}
add_action( 'plugins_loaded','canteen_plg_load' );


function canteen_plg_fail_load_out_of_date() {
	if ( ! current_user_can( 'update_plugins' ) ) {
		return;
	}

	$file_path = 'elementor/elementor.php';

	$upgrade_link = wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' ) . $file_path, 'upgrade-plugin_' . $file_path );
	$message = '<p>' . __( 'Canteen Plugin is not working because you are using an old version of Elementor.', 'canteen-essential' ) . '</p>';
	$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $upgrade_link, __( 'Update Elementor Now', 'canteen-essential' ) ) . '</p>';

	echo '<div class="error">' . $message . '</div>';
}


//adding reduxoptions into themes
/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );
	/**
 * Optional: set 'ot_show_new_layout' filter to false.
 * This will hide the "New Layout" section on the Theme Options page.
 */
add_filter( 'ot_show_new_layout', '__return_false' );



//include elementor addon
include('inc/elementor-addon.php');

//include portfolio custom post type,metaboxes & single portfolio script
include('inc/portfolio.php');
include('inc/portfolio-metaboxes.php');

//include page metabox
include('inc/page-metaboxes.php');

//include post metabox
include('inc/post-metaboxes.php');
include('meta-box/meta-box.php');

//include custom footer
include('inc/footer.php');

//include custom header
include('inc/header.php');

//include admin custom script 
include('inc/admin-script.php');

//include single portfolio function
include('inc/single-portfolio.php');



//included custom widget
include('inc/about-us.php');

//included recent posts widget
include('inc/recent-posts.php');

//included sharing
include('inc/sharebox.php');

//included one click importer
include('inc/one-click.php');

//included shortcode importer
include('inc/shortcode.php');

//reduxoptions included function
//included theme options export/import
include('inc/theme-import.php');
//included theme options
include('inc/theme-options.php');

//included Redux Framework
require_once('inc/framework/class.redux-plugin.php');
require_once('inc/framework/init.php');

function canteen_admin_styles() {
  wp_enqueue_style('admin-styles', CANTEEN_URL.'inc/css/admin.css');
}
add_action('admin_enqueue_scripts', 'canteen_admin_styles');


//plugin translation
function canteen_textdomain_translation() {
    load_plugin_textdomain('canteen-essential', false, dirname(plugin_basename(__FILE__)) . '/lang/');
} // end custom_theme_setup
add_action('after_setup_theme', 'canteen_textdomain_translation');

