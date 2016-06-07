<?php if ( ! defined( 'ABSPATH' ) ) { exit; } get_header( 'shop' ); while ( have_posts() ) : the_post(); global $product; ?>

<section id="one-page">
    <div id="top"<?php $product_bg = get_field('product_bg', 32); if(is_array($product_bg) && count($product_bg)): ?> style="background: url('<?php echo $product_bg['sizes']['large']; ?>') no-repeat 50% 50%;"<?php endif; ?>>
        <div class="box">
            <a href="<?php echo site_url(); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/ui/logo.png" alt='<?php echo get_bloginfo('name'); ?>'></a>
            <div class="hr"></div>
        </div>
        <?php $product_section = get_field('product_section', 32); if($product_section): ?>
            <div class="title"><a href="/shop/" class="back"><?php echo __('To the catalog', 'RQ'); ?></a><span><?php echo $product_section; ?></span></div>
        <?php endif; ?>
    </div>

    <div id="product">
        <div class="box">
            <div class="left top-left">
                <div id="prod-slider">
                    <div class="short">
                        <span class="vol">0,8l</span>
                        <span class="qty">12 шт в упаковке</span>
                    </div>
                    <ul class="slides">
                        <li><img src="img/bottle.jpg" alt=""></li>
                        <li><img src="img/bottle.jpg" alt=""></li>
                    </ul>
                </div>
            </div>
            <div class="right top-right">
                <div class="order">
                    <p class="header">Минеральная вода RusseQuelle <br> 0,7 л (упаковка: стекло)</p>
                    <div class="qty">
                        12 шт. в упаковке
                        <div class="what">?
                            <div class="hint">
                                <p>В стандартной упаковке 12 стеклянных бутылок по 0,7 л</p>
                            </div>
                        </div>
                    </div>
                    <div class="price">
                        <span>цена за </span>
                        <a href="#qty" class="select" data-popup>12</a>
                        <span>шт</span>
                        <span class="uah">900 р.</span>
                    </div>
                    <ul class="btn-group">
                        <li><a href="#" class="add">Добавить в корзину</a></li>
                        <li><a href="#">Заказать обратный звонок</a></li>
                        <li><a href="#">Онлайн чат с менеджером</a></li>
                    </ul>
                    <a href="#terms" data-popup class="terms">условия оплаты и доставки</a>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="left">
                <div class="text">
                    <h3>Движение воды RusseQuelle происходит через пласты пород толщиной в несколько сотен метров.</h3>
                    <p>В основу концепции RusseQuelle заложен принцип абсолютной чистоты. Источник имеет историю более 500 лет и находится в уникальном месте России, городе Гороховец, входящем в Золотое Кольцо страны.</p>
                    <img src="img/prod_img1.jpg" alt="">
                    <h3>Движение воды RusseQuelle происходит через пласты пород толщиной несколько сотен метров.</h3>
                    <ol>
                        <li>Движение – это способ познавать мир вокруг, соединять одни явления с другими и открывать что-то новое.</li>
                        <li>Движение – это способ познавать мир вокруг, соединять одни явления с другими и открывать что-то новое.</li>
                        <li>Движение – это способ познавать мир вокруг, соединять одни явления с другими и открывать что-то новое.</li>
                    </ol>
                </div>
            </div>
            <div class="right">
                <div class="text">
                    <h3>RusseQuelle - лучшая <br>минеральная вода 2015 года</h3>
                    <img src="img/prod_img2.jpg" alt="">
                    <p>В наши дни технология производства заключается лишь в угольной фильтрации воды и абсолютной чистоте на линии розлива. Для обеспечения высокого качества <a href="products.html">продукции</a> мы используем только экологически чистое сырье немецкого и российского производства.</p>
                    <img src="img/prod_img3.jpg" alt="">
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div id="about">
        <!-- about start -->
        <div id="about-slider">
            <ul class="slides">
                <li>
                    <div class="bottle">
                        <div class="table">
                            <div class="cell">
                                <p>SI</p>
                                <span>Кремний: 5</span>
                                <div class="hint">
                                    <p>Кремний активизирует воду, меняет её структуру, выводит в осадок соединения тяжелых металлов, подавляет болезнетворную микрофлору. Кремень во много раз ускоряет окислительно-восстановительные реакции в воде, придавая ей целебные свойства.</p>
                                </div>
                            </div>
                            <div class="cell">
                                <p>CA</p>
                                <span>Кальций: 68</span>
                                <div class="hint">
                                    <p>Кремний активизирует воду, меняет её структуру, выводит в осадок соединения тяжелых металлов, подавляет болезнетворную микрофлору.</p>
                                </div>
                            </div>
                            <div class="cell">
                                <p>NA</p>
                                <span>Натрий: 10</span>
                            </div>
                            <div class="cell">
                                <p>K</p>
                                <span>Калий: 0,1</span>
                                <div class="hint">
                                    <p>Кремний активизирует воду, меняет её структуру, выводит в осадок соединения тяжелых металлов, подавляет болезнетворную микрофлору. Кремень во много раз ускоряет окислительно-восстановительные реакции в воде, придавая ей целебные свойства.</p>
                                </div>
                            </div>
                            <div class="cell">
                                <p>MG</p>
                                <span>Магний: 29</span>
                            </div>
                            <div class="cell">
                                <p>F</p>
                                <span>Фтор: 0,3</span>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <p class="text">*Анализ произведен Испытательной лабораторией минеральных вод Всероссийского научно-исследовательского института пивоваренной, безалкогольной и винодельческой промышленности Российской академии сельскохозяйственных наук.</p>
                </li>
                <li>
                    <div class="bottle">
                        <div class="table">
                            <div class="cell">
                                <p>SI</p>
                                <span>Кремний: 5</span>
                                <div class="hint">
                                    <p>Кремний активизирует воду, меняет её структуру, выводит в осадок соединения тяжелых металлов, подавляет болезнетворную микрофлору. Кремень во много раз ускоряет окислительно-восстановительные реакции в воде, придавая ей целебные свойства.</p>
                                </div>
                            </div>
                            <div class="cell">
                                <p>CA</p>
                                <span>Кальций: 68</span>
                                <div class="hint">
                                    <p>Кремний активизирует воду, меняет её структуру, выводит в осадок соединения тяжелых металлов, подавляет болезнетворную микрофлору. </p>
                                </div>
                            </div>
                            <div class="cell">
                                <p>NA</p>
                                <span>Натрий: 10</span>
                            </div>
                            <div class="cell">
                                <p>K</p>
                                <span>Калий: 0,1</span>
                                <div class="hint">
                                    <p>Кремний активизирует воду, меняет её структуру, выводит в осадок соединения тяжелых металлов, подавляет болезнетворную микрофлору. Кремень во много раз ускоряет окислительно-восстановительные реакции в воде, придавая ей целебные свойства.</p>
                                </div>
                            </div>
                            <div class="cell">
                                <p>MG</p>
                                <span>Магний: 29</span>
                            </div>
                            <div class="cell">
                                <p>F</p>
                                <span>Фтор: 0,3</span>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <p class="text">*Анализ произведен Испытательной лабораторией минеральных вод Всероссийского научно-исследовательского института пивоваренной, безалкогольной и винодельческой промышленности Российской академии сельскохозяйственных наук.</p>
                </li>
            </ul>
        </div>
        <!-- about end -->
    </div>

    <div class="bottom-line">
        <a href="/shop/" class="back"><?php echo __('To the catalog', 'RQ'); ?></a>
        <a href="#top" data-anchor class="top"><?php echo __('To the top', 'RQ'); ?></a>
        <div class="share">
            <span><?php echo __('Share', 'RQ'); ?>:</span>
            <div class="ya-share2" data-services="facebook,vkontakte,twitter" data-description="<?php echo $description; ?>"<?php if(is_array($main_img) && count($main_img)): ?> data-image="<?php echo $main_img['sizes']['large']; ?>"<?php endif; ?> data-lang="<?php echo __('[:ru]ru[:en]en[:]'); ?>" data-title="<?php echo $title; ?>" data-url="<?php echo get_the_permalink(); ?>" data-bare></div>
        </div>
    </div>

    <?php endwhile; get_footer( 'shop' ); ?>
