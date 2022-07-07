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
 * Class Shortcodes
 *
 * @package QuformToGoogleSheet\App\General
 * @since 1.0.0
 */
class Shortcodes extends Base {
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
		 * Add plugin code here
		 */

		add_shortcode( 'foobar', [ $this, 'foobarFunc' ] );
	}

	/**
	 * Shortcode example
	 *
	 * @param array $atts Parameters.
	 * @return string
	 * @since 1.0.0
	 */
	public function foobarFunc( array $atts ): string {
		shortcode_atts(
			[
				'foo' => 'something',
				'bar' => 'something else',
			], $atts
		);
		return '<span class="foo">foo = ' . $atts['foo'] . '</span>' .
			'<span class="bar">foo = ' . $atts['bar'] . '</span>';
	}
}
