<section id="catalog" class="catalog">
    <div class="_container">
		<div class="habasitBeltAllWrapper">
			<?
				$categories = get_categories( [
					'taxonomy'     => 'category',
					'type'         => 'post',
					'child_of'     => 6,
					'orderby'      => 'name',
					'order'        => 'ASC',
					'hide_empty'   => 0,
					'hierarchical' => 1,
				] );

				if( $categories ){
					foreach( $categories as $cat ){
			?>
					<a href = "<?echo get_category_link($cat->term_id);?>" class="hbkElement">
						<img src="<?php echo wp_get_attachment_image_src(carbon_get_term_meta($cat->term_id, 'term_photo'), 'full')[0];?>" alt="">
						<h2><?echo $cat->name;?></h2> 
					</a>	
			<?
					}
				}
			?>
		</div>
    </div>
</section>