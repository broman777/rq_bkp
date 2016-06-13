<?php
/**
 * Additional Customer Details (plain)
 *
 * This is extra customer data which can be filtered by plugins. It outputs below the order item table.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/plain/email-addresses.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails/Plain
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

echo strtoupper( __( 'Customer details', 'woocommerce' ) ) . "\n\n";

if ( $order->billing_email ) :
    echo __( 'Email:', 'woocommerce' ). esc_html( $order->billing_email );
endif;
if ( $order->billing_phone ) :
    echo __( 'Telephone:', 'woocommerce' ). esc_html( $order->billing_phone );
endif;
$shipping_address = get_post_meta($order->id, '_billing_address_1', true); if($shipping_address):
    echo __( 'Shipping address', 'RQ' ). ': ' . $shipping_address;
endif;
$shipping_time = get_post_meta($order->id, '_billing_address_2', true); if($shipping_time):
    echo __( 'Shipping time', 'RQ' ). ': ' . $shipping_time;
endif;