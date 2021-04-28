<?php /** @noinspection HtmlUnknownTarget */
/**
 * Plugin Name:       WordPress Admin Style
 * Plugin URI:        https://github.com/bueltge/wordpress-admin-style
 * Text Domain:       WpAdminStyle
 * Domain Path:       /languages
 * GitHub URI:        https://github.com/bueltge/wordpress-admin-style
 * GitHub Plugin URI: https://github.com/bueltge/wordpress-admin-style
 * Description:       Shows the WordPress admin styles on one page to help you to develop WordPress compliant.
 * Author:            Frank Bültge
 * Version:           1.6.0
 * Licence:           GPLv2+
 * License URI:       ./LICENSE
 * Author URI:        https://bueltge.de
 * Last Change:       2021-04-28
 */

! defined( 'ABSPATH' ) && exit;

add_action(
	'plugins_loaded',
	array( WpAdminStyle::get_instance(), 'plugin_setup' )
);

/**
 * Class WpAdminStyle
 */
class WpAdminStyle {

	/**
	 * Characters there we replace in the files.
	 *
	 * @var array
	 */
	protected static $file_replace = array( '.php', '_', '-', ' ' );
	/**
	 * Directory of patters of examples.
	 *
	 * @var string
	 */
	protected $patterns_dir = '';

	/**
	 * Constructor
	 *
	 * @since  0.0.1
	 */
	public function __construct() {
	}

	/**
	 * Points the class, singleton.
	 *
	 * @access public
	 * @since  0.0.1
	 */
	public static function get_instance() {
		static $instance;

		if ( null === $instance ) {
			$instance = new self();
		}

		return $instance;
	}

	/**
	 * Used for regular plugin work.
	 *
	 * @wp-hook  plugins_loaded
	 * @since    05/02/2013
	 */
	public function plugin_setup() {
		$this->load_classes();

		if ( ! is_admin() ) {
			return null;
		}

		$this->patterns_dir = plugin_dir_path( __FILE__ ) . 'patterns';

		// add menu item incl. the example source.
		add_action( 'admin_menu', array( $this, 'add_menu_page' ) );
		// Plugin love.
		add_filter( 'plugin_row_meta', array( $this, 'donate_link' ), 10, 2 );
	}

	/**
	 * Scans the plugins subfolder and include files.
	 *
	 * @return  void
	 * @since   05/02/2013
	 */
	protected function load_classes() {

		// Load required classes.
		foreach ( glob( __DIR__ . '/inc/*.php' ) as $path ) {
			/** @noinspection PhpIncludeInspection */
			require_once $path;
		}
	}

	/**
	 * Add Menu item on WP Backend
	 *
	 * @return void
	 * @since  0.0.1
	 * @uses   add_menu_page
	 * @access public
	 */
	public function add_menu_page() {
		$page_hook_suffix = add_menu_page(
			esc_html__( 'WordPress Admin Style', 'WpAdminStyle' ),
			esc_html__( 'Admin Style', 'WpAdminStyle' ),
			'read',
			'WordPress_Admin_Style',
			array( $this, 'get_style_examples' )
		);
		add_action( 'admin_print_scripts-' . $page_hook_suffix, array( $this, 'enqueue_assets' ) );
	}

