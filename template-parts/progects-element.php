<div class="completed-projects__column">
  <div class="completed-projects__card">
    <div class="completed-projects__card-img">
      <picture>
      <img src="<?php $imgTm = get_the_post_thumbnail_url(get_the_ID(), "tominiatyre");
					echo empty($imgTm) ? get_bloginfo("template_url") . "/img/no-photo.jpg" : $imgTm; ?>" alt="<? the_title(); ?>" loading="lazy">
		  </picture>      
    </div>
    <div class="completed-projects__card-descp completed-projects__card-descp_red">
      <h5 class="completed-projects__card-descp-title"><?php echo $post->post_title?></h5>
      <a href="<?php echo get_permalink();?>" class="completed-projects__card-descp-link">Подробнее...</a>
    </div>
  </div>
</div>