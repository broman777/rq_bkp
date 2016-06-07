<?php if ( ! defined( 'ABSPATH' ) ) { exit; } get_header( 'shop' ); ?>
<?php global $wp_query; ?>

<section id="products-page">
	<div id="top"<?php $product_bg = get_field('product_bg', 32); if(is_array($product_bg) && count($product_bg)): ?> style="background: url('<?php echo $product_bg['sizes']['large']; ?>') no-repeat 50% 50%;"<?php endif; ?>>
		<div class="box">
			<a href="<?php echo site_url(); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/ui/logo.png" alt='<?php echo get_bloginfo('name'); ?>'></a>
			<?php $product_title = get_field('product_title', 32); if($product_title): ?>
				<h1><?php echo $product_title; ?></h1>
			<?php endif; ?>
			<?php $product_text = get_field('product_text', 32); if($product_text): ?>
				<h2><?php echo $product_text; ?></h2>
			<?php endif; ?>
			<div class="hr"></div>
		</div>
		<?php $product_section = get_field('product_section', 32); if($product_section): ?>
			<div class="title"><span><?php echo $product_section; ?></span></div>
		<?php endif; ?>
	</div>

	<div id="products-list">
		<!-- product start -->
		<div class="item">
			<div class="img" style="background-image: url(img/bottle.jpg);"></div>
			<div class="short">
				<span class="vol">0,8l</span>
				<span class="qty">12 шт в упаковке</span>
			</div>
			<div class="info">
				<div class="cell">
					<div class="in">
						<p class="header">Минеральная вода RusseQuelle 0,7 л (упаковка: стекло)</p>
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
						<p><a href="#" class="add">Добавить в корзину</a></p>
						<a href="one.html" class="btn more">Подробнее о воде</a>
					</div>
				</div>
			</div>
		</div>
		<!-- product finish -->
		<!-- product start -->
		<div class="item">
			<div class="img" style="background-image: url(img/bottle.jpg);"></div>
			<div class="short">
				<span class="vol">0,8l</span>
				<span class="qty">12 шт в упаковке</span>
			</div>
			<div class="info">
				<div class="cell">
					<div class="in">
						<p class="header">Минеральная вода RusseQuelle 0,7 л (упаковка: стекло)</p>
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
						<p><a href="#" class="add">Добавить в корзину</a></p>
						<a href="one.html" class="btn more">Подробнее о воде</a>
					</div>
				</div>
			</div>
		</div>
		<!-- product finish -->
		<!-- product start -->
		<div class="item">
			<div class="img" style="background-image: url(img/bottle.jpg);"></div>
			<div class="short">
				<span class="vol">0,8l</span>
				<span class="qty">12 шт в упаковке</span>
			</div>
			<div class="info">
				<div class="cell">
					<div class="in">
						<p class="header">Минеральная вода RusseQuelle 0,7 л (упаковка: стекло)</p>
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
						<p><a href="#" class="add">Добавить в корзину</a></p>
						<a href="one.html" class="btn more">Подробнее о воде</a>
					</div>
				</div>
			</div>
		</div>
		<!-- product finish -->
		<!-- product start -->
		<div class="item">
			<div class="img" style="background-image: url(img/bottle.jpg);"></div>
			<div class="short">
				<span class="vol">0,8l</span>
				<span class="qty">12 шт в упаковке</span>
			</div>
			<div class="info">
				<div class="cell">
					<div class="in">
						<p class="header">Минеральная вода RusseQuelle 0,7 л (упаковка: стекло)</p>
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
						<p><a href="#" class="add">Добавить в корзину</a></p>
						<a href="one.html" class="btn more">Подробнее о воде</a>
					</div>
				</div>
			</div>
		</div>
		<!-- product finish -->
		<!-- product start -->
		<div class="item">
			<div class="img" style="background-image: url(img/bottle.jpg);"></div>
			<div class="short">
				<span class="vol">0,8l</span>
				<span class="qty">12 шт в упаковке</span>
			</div>
			<div class="info">
				<div class="cell">
					<div class="in">
						<p class="header">Минеральная вода RusseQuelle 0,7 л (упаковка: стекло)</p>
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
						<p><a href="#" class="add">Добавить в корзину</a></p>
						<a href="one.html" class="btn more">Подробнее о воде</a>
					</div>
				</div>
			</div>
		</div>
		<!-- product finish -->
		<!-- product start -->
		<div class="item">
			<div class="img" style="background-image: url(img/bottle.jpg);"></div>
			<div class="short">
				<span class="vol">0,8l</span>
				<span class="qty">12 шт в упаковке</span>
			</div>
			<div class="info">
				<div class="cell">
					<div class="in">
						<p class="header">Минеральная вода RusseQuelle 0,7 л (упаковка: стекло)</p>
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
						<p><a href="#" class="add">Добавить в корзину</a></p>
						<a href="one.html" class="btn more">Подробнее о воде</a>
					</div>
				</div>
			</div>
		</div>
		<!-- product finish -->
		<!-- product start -->
		<div class="item hidden">
			<div class="img" style="background-image: url(img/bottle.jpg);"></div>
			<div class="short">
				<span class="vol">0,8l</span>
				<span class="qty">12 шт в упаковке</span>
			</div>
			<div class="info">
				<div class="cell">
					<div class="in">
						<p class="header">Минеральная вода RusseQuelle 0,7 л (упаковка: стекло)</p>
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
						<p><a href="#" class="add">Добавить в корзину</a></p>
						<a href="one.html" class="btn more">Подробнее о воде</a>
					</div>
				</div>
			</div>
		</div>
		<!-- product finish -->
		<!-- product start -->
		<div class="item hidden">
			<div class="img" style="background-image: url(img/bottle.jpg);"></div>
			<div class="short">
				<span class="vol">0,8l</span>
				<span class="qty">12 шт в упаковке</span>
			</div>
			<div class="info">
				<div class="cell">
					<div class="in">
						<p class="header">Минеральная вода RusseQuelle 0,7 л (упаковка: стекло)</p>
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
						<p><a href="#" class="add">Добавить в корзину</a></p>
						<a href="one.html" class="btn more">Подробнее о воде</a>
					</div>
				</div>
			</div>
		</div>
		<!-- product finish -->
		<!-- product start -->
		<div class="item hidden">
			<div class="img" style="background-image: url(img/bottle.jpg);"></div>
			<div class="short">
				<span class="vol">0,8l</span>
				<span class="qty">12 шт в упаковке</span>
			</div>
			<div class="info">
				<div class="cell">
					<div class="in">
						<p class="header">Минеральная вода RusseQuelle 0,7 л (упаковка: стекло)</p>
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
						<p><a href="#" class="add">Добавить в корзину</a></p>
						<a href="one.html" class="btn more">Подробнее о воде</a>
					</div>
				</div>
			</div>
		</div>
		<!-- product finish -->
		<div class="clear"></div>
	</div>
	<a href="" class="link-next"><span>загрузить еще</span></a>

	<?php get_footer( 'shop' ); ?>
