<?
    //php teko.msk.ru/docs/wp-content/themes/teco/pars/parse_habasit_lnk.php

    ini_set('max_execution_time', 900);

    set_include_path('teko.msk.ru/docs/');

    require_once("wp-config.php");

            
    require_once ABSPATH . 'wp-admin/includes/media.php';
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    
    require_once dirname(__FILE__) . '/Classes/PHPExcel.php';

    function url_exist($url) {
        $urlHeaders = @get_headers($url);
        if(strpos($urlHeaders[0], '200')) {
            return true;
        } else {
            return false;
        } 
    }

    $inputFileName = dirname(__FILE__) .'/habasit_belt.xlsx';

    $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);

    $i = 2;

    while (!empty($objPHPExcel->getSheet(0)->getCell('A'.$i)->getValue()) )
    {
        

        
        $tov_data = array(
            "name" => $objPHPExcel->getSheet(0)->getCell('A'.$i)->getValue(),           // Наименование
            "info" => $objPHPExcel->getSheet(0)->getCell('B'.$i)->getValue(),
            "sloi" => $objPHPExcel->getSheet(0)->getCell('D'.$i)->getValue(),           // Слои
            "nagr_rast_1" => $objPHPExcel->getSheet(0)->getCell('E'.$i)->getValue(),    // Нагруз­ка при 1% растя жении ­Н/мм
            "tolsh" => $objPHPExcel->getSheet(0)->getCell('F'.$i)->getValue(),          // Толщина ленты
            "material" => $objPHPExcel->getSheet(0)->getCell('G'.$i)->getValue(),       // Материал
            "rab_pov" => $objPHPExcel->getSheet(0)->getCell('H'.$i)->getValue(),        // Материал рабочей поверхности
            "priv_pov" => $objPHPExcel->getSheet(0)->getCell('I'.$i)->getValue(),       // Материал приводной поверхности
            "diam_val" => $objPHPExcel->getSheet(0)->getCell('J'.$i)->getValue(),       // min дипметр вала
            "diam_obr_val" => $objPHPExcel->getSheet(0)->getCell('J'.$i)->getValue(),   // Диаметр обратного вала
            "t" => $objPHPExcel->getSheet(0)->getCell('L'.$i)->getValue(),              // Рабочая температура 
            "color" => $objPHPExcel->getSheet(0)->getCell('M'.$i)->getValue(),          // Цвет рабочей поверхности
            "antistat" => $objPHPExcel->getSheet(0)->getCell('N'.$i)->getValue(),       // Антистатичность
            "cat" => $objPHPExcel->getSheet(0)->getCell('O'.$i)->getValue()             // Категория
        );

        $posts = get_posts( array(
            'numberposts' => -1,
            'post_type' => "post",
            'meta_key' => "_belt_item_title",
            'meta_value' => $tov_data["name"]
        ) );

        if (!empty($posts)) {
            update_post_meta( $posts[0]->ID, '_belt_lnk', $tov_data["info"]); 
            echo $posts[0]->ID . " " .$tov_data["name"]. " " .$tov_data["info"]."\n\r";
            
        }
         


        
        $i++;
    }
?>