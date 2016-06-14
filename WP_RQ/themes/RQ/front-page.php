<?php get_header(); ?>

<?php $bg_type_1 = get_field('bg_type_1'); ?>
<section id="first"<?php $bg_1 = get_field('bg_1'); if(is_array($bg_1) && count($bg_1)): ?> style="background-image: url('<?php echo $bg_1['sizes']['large']; ?>');"<?php endif; ?>>
    <?php $slogan_1 = get_field('slogan_1'); if($slogan_1): ?>
    <h1><?php echo $slogan_1; ?></h1>
    <?php endif; ?>

    <?php if($bg_type_1=='video'): ?>
        <?php $video_1_mp4 = get_field('video_1_mp4'); if($video_1_mp4): ?>
            <?php echo $video_1_mp4; ?>
        <?php endif; ?>
        <?php $video_1_webm = get_field('video_1_webm'); if($video_1_webm): ?>
            <?php echo $video_1_webm; ?>
        <?php endif; ?>
    <?php endif; ?>

    <a href="#news-slider" class="more" data-anchor="800"><span><?php echo __('Learn more', 'RQ'); ?></span></a>
</section>

<section id="index">
    <?php get_template_part('_templates/_blocks/_aside'); ?>
</section>

<div class="other">
    <?php $active_2 = get_field('active_2'); if($active_2): // NEWS ?>
        <?php
        $args = array(
            'post_type' => 'news',
            'post_status' => 'publish',
            'posts_per_page' => 3,
            'orderby' => 'date',
            'order' => 'DESC'
        );
        ?>
        <?php $query = new WP_Query($args); ?>
        <?php if($query->have_posts()): ?>
        <section id="news-slider" data-animate>
            <div class="title"><a href="<?php the_field('sectionlink_2'); ?>"></a><p><span><?php the_field('sign_2'); ?></span></p></div>
            <ul class="slides">
                <?php while($query->have_posts()): $query->the_post(); ?>
                    <?php get_template_part('_templates/_archive-news'); ?>
                <?php endwhile; ?>
            </ul>
        </section>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    <?php endif; ?>

    <?php $active_3 = get_field('active_3'); if($active_3): // ABOUT COMPANY ?>
    <section id="hist">
        <div class="title"><a href="<?php the_field('sectionlink_3'); ?>"></a><p><span><?php the_field('sign_3'); ?></span></p></div>
        <div class="box">
            <?php $title_3 = get_field('title_3'); if($title_3): ?>
            <h2><?php echo $title_3; ?></h2>
            <?php endif; ?>

            <div class="text">
                <?php $text_3_1 = get_field('text_3_1'); if($text_3_1): ?>
                <div class="col">
                    <p><?php echo $text_3_1; ?></p>
                </div>
                <?php endif; ?>
                <?php $text_3_2 = get_field('text_3_2'); if($text_3_2): ?>
                <div class="col">
                    <p><?php echo $text_3_2; ?></p>
                    <center><a href="/about/" class="btn"><?php echo __('Read more about company', 'RQ'); ?></a></center>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/img/hist.jpg" alt='<?php the_field('sign_3'); ?>'>
    </section>
    <?php endif; ?>

    <?php $active_4 = get_field('active_4'); if($active_4): // ABOUT WATER ?>
    <section id="about">
        <div class="title"><a href="<?php the_field('sectionlink_4'); ?>"></a><p><span><?php the_field('sign_4'); ?></span></p></div>
        <!-- about start -->
        <div id="about-slider">
            <?php $slides = get_field('slides'); if(is_array($slides) && count($slides)): ?>
            <ul class="slides">
                <?php foreach($slides as $slide): ?>
                <li>
                    <div class="bottle">
                        <?php if(is_array($slide['table']) && count($slide['table'])): ?>
                        <div class="table">
                            <?php foreach($slide['table'] as $col): ?>
                                <div class="cell">
                                    <?php if($col['title']): ?>
                                        <p><?php echo $col['title']; ?></p>
                                    <?php endif; ?>
                                    <?php if($col['subtitle']): ?>
                                        <span><?php echo $col['subtitle']; ?></span>
                                    <?php endif; ?>
                                    <?php if($col['hover_text']): ?>
                                    <div class="hint">
                                        <p><?php echo $col['hover_text']; ?></p>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php if($slide['text']): ?>
                        <p class="text"><?php echo $slide['text']; ?></p>
                    <?php endif; ?>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </div>
        <!-- about end -->
    </section>
    <?php endif; ?>

    <?php $blocks = get_field('blocks'); if(is_array($blocks) && count($blocks)): ?>
    <section id="banners">
        <ul class="banner-list">
            <?php foreach($blocks as $block): ?>
                <li data-animate>
                    <div class="title"><a href="<?php echo $block['sectionlink']; ?>"></a><p><span><?php echo $block['sign']; ?></span></p></div>
                    <div class="cell bg"<?php if(is_array($block['img']) && count($block['img'])): ?> style="background-image: url('<?php echo $block['img']['sizes']['650x390']; ?>');"<?php endif; ?>></div>
                    <div class="cell text">
                        <div class="tr">
                            <div class="td">
                                <?php if($block['title']): ?><p class="header"><?php echo $block['title']; ?></p><?php endif; ?>
                                <?php if($block['button']): ?><a href="<?php echo $block['link']; ?>" class="link btn"><?php echo $block['button']; ?></a><?php endif; ?>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <?php endif; ?>
</div>

<?php get_footer(); ?>

<?php /* WRITE SCRIPTS HERE */ ?>
<script type="text/javascript">
    $(document).ready(function(){
        <?php $active_2 = get_field('active_2'); if($active_2): // NEWS ?>
        $('#news-slider').flexslider({
            animation: "slide",
            directionNav: false,
            controlNav:true
        });
        <?php endif; ?>
        <?php $active_4 = get_field('active_4'); if($active_4): // ABOUT WATER ?>
        $('#about-slider').flexslider({
            animation: "slide",
            directionNav: false,
            controlNav:true
        });
        <?php endif; ?>
    });
</script>
<?php /* END */ ?>

</body>
</html>