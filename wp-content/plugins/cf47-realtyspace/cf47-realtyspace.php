<?php
/**
 * @link              http://codefactory47.com
 * @since             1.0.0
 * @package           cf47realtyspace
 *
 * @wordpress-plugin
 * Plugin Name:       Realtyspace Companion
 * Plugin URI:        http://codefactory47.com
 * Description:       This is a required plugin for Realtyspace, that contains custom post types, shortcodes, etc.
 * Version:           1.4.13
 * Author:            Codefactory47
 * Author URI:        http://codefactory47.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       realtyspace
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

const CF47RS_COMPANION_VERSION = '1.4.0';

if (version_compare(phpversion(), '5.4.0', '<') === -1) {
    return;
}

require plugin_dir_path(__FILE__) . 'lib/bootstrap.php';
