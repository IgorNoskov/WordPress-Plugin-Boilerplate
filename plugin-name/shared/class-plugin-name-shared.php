<?php

/**
 * The both admin and public specific functionality of the plugin
 *
 * @link http://example.com
 *
 * @package Plugin_Name
 * @subpackage Plugin_Name/admin
 * @since 1.0.0
 */

/**
 * The both admin and public specific functionality of the plugin.
 *
 * Defines the plugin name, version, loads and registers widgets.
 *
 * @since 1.0.0
 */
class Plugin_Name_Shared {

	/**
	 * The ID of this plugin.
	 *
	 * @since 1.0.0
	 * @access private
	 * @var string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since 1.0.0
	 * @access private
	 * @var string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initializes the class and set its properties.
	 *
	 * @since 1.0.0
	 *
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		$this->load_widgets();
	}

	/**
	 * Loads widgets.
	 *
	 * @since 1.0.0
	 */
	public function load_widgets() {
		/**
		 * The class responsible for widget Plugin_Name_Example_Widget.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'shared/widgets/class-plugin-name-example-widget.php';

		/**
		 * The class responsible for widget Plugin_Name_Lorem_Text_Widget.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'shared/widgets/class-plugin-name-lorem-text-widget.php';
	}

	/**
	 * Register widgets.
	 *
	 * @since 1.0.0
	 */
	public function register_widgets() {
		register_widget( 'Plugin_Name_Example_Widget' );
		register_widget( 'Plugin_Name_Lorem_Text_Widget' );
	}

}