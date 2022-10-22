<?php
/**
 * Plugin Name: WPL Episodes
 *
 * @package Wp Plugin Learning
 */

/**
 * Create the post type
 *
 * @return void
 */
function wpl_episodes_setup_post_type() {
	register_post_type(
		'episodes',
		array(
			'labels'            =>
				array(
					'name'          => __( 'Episodes' ),
					'singular_name' => __( 'Episodes' ),
					'add_new_item'  => __( 'Add New Episodes' ),
				),
			'public'            => true,
			'show_ui'           => true,
			'show_in_admin_bar' => true,
			'has_archive'       => true,
			'show_in_rest'      => true,
			'supports'          =>
				array(
					'title',
				),
		),
	);

}
add_action( 'init', 'wpl_episodes_setup_post_type' );
/**
 * wpl_remove_menu
 *
 * @return void
 */
function wpl_remove_menu() {
	$user = wp_get_current_user();
	$role = $user->roles[0];

	if ( $role === 'author' ) {
		remove_menu_page( 'index.php');
		remove_menu_page( 'edit.php');
		remove_menu_page( 'tools.php');
		remove_menu_page( 'edit-comments.php' );
	}
}

add_action( 'admin_init', 'wpl_remove_menu' );


/**
 * Activate the plugin
 *
 * @return void
 */
function wpl_episodes_activate() {
	wpl_episodes_setup_post_type();
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'wpl_episodes_activate' );

/**
 * Deactivate the plugin
 *
 * @return void
 */
function wpl_episodes_deactivate() {
	unregister_post_type( 'episodes' );
	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'wpl_episodes_deactivate' );
