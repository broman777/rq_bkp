<?php

/* POSTTYPES COLUMNS */

// news
add_filter('manage_news_posts_columns', 'columns_head_only_news', 10);
function columns_head_only_news($defaults) {
    unset($defaults['title']);
    unset($defaults['date']);
    $defaults['img'] = '';
    $defaults['title'] = 'Заголовок';
    $defaults['date'] = 'Дата';
    return $defaults;
}
add_action('manage_news_posts_custom_column', 'columns_content_only_news', 10, 2);
function columns_content_only_news($column_name, $post_ID) {
    if ($column_name == 'img') {
        $img = get_field('main_img', $post_ID);
        echo (is_array($img) ? '<img src="'.$img['sizes']['thumbnail'].'">' : '-' );
    }
}

// partners
add_filter('manage_partners_posts_columns', 'columns_head_only_partners', 10);
function columns_head_only_partners($defaults) {
    unset($defaults['title']);
    unset($defaults['date']);
    $defaults['img'] = 'Логотип';
    $defaults['title'] = 'Название партнера';
    $defaults['date'] = 'Дата';
    return $defaults;
}
add_action('manage_partners_posts_custom_column', 'columns_content_only_partners', 10, 2);
function columns_content_only_partners($column_name, $post_ID) {
    if ($column_name == 'img') {
        $logo = get_field('logo', $post_ID);
        echo (is_array($logo) ? '<img src="'.$logo['sizes']['thumbnail'].'">' : '-' );
    }elseif ($column_name == 'title') {
        $title = get_field('title', $post_ID);
        echo ($title ? $title : '-' );
    }
}

// gallery
add_filter('manage_gallery_posts_columns', 'columns_head_only_gallery', 10);
function columns_head_only_gallery($defaults) {
    unset($defaults['title']);
    unset($defaults['taxonomy-type']);
    unset($defaults['date']);
    $defaults['img'] = 'Превью';
    $defaults['title'] = 'Название';
    $defaults['taxonomy-type'] = 'Тип';
    $defaults['date'] = 'Дата';
    return $defaults;
}
add_action('manage_gallery_posts_custom_column', 'columns_content_only_gallery', 10, 2);
function columns_content_only_gallery($column_name, $post_ID) {
    if ($column_name == 'img') {
        $img = get_field('img', $post_ID);
        echo (is_array($img) ? '<img src="'.$img['sizes']['thumbnail'].'">' : '-' );
    }
}

/* END */