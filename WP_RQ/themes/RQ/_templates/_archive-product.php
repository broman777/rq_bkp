<?php if (!defined('ABSPATH')){exit;} ?>

<?php
global $product;
$id = get_the_ID();
$title = get_the_title();
$permalink = get_the_permalink();

// price
$price = $product->get_price();

// images
$img = get_field('_thumbnail_id');

// characters
$buttle_volume = get_field('buttle_volume');
$pack_count = get_field('pack_count');
$hover_text = get_field('hover_text');
?>

<div class="item product_<?php echo $id; ?>">
    <?php if(is_array($img) && count($img)): ?>
        <div class="img" style="background-image: url('<?php echo $img['sizes']['600x0']; ?>');"></div>
    <?php endif; ?>

    <div class="short">
        <?php if($buttle_volume): ?>
            <span class="vol"><?php echo $buttle_volume; ?><?php echo __('L', 'RQ'); ?></span>
        <?php endif; ?>
        <?php if($pack_count): ?>
            <span class="qty"><?php echo $pack_count; ?> <?php echo __('pcs.', 'RQ'); ?> <?php echo __('in pack', 'RQ'); ?></span>
        <?php endif; ?>
    </div>

    <div class="info">
        <div class="cell">
            <div class="in">
                <p class="header"><?php echo $title; ?></p>

                <?php if($pack_count): ?>
                <div class="qty">
                    <?php echo $pack_count; ?> <?php echo __('pcs.', 'RQ'); ?> <?php echo __('in pack', 'RQ'); ?>
                    <?php if($hover_text): ?><div class="what">?<div class="hint"><p><?php echo $hover_text; ?></p></div></div><?php endif; ?>
                </div>
                <?php endif; ?>

                <?php if($price && $product->is_purchasable() && $product->is_in_stock()): ?>
                    <div class="price">
                        <span><?php echo __('price for', 'RQ'); ?> </span><a href="#qty" class="select chosen_count" data-product="<?php echo $id; ?>" data-count="<?php echo $pack_count; ?>" data-price="<?php echo $price; ?>" data-popup><?php echo $pack_count; ?></a><span><?php echo __('pcs.', 'RQ'); ?></span>
                        <span class="uah"><?php echo $pack_count * $price; ?> <?php echo get_woocommerce_currency_symbol(); ?></span>
                    </div>
                <?php endif; ?>

                <?php if($price && $product->is_purchasable() && $product->is_in_stock()): ?>
                <p><a href="javascript:void(0)" class="add ajax_buy_button" data-product="<?php echo $id; ?>"><?php echo __('Add to cart', 'RQ'); ?></a></p>
                <?php endif; ?>

                <a href="<?php echo $permalink; ?>" class="btn more"><?php echo __('Read more about water', 'RQ'); ?></a>
            </div>
        </div>
    </div>
</div>