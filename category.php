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

	<?
		$category_id = get_queried_object()->term_id;

		if (in_array($category_id, [6,0])) {
			get_template_part('template-parts/category-belt', 'section');
		} else
			get_template_part('template-parts/category-main', 'section');
	?>

  	<?get_template_part('template-parts/question', 'section');?>
	<?get_template_part('template-parts/command', 'section');?>
</main>

<?php get_footer(); ?>  