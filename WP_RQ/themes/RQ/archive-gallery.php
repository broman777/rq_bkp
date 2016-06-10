<?php get_header(); ?>
<?php global $wp_query; ?>
<?php $posts_per_page = 6; // кол-ство на странице ?>

<section id="gal-page">
    <div id="top"<?php $gallery_bg = get_field('gallery_bg', 32); if(is_array($gallery_bg) && count($gallery_bg)): ?> style="background: url('<?php echo $gallery_bg['sizes']['large']; ?>') no-repeat 50% 50%;"<?php endif; ?>>
        <div class="box">
            <a href="<?php echo site_url(); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/ui/logo.png" alt='<?php echo get_bloginfo('name'); ?>'></a>
            <?php $gallery_title = get_field('gallery_title', 32); if($gallery_title): ?>
                <h1><?php echo $gallery_title; ?></h1>
            <?php endif; ?>
            <?php $gallery_text = get_field('gallery_text', 32); if($gallery_text): ?>
                <h2><?php echo $gallery_text; ?></h2>
            <?php endif; ?>
            <div class="hr"></div>
        </div>
        <?php $gallery_section = get_field('gallery_section', 32); if($gallery_section): ?>
            <div class="title"><span><?php echo $gallery_section; ?></span></div>
        <?php endif; ?>
    </div>

    <div id="gal-list">
        <?php
        $current = get_query_var('type');
        $types = get_terms(
            array(
                'taxonomy' => 'type',
                'hierarchical' => false
            )
        ); ?>
        <?php if(is_array($types) && count($types)): ?>
        <ul class="types">
            <?php if(get_query_var('type')): ?>
                <li><a href="/gallery/">Все</a></li>
            <?php else: ?>
                <li class="active">Все</li>
            <?php endif; ?>

            <?php foreach ( $types as $type ): ?>
                <?php if(get_query_var('type')==$type->slug): ?>
                    <li class="active"><?php echo $type->name; ?></li>
                <?php else: ?>
                    <li><a href="/gallery/<?php echo $type->slug; ?>/"><?php echo $type->name; ?></a></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>

        <?php $arr_gallery = array(); if(have_posts() ) : // собираем массив ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php $arr_gallery[] = get_the_ID(); ?>
            <?php endwhile; wp_reset_query(); ?>
        <?php endif; ?>

        <?php $paged_arr = array(); if(count($arr_gallery)): // разбиваем его на страницы ?>
            <?php $paged_arr = array_chunk($arr_gallery, $posts_per_page); ?>
        <?php endif; ?>

        <?php if(is_array($paged_arr) && count($paged_arr)): // вывод ?>
        <ul class="list">
            <?php foreach($paged_arr as $p=>$ids): ?>
                <?php foreach($ids as $id): ?>
                    <?php
                    $type = get_field('type', $id);
                    $img = get_field('img', $id);
                    $video_code = get_field('video_code', $id);
                    ?>
                    <li class="page_<?php echo ($p+1); ?><?php if($type==8): ?> video<?php endif; ?><?php if($p): ?> hidden<?php endif; ?>">
                        <div class="bg"<?php if(is_array($img) && count($img)): ?> style="background-image:url('<?php echo $img['sizes']['430x320']; ?>')"<?php endif; ?>>
                            <?php if($type==8): // видео ?>
                                <?php if($video_code): ?><a href="http://www.youtube.com/v/<?php echo $video_code; ?>?fs=1&amp;autoplay=1" class="various fancybox.iframe"></a><?php endif; ?>
                            <?php elseif($type==7): // фото ?>
                                <?php if(is_array($img) && count($img)): ?><a href="<?php echo $img['sizes']['large']; ?>" class="fancy" rel="gal"></a><?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/ui/4x3.png" alt="">
                    </li>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>

        <div class="clear"></div>
    </div>

    <ul class="paging"></ul>

    <?php get_template_part('_templates/_blocks/_aside'); ?>
</section>

<?php get_footer(); ?>

<?php /* WRITE SCRIPTS HERE */ ?>
<script>
    $(document).ready(function(){
        $('.fancy').fancybox({
            helpers: {
                overlay: {
                    locked: false
                }
            }
        });
        $(".various").fancybox({
            maxWidth	: 800,
            maxHeight	: 600,
            fitToView	: false,
            width		: '70%',
            height		: '70%',
            autoSize	: false,
            closeClick	: false,
            openEffect	: 'elastic',
            closeEffect	: 'none',
            helpers: {
                overlay: {
                    locked: false
                }
            }
        });
    });
</script>

<script>
    // pagination
    $(function() {
        $('.paging').pagination({
            items: <?php echo $wp_query->post_count; ?>,
            itemsOnPage: <?php echo $posts_per_page; ?>,
            displayedPages: 5,
            edges: 1,
            cssStyle: '',
            onPageClick: function(pageNumber, event){
                $('.list li').each(function(){
                    $(this).hide();
                    if($(this).hasClass('page_' + pageNumber )){
                        $(this).fadeIn();
                    }
                });
                return false;
            }
        });
    });
</script>
<?php /* END */ ?>

</body>
</html>