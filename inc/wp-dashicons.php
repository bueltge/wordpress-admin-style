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
			<li><a href="#iconpicker">Iconpicker</a></li>
			<li><a href="#iconlist">Iconlist</a>
				<ol>
					<li><a href="#iconlist">Admin Menu</a></li>
					<li><a href="#welcomescreen">Welcome Screen</a></li>
					<li><a href="#postformats">Post Formats</a></li>
					<li><a href="#imageediting">Image Editing</a></li>
					<li><a href="#posts">Posts</a></li>
					<li><a href="#tinymce">TinyMCE</a></li>
					<li><a href="#sorting">Sorting</a></li>
					<li><a href="#social">Social</a></li>
					<li><a href="#jobs">Jobs</a></li>
					<li><a href="#misc">Misc</a></li>
					<li><a href="#mediaicons">Media Icons</a></li>
					<li><a href="#wporgspecific">WPorg specific: Jobs, Profiles, WordCamps</a></li>
					<li><a href="#widget">Widget</a></li>
					<li><a href="#widget">Alerts/Notifications/Flags</a></li>
				</ol>
			</li>
			<li><a href="#instructions">Instructions</a></li>
			<li><a href="#instructions">Photoshop Usage</a></li>
			<li><a href="#cssusage"">CSS Usage</a></li>
			<li><a href="#offcialpage">Official Dashicon Page</a></li>
			<li><a href="#alternatives">Alternatives Font Awesome</a></li>
		</ul>

		<h3 id="iconpicker">Iconpicker for Dashicons</h3>
		<div>
			<label for="dashicons_picker_icon"><?php _e( 'Icon' ); ?></label>
			<input class="regular-text" type="text" id="dashicons_picker_icon" name="dashicons_picker_settings[icon]" value="<?php if( isset( $options['icon'] ) ) { echo esc_attr( $options['icon'] ); } ?>"/>
			<input type="button" data-target="#dashicons_picker_icon" class="button dashicons-picker" value="pick" />
		</div>

		<h3>Dashicon Iconlist</h3>
		<div id="iconlist">
			
			<!-- admin menu -->
			<h3>Admin Menu</h3>
			<div alt="f228" class="dashicons dashicons-menu"><code>.dashicons-menu</code>, <code>f228</code></div>
			<div alt="f319" class="dashicons dashicons-site"><code>.dashicons-site</code>, <code>f319</code></div>
			<div alt="f226" class="dashicons dashicons-gauge"><code>.dashicons-gauge</code>, <code>f226</code></div>
			<div alt="f102" class="dashicons dashicons-admin-dashboard"><code>.dashicons-admin-dashboard</code>, <code>f102</code></div>
			<div alt="f109" class="dashicons dashicons-admin-post"><code>.dashicons-admin-post</code>, <code>f109</code></div>
			<div alt="f104" class="dashicons dashicons-admin-media"><code>.dashicons-admin-media</code>, <code>f104</code></div>
			<div alt="f103" class="dashicons dashicons-admin-links"><code>.dashicons-admin-links</code>, <code>f103</code></div>
			<div alt="f105" class="dashicons dashicons-admin-page"><code>.dashicons-admin-page</code>, <code>f105</code></div>
			<div alt="f101" class="dashicons dashicons-admin-comments"><code>.dashicons-admin-comments</code>, <code>f101</code></div>
			<div alt="f100" class="dashicons dashicons-admin-appearance"><code>.dashicons-admin-appearance</code>, <code>f100</code></div>
			<div alt="f106" class="dashicons dashicons-admin-plugins"><code>.dashicons-admin-plugins</code>, <code>f106</code></div>
			<div alt="f110" class="dashicons dashicons-admin-users"><code>.dashicons-admin-users</code>, <code>f110</code></div>
			<div alt="f107" class="dashicons dashicons-admin-tools"><code>.dashicons-admin-tools</code>, <code>f107</code></div>
			<div alt="f108" class="dashicons dashicons-admin-settings"><code>.dashicons-admin-settings</code>, <code>f108</code></div>
			<div alt="f112" class="dashicons dashicons-admin-site"><code>.dashicons-admin-site</code>, <code>f112</code></div>
			<div alt="f111" class="dashicons dashicons-admin-generic"><code>.dashicons-admin-generic</code>, <code>f111</code></div>
			<div alt="f148" class="dashicons dashicons-admin-collapse"><code>.dashicons-admin-collapse</code>, <code>f148</code></div>	
			
			<!-- welcome screen -->
			<h3 id="welcomescreen">Welcome Screen</h3>
			<div alt="f119" class="dashicons dashicons-welcome-write-blog"><code>.dashicons-welcome-write-blog</code>, <code>f119</code></div>
			<!--<div alt="f119" class="dashicons dashicons-welcome-edit-page"><code>.dashicons-welcome-edit-page</code>, <code>f119</code></div> Duplicate -->
			<div alt="f133" class="dashicons dashicons-welcome-add-page"><code>.dashicons-welcome-add-page</code>, <code>f133</code></div>
			<div alt="f115" class="dashicons dashicons-welcome-view-site"><code>.dashicons-welcome-view-site</code>, <code>f115</code></div>
			<div alt="f116" class="dashicons dashicons-welcome-widgets-menus"><code>.dashicons-welcome-widgets-menus</code>, <code>f116</code></div>
			<div alt="f117" class="dashicons dashicons-welcome-comments"><code>.dashicons-welcome-comments</code>, <code>f117</code></div>
			<div alt="f118" class="dashicons dashicons-welcome-learn-more"><code>.dashicons-welcome-learn-more</code>, <code>f118</code></div>			

			<!-- post formats -->
			<h3 id="postformats">Post Formats</h3>
			<!--<div alt="f109" class="dashicons dashicons-format-standard"><code>.dashicons-</code>, <code>f109</code></div> Duplicate -->
			<div alt="f123" class="dashicons dashicons-format-aside"><code>.dashicons-format-aside</code>, <code>f123</code></div>
			<div alt="f128" class="dashicons dashicons-format-image"><code>.dashicons-format-image</code>, <code>f128</code></div>
			<div alt="f161" class="dashicons dashicons-format-gallery"><code>.dashicons-format-gallery</code>, <code>f161</code></div>
			<div alt="f126" class="dashicons dashicons-format-video"><code>.dashicons-format-video</code>, <code>f126</code></div>
			<div alt="f130" class="dashicons dashicons-format-status"><code>.dashicons-format-status</code>, <code>f130</code></div>
			<div alt="f122" class="dashicons dashicons-format-quote"><code>.dashicons-format-quote</code>, <code>f122</code></div>
			<!--<div alt="f103" class="dashicons dashicons-format-link"><code>.dashicons-</code>, <code>f103</code></div> Duplicate -->
			<div alt="f125" class="dashicons dashicons-format-chat"><code>.dashicons-format-chat</code>, <code>f125</code></div>
			<div alt="f127" class="dashicons dashicons-format-audio"><code>.dashicons-format-audio</code>, <code>f127</code></div>
			<div alt="f306" class="dashicons dashicons-camera2"><code>.dashicons-camera2</code>, <code>f306</code></div>
			<div alt="f232" class="dashicons dashicons-images-alt1"><code>.dashicons-images-alt1</code>, <code>f232</code></div>
			<div alt="f233" class="dashicons dashicons-images-alt2"><code>.dashicons-images-alt2</code>, <code>f233</code></div>
			<div alt="f234" class="dashicons dashicons-video-alt1"><code>.dashicons-video-alt1</code>, <code>f234</code></div>
			<div alt="f235" class="dashicons dashicons-video-alt2"><code>.dashicons-video-alt2</code>, <code>f235</code></div>
			<div alt="f236" class="dashicons dashicons-video-alt3"><code>.dashicons-video-alt3</code>, <code>f236</code></div>
			
			<!-- image editing -->
			<h3 id="imageediting">Image Editing</h3>
			<div alt="f165" class="dashicons dashicons-imgedit-crop"><code>.dashicons-imgedit-crop</code>, <code>f165</code></div>
			<div alt="f166" class="dashicons dashicons-imgedit-rleft"><code>.dashicons-imgedit-rleft</code>, <code>f166</code></div>
			<div alt="f167" class="dashicons dashicons-imgedit-rright"><code>.dashicons-imgedit-rright</code>, <code>f167</code></div>
			<div alt="f168" class="dashicons dashicons-imgedit-flipv"><code>.dashicons-imgedit-flipv</code>, <code>f168</code></div>
			<div alt="f169" class="dashicons dashicons-imgedit-fliph"><code>.dashicons-imgedit-fliph</code>, <code>f169</code></div>
			<div alt="f171" class="dashicons dashicons-imgedit-undo"><code>.dashicons-imgedit-undo</code>, <code>f171</code></div>
			<div alt="f172" class="dashicons dashicons-imgedit-redo"><code>.dashicons-imgedit-redo</code>, <code>f172</code></div>		
			
			<!-- posts -->
			<h3 id="posts">Posts</h3>
			<div alt="f135" class="dashicons dashicons-align-left"><code>.dashicons-align-left</code>, <code>f135</code></div>
			<div alt="f136" class="dashicons dashicons-align-right"><code>.dashicons-align-right</code>, <code>f136</code></div>	
			<div alt="f134" class="dashicons dashicons-align-center"><code>.dashicons-align-center</code>, <code>f134</code></div>
			<div alt="f138" class="dashicons dashicons-align-none"><code>.dashicons-align-none</code>, <code>f138</code></div>
			<div alt="f160" class="dashicons dashicons-lock"><code>.dashicons-lock</code>, <code>f160</code></div>
			<div alt="f145" class="dashicons dashicons-calendar"><code>.dashicons-calendar</code>, <code>f145</code></div>
			<div alt="f177" class="dashicons dashicons-visibility"><code>.dashicons-visibility</code>, <code>f177</code></div>
			<div alt="f173" class="dashicons dashicons-post-status"><code>.dashicons-post-status</code>, <code>f173</code></div>
			
			<!-- tinymce -->
			<h3 id="tinymce">Tiny MCE</h3>
			<div alt="f200" class="dashicons dashicons-tinymce-bold"><code>.dashicons-tinymce-bold</code>, <code>f200</code></div>
			<div alt="f201" class="dashicons dashicons-tinymce-italic"><code>.dashicons-tinymce-italic</code>, <code>f201</code></div>	
			<div alt="f203" class="dashicons dashicons-tinymce-ul"><code>.dashicons-tinymce-ul</code>, <code>f203</code></div>
			<div alt="f204" class="dashicons dashicons-tinymce-ol"><code>.dashicons-tinymce-ol</code>, <code>f204</code></div>
			<div alt="f205" class="dashicons dashicons-tinymce-quote"><code>.dashicons-tinymce-quote</code>, <code>f205</code></div>
			<div alt="f206" class="dashicons dashicons-tinymce-alignleft"><code>.dashicons-tinymce-alignleft</code>, <code>f206</code></div>
			<div alt="f207" class="dashicons dashicons-tinymce-aligncenter"><code>.dashicons-tinymce-aligncenter</code>, <code>f207</code></div>
			<div alt="f208" class="dashicons dashicons-tinymce-alignright"><code>.dashicons-tinymce-alignright</code>, <code>f208</code></div>
			<div alt="f209" class="dashicons dashicons-tinymce-insertmore"><code>.dashicons-tinymce-insertmore</code>, <code>f209</code></div>
			<div alt="f210" class="dashicons dashicons-tinymce-spellcheck"><code>.dashicons-tinymce-spellcheck</code>, <code>f210</code></div>
			<div alt="f211" class="dashicons dashicons-tinymce-distractionfree"><code>.dashicons-tinymce-distractionfree</code>, <code>f211</code></div>
			<div alt="f212" class="dashicons dashicons-tinymce-kitchensink"><code>.dashicons-tinymce-kitchensink</code>, <code>f212</code></div>
			<div alt="f213" class="dashicons dashicons-tinymce-underline"><code>.dashicons-tinymce-underline</code>, <code>f213</code></div>
			<div alt="f214" class="dashicons dashicons-tinymce-justify"><code>.dashicons-tinymce-justify</code>, <code>f214</code></div>
			<div alt="f215" class="dashicons dashicons-tinymce-textcolor"><code>.dashicons-tinymce-textcolor</code>, <code>f215</code></div>
			<div alt="f216" class="dashicons dashicons-tinymce-word"><code>.dashicons-tinymce-word</code>, <code>f216</code></div>
			<div alt="f217" class="dashicons dashicons-tinymce-plaintext"><code>.dashicons-tinymce-plaintext</code>, <code>f217</code></div>
			<div alt="f218" class="dashicons dashicons-tinymce-removeformatting"><code>.dashicons-</code>, <code>f218</code></div>
			<div alt="f219" class="dashicons dashicons-tinymce-video"><code>.dashicons-tinymce-video</code>, <code>f219</code></div>
			<div alt="f220" class="dashicons dashicons-tinymce-customchar"><code>.dashicons-tinymce-customchar</code>, <code>f220</code></div>
			<div alt="f221" class="dashicons dashicons-tinymce-outdent"><code>.dashicons-tinymce-outdent</code>, <code>f221</code></div>
			<div alt="f222" class="dashicons dashicons-tinymce-indent"><code>.dashicons-tinymce-indent</code>, <code>f222</code></div>
			<div alt="f223" class="dashicons dashicons-tinymce-help"><code>.dashicons-tinymce-help</code>, <code>f223</code></div>
			<div alt="f224" class="dashicons dashicons-tinymce-strikethrough"><code>.dashicons-tinymce-strikethrough</code>, <code>f224</code></div>
			<div alt="f225" class="dashicons dashicons-tinymce-unlink"><code>.dashicons-tinymce-unlink</code>, <code>f225</code></div>
			<div alt="f320" class="dashicons dashicons-tinymce-rtl"><code>.dashicons-tinymce-rtl</code>, <code>f320</code></div>
			<div alt="f506" class="dashicons dashicons-editor-contract"><code>.dashicons-editor-contract</code>, <code>f506</code></div>
			<div alt="f464" class="dashicons dashicons-editor-break"><code>.dashicons-editor-break</code>, <code>f464</code></div>
			<div alt="f475" class="dashicons dashicons-editor-code"><code>.dashicons-editor-code</code>, <code>f475</code></div>
			<div alt="f476" class="dashicons dashicons-editor-paragraph"><code>.dashicons-editor-paragraph</code>, <code>f476</code></div>
			
			<!-- sorting -->
			<h3 id="sorting">Sorting</h3>
			<div alt="f142" class="dashicons dashicons-arr-up"><code>.dashicons-arr-up</code>, <code>f142</code></div>
			<div alt="f140" class="dashicons dashicons-arr-down"><code>.dashicons-arr-down</code>, <code>f140</code></div>
			<div alt="f139" class="dashicons dashicons-arr-right"><code>.dashicons-arr-right</code>, <code>f139</code></div>
			<div alt="f141" class="dashicons dashicons-arr-left"><code>.dashicons-arr-left</code>, <code>f141</code></div>
			<div alt="f156" class="dashicons dashicons-sort"><code>.dashicons-sort</code>, <code>f156</code></div>
			<div alt="f229" class="dashicons dashicons-leftright"><code>.dashicons-leftright</code>, <code>f229</code></div>
			<div alt="f163" class="dashicons dashicons-list-view"><code>.dashicons-list-view</code>, <code>f136</code></div>
			<div alt="f164" class="dashicons dashicons-exerpt-view"><code>.dashicons-exerpt-view</code>, <code>f164</code></div>
			<div alt="f504" class="dashicons dashicons-external"><code>.dashicons-external</code>, <code>f504</code></div>
			<div alt="f503" class="dashicons dashicons-randomize"><code>.dashicons-randomize</code>, <code>f503</code></div>
			
			<!-- social -->
			<h3 id="social">Social</h3>
			<div alt="f237" class="dashicons dashicons-share"><code>.dashicons-share</code>, <code>f237</code></div>
			<div alt="f240" class="dashicons dashicons-share2"><code>.dashicons-share2</code>, <code>f240</code></div>
			<div alt="f242" class="dashicons dashicons-share3"><code>.dashicons-share3</code>, <code>f242</code></div>
			<div alt="f301" class="dashicons dashicons-twitter1"><code>.dashicons-twitter1</code>, <code>f301</code></div>
			<div alt="f302" class="dashicons dashicons-twitter2"><code>.dashicons-twitter2</code>, <code>f302</code></div>
			<div alt="f303" class="dashicons dashicons-rss"><code>.dashicons-rss</code>, <code>f303</code></div>
			<div alt="f304" class="dashicons dashicons-facebook1"><code>.dashicons-facebook1</code>, <code>f304</code></div>
			<div alt="f305" class="dashicons dashicons-facebook2"><code>.dashicons-facebook2</code>, <code>f305</code></div>
			
			<!-- jobs -->
			<h3 id="jobs">Jobs</h3>
			<div alt="f308" class="dashicons dashicons-jobs-developers"><code>.dashicons-jobs-developers</code>, <code>f308</code></div>
			<div alt="f309" class="dashicons dashicons-jobs-designers"><code>.dashicons-jobs-designers</code>, <code>f309</code></div>
			<div alt="f310" class="dashicons dashicons-jobs-migration"><code>.dashicons-jobs-migration</code>, <code>f310</code></div>
			<div alt="f311" class="dashicons dashicons-jobs-performance"><code>.dashicons-jobs-performance</code>, <code>f311</code></div>
			
			<!-- misc -->
			<h3 id="misc">Misc</h3>
			<div alt="f120" class="dashicons dashicons-wordpress"><code>.dashicons-wordpress</code>, <code>f120</code></div>
			<div alt="f157" class="dashicons dashicons-pressthis"><code>.dashicons-pressthis</code>, <code>f157</code></div>
			<div alt="f113" class="dashicons dashicons-update"><code>.dashicons-update</code>, <code>f113</code></div>
			<div alt="f180" class="dashicons dashicons-screenoptions"><code>.dashicons-screenoptions</code>, <code>f180</code></div>
			<div alt="f174" class="dashicons dashicons-cart"><code>.dashicons-cart</code>, <code>f174</code></div>
			<div alt="f175" class="dashicons dashicons-feedback"><code>.dashicons-feedback</code>, <code>f175</code></div>
			<div alt="f176" class="dashicons dashicons-cloud"><code>.dashicons-cloud</code>, <code>f176</code></div>
			<div alt="f315" class="dashicons dashicons-lock"><code>.dashicons-lock</code>, <code>f315</code></div>
			<div alt="f321" class="dashicons dashicons-backup"><code>.dashicons-backup</code>, <code>f321</code></div>
			<div alt="f316" class="dashicons dashicons-arrow-down"><code>.dashicons-arrow-down</code>, <code>f316</code></div>
			<div alt="f317" class="dashicons dashicons-arrow-up"><code>.dashicons-arrow-up</code>, <code>f317</code></div>
			<div alt="f323" class="dashicons dashicons-tag"><code>.dashicons-tag</code>, <code>f323</code></div>
			<div alt="f318" class="dashicons dashicons-category"><code>.dashicons-category</code>, <code>f318</code></div>
			<div alt="f147" class="dashicons dashicons-yes"><code>.dashicons-yes</code>, <code>f147</code></div>
			<div alt="f158" class="dashicons dashicons-no"><code>.dashicons-no</code>, <code>f158</code></div>
			<div alt="f132" class="dashicons dashicons-plus-small"><code>.dashicons-plus-small</code>, <code>f132</code></div>
			<div alt="f153" class="dashicons dashicons-xit"><code>.dashicons-xit</code>, <code>f153</code></div>
			<div alt="f159" class="dashicons dashicons-marker"><code>.dashicons-marker</code>, <code>f159</code></div>	
			<div alt="f155" class="dashicons dashicons-star-filled"><code>.dashicons-star-filled</code>, <code>f155</code></div>
			<div alt="f154" class="dashicons dashicons-star-empty"><code>.dashicons-star-empty</code>, <code>f154</code></div>	
			<div alt="f227" class="dashicons dashicons-flag"><code>.dashicons-flag</code>, <code>f227</code></div>
			<div alt="f230" class="dashicons dashicons-location"><code>.dashicons-location</code>, <code>f230</code></div>
			<div alt="f231" class="dashicons dashicons-location-alt"><code>.dashicons-location-alt</code>, <code>f231</code></div>	
			<div alt="f178" class="dashicons dashicons-vault"><code>.dashicons-vault</code>, <code>f178</code></div>
			<div alt="f179" class="dashicons dashicons-search"><code>.dashicons-search</code>, <code>f179</code></div>
			<div alt="f181" class="dashicons dashicons-slides"><code>.dashicons-slides</code>, <code>f181</code></div>
			<div alt="f183" class="dashicons dashicons-analytics"><code>.dashicons-analytics</code>, <code>f183</code></div>
			<div alt="f184" class="dashicons dashicons-piechart"><code>.dashicons-piechart</code>, <code>f184</code></div>
			<div alt="f185" class="dashicons dashicons-bargraph"><code>.dashicons-bargraph</code>, <code>f185</code></div>
			<div alt="f238" class="dashicons dashicons-bargraph2"><code>.dashicons-bargraph2</code>, <code>f238</code></div>
			<div alt="f239" class="dashicons dashicons-bargraph3"><code>.dashicons-bargraph3</code>, <code>f239</code></div>
			<div alt="f307" class="dashicons dashicons-groups"><code>.dashicons-groups</code>, <code>f307</code></div>
			<div alt="f312" class="dashicons dashicons-products"><code>.dashicons-products</code>, <code>f312</code></div>
			<div alt="f313" class="dashicons dashicons-awards"><code>.dashicons-awards</code>, <code>f313</code></div>
			<div alt="f314" class="dashicons dashicons-forms"><code>.dashicons-forms</code>, <code>f314</code></div>
			<div alt="f322" class="dashicons dashicons-portfolio"><code>.dashicons-portfolio</code>, <code>f322</code></div>
			<div alt="f482" class="dashicons dashicons-microphone"><code>.dashicons-microphone</code>, <code>f482</code></div>
			
			<!-- Media Icons -->
			<h3 id="mediaicons">Media Icons</h3>
			<div alt="f501" class="dashicons dashicons-media-archive"><code>.dashicons-media-archive</code>, <code>f501</code></div>
			<div alt="f500" class="dashicons dashicons-media-audio"><code>.dashicons-media-audio</code>, <code>f500</code></div>
			<div alt="f499" class="dashicons dashicons-media-code"><code>.dashicons-media-code</code>, <code>f499</code></div>
			<div alt="f498" class="dashicons dashicons-media-default"><code>.dashicons-media-default</code>, <code>f498</code></div>
			<div alt="f497" class="dashicons dashicons-media-document"><code>.dashicons-media-document</code>, <code>f497</code></div>
			<div alt="f496" class="dashicons dashicons-media-interactive"><code>.dashicons-media-interactive</code>, <code>f496</code></div>
			<div alt="f495" class="dashicons dashicons-media-spreadsheet"><code>.dashicons-media-spreadsheet</code>, <code>f495</code></div>
			<div alt="f491" class="dashicons dashicons-media-text"><code>.dashicons-media-text</code>, <code>f491</code></div>
			<div alt="f490" class="dashicons dashicons-media-video"><code>.dashicons-media-video</code>, <code>f490</code></div>
			<div alt="f492" class="dashicons dashicons-playlist-audio"><code>.dashicons-playlist-audio</code>, <code>f492</code></div>
			<div alt="f493" class="dashicons dashicons-playlist-video"><code>.dashicons-playlist-video</code>, <code>f493</code></div>
			
			<!-- WPorg specific -->
			<h3 id="wporgspecific">WPorg specific: Jobs, Profiles, WordCamps</h3>
			<div alt="f483" class="dashicons dashicons-universal-access"><code>.dashicons-universal-access</code>, <code>f483</code></div>
			<div alt="f507" class="dashicons dashicons-universal-access-alt"><code>.dashicons-universal-access-alt</code>, <code>f507</code></div>
			<div alt="f486" class="dashicons dashicons-tickets"><code>.dashicons-tickets</code>, <code>f486</code></div>
			<div alt="f484" class="dashicons dashicons-nametag"><code>.dashicons-nametag</code>, <code>f484</code></div>
			<div alt="f481" class="dashicons dashicons-clipboard"><code>.dashicons-clipboard</code>, <code>f481</code></div>
			<div alt="f487" class="dashicons dashicons-heart"><code>.dashicons-heart</code>, <code>f487</code></div>
			<div alt="f488" class="dashicons dashicons-megaphone"><code>.dashicons-megaphone</code>, <code>f488</code></div>
			<div alt="f489" class="dashicons dashicons-schedule"><code>.dashicons-schedule</code>, <code>f489</code></div>
			
			<!-- Widget -->
			<h3 id="widget">Widget</h3>
			<div alt="f478" class="dashicons dashicons-archive"><code>.dashicons-archive</code>, <code>f478</code></div>
			<div alt="f479" class="dashicons dashicons-tagcloud"><code>.dashicons-tagcloud</code>, <code>f479</code></div>
			<div alt="f480" class="dashicons dashicons-text"><code>.dashicons-text</code>, <code>f480</code></div>
			
			<!-- Alerts/Notifications/Flags -->
			<h3>Alerts/Notifications/Flags</h3>
			<div alt="f502" class="dashicons dashicons-plus-alt"><code>.dashicons-plus-alt</code>, <code>f502</code></div>
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
		
		wp_register_style( 'dashicons-demo',
			plugin_dir_url( __FILE__ ) . '../css/dashicons-demo.css',
			array( 'dashicons' )
		);
		wp_enqueue_style ( 'dashicons-demo' );
		
		wp_register_script(
			'dashicons-picker',
			plugin_dir_url( __FILE__ ) . '../js/dashicons-picker.js',
			array( 'jquery' ),
			FALSE,
			TRUE
		);
		wp_enqueue_script( 'dashicons-picker' );
	}
} // end class