<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.virtualbit.it
 * @since             1.0.0
 * @package           Blankcodes
 *
 * @wordpress-plugin
 * Plugin Name:       BlankCodes
 * Plugin URI:        https://www.virtualbit.it/blankcodes
 * Description:       Renders blank configured shortcodes 
 * Version:           1.0.0-rev9
 * Author:            Lucio Crusca
 * Author URI:        https://www.virtualbit.it
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       blankcodes
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-blankcodes-activator.php
 */
function activate_blankcodes() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-blankcodes-activator.php';
	Blankcodes_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-blankcodes-deactivator.php
 */
function deactivate_blankcodes() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-blankcodes-deactivator.php';
	Blankcodes_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_blankcodes' );
register_deactivation_hook( __FILE__, 'deactivate_blankcodes' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-blankcodes.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_blankcodes() {

	$plugin = new Blankcodes();
	$plugin->run();

}
run_blankcodes();
