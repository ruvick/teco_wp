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
        <?php if (have_posts()) { while (have_posts()) { the_post(); ?>
        <?php get_template_part('template-parts/progects-element');?>
        <?php } //конец while
        } //конец if ?>
        </div>
      </div>
		</section>

</main>

<?php get_footer(); ?>  