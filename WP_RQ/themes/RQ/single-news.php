<?php get_header(); ?>

<?php
$title = get_the_title();

$day = get_the_time('d');
$month = get_the_time('F');
$year = get_the_time('Y');

$main_img = get_field('main_img');
$description = get_field('description');
?>

<section id="new-page">
    <div id="top"<?php $news_bg = get_field('news_bg', 32); if(is_array($news_bg) && count($news_bg)): ?> style="background: url('<?php echo $news_bg['sizes']['large']; ?>') no-repeat 50% 50%;"<?php endif; ?>>
        <div class="box">
            <a href="<?php echo site_url(); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/ui/logo.png" alt='<?php echo get_bloginfo('name'); ?>'></a>
            <div class="hr"></div>
        </div>
        <?php $news_section = get_field('news_section', 32); if($news_section): ?>
        <div class="title"><a href="/news/" class="back"><?php echo __('To the list of news', 'RQ'); ?></a><span><?php echo $news_section; ?></span></div>
        <?php endif; ?>
    </div>

    <div id="text">
        <div class="box">
            <h2><?php echo $title; ?></h2>

            <div class="preview">
                <div class="date">
                    <span class="day"><?php echo $day; ?></span>
                    <div class="month"><?php echo $month; ?> / <?php echo $year; ?></div>
                </div>
                <?php if(is_array($main_img) && count($main_img)): ?>
                    <img src='<?php echo $main_img['sizes']['large']; ?>' alt='<?php echo $title; ?>'>
                <?php endif; ?>
                <div class="share">
                    <span><?php echo __('Share', 'RQ'); ?>:</span>
                    <div class="ya-share2" data-services="facebook,vkontakte,twitter" data-description="<?php echo $description; ?>"<?php if(is_array($main_img) && count($main_img)): ?> data-image="<?php echo $main_img['sizes']['large']; ?>"<?php endif; ?> data-lang="<?php echo __('[:ru]ru[:en]en[:]'); ?>" data-title="<?php echo $title; ?>" data-url="<?php echo get_the_permalink(); ?>" data-bare></div>
                </div>
            </div>

            <?php // flexible content ?>
            <?php get_template_part('_templates/_blocks/_flexible-content'); ?>
        </div>
    </div>

    <div class="bottom-line">
        <a href="/news/" class="back"><?php echo __('To the list of news', 'RQ'); ?></a>
        <a href="#top" data-anchor class="top"><?php echo __('To the top', 'RQ'); ?></a>
        <div class="share">
            <span><?php echo __('Share', 'RQ'); ?>:</span>
            <div class="ya-share2" data-services="facebook,vkontakte,twitter" data-description="<?php echo $description; ?>"<?php if(is_array($main_img) && count($main_img)): ?> data-image="<?php echo $main_img['sizes']['large']; ?>"<?php endif; ?> data-lang="<?php echo __('[:ru]ru[:en]en[:]'); ?>" data-title="<?php echo $title; ?>" data-url="<?php echo get_the_permalink(); ?>" data-bare></div>
        </div>
    </div>

    <?php get_template_part('_templates/_blocks/_aside'); ?>
</section>

<?php get_footer(); ?>

<?php /* WRITE SCRIPTS HERE */ ?>
<script>
    $(document).ready(function(){
        $('.menu-item-194').addClass('current-menu-item');
    });
</script>
<?php /* END */ ?>

</body>
</html>