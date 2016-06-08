<?php

/* AJAX */

// AJAX LOADING OF ITEMS
add_action( 'wp_ajax_ajax_loading_of_items', 'ajax_loading_of_items' );
add_action( 'wp_ajax_nopriv_ajax_loading_of_items', 'ajax_loading_of_items' );
function ajax_loading_of_items() {
    global $wp_query;
    ob_start();
    //
    $args                = unserialize( stripslashes( $_POST['query'] ) );
    $args['paged']       = $_POST['page'] + 1;
    $args['post_status'] = 'publish';
    $wp_query            = new WP_Query( $args );
    if ( $wp_query->have_posts() ):
        while( $wp_query->have_posts() ): $wp_query->the_post();
            get_template_part( $_POST['template'] );
        endwhile;
        wp_reset_postdata();
    else:
        wp_send_json_error(); // {"success":false}
    endif;
    //
    $posts = ob_get_clean();
    echo json_encode( array(
        'success' => true,
        'posts'   => $posts
    ));
    exit();
}

// ADD TO CART
function add_to_minicart(){
    global $woocommerce;

    $product_id        = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $_POST['product_id'] ) );
    $quantity          = absint( $_POST['quantity'] );
    $passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity );
    $product_status    = get_post_status( $product_id );

    if ( $passed_validation && WC()->cart->add_to_cart( $product_id, $quantity ) && 'publish' === $product_status ) {
        do_action( 'woocommerce_ajax_added_to_cart', $product_id );
        // echo
        echo json_encode( array(
            'success' => true
        ));
    }else{
        wp_send_json_error(); // {"success":false}
    }
    exit();
}
add_action('wp_ajax_add_to_minicart', 'add_to_minicart');
add_action('wp_ajax_nopriv_add_to_minicart', 'add_to_minicart');

/* END */