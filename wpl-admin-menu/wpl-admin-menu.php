<?php
/**
 * Plugin Name: WPL Admin Menu
 *
 * @package WP Plugin Learning
 */

/**
 * Setup options page
 *
 * @return void
 */
function wpl_admin_menu_options_page() {
	// https://developer.wordpress.org/reference/functions/add_menu_page/ .
	add_menu_page(
		'WPL Admin Menu',                         // $page_title
		'WPL Admin Menu Options',                 // $menu_title
		'manage_options',                         // $capability
		'wpl_admin_menu',                         // $menu_slug
		'wpl_admin_menu_options_page_html',       // $callback function or file
		// plugin_dir_path( __FILE__ ) . 'admin/wpl_admin_menu_view.php',
		// plugin_dir_url( __FILE__ ) . 'images', // $icon_url
		// position, // $position
	);
}
add_action( 'admin_menu', 'wpl_admin_menu_options_page' );

/**
 *
 * Sample options HTML page
 */
function wpl_admin_menu_options_page_html() {
	?>
	<div class="wrap">
	<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
	<form action="options.php" method="post">
	<?php
		// output security fields for the registered setting "wporg_options".
		settings_fields( 'wpl_adminu_menu_options' );
		// output setting sections and their fields.
		// (sections are registered for "wporg", each field is registered to a specific section).
		do_settings_sections( 'wpl_admin_menu' );
		// output save settings button.
		submit_button( __( 'Save Settings', 'textdomain' ) );
	?>
	</form>
	</div>
	<?php
}

/**
 * Add a submenu
 */
function wpl_admin_menu_submenu_page() {
	add_submenu_page(
		'wpl_admin_menu',
		'WPL Admin Menu',
		'WPL Admin Sub Menu Options',
		'manage_options',
		'wpl_admin_menu_submenu',
		'wpl_admin_menu_submenu_options_page_html'
	);
}
add_action( 'admin_menu', 'wpl_admin_menu_submenu_page' );



/**
 *
 * Sample options HTML page
 */
function wpl_admin_menu_submenu_options_page_html() {
	?>
	<div class="wrap">
	<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
	<form action="options.php" method="post">
	<?php
		// output security fields for the registered setting "wporg_options".
		settings_fields( 'wpl_adminu_menu_options' );
		// output setting sections and their fields.
		// (sections are registered for "wporg", each field is registered to a specific section).
		do_settings_sections( 'wpl_admin_menu' );
		// output save settings button.
		submit_button( __( 'Save Settings', 'textdomain' ) );
	?>
	</form>
	</div>
	<?php
}

/**
 * Note:
 * <form action="<?php menu_page_url( 'wporg' ) ?>" method="post">.
 */
