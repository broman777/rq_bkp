<div id="pop-bg"></div>

<div id="qty" class="popup">
    <a href="javascript:void(0)" class="close"></a>
    <p class="header"><?php echo __('Choose the number of bottles', 'RQ'); ?> <br> (<?php echo __('packed by', 'RQ'); ?> <span class="counted"></span> <?php echo __('pcs.', 'RQ'); ?>)</p>
    <div class="in">
        <ul class="qty-list"></ul>
    </div>
</div>

<?php
$cart_terms_title = get_field('cart_terms_title', 32);
$cart_terms_text = get_field('cart_terms_text', 32);
if($cart_terms_title && $cart_terms_text): ?>
    <div id="terms" class="popup">
        <a href="javascript:void(0)" class="close"></a>
        <p class="header"><?php echo $cart_terms_title; ?></p>
        <div class="in">
            <div class="text">
                <p><?php echo $cart_terms_text; ?></p>
            </div>
        </div>
    </div>
<?php endif; ?>

<script>
    $(document).on('click', '.qty-list li', function(){
        //
        $(".qty-list li").removeClass('active');
        $(this).addClass('active');
        //
        var product = parseInt($(this).data("product"));
        var count = parseInt($(this).data("count"));
        var price = parseInt($(this).data("price"));
        if(product && count && price){
            $('.product_' + product + ' .chosen_count').text(count);
            $('.product_' + product + ' .price .uah').text(count*price + ' <?php echo get_woocommerce_currency_symbol(); ?>');
        }
        //
        $('#pop-bg, .popup').removeClass('visible');
    });
</script>

<script>
    // ADD TO CART
    $(document).on('click', '.ajax_buy_button', function(){
        var button = $(this);
        var product = parseInt($(this).data('product'));
        var count = parseInt($('.product_' + product + ' .chosen_count').text());
        if(product && count){
            $.ajax({
                url: '<?php echo site_url() ?>/wp-admin/admin-ajax.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    'action': 'add_to_minicart',
                    'quantity' : count,
                    'product_id': product
                },
                success: function(data){
                    // сообщение
                    if(data.success){
                        button.text('<?php echo __('Item was added to the cart', 'RQ'); ?>');
                    }else{
                        button.text('<?php echo __('Adding error', 'RQ'); ?>');
                    }
                },
                complete: function(){
                    setTimeout(function(){
                        button.text('<?php echo __('Add to cart', 'RQ'); ?>');
                    }, 5000);
                }
            });
        }else{
            // сообщение
            button.text('<?php echo __('Adding error', 'RQ'); ?>');
        }

        return false;
    });
</script>