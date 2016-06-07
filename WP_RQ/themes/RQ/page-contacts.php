<?php get_header(); ?>

<section id="contacts-page">
    <div id="top"<?php $contacts_bg = get_field('contacts_bg', 32); if(is_array($contacts_bg) && count($contacts_bg)): ?> style="background: url('<?php echo $contacts_bg['sizes']['large']; ?>') no-repeat 50% 50%;"<?php endif; ?>>
        <div class="box">
            <a href="<?php echo site_url(); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/ui/logo.png" alt='<?php echo get_bloginfo('name'); ?>'></a>
            <?php $contacts_title = get_field('contacts_title', 32); if($contacts_title): ?>
            <h1><?php echo $contacts_title; ?></h1>
            <?php endif; ?>
            <?php $contacts_text = get_field('contacts_text', 32); if($contacts_text): ?>
            <h2><?php echo $contacts_text; ?></h2>
            <?php endif; ?>
            <div class="hr"></div>
        </div>
        <div class="title"><span><?php echo get_the_title(); ?></span></div>
    </div>

    <ul id="cont-list">
        <?php $title_2 = get_field('title_2'); if($title_2): ?>
        <li>
            <div class="text">
                <div class="inner">
                    <i class="icon tel"></i>
                    <p class="header"><?php echo $title_2; ?></p>
                    <p><?php $phone_2 = get_field('phone_2'); if($phone_2): ?><?php echo __('Phone', 'RQ'); ?> <?php echo $phone_2; ?><br><?php endif; ?><?php $fax_2 = get_field('fax_2'); if($fax_2): ?><?php echo __('Fax', 'RQ'); ?> <?php echo $fax_2; ?><?php endif; ?></p>
                </div>
            </div>
        </li>
        <?php endif; ?>
        <?php $title_1 = get_field('title_1'); if($title_1): ?>
        <li>
            <div class="text">
                <div class="inner">
                    <i class="icon loc"></i>
                    <p class="header"><?php echo $title_1; ?></p>
                    <?php $address_1 = get_field('address_1'); if($address_1): ?><p><?php echo $address_1; ?></p><?php endif; ?>
                </div>
            </div>
        </li>
        <?php endif; ?>
        <?php $title_3 = get_field('title_3'); if($title_3): ?>
        <li>
            <div class="text">
                <div class="inner">
                    <i class="icon email"></i>
                    <p class="header"><?php echo $title_3; ?></p>
                    <?php $email_3 = get_field('email_3'); if($email_3): ?>
                    <p><?php echo $email_3; ?></p>
                    <a href="mailto:<?php echo $email_3; ?>" class="more btn"><?php echo __('Write us', 'RQ'); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </li>
        <?php endif; ?>
        <?php $title_4 = get_field('title_4'); if($title_4): ?>
        <li>
            <div class="text">
                <div class="inner">
                    <i class="icon soc"></i>
                    <p class="header"><?php echo $title_4; ?></p>
                    <ul class="soc">
                        <?php $fb_link_4 = get_field('fb_link_4'); if($fb_link_4): ?>
                            <li><a href="<?php echo $fb_link_4; ?>" class="fb" target="_blank"></a></li>
                        <?php endif; ?>
                        <?php $in_link_4 = get_field('in_link_4'); if($in_link_4): ?>
                            <li><a href="<?php echo $in_link_4; ?>" class="in" target="_blank"></a></li>
                        <?php endif; ?>
                        <?php $vk_link_4 = get_field('vk_link_4'); if($vk_link_4): ?>
                            <li><a href="<?php echo $vk_link_4; ?>" class="vk" target="_blank"></a></li>
                        <?php endif; ?>
                        <?php $tw_link_4 = get_field('tw_link_4'); if($tw_link_4): ?>
                            <li><a href="<?php echo $tw_link_4; ?>" class="tw" target="_blank"></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </li>
        <?php endif; ?>
    </ul>
    <div class="clear"></div>

    <?php get_template_part('_templates/_blocks/_aside'); ?>
</section>

<?php get_footer(); ?>

<?php /* WRITE SCRIPTS HERE */ ?>

<?php /* END */ ?>

</body>
</html>