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
							
							
							$cats = get_categories( [
								'parent' => get_queried_object_id(),
								'hide_empty'   => 0,
								'orderby'      => 'meta_value_num',
								'meta_key'		=> '_term_index',
								'order'        => 'ASC',
						   	] );
							
							foreach( $cats as $cat ) { 
	
							?>
								<li class="catalog__sidebar-menu-list-item">
									<a href="<? echo get_category_link($cat->term_id)?>" class="catalog__sidebar-menu-list-item-link _active"><? echo $cat->name?></a>
								</li>
							<?
							}
							?>
						
						<?
							foreach( $my_posts as $pst ){
								$cat = new WPSEO_Primary_Term('category', $pst->ID);
								$cat_name = get_term($cat->get_primary_term())->name;

								if ($cat_name !== get_cat_name( get_queried_object_id())) continue;
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
							foreach( $cats as $cat ) { 
							?>
									<div class="product__column catalog-product__column">
										<div class="product__card">
											<div class="product__card-img">
													<a href = "<? echo get_category_link($cat->term_id)?>">
														<img src="<?php echo wp_get_attachment_image_src(carbon_get_term_meta($cat->term_id, 'term_photo'), 'full')[0];?>" alt="">
													</a>
											</div>
											<div class="product__card-descp">
													<h6 class="product__card-descp-title">
														<? echo $cat->name?>
													</h6>
											</div>
											<a href = "<? echo get_category_link($cat->term_id)?>" class="product__card-btn btn">Подробнее</a>
										</div>
									</div>
							<?
							}
							?>

							<?
								foreach( $my_posts as $pst ){

								
								$cat = new WPSEO_Primary_Term('category', $pst->ID);
								$cat_name = get_term($cat->get_primary_term())->name;

								// echo "<pre>";
								// print_r($p_cats);
								// echo "</pre>";
								if ($cat_name !== get_cat_name( get_queried_object_id())) continue;
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
												<a href = "<? echo $item['cat_mat_file']?>">
													<picture>
														<img src="<?php echo wp_get_attachment_image_src($item['cat_mat_img'], 'large')[0]; ?>" alt="">
													</picture>
												</a>
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

        </div>
  </section>