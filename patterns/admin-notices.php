<h2><?php esc_attr_e( 'Admin Notices', 'wp_admin_style' ); ?></h2>
<p><mark><?php printf( __( '<strong>Note:</strong> Admin Notices get moved to the <a %1$s>top</a> (via <a href="%2$s" target="_blank">wp-admin/js/common.js</a>) and appear below the first <code>h1</code> or <code>h2</code>	(whichever comes first) inside <code>.wrap</code> by default (since WordPress version 4.3). Add the `.inline` css class if you do not wish to move the notice to the top. Example notices appear at the top of this page.', 'wp_admin_style' ), 'href="javascript:void(0);" onclick="window.scrollTo(0,0);"', esc_url( admin_url( '/js/common.js' ) ) ); ?></mark></p>
<p><?php printf( __( 'Define type via parameter (same as CSS classes) with <a href="%s" target="_blank">function add_settings_error()</a>, or use class(es) on a wrapping <code>div</code>.', 'wp_admin_style' ), 'https://developer.wordpress.org/reference/functions/add_settings_error/' ); ?></p>
<p><?php printf( __( 'Since WordPress version 4.2 there are more classes and paths available. See <a href="%s" target="_blank">this post on make.w.org</a> for further details.', 'wp_admin_style' ), 'https://make.wordpress.org/core/2015/04/23/spinners-and-dismissible-admin-notices-in-4-2/' ); ?></p>

<div class="notice notice-error"><p><?php printf( esc_attr__( 'class %s with paragraph', 'wp_admin_style' ), '<code>.notice-error</code>' ); ?></p></div>
<div class="notice notice-warning"><p><?php printf( esc_attr__( 'class %s with paragraph', 'wp_admin_style' ), '<code>.notice-warning</code>' ); ?></p></div>
<div class="notice notice-success"><p><?php printf( esc_attr__( 'class %s with paragraph', 'wp_admin_style' ), '<code>.notice-success</code>' ); ?></p></div>
<div class="notice notice-info is-dismissible"><p><?php printf( esc_attr__( 'class %s with paragraph include %s class', 'wp_admin_style' ), '<code>.notice-info</code>', '<code>.is-dismissible</code>' ); ?></p></div>
<div class="notice notice-info inline"><p><?php printf( esc_attr__( 'class %s with paragraph and %s class', 'wp_admin_style' ), '<code>.notice-info</code>', '<code>.inline</code>' ); ?></p></div>

<!-- Deprecated
<div class="updated"><p><?php esc_attr_e( 'class .updated with paragraph, deprecated', 'wp_admin_style' ); ?></p></div>
<div class="error"><?php esc_attr_e( 'class .error WITHOUT paragraph, deprecated', 'wp_admin_style' ); ?></div>
<div class="settings-error"><?php esc_attr_e( 'class .settings-error WITHOUT paragraph, deprecated', 'wp_admin_style' ); ?></div>
<div class="error form-invalid"><?php esc_attr_e( 'class .error and .form-invalid WITHOUT paragraph, deprecated', 'wp_admin_style' ); ?></div>
<div class="notice"><p><?php esc_attr_e( 'class .notice only with paragraph, deprecated', 'wp_admin_style' ); ?></p></div>
-->
