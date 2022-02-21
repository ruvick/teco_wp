<?php

/*
Template Name: Страница - Промышленные цепи
WP Post Template: Страница - Промышленные цепи
Template Post Type: post
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<main class="page">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <section id="title-navigation" class="title-navigation">
        <div class="_container">

			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
			?> 

			<h1 class="title-navigation__title"><?php the_title();?></h1>

			</div>
		</section>

        <section id="product-sec" class="product-sec recurring">
            <div class="_container">

                    <div class="product-sec__row">

                        <div class="product-sec__img product-sec__img_sm">
                            <picture>
                                <!-- <source srcset="img/product-sl.webp" type="image/webp"> -->
                                <img src="<?php echo wp_get_attachment_image_src(carbon_get_post_meta(get_the_ID(),"tsepi_img"), 'large')[0]; ?>" alt="">
                            </picture>
                        </div>

                        <div class="product-sec__descp">
                            <?php the_content();?>
                        </div>

                    </div>

                    <div class="product-sec__row-table">
                        <?
                            $t_name = carbon_get_post_meta(get_the_ID(),"tsepi_table_name");
                            $t_id = carbon_get_post_meta(get_the_ID(),"tsepi_table_id");
                            global $wpdb;
                            $shema = $wpdb->get_results("SELECT column_name,column_comment FROM information_schema.columns WHERE table_schema='tec1687636_main' and table_name='".$t_name."'");
                            $m_data = $wpdb->get_results("SELECT * FROM `".$t_name."` WHERE `type` = '".$t_id."'", ARRAY_A);
                        ?>

                        <table cellspacing="0">
                        <thead>
                            <tr class="thead-img">
                                <?
                                    for ($i = 2; $i < count($shema); $i++) {
                                ?>
                                    <th><span class="color-white"><? echo $shema[$i]->column_comment?></span></th>
                                <?
                                    } 
                                ?>
                                
                            </tr>
                        </thead>
                        <tbody class="">
                            <?
                                foreach ($m_data as $r) {
                            ?>

                            <tr>
                                <?
                                    for ($i = 2; $i < count($shema); $i++) {
                                ?>
                                    <td><? echo $r[$shema[$i]->column_name]?></td>
                                <?
                                    } 
                                ?>
                            </tr>

                            <?
                                }
                            ?>
                        </tbody>
                        </table>

                    </div>

            </div>
      </section>
    
        <?php endwhile;?>
	<?php endif; ?> 

    <?get_template_part('template-parts/up', 'sale');?>

    <?get_template_part('template-parts/question', 'section');?>
	<?get_template_part('template-parts/command', 'section');?>

</main>

<?php get_footer();