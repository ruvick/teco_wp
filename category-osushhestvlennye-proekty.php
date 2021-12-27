<?php get_header(); ?> 

<?php get_template_part('template-parts/header-section');?>

<main class="page">

    <section id="title-navigation" class="title-navigation">
        <div class="_container">

			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
			?> 

				<h1 class="title-navigation__title"><? single_cat_title(); ?></h1>

			</div>
		</section> 

    <section class="content"> 
			<div class="_container">
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
      </div>
		</section>

</main>

<?php get_footer(); ?>  