<?php if (!defined('ABSPATH')){exit;} ?>

<?php $customer_id = get_current_user_id(); if($customer_id): ?>

	<div id="form">
		<form class="register" id="account-orders" data-parsley-validate>
			<i class="head-img"></i>
			<p class="header"><?php echo __( 'Order', 'RQ' ); ?> №<?php echo $order->get_order_number(); ?></p>

			<p class="order-info"><?php printf( __( 'Order #<mark class="order-number">%s</mark> was placed on <mark class="order-date">%s</mark> and is currently <mark class="order-status">%s</mark>.', 'woocommerce' ), $order->get_order_number(), date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ), wc_get_order_status_name( $order->get_status() ) ); ?></p>

			<?php do_action( 'woocommerce_view_order', $order_id ); ?>

			<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>" class="reg"><?php echo __( 'To the list of orders', 'RQ' ); ?></a><br>
			<a href="<?php echo wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) ); ?>" class="fogot"><?php echo __( 'Log out', 'RQ' ); ?></a>
		</form>
	</div>

<?php endif; ?>