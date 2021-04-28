<h2><?php esc_attr_e( 'Color Picker', 'WpAdminStyle' ); ?></h2>
<p><?php printf( __( 'See <a href="%s" target="_blank">the official post about the WP Color Picker</a>.',
		'WpAdminStyle' ),
		esc_url( 'https://make.wordpress.org/core/2012/11/30/new-color-picker-in-wp-3-5/' ) ); ?></p>

<input type="text" value="#81d742" class="example-color-field" data-default-color="#81d742"/>

<p><?php esc_html_e( 'You need the handle \'wp-color-picker\' and an custom scritp that start the color picker.', 'WpAdminStyle'	); ?></p>
<pre><code class="language-php">
add_action( 'admin_enqueue_scripts', 'example_enqueue_color_picker' );
function example_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugins_url('example-script.js', __FILE__ ), array( 'example-color-picker' ),
		false, true );
}
</code></pre>

<p><?php esc_html_e( 'The simplest way to initialize the color picker.', 'WpAdminStyle'); ?></p>
<pre><code class="language-javascript">
(function ($) {
	$('.example-color-field').wpColorPicker();
})(jQuery);
</code></pre>
