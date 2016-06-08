<?php if (!defined('ABSPATH')){exit;} ?>

<div id="form">
    <form class="login" id="account-forgotform" data-parsley-validate>
        <i class="head-img"></i>
        <p class="header">Восстановление пароля</p>
        <div class="row">
            <input type="email" name="username" data-parsley-type="email" data-parsley-required="true" autocomplete="off">
            <span class="placeholder">Ваш email *</span>
        </div>
        <button type="submit"><span>Готово</span></button>
        <a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>" class="reg">Войти в аккаунт</a>
    </form>
</div>