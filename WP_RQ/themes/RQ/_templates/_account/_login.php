<?php if (!defined('ABSPATH')){exit;} ?>

<div id="form">
    <form class="login" id="account-loginform" data-parsley-validate>
        <i class="head-img"></i>
        <p class="header">Вход</p>
        <div class="row">
            <input type="email" name="username" data-parsley-type="email" data-parsley-required="true" autocomplete="off">
            <span class="placeholder">Ваш email *</span>
        </div>
        <div class="row">
            <input type="password" name="password" data-parsley-required="true" autocomplete="off">
            <span class="placeholder">Пароль *</span>
        </div>

        <input name="rememberme" type="checkbox" id="rememberme" value="forever" checked>

        <button type="submit"><span>Готово</span></button>

        <a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>forgot/" class="fogot"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a><br>
        <a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>register/" class="reg">Зарегистрироваться</a>
    </form>
</div>