<footer id="footer" class="footer">
	<div class="footer__container _container">

		<div class="footer__row d-flex">

			<a href="<? bloginfo("url"); ?>" class="logo-icon footer__logo"></a>

			<?php wp_nav_menu( array('theme_location' => 'menu_main','menu_class' => 'menu-list footer__menu-list d-flex',
			    'container_class' => 'menu-list footer__menu-list d-flex','container' => false )); ?>

			<div class="contacts d-flex">
			<? $tel = carbon_get_theme_option("as_phones_1"); 
					if (!empty($tel)){?><a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel); ?>" class="contacts__phone"><? echo $tel; ?></a><?}?>
				<p class="contacts__time-phone">Бесплатный звонок по России</p>
			</div>

		</div>

	</div>
</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>