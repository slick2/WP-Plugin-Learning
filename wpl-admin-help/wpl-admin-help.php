<?php
/**
 * Plugin Name: WPL Admin Help
 *
 * @package WPL Plugin Learning
 * @internal never define functions inside callbacks.
 * these functions could be run multiple times; this would result in a fatal error.
 */
function wpl_options_page() {
	$my_menu_page = add_menu_page(
		'WPL',
		'WPL Options',
		'manage_options',
		'wpl',
		'wpl_options_page_html'
	);
	// Add help bar.
	
	add_action( 'load-' . $my_menu_page, 'wpl_add_help_tab' );
}

add_action( 'admin_menu', 'wpl_options_page' );

/**
 * Options page
 *
 * @return void
 */
function wpl_options_page_html() {
	echo 'hello';
}
/**
 * Add help tab
 *
 * @return void
 */
function wpl_add_help_tab() {
	$screen = get_current_screen();
	$screen->add_help_tab(
		array(
			'id' => 'hello_dolly',
			'title' => __( 'Hello Dolly' ),
			'content' => '<p>' . __( 'Well, hello, Dolly' ) . '</p>',
		)
	);
	$screen->set_help_sidebar( __( 'Hello Dolly' ) );
}