<h3><?php esc_attr_e( 'Admin Notices', 'wp_admin_style' ); ?></h3>
<p><?php esc_attr_e( 'define the style via param (same as the classes) on function add_settings_error() or use the class inside a div', 'wp_admin_style' ); ?></p>

<p><strong><?php esc_attr_e( 'HINT: The Admin Notices class was moved on default via wp-admin/js/common.js to the top after the first h2. See on top.', 'wp_admin_style' ) ?></strong></p>

<div class="updated"><p><?php esc_attr_e( 'class .updated with paragraph', 'wp_admin_style' ); ?></p></div>
<div class="error"><?php esc_attr_e( 'class .error without paragraph', 'wp_admin_style' ); ?></div>
<div class="settings-error"><?php esc_attr_e( 'class .settings-error without paragraph', 'wp_admin_style' ); ?></div>
<div class="error form-invalid"><?php esc_attr_e( 'class .error and .form-invalid without paragraph', 'wp_admin_style' ); ?></div>