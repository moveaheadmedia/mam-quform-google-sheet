<?php
/**
 * Quform To Google Sheet
 *
 * @package   quform-to-google-sheet
 * @author    Salti Media <ali@salti-media.com>
 * @copyright 2022 Quform To Google Sheet
 * @license   MIT
 * @link      https://salti-media.com
 */

declare( strict_types = 1 );

namespace QuformToGoogleSheet\App\Backend;

use QuformToGoogleSheet\Common\Abstracts\Base;

/**
 * Class Enqueue
 *
 * @package QuformToGoogleSheet\App\Backend
 * @since 1.0.0
 */
class Enqueue extends Base {

	/**
	 * Initialize the class.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		/**
		 * This backend class is only being instantiated in the backend as requested in the Bootstrap class
		 *
		 * @see Requester::isAdminBackend()
		 * @see Bootstrap::__construct
		 *
		 * Add plugin code here
		 */
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueueScripts' ] );
	}

	/**
	 * Enqueue scripts
	 *
	 * @since 1.0.0
	 */
	public function enqueueScripts() {
		// Enqueue CSS
		foreach (
			[
				[
					'deps'    => [],
					'handle'  => 'plugin-name-backend-css',
					'media'   => 'all',
					'source'  => plugins_url( '/assets/public/css/backend.css', QUFORM_TO_GOOGLE_SHEET_PLUGIN_FILE ), // phpcs:disable ImportDetection.Imports.RequireImports.Symbol -- this constant is global
					'version' => $this->plugin->version(),
				],
			] as $css ) {
			wp_enqueue_style( $css['handle'], $css['source'], $css['deps'], $css['version'], $css['media'] );
		}
		// Enqueue JS
		foreach (
			[
				[
					'deps'      => [],
					'handle'    => 'plugin-test-backend-js',
					'in_footer' => true,
					'source'    => plugins_url( '/assets/public/js/backend.js', QUFORM_TO_GOOGLE_SHEET_PLUGIN_FILE ), // phpcs:disable ImportDetection.Imports.RequireImports.Symbol -- this constant is global
					'version'   => $this->plugin->version(),
				],
			] as $js ) {
			wp_enqueue_script( $js['handle'], $js['source'], $js['deps'], $js['version'], $js['in_footer'] );
		}
	}
}
