<?php get_header(); ?>

<?php
//
$customer_id = get_current_user_id();

// мин.суммы для заказа
$minimal_pay_sum = (int)get_field('minimal_pay_sum', 32);
$minimal_free_sum = (int)get_field('minimal_free_sum', 32);

// доставка
WC()->shipping->load_shipping_methods();
$delivery = WC()->shipping->get_shipping_methods();

// оплата
$available_gateways = WC()->payment_gateways->get_available_payment_gateways();

// success/fail URLs
$section = wp_strip_all_tags(get_query_var('section'), true);
?>

<section id="form-page">
    <div id="top"<?php $cart_bg = get_field('cart_bg', 32); if(is_array($cart_bg) && count($cart_bg)): ?> style="background-image: url('<?php echo $cart_bg['sizes']['large']; ?>');"<?php endif; ?>>
        <div class="box">
            <a href="<?php echo site_url(); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/ui/logo.png" alt='<?php echo get_bloginfo('name'); ?>'></a>
            <?php $cart_title = get_field('cart_title', 32); if($cart_title): ?>
                <h1><?php echo $cart_title; ?></h1>
            <?php endif; ?>
            <?php $cart_text = get_field('cart_text', 32); if($cart_text): ?>
                <h2><?php echo $cart_text; ?></h2>
            <?php endif; ?>
            <div class="hr"></div>
        </div>
        <?php $cart_section = get_field('cart_section', 32); if($cart_section): ?>
            <div class="title"><span><?php echo $cart_section; ?></span></div>
        <?php endif; ?>
    </div>

    <div id="cart-form">
        <form class="login" id="orderform" data-parsley-validate>

            <?php if($section=='success'): // успешная оплата ?>

                <p class="header"><?php echo __('Thanks! Payment is successful.', 'RQ'); ?></p>
                <a href="/shop/" class="go_to_shop"><?php echo __( 'History of orders', 'RQ' ); ?></a>

            <?php elseif($section=='fail'): // ошибка ?>

                <p class="header"><?php echo __('Sorry, payment isn\'t successful.', 'RQ'); ?></p>
                <a href="/shop/" class="go_to_shop"><?php echo __( 'History of orders', 'RQ' ); ?></a>

            <?php else: // корзина ?>

                <?php // CART // ?>
                <div class="ajax_loading_of_cart">
                    <?php get_template_part('_templates/_blocks/_minicart'); ?>
                </div>
                <?php // END // ?>

                <div class="ajax_order_form"<?php if ( WC()->cart->is_empty() || WC()->cart->cart_contents_total<$minimal_pay_sum) : // если корзина не пуста ?> style="display: none"<?php endif; ?>>
                    <div class="form-block">
                        <p class="header"><?php echo __('Customer', 'RQ'); ?>:</p>
                        <div class="row half"><input name="email" type="email" value="<?php echo ($customer_id ? get_userdata( $customer_id )->billing_email : ''); ?>" data-parsley-type="email" data-parsley-required="true" autocomplete="off"><span class="placeholder"><?php echo __( 'Your email', 'RQ' ); ?> *</span></div>
                        <div class="row half"><input name="phone" type="text" value="<?php echo ($customer_id ? get_userdata( $customer_id )->billing_phone : ''); ?>" id="phone-mask" data-parsley-required="true" autocomplete="off"><span class="placeholder"><?php echo __( 'Phone', 'RQ' ); ?> *</span></div>
                    </div>
                    <div class="form-block">
                        <p class="header"><?php echo __('Shipping details', 'RQ'); ?>:</p>
                        <div class="row half"><input name="address" type="text" value="<?php echo ($customer_id ? get_userdata( $customer_id )->billing_address_1 : ''); ?>" data-parsley-required="true" autocomplete="off"><span class="placeholder"><?php echo __( 'Shipping address', 'RQ' ); ?> *</span></div>
                        <div class="row half"><input name="time" type="text" id="time-mask" autocomplete="off"><span class="placeholder"><?php echo __( 'Shipping time', 'RQ' ); ?></span></div>
                    </div>

                    <?php if ($available_gateways): ?>
                        <?php
                        $translate = array('cod' => 'Cash', 'robokassa' => 'Online');
                        $translate_descriptions = array('cod' => 'Payment of the order in cash', 'robokassa' => 'Payment of the order online');
                        ?>
                        <div class="form-block">
                            <p class="header"><?php echo __('Payment method', 'RQ'); ?>:</p>
                            <?php $n = 1; foreach ( $available_gateways as $gateway ) : ?>
                                <div class="row half">
                                    <div class="checkbox">
                                        <input type="radio" value="<?php echo $gateway->id; ?>" name="pay"<?php if($n==1): ?> checked<?php endif; ?>><label><?php if(get_bloginfo( 'language' )=='ru-RU'): echo $gateway->get_title(); else: echo $translate[$gateway->id]; endif; ?></label>
                                        <?php $description = $gateway->get_description(); if($description): ?>
                                            <div class="what">?<div class="hint"><p><?php if(get_bloginfo( 'language' )=='ru-RU'): echo $description; else: echo $translate_descriptions[$gateway->id]; endif; ?></p></div></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php $n++; endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php wp_nonce_field( 'woocommerce-process_checkout' ); ?>

                    <button type="submit" class="place_order"><span><?php echo __('Send order', 'RQ'); ?></span></button>
                </div>

                <ul class="woocommerce-error minimal_sum_error"<?php if ( WC()->cart->is_empty() || WC()->cart->cart_contents_total>=$minimal_pay_sum ) : // если корзина не пуста ?> style="display: none"<?php endif; ?>>
                    <li style="text-align: center"><?php echo __('Minimal sum of order', 'RQ'); ?> - <?php echo $minimal_pay_sum; ?> <?php echo get_woocommerce_currency_symbol(); ?></li>
                </ul>

                <a href="/shop/" class="go_to_shop"<?php if ( ! WC()->cart->is_empty() && WC()->cart->cart_contents_total>=$minimal_pay_sum ) : // если корзина не пуста ?> style="display: none"<?php endif; ?>><?php echo __('To the catalog', 'RQ'); ?></a>

            <?php endif; ?>

            </form>
    </div>

    <?php // POPUPS // ?>
    <div id="pop-bg"></div>
    <div id="qty" class="popup">
        <a href="javascript:void(0)" class="close"></a>
        <p class="header"><?php echo __('Choose the number of bottles', 'RQ'); ?> <br> (<?php echo __('packed by', 'RQ'); ?> <span class="counted"></span> <?php echo __('pcs.', 'RQ'); ?>)</p>
        <div class="in">
            <ul class="qty-list"></ul>
        </div>
    </div>
    <?php // END // ?>

    <?php get_footer(); ?>
