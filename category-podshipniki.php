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
				<?php 
					$thumbnail_id = carbon_get_term_meta( get_queried_object_id(),  'term_photo'); // получим ID картинки из опции темы
					$thumbnail_url = wp_get_attachment_image_url( $thumbnail_id, 'full' );  // ссылка на полный размер картинки по ID вложения
				?>
				<div class="cat-content-img">
					<img src="<?php echo $thumbnail_url; ?>" alt="" /> 
				</div>
        <?php echo category_description(); ?>
			</div>
		</section>
		
		<?get_template_part('template-parts/command', 'section');?>

	</main>

<?php get_footer();