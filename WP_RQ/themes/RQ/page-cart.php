<?php get_header(); ?>

<?php
// доставка
WC()->shipping->load_shipping_methods();
$delivery = WC()->shipping->get_shipping_methods();

// оплата
$available_gateways = WC()->payment_gateways->get_available_payment_gateways();
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
            
            <?php // CART // ?>
            <div class="ajax_loading_of_cart">
                <?php get_template_part('_templates/_blocks/_minicart'); ?>
            </div>
            <?php // END // ?>

            <?php if ( ! WC()->cart->is_empty() ) : // если корзина не пуста ?>

            <div class="ajax_order_form">
                <div class="form-block">
                    <p class="header">Получатель:</p>
                    <div class="row half"><input name="email" type="email" data-parsley-type="email" data-parsley-required="true" autocomplete="off"><span class="placeholder"><?php echo __( 'Your email', 'RQ' ); ?> *</span></div>
                    <div class="row half"><input name="phone" type="text" id="phone-mask" data-parsley-required="true" autocomplete="off"><span class="placeholder"><?php echo __( 'Phone', 'RQ' ); ?> *</span></div>
                </div>
                <div class="form-block">
                    <p class="header">Доставка:</p>
                    <div class="row half"><input name="address" type="text" data-parsley-required="true" autocomplete="off"><span class="placeholder"><?php echo __( 'Shipping address', 'RQ' ); ?> *</span></div>
                    <div class="row half"><input name="time" type="text" id="time-mask" autocomplete="off"><span class="placeholder"><?php echo __( 'Shipping time', 'RQ' ); ?></span></div>
                </div>

                <?php if ($available_gateways): $translate = array('cod' => 'Cash', 'cheque' => 'Online'); ?>
                    <div class="form-block">
                        <p class="header">Способ оплаты:</p>
                        <?php foreach ( $available_gateways as $gateway ) : ?>
                            <div class="row half">
                                <div class="checkbox">
                                    <input type="radio" value="<?php echo $gateway->id; ?>" name="pay" checked><label><?php if(get_bloginfo( 'language' )=='ru-RU'): echo $gateway->get_title(); else: echo $translate[$gateway->id]; endif; ?></label>
                                    <?php $description = $gateway->get_description(); if($description): ?>
                                    <div class="what">?<div class="hint"><p><?php echo $description; ?></p></div></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php wp_nonce_field( 'woocommerce-process_checkout' ); ?>

                <button type="submit" class="place_order"><span>Отправить заказ</span></button>
            </div>
            <?php endif; ?>

            <a href="/shop/" class="go_to_shop"<?php if ( ! WC()->cart->is_empty() ) : // если корзина не пуста ?> style="display: none"<?php endif; ?>>Перейти в каталог</a>
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
                    var counted = parseInt(data.count);
                    // прячем/показываем кнопку
                    if(counted){
                        $('#orderform .ajax_order_form').show();
                        $('#orderform .go_to_shop').hide();
                    }else{
                        $('#orderform .ajax_order_form').hide();
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
                /*delivery = ;*/
                payment = $('input[name="pay"]').val();

            $.ajax({
                url: '/wp-admin/admin-ajax.php?action=custom_create_order',
                data: {
                    'billing_email': email,
                    'billing_phone': phone,
                    'billing_address_1': address_1,
                    '_wpnonce': wpnonce,
                    /*'delivery': delivery,*/
                    'payment': payment
                },
                type: 'POST',
                dataType: 'json',
                beforeSend: function () {
                    //page_container.html('<div class="container"><p class="title" style="text-align: center; width: 100%"><?php echo __('[:ru]Подождите минутку, пожалуйста.[:ua]Почекайте хвильку, будь ласка.[:]'); ?></p></div>');
                },
                success: function (data) {
                    /*if (data.orderid) {
                        $('.cart_button span').addClass('_hidden').html('0');
                        if (data.online) {
                            page_container.html('<div class="container"><p class="title" style="text-align: center; width: 100%"><?php echo __('[:ru]Спасибо за заказ.[:ua]Дякуємо за замовлення.[:]'); ?></p><p style="width: 100%; font-size: 1.125em; color: #333; text-align: center;"><?php echo __('[:ru]Если перенаправление на страницу оплаты не произошло, кликните на кнопку ниже:[:ua]Якщо перенаправлення на сторінку оплати не відбулося, натисніть кнопку нижче:[:]'); ?></p><div id="liqpay_checkout">' + data.pay_form + '</div></div>');
                        } else {
                            page_container.html('<div class="container"><p class="title" style="text-align: center; width: 100%"><?php echo __('[:ru]Спасибо, Ваш заказ[:ua]Спасибі, Ваше замовлення[:]'); ?> №' + data.orderid + ' <?php echo __('[:ru]принят[:ua]прийнято[:]'); ?>. </p><p style="width: 100%; font-size: 1.125em; color: #333; text-align: center;"><?php echo __('[:ru]Статус заказа можно будет проверять в[:ua]Статус замовлення можна буде перевірити в[:]'); ?> <a href="/account/?show=history" style="color: #116cd6"><?php echo __('[:ru]Личном кабинете[:ua]Особистому кабінеті[:]'); ?>.</a></p></div>');
                        }

                        // GOOGLE GOALS
                        ga('send', 'event', 'checkout', 'buy');
                        // END
                    } else {
                        page_container.html('<div class="container"><p class="title" style="text-align: center; width: 100%"><?php echo __('[:ru]Ошибка при оформлении заказа.[:ua]Помилка при оформленні замовлення.[:]'); ?></p><p style="width: 100%; font-size: 1.125em; color: #333; text-align: center;"><?php echo __('[:ru]Попробуйте обновить страницу[:ua]Спробуйте оновити сторінку[:]'); ?></p></div>');
                    }*/
                },
                complete: function () {
                    /*var isset_form = $('#liqpay_checkout').find('form');
                    if (isset_form.length) {
                        $('#liqpay_checkout form').trigger('submit');
                    }*/
                }
            });
        }
        return false;
    });
</script>
<?php /* END */ ?>

</body>
</html>