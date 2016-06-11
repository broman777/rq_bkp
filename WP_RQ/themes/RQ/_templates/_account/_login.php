<?php if (!defined('ABSPATH')){exit;} ?>

<?php $customer_id = get_current_user_id(); if(!$customer_id): ?>

<div id="form">
    <form method="POST" class="login wc-auth-login" id="account-loginform" data-parsley-validate>
        <i class="head-img"></i>
        <p class="header"><?php echo __( 'Login', 'RQ' ); ?></p>

        <?php wc_print_notices(); ?>

        <div class="row">
            <input type="email" name="username" id="username"  value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" data-parsley-type="email" data-parsley-required="true" autocomplete="off">
            <span class="placeholder"><?php echo __( 'Your email', 'RQ' ); ?> *</span>
        </div>
        <div class="row">
            <input type="password" name="password" id="password" data-parsley-required="true" autocomplete="off">
            <span class="placeholder"><?php echo __( 'Password', 'RQ' ); ?> *</span>
        </div>

        <input name="rememberme" type="checkbox" id="rememberme" value="forever" checked>

        <?php wp_nonce_field( 'woocommerce-login' ); ?>
        <button type="submit" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"><span><?php echo __( 'Submit', 'RQ' ); ?></span></button>

        <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="fogot"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a><br>
        <a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>register/" class="reg"><?php echo __( 'Register', 'RQ' ); ?></a>
    </form>
</div>

<?php endif; ?>