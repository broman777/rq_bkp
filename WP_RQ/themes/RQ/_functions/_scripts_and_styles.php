<?php

/* CHANGE JQUERY VERSION */
function jquery_change_version() {
    wp_deregister_script('jquery'); wp_register_script('jquery', get_template_directory_uri().'/js/jquery-2.2.4.min.js', false, '2.2.4', true); wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'jquery_change_version');
/* END */

/* LOAD SCRIPTS AND STYLES IN ADMIN */
function load_scripts_in_admin() {
    $theme_uri = get_template_directory_uri();
    wp_register_style('admin_css', $theme_uri.'/css/admin/admin.css'); wp_enqueue_style('admin_css');
}
add_action( 'admin_enqueue_scripts', 'load_scripts_in_admin' );

/* LOAD SCRIPTS AND STYLES ON SITE */
function load_scripts_on_site() {
    $theme_uri = get_template_directory_uri();

    wp_enqueue_style('flexslider_css', $theme_uri.'/css/vendor/flexslider.css');
    wp_enqueue_style('jqueryui_css', $theme_uri.'/css/vendor/jquery-ui.min.css');
    if(is_post_type_archive('gallery')){
        wp_enqueue_style('fancybox_css', $theme_uri.'/css/vendor/jquery.fancybox.css');
    }
    if(is_page('cart')){
        wp_enqueue_style('datetimepicker_css', $theme_uri.'/css/jquery.datetimepicker.css');
    }
    wp_enqueue_style('style_css', $theme_uri.'/css/style.css');


    wp_enqueue_script('flexslider_js', $theme_uri.'/js/vendor/jquery.flexslider-min.js', array('jquery'), '2.6.0', true);
    wp_enqueue_script('jqueryui_js', $theme_uri.'/js/vendor/jquery-ui.min.js', array('jquery'), '1.11.4', true);
    if(is_post_type_archive('gallery')){
        wp_enqueue_script('fancybox_js', $theme_uri.'/js/vendor/jquery.fancybox.pack.js', array('jquery'), '2.1.5', true);
    }
    wp_enqueue_script('main_js', $theme_uri.'/js/main.js', array('jquery'), '1.11.4', true);

    if(is_page('cart')){
        wp_enqueue_script('inputmask_js', $theme_uri.'/js/inputmask.min.js', array('jquery'), '3.3.2', true);
        wp_enqueue_script('jqueryinputmask_js', $theme_uri.'/js/jquery.inputmask.min.js', array('jquery'), '3.3.2', true);
        wp_enqueue_script('parsley_js', $theme_uri.'/js/parsley.min.js', array('jquery'), '2.3.13', true);
        wp_enqueue_script('datetimepicker_js', $theme_uri.'/js/jquery.datetimepicker.full.min.js', array('jquery'), '2.4.9', true);
    }
    if(is_page('account')){
        wp_enqueue_script('inputmask_js', $theme_uri.'/js/inputmask.min.js', array('jquery'), '3.3.2', true);
        wp_enqueue_script('jqueryinputmask_js', $theme_uri.'/js/jquery.inputmask.min.js', array('jquery'), '3.3.2', true);
        wp_enqueue_script('parsley_js', $theme_uri.'/js/parsley.min.js', array('jquery'), '2.3.13', true);
    }
    if(is_post_type_archive('product') || is_post_type_archive('news') || is_post_type_archive('partners')){
        wp_enqueue_script('imagesloaded_js', $theme_uri.'/js/imagesloaded.pkgd.min.js', array('jquery'), '4.1.0', true);
    }
    if(is_singular('product') || is_singular('news')){
        wp_enqueue_script('share_js', '//yastatic.net/share2/share.js', array('jquery'), '1.0.0', true);
    }
    if(is_post_type_archive('gallery')){
        wp_enqueue_script('simplePagination_js', $theme_uri.'/js/jquery.simplePagination.js', array('jquery'), '1.6.0', true);
    }
}
add_action('wp_enqueue_scripts', 'load_scripts_on_site');

/* END */