<section id="catalog" class="catalog">
    <div class="_container">
		<div class="beltCatControlPanel">
			<button class = "vue_chenge_btn v_intable">Таблица</button>
			<button class = "vue_chenge_btn v_list  v_select">Список</button>
		</div>
		
		<div class="beltCatWrapper beltCatWrapper_list">
			<?php if ( have_posts() ) : ?> 
				<?while ( have_posts() ) : the_post(); ?>
					<div class = "hab_belt_blk hab_belt_blk_pl">
						<div class="image">
						
								<img src="<?php $imgTm = get_the_post_thumbnail_url(get_the_ID(), "tominiatyre");
								echo empty($imgTm) ? get_bloginfo("template_url") . "/img/no-photo.jpg" : $imgTm; ?>" alt="<? the_title(); ?>" loading="lazy">
							 
						</div>

						<div class="title"><? the_title(); ?></div>
						<div class="tolsh"><? echo carbon_get_post_meta(get_the_ID(), "belt_tolsh"); ?></div>
						<div class="sila_t"><? echo carbon_get_post_meta(get_the_ID(), "belt_sila_t"); ?></div>
						<div class="val_min"><? echo carbon_get_post_meta(get_the_ID(), "belt_val_min"); ?></div>
						<div class="material"><? echo carbon_get_post_meta(get_the_ID(), "belt_material"); ?></div>
						<div class="np"><? echo carbon_get_post_meta(get_the_ID(), "belt_np"); ?></div>
						<div class="count_sl"><? echo carbon_get_post_meta(get_the_ID(), "belt_count_sl"); ?></div>
						<div class="count_tyg_sl"><? echo carbon_get_post_meta(get_the_ID(), "belt_tyg_sl"); ?></div>
						<div class="dop"><? echo carbon_get_post_meta(get_the_ID(), "belt_dop"); ?></div>
					</div>	

				<?php endwhile;?>
			<?php endif; ?> 
		</div>
    </div>
</section>