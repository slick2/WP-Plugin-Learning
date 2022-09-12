<?php
/**
 * Plugin Name: WPL Command Line
 *
 * @package WP Plugin Learning
 */

/**
 * Hello World
 */
class WPL_CLI {
	/**
	 * Hello
	 *
	 * @return void
	 */
	public function hello_world() {
		WP_CLI::line( 'Hello World' );
	}
	/**
	 * Display Arguments
	 * display_arguments John Doe 'Jane Doe' 32 --title='Moby Dick' --author='Herman Melville' --published=1851 --publish --no-archive.
	 *
	 * @param [type] $args command line arguments.
	 * @param [type] $assoc_args command line arguments with association.
	 * @return void
	 */
	public function display_arguments( $args, $assoc_args ) {
		WP_CLI::line( var_export( $args[0] ) );
		WP_CLI::line( var_export( $args[1] ) );
		WP_CLI::line( var_export( $args[2] ) );
		WP_CLI::line( var_export( $args[3] ) );

		WP_CLI::line( var_export( $assoc_args['title'] ) );
		WP_CLI::line( var_export( $assoc_args['author'] ) );
		WP_CLI::line( var_export( $assoc_args['published'] ) );

		WP_CLI::line( var_export( $assoc_args['publish'] ) );  // True.
		WP_CLI::line( var_export( $assoc_args['archive'] ) );  // False.

	}
}

/**
 * Reister Command
 */
function wpl_cli_register_commands() {
	WP_CLI::add_command( 'wpl', 'WPL_CLI' );
}
add_action( 'cli_init', 'wpl_cli_register_commands' );
