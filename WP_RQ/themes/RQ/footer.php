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

<!-- BEGIN JIVOSITE CODE -->
<script type='text/javascript'>
    (function(){ var widget_id = 'DQMXKWWvZc';var d=document;var w=window;function l(){var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
</script>
<!-- END JIVOSITE CODE -->

<!-- BEGIN CallbackKILLER CODE -->
<link rel="stylesheet" href="https://cdn.callbackkiller.com/widget/cbk.css">
<script type="text/javascript" src="https://cdn.callbackkiller.com/widget/cbk.js?wcb_code=b5964f2a1ca01760aafa0aa35ec10685" charset="UTF-8" async></script>
<!-- END CallbackKILLER CODE -->
<?php /* END */ ?>