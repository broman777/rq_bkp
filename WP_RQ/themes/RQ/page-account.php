<?php get_header(); ?>

<section id="form-page">
    <div id="top"<?php $account_bg = get_field('account_bg', 32); if(is_array($account_bg) && count($account_bg)): ?> style="background-image: url('<?php echo $account_bg['sizes']['large']; ?>');"<?php endif; ?>>
        <div class="box">
            <a href="<?php echo site_url(); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/ui/logo.png" alt='<?php echo get_bloginfo('name'); ?>'></a>
            <?php $account_title = get_field('account_title', 32); if($account_title): ?>
                <h1><?php echo $account_title; ?></h1>
            <?php endif; ?>
            <?php $account_text = get_field('account_text', 32); if($account_text): ?>
                <h2><?php echo $account_text; ?></h2>
            <?php endif; ?>
            <div class="hr"></div>
        </div>
        <?php $account_section = get_field('account_section', 32); if($account_section): ?>
            <div class="title"><span><?php echo $account_section; ?></span></div>
        <?php endif; ?>
    </div>

    <?php echo do_shortcode('[woocommerce_my_account]'); ?>

    <?php get_footer(); ?>
</section>

<?php /* WRITE SCRIPTS HERE */ ?>
<script>
    $(document).ready(function(){
        $('input#phone-mask').inputmask("(099) 999-9999", { "clearIncomplete": true }); // phone
    });
</script>
<?php /* END */ ?>

</body>
</html>