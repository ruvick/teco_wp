<?

// Описание полей для Carbon_Fields производим только в этом файле
// 1. В начале идет описание полей - Настройки темы  далее категорий (если необходимо) в конце аблонов страниц и записей
// 2. Префиксы проставляем каждый раз новые осмысленно по имени проекта 
// 3. Для Полей которые входят в состав составново схема именования следующая <Общий префикс>_<название составного поля>_<имя поля>
// 4. Название секций Так же придумываем осмысленные на русском языке чтобы небыло сплошных Доп. полей
// 5. Каждый блок комментируем


use Carbon_Fields\Container;
use Carbon_Fields\Field; 

//Поля рубрик
Container::make('term_meta', 'as_term_catalog', 'Дополнительные поля рубрики')
->where( 'term_taxonomy', '=', 'category' )
  ->add_fields(array(
    Field::make('image', 'term_bnr_photo', 'Баннер для простой категории'),
    Field::make('image', 'term_photo', 'Фото категории'),
    Field::make('image', 'term_photo_webp', 'Фото категории WEBP'),
    Field::make('text', 'term_index', 'Индекс сортировки'),
    Field::make( 'complex', 'cat_mat_complex', "Материалы для категории" )
      ->add_fields( array(
      Field::make('image', 'cat_mat_img', 'Изображение' )->set_width(15),
      Field::make('text', 'cat_mat_title', 'Название')->set_width(50),
      Field::make('file', 'cat_mat_file', 'Файл')->set_width(50)    
      ->set_value_type('url'),  
  ) ),
  ) );

  Container::make('post_meta', 'single-prutkovie', 'Прутковые транспортеры')
  ->show_on_template(array('single-prutkovie.php'))
      ->add_fields(array(   
      Field::make( 'complex', 'prut_complex', "Карточка" )
        ->add_fields( array(
          Field::make('image', 'prut_complex_img', 'Изображение' )->set_width(50),
          Field::make('text', 'prut_complex_title', 'Наименование')->set_width(50),
          Field::make('text', 'prut_complex_descp', 'Описание')->set_width(100),       
      ) ),
    

  ));

  Container::make('post_meta', 'tsepi_param', 'Параметры цепи')
  ->show_on_template(array('single-tsepi.php'))
      ->add_fields(array(   
        Field::make('image', 'tsepi_img', 'Изображение' )->set_width(30),
        Field::make('text', 'tsepi_table_name', 'Имя таблицы' )->set_width(30),
        Field::make('text', 'tsepi_table_id', 'Идентификатор в таблице' )->set_width(30),
        Field::make('rich_text', 'tsepi_description', 'Дополнительное описание товара')->set_width(100)

  ));

