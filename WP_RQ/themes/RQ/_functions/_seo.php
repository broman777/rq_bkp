<?php

/* REMOVE URL PARTS */
/*add_filter( 'post_type_link', 'custom_remove_cpt_slug', 10, 3 );
function custom_remove_cpt_slug( $post_link, $post, $leavename ) {
    if ( 'product' != $post->post_type || 'publish' != $post->post_status ) {return $post_link;}
    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
    return $post_link;
}
add_action( 'pre_get_posts', 'custom_parse_request_tricksy' );
function custom_parse_request_tricksy( $query ) {
    // Only noop the main query
    if ( ! $query->is_main_query() ) return;
    // Only noop our very specific rewrite rule match
    if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {return;}
    // 'name' will be set if post permalinks are just post_name, otherwise the page rule will match
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array('product') );
    }
}*/
/* END */

/* SEO TITLE AND DESCRIPTION */
// return seo value
// fields names must be: SLUG_section, SLUG_seo_title, SLUG_seo_description
function get_seo($what){
    // id of page, where values stored (or 'option')
    $page_id = 32;

    // get seo value from database
    if(is_post_type_archive()){ // for archives
        // slug of post type
        $post_type_object = get_queried_object();
        $post_type_slug = (isset($post_type_object->name) ? $post_type_object->name : '');
        // default value
        $default = ($what=='title' ? get_field($post_type_slug.'_section', $page_id) : '');
        // get value
        $return = (get_field($post_type_slug.'_seo_'.$what, $page_id) ? get_field($post_type_slug.'_seo_'.$what, $page_id) : $default);
    }elseif(is_page('cart') || is_page('account')){ // pages "cart" and "my account"
        // slug of post type
        $post_type_object = get_queried_object();
        $post_type_slug = (isset($post_type_object->post_name) ? $post_type_object->post_name : '');
        // default value
        $default = ($what=='title' ? get_field($post_type_slug.'_section', $page_id) : '');
        // get value
        $return = (get_field($post_type_slug.'_seo_'.$what, $page_id) ? get_field($post_type_slug.'_seo_'.$what, $page_id) : $default);
    }else{ // for others
        $return = get_field('seo_'.$what);
    }
    
    // return
    if($what=='title'){ // TITLE
        return $return;
    }else{ // DESCRIPTION
        return ($return ? $return : get_option('blogdescription'));
    }
}

// make title string
function create_seo_title($title){
    $separator = ' / ';
    $blogname = get_option('blogname');
    return (is_front_page() ? ($title ? $title : $blogname ) : $title . $separator . $blogname);
}

// set title
add_filter( 'wp_title', 'seo_title', 10 );
function seo_title($title){
    $custom_title = get_seo('title');
    if(is_front_page()){ // mainpage
        return create_seo_title($custom_title);
    }else{ // others
        return create_seo_title($custom_title ? $custom_title : $title );
    }

}
/* END */