<h2><?php esc_attr_e( 'Admin Notices', 'WpAdminStyle' ); ?></h2>

<p>
	<?php
	printf(
		// translators: Leave always a hint for translators to understand the placeholders.
		__( 'Define type via parameter (same as CSS classes) with function <a href="#" target="_blank"><code>add_settings_error()</code></a>, or use class(es) on a wrapping <code>div</code>.',
		'WpAdminStyle' ), 'https://developer.wordpress.org/reference/functions/add_settings_error/'
	);
	?>
</p>
<p>
	<?php
	printf(
		// translators: Leave always a hint for translators to understand the placeholders.
		__( 'Since WordPress version 4.2 there are more classes and paths available. See <a href="%s" target="_blank">this post on make.w.org</a> for further details.', 'WpAdminStyle' ),
		'https://make.wordpress.org/core/2015/04/23/spinners-and-dismissible-admin-notices-in-4-2/'
	);
	?>
</p>
<p>
	<?php
	printf(
		// translators: Leave always a hint for translators to understand the placeholders.
		__( 'Since WordPress version 6.4, the core includes function <a href="%s" target="_blank"><code>wp_admin_notice()</code></a> to standardize admin notices. See <a href="%s" target="_blank">this changeset on core.trac.wordpress.org</a> for further details.', 'WpAdminStyle' ),
		'https://developer.wordpress.org/reference/functions/wp_admin_notice/',
		'https://core.trac.wordpress.org/changeset/56408'
	);
	?>
</p>
<p>
	<?php
	_e( 'Note: The <code>inline</code> class is only to leave the notices here. On default WordPress will hide them via javascript.', 'WpAdminStyle' );
	?>
</p>

<div id="poststuff">
	<div id="post-body" class="metabox-holder columns-2">
		<div id="post-body-content">
			<strong><?php _e("Standard style", 'WpAdminStyle'); ?></strong>

			<div class="notice notice-error inline">
				<p>
					<?php
					printf(
						// translators: Leave always a hint for translators to understand the placeholders.
						esc_attr__( 'class %1$s with paragraph and %2$s class', 'WpAdminStyle' ),
						'<code>.notice-error</code>',
						'<code>.inline</code>'
					);
					?>
				</p>
			</div>

			<div class="notice notice-warning inline">
				<p>
					<?php
					printf(
						// translators: Leave always a hint for translators to understand the placeholders.
						esc_html__( 'class %1$s with paragraph and %2$s class', 'WpAdminStyle' ),
						'<code>.notice-warning</code>',
						'<code>.inline</code>'
					);
					?>
				</p>
			</div>

			<div class="notice notice-success inline">
				<p>
					<?php
					printf(
						// translators: Leave always a hint for translators to understand the placeholders.
						esc_html__( 'class %1$s with paragraph and %2$s class', 'WpAdminStyle' ),
						'<code>.notice-success</code>',
						'<code>.inline</code>'
					);
					?>
				</p>
			</div>

			<div class="notice notice-info is-dismissible inline">
				<p>
					<?php
					printf(
						// translators: Leave always a hint for translators to understand the placeholders.
						esc_attr__( 'class %1$s with paragraph include %2$s  and %3$s class', 'WpAdminStyle' ),
						'<code>.notice-info</code>',
						'<code>.is-dismissible</code>',
						'<code>.inline</code>'
					);
					?>
				</p>
			</div>

			<div class="notice notice-info inline">
				<p>
					<?php
					printf(
						// translators: %1$s is a code fragment for the notice information and %2$s is the inline class code.
						esc_attr__( 'class %1$s with paragraph and %2$s class', 'WpAdminStyle' ),
						'<code>.notice-info</code>',
						'<code>.inline</code>'
					);
					?>
				</p>
			</div>
		</div>
		<div id="postbox-container-1" class="postbox-container">
			<strong><?php _e("Alternative style", 'WpAdminStyle'); ?></strong>

			<div class="notice notice-alt notice-error inline">
				<p>
					<?php
					printf(
						// translators: Leave always a hint for translators to understand the placeholders.
						esc_attr__( 'with %1$s class', 'WpAdminStyle' ),
						'<code>.notice-alt</code>'
					);
					?>
				</p>
			</div>

			<div class="notice notice-alt notice-warning inline">
				<p>
					<?php
					printf(
						// translators: Leave always a hint for translators to understand the placeholders.
						esc_attr__( 'with %1$s class', 'WpAdminStyle' ),
						'<code>.notice-alt</code>'
					);
					?>
				</p>
			</div>

			<div class="notice notice-alt notice-success inline">
				<p>
					<?php
					printf(
						// translators: Leave always a hint for translators to understand the placeholders.
						esc_attr__( 'with %1$s class', 'WpAdminStyle' ),
						'<code>.notice-alt</code>'
					);
					?>
				</p>
			</div>

			<div class="notice notice-alt notice-info is-dismissible inline">
				<p>
					<?php
					printf(
						// translators: Leave always a hint for translators to understand the placeholders.
						esc_attr__( 'with %1$s class', 'WpAdminStyle' ),
						'<code>.notice-alt</code>'
					);
					?>
				</p>
			</div>

			<div class="notice notice-alt notice-info inline">
				<p>
					<?php
					printf(
						// translators: %1$s is a code fragment for the notice information and %2$s is the inline class code.
						esc_attr__( 'with %1$s class', 'WpAdminStyle' ),
						'<code>.notice-alt</code>'
					);
					?>
				</p>
			</div>
		</div>
	</div>
	<br class="clear">
</div>
