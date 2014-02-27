<?php

// avoid direct calls to this file, because now WP core and framework has been used.
! defined( 'ABSPATH' ) and exit;

add_action( 
	'init',
	array( Wp_Admin_Dashicons::get_instance(), 'plugin_setup' )
);

class Wp_Admin_Dashicons {
	
	/**
	 * Plugin instance.
	 *
	 * @see get_instance()
	 * @type object
	 */
	protected static $instance = NULL;
	
	/**
	 * Access this plugin’s working instance
	 *
	 * @wp-hook admin_init
	 * @since   05/02/2013
	 * @return  object of this class
	 */
	public static function get_instance() {
		
		NULL === self::$instance and self::$instance = new self;
		
		return self::$instance;
	}
	
	/**
	 * Used for regular plugin work.
	 * 
	 * @wp-hook  admin_init
	 * @since    05/02/2013
	 * @return   void
	 */
	public function plugin_setup() {
		
		add_action( 'admin_menu', array( $this, 'register_submenu' ) );
		
	}
	
	/**
	* Constructor.
	* Intentionally left empty and public.
	*
	* @see    plugin_setup()
	* @since  05/02/2013
	*/
	public function __construct() {}
	
	public function register_submenu() {
		
		$hook = add_submenu_page(
			'WordPress_Admin_Style',
			__( 'Dashicons' ),
			__( 'Dashicons' ),
			'manage_options',
			'dashicons',
			array( $this, 'get_dashicon_demo' )
		);
		add_action( 'load-' . $hook, array( $this, 'register_scripts' ) );
	}
	
