<?php get_header(); ?>

<section id="first"<?php $bg_1 = get_field('bg_1'); if(is_array($bg_1) && count($bg_1)): ?> style="background-image: url('<?php echo $bg_1['sizes']['large']; ?>');"<?php endif; ?>>
    <?php $slogan_1 = get_field('slogan_1'); if($slogan_1): ?>
    <h1><?php echo $slogan_1; ?></h1>
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
            <?php $title_1 = get_field('title_1', 89); if($title_1): ?>
            <h2><?php echo $title_1; ?></h2>
            <?php endif; ?>

            <div class="text">
                <?php $text_1_1 = get_field('text_1_1', 89); if($text_1_1): ?>
                <div class="col">
                    <p><?php echo $text_1_1; ?></p>
                    <?php $img_1 = get_field('img_1', 89); if(is_array($img_1) && count($img_1)): ?>
                        <img src="<?php echo $img_1['sizes']['600x0']; ?>" alt='<?php the_field('sign_3'); ?>'>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php $text_1_2 = get_field('text_1_2', 89); if($text_1_2): ?>
                <div class="col">
                    <p><?php echo $text_1_2; ?></p>
                    <center><a href="/about/" class="btn"><?php echo __('Read more about company', 'RQ'); ?></a></center>
                </div>
                <?php endif; ?>
            </div>

            <?php $text_1_3 = get_field('text_1_3', 89); if($text_1_3): ?>
            <div class="text">
                <blockquote><?php echo $text_1_3; ?></blockquote>
            </div>
            <?php endif; ?>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/img/hist.jpg" alt='<?php the_field('sign_3'); ?>'>
    </section>
    <?php endif; ?>

    <?php $active_4 = get_field('active_4'); if($active_4): // ABOUT WATER ?>
    <section id="about">
        <div class="title"><a href="<?php the_field('sectionlink_4'); ?>"></a><p><span><?php the_field('sign_4'); ?></span></p></div>
        <!-- about start -->
        <div id="about-slider">
            <ul class="slides">
                <li>
                    <div class="bottle">
                        <div class="table">
                            <?php for($n = 1; $n<=6; $n++): ?>
                                <div class="cell">
                                    <?php $cell_title = get_field('cell_'.$n.'_title'); if($cell_title): ?>
                                        <p><?php echo $cell_title; ?></p>
                                    <?php endif; ?>
                                    <?php $cell_subtitle = get_field('cell_'.$n.'_subtitle'); if($cell_subtitle): ?>
                                        <span><?php echo $cell_subtitle; ?></span>
                                    <?php endif; ?>
                                    <?php $cell_hover = get_field('cell_'.$n.'_hover'); if($cell_hover): ?>
                                    <div class="hint">
                                        <p><?php echo $cell_hover; ?></p>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <?php $text_4 = get_field('text_4'); if($text_4): ?>
                        <p class="text"><?php echo $text_4; ?></p>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
        <!-- about end -->
    </section>
    <?php endif; ?>

    <section id="banners">
        <ul class="banner-list">
            <?php for($n = 5; $n<=7; $n++): ?>
                <?php $active = get_field('active_'.$n); if($active): ?>
                    <li data-animate>
                        <div class="title"><a href="<?php the_field('sectionlink_'.$n); ?>"></a><p><span><?php the_field('sign_'.$n); ?></span></p></div>
                        <div class="cell bg"<?php $img = get_field('img_'.$n); if(is_array($img) && count($img)): ?> style="background-image: url('<?php echo $img['sizes']['650x390']; ?>');"<?php endif; ?>></div>
                        <div class="cell text">
                            <div class="tr">
                                <div class="td">
                                    <?php $title = get_field('title_'.$n); if($title): ?><p class="header"><?php echo $title; ?></p><?php endif; ?>
                                    <?php $button = get_field('button_'.$n); if($button): ?><a href="<?php the_field('link_'.$n); ?>" class="link btn"><?php echo $button; ?></a><?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endif; ?>
            <?php endfor; ?>
        </ul>
    </section>
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