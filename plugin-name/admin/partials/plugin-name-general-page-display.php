<?php

/**
 * Provide plugin general setting page
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @package Plugin_Name
 * @subpackage Plugin_Name/admin/partials
 * @since 1.0.0
 */
?>

<div class="wrap">
    <h1><?php _e( 'Plugin name Settings', 'plugin-name' ); ?></h1>

    <form method="post" action="options.php">
		<?php settings_fields( 'plugin_name_settings_group' ); ?>
		<?php $options = get_option( 'plugin_name_options' ); ?>

        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row">
                    <label for="optionText">
						<?php _e( 'Text field', 'plugin-name' ); ?>
                    </label>
                </th>
                <td>
                    <input id="optionText" type="text" name="plugin_name_options[option_text]"
                           value="<?php echo esc_attr( $options['option_text'] ); ?>" class="regular-text">
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="optionPassword">
						<?php _e( 'Password field', 'plugin-name' ); ?>
                    </label>
                </th>
                <td>
                    <input id="optionPassword" type="password" name="plugin_name_options[option_password]"
                           value="<?php echo esc_attr( $options['option_password'] ); ?>" class="regular-text">
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="optionEmail">
						<?php _e( 'Email field', 'plugin-name' ); ?>
                    </label>
                </th>
                <td>
                    <input id="optionEmail" type="email" name="plugin_name_options[option_email]"
                           value="<?php echo esc_attr( $options['option_email'] ); ?>" class="regular-text">
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="optionTelephone">
						<?php _e( 'Telephone field', 'plugin-name' ); ?>
                    </label>
                </th>
                <td>
                    <input id="optionTelephone" type="tel" name="plugin_name_options[option_tel]"
                           value="<?php echo esc_attr( $options['option_tel'] ); ?>" class="regular-text">
                    <p class="description"><?php _e( 'The tel type is currently <strong>only supported in Safari 8.</strong>',
							'plugin-name' ); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="optionUrl">
						<?php _e( 'Url field', 'plugin-name' ); ?>
                    </label>
                </th>
                <td>
                    <input id="optionUrl" type="url" name="plugin_name_options[option_url]"
                           value="<?php echo esc_url( $options['option_url'] ); ?>" class="regular-text">
                    <p class="description"><?php _e( 'Depending on browser support, the url field can be automatically validated when submitted. <br>Some smartphones recognize the url type, and adds ".com" to the keyboard to match url input.',
							'plugin-name' ); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row">
					<?php _e( 'Radio fields', 'plugin-name' ); ?>
                </th>
                <td>
                    <fieldset>
						<?php $option_radio = ( isset( $options['option_radio'] ) ) ? $options['option_radio'] : 'value_1'; ?>
                        <legend class="screen-reader-text">
                            <span><?php _e( 'Radio fields', 'plugin-name' ); ?></span>
                        </legend>
                        <label>
                            <input type="radio" name="plugin_name_options[option_radio]"
                                   value="value_1" <?php checked( $option_radio, 'value_1',
								true ); ?>>
                            <span><?php _e( 'Value 1', 'plugin-name' ); ?></span>
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="plugin_name_options[option_radio]"
                                   value="value_2"<?php checked( $option_radio, 'value_2',
								true ); ?>>
                            <span><?php _e( 'Value 2', 'plugin-name' ); ?></span>
                        </label>
                        <br>
                    </fieldset>
                </td>
            </tr>

            <tr>
                <th scope="row">
					<?php _e( 'Checkbox fields', 'plugin-name' ); ?>
                </th>
                <td>
                    <fieldset>
						<?php $option_checkbox = ( isset( $options['option_checkbox'] ) ) ? intval( $options['option_checkbox'] ) : 0; ?>
                        <legend class="screen-reader-text">
                            <span><?php _e( 'Checkbox fields', 'plugin-name' ); ?></span>
                        </legend>
                        <label for="optionCheckbox">
                            <input id="optionCheckbox" type="checkbox" name="plugin_name_options[option_checkbox]"
                                   value="1"<?php checked( $option_checkbox ); ?>>
							<?php _e( 'Value 1', 'plugin-name' ); ?>
                        </label>
                    </fieldset>

                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="optionSelect">
						<?php _e( 'Select field', 'plugin-name' ); ?>
                    </label>
                </th>
                <td>
                    <select id="optionSelect" name="plugin_name_options[option_select]" class="regular-text">
                        <option value="value_1" <?php selected( $options['option_select'], 'value_1',
							true ); ?>><?php _e( 'Value 1', 'plugin-name' ); ?></option>
                        <option value="value_2" <?php selected( $options['option_select'], 'value_2',
							true ); ?>><?php _e( 'Value 2', 'plugin-name' ); ?></option>
                        <option value="value_3" <?php selected( $options['option_select'], 'value_3',
							true ); ?>><?php _e( 'Value 3', 'plugin-name' ); ?></option>
                    </select>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="optionColor">
						<?php _e( 'Color field', 'plugin-name' ); ?>
                    </label>
                </th>
                <td>
                    <input id="optionColor" type="text" name="plugin_name_options[option_color]"
                           value="<?php echo esc_attr( $options['option_color'] ); ?>" class="iris_color"/>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="optionNumber">
						<?php _e( 'Number field', 'plugin-name' ); ?>
                    </label>
                </th>
                <td>
                    <input id="optionNumber" type="number" name="plugin_name_options[option_number]"
                           value="<?php echo intval( $options['option_number'] ); ?>" class="small-text">
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="optionRange">
						<?php _e( 'Range field', 'plugin-name' ); ?>
                    </label>
                </th>
                <td>
                    <input id="optionRange" type="range" name="plugin_name_options[option_range]"
                           value="<?php echo intval( $options['option_range'] ); ?>" min="0" max="10" step="1"
                           class="regular-text">
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="optionTextarea">
						<?php _e( 'Textarea', 'plugin-name' ); ?>
                    </label>
                </th>
                <td>
                    <textarea id="optionTextarea" name="plugin_name_options[option_textarea]" rows="10" cols="50"
                              class="large-text code"><?php echo esc_textarea( $options['option_textarea'] ); ?></textarea>
                </td>
            </tr>

            </tbody>
        </table>
        <h2 class="title"><?php _e( 'Date and Time', 'plugin-name' ); ?></h2>
        <p><?php _e( 'Depending on browser support, a time picker can show up in the input field.',
				'plugin-name' ); ?></p>
        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row">
                    <label for="optionTime">
						<?php _e( 'Time field', 'plugin-name' ); ?>
                    </label>
                </th>
                <td>
                    <input id="optionTime" type="time" name="plugin_name_options[option_time]"
                           value="<?php echo esc_attr( $options['option_time'] ); ?>" class="regular-text">
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="optionDate">
						<?php _e( 'Date field', 'plugin-name' ); ?>
                    </label>
                </th>
                <td>
                    <input id="optionDate" type="date" name="plugin_name_options[option_date]"
                           value="<?php echo esc_attr( $options['option_date'] ); ?>" class="regular-text">
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="optionWeek">
						<?php _e( 'Week field', 'plugin-name' ); ?>
                    </label>
                </th>
                <td>
                    <input id="optionWeek" type="week" name="plugin_name_options[option_week]"
                           value="<?php echo esc_attr( $options['option_week'] ); ?>" class="regular-text">
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="optionMonth">
						<?php _e( 'Month field', 'plugin-name' ); ?>
                    </label>
                </th>
                <td>
                    <input id="optionMonth" type="month" name="plugin_name_options[option_month]"
                           value="<?php echo esc_attr( $options['option_month'] ); ?>" class="regular-text">
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="optionDatetimeLocal">
						<?php _e( 'Datetime local field', 'plugin-name' ); ?>
                    </label>
                </th>
                <td>
                    <input id="optionDatetimeLocal" type="datetime-local"
                           name="plugin_name_options[option_datetime-local]"
                           value="<?php echo esc_attr( $options['option_datetime-local'] ); ?>"
                           class="regular-text">
                </td>
            </tr>
            </tbody>
        </table>

        <hr>

		<?php submit_button( __( 'Save Changes', 'plugin-name' ) ); ?>
    </form>

</div>
