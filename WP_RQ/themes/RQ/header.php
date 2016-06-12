<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php wp_title(''); ?></title>
    <meta name="description" content='<?php echo get_seo('description'); ?>'>
    <meta name="viewport" content="user-scalable=0, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="loader"></div>

<!-- menu start -->
<div id="menu" class="hidden">
    <a href="javascript:void(0)" class="toggle"><span></span></a>
    <span class="menu"><?php echo __('Menu', 'RQ'); ?></span>

    <div class="line">
        <?php qtranxf_generateLanguageSelectCode('short'); ?>
        <a href="<?php echo get_the_permalink(156); ?>" class="login"><?php if(get_current_user_id()): echo get_field('account_section', 32); else: echo __('Login on site', 'RQ'); endif; ?></a>
    </div>

    <ul id="user">
        <li><a href="<?php echo get_the_permalink(155); ?>" class="cart" title="<?php echo get_the_title(155); ?>"></a></li>
        <li><a href="<?php echo get_the_permalink(156); ?>" class="user" title="<?php echo get_the_title(156); ?>"></a></li>
    </ul>

    <?php wp_nav_menu(array('theme_location' => 'main_menu', 'container' => 'ul', 'menu_class' => '', 'menu_id' => 'main-nav')); ?>

    <?php
    $fb_link_4 = get_field('fb_link_4', 90);
    $in_link_4 = get_field('in_link_4', 90);
    $vk_link_4 = get_field('vk_link_4', 90);
    $tw_link_4 = get_field('tw_link_4', 90);
    if($fb_link_4 || $in_link_4 || $vk_link_4 || $tw_link_4):
    ?>
    <ul class="soc">
        <?php if($fb_link_4): ?><li><a href="<?php echo $fb_link_4; ?>" class="fb" target="_blank"></a></li><?php endif; ?>
        <?php if($in_link_4): ?><li><a href="<?php echo $in_link_4; ?>" class="in" target="_blank"></a></li><?php endif; ?>
        <?php if($vk_link_4): ?><li><a href="<?php echo $vk_link_4; ?>" class="vk" target="_blank"></a></li><?php endif; ?>
        <?php if($tw_link_4): ?><li><a href="<?php echo $tw_link_4; ?>" class="tw" target="_blank"></a></li><?php endif; ?>
    </ul>
    <?php endif; ?>
</div>
<div id="fix"></div>
<!-- menu end -->