</section>


-------------------------------




<?php
global $product;
$title = get_the_title();

// prices
$price = $product->get_price();

// images
$img = get_field('_thumbnail_id');
$gallery = get_field('_gallery');

// characters
$buttle_volume = get_field('buttle_volume');
$pack_count = get_field('pack_count');
?>

<div class="product">

    <?php echo $title; ?>
    <?php echo $price; ?> <?php echo get_woocommerce_currency_symbol(); ?>

    <?php if(is_array($img) && count($img)): ?>
        <img src='<?php echo $img['sizes']['600x0']; ?>' alt='<?php echo $title; ?>'>
    <?php endif; ?>

    <?php if(is_array($gallery) && count($gallery)): ?>
        <?php foreach($gallery as $img): ?>
            <img src='<?php echo $img['sizes']['600x0']; ?>' alt='<?php echo $title; ?>'>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if($buttle_volume): ?>
        <?php echo $buttle_volume; ?>
    <?php endif; ?>

    <?php if($pack_count): ?>
        <?php echo $pack_count; ?>
    <?php endif; ?>

</div>

<?php /* WRITE SCRIPTS HERE */ ?>
<script>
    $(document).ready(function(){
        $('#prod-slider').flexslider({
            animation: "slide",
            directionNav: false,
            controlNav: true
        });
        $('#about-slider').flexslider({
            animation: "slide",
            directionNav: false,
            controlNav: true
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('.menu-item-190').addClass('current-menu-item');
    });
</script>
<?php /* END */ ?>

</body>
</html>