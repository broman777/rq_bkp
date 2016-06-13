<?php
/**
 * Email Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-addresses.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<h2><?php _e( 'Customer details', 'woocommerce' ); ?></h2>

<ul>
	<?php if ( $order->billing_email ) : ?>
		<li>
			<strong><?php _e( 'Email:', 'woocommerce' ); ?></strong>
			<span class="text"><?php echo esc_html( $order->billing_email ); ?></span>
		</li>
	<?php endif; ?>

	<?php if ( $order->billing_phone ) : ?>
		<li>
			<strong><?php _e( 'Telephone:', 'woocommerce' ); ?></strong>
			<span class="text"><?php echo esc_html( $order->billing_phone ); ?></span>
		</li>
	<?php endif; ?>

	<?php $shipping_address = get_post_meta($order->id, '_billing_address_1', true); if($shipping_address): ?>
		<li>
			<strong><?php echo __( 'Shipping address', 'RQ' ); ?>:</strong>
			<span class="text"><?php echo $shipping_address; ?></span>
		</li>
	<?php endif; ?>

	<?php $shipping_time = get_post_meta($order->id, '_billing_address_2', true); if($shipping_time): ?>
		<li>
			<strong><?php echo __( 'Shipping time', 'RQ' ); ?>:</strong>
			<span class="text"><?php echo $shipping_time; ?></span>
		</li>
	<?php endif; ?>
</ul>