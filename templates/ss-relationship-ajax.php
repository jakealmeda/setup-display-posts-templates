<?php

if ( ! defined( "ABSPATH" ) ) {
    exit; // Exit if accessed directly
}

//global $pid; // this is the post ID that's going to be passed from the main file
$pid = get_the_ID();

// WHEN MAKING A TEMPLATE, ALWAYS COPY THE LINES FROM 1 TO HERE AND DO YOUR CHANGES BELOW

?><div class="item-grid-entry"><?php

// SPECIFY IMAGES AND SIZES
$ss_images = array(
    'featured'      => 'thumbnail',
);
$img_atts = array(
    'permalink'     => TRUE,        // options: true or false
    'target'        => FALSE,       // options: false (the same as _self) or _blank
);
echo setup_show_images( $ss_images, $pid, $img_atts );

// NATIVE | TITLE
echo '<div class="item-title"><a href="'.get_the_permalink( $pid ).'">'.get_the_title( $pid ).'</a></div>';

// SET THE CONTAINER - OPEN
echo '<div id="item-relations_'.$pid.'">';

    // GET ALL RELATED ENTRIES
    echo do_shortcode( '[setup-relationships template="ajax_setup_starter_link_media"][/setup-relationships]' );

// SET THE CONTAINER - CLOSE
?></div>


</div>
<div><hr /></div>
<?php
//EOF