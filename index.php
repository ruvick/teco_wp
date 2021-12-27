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

			<div class="products-sec__column">
				<div class="products-sec__card">
					<div class="products-sec__card-img">
						<picture><source srcset="<?php echo get_template_directory_uri();?>/img/products/01.webp" type="image/webp"><img src="<?php echo get_template_directory_uri();?>/img/products/01.jpg?_v=1639983180738" alt=""></picture>
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
			</div>

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

			<div class="completed-projects__column">
				<div class="completed-projects__card">
					<div class="completed-projects__card-img">
						<picture><source srcset="<?php echo get_template_directory_uri();?>/img/project/01.webp" type="image/webp"><img src="<?php echo get_template_directory_uri();?>/img/project/01.jpg?_v=1639983180738" alt=""></picture>
					</div>
					<div class="completed-projects__card-descp completed-projects__card-descp_red">
						<h5 class="completed-projects__card-descp-title">
							Стыковка конвейерной ленты <br>
							на Уренгойской шахте
						</h5>
						<a href="#" class="completed-projects__card-descp-link">Подробнее...</a>
					</div>
				</div>
			</div>

			<div class="completed-projects__column">
				<div class="completed-projects__card">
					<div class="completed-projects__card-img">
						<picture><source srcset="<?php echo get_template_directory_uri();?>/img/project/02.webp" type="image/webp"><img src="<?php echo get_template_directory_uri();?>/img/project/02.jpg?_v=1639983180738" alt=""></picture>
					</div>
					<div class="completed-projects__card-descp">
						<h5 class="completed-projects__card-descp-title">
							Установка и пусконаладка конвейерной <br>
							установки
						</h5>
						<a href="#" class="completed-projects__card-descp-link">Подробнее...</a>
					</div>
				</div>
			</div>

			<div class="completed-projects__column">
				<div class="completed-projects__card">
					<div class="completed-projects__card-img">
						<picture><source srcset="<?php echo get_template_directory_uri();?>/img/project/03.webp" type="image/webp"><img src="<?php echo get_template_directory_uri();?>/img/project/03.jpg?_v=1639983180738" alt=""></picture>
					</div>
					<div class="completed-projects__card-descp">
						<h5 class="completed-projects__card-descp-title">
							Установка и запуск пруткового <br>
							транспортера
						</h5>
						<a href="#" class="completed-projects__card-descp-link">Подробнее...</a>
					</div>
				</div>
			</div>

			<div class="completed-projects__column">
				<div class="completed-projects__card">
					<div class="completed-projects__card-img">
						<picture><source srcset="<?php echo get_template_directory_uri();?>/img/project/04.webp" type="image/webp"><img src="<?php echo get_template_directory_uri();?>/img/project/04.jpg?_v=1639983180738" alt=""></picture>
					</div>
					<div class="completed-projects__card-descp">
						<h5 class="completed-projects__card-descp-title">
							Замена модульной конвейерной <br>
							ленты
						</h5>
						<a href="#" class="completed-projects__card-descp-link">Подробнее...</a>
					</div>
				</div>
			</div>

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
				<a href="#" class="help-wrap__btn-link _popup-link btn btn_grey">Смотреть все проекты</a>
			</div>
		</div>

	</div>
</section>

<section id="consult" class="consult">
<div class="_container">
<h2 class="consult__title title">
Остались вопросы по нашим товарам или нужна помощь <br>
в подборе оборудования?
</h2>
<p class="consult__subtitle ">Оставьте заявку и наши менеджеры свяжутся с Вами в ближайшее время.</p>
<form action="#" class="consult__form">
<div class="consult__form-line form__line">
	<input id="name" autocomplete="off" type="text" name="form[]" data-error="Заполните поле" data-value="Имя"
		class="consult__form-input input">

	<input id="tel2" autocomplete="off" type="text" name="form[]" data-error="Заполните поле" data-value="Телефон"
		class="consult__form-input input _phone _req">

	<button type="submit" class="consult__form-btn btn">Заявка на расчет стоимости</button>

</div>
</form>
</div>
</section>

<section id="team" class="team">
<div class="_container">
<h2 class="team__title">Наша команда</h2>
<div class="team__row">
<? $team = carbon_get_theme_option('complex_team');
	if ($team) {
		$teamIndex = 0;
		foreach ($team as $item) {
			?>
			<div class="team__column">
				<div class="team__card">
					<div class="team__card-img">
						<img src="<?php echo wp_get_attachment_image_src($item['img_team'], 'large')[0]; ?>" alt="">					</div>
					<div class="team__card-descp">
						<h4 class="team__card-title"><? echo $item['name_team']; ?></h4>
						<p class="team__card-position"><? echo $item['special_team']; ?></p>
					</div>
					<div class="team__card-nav">
						<a href="<? echo preg_replace('/[^0-9]/', '', $item['phone_team']); ?>" class="team__card-nav-phone"><? echo $item['phone_team']; ?></a>
						<a href="mailto:<? echo $item['e-mail_team']; ?>" class="team__card-nav-email"><? echo $item['e-mail_team']; ?></a>
					</div>
				</div>
			</div>
			<?
			$teamIndex++; 
			if ($teamIndex == 4) break;
		}
	}
	?>
</div>
</div>
</section>

</main>

<?php get_footer(); ?> 