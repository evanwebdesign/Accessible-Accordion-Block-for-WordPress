<?php
/**
 * Plugin Name: Accessible Accordion Block
 * Description: A Beaver Builder ACF block for an accessible accordion.
 * Version: 1.0.0
 * Author: Minimal Chaos
 * Text Domain: accessible-accordion-block
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register the Accessible Accordion Block
 */
add_action( 'init', function () {
    register_block_type( plugin_dir_path( __FILE__ ) . 'block.json' );
});

/**
 * Enqueue the JavaScript for the accordion block
 */
add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_script(
        'accordion-block-script',
        plugin_dir_url( __FILE__ ) . 'accordion.js',
        [],
        false,
        true
    );
}, 16);

/**
 * Load ACF fields from JSON file
 */
add_action( 'acf/init', function () {
    $fields = json_decode( file_get_contents( plugin_dir_path( __FILE__ ) . 'acf-fields.json' ), true );

    if ( empty( acf_get_fields( $fields[0]['group_678af563b6cf6'] ) ) ) {
        acf_add_local_field_group( $fields[0] );
    }
});

/**
 * Ensure ACF is active
 */
add_action( 'admin_notices', function () {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        echo '<div class="notice notice-error"><p>' . esc_html__( 'The Accessible Accordion Block plugin requires Advanced Custom Fields (ACF) to be installed and active.', 'accessible-accordion-block' ) . '</p></div>';
    }
});
