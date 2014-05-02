<?php
/**
 * Plugin Name:   WordPress Admin Style
 * Plugin URI:    https://github.com/bueltge/WordPress-Admin-Style
 * Text Domain:   wp_admin_style
 * Domain Path:   /languages
 * Description:   Shows the WordPress admin styles on one page to help you to develop WordPress compliant
 * Author:        Frank Bültge
 * Version:       1.0.2
 * Licence:       GPLv2
 * Author URI:    http://bueltge.de
 * Last Change:   02/29/2014
 */

/**
 * License:
 * ==============================================================================
 * Copyright Frank Bueltge  (email : frank@bueltge.de)
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 * 
 * Requirement
 * ==============================================================================
 * This plugin requires WordPress >= 3.3-beta and tested with PHP Interpreter >= 5.3.1
 */

! defined( 'ABSPATH' ) and exit;

add_action( 
	'plugins_loaded',
	array( Wp_Admin_Style::get_instance(), 'plugin_setup' )
);

class Wp_Admin_Style {
	
	/**
	 * Constructor
	 *
	 * @uses
	 * @access public
	 * @since  0.0.1
	 * @return void
	 */
	public function __construct() {}
	
	/**
	 * Used for regular plugin work.
	 * 
	 * @wp-hook  plugins_loaded
	 * @since    05/02/2013
	 * @return   void
	 */
	public function plugin_setup() {
		
		$this->load_classes();
		
		if ( ! is_admin() )
			return NULL;
		
		// add menu item incl. the example source
		add_action( 'admin_menu', array( $this, 'add_menu_page' ) );
		// Workaround to remove the suffix "-master" from the unzipped directory
		add_filter( 'upgrader_source_selection', array( $this, 'rename_github_zip' ), 1, 3 );
		// Plugin love
		add_filter( 'plugin_row_meta', array( $this, 'donate_link' ), 10, 4 );
		
		// Self hosted updates
		include_once 'inc/plugin-updates/plugin-update-checker.php';
		$updateChecker = new PluginUpdateChecker(
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
		
		if ( NULL === $instance )
			$instance = new self();
		
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
		foreach( glob( dirname( __FILE__ ) . '/inc/*.php' ) as $path ) 
			require_once $path;
	}
	
	/**
	 * return plugin comment data
	 *
	 * @uses   get_plugin_data
	 * @access public
	 * @since  0.0.1
	 * @param  $value string, default = 'Version'
	 *         Name, PluginURI, Version, Description, Author, AuthorURI, TextDomain, DomainPath, Network, Title
	 * @return string
	 */
	private function get_plugin_data( $value = 'Version' ) {
		
		static $plugin_data = array ();
		
		// fetch the data just once.
		if ( isset( $plugin_data[ $value ] ) )
			return $plugin_data[ $value ];
		
		if ( ! function_exists( 'get_plugin_data' ) )
			require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
		
		$plugin_data  = get_plugin_data( __FILE__ );
		$plugin_value = $plugin_data[$value];
		
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
			
			<div id="icon-options-general" class="icon32"></div>
			<h2><?php echo $this->get_plugin_data( 'Name' ) ?></h2>
			
			<div id="poststuff">
				<div id="post-body" class="metabox-holder columns-2">
					
					<!-- main content -->
					<div id="post-body-content">
						
						<div class="meta-box-sortables ui-sortable">
							
							<div class="postbox">
							
								<h3><span><?php _e('MiniMenu', 'wp_admin_style' ); ?></span></h3>
								<div class="inside">
									
									<table class="widefat" cellspacing="0">
										<tr>
											<td class="row-title"><a href="#two_column"><?php _e('2 Column Page Layout', 'wp_admin_style' ); ?></a></td>
										</tr>
										<tr class="alternate">
											<td class="row-title"><a href="#headers"><?php _e('Headers', 'wp_admin_style' ); ?></a></td>
										</tr>
										<tr>
											<td class="row-title"><a href="#header_icons"><?php _e('Header Icons', 'wp_admin_style' ); ?></a></td>
										</tr>
										<tr class="alternate">
											<td class="row-title"><a href="#buttons"><?php _e('Buttons', 'wp_admin_style' ); ?></a></td>
										</tr>
										<tr>
											<td class="row-title"><a href="#tables"><?php _e('Tables', 'wp_admin_style' ); ?></a></td>
										</tr>
										<tr class="alternate">
											<td class="row-title"><a href="#admin_notices"><?php _e('Admin Notices', 'wp_admin_style' ); ?></a></td>
										</tr>
										<tr>
											<td class="row-title"><a href="#alternative_colours"><?php _e('Alternative Colours', 'wp_admin_style' ); ?></a></td>
										</tr>
										<tr class="alternate">
											<td class="row-title"><a href="#pagination"><?php _e('Pagination', 'wp_admin_style' ); ?></a></td>
										</tr>
										<tr>
											<td class="row-title"><a href="#form_elements"><?php _e('Form Elements', 'wp_admin_style' ); ?></a></td>
										</tr>
										<tr>
											<td class="row-title"><a href="#form_helpers"><?php _e( 'Form Helper Functions', 'wp_admin_style' ); ?></a></td>
										</tr>
										<tr>
											<td class="row-title"><a href="#tabs"><?php _e('Tabs', 'wp_admin_style' ); ?></a></td>
										</tr>
									</table>
									
								</div> <!-- .inside -->
							
							</div> <!-- .postbox -->
							
						</div> <!-- .meta-box-sortables .ui-sortable -->
						
					</div> <!-- post-body-content -->
					
					<!-- sidebar -->
					<div id="postbox-container-1" class="postbox-container">
						
						<div class="meta-box-sortables">
							
							<div class="postbox">
								
								<h3><span><?php _e('About the plugin', 'wp_admin_style' ); ?></span></h3>
								<div class="inside">
									<p><?php _e('Please read more about this small plugin on <a href="https://github.com/bueltge/WordPress-Admin-Style">github</a> or in <a href="http://wpengineer.com/2226/new-plugin-to-style-your-plugin-on-wordpress-admin-with-default-styles/">this post</a> on the blog of WP Engineer.', 'wp_admin_style' ); ?></p>
									<p>&copy; Copyright 2008 - <?php echo date('Y'); ?> <a href="http://bueltge.de">Frank B&uuml;ltge</a></p>
								</div>
							
							</div> <!-- .postbox -->
							
							<div class="postbox">
								
								<h3><span><?php _e('Resources & Reference', 'wp_admin_style' ); ?></span></h3>
								<div class="inside">
									<ul>
										<li><a href="http://dotorgstyleguide.wordpress.com/">WordPress UI Style Guide</a></li>
										<li><a href="http://make.wordpress.org/core/handbook/coding-standards/html/">HTML Coding Standards</a></li>
										<li><a href="http://make.wordpress.org/core/handbook/coding-standards/css/">CSS Coding Standards</a></li>
										<li><a href="http://make.wordpress.org/core/handbook/coding-standards/php/">PHP Coding Standards</a></li>
										<li><a href="http://make.wordpress.org/core/handbook/coding-standards/javascript/">JavaScript Coding Standards</a></li>
										<li><a href="http://make.wordpress.org/ui/">WordPress UI Group</a></li>
									</ul>
								</div>
								
							</div> <!-- .postbox -->
							
						</div> <!-- .meta-box-sortables -->
						
					</div> <!-- #postbox-container-1 .postbox-container -->
					
				</div>
				<br class="clear">
			</div>
			
			<br id="two_column" class="clear"/>
			<h3><?php _e( '2 Column Layout', 'wp_admin_style' ); ?></h3>
			
<pre><code>
&lt;div class=&quot;wrap&quot;&gt;
	
	&lt;div id=&quot;icon-options-general&quot; class=&quot;icon32&quot;&gt;&lt;/div&gt;
	&lt;h2&gt;Name String&lt;/h2&gt;
	
	&lt;div id=&quot;poststuff&quot;&gt;
	
		&lt;div id=&quot;post-body&quot; class=&quot;metabox-holder columns-2&quot;&gt;
		
			&lt;!-- main content --&gt;
			&lt;div id=&quot;post-body-content&quot;&gt;
				
				&lt;div class=&quot;meta-box-sortables ui-sortable&quot;&gt;
					
					&lt;div class=&quot;postbox&quot;&gt;
					
						&lt;h3&gt;&lt;span&gt;Main Content Header&lt;/span&gt;&lt;/h3&gt;
						&lt;div class=&quot;inside&quot;&gt;
							Content space
						&lt;/div&gt; &lt;!-- .inside --&gt;
					
					&lt;/div&gt; &lt;!-- .postbox --&gt;
					
				&lt;/div&gt; &lt;!-- .meta-box-sortables .ui-sortable --&gt;
				
			&lt;/div&gt; &lt;!-- post-body-content --&gt;
			
			&lt;!-- sidebar --&gt;
			&lt;div id=&quot;postbox-container-1&quot; class=&quot;postbox-container&quot;&gt;
				
				&lt;div class=&quot;meta-box-sortables&quot;&gt;
					
					&lt;div class=&quot;postbox&quot;&gt;
					
						&lt;h3&gt;&lt;span&gt;Sidebar Content Header&lt;/span&gt;&lt;/h3&gt;
						&lt;div class=&quot;inside&quot;&gt;
							Content space
						&lt;/div&gt; &lt;!-- .inside --&gt;
						
					&lt;/div&gt; &lt;!-- .postbox --&gt;
					
				&lt;/div&gt; &lt;!-- .meta-box-sortables --&gt;
				
			&lt;/div&gt; &lt;!-- #postbox-container-1 .postbox-container --&gt;
			
		&lt;/div&gt; &lt;!-- #post-body .metabox-holder .columns-2 --&gt;
		
		&lt;br class=&quot;clear&quot;&gt;
	&lt;/div&gt; &lt;!-- #poststuff --&gt;
	
&lt;/div&gt; &lt;!-- .wrap --&gt;
</code></pre>

			<br/>

			<?php _e('Read <a href="http://www.satoripress.com/2011/10/wordpress/plugin-development/clean-2-column-page-layout-for-plugins-70/">this tutorial</a> for details.', 'wp_admin_style' ); ?>
			
			<br/><br/>
			
			<code>&lt;hr /&gt;</code>
			<hr id="headers" />
			
			<h3><?php _e( 'Headers', 'wp_admin_style' ); ?></h3>
			<h2><code>h2</code><?php echo $this->get_plugin_data( 'Name' ) ?></h2>
			<h3><code>h3</code><?php echo $this->get_plugin_data( 'Name' ) ?></h3>
			<h4><code>h4</code><?php echo $this->get_plugin_data( 'Name' ) ?></h4>
			<p><a class="alignright button" href="javascript:void(0);" onclick="window.scrollTo(0,0);" style="margin:3px 0 0 30px;"><?php _e('scroll to top', 'wp_admin_style' ); ?></a><br class="clear" /></p>
			<code>&lt;hr /&gt;</code>
			<hr id="header_icons" />
			
			<h3><?php _e( 'Header Icons', 'wp_admin_style' ); ?></h3>
			<?php _e( 'php-function:' , 'wp_admin_style' ) ?> <code>screen_icon( 'edit' );</code>
			<?php _e( 'or via markup' , 'wp_admin_style' ) ?>
			<code>&lt;div id=&quot;icon-edit&quot; class=&quot;icon32&quot;&gt;&lt;/div&gt;</code>
			<br />
			<code>edit</code><div id="icon-edit" class="icon32"></div>
			<br class="clear" />
			<code>upload</code><div id="icon-upload" class="icon32"></div>
			<br class="clear" />
			<code>link-manager</code><div id="icon-link-manager" class="icon32"></div>
			<br class="clear" />
			<code>edit-pages</code><div id="icon-edit-pages" class="icon32"></div>
			<br class="clear" />
			<code>edit-comments</code><div id="icon-edit-comments" class="icon32"></div>
			<br class="clear" />
			<code>themes</code><div id="icon-themes" class="icon32"></div>
			<br class="clear" />
			<code>plugins</code><div id="icon-plugins" class="icon32"></div>
			<br class="clear" />
			<code>users</code><div id="icon-users" class="icon32"></div>
			<br class="clear" />
			<code>tools</code><div id="icon-tools" class="icon32"></div>
			<br class="clear" />
			<code>options-general</code><div id="icon-options-general" class="icon32"></div>
			<br class="clear" />
			<p><a class="alignright button" href="javascript:void(0);" onclick="window.scrollTo(0,0);" style="margin:3px 0 0 30px;"><?php _e('scroll to top', 'wp_admin_style' ); ?></a><br class="clear" /></p>
			<code>&lt;hr /&gt;</code>
			<hr id="buttons" />
			
			<h3><?php _e( 'Buttons', 'wp_admin_style' ); ?></h3>
			<code>&lt;input class=&quot;button-primary&quot; type=&quot;submit&quot; name=&quot;Example&quot; value=&quot;&lt;?php _e( 'Example Primary Button' ); ?&gt;&quot; /&gt;</code>
			<br />
			<input class="button-primary" type="submit" name="Example" value="<?php _e( 'Example Primary Button' ); ?>" />
			<br />
			<code>&lt;?php submit_button( 'Example', $type = 'small', $name = 'submit', $wrap = false, $other_attributes = null );</code>
			<br />
			<?php submit_button( 'Example', $type = 'small', $name = 'submit', $wrap = false, $other_attributes = null ); ?>
			<br />
			<code>&lt;?php submit_button( 'Example', $type = 'delete', $name = 'submit', $wrap = true, $other_attributes = null );</code>
			<br />
			<?php submit_button( 'Example', $type = 'delete', $name = 'submit', $wrap = true, $other_attributes = null ); ?>
			<br />
			<code>&lt;input class=&quot;button-secondary&quot; type=&quot;submit&quot; value=&quot;&lt;?php _e( 'Example Secondary Button' ); ?&gt;&quot; /&gt;</code>
			<br />
			<input class="button-secondary" type="submit" value="<?php _e( 'Example Secondary Button' ); ?>" />
			<br />
			<code>&lt;a class=&quot;button-secondary&quot; href=&quot;#&quot; title=&quot;&lt;?php _e( 'Title for Example Link Button' ); ?&gt;&quot;&gt;&lt;?php _e( 'Example Link Button' ); ?&gt;&lt;/a&gt;</code>
			<br />
			<a class="button-secondary" href="#" title="<?php _e( 'Title for Example Link Button' ); ?>"><?php _e( 'Example Link Button' ); ?></a>
			<p><a class="alignright button" href="javascript:void(0);" onclick="window.scrollTo(0,0);" style="margin:3px 0 0 30px;"><?php _e('scroll to top', 'wp_admin_style' ); ?></a><br class="clear" /></p>
			<p><?php _e( 'Use core function <code>submit_button( $text = null, $type = \'primary\', $name = \'submit\', $wrap = true, $other_attributes = null )</code> for create buttons.' ); ?></p>
			<code>&lt;hr /&gt;</code>
			<hr id="tables" />

			<h3><?php _e( 'Tables', 'wp_admin_style' ); ?></h3>
			<pre><code>&lt;table class=&quot;form-table&quot;&gt;
	&lt;tr&gt;
		&lt;th class=&quot;row-title&quot;&gt;Table header cell #1&lt;/th&gt;
		&lt;th&gt;Table header cell #2&lt;/th&gt;
	&lt;/tr&gt;
	&lt;tr valign=&quot;top&quot;&gt;
		&lt;td scope=&quot;row&quot;&gt;&lt;label for=&quot;tablecell&quot;&gt;Table Cell #1, with label&lt;/label&gt;&lt;/td&gt;
		&lt;td&gt;Table Cell #2&lt;/td&gt;
	&lt;/tr&gt;
	&lt;tr valign=&quot;top&quot; class=&quot;alternate&quot;&gt;
		&lt;td scope=&quot;row&quot;&gt;&lt;label for=&quot;tablecell&quot;&gt;Table Cell #3, with label and class &lt;code&gt;alternate&lt;/code&gt;&lt;/label&gt;&lt;/td&gt;
		&lt;td&gt;Table Cell #4&lt;/td&gt;
	&lt;/tr&gt;
	&lt;tr valign=&quot;top&quot;&gt;
		&lt;td scope=&quot;row&quot;&gt;&lt;label for=&quot;tablecell&quot;&gt;Table Cell #5, with label&lt;/label&gt;&lt;/td&gt;
		&lt;td&gt;Table Cell #6&lt;/td&gt;
	&lt;/tr&gt;
&lt;/table&gt;</code></pre>
			<table class="form-table">
				<tr>
					<th class="row-title"><?php _e( 'Table header cell #1', 'wp_admin_style' ); ?></th>
					<th><?php _e( 'Table header cell #2', 'wp_admin_style' ); ?></th>
				</tr>
				<tr valign="top">
					<td scope="row"><label for="tablecell"><?php _e( 'Table data cell #1, with label', 'wp_admin_style' ); ?></label></td>
					<td><?php _e( 'Table Cell #2', 'wp_admin_style' ); ?></td>
				</tr>
				<tr valign="top" class="alternate">
					<td scope="row"><label for="tablecell"><?php _e( 'Table Cell #3, with label and class', 'wp_admin_style' ); ?> <code>alternate</code></label></td>
					<td><?php _e( 'Table Cell #4', 'wp_admin_style' ); ?></td>
				</tr>
				<tr valign="top">
					<td scope="row"><label for="tablecell"><?php _e( 'Table Cell #5, with label', 'wp_admin_style' ); ?></label></td>
					<td><?php _e( 'Table Cell #6', 'wp_admin_style' ); ?></td>
				</tr>
			</table>
			
			<br class="clear"/>
			
			<pre><code>&lt;table class=&quot;widefat&quot;&gt;
	&lt;tr&gt;
		&lt;th class=&quot;row-title&quot;&gt;Table header cell #1&lt;/th&gt;
		&lt;th&gt;Table header cell #2&lt;/th&gt;
	&lt;/tr&gt;
	&lt;tr&gt;
		&lt;tr&gt;
		&lt;td class=&quot;row-title&quot;&gt;&lt;label for=&quot;tablecell&quot;&gt;Table Cell #1, with label&lt;/label&gt;&lt;/td&gt;
		&lt;td&gt;Table Cell #2&lt;/td&gt;
	&lt;/tr&gt;
	&lt;tr class=&quot;alternate&quot;&gt;
		&lt;td class=&quot;row-title&quot;&gt;&lt;label for=&quot;tablecell&quot;&gt;Table Cell #3, with label and class &lt;code&gt;alternate&lt;/code&gt;&lt;/label&gt;&lt;/td&gt;
		&lt;td&gt;Table Cell #4&lt;/td&gt;
	&lt;/tr&gt;
	&lt;tr&gt;
		&lt;td class=&quot;row-title&quot;&gt;&lt;label for=&quot;tablecell&quot;&gt;Table Cell #5, with label&lt;/label&gt;&lt;/td&gt;
		&lt;td&gt;Table Cell #6&lt;/td&gt;
	&lt;/tr&gt;
&lt;/table&gt;</code></pre>

	<br/>
			<table class="widefat">
				<tr>
					<th class="row-title"><?php _e( 'Table header cell #1', 'wp_admin_style' ); ?></th>
					<th><?php _e( 'Table header cell #2', 'wp_admin_style' ); ?></th>
				<tr/>
				<tr>
					<td class="row-title"><label for="tablecell"><?php _e( 'Table Cell #1, with label', 'wp_admin_style' ); ?></label></td>
					<td><?php _e( 'Table Cell #2', 'wp_admin_style' ); ?></td>
				</tr>
				<tr class="alternate">
					<td class="row-title"><label for="tablecell"><?php _e( 'Table Cell #3, with label and class', 'wp_admin_style' ); ?> <code>alternate</code></label></td>
					<td><?php _e( 'Table Cell #4', 'wp_admin_style' ); ?></td>
				</tr>
				<tr>
					<td class="row-title"><?php _e( 'Table Cell #5, without label', 'wp_admin_style' ); ?></td>
					<td><?php _e( 'Table Cell #6', 'wp_admin_style' ); ?></td>
				</tr>
			</table>
			
			<br class="clear"/>
			
			<pre><code>&lt;table class=&quot;widefat&quot;&gt;
	&lt;thead&gt;
		&lt;tr&gt;
			&lt;th class=&quot;row-title&quot;&gt;Table header cell #1&lt;/th&gt;
			&lt;th&gt;Table header cell #2&lt;/th&gt;
		&lt;/tr&gt;
	&lt;/thead&gt;
	&lt;tbody&gt;
		&lt;tr&gt;
			&lt;td class=&quot;row-title&quot;&gt;&lt;label for=&quot;tablecell&quot;&gt;Table Cell #1, with label&lt;/label&gt;&lt;/td&gt;
			&lt;td&gt;Table Cell #2&lt;/td&gt;
		&lt;/tr&gt;
		&lt;tr class=&quot;alternate&quot;&gt;
			&lt;td class=&quot;row-title&quot;&gt;&lt;label for=&quot;tablecell&quot;&gt;Table Cell #3, with label and class &lt;code&gt;alternate&lt;/code&gt;&lt;/label&gt;&lt;/td&gt;
			&lt;td&gt;Table Cell #4&lt;/td&gt;
		&lt;/tr&gt;
		&lt;tr&gt;
			&lt;td class=&quot;row-title&quot;&gt;Table Cell #5, without label&lt;/td&gt;
			&lt;td&gt;Table Cell #6&lt;/td&gt;
		&lt;/tr&gt;
		&lt;tr class=&quot;alt&quot;&gt;
			&lt;td class=&quot;row-title&quot;&gt;Table Cell #7, without label and with class &lt;code&gt;alt&lt;/code&gt;&lt;/td&gt;
			&lt;td&gt;Table Cell #8&lt;/td&gt;
		&lt;/tr&gt;
		&lt;tr class=&quot;form-invalid&quot;&gt;
			&lt;td class=&quot;row-title&quot;&gt;Table Cell #9, without label and with class &lt;code&gt;form-invalid&lt;/code&gt;&lt;/td&gt;
			&lt;td&gt;Table Cell #10&lt;/td&gt;
		&lt;/tr&gt;
	&lt;/tbody&gt;
	&lt;tfoot&gt;
		&lt;tr&gt;
			&lt;th class=&quot;row-title&quot;&gt;Table header cell #1&lt;/th&gt;
			&lt;th&gt;Table header cell #2&lt;/th&gt;
		&lt;/tr&gt;
	&lt;/tfoot&gt;
&lt;/table&gt;</code></pre>

	<br/>

			<table class="widefat">
				<thead>
					<tr>
						<th class="row-title"><?php _e( 'Table header cell #1', 'wp_admin_style' ); ?></th>
						<th><?php _e( 'Table header cell #2', 'wp_admin_style' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="row-title"><label for="tablecell"><?php _e( 'Table Cell #1, with label', 'wp_admin_style' ); ?></label></td>
						<td><?php _e( 'Table Cell #2', 'wp_admin_style' ); ?></td>
					</tr>
					<tr class="alternate">
						<td class="row-title"><label for="tablecell"><?php _e( 'Table Cell #3, with label and class', 'wp_admin_style' ); ?> <code>alternate</code></label></td>
						<td><?php _e( 'Table Cell #4', 'wp_admin_style' ); ?></td>
					</tr>
					<tr>
						<td class="row-title"><?php _e( 'Table Cell #5, without label', 'wp_admin_style' ); ?></td>
						<td><?php _e( 'Table Cell #6', 'wp_admin_style' ); ?></td>
					</tr>
					<tr class="alt">
						<td class="row-title"><?php _e( 'Table Cell #7, without label and with class', 'wp_admin_style' ); ?> <code>alt</code></td>
						<td><?php _e( 'Table Cell #8', 'wp_admin_style' ); ?></td>
					</tr>
					<tr class="form-invalid">
						<td class="row-title"><?php _e( 'Table Cell #9, without label and with class', 'wp_admin_style' ); ?> <code>form-invalid</code></td>
						<td><?php _e( 'Table Cell #10', 'wp_admin_style' ); ?></td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<th class="row-title"><?php _e( 'Table header cell #1', 'wp_admin_style' ); ?></th>
						<th><?php _e( 'Table header cell #2', 'wp_admin_style' ); ?></th>
					</tr>
				</tfoot>
			</table>
			
			<p><a class="alignright button" href="javascript:void(0);" onclick="window.scrollTo(0,0);" style="margin:3px 0 0 30px;"><?php _e('scroll to top', 'wp_admin_style' ); ?></a><br class="clear" /></p>
			<code>&lt;hr /&gt;</code>
			<hr id="admin_notices" />
			
			<h3><?php _e( 'Admin Notices', 'wp_admin_style' ); ?></h3>
			<?php _e( 'define the style via param (same as the classes) on function <code>add_settings_error()</code> or use the class inside a div', 'wp_admin_style' ); ?>
			<div style="width:99%; padding: 5px;" class="updated" ><p><?php _e( 'class .updated with paragraph', 'wp_admin_style' ); ?></p></div>
			<div style="width:99%; padding: 5px;" class="error"><?php _e( 'class .alternate without paragraph', 'wp_admin_style' ); ?></div>
			<div style="width:99%; padding: 5px;" class="settings-error"><?php _e( 'class .settings-error without paragraph', 'wp_admin_style' ); ?></div>
			
			<p><a class="alignright button" href="javascript:void(0);" onclick="window.scrollTo(0,0);" style="margin:3px 0 0 30px;"><?php _e('scroll to top', 'wp_admin_style' ); ?></a><br class="clear" /></p>
			<code>&lt;hr /&gt;</code>
			<hr id="alternative_colours" />
			
			<h3><?php _e( 'Alternative Colours', 'wp_admin_style' ); ?></h3>
			<div style="width:99%; padding: 5px;" ><?php _e( 'without class', 'wp_admin_style' ); ?></div>
			<div style="width:99%; padding: 5px;" class="updated">class .updated</div>
			<div style="width:99%; padding: 5px;" class="alternate">class .alternate</div>
			<div style="width:99%; padding: 5px;" class="alte">class .alt</div>
			<div style="width:99%; padding: 5px;" class="form-invalid">class .form-invalid</div>
			
			<p><a class="alignright button" href="javascript:void(0);" onclick="window.scrollTo(0,0);" style="margin:3px 0 0 30px;"><?php _e('scroll to top', 'wp_admin_style' ); ?></a><br class="clear" /></p>
			<code>&lt;hr /&gt;</code>
			<hr id="pagination" />
			
			<h3><?php _e( 'Pagination', 'wp_admin_style' ); ?></h3>
			<pre><code>&lt;div class="tablenav"&gt;
	&lt;div class="tablenav-pages"&gt;
		//<?php _e( 'here is your pagination code', 'wp_admin_style' ); ?>
		
	&lt;/div&gt;
&lt;/div&gt;</code> </pre>
			<div class="tablenav">
				<div class="tablenav-pages">
					<span class="displaying-num"><?php _e( 'Example Markup for n items', 'wp_admin_style' ); ?></span> 
					<a class='first-page disabled' title='Go to the first page' href='#'>&laquo;</a> 
					<a class='prev-page disabled' title='Go to the previous page' href='#'>&lsaquo;</a> 
					<span class="paging-input"><input class='current-page' title='Current page' type='text' name='paged' value='1' size='1' /> of <span class='total-pages'>5</span></span> 
					<a class='next-page' title='Go to the next page' href='#pagination'>&rsaquo;</a> 
					<a class='last-page' title='Go to the last page' href='#pagination'>&raquo;</a>
				</div>
			</div>
			
			<p><a class="alignright button" href="javascript:void(0);" onclick="window.scrollTo(0,0);" style="margin:3px 0 0 30px;"><?php _e('scroll to top', 'wp_admin_style' ); ?></a><br class="clear" /></p>
			<code>&lt;hr /&gt;</code>
			<hr id="form_elements" />
			
			<h3><?php _e( 'Form Elements', 'wp_admin_style' ); ?></h3>
			<form method="post" action="options.php">
				<table class="form-table">
					<tr valign="top">
						<td colspan="2">
							<code>&lt;input name="" id="" type="text" value="" class="regular-text" /&gt;</code>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Input type text <code>.regular-text</code></label></th>
						<td>
							<input type="text" value="regular-text" class="regular-text" />
						</td>
					</tr>
					<tr valign="top">
						<td colspan="2">
							<code>&lt;input type=&quot;text&quot; value=&quot;small-text&quot; class=&quot;small-text&quot; /&gt;</code>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Input type text <code>.small-text</code></label></th>
						<td>
							<input type="text" value="small-text" class="small-text" />
						</td>
					</tr>
					<tr valign="top">
						<td colspan="2">
							<code>&lt;input type=&quot;text&quot; value=&quot;large-text&quot; class=&quot;large-text&quot; /&gt;</code>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Input type text <code>.large-text</code></label></th>
						<td>
							<input type="text" value="large-text" class="large-text" />
						</td>
					</tr>
					<tr valign="top">
						<td colspan="2">
							<code>&lt;input type=&quot;text&quot; value=&quot;all-options&quot; class=&quot;all-options&quot; /&gt;</code>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Input type text <code>.all-options</code></label></th>
						<td>
							<input type="text" value="all-options" class="all-options" />
						</td>
					</tr>
					<tr valign="top">
						<td colspan="2">
							<code>&lt;input name="" id="" type="text" value="" class="regular-text" /&gt;</code>
							<br /><code>&lt;span class="description"&gt;...&lt;/span&gt;</code>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Input type text <code>.regular-text</code> <?php _e( 'with description', 'wp_admin_style' ); ?></th>
						<td>
							<input type="text" value="Example string" class="regular-text" />
							<span class="description"><?php _e( 'Here is the description for an form element', 'wp_admin_style' ); ?></span>
						</td>
					</tr>
					<tr valign="top">
						<td colspan="2">
							<code>&lt;input name="" id="" type="text" value="" class="regular-text code" /&gt;</code>
							<br /><code>&lt;span class="description"&gt;...&lt;/span&gt;</code>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Input type text <code>.regular-text code</code></th>
						<td>
							<input type="text" value="Example string for code" class="regular-text code" />
						</td>
					</tr>
					<tr valign="top">
						<td colspan="2">
<pre><code>&lt;fieldset&gt;
	&lt;legend class=&quot;screen-reader-text&quot;&gt;&lt;span&gt;Fieldset Example&lt;/span&gt;&lt;/legend&gt;
	&lt;label for=&quot;users_can_register&quot;&gt;
		&lt;input name=&quot;users_can_register&quot; type=&quot;checkbox&quot; id=&quot;users_can_register&quot; value=&quot;1&quot;  /&gt;
	&lt;/label&gt;
&lt;/fieldset&gt;
</code></pre>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Input type checkbox</th>
						<td>
							<fieldset>
								<legend class="screen-reader-text"><span>Fieldset Example</span></legend>
								<label for="users_can_register">
									<input name="" type="checkbox" id="" value="1" />
								</label>
							</fieldset>
						</td>
					</tr>
					<tr valign="top">
						<td colspan="2">
						<pre><code>&lt;select name=&quot;&quot; id=&quot;&quot;&gt;
	&lt;option selected=&quot;selected&quot; value=&quot;&quot;&gt;Example option&lt;/option&gt;
	&lt;option value=&quot;&quot;&gt;foo&lt;/option&gt;
&lt;/select&gt;</code></pre>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="">Select list</label></th>
						<td>
							<select name="" id="">
								<option selected="selected" value="">Example option</option>
								<option value="">foo</option>
							</select>
						</td>
					</tr>
					<tr valign="top">
						<td colspan="2">
							<pre><code>&lt;fieldset&gt;
	&lt;legend class=&quot;screen-reader-text&quot;&gt;&lt;span&gt;input type=&quot;radio&quot;&lt;/span&gt;&lt;/legend&gt;
	&lt;label title='g:i a'&gt;&lt;input type=&quot;radio&quot; name=&quot;example&quot; value=&quot;&quot; /&gt; &lt;span&gt;description&lt;/span&gt;&lt;/label&gt;&lt;br /&gt;
	&lt;label title='g:i a'&gt;&lt;input type=&quot;radio&quot; name=&quot;example&quot; value=&quot;&quot; /&gt; &lt;span&gt;description #2&lt;/span&gt;&lt;/label&gt;
&lt;/fieldset&gt;</code></pre>
						</td>
					</tr>
					<tr>
						<th scope="row">Input type radio</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>input type="radio"</span></legend>
								<label title='g:i a'><input type="radio" name="example" value="" /> <span>description</span></label><br />
								<label title='g:i a'><input type="radio" name="example" value="" /> <span>description #2</span></label>
							</fieldset>
						</td>
					</tr>
					<tr valign="top">
						<td colspan="2">
							<pre><code>&lt;textarea id=&quot;&quot; name=&quot;&quot; cols=&quot;80&quot; rows=&quot;10&quot;&gt;without class&lt;/textarea&gt;</code></pre>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="">Textarea</label></th>
						<td>
							<textarea id="" name="" cols="80" rows="10">without class</textarea>
						</td>
					</tr>
					<tr valign="top">
						<td colspan="2">
							<pre><code>&lt;textarea id=&quot;&quot; name=&quot;&quot; cols=&quot;80&quot; rows=&quot;10&quot; class=&quot;large-text&quot;&gt;.large-text&lt;/textarea&gt;</code></pre>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="">Textarea <code>.large-text</code></label></th>
						<td>
							<textarea id="" name="" cols="80" rows="10" class="large-text">.large-text</textarea>
						</td>
					</tr>
					<tr valign="top">
						<td colspan="2">
							<pre><code>&lt;textarea id=&quot;&quot; name=&quot;&quot; cols=&quot;80&quot; rows=&quot;10&quot; class=&quot;all-options&quot;&gt;.all-options&lt;/textarea&gt;</code></pre>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="">Textarea <code>.all-options</code></label></th>
						<td>
							<textarea id="" name="" cols="80" rows="10" class="all-options">.all-options</textarea>
						</td>
					</tr>
				</table>
			</form>
			<p><a class="alignright button" href="javascript:void(0);" onclick="window.scrollTo(0,0);" style="margin:3px 0 0 30px;"><?php _e('scroll to top', 'wp_admin_style' ); ?></a><br class="clear" /></p>
			<code>&lt;hr /&gt;</code>
			<hr id="form_helpers" />
			
			<h3><?php _e( 'Form Helper Functions', 'wp_admin_style' ); ?></h3>
			<?php _e( 'There are 3 main form functions which are very useful when you are creating
			 a new form in the admin area of WordPress. When you return data from the database and 
			 need to pre-populate the form with this data then these functions can be really useful.', 'wp_admin_style' ); ?>
			<pre><code>&lt;?php
 checked( $checked, $current = true, $echo = true );
 selected( $selected, $current = true, $echo = true );
 disabled( $disabled, $current = true, $echo = true );</code></pre>
			<pre><code>&lt;input type="checkbox" value="1" name="checkbox" &lt;?php checked( $value, '1', true); ?&gt; /&gt;</code></pre>
			<pre><code>&lt;select name="select"&gt;
	&lt;option value="1" &lt;?php selected( $value, '1', true);?&gt;&gt;1&lt;/option&gt;
	&lt;option value="2" &lt;?php selected( $value, '2', true);?&gt;&gt;2&lt;/option&gt;
	&lt;option value="3" &lt;?php selected( $value, '3', true);?&gt;&gt;3&lt;/option&gt;
	&lt;option value="4" &lt;?php selected( $value, '4', true);?&gt;&gt;4&lt;/option&gt;
	&lt;option value="5" &lt;?php selected( $value, '5', true);?&gt;&gt;5&lt;/option&gt;
&lt;/select&gt;</code></pre>
			<pre><code>&lt;input type="text" name="disabled_textbox" &lt;?php disabled( $value, 'disabled', true); ?&gt; /&gt;</code></pre>
			<p><a class="alignright button" href="javascript:void(0);" onclick="window.scrollTo(0,0);" style="margin:3px 0 0 30px;"><?php _e('scroll to top', 'wp_admin_style' ); ?></a><br class="clear" /></p>
			<code>&lt;hr /&gt;</code>
			<hr id="tabs" />
			
			<h3><?php _e( 'Tabs', 'wp_admin_style' ); ?></h3>
			<pre><code>&lt;h2 class="nav-tab-wrapper"&gt;
	&lt;a href="#" class="nav-tab">Tab #1&lt;/a&gt;
	&lt;a href="#" class="nav-tab nav-tab-active">Tab #2&lt;/a&gt;
	&lt;a href="#" class="nav-tab">Tab #2&lt;/a&gt;
&lt;/h2&gt;</code></pre>
			<h2 class="nav-tab-wrapper">
				<a href="#" class="nav-tab">Tab #1</a>
				<a href="#" class="nav-tab nav-tab-active">Tab #2</a>
				<a href="#" class="nav-tab">Tab #2</a>
			</h2>
			<p><a class="alignright button" href="javascript:void(0);" onclick="window.scrollTo(0,0);" style="margin:3px 0 0 30px;"><?php _e('scroll to top', 'wp_admin_style' ); ?></a><br class="clear" /></p>
			
		</div> <!-- .wrap -->
		<?php
	}
	
	/**
	 * Removes the prefix "-master" when updating from GitHub zip files
	 * 
	 * See: https://github.com/YahnisElsts/plugin-update-checker/issues/1
	 * 
	 * @param string $source
	 * @param string $remote_source
	 * @param object $thiz
	 * @return string
	 */
	public function rename_github_zip( $source, $remote_source, $thiz ) {
		
		if ( FALSE === strpos( $source, 'WordPress-Admin-Style') )
			return $source;
		
		$path_parts = pathinfo( $source );
		$newsource = trailingslashit( $path_parts['dirname'] ) . 
			trailingslashit( 'WordPress-Admin-Style' );
		rename( $source, $newsource );
		
		return $newsource;
	}
	
	/**
	 * Add donate link to plugin description in /wp-admin/plugins.php
	 * 
	 * @param array $plugin_meta
	 * @param string $plugin_file
	 * @param string $plugin_data
	 * @param string $status
	 * @return array
	 */
	public function donate_link( $plugin_meta, $plugin_file, $plugin_data, $status ) {
		
		if ( plugin_basename( __FILE__ ) == $plugin_file )
			$plugin_meta[] = sprintf(
				'&hearts; <a href="%s">%s</a>',
				'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6069955',
				__( 'Donate', 'wp_admin_style' )
		);
		
		return $plugin_meta;
	}
	
} // end class
