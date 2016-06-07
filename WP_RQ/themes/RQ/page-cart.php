<?php get_header(); ?>

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
        <form action="" class="login">
            <p class="header">Ваш выбор:</p>
            <div class="table">
                <div class="tr">
                    <div class="td img">
                        <img src="img/bottle.jpg" alt="">
                    </div>
                    <div class="td desc">
                        <p>Минеральная вода RusseQuelle 0,7 л (упаковка: стекло)</p>
                    </div>
                    <div class="td count">
                        <p><a href="#qty" class="select" data-popup>12</a><span>шт</span></p>
                    </div>
                    <div class="td price">
                        <p>900 р.</p>
                    </div>
                    <div class="td rem">
                        <a href="#" class="remove"></a>
                    </div>
                </div>
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
                <div class="tr tfoot">
                    <div class="td colspan">Итого:</div>
                    <div class="td colspan"><p class="summ">1000 р.</p></div>
                </div>
            </div>
            <div class="form-block">
                <p class="header">Получатель:</p>
                <div class="row half"><input type="text" required><span class="placeholder">Ваш email*</span></div>
                <div class="row half"><input type="password" required><span class="placeholder">Пароль*</span></div>
            </div>
            <div class="form-block">
                <p class="header">Доставка:</p>
                <div class="row half"><input type="text" required><span class="placeholder">Адрес доставки</span></div>
                <div class="row half"><input type="text" required><span class="placeholder">Время доставки</span></div>
            </div>
            <div class="form-block">
                <p class="header">Способ оплаты:</p>
                <div class="row half">
                    <div class="checkbox">
                        <input type="radio" name="pay" checked><label>Наличными</label>
                        <div class="what">?
                            <div class="hint">
                                <p>Оплата наличными при получении заказа</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row half">
                    <div class="checkbox">
                        <input type="radio" name="pay"><label>Онлайн</label>
                        <div class="what">?
                            <div class="hint">
                                <p>Оплата онлайн</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit"><span>Отправить заказ</span></button>
        </form>
    </div>

    <?php get_footer(); ?>
</section>

<?php /* WRITE SCRIPTS HERE */ ?>

<?php /* END */ ?>

</body>
</html>