</section>

<?php /* WRITE SCRIPTS HERE */ ?>
<script>
    $(document).ready(function(){
        if($('div').is('#cart-form')) $('#top').addClass('cart-top');
        // date & time
        $.datetimepicker.setLocale('<?php echo __('[:ru]ru[:en]en[:]'); ?>');
        $("#time-mask").datetimepicker({
            timepicker:true,
            datepicker: true,
            scrollMonth: false,
            scrollTime: false,
            scrollInput: false,
            closeOnDateSelect: true,
            defaultSelect: false,
            allowBlank: true,
            format:'d.m.Y H:i'
            });
        // phone
        $('input#phone-mask').inputmask("(099) 999-9999", { "clearIncomplete": true });
    });
</script>

<script>
    // CHANGE QUANTITY/DELETING
    function change_quantity_in_cart(cart_item_key, quantity){
        // AJAX
        $.ajax({
            url: '<?php echo site_url() ?>/wp-admin/admin-ajax.php',
            type: 'POST',
            dataType: 'json',
            data: {
                'action': 'change_quantity_minicart',
                'cart_item_key': cart_item_key,
                'quantity': quantity
            },
            beforeSend: function () {
                $('.ajax_status').text('<?php echo __('Please wait', 'RQ'); ?>..');
            },
            success: function (data) {
                if(data.success){
                    var sum = parseInt(data.sum);
                    // прячем/показываем кнопку
                    if(sum){
                        if(sum>=<?php echo $minimal_pay_sum; ?>){
                            $('#orderform .ajax_order_form').show();
                            $('#orderform .go_to_shop, .minimal_sum_error').hide();
                        }else{
                            $('#orderform .ajax_order_form').hide();
                            $('#orderform .go_to_shop, .minimal_sum_error').show();
                        }
                    }else{ // если корзина пуста
                        $('#orderform .ajax_order_form, .minimal_sum_error').hide();
                        $('#orderform .go_to_shop').show();
                    }
                    // корзина
                    $('.ajax_loading_of_cart').html(data.minicart);
                }else{
                    alert('<?php echo __('Error, please refresh page.', 'RQ'); ?>');
                }
            },
            complete: function(){
                $('.ajax_status').text('<?php echo __('Your choice', 'RQ'); ?>');
            }
        });
    }

    // изменение кол-ства в корзине
    $(document).on('click', '.qty-list li', function(){
        //
        $(".qty-list li").removeClass('active');
        $(this).addClass('active');
        //
        var cart_item_key = $(this).data("product");
        var count = parseInt($(this).data("count"));
        if(cart_item_key && count){
            change_quantity_in_cart(cart_item_key, count);
        }else{
            alert('<?php echo __('Error, please refresh page.', 'RQ'); ?>');
        }
        //
        $('#pop-bg, .popup').removeClass('visible');
    });

    // удаление
    $(document).on('click', '.ajax_removing', function() {
        // ajax
        var quantity = 0;
        var cart_item_key = $(this).data('cart_item_key');
        if(cart_item_key){
            change_quantity_in_cart(cart_item_key, quantity);
        }else{
            alert('<?php echo __('Error, please refresh page.', 'RQ'); ?>');
        }
        return false;
    });
