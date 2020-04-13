<?php
/**
 * Plugin Name: Display Posts - Templates
 * Description: Simply adding Bill Erickson's <a href="https://www.billerickson.net/template-parts-with-display-posts-shortcode" target="_blank">code</a> for using Display Post plugin's layout feature.
 * Version: 1.0
 * Author: Jake Almeda
 * Author URI: http://smarterwebpackages.com/
 * Network: true
 * License: GPL2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


function be_dps_template_part( $output, $original_atts ) {
    
	// Return early if our "layout" attribute is not specified
	if( empty( $original_atts['layout'] ) )
		return $output;
	
	ob_start();
	//get_template_part( get_stylesheet_directory_uri().'/partials/dps/', 'dps-'.$original_atts[ "layout" ].'.php' );
	include get_stylesheet_directory().'/partials/dps/dps-'.$original_atts[ "layout" ].'.php';
	$new_output = ob_get_clean();
	
	if( !empty( $new_output ) )
		$output = $new_output;
	
	return $output;

}
add_action( 'display_posts_shortcode_output', 'be_dps_template_part', 10, 2 );