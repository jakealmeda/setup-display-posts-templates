<?php

if ( ! defined( "ABSPATH" ) ) {
    exit; // Exit if accessed directly
}

//global $pid; // this is the post ID that's going to be passed from the main file
$pid = get_the_ID();

// WHEN MAKING A TEMPLATE, ALWAYS COPY THE LINES FROM 1 TO HERE AND DO YOUR CHANGES BELOW

// IMAGE - USE WP NATIVE FEATURED IMAGE
$img_bg = get_the_post_thumbnail_url( $pid );

// IMAGE - USE A CUSTOM FIELD
$field = 'item-pic'; // item-icon
$size = 'full';
//$img_bg = wp_get_attachment_image_url( get_post_meta( $pid, $field, TRUE ), $size );

?>
<div class="wp-block-cover alignwide has-background-dim" style="background-image:url( <?php echo $img_bg; ?> )">
	<div class="wp-block-cover__inner-container">
		<p class="has-text-align-center has-large-font-size">Cover Wide (w BG Image) &amp; Text</p>
	</div>
</div>

<?php

// EOF