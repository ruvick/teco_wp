<?php 

/*
Template Name: Страница Вакансии
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<main class="page">

  <!-- <section id="title-navigation" class="title-navigation">
    <div class="_container">

			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
			?> 
				<h1 class="title-navigation__title"><?php the_title();?></h1>

		</div>
	</section> -->

  <section class="content job">
    <div class="_container"> 
      <div class="job__banner">
        <div class="job__banner-nuar_blk nuar_blk"></div>
        <h1 class="job__banner-title">Работа в ТЭКО</h1>
        <p class="job__banner-subtitle">
          Мы рады видеть Вас на странице, посвященной работе и карьере в компании ТЭКО. Здесь Вы сможете ознакомится со свежими вакансиями нашей компании, 
          отправить резюме или узнать контакты отдела кадров.
        </p>
        <p class="job__banner-subtitle">
          В нашей компании работают целеустремленные и талантливые люди. Мы не только привлекаем квалифицированные кадры, но и помогаем нашим сотрудникам 
          в обучении, обеспечивая лучшим достойный карьерный рост.
        </p>
        <a href="#callback" class="job__banner-btn btn _popup-link">Отправить заявку</a>
      </div>
    </div>
  </section>

  <section class="job-descp">
    <div class="_container"> 

    <div class="job-descp__spollers-block spollers-block" data-spollers data-one-spoller>
      <? 
		    $vacancies = carbon_get_post_meta(get_the_ID(),"vacancies_complex"); 
	      if ($vacancies) {
		      $vacanciesIndex = 0;
		    foreach ($vacancies as $item) {
		  ?>
      <div class="spollers-block__item">
        <div class="spollers-block__title spollers-block__descp d-flex" data-spoller>
          <div class="spollers-block__descp-title"><? echo $item['vacancies_name']; ?></div>
          <div class="spollers-block__descp-conditions d-flex">
            <div class="spollers-block__descp-conditions-schedule">График: <span><? echo $item['vacancies_schedule']; ?></span></div>
            <div class="spollers-block__descp-conditions-salary">З.П.: <span><? echo $item['vacancies_salary']; ?></span></div>
          </div>
        </div>
        <div class="job-spollers-block__body spollers-block__body">
          <h3 class="job-spollers-block__body-title">Обязанности:</h3>
          <? echo $item['vacancies_duties']; ?>
          <h3 class="job-spollers-block__body-title">Требования:</h3>
          <? echo $item['vacancies_requirements']; ?>
          <h3 class="job-spollers-block__body-title">Условия:</h3>
          <? echo $item['vacancies_salary']; ?>
        </div>
      </div>
			<?
			$vacanciesIndex++; 
		    }
	    }
	    ?>
    </div>

    </div>
  </section>

<?get_template_part('template-parts/question', 'section');?>

</main>

<?php get_footer(); 
