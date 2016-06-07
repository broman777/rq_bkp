<?php

/* QTRANSLATE */

// remove generator
remove_action('wp_head','qtranxf_wp_head_meta_generator');

// remove column in admin
remove_filter('manage_posts_columns', 'qtranxf_languageColumnHeader');
remove_filter('manage_posts_custom_column', 'qtranxf_languageColumn');
remove_filter('manage_pages_columns', 'qtranxf_languageColumnHeader');
remove_filter('manage_pages_custom_column', 'qtranxf_languageColumn');

// ACF translate
add_filter('acf/prepare_field/type=text', 'my_acf_prepare_field');
add_filter('acf/prepare_field/type=textarea', 'my_acf_prepare_field');
function my_acf_prepare_field( $field ) {
    if(isset($field['wrapper']['class'])){
        $class_arr = explode(' ', $field['wrapper']['class']);
        if( !in_array('not_translate_it', $class_arr)) {
            $field['class'] = 'qtranslateit';
        }
    }
    return $field;
}

/* END */