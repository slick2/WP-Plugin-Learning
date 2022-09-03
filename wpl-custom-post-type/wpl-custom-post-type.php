<?php
/**
 * Plugin Name: WP Custom Post Type
 *
 * @package Wp Plugin Learning
 */

/**
 * Create the post type
 *
 * @return void
 */
function wp_plugin_setup_post_type() {
	register_post_type(
		'books',
		array(
			'labels'            =>
				array(
					'name'          => __( 'Books' ),
					'singular_name' => __( 'Books' ),
					'add_new_item'  => __( 'Add New Book' ),
				),
			'public'            => false,
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
add_action( 'init', 'wp_plugin_setup_post_type' );

/**
 * Activate the plugin
 *
 * @return void
 */
function wp_plugin_activate() {
	wp_plugin_setup_post_type();
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'wp_plugin_activate' );

/**
 * Deactivate the plugin
 *
 * @return void
 */
function wp_plugin_deactivate() {
	unregister_post_type( 'books' );
	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'wp_plugin_deactivate' );
