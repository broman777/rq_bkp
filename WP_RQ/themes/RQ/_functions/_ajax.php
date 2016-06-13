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

// shortcode for cart
function minicart() {
    ob_start();
    get_template_part( '_templates/_blocks/_minicart' );
    return ob_get_clean();
}
add_shortcode( 'minicart', 'minicart' );

// ADD TO CART
add_action('wp_ajax_add_to_minicart', 'add_to_minicart');
add_action('wp_ajax_nopriv_add_to_minicart', 'add_to_minicart');
function add_to_minicart(){
    $product_id        = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $_POST['product_id'] ) );
    $quantity          = empty( $_POST['quantity'] ) ? 1 : wc_stock_amount( $_POST['quantity'] );
    $passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity );
    $product_status    = get_post_status( $product_id );

    if ( $passed_validation && WC()->cart->add_to_cart( $product_id, $quantity ) && 'publish' === $product_status ) {
        do_action( 'woocommerce_set_cart_cookies', TRUE );
        do_action( 'woocommerce_ajax_added_to_cart', $product_id );
        // echo
        echo json_encode( array(
            'success' => true
        ));
    } else {
        wp_send_json_error(); // {"success":false}
    }
    exit();
}

// CHANGE QUANTITY IN CART AND DELETING
add_action('wp_ajax_change_quantity_minicart', 'change_quantity_minicart');
add_action('wp_ajax_nopriv_change_quantity_minicart', 'change_quantity_minicart');
function change_quantity_minicart(){
    ob_start();
    global $woocommerce;

    $cart_item_key = $_POST['cart_item_key'];
    $quantity = absint($_POST['quantity']);
    if($cart_item_key){
        WC()->cart->set_quantity($cart_item_key, $quantity);
        //
        echo json_encode( array(
            'success' => true,
            'count'=>$woocommerce->cart->cart_contents_count,
            'sum'=>$woocommerce->cart->cart_contents_total,
            'minicart'=>do_shortcode('[minicart]')
        ));
    }else{
        wp_send_json_error(); // {"success":false}
    }
    exit();
}

// CHECKOUT
function wp_custom_create_order(){
    // мин.суммы для заказа
    $minimal_pay_sum = (int)get_field('minimal_pay_sum', 32);
    $minimal_free_sum = (int)get_field('minimal_free_sum', 32);

    // проверка
    if(check_ajax_referer( 'woocommerce-process_checkout', false, false )){

        if(WC()->cart->cart_contents_total>=$minimal_pay_sum){

            $address = array(
                'email'      => wp_strip_all_tags($_POST['billing_email']),
                'phone'      => wp_strip_all_tags($_POST['billing_phone']),
                'address_1'  => wp_strip_all_tags($_POST['billing_address_1']),
                'address_2'  => wp_strip_all_tags($_POST['billing_address_2']),
                'country'    => 'UA'
            );
            $args = array(
                'status'        => 'processing',
                'customer_id'   => (int)get_current_user_id(),
                'customer_note' => $_POST['order_comment']
            );
            $order = wc_create_order($args);
            foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
                $item_id = $order->add_product(
                    $values['data'],
                    $values['quantity']
                );
                do_action( 'woocommerce_add_order_item_meta', $item_id, $values, $cart_item_key );
            }

            // address
            $order->set_address( $address, 'billing' );
            $order->set_address( $address, 'shipping' );

            // delivery
            WC()->shipping->load_shipping_methods();
            $delivery = WC()->shipping->get_shipping_methods();
            //
            if(WC()->cart->cart_contents_total>=$minimal_free_sum): // если бесплатная доставка
                $delivery_method_code = 'free_shipping';
            else: // если платная
                $delivery_method_code = 'local_delivery';
            endif;
            //
            foreach($delivery as $method):
                if($method->enabled=='yes'):
                    if($method->id==$delivery_method_code):
                        $delivery_method = new WC_Shipping_Rate($order->id, $method->title, $method->fee, array(), $method->id);
                        $order->add_shipping($delivery_method);
                        $order->calculate_shipping();
                    endif;
                endif;
            endforeach;

            // payment
            update_post_meta($order->id, '_transaction_id', 'Не оплачено');
            if($_POST['payment']):
                if ( $available_gateways = WC()->payment_gateways->get_available_payment_gateways() ) : foreach ( $available_gateways as $gateway ) :
                    if($gateway->id==$_POST['payment']):
                        $order->set_payment_method($gateway);
                    endif;
                endforeach; endif;
            endif;

            // total
            $order->calculate_totals();
            // status
            $order->update_status('processing');
            // empty cart
            WC()->cart->empty_cart(true);

            // SEND ADMIN EMAIL
            if(isset($order->id)){
                $WC_Emails = new WC_Emails();
                $WC_Email_New_Order = new WC_Email_New_Order();
                $WC_Email_New_Order->trigger($order->id);
            }

            // return
            $orderid = (isset($order->id) ? $order->id : '');
            $online = ($_POST['payment']=='cheque' ? true : false);
            $pay_form = '';
            if($online && $orderid){
                $init_LiqPay = new init_LiqPay();
                $pay_form = $init_LiqPay->get_link($orderid);
            }
            echo json_encode(array('error'=>false, 'order_id'=>$orderid, 'online'=>$online, 'pay_form'=>$pay_form));

        }else{

            // return
            echo json_encode(array('error'=>true));

        }

    }else{
        wp_send_json_error(); // {"success":false}
    }
    exit();
}
add_action('wp_ajax_custom_create_order', 'wp_custom_create_order');
add_action('wp_ajax_nopriv_custom_create_order', 'wp_custom_create_order');

// ACCOUNT UPDATE
function save_account_details() {
    check_ajax_referer( 'save_details', 'details_security' );

    // ACCOUNT INFO
    $user_id = (int)$_POST['user_id'];
    //
    $email = wp_strip_all_tags($_POST['email'], true);
    $phone = wp_strip_all_tags($_POST['phone'], true);
    $address = wp_strip_all_tags($_POST['address'], true);
    //
    $result = 'success';

    if($user_id && $email && $phone && $address){
        // емейл
        $satinize_email = sanitize_email($_POST['email']);
        $update_result = wp_update_user( array( 'ID' => $user_id, 'user_email' => $satinize_email ) );
        update_user_meta($user_id, 'billing_email', $satinize_email);
        // телефон
        update_user_meta($user_id, 'billing_phone', sanitize_text_field($phone));
        // адрес
        update_user_meta($user_id, 'billing_address_1', sanitize_text_field($_POST['address']));
        // check
        if ( is_wp_error( $update_result ) ) {
            $result = 'error';
        }
    }else{
        $result = 'error';
    }

    // PASSWORD
    $old_password = wp_strip_all_tags($_POST['old_password'], true);
    $password = wp_strip_all_tags($_POST['password'], true);

    if($user_id && $old_password && $password){
        $result = 'success';
        // проверяем старый пароль
        $user = get_user_by('id', $user_id);
        if($user){
            $check_old_pass = wp_check_password( $old_password, $user->data->user_pass, $user->ID );
            if($check_old_pass){
                // ставим новый
                $update_user = wp_update_user( array ( 'ID' => $user->ID, 'user_pass' => $password ) );
                if(is_wp_error( $update_user )){
                    $result = 'error';
                }
            }else{
                $result = 'error';
            }
        }else{
            $result = 'error';
        }
    }

    wp_redirect(wc_get_page_permalink( 'myaccount' ).'edit/?result='.$result); exit();
}
add_action('wp_ajax_save_account_details', 'save_account_details');

/* END */