<?php if ( ! defined( 'ABSPATH' ) ) { exit; } get_header( 'shop' ); while ( have_posts() ) : the_post(); global $product; ?>

<?php
global $product;
$id = get_the_ID();
$title = get_the_title();

// prices
$price = $product->get_price();

// images
$img = get_field('_thumbnail_id');
$gallery = get_field('_gallery');

// characters
$buttle_volume = get_field('buttle_volume');
$pack_count = get_field('pack_count');
$hover_text = get_field('hover_text');
?>

<section id="one-page" class="product_<?php echo $id; ?>">
    <div id="top"<?php $product_bg = get_field('product_bg', 32); if(is_array($product_bg) && count($product_bg)): ?> style="background: url('<?php echo $product_bg['sizes']['large']; ?>') no-repeat 50% 50%;"<?php endif; ?>>
        <div class="box">
            <a href="<?php echo site_url(); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/ui/logo.png" alt='<?php echo get_bloginfo('name'); ?>'></a>
            <div class="hr"></div>
        </div>
        <?php $product_section = get_field('product_section', 32); if($product_section): ?>
            <div class="title"><a href="/shop/" class="back"><?php echo __('To the catalog', 'RQ'); ?></a><span><?php echo $product_section; ?></span></div>
        <?php endif; ?>
    </div>

    <div id="product">
        <div class="box">
            <div class="left top-left">
                <div id="prod-slider">
                    <div class="short">
                        <?php if($buttle_volume): ?>
                            <span class="vol"><?php echo $buttle_volume; ?><?php echo __('L', 'RQ'); ?></span>
                        <?php endif; ?>
                        <?php if($pack_count): ?>
                            <span class="qty"><?php echo $pack_count; ?> <?php echo __('pcs.', 'RQ'); ?> <?php echo __('in pack', 'RQ'); ?></span>
                        <?php endif; ?>
                    </div>

                    <?php if(is_array($img) && count($img)): ?>
                        <ul class="slides">
                            <li><img src="<?php echo $img['sizes']['600x0']; ?>" alt='<?php echo $title; ?>'></li>
                            <?php if(is_array($gallery) && count($gallery)): ?>
                                <?php foreach($gallery as $img): ?>
                                    <li><img src="<?php echo $img['sizes']['600x0']; ?>" alt='<?php echo $title; ?>'></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>

            <div class="right top-right">
                <div class="order">
                    <p class="header"><?php echo $title; ?></p>

                    <?php if($pack_count): ?>
                        <div class="qty">
                            <?php echo $pack_count; ?> <?php echo __('pcs.', 'RQ'); ?> <?php echo __('in pack', 'RQ'); ?>
                            <?php if($hover_text): ?><div class="what">?<div class="hint"><p><?php echo $hover_text; ?></p></div></div><?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if($price && $pack_count && $product->is_purchasable() && $product->is_in_stock()): ?>
                        <div class="price">
                            <span><?php echo __('price for', 'RQ'); ?> </span><a href="#qty" class="select chosen_count" data-product="<?php echo $id; ?>" data-count="<?php echo $pack_count; ?>" data-price="<?php echo $price; ?>" data-popup><?php echo $pack_count; ?></a><span><?php echo __('pcs.', 'RQ'); ?></span>
                            <span class="uah"><?php echo $pack_count * $price; ?> <?php echo get_woocommerce_currency_symbol(); ?></span>
                        </div>
                    <?php endif; ?>

                    <ul class="btn-group">
                        <?php if($price && $pack_count && $product->is_purchasable() && $product->is_in_stock()): ?>
                            <li><a href="javascript:void(0)" class="add ajax_buy_button" data-product="<?php echo $id; ?>"><?php echo __('Add to cart', 'RQ'); ?></a></li>
                        <?php endif; ?>
                        <li><a href="javascript:void(0)"><?php echo __('Call back', 'RQ'); ?></a></li>
                        <li><a href="javascript:void(0)"><?php echo __('Online chat with the manager', 'RQ'); ?></a></li>
                    </ul>

                    <?php
                    $cart_terms_title = get_field('cart_terms_title', 32);
                    $cart_terms_text = get_field('cart_terms_text', 32);
                    if($cart_terms_title && $cart_terms_text):
                    ?>
                    <a href="#terms" data-popup class="terms"><?php echo $cart_terms_title; ?></a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="clear"></div>

            <?php // flexible content ?>
            <?php get_template_part('_templates/_blocks/_flexible-content'); ?>
            
            <div class="clear"></div>
        </div>
    </div>

    <?php $active_4 = get_field('active_4', 8); if($active_4): // ABOUT WATER ?>
        <div id="about">
            <div id="about-slider">
                <ul class="slides">
                    <li>
                        <div class="bottle">
                            <div class="table">
                                <?php for($n = 1; $n<=6; $n++): ?>
                                    <div class="cell">
                                        <?php $cell_title = get_field('cell_'.$n.'_title', 8); if($cell_title): ?>
                                            <p><?php echo $cell_title; ?></p>
                                        <?php endif; ?>
                                        <?php $cell_subtitle = get_field('cell_'.$n.'_subtitle', 8); if($cell_subtitle): ?>
                                            <span><?php echo $cell_subtitle; ?></span>
                                        <?php endif; ?>
                                        <?php $cell_hover = get_field('cell_'.$n.'_hover', 8); if($cell_hover): ?>
                                            <div class="hint">
                                                <p><?php echo $cell_hover; ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <?php $text_4 = get_field('text_4', 8); if($text_4): ?>
                            <p class="text"><?php echo $text_4; ?></p>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    <?php endif; ?>

    <div class="bottom-line">
        <a href="/shop/" class="back"><?php echo __('To the catalog', 'RQ'); ?></a>
        <a href="#top" data-anchor class="top"><?php echo __('To the top', 'RQ'); ?></a>
        <div class="share">
            <span><?php echo __('Share', 'RQ'); ?>:</span>
            <div class="ya-share2" data-services="facebook,vkontakte,twitter" data-description="<?php echo __('price for', 'RQ'); ?> <?php echo $pack_count; ?> <?php echo __('pcs.', 'RQ'); ?>: <?php echo $pack_count * $price; ?> <?php echo get_woocommerce_currency_symbol(); ?>"<?php if(is_array($img) && count($img)): ?> data-image="<?php echo $img['sizes']['large']; ?>"<?php endif; ?> data-lang="<?php echo __('[:ru]ru[:en]en[:]'); ?>" data-title="<?php echo $title; ?>" data-url="<?php echo get_the_permalink(); ?>" data-bare></div>
        </div>
    </div>

    <?php endwhile; get_footer( 'shop' ); ?>

    <?php // POPUPS // ?>
    <?php get_template_part('_templates/_blocks/_popups'); ?>
    <?php // END // ?>
</section>

<?php /* WRITE SCRIPTS HERE */ ?>
<script>
    $(document).ready(function(){
        $('#prod-slider').flexslider({
            animation: "slide",
            directionNav: false,
            controlNav: true
        });

        <?php $active_4 = get_field('active_4', 8); if($active_4): // ABOUT WATER ?>
        $('#about-slider').flexslider({
            animation: "slide",
            directionNav: false,
            controlNav: true
        });
        <?php endif; ?>
    });
</script>

<script>
    $(document).ready(function(){
        $('.menu-item-190').addClass('current-menu-item');
    });
</script>
<?php /* END */ ?>

</body>
</html>