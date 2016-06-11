<?php if (!defined('ABSPATH')){exit;} ?>

<?php $customer_id = get_current_user_id(); if($customer_id): ?>

	<?php $section = wp_strip_all_tags(get_query_var('section'), true); if($section!='edit'): ?>

		<div id="form">
			<form class="register" id="account-orders" data-parsley-validate>
				<i class="head-img"></i>
				<p class="header"><?php echo __( 'History of orders', 'RQ' ); ?></p>

				<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>edit/" class="reg"><?php echo __( 'Edit personal information', 'RQ' ); ?></a><br>
				<a href="<?php echo wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) ); ?>" class="fogot"><?php echo __( 'Log out', 'RQ' ); ?></a>
			</form>
		</div>

	<?php else: ?>

		<div id="form">
			<form method="POST" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" class="register" id="account-edit" data-parsley-validate>
				<i class="head-img"></i>
				<p class="header"><?php echo __( 'Personal information', 'RQ' ); ?></p>

				<?php if(isset($_GET['result'])): // если есть сообщение ?>
					<ul class="woocommerce-error">
						<li><?php if(wp_strip_all_tags($_GET['result'])=='success'): ?><?php echo __( 'Update success', 'RQ' ); ?><?php elseif(wp_strip_all_tags($_GET['result'])=='error'): ?><?php echo __( 'Update error', 'RQ' ); ?><?php endif; ?></li>
					</ul>
				<?php endif; ?>

				<div class="row">
					<input type="email" name="email" id="email" value="<?php echo get_userdata( $customer_id )->user_email; ?>" data-parsley-type="email" data-parsley-required="true" autocomplete="off">
					<span class="placeholder"><?php echo __( 'Your email', 'RQ' ); ?> *</span>
				</div>
				<div class="row">
					<input name="phone" type="text" id="phone-mask" value="<?php echo get_userdata( $customer_id )->billing_phone; ?>" data-parsley-required="true" autocomplete="off">
					<span class="placeholder"><?php echo __( 'Phone', 'RQ' ); ?> *</span>
				</div>
				<div class="row">
					<input name="address" type="text" value="<?php echo get_userdata( $customer_id )->billing_address_1; ?>" data-parsley-required="true" autocomplete="off">
					<span class="placeholder"><?php echo __( 'Shipping address', 'RQ' ); ?> *</span>
				</div>

				<p class="header pass"><?php echo __( 'Password change', 'RQ' ); ?></p>

				<div class="row">
					<input type="password" name="old_password" id="old_password" autocomplete="off">
					<span class="placeholder"><?php echo __( 'Old password', 'RQ' ); ?></span>
				</div>
				<div class="row">
					<input type="password" name="password" id="reg_password_empty" autocomplete="off">
					<span class="placeholder"><?php echo __( 'Password', 'RQ' ); ?></span>
				</div>
				<div class="row">
					<input type="password" name="password_2" id="reg_password" data-parsley-equalto="#reg_password_empty" autocomplete="off">
					<span class="placeholder"><?php echo __( 'Re-enter password', 'RQ' ); ?></span>
				</div>

				<?php wp_nonce_field('save_details','details_security'); ?>
				<input type="hidden" name="action" value="save_account_details">
				<input type="hidden" name="user_id" value="<?php echo $customer_id ?>">

				<button type="submit" name="submit"><span><?php echo __( 'Submit', 'RQ' ); ?></span></button>

				<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>" class="reg"><?php echo __( 'History of orders', 'RQ' ); ?></a><br>
				<a href="<?php echo wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) ); ?>" class="fogot"><?php echo __( 'Log out', 'RQ' ); ?></a>
			</form>
		</div>

	<?php endif; ?>

<?php endif; ?>