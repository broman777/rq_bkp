<?php

/* WOOCOMMERCE */

// activating support
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// disable sidebar
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

// remove css and js
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
add_action( 'wp_enqueue_scripts', 'mgt_dequeue_stylesandscripts', 100 );
function mgt_dequeue_stylesandscripts() {
    wp_deregister_style('select2');
    //
    wp_deregister_script('chosen');
    wp_deregister_script('select2');
    wp_deregister_script('jquery-blockui');
    wp_deregister_script('jquery-payment');
    wp_deregister_script('jquery-cookie');
    wp_deregister_script('wc-credit-card-form');
    wp_deregister_script('wc-add-to-cart-variation');
    wp_deregister_script('wc-single-product');
    wp_deregister_script('wc-country-select');
    wp_deregister_script('wc-address-i18n');
    wp_deregister_script('wc-password-strength-meter');
    wp_deregister_script('wc-add-to-cart');
    wp_deregister_script('wc-checkout');
    wp_deregister_script('wc-add-payment-method');
    wp_deregister_script('wc-lost-password');
    wp_deregister_script('prettyPhoto');
    wp_deregister_script('prettyPhoto-init');
    wp_deregister_script('wc-geolocation');
    wp_deregister_script('woocommerce');
    wp_deregister_script('wc-cart-fragments');
}

// change currency symbol
add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);
function change_existing_currency_symbol( $currency_symbol, $currency ) {
    switch( $currency ) {
        case 'RUB': $currency_symbol = 'р.'; break;
    }
    return $currency_symbol;
}

// remove WP fields
add_action('admin_init', 'admin_init');
function admin_init(){
    remove_post_type_support('product', 'editor');
    remove_post_type_support('product', 'author');
    remove_post_type_support('product', 'excerpt');
    remove_post_type_support('product', 'comments');
    remove_post_type_support('product', 'revisions');
}

// remove WC fields
add_action('add_meta_boxes', 'remove_woocommerce_fields', 999);
function remove_woocommerce_fields() {
    remove_meta_box('postexcerpt', 'product', 'normal');
    remove_meta_box('postcustom', 'product', 'normal');
    remove_meta_box('product_catdiv', 'product', 'side' );
    remove_meta_box('tagsdiv-product_tag', 'product', 'side' );
}

// remove sku
add_filter( 'wc_product_sku_enabled', '__return_false' );

// remove tabs
add_filter('woocommerce_product_data_tabs', 'remove_tab', 10, 1);
function remove_tab($tabs){
    unset($tabs['shipping']);
    unset($tabs['attribute']);
    unset($tabs['variations']);
    unset($tabs['linked_product']); // сопутствующие
    unset($tabs['advanced']); // дополнительно
    return($tabs);
}

// columns in products list
add_filter( 'manage_edit-product_columns', 'my_edit_product_columns' ) ;
function my_edit_product_columns( $columns ) {
    unset( $columns['product_cat'] );
    unset( $columns['product_tag'] );
    unset( $columns['product_type'] );
    unset( $columns['featured'] );
    unset( $columns['date'] );
    $columns["stock"] = __( 'Stock', 'RQ' );
    $columns["pack"] = __( 'Pack', 'RQ' );
    $columns["date"] = __( 'Date', 'woocommerce' );
    return $columns;
}
add_action('manage_product_posts_custom_column', 'columns_content_only_product', 10, 2);
function columns_content_only_product($column_name, $post_ID) {
    if ($column_name == 'stock') {
        echo (get_field('pack_stock_status', $post_ID) ? '<mark class="instock">'.__( 'In stock', 'RQ' ).'</mark>' : '<mark class="outofstock">'.__( 'Out of stock', 'RQ' ).'</mark>');
    }elseif ($column_name == 'pack') {
        echo get_field('buttle_volume', $post_ID) . __( 'L', 'RQ' ) . ' x ' . get_field('pack_count', $post_ID) . __( 'pcs.', 'RQ' );
    }
}


/* END */