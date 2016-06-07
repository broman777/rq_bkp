<?php if (!defined('ABSPATH')){exit;} ?>

<?php
global $product;
$title = get_the_title();
$permalink = get_the_permalink();

// price
$price = $product->get_price();

// images
$img = get_field('_thumbnail_id');

// characters
$buttle_volume = get_field('buttle_volume');
$pack_count = get_field('pack_count');
?>

<div class="item">
    <?php if(is_array($img) && count($img)): ?>
        <div class="img" style="background-image: url('<?php echo $img['sizes']['600x0']; ?>');"></div>
    <?php endif; ?>

    <div class="short">
        <?php if($buttle_volume): ?>
            <span class="vol"><?php echo $buttle_volume; ?><?php echo __('L', 'RQ'); ?></span>
        <?php endif; ?>
        <?php if($pack_count): ?>
            <span class="qty"><?php echo $pack_count; ?> <?php echo __('pcs.', 'RQ'); ?> в упаковке</span>
        <?php endif; ?>
    </div>

    <div class="info">
        <div class="cell">
            <div class="in">
                <p class="header"><?php echo $title; ?></p>
                
                <div class="qty">
                    12 шт. в упаковке
                    <div class="what">?<div class="hint"><p>В стандартной упаковке 12 стеклянных бутылок по 0,7 л</p></div></div>
                </div>

                <div class="price">
                    <span>цена за </span><a href="#qty" class="select" data-popup>12</a><span>шт</span>
                    <?php if($price && $product->is_purchasable() && $product->is_in_stock()): ?>
                    <span class="uah"><?php echo $price; ?> <?php echo get_woocommerce_currency_symbol(); ?></span>
                    <?php endif; ?>
                </div>

                <?php if($price && $product->is_purchasable() && $product->is_in_stock()): ?>
                <p><a href="javascript:void(0)" class="add">Добавить в корзину</a></p>
                <?php endif; ?>

                <a href="<?php echo $permalink; ?>" class="btn more">Подробнее о воде</a>
            </div>
        </div>
    </div>
</div>