<?php 
/**
 * mmr-stripe-form
 *
 * Mostrar un formulario personalizado mostrando las claves de stripe
 *
 * @author   Manuel Muñoz <manolo@closemarketing.net>
 * @category category
 * @package  package
 * @version  1.0
 */

if( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'MMRPLUGIN_NAME', 'Stripe forms gutenberg' );
define( 'MMRPLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'MMRPLUGIN_ADMIN_PATH', plugin_dir_path( __FILE__ ) . '/admin/' );


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
	register_setting( 'mmr-stripe-settings', 'mmr-stripe-api-secret' );
	register_setting( 'mmr-stripe-settings', 'mmr-stripe-api-public' );
}


