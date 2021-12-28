<?php get_header(); ?>

<?php get_template_part('template-parts/header-index-section');?>

<main class="page">

<section id="slider-main" class="slider-main">
	<div class="slider-bg-wrap">
		<div class="slider-bg _swiper">
		<?
		$pict = carbon_get_theme_option('slider_index');
		if ($pict) {
			$pictIndex = 0;
			foreach ($pict as $item) { 
		?>
			<div class="slider-bg__slide slider__slide slider-main__slide" style="background-image: url(<?php echo wp_get_attachment_image_src($item['slider_img'], 'full')[0]; ?>);">
				<!-- <div class="nuar_blk"></div> -->
				<div class="slider-bg__container _container">
					<h1 class="slider-bg__title"><? echo $item['slider_title']; ?>
						<span>
						<? echo $item['slider_subtitle']; ?>
						</span>
					</h1>
				</div>
			</div>
		<?
				$pictIndex++;
			}
		}
		?>
		</div>
		<div class="slider-bg__swiper-button-block swiper-button-block">
			<!-- <div class="_container"> -->
			<div class="swiper-button swiper-button-next slider-main-next"></div>
			<div class="swiper-button swiper-button-prev slider-main-prev"></div>
			<!-- </div> -->
		</div>
	</div>
</section>