	/**
	 * Echo Markup examples
	 *
	 * @return void
	 * @since  0.0.1
	 * @uses
	 * @access public
	 */
	public function get_style_examples() {
		?>

		<div class="wrap">

			<h1><?php echo esc_html( $this->get_plugin_data( 'Name' ) ); ?></h1>

			<?php
			$this->get_mini_menu();
			$files = $this->get_patterns();

			// Load files and get data for view and list source.
			foreach ( $files as $file ) {
				$anker    = str_replace( self::$file_replace, '', $file );
				$patterns = $this->patterns_dir . '/' . $file;

				echo '<section class="pattern" id="' . esc_attr( $anker ) . '">';
				/** @noinspection PhpIncludeInspection */
				include_once $patterns;
				echo '<details class="primer" style="display: inline-block; width: 100%;">';
				echo '<summary title="Show markup and usage">&#8226;&#8226;&#8226; '
					 . esc_attr__( 'Show markup and usage', 'WpAdminStyle' )
					 . '</summary>';
				echo '<section>';
				echo '<pre><code class="language-php">';
				echo htmlspecialchars(
					file_get_contents(
						$patterns,
						FILE_USE_INCLUDE_PATH
					),
					ENT_QUOTES
				);
				echo '</code></pre>';
				echo '</section>';
				echo '</details><!--/.primer-->';
				echo '<p>';
				echo '<a class="alignright button" href="javascript:void(0);" onclick="window.scrollTo(0,0);" style="margin:3px 0 0 30px;">' . esc_attr__(
					'scroll to top',
					'WpAdminStyle'
				)
					 . '</a><br class="clear" />';
				echo '</p>';
				echo '</section><!--/.pattern-->';
				echo '<hr>';
			}
			?>

		</div> <!-- .wrap -->
		<?php
	}

	/**
	 * Return plugin comment data.
	 *
	 * @param string $value default = 'Version'
	 *  also possible is: Name, PluginURI, Version, Description, Author,
	 *                    AuthorURI, TextDomain, DomainPath, Network, Title.
	 *
	 * @return string
	 * @uses   get_plugin_data
	 * @access public
	 * @since  0.0.1
	 */
	private function get_plugin_data( $value = 'Version' ) {
		static $plugin_data = array();

		// fetch the data just once.
		if ( isset( $plugin_data[ $value ] ) ) {
			return $plugin_data[ $value ];
		}

		if ( ! function_exists( 'get_plugin_data' ) ) {
			require_once ABSPATH . '/wp-admin/includes/plugin.php';
		}

		$plugin_data = get_plugin_data( __FILE__ );

		return empty( $plugin_data[ $value ] ) ? '' : $plugin_data[ $value ];
	}

	/**
	 * Print the mini menu for a short navigation.
	 */
	public function get_mini_menu() {
		$patterns = $this->get_patterns( 'headers' );
		?>
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-2">

				<!-- main content -->
				<div id="post-body-content">

					<div class="meta-box-sortables ui-sortable">

						<div class="postbox">

							<h2><span><?php esc_attr_e( 'MiniMenu', 'WpAdminStyle' ); ?></span></h2>

							<div class="inside">

								<table class="widefat">
									<?php
									$class = '';
									foreach ( $patterns as $pattern ) {
										$class = '' === $class ? $class = ' class="alternate"' : '';
										$anker = str_replace( self::$file_replace, '', $pattern );

										?>
										<tr<?php echo $class; ?>>
											<td class="row-title">
												<a href="#<?php echo esc_attr( $anker ); ?>">
													<?php echo esc_attr( ucfirst( $pattern ) ); ?>
												</a>
											</td>
										</tr>
										<?php
									} // end foreach patterns
									?>
								</table>

							</div>
							<!-- .inside -->

						</div>
						<!-- .postbox -->

					</div>
					<!-- .meta-box-sortables .ui-sortable -->

				</div>
				<!-- post-body-content -->

				<!-- sidebar -->
				<div id="postbox-container-1" class="postbox-container">

					<div class="meta-box-sortables">

						<div class="postbox">

							<h2><span><?php esc_attr_e( 'About the plugin', 'WpAdminStyle' ); ?></span></h2>

							<div class="inside">
								<p>
									<?php
									printf(
									// translators: The two strings will be replaced by the url to the development repository and the post about the idea.
										__(
											'Please read more about this small plugin on <a href="%1$s">github</a> or in <a href="%2$s">this post</a> on the blog of WP Engineer.',
											'WpAdminStyle'
										),
										'https://github.com/bueltge/WordPress-Admin-Style',
										'http://wpengineer.com/2226/new-plugin-to-style-your-plugin-on-wordpress-admin-with-default-styles/'
									);
									?>
								</p>

								<p>&copy; Copyright 2008 - <?php echo esc_attr( date( 'Y' ) ); ?>
									<a href="https://bueltge.de">Frank Bültge</a></p>
							</div>

						</div>
						<!-- .postbox -->

						<div class="postbox">

							<h2><span><?php esc_attr_e( 'Resources & Reference', 'WpAdminStyle' ); ?></span></h2>

							<div class="inside">
								<ul>
									<li>
										<a href="https://developer.wordpress.org/block-editor/designers/">Editor
											'Gutenberg' Designer Documentation, include patterns and resources</a>
									</li>
									<li>
										<a href="http://dotorgstyleguide.wordpress.com/">WordPress.org UI Style
											Guide</a>
									</li>
									<li>
										<a href="https://make.wordpress.org/core/handbook/best-practices/coding-standards/html/">HTML
											Coding Standards</a>
									</li>
									<li>
										<a href="https://make.wordpress.org/core/handbook/best-practices/coding-standards/css/">CSS
											Coding Standards</a>
									</li>
									<li>
										<a href="https://make.wordpress.org/core/handbook/best-practices/coding-standards/php/">PHP
											Coding Standards</a>
									</li>
									<li>
										<a href="https://make.wordpress.org/core/handbook/best-practices/coding-standards/javascript/">JavaScript
											Coding Standards</a>
									</li>
									<li><a href="https://make.wordpress.org/design/">WordPress UI Group</a></li>
								</ul>
							</div>

						</div>
						<!-- .postbox -->

					</div>
					<!-- .meta-box-sortables -->

				</div>
				<!-- #postbox-container-1 .postbox-container -->

			</div>
			<br class="clear">
		</div>
		<?php
	}

