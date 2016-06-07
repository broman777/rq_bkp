<?php

/* LET'S CLEAN UP WORDPRESS */

// global
function cleaning_wp(){
    remove_action('wp_head', 'wp_generator'); // remove WP tag

    remove_action( 'wp_head', 'feed_links_extra', 3 ); // remove extra feeds
    remove_action( 'wp_head', 'feed_links', 2 ); // remove general feeds
    remove_action( 'wp_head', 'rsd_link' ); // remove RSD link
    remove_action( 'wp_head', 'wlwmanifest_link' ); // remove manifest link
    remove_action( 'wp_head', 'index_rel_link' ); // remove index link
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // remove prev link
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // remove start link
    remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // remove links to adjacent posts
    remove_action( 'wp_head', 'wp_shortlink_wp_head'); // remove shortlink

    // disable admin bar
    add_filter('the_generator', '__return_false');
    add_filter('show_admin_bar','__return_false');

    // disable emoji
    remove_action( 'wp_head', 'print_emoji_detection_script', 7);
    remove_action( 'wp_print_styles', 'print_emoji_styles' );

    // disbale json
    remove_action( 'wp_head', 'rest_output_link_wp_head' );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    remove_action( 'template_redirect', 'rest_output_link_header', 11 );
}
add_action('after_setup_theme', 'cleaning_wp');

// disabling scripts
add_action( 'wp_footer', 'my_deregister_scripts' );
function my_deregister_scripts(){
    wp_deregister_script( 'wp-embed' ); // disable embed
}

// disabling styles
add_action( 'wp_print_styles', 'my_deregister_styles' );
function my_deregister_styles(){
    wp_deregister_style( 'dashicons' ); // disable dashicons
}

// disabling cache
remove_action('set_comment_cookies', 'wp_set_comment_cookies');

/* END */