Container::make('post_meta', 'belt_param', 'Набор конвейерных лент')
->show_on_template(array( 'single-belt-habasit.php'))
    ->add_fields(array(   
        Field::make('text', 'belt_item_title', 'Заголовок')->set_width(100),
        Field::make('image', 'belt_item_img', 'Изображение' )->set_width(50),
        Field::make('image', 'belt_item_img_2', 'Изображение 2' )->set_width(50),
        
        Field::make('text', 'belt_count_sl', 'Колличество слоев')->set_width(100),
        Field::make('text', 'belt_sila_t', 'Нагруз­ка при 1% растя жении ­Н/мм')->set_width(50), 
        Field::make('text', 'belt_tolsh', 'Толщина')->set_width(100),
        Field::make('text', 'belt_material', 'Материал')->set_width(100), 
        
        Field::make('text', 'belt_material_rabpov', 'Материал рабочей поверхности')->set_width(100), 
        Field::make('text', 'belt_material_privpov', 'Материал приводной поверхности')->set_width(100), 
        Field::make('text', 'belt_minval', 'Min дипметр вала')->set_width(100), 
        Field::make('text', 'belt_d_obr_val', 'Диаметр обратного вала')->set_width(100), 
        Field::make('text', 'belt_t', 'Рабочая температура')->set_width(100), 
        Field::make('text', 'belt_color', 'Цвет рабочей поверхности')->set_width(100), 
        Field::make('text', 'belt_antista', 'Антистатичность')->set_width(100), 
        Field::make('text', 'belt_lnk', 'Ссылка')->set_width(100), 

                     
));

 Container::make('post_meta', 'belt_param', 'Набор конвейерных лент')
  ->show_on_template(array( 'single-belt.php', 'single-podshipniki.php', 'single-belt-modul.php', 'single-prutkovie-komplekt.php', 'single-prutkovie.php'))
      ->add_fields(array(   
      Field::make( 'complex', 'belt_item', "Конвейерные ленты раздела" )
        ->add_fields( array(
          Field::make('text', 'belt_item_title', 'Заголовок')->set_width(100),
          Field::make('image', 'belt_item_img', 'Изображение' )->set_width(30),
          Field::make('image', 'belt_item_img_shem', 'Чертеж' )->set_width(30),
          Field::make('rich_text', 'belt_item_description', 'Описание товара')->set_width(30),
          Field::make('rich_text', 'belt_item_table', 'Таблица характеристик')->set_width(100)      
      ) ),
  ));

  Container::make('post_meta', 'belt_param', 'Конвейеры')
  ->show_on_template(array('single-conveyer.php'))
      ->add_fields(array(   
      Field::make( 'complex', 'belt_item', "Подвиды конвейеров" )
        ->add_fields( array(
          Field::make('text', 'belt_item_title', 'Заголовок')->set_width(100),
          Field::make('image', 'belt_item_img', 'Изображение' )->set_width(50),
          Field::make('rich_text', 'belt_item_description', 'Описание товара')->set_width(50),
          Field::make('rich_text', 'belt_item_table', 'Таблица характеристик')->set_width(100)      
      ) ),
    

  ));

  Container::make('post_meta', 'vozduhividu_param', 'Шланги и воздуховоды ПВХ')
  ->show_on_template(array('single-vozduhividu.php'))
      ->add_fields(array(   
      Field::make( 'complex', 'vozduh_complex', "Карточка" )
        ->add_fields( array(
          Field::make('image', 'vozduh_complex_img', 'Изображение' )->set_width(50),
          Field::make('text', 'vozduh_complex_title', 'Заголовок')->set_width(50),
          Field::make('text', 'vozduh_complex_temp', 'Рабочая температура')->set_width(100),     
          Field::make('text', 'vozduh_complex_diam', 'Диаметр')->set_width(100),     
          Field::make('text', 'vozduh_complex_davlenie', 'Давление')->set_width(100),     
          Field::make('text', 'vozduh_complex_vak', 'Вакуум')->set_width(100),     
      ) ),
    

  ));


  Container::make('post_meta', 'strap_param', 'Параметры приводных ремней')
  ->show_on_template(array('single-belt-charect.php'))
      ->add_fields(array(   
      Field::make( 'complex', 'strap_item', "Приводные ремни" )
        ->add_fields( array(
        Field::make('text', 'strap_title', 'Заголовок')->set_width(100), 
        Field::make('rich_text', 'strap_title_descript', 'Текст над таблицей')->set_width(100), 
        Field::make('image', 'strap_item_char_img_1', 'Изображение 1' )->set_width(50),
        Field::make('image', 'strap_item_char_img_2', 'Изображение 2' )->set_width(50),
        Field::make('rich_text', 'strap_item_table_char', 'Таблица характеристик')->set_width(100),
        Field::make('rich_text', 'strap_charect', 'Харрактеристики (Описание)')->set_width(50),  
      ) ),
    

  ));

  Container::make('post_meta', 'vacancies', 'Вакансии')
  ->show_on_template(array('page-vacancies.php'))
      ->add_fields(array(   
      Field::make( 'complex', 'vacancies_complex', "Вакансии" )
        ->add_fields( array(
          Field::make('text', 'vacancies_name', 'Наименование вакансии')->set_width(100),
          Field::make('rich_text', 'vacancies_duties', 'Обязанности')->set_width(50),    
          Field::make('rich_text', 'vacancies_requirements', 'Требования')->set_width(50),  
          Field::make('text', 'vacancies_schedule', 'График')->set_width(50),    
          Field::make('rich_text', 'vacancies_salary', 'Заработная плата')->set_width(50), 
      ) ),
    

  ));

  Container::make('post_meta', 'singlebanner', 'Поля для записи')
  ->show_on_template(array('single-progect.php'))
      ->add_fields(array(   
        Field::make('image', 'singlebanner_img_1', 'Баннер' )->set_width(100),
  ));

  // Container::make('post_meta', 'belt_param', 'Клиновые ремни')
  // ->show_on_template(array('single-belt-charect.php'))
  //     ->add_fields(array(   
  //       Field::make('text', 'title_descript', 'Заголовок описания')->set_width(100), 
  //       Field::make('text', 'text_descript', 'Текст описание')->set_width(100), 
  //       Field::make('image', 'belt_item_char_img_1', 'Изображение 1' )->set_width(50),
  //       Field::make('image', 'belt_item_char_img_2', 'Изображение 2' )->set_width(50),
  //       Field::make('rich_text', 'belt_item_table_char', 'Таблица характеристик')->set_width(100),
  //       Field::make('rich_text', 'belt_charect', 'Харрактеристики')->set_width(50), 
  //     // Field::make( 'complex', 'belt_item', "Клиновые ремни раздела" )
  //     //   ->add_fields( array(
  //     //     Field::make('text', 'belt_item_title', 'Заголовок')->set_width(100),
  //     //     Field::make('image', 'belt_item_img', 'Изображение' )->set_width(50),
  //     //     Field::make('rich_text', 'belt_item_description', 'Описание товара')->set_width(50),
  //     //     Field::make('rich_text', 'belt_item_table', 'Таблица характеристик')->set_width(100)      
  //     // ) ),
    

  // ));

