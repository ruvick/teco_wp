<div class="products-sec__column">
	<div class="products-sec__card">
		<div class="products-sec__card-img">
			<picture>
				<? 
                    $webp = carbon_get_term_meta($args['cat']->term_id, 'term_photo_webp');

                    if (!empty($webp)) {
                ?>
                    <source srcset="<?php echo wp_get_attachment_image_src(carbon_get_term_meta($args['cat']->term_id, 'term_photo_webp'), 'full')[0];?>" type="image/webp">
                <?}?>

                <img src="<?php echo wp_get_attachment_image_src(carbon_get_term_meta($args['cat']->term_id, 'term_photo'), 'full')[0];?>" alt="">
			</picture>
		</div>
		<div class="products-sec__card-descp">
			<h4 class="products-sec__card-descp-title">
				<? echo $args['cat']->name ?>
			</h4>
			<ul class="products-sec__card-descp-list">
				<?
                    $my_posts = get_posts([
                        'numberposts' => 3,
                        'category' => $args['cat']->term_id,
                        'orderby' => 'date',
	                    'order' => 'DESC',
                    ]);

                    foreach( $my_posts as $pst ){
                ?>
                    <li class="products-sec__card-descp-list-item"><a href = "<? echo get_the_permalink($pst->ID)?>"><? echo $pst->post_title?></a></li>
				<?}?>
			</ul>
		</div>
		<div class="products-sec__card-btn">
			<a href="<?echo get_category_link($args['cat']->term_id)?>" class="products-sec__card-btn-link _popup-link btn">Смотреть все</a>
		</div>
	</div>
</div>