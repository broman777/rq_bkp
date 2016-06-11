<?php if (!defined('ABSPATH')){exit;} ?>

<?php $section = wp_strip_all_tags(get_query_var('section'), true); if($section!='register'): ?>

	<div id="form">
		<form method="POST" class="login wc-auth-login" id="account-loginform" data-parsley-validate>
			<i class="head-img"></i>
			<p class="header"><?php echo __( 'Login', 'RQ' ); ?></p>

			<?php wc_print_notices(); ?>

			<?php do_action( 'woocommerce_login_form_start' ); ?>

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

			<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="fogot"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a><br>
			<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>register/" class="reg"><?php echo __( 'Register', 'RQ' ); ?></a>

			<?php do_action( 'woocommerce_login_form_end' ); ?>
		</form>
	</div>

<?php else: ?>

	<div id="form">
		<form method="POST" class="register" id="account-registerform" data-parsley-validate>
			<i class="head-img"></i>
			<p class="header"><?php _e( 'Register', 'woocommerce' ); ?></p>

			<?php wc_print_notices(); ?>

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<div class="row">
				<input type="email" name="email" id="reg_email"  value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" data-parsley-type="email" data-parsley-required="true" autocomplete="off">
				<span class="placeholder"><?php echo __( 'Your email', 'RQ' ); ?> *</span>
			</div>
			<div class="row">
				<input type="password" id="reg_password_empty" data-parsley-required="true" autocomplete="off">
				<span class="placeholder"><?php echo __( 'Password', 'RQ' ); ?> *</span>
			</div>
			<div class="row">
				<input type="password" name="password" id="reg_password" data-parsley-equalto="#reg_password_empty" data-parsley-required="true" autocomplete="off">
				<span class="placeholder"><?php echo __( 'Re-enter password', 'RQ' ); ?> *</span>
			</div>

			<!-- Spam Trap -->
			<div style="left: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>

			<?php do_action( 'woocommerce_register_form' ); ?>
			<?php do_action( 'register_form' ); ?>

			<?php wp_nonce_field( 'woocommerce-register' ); ?>
			<button type="submit" name="register"><span><?php esc_attr_e( 'Register', 'woocommerce' ); ?></span></button>

			<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>" class="reg"><?php echo __( 'Do you have account?', 'RQ' ); ?></a>

			<?php do_action( 'woocommerce_register_form_end' ); ?>
		</form>
	</div>

<?php endif; ?>