Container::make( 'theme_options', __( 'Настройки темы', 'crb' ) )
    ->add_tab('Главная', array(
      // Field::make( 'image', 'as_logo', 'Логотип в шапке')
      //   ->set_width(30),
      // Field::make( 'image', 'as_logo_white', 'Логотип в подвале')
      //   ->set_width(30),
      Field::make('text', 'about_home_title', 'Заголовок на главной'), 
      Field::make('rich_text', 'about_home', 'О нашей компании')
    ))
    ->add_tab('Слайдер', array(
      Field::make('complex', 'slider_index', 'Слайдер на главной')
        ->add_fields(array(
          Field::make('image', 'slider_img', 'Картинка слайдера')
            ->set_width(50),
          Field::make('text', 'slider_title', 'Заголовок слайдера')
            ->set_width(50),
          Field::make('text', 'slider_subtitle', 'Подзаголовок слайдера')
            ->set_width(100),
          Field::make('text', 'slider_lnk', 'Ссылка на раздел')
            ->set_width(100),
        ))
    ))
    ->add_tab('Команда', array(
      Field::make('complex', 'complex_team', 'Выводим карточки Команды')
      // ->set_max(3) // Можно будет выбрать только 5 постов
      ->add_fields(array(
        Field::make('image', 'img_team', 'Фото')
        ->set_width(10),
        Field::make('text', 'name_team', 'Имя')   
        ->set_width(10),
        Field::make('text', 'special_team', 'Должность')   
        ->set_width(10),
        Field::make('text', 'phone_team', 'Телефон')   
        ->set_width(15),
        Field::make('text', 'e-mail_team', 'E-mail')   
        ->set_width(15),
        )) 
    ))
    ->add_tab('Контакты', array(
        Field::make( 'text', 'as_company', __( 'Название' ) )
          ->set_width(50),
        Field::make( 'text', 'as_schedule', __( 'Режим работы' ) )
          ->set_width(50),
        Field::make( 'text', 'as_phones_1', __( 'Телефон' ) )
          ->set_width(50),
        Field::make( 'text', 'as_phone_2', __( 'Телефон дополнительный' ) )
          ->set_width(50),
        Field::make( 'text', 'as_email', __( 'Email' ) )
          ->set_width(50),
        Field::make( 'text', 'as_email_send', __( 'Email для отправки' ) ) 
          ->set_width(50),
        Field::make( 'text', 'as_inn', __( 'ИНН' ) )
          ->set_width(50),
        Field::make( 'text', 'as_orgn', __( 'ОРГН' ) )
          ->set_width(50),
        Field::make( 'text', 'as_kpp', __( 'КПП' ) )
          ->set_width(50),
        Field::make( 'text', 'as_address', __( 'Адрес' ) )
          ->set_width(50),
        Field::make( 'text', 'as_bik', __( 'БИК' ) )
          ->set_width(50),
        Field::make( 'text', 'as_rs', __( 'Р/С' ) )
          ->set_width(50),
        Field::make( 'text', 'as_ks', __( 'К/С' ) )
          ->set_width(50),
        Field::make( 'text', 'as_bank', __( 'БАНК' ) )
          ->set_width(50),
        Field::make( 'text', 'as_insta', __( 'instagram' ) )
          ->set_width(50),
        Field::make( 'text', 'as_face', __( 'facebook' ) )
          ->set_width(50),
        Field::make( 'text', 'as_vk', __( 'Вконтакте' ) )
          ->set_width(50),
        Field::make( 'text', 'as_telegr', __( 'telegram' ) )
          ->set_width(50),
        Field::make( 'text', 'as_whatsapp', __( 'whatsapp' ) )
          ->set_width(50),
        Field::make('text', 'map_point', 'Координаты карты')
          ->set_width(50),
        Field::make('text', 'text_map', 'Текст метки карты')
          ->set_width(50),
        Field::make("file", "mp_partner", "Карта партнера")
          ->set_value_type('url') // сохранить в метаполе ссылку на файл
          ->set_width(50),
    ) );
    Container::make('post_meta', 'ultra_product_cr', 'Характеристики товара')
    ->show_on_post_type(array( 'ultra'))
      ->add_fields(array(   
      Field::make('textarea', 'offer_smile_descr', 'Краткое описание')->set_width(100),
      // Field::make('text', 'offer_name', 'Название товара')->set_width(30),
      // Field::make('text', 'offer_label', 'Метка на товаре')->set_width(30),
      Field::make('text', 'offer_weight', 'Вес')->set_width(50),
      // Field::make('text', 'offer_allsearch', 'Все артикулы для поиска')->set_width(50),
      // Field::make('text', 'offer_siries', 'Серия (для сопутствующих)')->set_width(30),
      Field::make('text', 'offer_sticker', 'Стикер')->set_width(50), 
      Field::make('text', 'offer_price', 'Цена')->set_width(50),
      Field::make('text', 'offer_number', 'Колличество')->set_width(50),
      Field::make('text', 'offer_sku', 'Артикул (Базовый)')->set_width(50),
      // Field::make('text', 'offer_benefit', 'Выгода')->set_width(50),
      Field::make('rich_text', 'prod_descrip', 'Описание товара')->set_width(100),
      Field::make('text', 'offer_calories', 'Калории')->set_width(50),
      Field::make('text', 'offer_protein', 'Белки')->set_width(50),
      Field::make('text', 'offer_fats', 'Жиры')->set_width(50),
      Field::make('text', 'offer_carbohyd', 'Углеводы')->set_width(50),

      // Field::make( 'complex', 'offer_cherecter', "Характеристики товара табы, левая колонка" )
      // ->add_fields( array(
      //   Field::make( 'text', 'tab_name', 'Наименование параметра' )->set_width(50),
      //   Field::make( 'text', 'tab_val',  'Значение' )->set_width(50),
      // ) ),
      // Field::make( 'complex', 'offer_cherecter-r', "Характеристики товара табы, правая колонка" )
      // ->add_fields( array(
      //   Field::make( 'text', 'tab_name-r', 'Наименование параметра' )->set_width(50),
      //   Field::make( 'text', 'tab_val-r',  'Значение' )->set_width(50),
      // ) ),
      // Field::make('rich_text', 'acses_text', 'Аксесуары')->set_width(100),
      
      // Field::make('text', 'offer_old_price', 'Старая цена (Базовая)')->set_width(50),
      
      // Field::make( 'complex', 'offer_modification', "Модификация товара" )
      // ->add_fields( array(
      //   Field::make('text', 'mod_name', 'Наименование модификации' )->set_width(20),
      //   Field::make('text', 'mod_sku', 'Артикул модификации')->set_width(20),
      //   Field::make('text', 'mod_price', 'Цена модификации')->set_width(20),
      //   Field::make('text', 'mod_old_price', 'Старая цена модификации')->set_width(20),
      //   Field::make('text', 'mod_picture_id', 'Изображения модификации')->set_width(20),
      // ) ),
        
      Field::make( 'complex', 'offer_picture', "Галерея товара" )
      ->add_fields( array(
        Field::make('image', 'gal_img', 'Изображение' )->set_width(30),
        Field::make('text', 'gal_img_sku', 'ID для модификации')->set_width(30),
        Field::make('text', 'gal_img_alt', 'alt и title')->set_width(30)        
      ) ),

    //   Field::make('complex', 'complex_analogs', 'Ближайшие аналоги')
    //     ->set_max(4) // Можно будет выбрать только 5 постов
    //   ->add_fields(array(
    //     Field::make('image', 'img_analogs', 'Фото')
    //       ->set_width(33),
    //     Field::make('text', 'price_analogs', 'Цена') 
    //       ->set_width(33),
    //     Field::make('text', 'link_analogs', 'Ссылка на товар') 
    //       ->set_width(33),
    // ))

  ));

  // Container::make('post_meta', 'single-galery', 'Характеристики записи')
  // ->show_on_template(array('single-galery.php'))
  //     ->add_fields(array(   
  //     Field::make('text', 'number_img', 'Колличество изображений') 
  //       ->set_width(33),
  //     Field::make( 'complex', 'galery_prod_complex', "Сопутствующие товары" )
  //       ->set_max(2) // Можно будет выбрать только 2 поста
  //       ->add_fields( array(
  //         Field::make('image', 'galery_works_img', 'Изображение' )->set_width(30),
  //         Field::make('text', 'galery_prod_title', 'Название товара')->set_width(30),
  //         Field::make('text', 'galery_prod_price', 'Стоимость товара')->set_width(50),
  //         Field::make('text', 'galery_prod_link', 'Ссылка на товар')->set_width(50)      
  //     ) ),
  //     Field::make( 'complex', 'galery_works', "Галерея наших работ" )
  //     ->add_fields( array(
  //       Field::make('image', 'galery_works_img', 'Изображение' )->set_width(30),
  //       Field::make('text', 'galery_works_img_sku', 'ID для модификации')->set_width(30),
  //       Field::make('text', 'galery_works_img_alt', 'alt и title')->set_width(30)        
  //     ) ),
  //     Field::make( 'complex', 'galery_fabrics', "Галерея тканей" )
  //     ->add_fields( array(
  //       Field::make('image', 'galery_fabrics_img', 'Изображение' )->set_width(30),
  //       Field::make('text', 'galery_fabrics_img_alt', 'alt и title')->set_width(30)        
  //     ) ),

  // ));

  // Container::make('post_meta', 'page-gallery-tkaney-obivki-sidenii', 'Характеристики записи')
  // ->show_on_template(array('page-gallery-tkaney-obivki-sidenii.php'))
  //     ->add_fields(array(   
  //     Field::make( 'complex', 'galery_velours', "Велюр" )
  //     ->add_fields( array(
  //       Field::make('image', 'galery_velours_img', 'Изображение' )->set_width(30),
  //       Field::make('text', 'galery_velours_img_alt', 'alt и title')->set_width(30)        
  //     ) ),

  //     Field::make( 'complex', 'galery_eco', "Эко-Кожа" )
  //     ->add_fields( array(
  //       Field::make('image', 'galery_eco_img', 'Изображение' )->set_width(30),
  //       Field::make('text', 'galery_eco_img_alt', 'alt и title')->set_width(30)        
  //     ) ),

  //     Field::make( 'complex', 'galery_leather', "Кожа" )
  //     ->add_fields( array(
  //       Field::make('image', 'galery_leather_img', 'Изображение' )->set_width(30),
  //       Field::make('text', 'galery_leather_img_alt', 'alt и title')->set_width(30)        
  //     ) ),

  // ));

?>