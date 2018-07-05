<?php

/**
 * The admin-specific functionality of the plugin
 *
 * @link http://example.com
 *
 * @package Plugin_Name
 * @subpackage Plugin_Name/admin
 * @since 1.0.0
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @since 1.0.0
 */
class Plugin_Name_Admin {

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
	}

	/**
	 * Registers the stylesheets for the admin area.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_styles() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( 'wp-color-picker' );

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/plugin-name-admin.css', array(),
			$this->version, 'all' );
	}

	/**
	 * Registers the JavaScript for the admin area.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_scripts() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 'wp-color-picker' );

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/plugin-name-admin.js',
			array( 'jquery', 'wp-color-picker' ),
			$this->version, true );
	}

	/**
	 * Adds setting pages for plugin.
	 *
	 * Add 3 example pages.
	 *
	 * @since 1.0.0
	 */
	public function add_setting_pages() {
		add_menu_page( __( 'Plugin name', 'plugin-name' ), __( 'Plugin name Settings', 'plugin-name' ),
			'manage_options', 'plugin_name_general', array( $this, 'create_general_page' ), 'dashicons-paperclip' );

		add_submenu_page( 'plugin_name_general', __( 'Plugin name Support', 'plugin-name' ),
			__( 'Support', 'plugin-name' ), 'manage_options', 'plugin_name_support',
			array( $this, 'create_support_page' ) );

		add_submenu_page( 'plugin_name_general', __( 'Plugin name Info', 'plugin-name' ),
			__( 'Info', 'plugin-name' ), 'manage_options', 'plugin_name_welcome',
			array( $this, 'create_welcome_page' ) );
	}

	/**
	 * Creates plugin general setting page in admin area.
	 *
	 * @since 1.0.0
	 */
	public function create_general_page() {
		/**
		 * The file responsible for plugin general admin page.
		 */
		include plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/plugin-name-general-page-display.php';
	}

	/**
	 * Creates plugin support page in admin area.
	 *
	 * @since 1.0.0
	 */
	public function create_support_page() {
		/**
		 * The file responsible for plugin support admin page.
		 */
		include plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/plugin-name-support-page-display.php';
	}

	/**
	 * Creates plugin welcome page in admin area.
	 *
	 * @since 1.0.0
	 */
	public function create_welcome_page() {
		/**
		 * The file responsible for plugin welcome admin page.
		 */
		include plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/plugin-name-welcome-page-display.php';
	}

	/**
	 * Creates settings sections for plugin.
	 *
	 * @since 1.0.0
	 */
	public function register_plugin_settings() {
		register_setting( 'plugin_name_settings_group', 'plugin_name_options',
			array( $this, 'sanitize_options' ) );
	}

	/**
	 * Sanitize options.
	 *
	 * @since 1.0.0
	 *
	 * @param array $input
	 *
	 * @return array $input
	 */
	public function sanitize_options( $input ) {
		$input['option_text'] = isset( $input['option_text'] ) ? sanitize_text_field( $input['option_text'] ) : '';

		$input['option_password'] = isset( $input['option_password'] ) ? htmlspecialchars( $input['option_password'] ) : '';

		$input['option_email'] = isset( $input['option_email'] ) ? sanitize_email( $input['option_email'] ) : '';
		$input['option_tel']   = isset( $input['option_tel'] ) ? Plugin_Name_Helpers::sanitize_phone( $input['option_tel'] ) : '';

		$input['option_url']   = isset( $input['option_url'] ) ? esc_url_raw( $input['option_url'] ) : '';
		$input['option_radio'] = isset( $input['option_radio'] ) ? sanitize_text_field( $input['option_radio'] ) : '';

		$input['option_checkbox'] = isset( $input['option_checkbox'] ) ? 1 : 0;

		$input['option_select'] = isset( $input['option_select'] ) ? sanitize_text_field( $input['option_select'] ) : '';

		$input['option_color'] = isset( $input['option_color'] ) ? sanitize_hex_color( $input['option_color'] ) : '';

		$input['option_number'] = isset( $input['option_number'] ) ? intval( $input['option_number'] ) : '';

		$input['option_range'] = isset( $input['option_range'] ) ? intval( $input['option_range'] ) : 0;

		$input['option_textarea'] = isset( $input['option_textarea'] ) ? sanitize_textarea_field( $input['option_textarea'] ) : '';

		$input['option_time'] = ( isset( $input['option_time'] ) && Plugin_Name_Helpers::validate_date( $input['option_time'],
				'H:i' ) ) ? $input['option_time'] : '';

		$input['option_date'] = ( isset( $input['option_date'] ) && Plugin_Name_Helpers::validate_date( $input['option_date'],
				'Y-m-d' ) ) ? $input['option_date'] : '';

		$input['option_week'] = ( isset( $input['option_week'] ) && Plugin_Name_Helpers::validate_date( $input['option_week'],
				'Y-\WW' ) ) ? $input['option_week'] : '';

		$input['option_month'] = ( isset( $input['option_month'] ) && Plugin_Name_Helpers::validate_date( $input['option_month'],
				'Y-m' ) ) ? $input['option_month'] : '';

		$input['option_datetime-local'] = ( isset( $input['option_datetime-local'] ) && Plugin_Name_Helpers::validate_date( $input['option_datetime-local'],
				'Y-m-d\TH:i' ) ) ? $input['option_datetime-local'] : '';


		return $input;
	}

}