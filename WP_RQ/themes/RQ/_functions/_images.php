<?php

/* IMAGES */

// jpg quality
add_filter('jpeg_quality', create_function('', 'return 90;'));

// images sizes
add_action( 'after_setup_theme', 'image_additional_sizes' );
function image_additional_sizes() {
    // mainpage
    add_image_size( '650x390', 650, 390, true ); // 650 x 390 pixels (with resize)
    // products
    add_image_size( '600x0', 600 ); // 600 pixels wide (and unlimited height)
    // news
    add_image_size( '585x440', 585, 440, true ); // 585 x 440 pixels (with resize)
    // gallery
    add_image_size( '430x320', 430, 320, true ); // 430 x 320 pixels (with resize)
}

/* END */