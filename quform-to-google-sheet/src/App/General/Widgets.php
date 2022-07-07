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

namespace QuformToGoogleSheet\App\General;

use QuformToGoogleSheet\Common\Abstracts\Base;

/**
 * Class Widgets
 *
 * @package QuformToGoogleSheet\App\General
 * @since 1.0.0
 */
class Widgets extends Base {

	/**
	 * Initialize the class.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		/**
		 * This general class is always being instantiated as requested in the Bootstrap class
		 *
		 * @see Bootstrap::__construct
		 *
		 * Widget is registered from the Integrations folder, but it can also be registered
		 * from the integration class file self
		 * @see HTML_Widget::init()
		 */
		add_action( 'widgets_init', function () {
			register_widget( $this->plugin->namespace() . '\Integrations\Widget\HTML_Widget' );
		} );
	}
}

