<?php

/*
Template Name: Страница - комплектующие транспортеров
WP Post Template: Страница - комплектующие транспортеров
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
                <? $belt = carbon_get_post_meta($post->ID, 'belt_item');
                    if ($belt) {
                        $beltIndex = 0;
                        foreach ($belt as $item) {
                ?>
                    <h2 class = "sub_position_head"><?echo $item['belt_item_title']?></h2>
                    <div class="product-sec__row">

                        <div class="product-sec__img product-sec__img_sm">
                            <picture>
                                <!-- <source srcset="img/product-sl.webp" type="image/webp"> -->
                                <img src="<?php echo wp_get_attachment_image_src($item['belt_item_img'], 'large')[0]; ?>" alt="">
                            </picture>
                        </div>

                        <div class="product-sec__descp">
                            <? echo apply_filters('the_content', $item['belt_item_description']) ?>
                        </div>

                    </div>

                    <div class="product-sec__row-table">
                        <? echo apply_filters('the_content', $item['belt_item_table']) ?>
                    </div>
                <?
                    $beltIndex++;
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