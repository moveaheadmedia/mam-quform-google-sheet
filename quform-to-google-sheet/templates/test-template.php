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
?>
<p>
    <?php
    /**
     * @see \QuformToGoogleSheet\App\Frontend\Templates
     * @var $args
     */
    echo __( 'This is being loaded inside "wp_footer" from the templates class', 'quform-to-google-sheet' ) . ' ' . $args[ 'data' ][ 'text' ];
    ?>
</p>
