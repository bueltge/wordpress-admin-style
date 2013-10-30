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
			'WordPress-Admin-Style/wp-admin-style.php',
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
		<p>Dashicons icon font for MP6, currently in development. You can check out MP6 at <a href="http://wordpress.org/extend/plugins/mp6/">http://wordpress.org/extend/plugins/mp6/</a>.</p>
		<p>See also the official <a href="http://melchoyce.github.io/dashicons/">Dashicon Page</a> for more comfort or helpful information.</p>
		<div id="iconlist">
			
			<!-- admin menu -->
			<div alt="f228" class="dashicons dashicons-menu"></div>
			<div alt="f319" class="dashicons dashicons-site"></div>
			<div alt="f226" class="dashicons dashicons-gauge"></div>
			<div alt="f102" class="dashicons dashicons-admin-dashboard"></div>
			<div alt="f109" class="dashicons dashicons-admin-post"></div>
			<div alt="f104" class="dashicons dashicons-admin-media"></div>
			<div alt="f103" class="dashicons dashicons-admin-links"></div>
			<div alt="f105" class="dashicons dashicons-admin-page"></div>
			<div alt="f101" class="dashicons dashicons-admin-comments"></div>
			<div alt="f100" class="dashicons dashicons-admin-appearance"></div>
			<div alt="f106" class="dashicons dashicons-admin-plugins"></div>
			<div alt="f110" class="dashicons dashicons-admin-users"></div>
			<div alt="f107" class="dashicons dashicons-admin-tools"></div>
			<div alt="f108" class="dashicons dashicons-admin-settings"></div>
			<div alt="f112" class="dashicons dashicons-admin-site"></div>
			<div alt="f111" class="dashicons dashicons-admin-generic"></div>
			<div alt="f148" class="dashicons dashicons-admin-collapse"></div>	
			
			<!-- welcome screen -->
			<div alt="f119" class="dashicons dashicons-welcome-write-blog"></div>
			<!--<div alt="f119" class="dashicons dashicons-welcome-edit-page"></div> Duplicate -->
			<div alt="f133" class="dashicons dashicons-welcome-add-page"></div>
			<div alt="f115" class="dashicons dashicons-welcome-view-site"></div>
			<div alt="f116" class="dashicons dashicons-welcome-widgets-menus"></div>
			<div alt="f117" class="dashicons dashicons-welcome-comments"></div>
			<div alt="f118" class="dashicons dashicons-welcome-learn-more"></div>			

			<!-- post formats -->
			<!--<div alt="f109" class="dashicons dashicons-format-standard"></div> Duplicate -->
			<div alt="f123" class="dashicons dashicons-format-aside"></div>
			<div alt="f128" class="dashicons dashicons-format-image"></div>
			<div alt="f161" class="dashicons dashicons-format-gallery"></div>
			<div alt="f126" class="dashicons dashicons-format-video"></div>
			<div alt="f130" class="dashicons dashicons-format-status"></div>
			<div alt="f122" class="dashicons dashicons-format-quote"></div>
			<!--<div alt="f103" class="dashicons dashicons-format-link"></div> Duplicate -->
			<div alt="f125" class="dashicons dashicons-format-chat"></div>
			<div alt="f127" class="dashicons dashicons-format-audio"></div>
			<div alt="f306" class="dashicons dashicons-camera2"></div>
			<div alt="f232" class="dashicons dashicons-images-alt1"></div>
			<div alt="f233" class="dashicons dashicons-images-alt2"></div>
			<div alt="f234" class="dashicons dashicons-video-alt1"></div>
			<div alt="f235" class="dashicons dashicons-video-alt2"></div>
			<div alt="f236" class="dashicons dashicons-video-alt3"></div>
			
			<!-- image editing -->
			<div alt="f165" class="dashicons dashicons-imgedit-crop"></div>
			<div alt="f166" class="dashicons dashicons-imgedit-rleft"></div>
			<div alt="f167" class="dashicons dashicons-imgedit-rright"></div>
			<div alt="f168" class="dashicons dashicons-imgedit-flipv"></div>
			<div alt="f169" class="dashicons dashicons-imgedit-fliph"></div>
			<div alt="f171" class="dashicons dashicons-imgedit-undo"></div>
			<div alt="f172" class="dashicons dashicons-imgedit-redo"></div>		
			
			<!-- posts -->
			<div alt="f135" class="dashicons dashicons-align-left"></div>
			<div alt="f136" class="dashicons dashicons-align-right"></div>	
			<div alt="f134" class="dashicons dashicons-align-center"></div>
			<div alt="f138" class="dashicons dashicons-align-none"></div>
			<div alt="f160" class="dashicons dashicons-lock"></div>
			<div alt="f145" class="dashicons dashicons-calendar"></div>
			<div alt="f177" class="dashicons dashicons-visibility"></div>
			<div alt="f173" class="dashicons dashicons-post-status"></div>
			
			<!-- tinymce -->
			<div alt="f200" class="dashicons dashicons-tinymce-bold"></div>
			<div alt="f201" class="dashicons dashicons-tinymce-italic"></div>	
			<div alt="f203" class="dashicons dashicons-tinymce-ul"></div>
			<div alt="f204" class="dashicons dashicons-tinymce-ol"></div>
			<div alt="f205" class="dashicons dashicons-tinymce-quote"></div>
			<div alt="f206" class="dashicons dashicons-tinymce-alignleft"></div>
			<div alt="f207" class="dashicons dashicons-tinymce-aligncenter"></div>
			<div alt="f208" class="dashicons dashicons-tinymce-alignright"></div>
			<div alt="f209" class="dashicons dashicons-tinymce-insertmore"></div>
			<div alt="f210" class="dashicons dashicons-tinymce-spellcheck"></div>
			<div alt="f211" class="dashicons dashicons-tinymce-distractionfree"></div>
			<div alt="f212" class="dashicons dashicons-tinymce-kitchensink"></div>
			<div alt="f213" class="dashicons dashicons-tinymce-underline"></div>
			<div alt="f214" class="dashicons dashicons-tinymce-justify"></div>
			<div alt="f215" class="dashicons dashicons-tinymce-textcolor"></div>
			<div alt="f216" class="dashicons dashicons-tinymce-word"></div>
			<div alt="f217" class="dashicons dashicons-tinymce-plaintext"></div>
			<div alt="f218" class="dashicons dashicons-tinymce-removeformatting"></div>
			<div alt="f219" class="dashicons dashicons-tinymce-video"></div>
			<div alt="f220" class="dashicons dashicons-tinymce-customchar"></div>
			<div alt="f221" class="dashicons dashicons-tinymce-outdent"></div>
			<div alt="f222" class="dashicons dashicons-tinymce-indent"></div>
			<div alt="f223" class="dashicons dashicons-tinymce-help"></div>
			<div alt="f224" class="dashicons dashicons-tinymce-strikethrough"></div>
			<div alt="f225" class="dashicons dashicons-tinymce-unlink"></div>
			<div alt="f320" class="dashicons dashicons-tinymce-rtl"></div>
			
			<!-- sorting -->
			<div alt="f142" class="dashicons dashicons-arr-up"></div>
			<div alt="f140" class="dashicons dashicons-arr-down"></div>
			<div alt="f139" class="dashicons dashicons-arr-right"></div>
			<div alt="f141" class="dashicons dashicons-arr-left"></div>
			<div alt="f156" class="dashicons dashicons-sort"></div>
			<div alt="f229" class="dashicons dashicons-leftright"></div>
			<div alt="f163" class="dashicons dashicons-list-view"></div>
			<div alt="f164" class="dashicons dashicons-exerpt-view"></div>
			
			<!-- social -->
			<div alt="f237" class="dashicons dashicons-share"></div>
			<div alt="f240" class="dashicons dashicons-share2"></div>
			<div alt="f242" class="dashicons dashicons-share3"></div>
			<div alt="f301" class="dashicons dashicons-twitter1"></div>
			<div alt="f302" class="dashicons dashicons-twitter2"></div>
			<div alt="f303" class="dashicons dashicons-rss"></div>
			<div alt="f304" class="dashicons dashicons-facebook1"></div>
			<div alt="f305" class="dashicons dashicons-facebook2"></div>
								
			<!-- jobs -->			
			<div alt="f308" class="dashicons dashicons-jobs-developers"></div>
			<div alt="f309" class="dashicons dashicons-jobs-designers"></div>
			<div alt="f310" class="dashicons dashicons-jobs-migration"></div>
			<div alt="f311" class="dashicons dashicons-jobs-performance"></div>
			
			<!-- misc -->
			<div alt="f120" class="dashicons dashicons-wordpress"></div>
			<div alt="f157" class="dashicons dashicons-pressthis"></div>
			<div alt="f113" class="dashicons dashicons-update"></div>
			<div alt="f180" class="dashicons dashicons-screenoptions"></div>
			<div alt="f174" class="dashicons dashicons-cart"></div>
			<div alt="f175" class="dashicons dashicons-feedback"></div>
			<div alt="f176" class="dashicons dashicons-cloud"></div>
			<div alt="f315" class="dashicons dashicons-lock"></div>
			<div alt="f321" class="dashicons dashicons-backup"></div>
			<div alt="f316" class="dashicons dashicons-arrow-down"></div>
			<div alt="f317" class="dashicons dashicons-arrow-up"></div>
			<div alt="f323" class="dashicons dashicons-tag"></div>
			<div alt="f318" class="dashicons dashicons-category"></div>
			<div alt="f147" class="dashicons dashicons-yes"></div>
			<div alt="f158" class="dashicons dashicons-no"></div>
			<div alt="f132" class="dashicons dashicons-plus-small"></div>
			<div alt="f153" class="dashicons dashicons-xit"></div>
			<div alt="f159" class="dashicons dashicons-marker"></div>	
			<div alt="f155" class="dashicons dashicons-star-filled"></div>
			<div alt="f154" class="dashicons dashicons-star-empty"></div>	
			<div alt="f227" class="dashicons dashicons-flag"></div>
			<div alt="f230" class="dashicons dashicons-location"></div>
			<div alt="f231" class="dashicons dashicons-location-alt"></div>	
			<div alt="f178" class="dashicons dashicons-vault"></div>
			<div alt="f179" class="dashicons dashicons-search"></div>
			<div alt="f181" class="dashicons dashicons-slides"></div>
			<div alt="f183" class="dashicons dashicons-analytics"></div>
			<div alt="f184" class="dashicons dashicons-piechart"></div>
			<div alt="f185" class="dashicons dashicons-bargraph"></div>
			<div alt="f238" class="dashicons dashicons-bargraph2"></div>
			<div alt="f239" class="dashicons dashicons-bargraph3"></div>
			<div alt="f307" class="dashicons dashicons-groups"></div>
			<div alt="f312" class="dashicons dashicons-products"></div>
			<div alt="f313" class="dashicons dashicons-awards"></div>
			<div alt="f314" class="dashicons dashicons-forms"></div>
			<div alt="f322" class="dashicons dashicons-portfolio"></div>
		</div>
		
		<div id="instructions">
	
			<h3>Photoshop Usage</h3>
			<p>Use the .OTF version of the font for Photoshop mockups, the web-font versions won't work. For most accurate results, pick the "Sharp" font smoothing.</p>
		
			<h3>CSS Usage</h3>
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