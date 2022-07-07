<?php
/**
 * Quform To Google Sheet
 *
 * @package   quform-to-google-sheet
 * @author    Salti Media <ali@salti-media.com>
 * @copyright 2022 Quform To Google Sheet
 * @license   MIT
 * @link      https://salti-media.com
 *
 * Plugin Name:     Quform To Google Sheet
 * Plugin URI:      https://salti-media.com
 * Description:     Connect Quform forms to google sheets
 * Version:         0.0.1
 * Author:          Salti Media
 * Author URI:      https://salti-media.com
 * Text Domain:     quform-to-google-sheet
 * Domain Path:     /languages
 * Requires PHP:    7.1
 * Requires WP:     5.5.0
 * Namespace:       QuformToGoogleSheet
 */

declare( strict_types = 1 );

/**
 * Define the default root file of the plugin
 *
 * @since 1.0.0
 */
const QUFORM_TO_GOOGLE_SHEET_PLUGIN_FILE = __FILE__;

/**
 * Load PSR4 autoloader
 *
 * @since 1.0.0
 */
$quform_to_google_sheet_autoloader = require plugin_dir_path( QUFORM_TO_GOOGLE_SHEET_PLUGIN_FILE ) . 'vendor/autoload.php';

/**
 * Setup hooks (activation, deactivation, uninstall)
 *
 * @since 1.0.0
 */
register_activation_hook( __FILE__, [ 'QuformToGoogleSheet\Config\Setup', 'activation' ] );
register_deactivation_hook( __FILE__, [ 'QuformToGoogleSheet\Config\Setup', 'deactivation' ] );
register_uninstall_hook( __FILE__, [ 'QuformToGoogleSheet\Config\Setup', 'uninstall' ] );

/**
 * Bootstrap the plugin
 *
 * @since 1.0.0
 */
if ( ! class_exists( '\QuformToGoogleSheet\Bootstrap' ) ) {
	wp_die( __( 'Quform To Google Sheet is unable to find the Bootstrap class.', 'quform-to-google-sheet' ) );
}
add_action(
	'plugins_loaded',
	static function () use ( $quform_to_google_sheet_autoloader ) {
		/**
		 * @see \QuformToGoogleSheet\Bootstrap
		 */
		try {
			new \QuformToGoogleSheet\Bootstrap( $quform_to_google_sheet_autoloader );
		} catch ( Exception $e ) {
			wp_die( __( 'Quform To Google Sheet is unable to run the Bootstrap class.', 'quform-to-google-sheet' ) );
		}
	}
);

/**
 * Create a main function for external uses
 *
 * @return \QuformToGoogleSheet\Common\Functions
 * @since 1.0.0
 */
function quform_to_google_sheet(): \QuformToGoogleSheet\Common\Functions {
	return new \QuformToGoogleSheet\Common\Functions();
}
