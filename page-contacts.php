<?php 

/*
Template Name: Страница Контакты
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<main class="page">
	<section id="title-navigation" class="title-navigation">
		<div class="_container">

			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
			?> 
				<h1 class="title-navigation__title title-mar-big"><?php the_title();?></h1>

		</div>
	</section>
	
	<section class="content">
		<div class="_container">
			<h2 class="contact_h2">Телефон службы поддержки</h2>
			<div class="contact_phones">
				<div class="phone">
					<a href="tel:<? $tel = carbon_get_theme_option("as_phones_1"); echo preg_replace('/[^0-9]/', '', $tel); ?>"><? echo $tel; ?></strong></a>
				</div>
			</div>

			<h2 class="contact_h2">Электронная почта</h2>
			<div class="contact_phones">
				<div class="phone">
					<a href="mailto:<? $mail = carbon_get_theme_option("as_email"); echo $mail; ?>"><? echo $mail; ?></strong></a>
				</div>
			</div>
			

			<h2 class="contact_h2">Местоположение и почтовый адрес</h2>
			<p>
				<span class = "adress_contact"><? $adr = carbon_get_theme_option("as_address"); if (!empty($adr)){?><? echo $adr; ?><?}?></span> <br/><a target = "_blank" style = "color: #AE0018" href="https://yandex.ru/maps/-/CCUFqOVoPC">Смотреть на карте</a>
			</p>

			<!-- <h2 class="contact_h2">Обратная связь:</h2>
			<div class="universal_form">
				<form class = "form_in_page universal_send_form" action="">
					<input id="name" autocomplete="off" type="text" name="name" data-error="Заполните поля" data-value="Имя*" class="popup__form-input input _req _name">
					<input id="tel2" autocomplete="off" type="text" name="tel" data-error="Заполните поля" data-value="Телефон*" class="popup__form-input input _phone _req _tel">
					<p class="popup__policy">Заполняя данную форму вы соглашаетесь с <a class="redLabel" target="_blank" href="http://teko.msk.ru/privacy-policy/">политикой конфиденциальности</a></p>
					<button type="button" class="popup__form-btn form__btn btn u_send">Отправить</button>
				</form>
			</div> -->

			<h2 class="contact_h2">Банковские реквизиты:</h2>
			<table class = "contact_table">
				<tbody>
					<tr>
						<td>Банк</td>
						<td><?echo carbon_get_theme_option("as_bank");?></td>
					</tr>

					<tr>
						<td>БИК</td>
						<td><?echo carbon_get_theme_option("as_bik");?></td>
					</tr>

					<tr>
						<td>К/счёт</td>
						<td><?echo carbon_get_theme_option("as_ks");?></td>
					</tr>

					<tr>
						<td>Р/счёт</td>
						<td><?echo carbon_get_theme_option("as_rs");?></td>
					</tr>

					<tr>
						<td>ИНН</td>
						<td><?echo carbon_get_theme_option("as_inn");?></td>
					</tr>
					
					<tr>
						<td>КПП</td>
						<td><?echo carbon_get_theme_option("as_kpp");?></td>
					</tr>
					
					<tr>
						<td>ОГРН</td>
						<td><?echo carbon_get_theme_option("as_orgn");?></td>
					</tr>

				</tbody>
			</table>

			<a class="mp-partner" href="<? echo carbon_get_theme_option("mp_partner"); ?>" download >Карта партнера</a>
		</div>
	</section>

</main>

<?php get_footer(); 
