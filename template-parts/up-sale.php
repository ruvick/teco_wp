<section id="similar-products" class="similar-products">
        <div class="_container">
          <h2 class="similar-products__title">Смотрите так же:</h2>

          <div class="similar-products__row product">
          <?php 
		  		  $cat = get_the_category( $post->ID );	
			      $posts = get_posts( array(
				      'numberposts' => 5,
				      'category'    => $cat[count($cat)-1]->term_id,
				      'orderby'     => 'date',
				      'order'       => 'ASC',
				      'post_type'   => 'post',
				      'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
			      ) );

			      foreach( $posts as $post ){
		      ?>
			      <?php get_template_part('template-parts/similar-element');?>	
		      <?php 
			        } 
		      ?>
          </div>

        </div>
      </section>