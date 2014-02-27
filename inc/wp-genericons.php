<?php

// avoid direct calls to this file, because now WP core and framework has been used.
! defined( 'ABSPATH' ) and exit;

add_action( 
	'init',
	array( Wp_Admin_Genericons::get_instance(), 'plugin_setup' )
);

class Wp_Admin_Genericons {
	
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
			__( 'Genericons' ),
			__( 'Genericons' ),
			'manage_options',
			'genericons',
			array( $this, 'get_genericon_demo' )
		);
		add_action( 'load-' . $hook, array( $this, 'register_scripts' ) );
	}
	
	public function get_genericon_demo() {
		?>
		<div class="wrap">
		<h2>Genericons</h2>
		<p><a href="http://genericons.com">Genericons</a> are vector icons embedded in a webfont designed to be clean and simple keeping with a generic aesthetic. You can use them for instant HiDPI, to change icon colors on the fly, or with CSS effects such as drop-shadows or gradients.<br>- a free, GPL, flexible icon font for blogs!</p>
		
		<h3>MiniMenu</h3>
		<ul>
			<li><a href="#instructions">Instructions</a></li>
			<li><a href="#cssusage"">CSS Usage</a></li>
			<li><a href="#offcialpage">Official Genericon Page</a></li>
		</ul>

		<h3>Genericon Iconlist</h3>
		<div id="iconlist">
			
			<!-- note, the text inside the HTML elements is purely for the seach -->

			<!-- post formats -->
			<div alt="f100" class="genericon genericon-standard"><code>.genericon-standard</code> <span>standard post</span></div>
			<div alt="f101" class="genericon genericon-aside"><code>genericon-aside</code><span>aside</span></div>
			<div alt="f102" class="genericon genericon-image"><code>.genericon-</code> <span>image</span></div>
			<div alt="f103" class="genericon genericon-gallery"><code>.genericon-image</code> <span>gallery</span></div>
			<div alt="f104" class="genericon genericon-video"><code>.genericon-video</code> <span>video</span></div>
			<div alt="f105" class="genericon genericon-status"><code>.genericon-status</code> <span>status</span></div>
			<div alt="f106" class="genericon genericon-quote"><code>.genericon-quote</code> <span>quote</span></div>
			<div alt="f107" class="genericon genericon-link"><code>.genericon-link</code> <span>link</span></div>
			<div alt="f108" class="genericon genericon-chat"><code>.genericon-chat</code> <span>chat</span></div>
			<div alt="f109" class="genericon genericon-audio"><code>.genericon-audio</code> <span>audio</span></div>

			<!-- social icons -->
			<div alt="f200" class="genericon genericon-github"><code>.genericon-github</code> <span>github</span></div>
			<div alt="f201" class="genericon genericon-dribbble"><code>.genericon-dribble</code> <span>dribbble</span></div>
			<div alt="f202" class="genericon genericon-twitter"><code>.genericon-twitter</code> <span>twitter</span></div>
			<div alt="f203" class="genericon genericon-facebook"><code>.genericon-facebook</code> <span>facebook</span></div>
			<div alt="f204" class="genericon genericon-facebook-alt"><code>.genericon-facebook-alt</code> <span>facebook</span></div>
			<div alt="f205" class="genericon genericon-wordpress"><code>.genericon-wordpress</code> <span>wordpress</span></div>
			<div alt="f206" class="genericon genericon-googleplus"><code>.genericon-googleplus</code> <span>google plus googleplus google+ +</span></div>
			<div alt="f207" class="genericon genericon-linkedin"><code>.genericon-linkedin</code> <span>linkedin</span></div>
			<div alt="f208" class="genericon genericon-linkedin-alt"><code>.genericon-linkedin-alt</code> <span>linkedin</span></div>
			<div alt="f209" class="genericon genericon-pinterest"><code>.genericon-pinterest</code> <span>pinterest</span></div>
			<div alt="f210" class="genericon genericon-pinterest-alt"><code>.genericon-pinterest-alt</code> <span>pinterest</span></div>
			<div alt="f211" class="genericon genericon-flickr"><code>.genericon-flickr</code> <span>flickr</span></div>
			<div alt="f212" class="genericon genericon-vimeo"><code>.genericon-vimeo</code> <span>vimeo</span></div>
			<div alt="f213" class="genericon genericon-youtube"><code>.genericon-youtube</code> <span>youtube</span></div>
			<div alt="f214" class="genericon genericon-tumblr"><code>.genericon-tumblr</code> <span>tumblr</span></div>
			<div alt="f215" class="genericon genericon-instagram"><code>.genericon-instagram</code> <span>instagram</span></div>
			<div alt="f216" class="genericon genericon-codepen"><code>.genericon-codepen</code> <span>codepen</span></div>
			<div alt="f217" class="genericon genericon-polldaddy"><code>.genericon-polldaddy</code> <span>polldaddy</span></div>
			<div alt="f218" class="genericon genericon-googleplus-alt"><code>.genericon-googleplus-alt</code> <span>google plus googleplus google+ +</span></div>
			<div alt="f219" class="genericon genericon-path"><code>.genericon-path</code> <span>path</span></div>
			<div alt="f220" class="genericon genericon-skype"><code>.genericon-skype</code> <span>skype</span></div>
			<div alt="f221" class="genericon genericon-digg"><code>.genericon-digg</code> <span>digg</span></div>
			<div alt="f222" class="genericon genericon-reddit"><code>.genericon-reddit</code> <span>reddit</span></div>
			<div alt="f223" class="genericon genericon-stumbleupon"><code>.genericon-stumbleupon</code> <span>stumbleupon</span></div>
			<div alt="f224" class="genericon genericon-pocket"><code>.genericon-pocket</code> <span>pocket</span></div>
			<div alt="f225" class="genericon genericon-dropbox"><code>.genericon-dropbox</code> <span>dropbox</span></div>

			<!-- meta icons -->
			<div alt="f300" class="genericon genericon-comment"><code>.genericon-comment</code> <span>comment</span></div>
			<div alt="f301" class="genericon genericon-category"><code>.genericon-category</code> <span>category</span></div>
			<div alt="f302" class="genericon genericon-tag"><code>.genericon-tag</code> <span>tag label</span></div>
			<div alt="f303" class="genericon genericon-time"><code>.genericon-time</code> <span>time clock</span></div>
			<div alt="f304" class="genericon genericon-user"><code>.genericon-user</code> <span>user</span></div>
			<div alt="f305" class="genericon genericon-day"><code>.genericon-day</code> <span>day</span></div>
			<div alt="f306" class="genericon genericon-week"><code>.genericon-week</code> <span>week</span></div>
			<div alt="f307" class="genericon genericon-month"><code>.genericon-month</code> <span>month calendar</span></div>
			<div alt="f308" class="genericon genericon-pinned"><code>.genericon-pinned</code> <span>pinned</span></div>

			<!-- other icons -->
			<div alt="f400" class="genericon genericon-search"><code>.genericon-search</code> <span>search</span></div>
			<div alt="f401" class="genericon genericon-unzoom"><code>.genericon-unzoom</code> <span>unzoom</span></div>
			<div alt="f402" class="genericon genericon-zoom"><code>.genericon-zoom</code> <span>zoom</span></div>
			<div alt="f403" class="genericon genericon-show"><code>.genericon-show</code> <span>show</span></div>
			<div alt="f404" class="genericon genericon-hide"><code>.genericon-hide</code> <span>hide</span></div>
			<div alt="f405" class="genericon genericon-close"><code>.genericon-close</code> <span>close</span></div>
			<div alt="f406" class="genericon genericon-close-alt"><code>.genericon-close-alt</code> <span>close</span></div>
			<div alt="f407" class="genericon genericon-trash"><code>.genericon-trash</code> <span>trash trashcan</span></div>
			<div alt="f408" class="genericon genericon-star"><code>.genericon-star</code> <span>star like</span></div>
			<div alt="f409" class="genericon genericon-home"><code>.genericon-home</code> <span>home house</span></div>
			<div alt="f410" class="genericon genericon-mail"><code>.genericon-mail</code> <span>mail</span></div>
			<div alt="f411" class="genericon genericon-edit"><code>.genericon-edit</code> <span>edit</span></div>
			<div alt="f412" class="genericon genericon-reply"><code>.genericon-reply</code> <span>reply</span></div>
			<div alt="f413" class="genericon genericon-feed"><code>.genericon-feed</code> <span>feed rss</span></div>
			<div alt="f414" class="genericon genericon-warning"><code>.genericon-warning</code> <span>warning alert</span></div>
			<div alt="f415" class="genericon genericon-share"><code>.genericon-share</code> <span>share social</span></div>
			<div alt="f416" class="genericon genericon-attachment"><code>.genericon-</code> <span>attachment</span></div>
			<div alt="f417" class="genericon genericon-location"><code>.genericon-attachment</code> <span>location gps</span></div>
			<div alt="f418" class="genericon genericon-checkmark"><code>.genericon-checkmark</code> <span>checkmark</span></div>
			<div alt="f419" class="genericon genericon-menu"><code>.genericon-menu</code> <span>menu hamburger</span></div>
			<div alt="f420" class="genericon genericon-refresh"><code>.genericon-refresh</code> <span>refresh reload</span></div>
			<div alt="f421" class="genericon genericon-minimize"><code>.genericon-minimize</code> <span>minimize</span></div>
			<div alt="f422" class="genericon genericon-maximize"><code>.genericon-maximize</code> <span>maximize</span></div>
			
			<div alt="f423" class="genericon genericon-404"><code>.genericon-404</code> <span>404</span></div>
			
			<div alt="f424" class="genericon genericon-spam"><code>.genericon-spam</code> <span>spam block report</span></div>
			<div alt="f425" class="genericon genericon-summary"><code>.genericon-summery</code> <span>summary checklist</span></div>
			<div alt="f426" class="genericon genericon-cloud"><code>.genericon-cloud</code> <span>cloud</span></div>
			<div alt="f427" class="genericon genericon-key"><code>.genericon-key</code> <span>key lock secure</span></div>
			<div alt="f428" class="genericon genericon-dot"><code>.genericon-dot</code> <span>dot</span></div>
			<div alt="f429" class="genericon genericon-next"><code>.genericon-next</code> <span>next arrow right</span></div>
			<div alt="f430" class="genericon genericon-previous"><code>.genericon-previous</code> <span>previous arrow left</span></div>
			<div alt="f431" class="genericon genericon-expand"><code>.genericon-expand</code> <span>expand up</span></div>
			<div alt="f432" class="genericon genericon-collapse"><code>.genericon-collapse</code> <span>collapse down</span></div>
			<div alt="f433" class="genericon genericon-dropdown"><code>.genericon-dropdown</code> <span>dropdown</span></div>
			<div alt="f434" class="genericon genericon-dropdown-left"><code>.genericon-dropdown-left</code> <span>dropdown</span></div>
			<div alt="f435" class="genericon genericon-top"><code>.genericon-top</code> <span>top up</span></div>
			<div alt="f436" class="genericon genericon-draggable"><code>.genericon-draggable</code> <span>draggable</span></div>
			<div alt="f437" class="genericon genericon-phone"><code>.genericon-phone</code> <span>phone</span></div>
			<div alt="f438" class="genericon genericon-send-to-phone"><code>.genericon-draggable</code> <span>send to phone</span></div>
			<div alt="f439" class="genericon genericon-plugin"><code>.genericon-plugin</code> <span>plugin</span></div>
			<div alt="f440" class="genericon genericon-cloud-download"><code>.genericon-cloud-download</code> <span>cloud download</span></div>
			<div alt="f441" class="genericon genericon-cloud-upload"><code>.genericon-cloud-upload</code> <span>cloud upload</span></div>
			<div alt="f442" class="genericon genericon-external"><code>.genericon-externel</code> <span>external link</span></div>
			<div alt="f443" class="genericon genericon-document"><code>.genericon-document</code> <span>document page</span></div>
			<div alt="f444" class="genericon genericon-book"><code>.genericon-book</code> <span>book</span></div>
			<div alt="f445" class="genericon genericon-cog"><code>.genericon-cog</code> <span>cog configure settings</span></div>
			<div alt="f446" class="genericon genericon-unapprove"><code>.genericon-unapprove</code> <span>unapprove</span></div>
			<div alt="f447" class="genericon genericon-cart"><code>.genericon-cart</code> <span>cart shop</span></div>
			<div alt="f448" class="genericon genericon-pause"><code>.genericon-pause</code> <span>pause</span></div>
			<div alt="f449" class="genericon genericon-stop"><code>.genericon-skip</code> <span>stop</span></div>
			<div alt="f450" class="genericon genericon-skip-back"><code>.genericon-skip-back</code> <span>skip back</span></div>
			<div alt="f451" class="genericon genericon-skip-ahead"><code>.genericon-skip-ahead</code> <span>skip ahead</span></div>
			<div alt="f452" class="genericon genericon-play"><code>.genericon-play</code> <span>play</span></div>
			<div alt="f453" class="genericon genericon-tablet"><code>.genericon-tablet</code> <span>tablet</span></div>
			<div alt="f454" class="genericon genericon-send-to-tablet"><code>.genericon-send-to-tablet</code> <span>send to tablet</span></div>
			<div alt="f455" class="genericon genericon-info"><code>.genericon-info</code> <span>info</span></div>
			<div alt="f456" class="genericon genericon-notice"><code>.genericon-notice</code> <span>notice</span></div>
			<div alt="f457" class="genericon genericon-help"><code>.genericon-help</code> <span>help</span></div>
			<div alt="f458" class="genericon genericon-fastforward"><code>.genericon-fastforward</code> <span>fastforward arrow</span></div>
			<div alt="f459" class="genericon genericon-rewind"><code>.genericon-rewind</code> <span>rewind arrow</span></div>
			<div alt="f460" class="genericon genericon-portfolio"><code>.genericon-portfolio</code> <span>portfolio</span></div>
			<div alt="f461" class="genericon genericon-heart"><code>.genericon-heart</code> <span>heart like</span></div>
			<div alt="f462" class="genericon genericon-code"><code>.genericon-code</code> <span>code wysiwyg</span></div>
			<div alt="f463" class="genericon genericon-subscribe"><code>.genericon-subscribe</code> <span>subscribe follow</span></div>
			<div alt="f464" class="genericon genericon-unsubscribe"><code>.genericon-unsubscribe</code> <span>unsubscribe unfollow</span></div>
			<div alt="f465" class="genericon genericon-subscribed"><code>.genericon-subscribed</code> <span>unsubscribed unfollowed</span></div>
			<div alt="f466" class="genericon genericon-reply-alt"><code>.genericon-reply-alt</code> <span>reply all</span></div>
			<div alt="f467" class="genericon genericon-reply-single"><code>.genericon-reply-single</code> <span>reply single</span></div>
			<div alt="f468" class="genericon genericon-flag"><code>.genericon-flag</code> <span>flag alert</span></div>
			<div alt="f469" class="genericon genericon-print"><code>.genericon-print</code> <span>print</span></div>
			<div alt="f470" class="genericon genericon-lock"><code>.genericon-lock</code> <span>lock secure</span></div>
			<div alt="f471" class="genericon genericon-bold"><code>.genericon-bold</code> <span>bold wysiwyg</span></div>
			<div alt="f472" class="genericon genericon-italic"><code>.genericon-italic</code> <span>italic wysiwyg</span></div>
			<div alt="f473" class="genericon genericon-picture"><code>.genericon-picture</code> <span>picture wysiwyg</span></div>
			<div alt="f474" class="genericon genericon-fullscreen"><code>.genericon-fullscreen</code> <span>fullscreen maximize wysiwyg</span></div>

			<!-- generic shapes -->
			<div alt="f500" class="genericon genericon-uparrow"><code>.genericon-uparrow</code> <span>up arrow</span></div>
			<div alt="f501" class="genericon genericon-rightarrow"><code>.genericon-rightarrow</code> <span>right arrow</span></div>
			<div alt="f502" class="genericon genericon-downarrow"><code>.genericon-downarrow</code> <span>down arrow</span></div>
			<div alt="f503" class="genericon genericon-leftarrow"><code>.genericon-leftarrow</code> <span>left arrow</span></div>
		</div>
		
		<div id="instructions">
			
			<h3 id="htmlusage">HTML Usage</h3>
			<p>Genericons can be displayed via HTML: <code>&lt;i alt="f202" class="genericond genericon genericon-twitter"&gt;&lt;/i&gt;</code></p>
			</p>

			<h3 id="cssusage">CSS Usage</h3>
			<p>Link the stylesheet:</p>
			<pre>&lt;link rel="stylesheet" href="css/dashicons.css"></pre>
			<p>Now add the icons using the <code>:before</code> selector. You can insert the Star icon like this:</p>
		
			<pre>.myicon:before {
	content: '\f205';
	display: inline-block;
	-webkit-font-smoothing: antialiased;
	font: normal 32px/1 'Genericons';
	vertical-align: bottom;
}</pre>

			<h3 id="offcialpage"">The official Genericon Page</h3>
			<p>See also the official <a href="http://genericons.com/">Genericon Page</a> for more comfort or helpful information.</p>
			
		</div>
		<?php
	}
	
	public function register_scripts() {
		
		wp_register_style( 'genericons', plugin_dir_url( __FILE__ ) . '../css/genericons.css' );
		wp_register_style( 'genericons-demo',
			plugin_dir_url( __FILE__ ) . '../css/genericons-demo.css',
			'genericons'
		);
		wp_enqueue_style ( array( 'genericons', 'genericons-demo') );
	}
} // end class