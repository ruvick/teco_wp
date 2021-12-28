<div class="completed-projects__column">
  <div class="completed-projects__card">
    <div class="completed-projects__card-img">
      <picture><source srcset="<?php echo get_template_directory_uri();?>/img/project/01.webp" type="image/webp"><img src="<?php echo get_template_directory_uri();?>/img/project/01.jpg?_v=1639983180738" alt=""></picture>
    </div>
    <div class="completed-projects__card-descp completed-projects__card-descp_red">
      <h5 class="completed-projects__card-descp-title"><?php echo $post->post_title?></h5>
      <a href="<?php echo get_permalink();?>" class="completed-projects__card-descp-link">Подробнее...</a>
    </div>
  </div>
</div>