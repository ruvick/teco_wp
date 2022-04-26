<div class="habWinWrapper">
	<div class="habWin">
		<h2></h2>
		<div class="bigImg"></div>
		
			<div class="carecter_in_win">

				<div class="tolsh">
					<span class = "mobile_title">Толщина:</span> 
					<span class = "content_m"></span>
				</div>

				<div class="sila_t">
					<span class = "mobile_title">Сила тяги (k1%):</span> 
					<span class = "content_m"></span>
				</div>

				<div class="val_min">
					<span class = "mobile_title">Вал (min):</span> 
					<span class = "content_m"></span>
				</div>
				
				<div class="material">
					<span class = "mobile_title">Материал:</span> 
					<span class = "content_m"></span>
				</div>

				<div class="np">
					<span class = "mobile_title">Нож. переход:</span> 
					<span class = "content_m"></span>
				</div>

				<div class="count_sl">
					<span class = "mobile_title">Колличество слоев:</span> 
					<span class = "content_m"></span>
				</div>
				
				<div class="count_tyg_sl">
					<span class = "mobile_title">Тяг. слой:</span> 
					<span class = "content_m"></span>
				</div>

				<div class="dop">
					<span class = "mobile_title">Цвет поверхности:</span> 
					<span class = "content_m"></span>
				</div>

				<div class="lnk">
					<span class = "mobile_title">Подробно:</span> 
					<span class = "content_m"></span>
				</div>
			</div>
		
	</div>
</div>

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
						<div class="val_min">Дипметр вала (min):</div>
						<div class="material">Материал:</div>
						<div class="np">Диаметр обратного вала:</div>
						<div class="count_sl">Колличество слоев:</div>
						<div class="count_tyg_sl">Рабочая температура:</div>
				</div>
				
				<?
				$args = array_merge( $wp_query->query, array( 'posts_per_page' => 100) );
				query_posts($args);
				while ( have_posts() ) : the_post(); ?>
					<div class = "hab_belt_blk hab_belt_blk_pl">
						<div class="image">
						
								<img src="<?php $imgTm = get_the_post_thumbnail_url(get_the_ID(), "tominiatyre");
								echo empty($imgTm) ? get_bloginfo("template_url") . "/img/no-photo.jpg" : $imgTm; ?>" alt="<? the_title(); ?>" loading="lazy">
							 
						</div>

						<div class="title"> 
							<span class = "mobile_title">Артикул:</span> 
							<span class = "content_m"><? the_title(); ?></span>
						</div>

						<div class="tolsh">
							<span class = "mobile_title">Толщина:</span> 
							<span class = "content_m"><? echo carbon_get_post_meta(get_the_ID(), "belt_tolsh"); ?></span>
						</div>

						<div class="sila_t">
							<span class = "mobile_title">Сила тяги (k1%):</span> 
							<span class = "content_m"><? echo carbon_get_post_meta(get_the_ID(), "belt_sila_t"); ?></span>
						</div>

						<div class="val_min">
							<span class = "mobile_title">Дипметр вала (min):</span> 
							<span class = "content_m"><? echo carbon_get_post_meta(get_the_ID(), "belt_minval"); ?></span>
						</div>
						
						<div class="material">
							<span class = "mobile_title">Материал:</span> 
							<span class = "content_m"><? echo carbon_get_post_meta(get_the_ID(), "belt_material"); ?></span>
						</div>

						<div class="np">
							<span class = "mobile_title">Диаметр обратного вала:</span> 
							<span class = "content_m"><? echo carbon_get_post_meta(get_the_ID(), "belt_d_obr_val"); ?></span>
						</div>

						<div class="count_sl">
							<span class = "mobile_title">Колличество слоев:</span> 
							<span class = "content_m"><? echo carbon_get_post_meta(get_the_ID(), "belt_count_sl"); ?></span>
						</div>
						
						<div class="count_tyg_sl">
							<span class = "mobile_title">Рабочая температура:</span> 
							<span class = "content_m"><? echo carbon_get_post_meta(get_the_ID(), "belt_t"); ?></span>
						</div>

						<div class="dop">
							<span class = "mobile_title">Цвет рабочей поверхности:</span> 
							<span class = "content_m"><? echo carbon_get_post_meta(get_the_ID(), "belt_color"); ?></span>
						</div>

						<div class="lnk" style = "display:none">
							<span class = "mobile_title">Подробно:</span> 
							<span class = "content_m"> <a style = "color: #AE0018" target="_blank" href="<? echo carbon_get_post_meta(get_the_ID(), "belt_lnk"); ?>">Скачать</a> </span>
						</div>
					</div>	

				<?php endwhile;?>
			<?php endif; ?> 
		</div>
    </div>
</section>