<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://planitappy.com
 * @since             1.0.0
 * @package           Pia_NutritionWizard
 *
 * @wordpress-plugin
/*
Plugin Name: PlanItAppy Nutrition Wizard 
Plugin URI:  https://wordpress.org/plugins/plan-it-appy-nutrition-wizard/
Description: Get your client's dietary requirements for a nutrition plan direct from your Wordpress website.
Version:     1.2
Author:      PlanItAppy
Author URI:  https://planitappy.com
License:     GPL3
License URI: https://opensource.org/licenses/GPL-3.0
Text Domain: pia-nutrition-wizard
Domain Path: /languages

{Plugin Name} is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
{Plugin Name} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {License URI}.
*/
 

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-pia-nutrition-wizard-activator.php
 */
function activate_pia_nutrition_wizard() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pia-nutrition-wizard-activator.php';
	wp_register_style( 'namespace', '/public/css/pia-nutrition-wizard-public.css' );
	Pia_NutritionWizard_Activator::activate();
	wp_enqueue_style('namespace');
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-pia-nutrition-wizard-deactivator.php
 */
function deactivate_pia_nutrition_wizard() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pia-nutrition-wizard-deactivator.php';
	Pia_NutritionWizard_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_pia_nutrition_wizard' );
register_deactivation_hook( __FILE__, 'deactivate_pia_nutrition_wizard' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-pia-nutrition-wizard.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function pia_run_pia_nutrition_wizard() {

	$plugin = new Pia_NutritionWizard();
	$plugin->run();

}
pia_run_pia_nutrition_wizard();



function pia_nutrition_wizard_display() { 

	$store_url = get_option("pia_store_url");
	$store_url = "https://" . $store_url . ".planitappy.com/classic/zNutritionPlan";
	$store_url = esc_url($store_url);
	$echo_string =  '<div class="responsive_iframe"><iframe frameBorder="0" id="booking-iframe" style="width: 100%; height: 450px;" src="' . $store_url . '" ></iframe></div>';
	return $echo_string;

}

function pia_plugin_menu_nutrition_wizard() {
	add_menu_page('PlanItAppy Nutrition Wizard Settings', 'PlanItAppy Nutrition Wizard Settings', 'administrator', 'pia-nutrition-wizard', 'pia_nutrition_wizard_display_plugin_setup_page', 'dashicons-carrot');
}


function pia_nutrition_wizard_display_plugin_setup_page() {
    include_once(plugin_dir_path( __FILE__ ) . 'admin/partials/pia-nutrition-wizard-admin-display.php' );
}



/* Actions */




add_action('admin_menu', 'pia_plugin_menu_nutrition_wizard');


/* Shortcodes */

add_shortcode('pia_nutrition_wizard', 'pia_nutrition_wizard_display');






