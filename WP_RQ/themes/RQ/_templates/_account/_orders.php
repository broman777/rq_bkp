<?php if (!defined('ABSPATH')){exit;} ?>

<?php $customer_id = get_current_user_id(); if($customer_id): ?>

<div id="form">
    <form class="register" id="account-orders">
        <i class="head-img"></i>
        <p class="header">История заказов</p>

        <a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>edit/" class="reg">Изменить личные данные</a><br>
        <a href="<?php echo wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) ); ?>" class="fogot">Выйти из аккаунта</a>
    </form>
</div>

<?php endif; ?>