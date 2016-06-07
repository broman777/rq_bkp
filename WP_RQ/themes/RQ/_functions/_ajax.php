<?php

/* AJAX */

// NEED EDITING - JSON!!!
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

/* END */