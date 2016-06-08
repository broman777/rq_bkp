<?php if (!defined('ABSPATH')){exit;} ?>

<?php $customer_id = get_current_user_id(); if(!$customer_id): ?>

<div id="form">
    <form class="register" id="account-registerform" data-parsley-validate>
        <i class="head-img"></i>
        <p class="header">Регистрация</p>
        <div class="row">
            <input type="text" data-parsley-required="true" autocomplete="off">
            <span class="placeholder">Представьтесь пожалуйста*</span>
        </div>
        <div class="row">
            <input type="email" data-parsley-type="email" data-parsley-required="true" autocomplete="off">
            <span class="placeholder">Ваш email*</span>
        </div>
        <div class="row">
            <input type="password" data-parsley-required="true" autocomplete="off">
            <span class="placeholder">Пароль*</span>
        </div>
        <button type="submit"><span>Готово</span></button>
        <a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>" class="reg">У вас уже есть аккаунт?</a>
    </form>
</div>

<?php endif; ?>