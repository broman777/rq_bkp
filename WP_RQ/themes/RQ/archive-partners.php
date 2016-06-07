<?php get_header(); ?>
<?php global $wp_query; ?>

<section id="partners-page">
    <div id="top"<?php $partners_bg = get_field('partners_bg', 32); if(is_array($partners_bg) && count($partners_bg)): ?> style="background: url('<?php echo $partners_bg['sizes']['large']; ?>') no-repeat 50% 50%;"<?php endif; ?>>
        <div class="box">
            <a href="<?php echo site_url(); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/ui/logo.png" alt='<?php echo get_bloginfo('name'); ?>'></a>
            <?php $partners_title = get_field('partners_title', 32); if($partners_title): ?>
            <h1><?php echo $partners_title; ?></h1>
            <?php endif; ?>
            <?php $partners_text = get_field('partners_text', 32); if($partners_text): ?>
            <h2><?php echo $partners_text; ?></h2>
            <?php endif; ?>
            <div class="hr"></div>
        </div>
        <?php $partners_section = get_field('partners_section', 32); if($partners_section): ?>
        <div class="title"><span><?php echo $partners_section; ?></span></div>
        <?php endif; ?>
    </div>

    <?php if(have_posts() ) : ?>
        <div id="partners-list">
            <div class="loading_of_ajax">
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('_templates/_archive-partners'); ?>
                <?php endwhile; wp_reset_query(); ?>
            </div>
            <div class="clear"></div>
        </div>

        <?php if($wp_query->max_num_pages > 1): // if more than 1 page ?>
            <a href="javascript:void(0)" class="link-next load_by_ajax"><span><?php echo __('Load more', 'RQ'); ?></span></a>
        <?php endif; ?>
    <?php endif; ?>

    <?php get_template_part('_templates/_blocks/_aside'); ?>
</section>

<?php get_footer(); ?>

<?php /* WRITE SCRIPTS HERE */ ?>
<?php if($wp_query->max_num_pages > 1): ?>
<script>
    var $container = $('.loading_of_ajax');
    var block_load = false;

    var query_vars = '<?php echo serialize($wp_query->query_vars); ?>';
    var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
    var max_num_pages = <?php echo $wp_query->max_num_pages; ?>;

    $(document).on('click', '.load_by_ajax', function (){
        if(!block_load){
            // message
            ajax_message(true);
            // loading
            $.ajax({
                url:'<?php echo site_url() ?>/wp-admin/admin-ajax.php',
                data: {
                    'action': 'ajax_loading_of_items',
                    'query': query_vars,
                    'page' : current_page,
                    'template' : '_templates/_archive-partners'
                },
                type:'POST',
                dataType: 'json',
                beforeSend: function(){
                    block_load = true;
                },
                success:function(data){
                    if(data.success){
                        var $data = $(data.posts).filter(".item").hide();
                        var imgLoad = imagesLoaded($data);
                        imgLoad.on('always', function(){
                            $container.append($data.fadeIn(100));
                        });
                    }
                },
                complete:function(){
                    // increase page
                    current_page++;
                    // check if last page
                    if(current_page==max_num_pages){
                        $('.load_by_ajax').fadeOut(100);
                    }else{
                        // message
                        ajax_message(false);
                        // allow loading
                        block_load = false;
                    }
                }
            });
        }
        return false;
    });
</script>
<?php endif; ?>
<?php /* END */ ?>

</body>
</html>