<?php
/**
 * Plugin Name:   WordPress Admin Style
 * Plugin URI:    https://github.com/bueltge/WordPress-Admin-Style
 * Text Domain:   wp_admin_style
 * Domain Path:   /languages
 * Description:   Shows the WordPress admin styles on one page to help you to develop WordPress compliant
 * Author:        Frank Bültge
 * Version:       1.2.2
 * Licence:       GPLv2+
 * Author URI:    http://bueltge.de
 * Last Change:   2015-04-01
 */

! defined( 'ABSPATH' ) and exit;

add_action(
	'plugins_loaded',
	array( Wp_Admin_Style::get_instance(), 'plugin_setup' )
);

class Wp_Admin_Style {

	protected $patterns_dir = '';

	protected $file_replace = array( '.php', '_', '-', ' ' );

	/**
	 * Constructor
	 *
	 * @since  0.0.1
	 * @return Wp_Admin_Style
	 */
	public function __construct() {
	}

	/**
	 * Used for regular plugin work.
	 *
	 * @wp-hook  plugins_loaded
	 * @since    05/02/2013
	 * @return   void
	 */
	public function plugin_setup() {

		$this->load_classes();

		if ( ! is_admin() ) {
			return NULL;
		}

		$this->patterns_dir = plugin_dir_path( __FILE__ ) . 'patterns';;

		// add menu item incl. the example source
		add_action( 'admin_menu', array( $this, 'add_menu_page' ) );
		// Workaround to remove the suffix "-master" from the unzipped directory
		add_filter( 'upgrader_source_selection', array( $this, 'rename_github_zip' ), 1, 1 );
		// Plugin love
		add_filter( 'plugin_row_meta', array( $this, 'donate_link' ), 10, 2 );

		// Self hosted updates
		include_once 'inc/plugin-updates/plugin-update-checker.php';
		$update_checker = new PluginUpdateChecker(
			'https://raw.github.com/bueltge/WordPress-Admin-Style/master/inc/update.json',
			__FILE__,
			'WordPress-Admin-Style-master'
		);
	}

	/**
	 * points the class
	 *
	 * @access public
	 * @since  0.0.1
	 * @return object
	 */
	public static function get_instance() {

		static $instance;

		if ( NULL === $instance ) {
			$instance = new self();
		}

		return $instance;
	}

	/**
	 * Scans the plugins subfolder and include files
	 *
	 * @since   05/02/2013
	 * @return  void
	 */
	protected function load_classes() {

		// load required classes
		foreach ( glob( dirname( __FILE__ ) . '/inc/*.php' ) as $path ) {
			require_once $path;
		}
	}

	/**
	 * return plugin comment data
	 *
	 * @uses   get_plugin_data
	 * @access public
	 * @since  0.0.1
	 *
	 * @param  $value string, default = 'Version'
	 *                Name, PluginURI, Version, Description, Author, AuthorURI, TextDomain, DomainPath, Network, Title
	 *
	 * @return string
	 */
	private function get_plugin_data( $value = 'Version' ) {

		static $plugin_data = array();

		// fetch the data just once.
		if ( isset( $plugin_data[ $value ] ) ) {
			return $plugin_data[ $value ];
		}

		if ( ! function_exists( 'get_plugin_data' ) ) {
			require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
		}

		$plugin_data = get_plugin_data( __FILE__ );

		return empty ( $plugin_data[ $value ] ) ? '' : $plugin_data[ $value ];
	}

	/**
	 * Add Menu item on WP Backend
	 *
	 * @uses   add_menu_page
	 * @access public
	 * @since  0.0.1
	 * @return void
	 */
	public function add_menu_page() {

		add_menu_page(
			__( 'WordPress Admin Style', 'wp_admin_style' ),
			__( 'Admin Style', 'wp_admin_style' ),
			'read',
			'WordPress_Admin_Style',
			array( $this, 'get_style_examples' )
		);
	}

	/**
	 * Return list of pattern files or name of files
	 *
	 * @since 2015-03-25
	 *
	 * @param string $type
	 *
	 * @param bool   $sort
	 *
	 * @return array|mixed
	 */
	public function get_patterns( $type = '', $sort = TRUE ) {

		$files              = array();
		$this->patterns_dir = plugin_dir_path( __FILE__ ) . 'patterns';
		$handle             = opendir( $this->patterns_dir );

		while ( FALSE !== ( $file = readdir( $handle ) ) ) {
			if ( stristr( $file, '.php' ) ) {
				$files[ ] = $file;
			}
		}

		if ( $sort ) {
			sort( $files );
		}

		$files_h = str_replace( $this->file_replace, ' ', $files );

		if ( 'headers' === $type ) {
			return $files_h;
		} else {
			return $files;
		}
	}

