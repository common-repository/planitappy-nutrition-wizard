<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://planitappy.com
 * @since      1.0.0
 *
 * @package    Pia_NutritionWizard
 * @subpackage Pia_NutritionWizard/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Pia_NutritionWizard
 * @subpackage Pia_NutritionWizard/includes
 * @author     PlanItAppy <info@planitappy.com>
 */
class Pia_NutritionWizard_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'pia-nutrition-wizard',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
