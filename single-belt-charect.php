<?php

/*
Template Name: Страница - Приводные ремни
WP Post Template: Страница - Приводные ремни
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

    <section id="product-sec-charect" class="product-sec-charect recurring">
        <div class="_container">

		<? $strap = carbon_get_post_meta($post->ID, 'strap_item');
                    if ($strap) {
                        $strapIndex = 0;
                        foreach ($strap as $item) {
        ?>
        
		<h2 class = "sub_position_head"><?echo $item['strap_title']?></h2>

		  <p class="product-sec-charect__subtitle">
		  	<?echo $item['strap_title_descript']?>
          </p>
		
          <div class="product-sec-charect__wrap">

            <div class="product-sec-charect__wrap-img-block">
              <div class="product-sec-charect__wrap-img-block-image">
                <picture><img src="<?php echo wp_get_attachment_image_src( $item['strap_item_char_img_1'], 'full')[0]; ?>" alt=""></picture>
              </div>
              <div class="product-sec-charect__wrap-img-block-image">
                <picture><img src="<?php echo wp_get_attachment_image_src( $item['strap_item_char_img_2'], 'full')[0]; ?>" alt=""></picture>              
              </div>
            </div>

            <div class="product-sec-charect__wrap-table">
				<?echo apply_filters('the_content', $item['strap_item_table_char'])?>
            </div>

          </div>

          <?//echo apply_filters('the_content', $item['strap_charect'])?>

        
		<?
				$strapIndex++;
			}
		}
		?>
		</div>
      </section>

	<?get_template_part('template-parts/up', 'sale');?>
    
    <?get_template_part('template-parts/question', 'section');?>
	<?get_template_part('template-parts/command', 'section');?>

</main>

<?php get_footer();