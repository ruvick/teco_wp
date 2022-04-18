<?php 

/*
Template Name: Страница Карьера
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<main class="page">

  <!-- <section id="title-navigation" class="title-navigation">
    <div class="_container">

			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
			?> 
				<h1 class="title-navigation__title"><?php the_title();?></h1>

		</div>
	</section> -->

  <section class="content job">
    <div class="_container"> 
      <div class="job__banner">
        <div class="job__banner-nuar_blk nuar_blk"></div>
        <h1 class="job__banner-title">Работа в ТЭКО</h1>
        <p class="job__banner-subtitle">
          Мы рады видеть Вас на странице, посвященной работе и карьере в компании ТЭКО. Здесь Вы сможете ознакомится со свежими вакансиями нашей компании, 
          отправить резюме или узнать контакты отдела кадров.
        </p>
        <p class="job__banner-subtitle">
          В нашей компании работают целеустремленные и талантливые люди. Мы не только привлекаем квалифицированные кадры, но и помогаем нашим сотрудникам 
          в обучении, обеспечивая лучшим достойный карьерный рост.
        </p>
        <a href="#callback" class="job__banner-btn btn _popup-link">Отправить заявку</a>
      </div>
    </div>
  </section>

  <section class="job-descp">
    <div class="_container"> 

    <div class="job-descp__spollers-block spollers-block" data-spollers data-one-spoller>

      <div class="spollers-block__item">
        <div class="spollers-block__title spollers-block__descp d-flex" data-spoller>
          <div class="spollers-block__descp-title">Слесарь металлоконструкций</div>
          <div class="spollers-block__descp-conditions d-flex">
            <div class="spollers-block__descp-conditions-schedule">График: <span>5/2</span></div>
            <div class="spollers-block__descp-conditions-salary">З.П.: <span>от 40 000 руб.</span></div>
          </div>
        </div>
        <div class="job-spollers-block__body spollers-block__body">

          <h3 class="job-spollers-block__body-title">Обязанности:</h3>
          <ul class="job-spollers-block__body-list">
            <li class="job-spollers-block__body-list-item">
              Составление конструкторской и технической документации‚ проектирование конвейерного оборудования;
            </li>
            <li class="job-spollers-block__body-list-item">
              Изучение поступающей от других организаций конструкторской документации‚ в целях ее использования при проектировании и конструировании;
            </li>
            <li class="job-spollers-block__body-list-item">
              Согласование разрабатываемых проектов с другими подразделениями предприятия‚ представителями заказчиков и органов надзора‚ 
              экономически обосновывает разрабатываемые конструкции.
            </li>
          </ul>

          <h3 class="job-spollers-block__body-title">Требования:</h3>
          <ul class="job-spollers-block__body-list">
            <li class="job-spollers-block__body-list-item">
              Опыт разработки подъемно-транспортных механизмов;
            </li>
            <li class="job-spollers-block__body-list-item">
              Владение конструкторскими программами;
            </li>
            <li class="job-spollers-block__body-list-item">
              Знание нормативной документации.
            </li>
          </ul>

          <h3 class="job-spollers-block__body-title">Условия:</h3>
          <ul class="job-spollers-block__body-list">
            <li class="job-spollers-block__body-list-item">
              Оформление по ТК РФ‚ режим работы 5/2;
            </li>
            <li class="job-spollers-block__body-list-item">
              Корпоративная связь;
            </li>
            <li class="job-spollers-block__body-list-item">
              Полный соц. пакет.
            </li>
          </ul>

        </div>
      </div>

      <div class="spollers-block__item">
        <div class="spollers-block__title spollers-block__descp d-flex" data-spoller>
          <div class="spollers-block__descp-title">Инженер-конструктор конвейерных систем</div>
          <div class="spollers-block__descp-conditions d-flex">
            <div class="spollers-block__descp-conditions-schedule">График: <span>5/2</span></div>
            <div class="spollers-block__descp-conditions-salary">З.П.: <span>по результатам собеседования</span></div>
          </div>
        </div>
        <div class="job-spollers-block__body spollers-block__body">

          <h3 class="job-spollers-block__body-title">Обязанности:</h3>
          <ul class="job-spollers-block__body-list">
            <li class="job-spollers-block__body-list-item">
              Составление конструкторской и технической документации‚ проектирование конвейерного оборудования;
            </li>
            <li class="job-spollers-block__body-list-item">
              Изучение поступающей от других организаций конструкторской документации‚ в целях ее использования при проектировании и конструировании;
            </li>
            <li class="job-spollers-block__body-list-item">
              Согласование разрабатываемых проектов с другими подразделениями предприятия‚ представителями заказчиков и органов надзора‚ 
              экономически обосновывает разрабатываемые конструкции.
            </li>
          </ul>

          <h3 class="job-spollers-block__body-title">Требования:</h3>
          <ul class="job-spollers-block__body-list">
            <li class="job-spollers-block__body-list-item">
              Опыт разработки подъемно-транспортных механизмов;
            </li>
            <li class="job-spollers-block__body-list-item">
              Владение конструкторскими программами;
            </li>
            <li class="job-spollers-block__body-list-item">
              Знание нормативной документации.
            </li>
          </ul>

          <h3 class="job-spollers-block__body-title">Условия:</h3>
          <ul class="job-spollers-block__body-list">
            <li class="job-spollers-block__body-list-item">
              Оформление по ТК РФ‚ режим работы 5/2;
            </li>
            <li class="job-spollers-block__body-list-item">
              Корпоративная связь;
            </li>
            <li class="job-spollers-block__body-list-item">
              Полный соц. пакет.
            </li>
          </ul>

        </div>
      </div>

      <div class="spollers-block__item">
        <div class="spollers-block__title spollers-block__descp d-flex" data-spoller>
          <div class="spollers-block__descp-title">Офис-менеджер, помощник руководителя</div>
          <div class="spollers-block__descp-conditions d-flex">
            <div class="spollers-block__descp-conditions-schedule">График: <span>5/2</span></div>
            <div class="spollers-block__descp-conditions-salary">З.П.: <span>от 25 000 руб.</span></div>
          </div>
        </div>
        <div class="job-spollers-block__body spollers-block__body">

          <h3 class="job-spollers-block__body-title">Обязанности:</h3>
          <ul class="job-spollers-block__body-list">
            <li class="job-spollers-block__body-list-item">
              Составление конструкторской и технической документации‚ проектирование конвейерного оборудования;
            </li>
            <li class="job-spollers-block__body-list-item">
              Изучение поступающей от других организаций конструкторской документации‚ в целях ее использования при проектировании и конструировании;
            </li>
            <li class="job-spollers-block__body-list-item">
              Согласование разрабатываемых проектов с другими подразделениями предприятия‚ представителями заказчиков и органов надзора‚ 
              экономически обосновывает разрабатываемые конструкции.
            </li>
          </ul>

          <h3 class="job-spollers-block__body-title">Требования:</h3>
          <ul class="job-spollers-block__body-list">
            <li class="job-spollers-block__body-list-item">
              Опыт разработки подъемно-транспортных механизмов;
            </li>
            <li class="job-spollers-block__body-list-item">
              Владение конструкторскими программами;
            </li>
            <li class="job-spollers-block__body-list-item">
              Знание нормативной документации.
            </li>
          </ul>

          <h3 class="job-spollers-block__body-title">Условия:</h3>
          <ul class="job-spollers-block__body-list">
            <li class="job-spollers-block__body-list-item">
              Оформление по ТК РФ‚ режим работы 5/2;
            </li>
            <li class="job-spollers-block__body-list-item">
              Корпоративная связь;
            </li>
            <li class="job-spollers-block__body-list-item">
              Полный соц. пакет.
            </li>
          </ul>

        </div>
      </div>

      <div class="spollers-block__item">
        <div class="spollers-block__title spollers-block__descp d-flex" data-spoller>
          <div class="spollers-block__descp-title">Менеджер по продажам</div>
          <div class="spollers-block__descp-conditions d-flex">
            <div class="spollers-block__descp-conditions-schedule">График: <span>5/2</span></div>
            <div class="spollers-block__descp-conditions-salary">З.П.: <span>по результатам собеседования</span></div>
          </div>
        </div>
        <div class="job-spollers-block__body spollers-block__body">

          <h3 class="job-spollers-block__body-title">Обязанности:</h3>
          <ul class="job-spollers-block__body-list">
            <li class="job-spollers-block__body-list-item">
              Составление конструкторской и технической документации‚ проектирование конвейерного оборудования;
            </li>
            <li class="job-spollers-block__body-list-item">
              Изучение поступающей от других организаций конструкторской документации‚ в целях ее использования при проектировании и конструировании;
            </li>
            <li class="job-spollers-block__body-list-item">
              Согласование разрабатываемых проектов с другими подразделениями предприятия‚ представителями заказчиков и органов надзора‚ 
              экономически обосновывает разрабатываемые конструкции.
            </li>
          </ul>

          <h3 class="job-spollers-block__body-title">Требования:</h3>
          <ul class="job-spollers-block__body-list">
            <li class="job-spollers-block__body-list-item">
              Опыт разработки подъемно-транспортных механизмов;
            </li>
            <li class="job-spollers-block__body-list-item">
              Владение конструкторскими программами;
            </li>
            <li class="job-spollers-block__body-list-item">
              Знание нормативной документации.
            </li>
          </ul>

          <h3 class="job-spollers-block__body-title">Условия:</h3>
          <ul class="job-spollers-block__body-list">
            <li class="job-spollers-block__body-list-item">
              Оформление по ТК РФ‚ режим работы 5/2;
            </li>
            <li class="job-spollers-block__body-list-item">
              Корпоративная связь;
            </li>
            <li class="job-spollers-block__body-list-item">
              Полный соц. пакет.
            </li>
          </ul>

        </div>
      </div>
      
    </div>

    </div>
  </section>

<?get_template_part('template-parts/question', 'section');?>

</main>

<?php get_footer(); 
