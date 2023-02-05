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
		'Hello_Dolly',
		'Hello Dolly',
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
	?>
	<h2>Hello Dolly</h2>
	<?php
}
/**
 * Add help tab
 *
 * @return void
 */
function wpl_add_help_tab() {
	$screen  = get_current_screen();
	$content = "Hello, Dolly
	Well, hello, Dolly
	It's so nice to have you back where you belong
	You're lookin' swell, Dolly
	I can tell, Dolly
	You're still glowin', you're still crowin'
	You're still goin' strong
	I feel the room swayin'
	While the band's playin'
	One of our old favorite songs from way back when
	So, take her wrap, fellas
	Dolly, never go away again
	Hello, Dolly
	Well, hello, Dolly
	It's so nice to have you back where you belong
	You're lookin' swell, Dolly
	I can tell, Dolly
	You're still glowin', you're still crowin'
	You're still goin' strong
	I feel the room swayin'
	While the band's playin'
	One of our old favorite songs from way back when
	So, golly, gee, fellas
	Have a little faith in me, fellas
	Dolly, never go away
	Promise, you'll never go away
	Dolly'll never go away again";
	$screen->add_help_tab(
		array(
			'id' => 'hello_dolly',
			'title' => __( 'Hello Dolly' ),
			'content' => '<p>' . __( $content ) . '</p>',
		)
	);
	$screen->set_help_sidebar( __( 'Hello Dolly Information' ) );
}
