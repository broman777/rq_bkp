<?php if (!defined('ABSPATH')){exit;} ?>

<?php $customer_id = get_current_user_id(); if($customer_id): ?>

	<?php $section = wp_strip_all_tags(get_query_var('section'), true); if($section!='edit'): ?>

		<div id="form">
			<form class="register" id="account-orders" data-parsley-validate>
				<i class="head-img"></i>
				<p class="header"><?php echo __( 'History of orders', 'RQ' ); ?></p>

				<?php $my_orders_columns = apply_filters( 'woocommerce_my_account_my_orders_columns', array(
					'order-number'  => __( 'Order', 'woocommerce' ),
					'order-date'    => __( 'Date', 'woocommerce' ),
					'order-status'  => __( 'Status', 'woocommerce' ),
					'order-total'   => __( 'Total', 'woocommerce' ),
					'order-actions' => '&nbsp;',
				) );

				$customer_orders = get_posts( apply_filters( 'woocommerce_my_account_my_orders_query', array(
					'numberposts' => -1,
					'meta_key'    => '_customer_user',
					'meta_value'  => $customer_id,
					'post_type'   => wc_get_order_types( 'view-orders' ),
					'post_status' => array_keys( wc_get_order_statuses() )
				) ) );

				if ( $customer_orders ) : ?>

					<table class="shop_table shop_table_responsive my_account_orders">

						<thead>
						<tr>
							<?php foreach ( $my_orders_columns as $column_id => $column_name ) : ?>
								<th class="<?php echo esc_attr( $column_id ); ?>"><span class="nobr"><?php echo esc_html( $column_name ); ?></span></th>
							<?php endforeach; ?>
						</tr>
						</thead>

						<tbody>
						<?php foreach ( $customer_orders as $customer_order ) :
							$order      = wc_get_order( $customer_order );
							$item_count = $order->get_item_count();
							?>
							<tr class="order">
								<?php foreach ( $my_orders_columns as $column_id => $column_name ) : ?>
									<td class="<?php echo esc_attr( $column_id ); ?>">
										<?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
											<?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>

										<?php elseif ( 'order-number' === $column_id ) : ?>
											<a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
												<?php echo _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number(); ?>
											</a>

										<?php elseif ( 'order-date' === $column_id ) : ?>
											<time datetime="<?php echo date( 'Y-m-d', strtotime( $order->order_date ) ); ?>" title="<?php echo esc_attr( strtotime( $order->order_date ) ); ?>"><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></time>

										<?php elseif ( 'order-status' === $column_id ) : ?>
											<?php echo wc_get_order_status_name( $order->get_status() ); ?>

										<?php elseif ( 'order-total' === $column_id ) : ?>
											<?php echo sprintf( _n( '%s for %s item', '%s for %s items', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count ); ?>

										<?php elseif ( 'order-actions' === $column_id ) : ?>
											<?php
											$actions = array(
												'view'   => array(
													'url'  => $order->get_view_order_url(),
													'name' => __( 'View', 'woocommerce' )
												)
											);
											if ( $actions = apply_filters( 'woocommerce_my_account_my_orders_actions', $actions, $order ) ) {
												foreach ( $actions as $key => $action ) {
													echo '<a href="' . esc_url( $action['url'] ) . '" class="button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
												}
											}
											?>
										<?php endif; ?>
									</td>
								<?php endforeach; ?>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				<?php else: ?>
					<ul class="woocommerce-error">
						<li><?php echo __( 'You don\'t have orders yet.', 'RQ' ); ?></li>
					</ul>
				<?php endif; ?>

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
					<input type="email" name="email" id="email" value="<?php echo get_userdata( $customer_id )->billing_email; ?>" data-parsley-type="email" data-parsley-required="true" autocomplete="off">
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
					<span class="placeholder"><?php echo __( 'New password', 'RQ' ); ?></span>
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