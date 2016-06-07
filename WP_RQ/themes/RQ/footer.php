<!-- footer start -->
<footer>
    <a href="<?php echo site_url(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/img/ui/logo.png" alt='<?php echo get_bloginfo('name'); ?>'>
    </a>
    <?php wp_nav_menu(array('theme_location' => 'main_menu', 'container' => 'ul', 'menu_class' => 'menu', 'menu_id' => 'footer-menu')); ?>
    <p class="copyright">© 2013-<?php echo date('Y'); ?> RusseQuelle</p>
</footer>
<!-- footer end -->

<?php wp_footer(); ?>

<?php /* WRITE SCRIPTS HERE */ ?>
<script>
    // ajax messages
    function ajax_message(wait){ // true or false
        var message_block = $('.load_by_ajax span');
        if(message_block.length){
            if(wait){
                message_block.text('<?php echo __('Please wait', 'RQ'); ?>');
            }else{
                message_block.text('<?php echo __('Load more', 'RQ'); ?>');
            }
        }
    }
</script>
<?php /* END */ ?>