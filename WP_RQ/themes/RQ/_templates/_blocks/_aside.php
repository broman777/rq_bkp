<!-- aside block start -->
<aside>
    <div class="content">
        <?php $right_slider = get_field('right_slider', 32); if(is_array($right_slider) && count($right_slider)): ?>
        <div id="aside-slider">
            <ul class="slides">
                <?php foreach($right_slider as $slide): ?>
                    <?php if(is_array($slide['img']) && count($slide['img'])): ?><li><img src="<?php echo $slide['img']['sizes']['600x0']; ?>" alt='<?php echo get_bloginfo('name'); ?>'></li><?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="hr"></div>
        <?php endif; ?>

        <ul class="btn-group">
            <li><a href="/shop/"><?php echo __('Order water delivery', 'RQ'); ?></a></li>
            <li><a href="#callbackwidget" class="trigger_callback"><?php echo __('Call back', 'RQ'); ?></a></li>
            <li><a href="javascript:void(0)" class="trigger_chat" onclick="jivo_api.open();"><?php echo __('Online chat with the manager', 'RQ'); ?></a></li>
        </ul>
    </div>
</aside>
<!-- aside block end -->