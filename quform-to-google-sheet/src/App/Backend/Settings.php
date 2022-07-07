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

declare(strict_types=1);

namespace QuformToGoogleSheet\App\Backend;

use QuformToGoogleSheet\Common\Abstracts\Base;

/**
 * Class Settings
 *
 * @package QuformToGoogleSheet\App\Backend
 * @since 1.0.0
 */
class Settings extends Base
{

    /**
     * Initialize the class.
     *
     * @since 1.0.0
     */
    public function init()
    {
        /**
         * This backend class is only being instantiated in the backend as requested in the Bootstrap class
         *
         * @see Requester::isAdminBackend()
         * @see Bootstrap::__construct
         *
         */
        add_action('init', [$this, 'add_option_page']);
        add_action('init', [$this, 'add_option_page_acf']);
    }

    public function add_option_page()
    {
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page([
                'page_title' => 'Quform To Google Sheet',
                'menu_title' => 'Quform To <br />Google Sheet',
                'menu_slug' => 'quform-to-google-sheet',
                'capability' => 'edit_posts',
                'icon_url' => 'dashicons-editor-table',
                'redirect' => false,
            ]);
        }
    }

    public function add_option_page_acf()
    {
        if (function_exists('acf_add_local_field_group')) {
            $acf = json_decode(file_get_contents(plugin_dir_path(QUFORM_TO_GOOGLE_SHEET_PLUGIN_FILE) . '/assets/admin/acf.json'), true);
            acf_add_local_field_group($acf[0]);
        }
    }
}
