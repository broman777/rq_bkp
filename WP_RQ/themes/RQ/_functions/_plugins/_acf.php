<?php

/* ACF */

// WOOCOMMERCE saving fields
add_action('acf/save_post', 'my_acf_save_post', 20);
function my_acf_save_post( $post_id ) {

    // shop
    if( get_post_type($post_id)=='product' ) {
        // price and stock
        $pack_price = get_field('pack_price', $post_id);
        $pack_stock_status = (get_field('pack_stock_status', $post_id) ? 'instock' : 'outofstock');
        // update
        if($pack_price){
            update_post_meta($post_id, '_price', (float)trim($pack_price));
            update_post_meta($post_id, '_regular_price', (float)trim($pack_price));
        }
        update_post_meta($post_id, '_stock_status', $pack_stock_status);
    }

    // partners
    if( get_post_type($post_id)=='partners' ) {
        // price and stock
        $title = get_field('title', $post_id);
        $post_slug = sanitize_title($title);
        // create post object
        $my_post = array(
            'ID' => $post_id,
            'post_title' => $title,
            'post_name' => $post_slug
        );
        // update the post in the database
        wp_update_post($my_post);
    }

    // gallery
    if( get_post_type($post_id)=='gallery' ) {
        // price and stock
        $title = 'ID: '.get_the_ID();
        $post_slug = sanitize_title($title);
        // create post object
        $my_post = array(
            'ID' => $post_id,
            'post_title' => $title,
            'post_name' => $post_slug
        );
        // update the post in the database
        wp_update_post($my_post);
    }
}

/* END */