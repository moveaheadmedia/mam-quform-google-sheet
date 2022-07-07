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

namespace QuformToGoogleSheet\Common\Traits;

/**
 * The singleton skeleton trait to instantiate the class only once
 *
 * @package QuformToGoogleSheet\Common\Traits
 * @since 1.0.0
 */
trait Singleton {
	private static $instance;

	final private function __construct() {
	}

	final private function __clone() {
	}

	final private function __wakeup() {
	}

	/**
	 * @return self
	 * @since 1.0.0
	 */
	final public static function init(): self {
		if ( ! self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
}
