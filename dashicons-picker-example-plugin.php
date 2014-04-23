<?php
/**
 * Plugin Name: Dashicons Picker Example Plugin
 * Description: A plugin to showcase the dashicons picker
 * Author: Brad Vincent
 * Author URI: http://themergency.com
 * Version: 1.0
 */

function dashicons_picker_register_settings() {
	register_setting( 'dashicons_picker_settings_group', 'dashicons_picker_settings' );
}
add_action( 'admin_init', 'dashicons_picker_register_settings' );

function dashicons_picker_settings_menu() {
	add_options_page( __( 'Dashicons Picker Example' ), __( 'Dashicons Picker Example' ), 'manage_options', 'dashicons_picker_settings', 'dashicons_picker_settings_page' );
}
add_action( 'admin_menu', 'dashicons_picker_settings_menu' );

function dashicons_picker_scripts() {
	$css = plugin_dir_url( __FILE__ ) . 'css/dashicons-picker.css';
    wp_enqueue_style( 'dashicons-picker', $css, array( 'dashicons' ), '1.0' );

	$js = plugin_dir_url( __FILE__ ) . 'js/dashicons-picker.js';
	wp_enqueue_script( 'dashicons-picker', $js, array( 'jquery' ), '1.0' );
}
add_action( 'admin_enqueue_scripts', 'dashicons_picker_scripts' );

function dashicons_picker_settings_page() {
	$options = get_option( 'dashicons_picker_settings' ); ?>

	<div class="wrap">
		<h2><?php _e('Dashicons Example Settings'); ?></h2>
		<form method="post" action="options.php" class="options_form">
			<?php settings_fields( 'dashicons_picker_settings_group' ); ?>
			<table class="form-table">
				<tr>
					<th scope="row">
						<label for="dashicons_picker_example_icon1"><?php _e( 'Icon 1' ); ?></label>
					</th>
					<td>
						<input class="regular-text" type="text" id="dashicons_picker_example_icon1" name="dashicons_picker_settings[icon1]" value="<?php if( isset( $options['icon1'] ) ) { echo esc_attr( $options['icon1'] ); } ?>"/>
						<input type="button" data-target="#dashicons_picker_example_icon1" class="button dashicons-picker" value="Choose Icon" />
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="dashicons_picker_example_icon2"><?php _e( 'Icon 2' ); ?></label>
					</th>
					<td>
						<input class="regular-text" type="text" id="dashicons_picker_example_icon2" name="dashicons_picker_settings[icon2]" value="<?php if( isset( $options['icon2'] ) ) { echo esc_attr( $options['icon2'] ); } ?>"/>
						<input type="button" data-target="#dashicons_picker_example_icon2" class="button dashicons-picker" value="pick" />
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="dashicons_picker_example_icon3"><?php _e( 'Icon 3' ); ?></label>
					</th>
					<td>
						<input class="regular-text" type="text" id="dashicons_picker_example_icon3" name="dashicons_picker_settings[icon3]" value="<?php if( isset( $options['icon2'] ) ) { echo esc_attr( $options['icon3'] ); } ?>"/>
						<input type="button" data-target="#dashicons_picker_example_icon3" class="button dashicons-picker" value="..." />
					</td>
				</tr>
			</table>
			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}

