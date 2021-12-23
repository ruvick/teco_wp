<footer id="footer" class="footer">
	<div class="footer__container _container">

		<div class="footer__row d-flex">

			<a href="index.html" class="logo-icon footer__logo">
				<!-- <? bloginfo("url"); ?> -->
			</a>

			<ul class="menu-list footer__menu-list d-flex">
				<li class="menu-list__item"><a href="#" class="menu-list__link">Каталог</a></li>
				<li class="menu-list__item"><a href="#" class="menu-list__link">Наши работы</a></li>
				<li class="menu-list__item"><a href="#" class="menu-list__link">Контакты</a></li>
			</ul>

			<div class="contacts d-flex">
				<a href="tel:88003454567" class="contacts__phone">8 800 345-45-67</a>
				<!-- <a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel); ?>"><? echo $tel = carbon_get_theme_option("as_phone_1"); ?></a> -->
				<p class="contacts__time-phone">Бесплатный звонок по России</p>
			</div>

		</div>

	</div>
</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>