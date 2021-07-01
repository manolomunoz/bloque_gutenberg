<?php 
/**
 * Plugin Name: MMR Stripe Form
 * Plugin URI:  plugin-url
 * Description: Creación de un formulario de stripe guardando la api secreta y publica en la administración.
 * Version:     1.0
 * Author:      Manuel Muñoz Rodríguez <manolo@closemarketing.net>
 * Author URI:  manolomunoz
 * Text Domain: mmr-stripe-form
 * Domain Path: /languages
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package     mmr-stripe-form
 * @author      Manuel Muñoz Rodríguez <manolo@closemarketing.net>
 * @copyright   2021
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 *
 * Prefix:      mmr
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

define( 'MMRPLUGIN_NAME', 'Stripe forms gutenberg' );
define( 'MMRPLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'MMRPLUGIN_ADMIN_PATH', plugin_dir_path( __FILE__ ) . '/admin/' );

add_action( 'plugins_loaded', 'mmr_plugin_init' );
/**
 * Load localization files
 *
 * @return void
 */
function mmr_plugin_init() {
	load_plugin_textdomain( 'mmr-stripe-form', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

add_action( 'admin_menu', 'mmr_stripe_form_menu' );
/**
 * Creación del menú de la parte de admin
 *
 * @return void
 */
function mmr_stripe_form_menu() {
	add_menu_page( MMRPLUGIN_NAME, MMRPLUGIN_NAME, 'manage_options', MMRPLUGIN_ADMIN_PATH . 'options.php' );
}

add_action( 'admin_init', 'mmr_stripe_form_settings' );
/**
 * Configuraciones del plugin en la parte de administración
 *
 * @return void
 */
function mmr_stripe_form_settings() {
	register_setting( 'mmr-stripe-settings', 'mmr_stripe_api_secret' );
	register_setting( 'mmr-stripe-settings', 'mmr_stripe_api_public' );
}


add_action( 'init', 'mmr_stripe_block_gutenberg' );
/**
 * Crear un bloque en gutenberg
 *
 * @return void
 */
function mmr_stripe_block_gutenberg() {
	wp_register_script( 
		'stripe-forms', 
		plugins_url( 'stripe-block.js', __FILE__ ), 
		array( 'wp-blocks', 'wp-element', 'wp-i18n' ),
		filemtime( plugin_dir_path(__FILE__).'stripe-block.js' ) 
	);

	register_block_type( 'gutenberg-manolo/stripe-forms', array(
		'editor_script' => 'stripe-forms'
	) );

	wp_localize_script( 'stripe-forms', 'custom_data', [ 'siteUrl' => get_site_url() ] );

}

add_action( 'init', 'mmr_stripe_form_url_gutenberg' );
add_action( 'parse_request', 'mmr_stripe_form_url_gutenberg' );
/**
 * Función para registrar el bloque en gutenberg
 *
 * @return void
 */
function mmr_stripe_form_url_gutenberg() {
	if( isset($_GET['gutenbergstripeform']) ) {
		require 'stripe/index.php';
		exit;
	}
}
