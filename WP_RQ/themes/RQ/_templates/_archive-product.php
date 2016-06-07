<?php if (!defined('ABSPATH')){exit;} ?>

<?php
global $product;
$title = get_the_title();
$permalink = get_the_permalink();

// prices
$price = $product->get_price();

// images
$img = get_field('_thumbnail_id');
$gallery = get_field('_gallery');

// characters
$buttle_volume = get_field('buttle_volume');
$pack_count = get_field('pack_count');
?>

    <div class="ajax_product">

        <?php echo $title; ?>
        <?php echo $permalink; ?>
        <?php echo $price; ?> <?php echo get_woocommerce_currency_symbol(); ?>

        <?php if(is_array($img) && count($img)): ?>
            <img src='<?php echo $img['sizes']['600x0']; ?>' alt='<?php echo $title; ?>'>
        <?php endif; ?>

        <?php if(is_array($gallery) && count($gallery)): ?>
            <?php foreach($gallery as $img): ?>
                <img src='<?php echo $img['sizes']['600x0']; ?>' alt='<?php echo $title; ?>'>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if($buttle_volume): ?>
            <?php echo $buttle_volume; ?>
        <?php endif; ?>

        <?php if($pack_count): ?>
            <?php echo $pack_count; ?>
        <?php endif; ?>

    </div>