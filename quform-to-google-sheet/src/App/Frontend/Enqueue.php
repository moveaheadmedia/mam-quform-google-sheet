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

namespace QuformToGoogleSheet\App\Frontend;

use QuformToGoogleSheet\Common\Abstracts\Base;

/**
 * Class Enqueue
 *
 * @package QuformToGoogleSheet\App\Frontend
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
		 * This frontend class is only being instantiated in the frontend as requested in the Bootstrap class
		 *
		 * @see Requester::isFrontend()
		 * @see Bootstrap::__construct
		 *
		 * Add plugin code here
		 */
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueueScripts' ] );
	}

	/**
	 * Enqueue scripts function
	 *
	 * @since 1.0.0
	 */
	public function enqueueScripts() {
		// Enqueue CSS
		foreach (
			[
				[
					'deps'    => [],
					'handle'  => 'plugin-name-frontend-css',
					'media'   => 'all',
					'source'  => plugins_url( '/assets/public/css/frontend.css', QUFORM_TO_GOOGLE_SHEET_PLUGIN_FILE ), // phpcs:disable ImportDetection.Imports.RequireImports.Symbol -- this constant is global
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
					'handle'    => 'plugin-test-frontend-js',
					'in_footer' => true,
					'source'    => plugins_url( '/assets/public/js/frontend.js', QUFORM_TO_GOOGLE_SHEET_PLUGIN_FILE ), // phpcs:disable ImportDetection.Imports.RequireImports.Symbol -- this constant is global
					'version'   => $this->plugin->version(),
				],
			] as $js ) {
			wp_enqueue_script( $js['handle'], $js['source'], $js['deps'], $js['version'], $js['in_footer'] );
		}

		// Send variables to JS
		global $wp_query;

		// localize script and send variables
		wp_localize_script( 'plugin-test-frontend-js', 'plugin_frontend_script',
			[
				'plugin_frontend_url'  => admin_url( 'admin-ajax.php' ),
				'plugin_wp_query_vars' => $wp_query->query_vars,
			]
		);
	}
}
