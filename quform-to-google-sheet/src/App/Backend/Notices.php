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
 * Class Notices
 *
 * @package QuformToGoogleSheet\App\Backend
 * @since 1.0.0
 */
class Notices extends Base {

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
		 * Add plugin code here for admin notices specific functions
		 */
		add_action( 'admin_notices', [ $this, 'exampleAdminNotice' ] );
	}

	/**
	 * Example admin notice
	 *
	 * @since 1.0.0
	 */
	public function exampleAdminNotice() {
		global $pagenow;
		if ( $pagenow === 'options-general.php' ) {
			echo '<div class="notice notice-warning is-dismissible">
             <p>' . __( 'This is an example of a notice that appears on the settings page.', 'quform-to-google-sheet' ) . '</p>
         </div>';
		}
	}
}
