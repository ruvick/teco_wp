<div class="products-sec__column">
	<div class="products-sec__card">
		<div class="products-sec__card-img"> 
			<a href="<?echo get_category_link($args['cat']->term_id)?>">
				<? 
          $webp = carbon_get_term_meta($args['cat']->term_id, 'term_photo_webp');

          if (!empty($webp)) {
        ?>
            <source srcset="<?php echo wp_get_attachment_image_src(carbon_get_term_meta($args['cat']->term_id, 'term_photo_webp'), 'full')[0];?>" type="image/webp">
        <?}?>

        <img src="<?php echo wp_get_attachment_image_src(carbon_get_term_meta($args['cat']->term_id, 'term_photo'), 'full')[0];?>" alt="">
			</a>
		</div>
		<div class="products-sec__card-descp">
			<h4 class="products-sec__card-descp-title">
				<? echo $args['cat']->name ?>
			</h4>
			<ul class="products-sec__card-descp-list">
			<?
				$categories = get_categories( [
					'taxonomy'     => 'category',
					'type'         => 'post',
					'child_of'     => $args['cat']->term_id,
					'orderby'      => 'name',
					'order'        => 'ASC',
					'hide_empty'   => 0,
					'hierarchical' => 1,
				] );

				if( $categories ){
					foreach( $categories as $cat ){
			?>
					<li class="products-sec__card-descp-list-item"><a href = "<? echo get_category_link($cat->term_id)?>"><?echo $cat->name;?></a></li>
				<?
						}
					}
				?>
			</ul>
		</div>
		<div class="products-sec__card-btn">
			<a href="<?echo get_category_link($args['cat']->term_id)?>" class="products-sec__card-btn-link _popup-link btn">Смотреть все</a>
		</div>
	</div>
</div>