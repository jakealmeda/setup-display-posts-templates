<?php

if ( ! defined( "ABSPATH" ) ) {
    exit; // Exit if accessed directly
}

//global $pid; // this is the post ID that's going to be passed from the main file
$pid = get_the_ID();

// WHEN MAKING A TEMPLATE, ALWAYS COPY THE LINES FROM 1 TO HERE AND DO YOUR CHANGES BELOW

?><div class="item-list-entry"><?php


// NATIVE | FEATURED IMAGE
echo '<div class="item-pic"><a href="'.get_the_permalink( $pid ).'">'.get_the_post_thumbnail( $pid, 'thumbnail' ).'</a></div>';


// NATIVE | TITLE
echo '<div class="item-title"><a href="'.get_the_permalink( $pid ).'">'.get_the_title( $pid ).'</a></div>';

?></div><?php
// EOF