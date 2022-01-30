<div class="product__column similar-products__column">
  <div class="product__card">
    <a href="<?php echo get_permalink();?>" class="product__card-img"> 
      <picture>
        <img src="<?php $imgTm = get_the_post_thumbnail_url(get_the_ID(), "tominiatyre");
					echo empty($imgTm) ? get_bloginfo("template_url") . "/img/no-photo.jpg" : $imgTm; ?>" alt="<? the_title(); ?>" loading="lazy">
		  </picture>      
    </a>
    <div class="product__card-descp">
      <h6 class="product__card-descp-title"><?php echo $post->post_title?></h6>
    </div>
    <a href="<?php echo get_permalink();?>" class="product__card-btn btn">Подробнее</a>
  </div>
</div>