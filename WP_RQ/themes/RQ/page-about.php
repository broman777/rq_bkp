<?php get_header(); ?>

<section id="about-page">
    <div id="top"<?php $about_bg = get_field('about_bg', 32); if(is_array($about_bg) && count($about_bg)): ?> style="background: url('<?php echo $about_bg['sizes']['large']; ?>') no-repeat 50% 50%;"<?php endif; ?>>
        <div class="box">
            <a href="<?php echo site_url(); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/ui/logo.png" alt='<?php echo get_bloginfo('name'); ?>'></a>
            <?php $about_title = get_field('about_title', 32); if($about_title): ?>
            <h1><?php echo $about_title; ?></h1>
            <?php endif; ?>
            <?php $about_text = get_field('about_text', 32); if($about_text): ?>
            <h2><?php echo $about_text; ?></h2>
            <?php endif; ?>
            <div class="hr"></div>
        </div>
        <div class="title"><span><?php echo get_the_title(); ?></span></div>
    </div>

    <?php $active_1 = get_field('active_1'); if($active_1): ?>
    <section id="hist">
        <div class="box">
            <?php $title_1 = get_field('title_1'); if($title_1): ?>
                <h2><?php echo $title_1; ?></h2>
            <?php endif; ?>
            <div class="text">
                <?php $text_1_1 = get_field('text_1_1'); if($text_1_1): ?>
                    <div class="col">
                        <p><?php echo $text_1_1; ?></p>
                        <?php $img_1 = get_field('img_1'); if(is_array($img_1) && count($img_1)): ?>
                            <img src="<?php echo $img_1['sizes']['600x0']; ?>" alt='<?php echo get_the_title(); ?>'>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php $text_1_2 = get_field('text_1_2'); if($text_1_2): ?>
                    <div class="col">
                        <p><?php echo $text_1_2; ?></p>
                    </div>
                <?php endif; ?>
            </div>
            <?php $text_1_3 = get_field('text_1_3'); if($text_1_3): ?>
                <div class="text">
                    <blockquote><?php echo $text_1_3; ?></blockquote>
                </div>
            <?php endif; ?>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/img/hist.jpg" alt='<?php echo get_the_title(); ?>'>
    </section>
    <?php endif; ?>

    <section id="sliders">
        <?php $active_2 = get_field('active_2'); if($active_2): ?>
        <div id="princ" class="slider">
            <?php $title_2 = get_field('title_2'); if($title_2): ?><p class="bg"><?php echo $title_2; ?></p><?php endif; ?>

            <?php $slider_2 = get_field('slider_2'); if(is_array($slider_2) && count($slider_2)): ?>
            <ul class="slides">
                <?php $n = 1; foreach($slider_2 as $slide): ?>
                    <li>
                        <span class="num"><?php echo $n; ?>.</span>
                        <h2><?php echo $slide['title']; ?></h2>
                        <?php if($slide['text']): ?>
                            <div class="text">
                                <p><?php echo $slide['text']; ?></p>
                            </div>
                        <?php endif; ?>
                    </li>
                <?php $n++; endforeach; ?>
            </ul>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php $active_3 = get_field('active_3'); if($active_3): ?>
        <div id="awards" class="slider" data-animate>
            <?php $title_3 = get_field('title_3'); if($title_3): ?>
                <p class="bg"><?php echo $title_3; ?></p>
            <?php endif; ?>

            <?php $slider_3 = get_field('slider_3'); if(is_array($slider_3) && count($slider_3)): ?>
            <ul class="slides">
                <?php foreach($slider_3 as $slide): ?>
                    <li>
                        <?php if(is_array($slide['bg']) && count($slide['bg'])): ?>
                            <img src="<?php echo $slide['bg']['sizes']['large']; ?>" alt='<?php echo $slide['title']; ?>' class="img">
                        <?php endif; ?>
                        <?php if(is_array($slide['logo']) && count($slide['logo'])): ?>
                            <img src="<?php echo $slide['logo']['sizes']['600x0']; ?>" alt='<?php echo $slide['title']; ?>'>
                        <?php endif; ?>
                        <h2><?php echo $slide['title']; ?></h2>
                        <?php if($slide['text']): ?>
                            <div class="text">
                                <p><?php echo $slide['text']; ?></p>
                            </div>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <div class="clear"></div>
        </div>
        <?php endif; ?>
        
        <?php get_template_part('_templates/_blocks/_aside'); ?>
    </section>
</section>

<?php get_footer(); ?>

<?php /* WRITE SCRIPTS HERE */ ?>
<script type="text/javascript">
    $(document).ready(function(){
        <?php $active_2 = get_field('active_2'); if($active_2): ?>
        $('#princ').flexslider({
            animation: "slide",
            directionNav: false,
            controlNav:true
        });
        <?php endif; ?>
        
        <?php $active_3 = get_field('active_3'); if($active_3): ?>
        $('#awards').flexslider({
            animation: "fade",
            directionNav: false,
            controlNav:true
        });
        <?php endif; ?>
    });
</script>
<?php /* END */ ?>

</body>
</html>