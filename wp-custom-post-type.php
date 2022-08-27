<?php
/**
 * Plugin Name: WP Plugin
 */


function wp_plugin_setup_post_type(){
    register_post_type('books', 
        array(
            'labels' => array(
                'name' => __( 'Books'),
                'singular_name' => __( 'Books' ),
                'add_new_item' => __('Add New Book')
            ),
            'public' => false,
            'show_ui'=>true,
            'show_in_admin_bar'=>true,
            'har_archive' => true,            
            'show_in_rest' => true,
            'supports' => array('title')
            
        )
    );
}
add_action('init', 'wp_plugin_setup_post_type');

function wp_plugin_activate(){
    wp_plugin_setup_post_type();
    flush_rewrite_rules();    
}

register_activation_hook(__FILE__, 'wp_plugin_activate');

function wp_plugin_deactivate(){
    unregister_post_type( 'books');
    flush_rewrite_rules();
}

register_deactivation_hook( __FILE__, 'wp_plugin_deactivate');