<section id="products-sec" class="products-sec">
	<div class="_container">
		<h2 class="products-sec__title">Продукция</h2>
		<div class="products-sec__row">
			<?
				$categories = get_categories( [ 
					'child_of'     => 3,
					'orderby'      => 'meta_value_num',
					'meta_key'		=> '_term_index',
					'order'        => 'ASC',
					'hide_empty'   => 0,
				]);

				foreach( $categories as $cat ){
					get_template_part('template-parts/main', 'catalog-element', ["cat" => $cat]);
				}
			?>

			<!-- <div class="products-sec__column">
				<div class="products-sec__card">
					<div class="products-sec__card-img">
						<picture>
							<source srcset="<?php echo get_template_directory_uri();?>/img/products/01.webp" type="image/webp">
							<img src="<?php echo get_template_directory_uri();?>/img/products/01.jpg?_v=1639983180738" alt="">
						</picture>
					</div>
					<div class="products-sec__card-descp">
						<h4 class="products-sec__card-descp-title">
							Резинотканевые <br>
							конвейерные ленты
						</h4>
						<ul class="products-sec__card-descp-list">
							<li class="products-sec__card-descp-list-item">Антистатические ленты</li>
							<li class="products-sec__card-descp-list-item">Износостойкие ленты</li>
							<li class="products-sec__card-descp-list-item">Ленты общего назначения</li>
						</ul>
					</div>
					<div class="products-sec__card-btn">
						<a href="#callback" class="products-sec__card-btn-link _popup-link btn">Заказать звонок</a>
					</div>
				</div>
			</div>

			<div class="products-sec__column">
				<div class="products-sec__card">
					<div class="products-sec__card-img">
						<picture><source srcset="<?php echo get_template_directory_uri();?>/img/products/02.webp" type="image/webp"><img src="<?php echo get_template_directory_uri();?>/img/products/02.jpg?_v=1639983180738" alt=""></picture>
					</div>
					<div class="products-sec__card-descp">
						<h4 class="products-sec__card-descp-title">
							Конвейерные ленты <br>
							Habosit
						</h4>
						<ul class="products-sec__card-descp-list">
							<li class="products-sec__card-descp-list-item">Резинотканевые ленты</li>
							<li class="products-sec__card-descp-list-item">Ленты ПВХ, PU</li>
						</ul>
					</div>
					<div class="products-sec__card-btn">
						<a href="#callback" class="products-sec__card-btn-link _popup-link btn">Заказать звонок</a>
					</div>
				</div>
			</div>

			<div class="products-sec__column">
				<div class="products-sec__card">
					<div class="products-sec__card-img">
						<picture><source srcset="<?php echo get_template_directory_uri();?>/img/products/03.webp" type="image/webp"><img src="<?php echo get_template_directory_uri();?>/img/products/03.jpg?_v=1639983180738" alt=""></picture>
					</div>
					<div class="products-sec__card-descp">
						<h4 class="products-sec__card-descp-title">
							Модульные <br>
							ленты
						</h4>
						<ul class="products-sec__card-descp-list">
							<li class="products-sec__card-descp-list-item">Модульные ленты М0870</li>
							<li class="products-sec__card-descp-list-item">Модульные ленты М1100</li>
							<li class="products-sec__card-descp-list-item">Модульные ленты М1200</li>
						</ul>
					</div>
					<div class="products-sec__card-btn">
						<a href="#callback" class="products-sec__card-btn-link _popup-link btn">Заказать звонок</a>
					</div>
				</div>
			</div>

			<div class="products-sec__column">
				<div class="products-sec__card">
					<div class="products-sec__card-img">
						<picture><source srcset="<?php echo get_template_directory_uri();?>/img/products/04.webp" type="image/webp"><img src="<?php echo get_template_directory_uri();?>/img/products/04.jpg?_v=1639983180738" alt=""></picture>
					</div>
					<div class="products-sec__card-descp">
						<h4 class="products-sec__card-descp-title">
							Прутковые <br>
							транспортеры
						</h4>
						<ul class="products-sec__card-descp-list">
							<li class="products-sec__card-descp-list-item">Прутковые транспортеры</li>
							<li class="products-sec__card-descp-list-item">Аксессуары для прутковых транспортеров</li>
						</ul>
					</div>
					<div class="products-sec__card-btn">
						<a href="#callback" class="products-sec__card-btn-link _popup-link btn">Заказать звонок</a>
					</div>
				</div>
			</div>

			<div class="products-sec__column">
				<div class="products-sec__card">
					<div class="products-sec__card-img">
						<picture><source srcset="<?php echo get_template_directory_uri();?>/img/products/05.webp" type="image/webp"><img src="<?php echo get_template_directory_uri();?>/img/products/05.jpg?_v=1639983180738" alt=""></picture>
					</div>
					<div class="products-sec__card-descp">
						<h4 class="products-sec__card-descp-title">
							Конвейеры
						</h4>
						<ul class="products-sec__card-descp-list">
							<li class="products-sec__card-descp-list-item">Конвейеры КОНВЕЙЕРМАШ</li>
							<li class="products-sec__card-descp-list-item">Конвейеры DIR system</li>
							<li class="products-sec__card-descp-list-item">Конвейеры Русский Конвейер</li>
							<li class="products-sec__card-descp-list-item">Конвейеры PORT GROUP</li>
						</ul>
					</div>
					<div class="products-sec__card-btn">
						<a href="#callback" class="products-sec__card-btn-link _popup-link btn">Заказать звонок</a>
					</div>
				</div>
			</div>

			<div class="products-sec__column">
				<div class="products-sec__card">
					<div class="products-sec__card-img">
						<picture><source srcset="<?php echo get_template_directory_uri();?>/img/products/06.webp" type="image/webp"><img src="<?php echo get_template_directory_uri();?>/img/products/06.jpg?_v=1639983180738" alt=""></picture>
					</div>
					<div class="products-sec__card-descp">
						<h4 class="products-sec__card-descp-title">
							Приводные ремни
						</h4>
						<ul class="products-sec__card-descp-list">
							<li class="products-sec__card-descp-list-item">Клиновые ремни</li>
							<li class="products-sec__card-descp-list-item">Зубчатые ремни</li>
							<li class="products-sec__card-descp-list-item">Многоручьевые ремни</li>
							<li class="products-sec__card-descp-list-item">Плоские ремни</li>
						</ul>
					</div>
					<div class="products-sec__card-btn">
						<a href="#callback" class="products-sec__card-btn-link _popup-link btn">Заказать звонок</a>
					</div>
				</div>
			</div>

			<div class="products-sec__column">
				<div class="products-sec__card">
					<div class="products-sec__card-img">
						<picture><source srcset="<?php echo get_template_directory_uri();?>/img/products/07.webp" type="image/webp"><img src="<?php echo get_template_directory_uri();?>/img/products/07.jpg?_v=1639983180738" alt=""></picture>
					</div>
					<div class="products-sec__card-descp">
						<h4 class="products-sec__card-descp-title">
							Подшипники
						</h4>
						<ul class="products-sec__card-descp-list">
							<li class="products-sec__card-descp-list-item">Шариковые подшипники</li>
							<li class="products-sec__card-descp-list-item">Роликовые подшипники</li>
							<li class="products-sec__card-descp-list-item">Игольчатые подшипники</li>
							<li class="products-sec__card-descp-list-item">Подшипники скольжения</li>
						</ul>
					</div>
					<div class="products-sec__card-btn">
						<a href="#callback" class="products-sec__card-btn-link _popup-link btn">Заказать звонок</a>
					</div>
				</div>
			</div>

			<div class="products-sec__column">
				<div class="products-sec__card">
					<div class="products-sec__card-img">
						<picture><source srcset="<?php echo get_template_directory_uri();?>/img/products/08.webp" type="image/webp"><img src="<?php echo get_template_directory_uri();?>/img/products/08.jpg?_v=1639983180738" alt=""></picture>
					</div>
					<div class="products-sec__card-descp">
						<h4 class="products-sec__card-descp-title">
							Промышленные цепи
						</h4>
						<ul class="products-sec__card-descp-list">
							<li class="products-sec__card-descp-list-item">Втулочно роликовые</li>
							<li class="products-sec__card-descp-list-item">Грузовые цепи</li>
							<li class="products-sec__card-descp-list-item">Цепи с прикреплениями</li>
							<li class="products-sec__card-descp-list-item">Цепи с прямыми пластинами</li>
						</ul>
					</div>
					<div class="products-sec__card-btn">
						<a href="#callback" class="products-sec__card-btn-link _popup-link btn">Заказать звонок</a>
					</div>
				</div>
			</div>

			<div class="products-sec__column">
				<div class="products-sec__card">
					<div class="products-sec__card-img">
						<picture><source srcset="<?php echo get_template_directory_uri();?>/img/products/09.webp" type="image/webp"><img src="<?php echo get_template_directory_uri();?>/img/products/09.jpg?_v=1639983180738" alt=""></picture>
					</div>
					<div class="products-sec__card-descp">
						<h4 class="products-sec__card-descp-title">
							Рукава шланги РВД
						</h4>
						<ul class="products-sec__card-descp-list">
							<li class="products-sec__card-descp-list-item">Промышленные рукава</li>
							<li class="products-sec__card-descp-list-item">Спиральные ПВХ рукава</li>
							<li class="products-sec__card-descp-list-item">Оплеточные шланги</li>
						</ul>
					</div>
					<div class="products-sec__card-btn">
						<a href="#callback" class="products-sec__card-btn-link _popup-link btn">Заказать звонок</a>
					</div>
				</div>
			</div> -->

		</div>
	</div>
