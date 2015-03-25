<h3><?php esc_attr_e( 'Tables', 'wp_admin_style' ); ?></h3>

<p><strong>Table with class <code>form-table</code></strong></p>
<table class="form-table">
	<tr>
		<th class="row-title"><?php esc_attr_e( 'Table header cell #1', 'wp_admin_style' ); ?></th>
		<th><?php esc_attr_e( 'Table header cell #2', 'wp_admin_style' ); ?></th>
	</tr>
	<tr valign="top">
		<td scope="row"><label for="tablecell"><?php esc_attr_e(
					'Table data cell #1, with label', 'wp_admin_style'
				); ?></label></td>
		<td><?php esc_attr_e( 'Table Cell #2', 'wp_admin_style' ); ?></td>
	</tr>
	<tr valign="top" class="alternate">
		<td scope="row"><label for="tablecell"><?php esc_attr_e(
					'Table Cell #3, with label and class', 'wp_admin_style'
				); ?> <code>alternate</code></label></td>
		<td><?php esc_attr_e( 'Table Cell #4', 'wp_admin_style' ); ?></td>
	</tr>
	<tr valign="top">
		<td scope="row"><label for="tablecell"><?php esc_attr_e(
					'Table Cell #5, with label', 'wp_admin_style'
				); ?></label></td>
		<td><?php esc_attr_e( 'Table Cell #6', 'wp_admin_style' ); ?></td>
	</tr>
</table>

<br class="clear" />

<p><strong>Table with class <code>widefat</code></strong></p>
<table class="widefat">
	<tr>
		<th class="row-title"><?php esc_attr_e( 'Table header cell #1', 'wp_admin_style' ); ?></th>
		<th><?php esc_attr_e( 'Table header cell #2', 'wp_admin_style' ); ?></th>
	</tr>
	<tr>
		<td class="row-title"><label for="tablecell"><?php esc_attr_e(
					'Table Cell #1, with label', 'wp_admin_style'
				); ?></label></td>
		<td><?php esc_attr_e( 'Table Cell #2', 'wp_admin_style' ); ?></td>
	</tr>
	<tr class="alternate">
		<td class="row-title"><label for="tablecell"><?php esc_attr_e(
					'Table Cell #3, with label and class', 'wp_admin_style'
				); ?> <code>alternate</code></label></td>
		<td><?php esc_attr_e( 'Table Cell #4', 'wp_admin_style' ); ?></td>
	</tr>
	<tr>
		<td class="row-title"><?php esc_attr_e( 'Table Cell #5, without label', 'wp_admin_style' ); ?></td>
		<td><?php esc_attr_e( 'Table Cell #6', 'wp_admin_style' ); ?></td>
	</tr>
</table>

<br class="clear" />
<p><strong>Table with class <code>widefat</code></strong></p>
<table class="widefat">
	<thead>
	<tr>
		<th class="row-title"><?php esc_attr_e( 'Table header cell #1', 'wp_admin_style' ); ?></th>
		<th><?php esc_attr_e( 'Table header cell #2', 'wp_admin_style' ); ?></th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td class="row-title"><label for="tablecell"><?php esc_attr_e(
					'Table Cell #1, with label', 'wp_admin_style'
				); ?></label></td>
		<td><?php esc_attr_e( 'Table Cell #2', 'wp_admin_style' ); ?></td>
	</tr>
	<tr class="alternate">
		<td class="row-title"><label for="tablecell"><?php esc_attr_e(
					'Table Cell #3, with label and class', 'wp_admin_style'
				); ?> <code>alternate</code></label></td>
		<td><?php esc_attr_e( 'Table Cell #4', 'wp_admin_style' ); ?></td>
	</tr>
	<tr>
		<td class="row-title"><?php esc_attr_e( 'Table Cell #5, without label', 'wp_admin_style' ); ?></td>
		<td><?php esc_attr_e( 'Table Cell #6', 'wp_admin_style' ); ?></td>
	</tr>
	<tr class="alt">
		<td class="row-title"><?php esc_attr_e(
				'Table Cell #7, without label and with class', 'wp_admin_style'
			); ?> <code>alt</code></td>
		<td><?php esc_attr_e( 'Table Cell #8', 'wp_admin_style' ); ?></td>
	</tr>
	<tr class="form-invalid">
		<td class="row-title"><?php esc_attr_e(
				'Table Cell #9, without label and with class', 'wp_admin_style'
			); ?> <code>form-invalid</code></td>
		<td><?php esc_attr_e( 'Table Cell #10', 'wp_admin_style' ); ?></td>
	</tr>
	</tbody>
	<tfoot>
	<tr>
		<th class="row-title"><?php esc_attr_e( 'Table header cell #1', 'wp_admin_style' ); ?></th>
		<th><?php esc_attr_e( 'Table header cell #2', 'wp_admin_style' ); ?></th>
	</tr>
	</tfoot>
</table>