<?php

/* FILTERING */

// custom query vars
add_filter( 'query_vars', 'add_query_vars_filter' );
function add_query_vars_filter( $vars ) {
    // account
    $vars[] = "section";

    return $vars;
}

// filter
add_action( 'pre_get_posts', 'my_pre_get_posts' );
function my_pre_get_posts( $query ) {
    // do not modify queries in the admin
    if ( ! is_admin() && $query->is_main_query() ) {
        if(is_shop()){ // SHOP
            // posts per page
            $query->set( 'posts_per_page', 1 );
            // sorting
            $query->set( 'orderby', 'menu_order' );
            $query->set( 'order', 'ASC' );
            // 
            remove_action( 'pre_get_posts', 'custom_pre_get_posts_query' );
        } elseif ( is_post_type_archive('partners') ) { // PARTNERS
            // posts per page
            $query->set( 'posts_per_page', 15 );
            // sorting
            $query->set( 'orderby', 'menu_order' );
            $query->set( 'order', 'ASC' );
        } elseif ( is_post_type_archive('news') ) { // NEWS
            // posts per page
            $query->set( 'posts_per_page', 4 );
            // sorting
            $query->set( 'orderby', 'date' );
            $query->set( 'order', 'DESC' );
        } elseif ( is_post_type_archive('gallery') ) { // GALLERY
            // posts per page
            $query->set( 'nopaging', true );
            // sorting
            $query->set( 'orderby', 'menu_order' );
            $query->set( 'order', 'ASC' );
        }
    }
    // return
    return $query;
}

/* END */