<?php

/*
Template Name: Страница - Конвейерные ленты Habasit
WP Post Template: Страница - Конвейерные ленты Habasit
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



    <?get_template_part('template-parts/question', 'section');?>
	<?get_template_part('template-parts/command', 'section');?>

</main>

<?php get_footer();