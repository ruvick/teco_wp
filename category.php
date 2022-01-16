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

	<section id="catalog" class="catalog">
        <div class="_container">

        	<div class="catalog__wrap">
				<?
				
					$category = get_queried_object();
					$current_cat_id = $category->term_id;

					$my_posts = get_posts([
						'numberposts' => -1,
						'category' => $current_cat_id,
						'orderby' => 'date',
						'order' => 'ASC',
					]);
				?>

            	<div class="catalog__sidebar">
					<ul class="catalog__sidebar-menu-list">
						<?
							foreach( $my_posts as $pst ){
						?>
							<li class="catalog__sidebar-menu-list-item">
								<a href="<? echo get_the_permalink($pst->ID)?>" class="catalog__sidebar-menu-list-item-link _active"><? echo $pst->post_title?></a>
							</li>
						<?}?>

					</ul>
            	</div>

            	<div class="catalog__main">
					<div class="catalog-product__container">
						<div class="catalog-product__row">
							<?
								foreach( $my_posts as $pst ){
							?>
								
									<div class="product__column catalog-product__column">
										<div class="product__card">
											<div class="product__card-img">
													<a href = "<? echo get_the_permalink($pst->ID)?>">
														<?php echo get_the_post_thumbnail( $pst->ID, "large" ); ?>
														<!-- <img src="img/product/01.jpg?_v=1639983180738" alt=""> -->
													</a>
											</div>
											<div class="product__card-descp">
													<h6 class="product__card-descp-title">
														<? echo $pst->post_title?>
													</h6>
											</div>
											<a href = "<? echo get_the_permalink($pst->ID)?>" class="product__card-btn btn">Подробнее</a>
										</div>
									</div>
								
							<?}?>

							<? $catMat = carbon_get_term_meta( get_queried_object_id(),  'cat_mat_complex');
									if ($catMat) {
								$catMatIndex = 0;
									foreach ($catMat as $item) {
							?>
									<div class="product__column catalog-product__column">
										<div class="product__card">
											<div class="product__card-img">
													<picture>
														<img src="<?php echo wp_get_attachment_image_src($item['cat_mat_img'], 'large')[0]; ?>" alt="">
													</picture>
											</div>
											<div class="product__card-descp">
													<h6 class="product__card-descp-title">
														<? echo $item['cat_mat_title']; ?>
													</h6>
											</div>
											<?php
                				printf('<a href="%s" download class="product__card-btn btn">Скачать</a>', $item['cat_mat_file']);
                			?>
										</div>
									</div>
							<?
									$catMatIndex++; 
									}
								}
							?>
						</div>
					</div>
  				
				</div>
            </div>

        

          <!-- <nav class="pagination d-flex">
            <div class="pagination__nav-links d-flex">
              <span class="pagination__numbers">1</span>
              <a class="pagination__numbers current" href="#">2</a>
              <a class="pagination__numbers" href="#">3</a>
              <a class="pagination__numbers" href="#">4</a>
              
            </div>
          </nav> -->

        </div>
  </section>

  	<?get_template_part('template-parts/question', 'section');?>
	<?get_template_part('template-parts/command', 'section');?>
</main>

<?php get_footer(); ?>  