	public function get_dashicon_demo() {
		?>
		<div class="wrap">
		<h2>Dashicons</h2>
		<p>Dashicons icon font for MP6, currently in development and will go live in WordPress version 3.8.<br>You can check out the WordPress Version 3.8-alpha or the MP6-plugin at <a href="http://wordpress.org/extend/plugins/mp6/">http://wordpress.org/extend/plugins/mp6/</a>.</p>

		<h3>MiniMenu</h3>
		<ul>
			<li><a href="#instructions">Instructions</a></li>
			<li><a href="#instructions">Photoshop Usage</a></li>
			<li><a href="#cssusage"">CSS Usage</a></li>
			<li><a href="#offcialpage">Official Dashicon Page</a></li>
			<li><a href="#alternatives">Alternatives Font Awesome</a></li>
		</ul>

		<h3>Dashicon Iconlist</h3>
		<div id="iconlist">
			
			<!-- admin menu -->
			<div alt="f228" class="dashicons dashicons-menu"><code>.dashicons-menu</code></div>
			<div alt="f319" class="dashicons dashicons-site"><code>.dashicons-site</code></div>
			<div alt="f226" class="dashicons dashicons-gauge"><code>.dashicons-gauge</code></div>
			<div alt="f102" class="dashicons dashicons-admin-dashboard"><code>.dashicons-admin-dashboard</code></div>
			<div alt="f109" class="dashicons dashicons-admin-post"><code>.dashicons-admin-post</code></div>
			<div alt="f104" class="dashicons dashicons-admin-media"><code>.dashicons-admin-media</code></div>
			<div alt="f103" class="dashicons dashicons-admin-links"><code>.dashicons-admin-links</code></div>
			<div alt="f105" class="dashicons dashicons-admin-page"><code>.dashicons-admin-page</code></div>
			<div alt="f101" class="dashicons dashicons-admin-comments"><code>.dashicons-admin-comments</code></div>
			<div alt="f100" class="dashicons dashicons-admin-appearance"><code>.dashicons-admin-appearance</code></div>
			<div alt="f106" class="dashicons dashicons-admin-plugins"><code>.dashicons-admin-plugins</code></div>
			<div alt="f110" class="dashicons dashicons-admin-users"><code>.dashicons-admin-users</code></div>
			<div alt="f107" class="dashicons dashicons-admin-tools"><code>.dashicons-admin-tools</code></div>
			<div alt="f108" class="dashicons dashicons-admin-settings"><code>.dashicons-admin-settings</code></div>
			<div alt="f112" class="dashicons dashicons-admin-site"><code>.dashicons-admin-site</code></div>
			<div alt="f111" class="dashicons dashicons-admin-generic"><code>.dashicons-admin-generic</code></div>
			<div alt="f148" class="dashicons dashicons-admin-collapse"><code>.dashicons-admin-collapse</code></div>	
			
			<!-- welcome screen -->
			<div alt="f119" class="dashicons dashicons-welcome-write-blog"><code>.dashicons-welcome-write-blog</code></div>
			<!--<div alt="f119" class="dashicons dashicons-welcome-edit-page"><code>.dashicons-welcome-edit-page</code></div> Duplicate -->
			<div alt="f133" class="dashicons dashicons-welcome-add-page"><code>.dashicons-welcome-add-page</code></div>
			<div alt="f115" class="dashicons dashicons-welcome-view-site"><code>.dashicons-welcome-view-site</code></div>
			<div alt="f116" class="dashicons dashicons-welcome-widgets-menus"><code>.dashicons-welcome-widgets-menus</code></div>
			<div alt="f117" class="dashicons dashicons-welcome-comments"><code>.dashicons-welcome-comments</code></div>
			<div alt="f118" class="dashicons dashicons-welcome-learn-more"><code>.dashicons-welcome-learn-more</code></div>			

			<!-- post formats -->
			<!--<div alt="f109" class="dashicons dashicons-format-standard"><code>.dashicons-</code></div> Duplicate -->
			<div alt="f123" class="dashicons dashicons-format-aside"><code>.dashicons-format-aside</code></div>
			<div alt="f128" class="dashicons dashicons-format-image"><code>.dashicons-format-image</code></div>
			<div alt="f161" class="dashicons dashicons-format-gallery"><code>.dashicons-format-gallery</code></div>
			<div alt="f126" class="dashicons dashicons-format-video"><code>.dashicons-format-video</code></div>
			<div alt="f130" class="dashicons dashicons-format-status"><code>.dashicons-format-status</code></div>
			<div alt="f122" class="dashicons dashicons-format-quote"><code>.dashicons-format-quote</code></div>
			<!--<div alt="f103" class="dashicons dashicons-format-link"><code>.dashicons-</code></div> Duplicate -->
			<div alt="f125" class="dashicons dashicons-format-chat"><code>.dashicons-format-chat</code></div>
			<div alt="f127" class="dashicons dashicons-format-audio"><code>.dashicons-format-audio</code></div>
			<div alt="f306" class="dashicons dashicons-camera2"><code>.dashicons-camera2</code></div>
			<div alt="f232" class="dashicons dashicons-images-alt1"><code>.dashicons-images-alt1</code></div>
			<div alt="f233" class="dashicons dashicons-images-alt2"><code>.dashicons-images-alt2</code></div>
			<div alt="f234" class="dashicons dashicons-video-alt1"><code>.dashicons-video-alt1</code></div>
			<div alt="f235" class="dashicons dashicons-video-alt2"><code>.dashicons-video-alt2</code></div>
			<div alt="f236" class="dashicons dashicons-video-alt3"><code>.dashicons-video-alt3</code></div>
			
			<!-- image editing -->
			<div alt="f165" class="dashicons dashicons-imgedit-crop"><code>.dashicons-imgedit-crop</code></div>
			<div alt="f166" class="dashicons dashicons-imgedit-rleft"><code>.dashicons-imgedit-rleft</code></div>
			<div alt="f167" class="dashicons dashicons-imgedit-rright"><code>.dashicons-imgedit-rright</code></div>
			<div alt="f168" class="dashicons dashicons-imgedit-flipv"><code>.dashicons-imgedit-flipv</code></div>
			<div alt="f169" class="dashicons dashicons-imgedit-fliph"><code>.dashicons-imgedit-fliph</code></div>
			<div alt="f171" class="dashicons dashicons-imgedit-undo"><code>.dashicons-imgedit-undo</code></div>
			<div alt="f172" class="dashicons dashicons-imgedit-redo"><code>.dashicons-imgedit-redo</code></div>		
			
			<!-- posts -->
			<div alt="f135" class="dashicons dashicons-align-left"><code>.dashicons-align-left</code></div>
			<div alt="f136" class="dashicons dashicons-align-right"><code>.dashicons-align-right</code></div>	
			<div alt="f134" class="dashicons dashicons-align-center"><code>.dashicons-align-center</code></div>
			<div alt="f138" class="dashicons dashicons-align-none"><code>.dashicons-align-none</code></div>
			<div alt="f160" class="dashicons dashicons-lock"><code>.dashicons-lock</code></div>
			<div alt="f145" class="dashicons dashicons-calendar"><code>.dashicons-calendar</code></div>
			<div alt="f177" class="dashicons dashicons-visibility"><code>.dashicons-visibility</code></div>
			<div alt="f173" class="dashicons dashicons-post-status"><code>.dashicons-post-status</code></div>
			
			<!-- tinymce -->
			<div alt="f200" class="dashicons dashicons-tinymce-bold"><code>.dashicons-tinymce-bold</code></div>
			<div alt="f201" class="dashicons dashicons-tinymce-italic"><code>.dashicons-tinymce-italic</code></div>	
			<div alt="f203" class="dashicons dashicons-tinymce-ul"><code>.dashicons-tinymce-ul</code></div>
			<div alt="f204" class="dashicons dashicons-tinymce-ol"><code>.dashicons-tinymce-ol</code></div>
			<div alt="f205" class="dashicons dashicons-tinymce-quote"><code>.dashicons-tinymce-quote</code></div>
			<div alt="f206" class="dashicons dashicons-tinymce-alignleft"><code>.dashicons-tinymce-alignleft</code></div>
			<div alt="f207" class="dashicons dashicons-tinymce-aligncenter"><code>.dashicons-tinymce-aligncenter</code></div>
			<div alt="f208" class="dashicons dashicons-tinymce-alignright"><code>.dashicons-tinymce-alignright</code></div>
			<div alt="f209" class="dashicons dashicons-tinymce-insertmore"><code>.dashicons-tinymce-insertmore</code></div>
			<div alt="f210" class="dashicons dashicons-tinymce-spellcheck"><code>.dashicons-tinymce-spellcheck</code></div>
			<div alt="f211" class="dashicons dashicons-tinymce-distractionfree"><code>.dashicons-tinymce-distractionfree</code></div>
			<div alt="f212" class="dashicons dashicons-tinymce-kitchensink"><code>.dashicons-tinymce-kitchensink</code></div>
			<div alt="f213" class="dashicons dashicons-tinymce-underline"><code>.dashicons-tinymce-underline</code></div>
			<div alt="f214" class="dashicons dashicons-tinymce-justify"><code>.dashicons-tinymce-justify</code></div>
			<div alt="f215" class="dashicons dashicons-tinymce-textcolor"><code>.dashicons-tinymce-textcolor</code></div>
			<div alt="f216" class="dashicons dashicons-tinymce-word"><code>.dashicons-tinymce-word</code></div>
			<div alt="f217" class="dashicons dashicons-tinymce-plaintext"><code>.dashicons-tinymce-plaintext</code></div>
			<div alt="f218" class="dashicons dashicons-tinymce-removeformatting"><code>.dashicons-</code></div>
			<div alt="f219" class="dashicons dashicons-tinymce-video"><code>.dashicons-tinymce-video</code></div>
			<div alt="f220" class="dashicons dashicons-tinymce-customchar"><code>.dashicons-tinymce-customchar</code></div>
			<div alt="f221" class="dashicons dashicons-tinymce-outdent"><code>.dashicons-tinymce-outdent</code></div>
			<div alt="f222" class="dashicons dashicons-tinymce-indent"><code>.dashicons-tinymce-indent</code></div>
			<div alt="f223" class="dashicons dashicons-tinymce-help"><code>.dashicons-tinymce-help</code></div>
			<div alt="f224" class="dashicons dashicons-tinymce-strikethrough"><code>.dashicons-tinymce-strikethrough</code></div>
			<div alt="f225" class="dashicons dashicons-tinymce-unlink"><code>.dashicons-tinymce-unlink</code></div>
			<div alt="f320" class="dashicons dashicons-tinymce-rtl"><code>.dashicons-tinymce-rtl</code></div>
			
			<!-- sorting -->
			<div alt="f142" class="dashicons dashicons-arr-up"><code>.dashicons-arr-up</code></div>
			<div alt="f140" class="dashicons dashicons-arr-down"><code>.dashicons-arr-down</code></div>
			<div alt="f139" class="dashicons dashicons-arr-right"><code>.dashicons-arr-right</code></div>
			<div alt="f141" class="dashicons dashicons-arr-left"><code>.dashicons-arr-left</code></div>
			<div alt="f156" class="dashicons dashicons-sort"><code>.dashicons-sort</code></div>
			<div alt="f229" class="dashicons dashicons-leftright"><code>.dashicons-leftright</code></div>
			<div alt="f163" class="dashicons dashicons-list-view"><code>.dashicons-list-view</code></div>
			<div alt="f164" class="dashicons dashicons-exerpt-view"><code>.dashicons-exerpt-view</code></div>
			
			<!-- social -->
			<div alt="f237" class="dashicons dashicons-share"><code>.dashicons-share</code></div>
			<div alt="f240" class="dashicons dashicons-share2"><code>.dashicons-share2</code></div>
			<div alt="f242" class="dashicons dashicons-share3"><code>.dashicons-share3</code></div>
			<div alt="f301" class="dashicons dashicons-twitter1"><code>.dashicons-twitter1</code></div>
			<div alt="f302" class="dashicons dashicons-twitter2"><code>.dashicons-twitter2</code></div>
			<div alt="f303" class="dashicons dashicons-rss"><code>.dashicons-rss</code></div>
			<div alt="f304" class="dashicons dashicons-facebook1"><code>.dashicons-facebook1</code></div>
			<div alt="f305" class="dashicons dashicons-facebook2"><code>.dashicons-facebook2</code></div>
			
			<!-- jobs -->
			<div alt="f308" class="dashicons dashicons-jobs-developers"><code>.dashicons-jobs-developers</code></div>
			<div alt="f309" class="dashicons dashicons-jobs-designers"><code>.dashicons-jobs-designers</code></div>
			<div alt="f310" class="dashicons dashicons-jobs-migration"><code>.dashicons-jobs-migration</code></div>
			<div alt="f311" class="dashicons dashicons-jobs-performance"><code>.dashicons-jobs-performance</code></div>
			
			<!-- misc -->
			<div alt="f120" class="dashicons dashicons-wordpress"><code>.dashicons-wordpress</code></div>
			<div alt="f157" class="dashicons dashicons-pressthis"><code>.dashicons-pressthis</code></div>
			<div alt="f113" class="dashicons dashicons-update"><code>.dashicons-update</code></div>
			<div alt="f180" class="dashicons dashicons-screenoptions"><code>.dashicons-screenoptions</code></div>
			<div alt="f174" class="dashicons dashicons-cart"><code>.dashicons-cart</code></div>
			<div alt="f175" class="dashicons dashicons-feedback"><code>.dashicons-feedback</code></div>
			<div alt="f176" class="dashicons dashicons-cloud"><code>.dashicons-cloud</code></div>
			<div alt="f315" class="dashicons dashicons-lock"><code>.dashicons-lock</code></div>
			<div alt="f321" class="dashicons dashicons-backup"><code>.dashicons-backup</code></div>
			<div alt="f316" class="dashicons dashicons-arrow-down"><code>.dashicons-arrow-down</code></div>
			<div alt="f317" class="dashicons dashicons-arrow-up"><code>.dashicons-arrow-up</code></div>
			<div alt="f323" class="dashicons dashicons-tag"><code>.dashicons-tag</code></div>
			<div alt="f318" class="dashicons dashicons-category"><code>.dashicons-category</code></div>
			<div alt="f147" class="dashicons dashicons-yes"><code>.dashicons-yes</code></div>
			<div alt="f158" class="dashicons dashicons-no"><code>.dashicons-no</code></div>
			<div alt="f132" class="dashicons dashicons-plus-small"><code>.dashicons-plus-small</code></div>
			<div alt="f153" class="dashicons dashicons-xit"><code>.dashicons-xit</code></div>
			<div alt="f159" class="dashicons dashicons-marker"><code>.dashicons-marker</code></div>	
			<div alt="f155" class="dashicons dashicons-star-filled"><code>.dashicons-star-filled</code></div>
			<div alt="f154" class="dashicons dashicons-star-empty"><code>.dashicons-star-empty</code></div>	
			<div alt="f227" class="dashicons dashicons-flag"><code>.dashicons-flag</code></div>
			<div alt="f230" class="dashicons dashicons-location"><code>.dashicons-location</code></div>
			<div alt="f231" class="dashicons dashicons-location-alt"><code>.dashicons-location-alt</code></div>	
			<div alt="f178" class="dashicons dashicons-vault"><code>.dashicons-vault</code></div>
			<div alt="f179" class="dashicons dashicons-search"><code>.dashicons-search</code></div>
			<div alt="f181" class="dashicons dashicons-slides"><code>.dashicons-slides</code></div>
			<div alt="f183" class="dashicons dashicons-analytics"><code>.dashicons-analytics</code></div>
			<div alt="f184" class="dashicons dashicons-piechart"><code>.dashicons-piechart</code></div>
			<div alt="f185" class="dashicons dashicons-bargraph"><code>.dashicons-bargraph</code></div>
			<div alt="f238" class="dashicons dashicons-bargraph2"><code>.dashicons-bargraph2</code></div>
			<div alt="f239" class="dashicons dashicons-bargraph3"><code>.dashicons-bargraph3</code></div>
			<div alt="f307" class="dashicons dashicons-groups"><code>.dashicons-groups</code></div>
			<div alt="f312" class="dashicons dashicons-products"><code>.dashicons-products</code></div>
			<div alt="f313" class="dashicons dashicons-awards"><code>.dashicons-awards</code></div>
			<div alt="f314" class="dashicons dashicons-forms"><code>.dashicons-forms</code></div>
			<div alt="f322" class="dashicons dashicons-portfolio"><code>.dashicons-portfolio</code></div>
		</div>
		
		<div id="instructions">
	
			<h3>Photoshop Usage</h3>
			<p>Use the .OTF version of the font for Photoshop mockups, the web-font versions won't work. For most accurate results, pick the "Sharp" font smoothing.</p>
		
			<h3 id="cssusage">CSS Usage</h3>
			<p>Link the stylesheet:</p>
			<pre>&lt;link rel="stylesheet" href="css/dashicons.css"></pre>
			<p>Now add the icons using the <code>:before</code> selector. You can insert the Star icon like this:</p>
		
			<pre>.myicon:before {
	content: '\2605';
	display: inline-block;
	-webkit-font-smoothing: antialiased;
	font: normal 16px/1 'dashicons';
	vertical-align: top;
}</pre>
			<h4>Alternative Selectors</h4>
			<p>For custom post types replace <em>{post_type}</em> with the slug name passed to <code>register_post_type()</code>.<br>
			<code>#menu-posts-{post_type} .wp-menu-image:before</code></p>
			<p>For top level menu pages replace <em>{menu-slug}</em> with the slug name passed to <code>add_menu_page()</code>.<br>
			<code>#toplevel_page_{menu-slug} .wp-menu-image:before</code></p>

			<h3 id="offcialpage"">The official Dashicon Page</h3>
			<p>See also the official <a href="http://melchoyce.github.io/dashicons/">Dashicon Page</a> for more comfort or helpful information.</p>

			<h3 id="alternatives">Alternatives</h3>
			<h4>Font Awesome</h4>
			<p>Alternative you can use another icon font, like Font Awesome.<br>
			Include the font via function, the file was enqueued via the bootstrap CDN. Alternative use your custom URL form the plugin.</p>
			<pre>
add_action( 'admin_enqueue_scripts', 'enqueue_font_awesome' );
function enqueue_font_awesome() {
	wp_enqueue_style(
		'font-awesome',
		'//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css',
		FALSE,
		NULL
	);
}
</pre>
			<p>And now set the icon via CSS.</p>
			<pre>.myicon:before {
	content: '\f07a';
	font-family: FontAwesome !important;
}</pre>
			<p>See more hints and the icons on the <a href="http://fontawesome.io/">official page of Font Awesome</a>.</p>
		</div>
		<?php
	}
	
	public function register_scripts() {
		
		wp_register_style( 'dashicons', plugin_dir_url( __FILE__ ) . '../css/dashicons.css' );
		wp_register_style( 'dashicons-demo',
			plugin_dir_url( __FILE__ ) . '../css/dashicons-demo.css',
			'dashicons'
		);
		wp_enqueue_style ( 'dashicons-demo' );
	}
} // end class