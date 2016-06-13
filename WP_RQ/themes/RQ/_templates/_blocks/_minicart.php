<?php if (!defined('ABSPATH')){exit;} ?>

<?php
// мин.суммы для заказа
$minimal_pay_sum = (int)get_field('minimal_pay_sum', 32);
$minimal_free_sum = (int)get_field('minimal_free_sum', 32);
?>

<?php if ( ! WC()->cart->is_empty() ) : // если корзина не пуста ?>
    <p class="header ajax_status"><?php echo __('Your choice', 'RQ'); ?>:</p>
    <div class="table">
        <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ): ?>
            <?php
            $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
            $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
            ?>

            <?php
            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ):
                $product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );

                $title = get_the_title($product_id);
                $permalink = get_the_permalink($product_id);
                $img = get_field('_thumbnail_id', $product_id);
                $buttle_volume = get_field('buttle_volume', $product_id);
                $pack_count = get_field('pack_count', $product_id);
                $price = $_product->get_price();
                $subprice = $cart_item['line_total'];
                ?>

                <div class="tr <?php echo $cart_item_key; ?>">
                    <div class="td img">
                        <?php if(is_array($img) && count($img)): ?>
                            <img src="<?php echo $img['sizes']['600x0']; ?>" alt='<?php echo $title; ?>'>
                        <?php endif; ?>
                    </div>
                    <div class="td desc">
                        <p><?php echo $title; ?></p>
                    </div>
                    <div class="td count">
                        <?php if($price && $pack_count): ?>
                            <p><a href="#qty" class="select chosen_count" data-product="<?php echo $cart_item_key; ?>" data-count="<?php echo $pack_count; ?>" data-price="<?php echo $price; ?>" data-popup><?php echo $cart_item['quantity']; ?></a><span><?php echo __('pcs.', 'RQ'); ?></span></p>
                        <?php endif; ?>
                    </div>
                    <div class="td price">
                        <p><?php echo $subprice; ?> <?php echo get_woocommerce_currency_symbol(); ?></p>
                    </div>
                    <div class="td rem">
                        <a href="javascript:void(0)" class="remove ajax_removing" data-cart_item_key="<?php echo $cart_item_key; ?>"></a>
                    </div>
                </div>
                <?php
            endif;
            ?>
        <?php endforeach; ?>

        <?php $delivery_fee = 0; if(WC()->cart->cart_contents_total>=$minimal_pay_sum): ?>
            <?php
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
                    if($method->id==$delivery_method_code): ?>
                        <?php $delivery_fee = $method->fee; ?>
                        <div class="tr tfoot">
                            <div class="td colspan"><?php echo __('Shipping', 'RQ'); ?>
                                <?php
                                $cart_terms_text = get_field('cart_terms_text', 32);
                                if($cart_terms_text): ?>
                                    <div class="what">?<div class="hint"><p><?php echo $cart_terms_text; ?></p></div></div>
                                <?php endif; ?>
                            </div>
                            <div class="td colspan"><p class="del"><?php echo ($method->fee ? $method->fee .' '.  get_woocommerce_currency_symbol() : __('free', 'RQ') ); ?></p></div>
                        </div>
                    <?php endif;
                endif;
            endforeach;
            ?>
        <?php endif; ?>

        <div class="tr tfoot">
            <div class="td colspan"><?php echo __('Total', 'RQ'); ?>:</div>
            <div class="td colspan"><p class="summ"><?php echo WC()->cart->cart_contents_total + $delivery_fee; ?> <?php echo get_woocommerce_currency_symbol(); ?></p></div>
        </div>
    </div>
<?php else: // если корзина пуста ?>
    <p class="header"><?php echo __('No items in cart', 'RQ'); ?></p>
<?php endif; ?>