</section>

<section id="service" class="service">
	<div class="_container">
		<h2 class="service__title title">Сервисные услуги</h2>

		<div class="service__row">

			<div class="service__column">
				<div class="service__card">
					<span class="service__card-icon service__card-icon_01"></span>
					<h4 class="service__card-title">
						Стыковка конвейерных <br>
						лент методом горячей <br>
						вулканизации
					</h4>
				</div>
			</div>

			<div class="service__column">
				<div class="service__card">
					<span class="service__card-icon service__card-icon_02"></span>
					<h4 class="service__card-title">
						Стыковка конвейерных <br>
						лент методом горячей <br>
						вулканизации
					</h4>
				</div>
			</div>

			<div class="service__column">
				<div class="service__card">
					<span class="service__card-icon service__card-icon_03"></span>
					<h4 class="service__card-title">
						Механическая стыковка <br>
						конвейерных <br>
						лент
					</h4>
				</div>
			</div>

		</div>

	</div>
</section>

<section id="completed-projects" class="completed-projects">
	<div class="_container">
		<h2 class="completed-projects__title">Осуществленные проекты</h2>
		<div class="completed-projects__row">
		<?php 
			$posts = get_posts( array(
				'numberposts' => 4,
				'category'    => 4,
				'orderby'     => 'date',
				// 'orderby'     => '612,616,626',
				'order'       => 'ASC',
				// 'include'     => '612,608,606',
				'include'     => array(),
				'exclude'     => array(),
				'meta_key'    => '',
				'meta_value'  =>'',
				'post_type'   => 'post',
				'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
			) );

			$result = wp_get_recent_posts( $args );

			foreach( $posts as $post ){
		?>
			<?php get_template_part('template-parts/progects-element');?>	
		<?php 
			} 
		?>
		</div>

		<div class="completed-projects__help help-wrap">
			<div class="help-wrap__name">
				<h2 class="help-wrap__name-title">
					Вас заинтересовали <br>
					наши услуги?
				</h2>
				<p class="help-wrap__name-subtitle">Наши специалисты помогут:</p>
			</div>
			<div class="help-wrap__descp">
				<ul class="help-wrap__descp-list">
					<li class="help-wrap__descp-list-item">Провести технический аудит</li>
					<li class="help-wrap__descp-list-item">Подобрать необходимое оборудование</li>
					<li class="help-wrap__descp-list-item">Произвести замер и планировку на объекте </li>
					<li class="help-wrap__descp-list-item">Осуществить монтаж и провести пусконаладку</li>
				</ul>
			</div>
			<div class="help-wrap__btn">
				<a href="#callback" class="help-wrap__btn-link _popup-link btn">Заявка на расчет стоимости</a>
				<a href="<?php echo get_category_link(4);?>" class="help-wrap__btn-link _popup-link btn btn_grey">Смотреть все проекты</a>
			</div>
		</div>

	</div>
</section>

	<?get_template_part('template-parts/question', 'section');?>
	<?get_template_part('template-parts/command', 'section');?>

</main>

<?php get_footer(); ?> 