	/**
	 * Return list of pattern files or name of files
	 *
	 * @param string $type Type of patters, default '', possible is 'headers'.
	 *
	 * @param bool   $sort
	 *
	 * @return array|mixed
	 * @since 2015-03-25
	 */
	public function get_patterns( $type = '', $sort = true ) {
		$files              = array();
		$this->patterns_dir = plugin_dir_path( __FILE__ ) . 'patterns';
		$handle             = opendir( $this->patterns_dir );

		while ( false !== ( $file = readdir( $handle ) ) ) {
			if ( false !== stripos( $file, '.php' ) ) {
				$files[] = $file;
			}
		}

		if ( $sort ) {
			sort( $files );
		}

		$files_h = str_replace( self::$file_replace, ' ', $files );

		if ( 'headers' === $type ) {
			return $files_h;
		}

		return $files;
	}

	/**
	 * Add donate link to plugin description in /wp-admin/plugins.php
	 *
	 * @param array  $plugin_meta All met data to a plugin.
	 * @param string $plugin_file The main file of the plugin with the meta data.
	 *
	 * @return array
	 */
	public function donate_link( $plugin_meta, $plugin_file ) {
		if ( plugin_basename( __FILE__ ) === $plugin_file ) {
			$plugin_meta[] = sprintf(
				'&hearts; <a href="%s">%s</a>',
				'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6069955',
				esc_html__( 'Donate', 'WpAdminStyle' )
			);
		}

		return $plugin_meta;
	}

	/**
	 * Register and enqueue script and styles for highlighting source.
	 *
	 * @since  2016-05-20
	 */
	public function enqueue_assets() {
		wp_register_style(
			'prism',
			plugins_url( 'css/prism.css', __FILE__ ),
			array(),
			'2021-05-28',
			'screen'
		);
		wp_enqueue_style( 'prism' );

		wp_register_script(
			'prism',
			plugins_url( 'js/prism.js', __FILE__ ),
			array(),
			'2021-05-28',
			true
		);
		wp_enqueue_script( 'prism' );

		wp_register_script(
			'example-color-picker',
			plugins_url( 'js/color-picker.js', __FILE__ ),
			array( 'jquery', 'wp-color-picker' ),
			'2021-05-28',
			true
		);
		wp_enqueue_script( 'example-color-picker' );
	}
} // end class
