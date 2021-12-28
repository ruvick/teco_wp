<?php

/*
Template Name: Страница - Клиновые ремни
WP Post Template: Страница - Клиновые ремни
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

          <h6 class="product-sec-charect__title"><?echo carbon_get_post_meta(get_the_ID(),"title_descript"); ?></h6>
          <p class="product-sec-charect__subtitle">
            <?echo carbon_get_post_meta(get_the_ID(),"text_descript"); ?>
          </p>

          <div class="product-sec-charect__wrap">

            <div class="product-sec-charect__wrap-img-block">
              <div class="product-sec-charect__wrap-img-block-image">
                <picture><img src="<?php echo wp_get_attachment_image_src( carbon_get_the_post_meta('belt_item_char_img_1'), 'full')[0]; ?>" alt=""></picture>
              </div>
              <div class="product-sec-charect__wrap-img-block-image">
                <picture><img src="<?php echo wp_get_attachment_image_src( carbon_get_the_post_meta('belt_item_char_img_2'), 'full')[0]; ?>" alt=""></picture>              
              </div>
            </div>

            <div class="product-sec-charect__wrap-table">
              <?echo carbon_get_post_meta(get_the_ID(),"belt_item_table_char"); ?>
            </div>

          </div>

          <?echo carbon_get_post_meta(get_the_ID(),"belt_charect"); ?>

        </div>
      </section>

      <section id="similar-products" class="similar-products">
        <div class="_container">
          <h2 class="similar-products__title">Похожие товары</h2>

          <div class="similar-products__row product">
          <?php 
			      $posts = get_posts( array(
				      'numberposts' => 5,
				      'category'    => 6,
				      'orderby'     => 'date',
				      // 'orderby'     => '612,616,626',
				      'order'       => 'ASC',
				      // 'include'     => '612,608,606',
				      'include'     => array(),
				      'exclude'     => array(),
				      'meta_key'    => '',
				      'meta_value'  =>'',
				      'post_type'   => 'post',
				      'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
			      ) );

			      $result = wp_get_recent_posts( $args );

			      foreach( $posts as $post ){
		      ?>
			      <?php get_template_part('template-parts/similar-element');?>	
		      <?php 
			        } 
		      ?>
          </div>

        </div>
      </section>
    
    <?get_template_part('template-parts/question', 'section');?>
	<?get_template_part('template-parts/command', 'section');?>

</main>

<?php get_footer();