	/**
	 * Echo Markup examples
	 *
	 * @uses
	 * @access public
	 * @since  0.0.1
	 * @return void
	 */
	public function get_style_examples() {

		?>

		<div class="wrap">

			<h2><?php echo $this->get_plugin_data( 'Name' ) ?></h2>

			<?php
			$this->get_mini_menu();
			$files = $this->get_patterns();

			// Load files and get data for view and list source
			foreach ( $files as $file ) {
				$anker = str_replace( $this->file_replace, '', $file );
				echo '<section class="pattern" id="' . $anker . '">';
				include_once( $this->patterns_dir . '/' . $file );
				echo '<details class="primer">';
				echo '<summary title="Show markup and usage">&#8226;&#8226;&#8226; ' . esc_attr__(
						'Show markup and usage', 'wp_admin_style'
					) . '</summary>';
				echo '<section>';
				echo '<textarea rows="10" cols="30" class="large-text code">' . htmlspecialchars(
						file_get_contents( $this->patterns_dir . '/' . $file )
					) . '</textarea>';

				echo '</section>';
				echo '</details><!--/.primer-->';
				echo '<p><a class="alignright button" href="javascript:void(0);" onclick="window.scrollTo(0,0);" style="margin:3px 0 0 30px;">' . esc_attr__(
						'scroll to top', 'wp_admin_style'
					) . '</a><br class="clear" /></p>';
				echo '</section><!--/.pattern-->';
				echo '<hr>';
			}
			?>

		</div> <!-- .wrap -->
	<?php
	}

	public function get_mini_menu() {

		$patterns = $this->get_patterns( 'headers' );
		?>
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-2">

				<!-- main content -->
				<div id="post-body-content">

					<div class="meta-box-sortables ui-sortable">

						<div class="postbox">

							<h3><span><?php _e( 'MiniMenu', 'wp_admin_style' ); ?></span></h3>

							<div class="inside">

								<table class="widefat" cellspacing="0">
									<?php
									$class = '';
									foreach ( $patterns as $pattern ) {
										$class = '' === $class ? $class = ' class="alternate"' : '';
										$anker = str_replace( $this->file_replace, '', $pattern );

										?>
										<tr<?php echo $class; ?>>
											<td class="row-title">
												<a href="#<?php echo $anker ?>">
													<?php echo ucfirst( $pattern ); ?>
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

							<h3><span><?php _e( 'About the plugin', 'wp_admin_style' ); ?></span></h3>

							<div class="inside">
								<p><?php _e(
										'Please read more about this small plugin on <a href="https://github.com/bueltge/WordPress-Admin-Style">github</a> or in <a href="http://wpengineer.com/2226/new-plugin-to-style-your-plugin-on-wordpress-admin-with-default-styles/">this post</a> on the blog of WP Engineer.',
										'wp_admin_style'
									); ?></p>

								<p>&copy; Copyright 2008 - <?php echo date( 'Y' ); ?>
									<a href="http://bueltge.de">Frank B&uuml;ltge</a></p>
							</div>

						</div>
						<!-- .postbox -->

						<div class="postbox">

							<h3><span><?php _e( 'Resources & Reference', 'wp_admin_style' ); ?></span></h3>

							<div class="inside">
								<ul>
									<li>
										<a href="http://dotorgstyleguide.wordpress.com/">WordPress.org UI Style Guide</a>
									</li>
									<li>
										<a href="http://make.wordpress.org/core/handbook/coding-standards/html/">HTML Coding Standards</a>
									</li>
									<li>
										<a href="http://make.wordpress.org/core/handbook/coding-standards/css/">CSS Coding Standards</a>
									</li>
									<li>
										<a href="http://make.wordpress.org/core/handbook/coding-standards/php/">PHP Coding Standards</a>
									</li>
									<li>
										<a href="http://make.wordpress.org/core/handbook/coding-standards/javascript/">JavaScript Coding Standards</a>
									</li>
									<li><a href="http://make.wordpress.org/ui/">WordPress UI Group</a></li>
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
	 * Removes the prefix "-master" when updating from GitHub zip files
	 *
	 * See: https://github.com/YahnisElsts/plugin-update-checker/issues/1
	 *
	 * @param  string $source
	 *
	 * @return string
	 */
	public function rename_github_zip( $source ) {

		if ( FALSE === strpos( $source, 'WordPress-Admin-Style' ) ) {
			return $source;
		}

		$path_parts = pathinfo( $source );
		$new_source = trailingslashit( $path_parts[ 'dirname' ] ) .
			trailingslashit( 'WordPress-Admin-Style' );
		rename( $source, $new_source );

		return $new_source;
	}

	/**
	 * Add donate link to plugin description in /wp-admin/plugins.php
	 *
	 * @param  array  $plugin_meta
	 * @param  string $plugin_file
	 *
	 * @return array
	 */
	public function donate_link( $plugin_meta, $plugin_file ) {

		if ( plugin_basename( __FILE__ ) == $plugin_file ) {
			$plugin_meta[ ] = sprintf(
				'&hearts; <a href="%s">%s</a>',
				'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6069955',
				__( 'Donate', 'wp_admin_style' )
			);
		}

		return $plugin_meta;
	}

} // end class
