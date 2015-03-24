<h3><?php _e( 'Form Helper Functions', 'wp_admin_style' ); ?></h3>
<p><?php _e(
		'There are 3 main form functions which are very useful when you are creating a new form in the admin area of WordPress. When you return data from the database and need to pre-populate the form with this data then these functions can be really useful.',
		'wp_admin_style'
	); ?></p>
<ul>
	<li><code>checked( $checked, $current = TRUE, $echo = TRUE );</code></li>
	<li><code>selected( $selected, $current = TRUE, $echo = TRUE );</code></li>
	<li><code>disabled( $disabled, $current = TRUE, $echo = TRUE );</code></li>
</ul>

<?php
$checked = $selected = $disabled = $value = NULL;
?>
<input type="checkbox" value="1" name="checkbox" <?php checked( $value, '1', TRUE ); ?> /><br>
<select name="select">
	<option value="1" <?php selected( $value, '1', TRUE ); ?>>1</option>
	<option value="2" <?php selected( $value, '2', TRUE ); ?>>2</option>
	<option value="3" <?php selected( $value, '3', TRUE ); ?>>3</option>
	<option value="4" <?php selected( $value, '4', TRUE ); ?>>4</option>
	<option value="5" <?php selected( $value, '5', TRUE ); ?>>5</option>
</select><br>
<input type="text" name="disabled_textbox" <?php disabled( $value, 'disabled', TRUE ); ?> />