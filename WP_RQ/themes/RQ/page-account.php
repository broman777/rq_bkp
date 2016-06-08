<?php $customer_id = get_current_user_id(); check_account_get($customer_id); ?>

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

    <?php if($customer_id): ?>

        <?php if(!get_query_var('section')): // orders ?>
            <?php get_template_part( '_templates/_account/_orders' ); ?>
        <?php elseif(get_query_var('section')=='edit'): // edit account details ?>
            <?php get_template_part( '_templates/_account/_edit' ); ?>
        <?php endif; ?>

    <?php else: ?>

        <?php if(!get_query_var('section')): // login form ?>
            <?php get_template_part( '_templates/_account/_login' ); ?>
        <?php elseif(get_query_var('section')=='forgot'): // forgot password ?>
            <?php get_template_part( '_templates/_account/_forgot' ); ?>
        <?php elseif(get_query_var('section')=='register'): // registering ?>
            <?php get_template_part( '_templates/_account/_register' ); ?>
        <?php endif; ?>

    <?php endif; ?>

    <?php get_footer(); ?>
</section>

<?php /* WRITE SCRIPTS HERE */ ?>
<?php if($customer_id): ?>

    <?php if(!get_query_var('section')): // orders ?>
        <script>

        </script>
    <?php elseif(get_query_var('section')=='edit'): // edit account details ?>
        <script>
            $(document).ready(function(){
                $('input#phone-mask').inputmask("(099) 999-9999", { "clearIncomplete": true }); // phone
            });
        </script>
    <?php endif; ?>

<?php else: ?>

    <?php if(!get_query_var('section')): // login form ?>
        <script>

        </script>
    <?php elseif(get_query_var('section')=='forgot'): // forgot password ?>
        <script>

        </script>
    <?php elseif(get_query_var('section')=='register'): // registering ?>
        <script>
            
        </script>
    <?php endif; ?>

<?php endif; ?>
<?php /* END */ ?>

</body>
</html>