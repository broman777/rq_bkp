<?php if (!defined('ABSPATH')){exit;} ?>

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
                $price = $cart_item['line_total'];
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
                        <p><?php echo $price; ?> <?php echo get_woocommerce_currency_symbol(); ?></p>
                    </div>
                    <div class="td rem">
                        <a href="javascript:void(0)" class="remove ajax_removing" data-cart_item_key="<?php echo $cart_item_key; ?>"></a>
                    </div>
                </div>
                <?php
            endif;
            ?>
        <?php endforeach; ?>

        <?php /*
        <div class="tr tfoot">
            <div class="td colspan">Доставка
                <div class="what">?
                    <div class="hint">
                        <p>В стандартной упаковке 12 стеклянных бутылок по 0,7 л</p>
                    </div>
                </div>
            </div>
            <div class="td colspan"><p class="del">100 р.</p></div>
        </div>
        */ ?>

        <div class="tr tfoot">
            <div class="td colspan"><?php echo __('Total', 'RQ'); ?>:</div>
            <div class="td colspan"><p class="summ"><?php echo WC()->cart->get_cart_total(); ?></p></div>
        </div>
    </div>
<?php else: // если корзина пуста ?>
    <p class="header"><?php echo __('No items in cart', 'RQ'); ?></p>
<?php endif; ?>