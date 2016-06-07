<?php get_header(); ?>
<?php global $wp_query; ?>

<section id="news-page">
    <div id="top"<?php $news_bg = get_field('news_bg', 32); if(is_array($news_bg) && count($news_bg)): ?> style="background: url('<?php echo $news_bg['sizes']['large']; ?>') no-repeat 50% 50%;"<?php endif; ?>>
        <div class="box">
            <a href="<?php echo site_url(); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/ui/logo.png" alt='<?php echo get_bloginfo('name'); ?>'></a>
            <?php $news_title = get_field('news_title', 32); if($news_title): ?>
                <h1><?php echo $news_title; ?></h1>
            <?php endif; ?>
            <?php $news_text = get_field('news_text', 32); if($news_text): ?>
                <h2><?php echo $news_text; ?></h2>
            <?php endif; ?>
            <div class="hr"></div>
        </div>
        <?php $news_section = get_field('news_section', 32); if($news_section): ?>
            <div class="title"><span><?php echo $news_section; ?></span></div>
        <?php endif; ?>
    </div>

    <?php if(have_posts() ) : ?>
        <ul id="news-list" class="loading_of_ajax">
            <?php $n = 1; while (have_posts()) : the_post(); ?>
                <?php get_template_part('_templates/_archive-news'); ?>
            <?php $n++; endwhile; wp_reset_query(); ?>
        </ul>

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
                        'template' : '_templates/_archive-news'
                    },
                    type:'POST',
                    dataType: 'json',
                    beforeSend: function(){
                        block_load = true;
                    },
                    success:function(data){
                        if(data.success){
                            var $data = $(data.posts).filter("li").hide();
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