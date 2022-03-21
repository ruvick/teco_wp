<section id="catalog" class="catalog">
    <div class="_container">
		<div class="beltCatControlPanel">
			<button class = "vue_chenge_btn v_intable">Таблица</button>
			<button class = "vue_chenge_btn v_list  v_select">Список</button>
		</div>
		
		<div class="beltCatWrapper beltCatWrapper_list">
			<?php if ( have_posts() ) : ?> 
				<div class = "hab_belt_blk hab_belt_blk_head">
						<div class="image_h">Изображение</div>
						<div class="title">Артикул:</div>
						<div class="tolsh">Толщина:</div>
						<div class="sila_t">Сила тяги (k1%):</div>
						<div class="val_min">Вал (min):</div>
						<div class="material">Материал:</div>
						<div class="np">Нож. переход:</div>
						<div class="count_sl">Колличество слоев:</div>
						<div class="count_tyg_sl">Тяг. слой:</div>
				</div>
				
				<?while ( have_posts() ) : the_post(); ?>
					<div class = "hab_belt_blk hab_belt_blk_pl">
						<div class="image">
						
								<img src="<?php $imgTm = get_the_post_thumbnail_url(get_the_ID(), "tominiatyre");
								echo empty($imgTm) ? get_bloginfo("template_url") . "/img/no-photo.jpg" : $imgTm; ?>" alt="<? the_title(); ?>" loading="lazy">
							 
						</div>

						<div class="title"> 
							<span class = "mobile_title">Артикул:</span> 
							<? the_title(); ?>
						</div>

						<div class="tolsh">
							<span class = "mobile_title">Толщина:</span> 
							<? echo carbon_get_post_meta(get_the_ID(), "belt_tolsh"); ?>
						</div>

						<div class="sila_t">
							<span class = "mobile_title">Сила тяги (k1%):</span> 
							<? echo carbon_get_post_meta(get_the_ID(), "belt_sila_t"); ?>
						</div>

						<div class="val_min">
							<span class = "mobile_title">Вал (min):</span> 
							<? echo carbon_get_post_meta(get_the_ID(), "belt_val_min"); ?>
						</div>
						
						<div class="material">
							<span class = "mobile_title">Материал:</span> 
							<? echo carbon_get_post_meta(get_the_ID(), "belt_material"); ?>
						</div>

						<div class="np">
							<span class = "mobile_title">Нож. переход:</span> 
							<? echo carbon_get_post_meta(get_the_ID(), "belt_np"); ?>
						</div>

						<div class="count_sl">
							<span class = "mobile_title">Колличество слоев:</span> 
							<? echo carbon_get_post_meta(get_the_ID(), "belt_count_sl"); ?>
						</div>
						
						<div class="count_tyg_sl">
							<span class = "mobile_title">Тяг. слой:</span> 
							<? echo carbon_get_post_meta(get_the_ID(), "belt_tyg_sl"); ?>
						</div>

						<div class="dop">
							<span class = "mobile_title">Дополнительно:</span> 
							<? echo carbon_get_post_meta(get_the_ID(), "belt_dop"); ?>
						</div>
					</div>	

				<?php endwhile;?>
			<?php endif; ?> 
		</div>
    </div>
</section>