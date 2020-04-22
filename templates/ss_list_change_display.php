<?php

if ( ! defined( "ABSPATH" ) ) {
    exit; // Exit if accessed directly
}

$pid = get_the_ID();

// WHEN MAKING A TEMPLATE, ALWAYS COPY THE LINES FROM 1 TO HERE AND DO YOUR CHANGES BELOW

/*******************
 * Set which number/s must show a different output
 **************** */
$trigger = array( 2, 6, 9 );

// set global variable
global $ent_counter;

// increment counter
$ent_counter++;

$stop = '';

if( is_array( $trigger ) ) {

    foreach ( $trigger as $count ) {

        if( $count == $ent_counter ) {

            ?><div class="item-list-entry-highlight"><?php
                echo '<div class="item-title-highlight"><a href="'.get_the_permalink( $pid ).'"><h2>'.get_the_title( $pid ).'</h2></a></div>';
            ?></div><?php

            $stop = 1;

        }

    }

}

if( !$stop ) {

    ?><div class="item-list-entry"><?php

    // NATIVE | FEATURED IMAGE
    // SPECIFY IMAGES AND SIZES
    $ss_images = array(
        'featured'      => 'thumbnail'
    );
    $img_atts = array(
        'permalink'     => TRUE,        // options: true or false
        'target'        => FALSE,       // options: false (the same as _self) or _blank
    );
    echo setup_show_images( $ss_images, $pid, $img_atts );


    // NATIVE | TITLE
    echo '<div class="item-title"><a href="'.get_the_permalink( $pid ).'">'.wp_trim_words( get_the_title( $pid ), 10 ).'</a></div>';

    // NATIVE | AUTHOR
    $author_id = get_post_field( 'post_author', $pid );
    //<img src="'.get_avatar_url( $author_id ).'" />
    echo '<div class="item-author">by <a href="'.get_author_posts_url( $author_id ).'">'.get_the_author_meta( 'display_name' , $author_id ).'</a></div>';

    ?></div><?php

}

echo '<hr />';
// EOF