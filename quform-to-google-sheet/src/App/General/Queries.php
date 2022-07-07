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
use QuformToGoogleSheet\App\General\PostTypes;
use WP_Query;

/**
 * Class Queries
 *
 * @package QuformToGoogleSheet\App\General
 * @since 1.0.0
 */
class Queries extends Base {

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
	}

	/**
	 * @param $posts_count
	 * @param string $orderby
	 * @return WP_Query
	 */
	public function getPosts( $posts_count, $orderby = 'date' ): \WP_Query {
		return new WP_Query(
			[
				'post_type'      => PostTypes::POST_TYPE['id'],
				'post_status'    => 'publish',
				'order'          => 'DESC',
				'posts_per_page' => $posts_count,
				'orderby'        => $orderby,
			]
		);
	}
}