</script>

<script>
    // оформление заказа
    $(document).on('submit', '#orderform', function() {
        if($(this).parsley('validate')) {
            var email = $('input[name="email"]').val(),
                phone = $('input[name="phone"]').val(),
                address_1 = $('input[name="address"]').val(),
                time = $('input[name="time"]').val(),
                wpnonce = $('#_wpnonce').val(),
                payment = $('input[name="pay"]:checked').val();

            $.ajax({
                url: '/wp-admin/admin-ajax.php?action=custom_create_order',
                data: {
                    'billing_email': email,
                    'billing_phone': phone,
                    'billing_address_1': address_1,
                    'billing_address_2': time,
                    '_wpnonce': wpnonce,
                    'payment': payment
                },
                type: 'POST',
                dataType: 'json',
                beforeSend: function () {
                    //
                    $('#orderform .place_order').text('<?php echo __('Please wait', 'RQ') ?>');
                },
                success: function (data) {
                    if (data.error || !data.order_id) {
                        $('#orderform').html('<p class="header"><?php echo __('Unknown order error.', 'RQ'); ?></p>' + '<a href="/shop/" class="go_to_shop"><?php echo __('To the catalog', 'RQ'); ?></a>');
                    } else {
                        if (data.online && data.pay_form) {
                            $('#cart-form').html(data.pay_form);
                        } else {
                            $('#orderform').html('<p class="header"><?php echo __('Thanks for your order!', 'RQ'); ?></p>' + '<a href="/shop/" class="go_to_shop"><?php echo __('To the catalog', 'RQ'); ?></a>');
                        }
                    }
                },
                complete: function () {
                    setTimeout(function(){
                        if ($('#robokassa_payment_form').length) {
                            $('#robokassa_payment_form').trigger('submit');
                        }
                    }, 3000);
                    //
                    $('#orderform .place_order').text('<?php echo __('Send order', 'RQ') ?>');
                }
            });
        }
        return false;
    });
</script>
<?php /* END */ ?>

</body>
</html>