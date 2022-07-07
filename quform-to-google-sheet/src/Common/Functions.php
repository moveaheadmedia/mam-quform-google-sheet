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

namespace QuformToGoogleSheet\Common;

use QuformToGoogleSheet\App\Frontend\Templates;
use QuformToGoogleSheet\Common\Abstracts\Base;

/**
 * Main function class for external uses
 *
 * @see quform_to_google_sheet()
 * @package QuformToGoogleSheet\Common
 */
class Functions extends Base {
	/**
	 * Get plugin data by using quform_to_google_sheet()->getData()
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function getData(): array {
		return $this->plugin->data();
	}

	/**
	 * Get the template instantiated class using quform_to_google_sheet()->templates()
	 *
	 * @return Templates
	 * @since 1.0.0
	 */
	public function templates(): Templates {
		return new Templates();
	}
}
