<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<h2><?php _e( 'Customer Details', 'woocommerce' ); ?></h2>

<table class="shop_table customer_details">
	<?php if ( $order->billing_email ) : ?>
		<tr>
			<th><?php _e( 'Email:', 'woocommerce' ); ?></th>
			<td><?php echo esc_html( $order->billing_email ); ?></td>
		</tr>
	<?php endif; ?>

	<?php if ( $order->billing_phone ) : ?>
		<tr>
			<th><?php _e( 'Telephone:', 'woocommerce' ); ?></th>
			<td><?php echo esc_html( $order->billing_phone ); ?></td>
		</tr>
	<?php endif; ?>

	<?php $shipping_address = get_post_meta($order->id, '_billing_address_1', true); if($shipping_address): ?>
		<tr>
			<th><?php echo __( 'Shipping address', 'RQ' ); ?>:</th>
			<td><?php echo $shipping_address; ?></td>
		</tr>
	<?php endif; ?>

	<?php $shipping_time = get_post_meta($order->id, '_billing_address_2', true); if($shipping_time): ?>
		<tr>
			<th><?php echo __( 'Shipping time', 'RQ' ); ?>:</th>
			<td><?php echo $shipping_time; ?></td>
		</tr>
	<?php endif; ?>

	<?php do_action( 'woocommerce_order_details_after_customer_details', $order ); ?>
</table>


<h2><?php echo __( 'Payment details', 'RQ' ); ?></h2>

<table class="shop_table customer_details">
	<?php $_payment_method = get_post_meta($order->id, '_payment_method', true); if($_payment_method): ?>
		<tr>
			<th><?php echo __( 'Payment method', 'RQ' ); ?>:</th>
			<?php
			$translate = array('cod' => 'Cash', 'cheque' => 'Online');
			$available_gateways = WC()->payment_gateways->get_available_payment_gateways();
			foreach ( $available_gateways as $gateway ) :
				if($gateway->id==$_payment_method): ?>
					<td><?php if(get_bloginfo( 'language' )=='ru-RU'): echo $gateway->get_title(); else: echo $translate[$gateway->id]; endif; ?></td>
				<?php endif;
			endforeach;
			?>
		</tr>
	<?php endif; ?>

	<?php /*$_transaction_id = get_post_meta($order->id, '_transaction_id', true); if($_transaction_id): ?>
		<tr>
			<th><?php echo __( 'Payment status', 'RQ' ); ?>:</th>
			<td><?php echo $_transaction_id; ?></td>
		</tr>
	<?php endif;*/ ?>

	<?php do_action( 'woocommerce_order_details_after_customer_details', $order ); ?>
</table>