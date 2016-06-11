<?php if (!defined('ABSPATH')){exit;} ?>

<div id="form">
	<form method="POST" class="login lost_reset_password" id="account-forgotform" data-parsley-validate>
		<i class="head-img"></i>
		<p class="header"><?php echo __( 'Password recovery', 'RQ' ); ?></p>

		<?php wc_print_notices(); ?>

		<?php if( 'lost_password' === $args['form'] ) : ?>

			<div class="row">
				<input type="email" name="user_login" id="user_login" data-parsley-type="email" data-parsley-required="true" autocomplete="off">
				<span class="placeholder"><?php echo __( 'Your email', 'RQ' ); ?> *</span>
			</div>

		<?php else : ?>

			<div class="row">
				<input type="password" name="password_1" id="password_1" data-parsley-required="true" autocomplete="off">
				<span class="placeholder"><?php _e( 'New password', 'woocommerce' ); ?> *</span>
			</div>

			<div class="row">
				<input type="password" name="password_2" id="password_2" data-parsley-equalto="#password_1" data-parsley-required="true" autocomplete="off">
				<span class="placeholder"><?php _e( 'Re-enter new password', 'woocommerce' ); ?> *</span>
			</div>

			<input type="hidden" name="reset_key" value="<?php echo isset( $args['key'] ) ? $args['key'] : ''; ?>" />
			<input type="hidden" name="reset_login" value="<?php echo isset( $args['login'] ) ? $args['login'] : ''; ?>" />

		<?php endif; ?>

		<?php do_action( 'woocommerce_lostpassword_form' ); ?>
		<?php wp_nonce_field( $args['form'] ); ?>

		<input type="hidden" name="wc_reset_password" value="true" />
		<button type="submit"><span><?php echo 'lost_password' === $args['form'] ? __( 'Reset Password', 'woocommerce' ) : __( 'Save', 'woocommerce' ); ?></span></button>

		<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>" class="reg"><?php echo __( 'Login into account', 'RQ' ); ?></a>
	</form>
</div>