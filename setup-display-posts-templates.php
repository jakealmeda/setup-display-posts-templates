<?php
/**
 * Plugin Name: Display Posts - Templates
 * Description: Simply adding Bill Erickson's <a href="https://www.billerickson.net/template-parts-with-display-posts-shortcode" target="_blank">code</a> for using Display Post plugin's layout feature.
 * Version: 1.0.1
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

    // The line below is Bill's code which I can't make it to work
    //get_template_part( get_stylesheet_directory_uri().'/partials/dps/', 'dps-'.$original_atts[ "layout" ].'.php' );

    // The next line is my code which gets templates from the THEME file:
    //include get_stylesheet_directory().'/partials/dps/dps-'.$original_atts[ "layout" ].'.php';

    // The next line is my code which gets templates from this plugin directory:
    include plugin_dir_path( __FILE__ ).'templates/'.$original_atts[ "layout" ].'.php';

    $new_output = ob_get_clean();
    
    if( !empty( $new_output ) )
        $output = $new_output;
    
    return $output;

}
add_action( 'display_posts_shortcode_output', 'be_dps_template_part', 10, 2 );


// HANDLE IMAGES TO BE DISPLAYED
if( !function_exists( 'setup_show_images' ) ) {
    
    function setup_show_images( $images, $pid, $img_atts = FALSE ) {
        
        foreach( $images as $key => $value ) {
            
            /**
             * $key    --> this is the field name
             * $value  --> this is the image size
             */
            
            // Check what image to display
            if( $key == 'featured' ) {
                
                // featured image
                $out .= get_the_post_thumbnail( $pid, $value );
                
            } else {
                
                // custom image
                $out .= wp_get_attachment_image( get_post_meta( $pid, $key, TRUE ), $value );
                
            }

            // break if $out has content
            if( $out ) {

                // validate link
                if( $img_atts[ 'permalink' ] ) {

                    // determine where to open the link
                    if( $img_atts[ 'target' ] )

                    $out = '<a href="'.get_the_permalink( $pid ).'">'.$out.'</a>';

                }                

                // exit loop if an image is confirmed
                break;
            }
            
        }
        
        // validate if there's an image, else, show placeholder image
        if( $out ) {
            return $out;
        } else {
            return '<img src="'.get_stylesheet_directory_uri().'/assets/images/brand-smarterwebpackages.png" />';
        }
        
    }
    
}