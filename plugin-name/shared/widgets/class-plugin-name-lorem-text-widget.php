<?php
/**
 * Widget API: Widget Lorem text
 *
 * @link       http://example.com
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/widgets
 * @since      1.0.0
 */


/**
 * Outputs lorem inspum text in widget.
 *
 * @since 1.0.0
 */
class Plugin_Name_Lorem_Text_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$id_base = 'class-plugin-name-lorem-text-widget';

		$name = __( 'Plugin Name Lorem Text Widget', 'plugin-name' );

		$widget_options = array(
			'classname'   => 'plugin-name-lorem-text-widget',
			'description' => __( 'Lorem text widget.', 'plugin-name' ),
		);

		$control_options = array(
			'width'  => 400,
			'height' => 350,
		);

		parent::__construct( $id_base, $name, $widget_options, $control_options );
	}

	/**
	 * Outputs the content of the widget.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		echo '<div class="widget-content">' . Plugin_Name_Helpers::get_lorem( $instance['amount'],
				$instance['what'], $instance['cache'] ) . '</div>';

		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin.
	 *
	 * @since 1.0.0
	 *
	 * @param array $instance The widget options.
	 */
	public function form( $instance ) {
		$title  = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'plugin-name' );
		$amount = ! empty( $instance['amount'] ) ? $instance['amount'] : 5;
		$what   = ! empty( $instance['what'] ) ? $instance['what'] : 'paras';
		$cache  = ! empty( $instance['cache'] ) ? $instance['cache'] : 'yes';
		?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:',
					'plugin-name' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'amount' ) ); ?>"><?php esc_attr_e( 'Amount:',
					'plugin-name' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'amount' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'amount' ) ); ?>" type="number"
                   value="<?php echo esc_attr( $amount ); ?>" min="1">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'what' ) ); ?>"><?php esc_attr_e( 'What:',
					'plugin-name' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'what' ) ); ?>"
                    name="<?php echo esc_attr( $this->get_field_name( 'what' ) ); ?>">
                <option value="paras" <?php selected( $what, 'paras',
					true ); ?>><?php _e( 'Paragraph', 'plugin-name' ); ?></option>
                <option value="words" <?php selected( $what, 'words',
					true ); ?>><?php _e( 'Words', 'plugin-name' ); ?></option>
                <option value="bytes" <?php selected( $what, 'bytes',
					true ); ?>><?php _e( 'Bytes', 'plugin-name' ); ?></option>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'cache' ) ); ?>"><?php esc_attr_e( 'Enable cache:',
					'plugin-name' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'cache' ) ); ?>"
                    name="<?php echo esc_attr( $this->get_field_name( 'cache' ) ); ?>">
                <option value="yes" <?php selected( $cache, 'yes',
					true ); ?>><?php _e( 'yes', 'plugin-name' ); ?></option>
                <option value="no" <?php selected( $cache, 'no',
					true ); ?>><?php _e( 'no', 'plugin-name' ); ?></option>
            </select>

        </p>
		<?php
	}

	/**
	 * Processing widget options on save.
	 *
	 * @since 1.0.0
	 *
	 * @param array $new_instance The new options.
	 * @param array $old_instance The previous options.
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title']  = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['amount'] = ( ! empty( $new_instance['amount'] ) ) ? absint( $new_instance['amount'] ) : 5;
		$instance['what']   = ( ! empty( $new_instance['what'] ) ) ? sanitize_textarea_field( $new_instance['what'] ) : 'paras';
		$instance['cache']  = ( ! empty( $new_instance['cache'] ) ) ? sanitize_textarea_field( $new_instance['cache'] ) : 'yes';

		return $instance;
	}

}