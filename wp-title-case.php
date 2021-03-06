<?php
/**
 * Title Capitalization For WordPress
 *
 * Title Capitalization For WordPress is a plugin that converts post titles and post content
 * heading elements (that is, `h1`, `h2`, ..., `h6`) into properly capitalized headings.
 *
 * This is based on the work of John Gruber, David Gouch, and Kroc Camen that has been adapted
 * into a WordPress plugin.
 *
 * @package   TitleCaps
 * @author    Tom McFarlin <tom@tommcfarlin.com>
 * @license   GPL-2.0+
 * @link      http://tommcfarlin.com/title-capitalization-for-wordpress/
 * @copyright 2014 Tom McFarlin
 *
 * @wordpress-plugin
 * Plugin Name:       Title Capitalization For WordPress
 * Plugin URI:        http://tommcfarlin.com/title-capitalization-for-wordpress/
 * Description:       Converts post and page titles and post content headings into poroper capitalization.
 * Version:           1.0.0
 * Author:            Tom McFarlin
 * Author URI:        http://tommcfarlin.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: https://github.com/tommcfarlin/title-capitalization-for-wordpress
 * title-capitalization-for-wordpress v1.0.0
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Only run this plugin if we're in the dashboard.
if ( is_admin() ) {

	/**
	 * Load the Title Case Library.
	 */
	require_once( plugin_dir_path( __FILE__ ) . 'inc/lib/class-title-case.php' );

	/**
	 * Load the class responsible for defining actions and their callbacks.
	 */
	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-title-caps-loader.php' );

	/**
	 * Load the core plugin file responsible for processing titles and headings.
	 */
	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-title-capitalizer.php' );

	$title_caps_loader = new TitleCapsLoader();
	$title_caps_loader->init( new TitleCapitalizer( new TitleCase() ) );

}