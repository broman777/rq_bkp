<?php if (!defined('ABSPATH')){exit;} ?>

<div id="form">
	<form class="register" id="account-orders">
		<i class="head-img"></i>
		<p class="header">Личные данные</p>

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
		<?php do_action( 'woocommerce_login_form' ); ?>

		<?php wp_nonce_field( 'woocommerce-login' ); ?>
		<button type="submit" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"><span><?php echo __( 'Submit', 'RQ' ); ?></span></button>

		<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>" class="reg"><?php echo __( 'History of orders', 'RQ' ); ?></a><br>
		<a href="<?php echo wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) ); ?>" class="fogot"><?php echo __( 'Log out', 'RQ' ); ?></a>
	</form>
</div>






-------------------------------------------------------

<?php wc_print_notices(); ?>

<form class="edit-account" action="" method="post">

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

	<p class="form-row form-row-first">
		<label for="account_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $user->first_name ); ?>" />
	</p>
	<p class="form-row form-row-last">
		<label for="account_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="account_last_name" id="account_last_name" value="<?php echo esc_attr( $user->last_name ); ?>" />
	</p>
	<div class="clear"></div>

	<p class="form-row form-row-wide">
		<label for="account_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="email" class="input-text" name="account_email" id="account_email" value="<?php echo esc_attr( $user->user_email ); ?>" />
	</p>

	<fieldset>
		<legend><?php _e( 'Password Change', 'woocommerce' ); ?></legend>

		<p class="form-row form-row-wide">
			<label for="password_current"><?php _e( 'Current Password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
			<input type="password" class="input-text" name="password_current" id="password_current" />
		</p>
		<p class="form-row form-row-wide">
			<label for="password_1"><?php _e( 'New Password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
			<input type="password" class="input-text" name="password_1" id="password_1" />
		</p>
		<p class="form-row form-row-wide">
			<label for="password_2"><?php _e( 'Confirm New Password', 'woocommerce' ); ?></label>
			<input type="password" class="input-text" name="password_2" id="password_2" />
		</p>
	</fieldset>
	<div class="clear"></div>

	<?php do_action( 'woocommerce_edit_account_form' ); ?>

	<p>
		<?php wp_nonce_field( 'save_account_details' ); ?>
		<input type="submit" class="button" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>" />
		<input type="hidden" name="action" value="save_account_details" />
	</p>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>

</form>
