<header id="header" class="header">
  <div class="header__container _container">

    <div class="header__row d-flex">

      <a href="<? bloginfo("url"); ?>" class="logo-icon header__logo"></a>

      <div class="header__navigation">
        <?php wp_nav_menu( array('theme_location' => 'menu_main','menu_class' => 'menu-list header__menu-list',
						'container_class' => 'menu-list header__menu-list','container' => false )); ?>

        <div class="contacts header__contacts d-flex">
        <? $tel = carbon_get_theme_option("as_phones_1"); 
					if (!empty($tel)){?><a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel); ?>" class="contacts__phone header__phone"><? echo $tel; ?></a><?}?>          
          <p class="contacts__time-phone header__time-phone"><a style = "color:white" href="mailto:<?echo carbon_get_theme_option("as_email");?>"><?echo carbon_get_theme_option("as_email");?></a></p>
        </div>
        <a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel); ?>" class="mob-phone-icon header__mob-phone-icon"></a>

        <a href="<?php echo carbon_get_theme_option('as_vk'); ?>" class="header__soc-block-icon-link soc-block-icon-link soc-icon-vk soc-icon-vk_white"></a>
        <a href="<?php echo carbon_get_theme_option('as_as_whatsapp'); ?>" class="header__soc-block-icon-link soc-block-icon-link soc-icon-vk soc-icon-whatsapp_white"></a>

        <a href="#callback" class="header__popup-link _popup-link	btn btn_white">Заказать звонок</a>

        <div class="icon-menu" aria-label="Бургер меню">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>

    </div>
  </div>
</header>

<!-- Мобильное меню -->
<div class="mob-menu header__mob-menu">
  <?php wp_nav_menu( array('theme_location' => 'menu_main','menu_class' => 'mob-menu__list',
		'container_class' => 'mob-menu__list','container' => false )); ?> 
  <a href="#callback" class="header__popup-link header__popup-link_mob _popup-link">ЗАКАЗАТЬ ЗВОНОК</a>
</div>