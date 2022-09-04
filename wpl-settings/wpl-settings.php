<?php
/**
 * Plugin Name: WPL Settings Page
 * Sample Settings Page
 *
 * @package WP Plugin Learning
 */

/**
 * Settings initialization
 *
 * @return void
 */
function wpl_settings_init() {
	// register a new setting for "reading" page.
	register_setting(
		'reading',              // $option_group
		'wpl_setting_example',  // $option_name
		array(
			'array',
			/** 'callback',         // $sanitize_callback. */
		),
	);

	// register a new section in the "reading" page.
	add_settings_section(
		'wpl_settings_section',           // $id
		'WPL Settings Section',           // $title
		'wpl_settings_section_callback',  // $callback
		'reading'                         // $page
	);

	// register a new field in the "wpl_settings_section" section, ins.
	add_settings_field(
		'wpl_settings_option1',           // $id
		'Option 1',                      // $title
		'wpl_settings_option1_callback',  // $callback
		'reading',                       // $page
		'wpl_settings_section',          // $section
	);

	// register a new field in the "wpl_settings_section" section, ins.
	add_settings_field(
		'wpl_settings_option2',           // $id
		'Option 2',                     // $title
		'wpl_settings_option2_callback',  // $callback
		'reading',                      // $page
		'wpl_settings_section',         // $section
	);

}
add_action( 'admin_init', 'wpl_settings_init' );

/**
 * Section callback
 *
 * @return void
 */
function wpl_settings_section_callback() {
	echo '<p>WPL Section Introduction</p>';
}

/**
 * Settings Field callback
 *
 * @return void
 */
function wpl_settings_option1_callback() {
	$setting = get_option( 'wpl_setting_example' );
	?>
	<input type="text" name="wpl_setting_example[option1]" value="<?php echo isset( $setting['option1'] ) ? esc_attr( $setting['option1'] ) : ''; ?>">	
	<?php
}

/**
 * Settings Field callback
 *
 * @return void
 */
function wpl_settings_option2_callback() {
	$setting = get_option( 'wpl_setting_example' );
	?>
	<input type="text" name="wpl_setting_example[option2]" value="<?php echo isset( $setting['option2'] ) ? esc_attr( $setting['option2'] ) : ''; ?>">	
	<?php
}
