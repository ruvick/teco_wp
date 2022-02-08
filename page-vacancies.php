<?php 

/*
Template Name: Страница Вакансии
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
				<h1 class="title-navigation__title"><?php the_title();?></h1>

			</div>
		</section>
  <section class="content">
  <div class="_container"> 

  <? 
		$vacancies = carbon_get_post_meta(get_the_ID(),"vacancies_complex"); 

	if ($vacancies) {
		$vacanciesIndex = 0;
		foreach ($vacancies as $item) {
			?>
      <div class="vacancies__block">
        <h2><? echo $item['vacancies_name']; ?></h2>
        <div class="vacancies__block-item">
          <h3>Обязанности:</h3>
          <? echo $item['vacancies_duties']; ?>
        </div>
        <div class="vacancies__block-item">
          <h3>Требования: </h3>
          <? echo $item['vacancies_requirements']; ?>
        </div>
        <div class="vacancies__block-item">
          <h3>Заработная плата: </h3>
          <? echo $item['vacancies_salary']; ?>
        </div>
      </div>
			<?
			$vacanciesIndex++; 
		}
	}
	?>
</div>
</section>

<?get_template_part('template-parts/question', 'section');?>

</main>

<?php get_footer(); 
