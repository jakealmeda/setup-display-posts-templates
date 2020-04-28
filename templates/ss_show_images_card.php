<?php

if ( ! defined( "ABSPATH" ) ) {
    exit; // Exit if accessed directly
}

//global $pid; // this is the post ID that's going to be passed from the main file
$pid = get_the_ID();

// WHEN MAKING A TEMPLATE, ALWAYS COPY THE LINES FROM 1 TO HERE AND DO YOUR CHANGES BELOW

?><div class="item-list-entry"><?php

// SPECIFY IMAGES AND SIZES
$ss_images = array(
    'featured'      => 'card',
);
echo setup_show_images( $ss_images, $pid );


// NATIVE | TITLE
//echo '<div class="item-title"><a href="'.get_the_permalink( $pid ).'">'.get_the_title( $pid ).'</a></div>';

?></div><?php
// EOF