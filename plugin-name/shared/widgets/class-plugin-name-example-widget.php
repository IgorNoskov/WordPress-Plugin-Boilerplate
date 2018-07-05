<?php
/**
 * Widget example
 *
 * @link http://example.com
 *
 * @package Plugin_Name
 * @subpackage Plugin_Name/includes/widgets
 * @since 1.0.0
 */


/**
 * Text widget example.
 *
 * @since 1.0.0
 */
class Plugin_Name_Example_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$id_base = 'class-plugin-name-example-widget';

		$name = __( 'Plugin Name Example Widget', 'plugin-name' );

		$widget_options = array(
			'classname'   => 'plugin-name-example-widget',
			'description' => __( 'Example text widget', 'plugin-name' ),
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

		if ( ! empty( $instance['text'] ) ) {
			echo '<div class="widget-content">' . esc_html( $instance['text'] ) . '</div>';
		}

		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin.
	 *
	 * @since 1.0.0
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'plugin-name' );
		$text  = ! empty( $instance['text'] ) ? $instance['text'] : '';
		?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:',
					'plugin-name' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php esc_attr_e( 'Text:',
					'plugin-name' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"
                      name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>"><?php echo esc_textarea( $text ); ?></textarea>
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
	 * @return array $instance
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['text']  = ( ! empty( $new_instance['text'] ) ) ? sanitize_textarea_field( $new_instance['text'] ) : '';

		return $instance;
	}

}
