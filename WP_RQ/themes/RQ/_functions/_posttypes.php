<?php

/* SUPPORT */
add_action( 'init', 'my_custom_init' );
function my_custom_init() {
    remove_post_type_support( 'page', 'editor' );
    remove_post_type_support( 'page', 'comments' );
    remove_post_type_support( 'page', 'author' );
}
/* END */

/* CUSTOM POST TYPES */
/* partners */
function create_posttype_partners() {
    register_post_type( 'partners',
        array(
            'labels' => array( 'name' => 'Партнеры', 'add_new' => 'Добавить партнера' ),
            'public' => true,
            'has_archive' => true,
            'supports' => false
        )
    );
}
add_action( 'init', 'create_posttype_partners' );

/* gallery */
function create_posttype_gallery() {
    register_post_type( 'gallery',
        array(
            'labels' => array( 'name' => 'Галерея', 'add_new' => 'Добавить фото/видео' ),
            'public' => true,
            'has_archive' => true,
            'supports' => false
        )
    );
}
add_action( 'init', 'create_posttype_gallery' );
function create_posttype_type() {
    register_taxonomy(
        'type',
        'gallery',
        array(
            'labels' => array(
                'name' => 'Тип медиа',
                'add_new_item' => 'Добавить тип',
                'new_item_name' => "Новый тип"
            ),
            'hierarchical' => false, // categories or tags
            'show_admin_column' => true
        )
    );
}
add_action( 'init', 'create_posttype_type', 0 );

/* news */
function create_posttype_news() {
    register_post_type( 'news',
        array(
            'labels' => array( 'name' => 'Новости', 'add_new' => 'Добавить новость' ),
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title' )
        )
    );
}
add_action( 'init', 'create_posttype_news' );

/* other */
function create_posttype_other() {
    register_post_type( 'other',
        array(
            'labels' => array( 'name' => 'Общее', 'add_new' => 'Добавить страницу' ),
            'public' => true,
            'has_archive' => false,
            'supports' => array( 'title' )
        )
    );
}
add_action( 'init', 'create_posttype_other' );
/* END */