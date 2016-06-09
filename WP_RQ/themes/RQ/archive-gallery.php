<?php get_header(); ?>
<?php global $wp_query; ?>

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

        <?php if(have_posts() ) : ?>
        <ul class="list">
            <?php while (have_posts()) : the_post(); $type = get_field('type'); ?>
            <li<?php if($type==8): ?> class="video"<?php endif; ?>>
                <?php get_template_part('_templates/_archive-gallery'); ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/ui/4x3.png" alt="">
            </li>
            <?php endwhile; wp_reset_query(); ?>
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
            itemsOnPage: 1
        });
    });
</script>
<?php /* END */ ?>

</body>
</html>