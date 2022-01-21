<?php

/*
Template Name: Страница - Шланги и воздуховоды ПВХ
WP Post Template: Страница - Шланги и воздуховоды ПВХ
Template Post Type: post
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

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1 class="title-navigation__title"><?php the_title();?></h1>
					<?php the_content();?>
					<?php endwhile;?>
				<?php endif; ?> 

			</div>
		</section>

    <section id="product-sec" class="product-sec recurring">
      <div class="_container">

				<div class="pr-card__row">
					<? 
						$prCard = carbon_get_post_meta(get_the_ID(),"vozduh_complex"); // Вывод из страницы или поста

						if ($prCard) {
							$prCardIndex = 0;
						foreach ($prCard as $item) {
					?>
						<a href="<?echo get_the_permalink(get_the_ID());?>" class="pr-card__item">
							<div class="pr-card__img">
								<img src="<?php echo wp_get_attachment_image_src($item['vozduh_complex_img'], 'large')[0]; ?>" alt="">
							</div>
							<div class="pr-card__descp">
								<h4 class="pr-card__descp-title"><? echo $item['vozduh_complex_title']; ?></h4>
								<p class="pr-card__descp-text"><strong>Рабочая температура: </strong><? echo $item['vozduh_complex_temp']; ?></p>
								<p class="pr-card__descp-text"><strong>Диаметр: </strong><? echo $item['vozduh_complex_diam']; ?></p>
								<p class="pr-card__descp-text"><strong>Рабочее давление: </strong><? echo $item['vozduh_complex_davlenie']; ?></p>
								<p class="pr-card__descp-text"><strong>Вакуум: </strong><? echo $item['vozduh_complex_vak']; ?></p>
							</div>
						</a>
					<?
							$prCardIndex++; 
							}
						}
					?>
				</div>

      </div>
    </section>
    
    <?get_template_part('template-parts/up', 'sale');?>

    <?get_template_part('template-parts/question', 'section');?>
	<?get_template_part('template-parts/command', 'section');?>

</main>

<?php get_footer();