</section>


-------------------------------------

<?php $product_section = get_field('product_section', 32); if($product_section): ?>
	<?php echo $product_section; ?>
<?php endif; ?>
<?php $product_bg = get_field('product_bg', 32); if(is_array($product_bg) && count($product_bg)): ?>
	<?php echo $product_bg['sizes']['large']; ?>
<?php endif; ?>
<?php $product_title = get_field('product_title', 32); if($product_title): ?>
	<?php echo $product_title; ?>
<?php endif; ?>
<?php $product_text = get_field('product_text', 32); if($product_text): ?>
	<?php echo $product_text; ?>
<?php endif; ?>

<?php if(have_posts() ) : ?>

	<div class="loading_of_ajax">
		
		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part('_templates/_archive-product'); ?>
		<?php endwhile; wp_reset_query(); ?>

	</div>

	<?php if($wp_query->max_num_pages > 1): // if more than 1 page ?>
		<a href="javascript:void(0)" class="load_by_ajax"><?php echo __('Load more', 'RQ'); ?></a>
	<?php endif; ?>
	
<?php else: ?>
	<p><?php echo __('Nothing found.', 'RQ'); ?></p>
<?php endif; ?>



<?php /* WRITE SCRIPTS HERE */ ?>
<?php if($wp_query->max_num_pages > 1): ?>
	<script>
		var $container = $('.loading_of_ajax');
		var block_load = false;

		var query_vars = '<?php echo serialize($wp_query->query_vars); ?>';
		var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
		var max_num_pages = '<?php echo $wp_query->max_num_pages; ?>';

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
						'template' : '_templates/_archive-product'
					},
					type:'POST',
					dataType: 'json',
					beforeSend: function(){
						block_load = true;
					},
					success:function(data){
						if(data.success){
							var $data = $(data.posts).filter(".ajax_product");
							var imgLoad = imagesLoaded($data);
							imgLoad.on('always', function(){
								$container.append($data);
							});
							// hide load button if last page
							if(data.last_page){
								$('.load_by_ajax').hide();
							}
						}
					},
					complete:function(){
						// message
						ajax_message(false);
						//
						current_page++;
						block_load = false;
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