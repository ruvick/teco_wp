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
        <div class="products-sec__row">
          <?
            $categories = get_categories( [ 
              'child_of'     => 3,
              'orderby'      => 'meta_value_num',
              'meta_key'		=> '_term_index',
              'order'        => 'ASC',
              'hide_empty'   => 0,
            ]);

            foreach( $categories as $cat ){
              get_template_part('template-parts/main', 'catalog-element', ["cat" => $cat]);
            }
          ?>
        </div>
			</div>
		</section>

    <?get_template_part('template-parts/question', 'section');?>
	  <?get_template_part('template-parts/command', 'section');?>

	</main>

<?php get_footer();