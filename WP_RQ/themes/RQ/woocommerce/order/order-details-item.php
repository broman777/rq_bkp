<?php if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! apply_filters( 'woocommerce_order_item_visible', true, $item ) ) {
	return;
}
?>
<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_order_item_class', 'order_item', $item, $order ) ); ?>">
	<th class="product-name">
		<?php echo get_the_title($item['product_id']); ?> x <?php echo $item['qty']; ?> <?php echo __('pcs.', 'RQ'); ?>
	</th>
	<td class="product-total">
		<?php echo $item['line_total']; ?> <?php echo get_woocommerce_currency_symbol(); ?>
	</td>
</tr>
