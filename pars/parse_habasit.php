<?
    //php teko.msk.ru/docs/wp-content/themes/teco/pars/parse_habasit.php

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

        $post_id = wp_insert_post(  wp_slash( array(
            'post_type'     => 'post',
            'post_author'    => 1,
            'post_status'    => 'publish',
            'post_title' => $tov_data["name"],
            'post_excerpt'  => $tov_data["name"],
            'post_content'  => $tov_data["name"],
            'meta_input'     => array(
                "_belt_item_title" => $tov_data["name"],
                "_belt_count_sl" => $tov_data["sloi"],
                "_belt_sila_t" => $tov_data["nagr_rast_1"],
                "_belt_tolsh" => $tov_data["tolsh"],
                "_belt_material" => $tov_data["material"],
                "_belt_material_rabpov" => $tov_data["rab_pov"],
                "_belt_material_privpov" => $tov_data["priv_pov"],
                "_belt_minval" => $tov_data["diam_val"],
                "_belt_d_obr_val" => $tov_data["diam_obr_val"],
                "_belt_t" => $tov_data["t"],
                "_belt_color" => $tov_data["color"],
                "_belt_antista" => $tov_data["antistat"],
                "_wp_page_template" => "single-belt-habasit.php"
            ),
            
        ) ) );



        $img1 = get_bloginfo("template_url").'/pars/habasit_img/'. $tov_data["name"].".jpg";       
        // if (url_exist($img1)) {
        //     $img1 = get_bloginfo("template_url").'/pars/habasit_img/'. $tov_data["name"].".png";       
        // }

        echo $img1."\n\r";
        
        $ttl = $tov_data["name"];
        $img_id = media_sideload_image( $img1, $post_id, $ttl, "id" );
        add_post_meta( $post_id, '_belt_item_img', $img_id, true );
        set_post_thumbnail($post_id, $img_id);

        $postCat = array(6,0);
        if (trim ($catName) === "Ленты пищевые") $postCat = array(6,23);
        if (trim ($catName) === "Ремни") $postCat = array(6,24);
        if (trim ($catName) === "Ленты для деревообработки, пластмассы и изготовления мебели") $postCat = array(6,25);

        wp_set_object_terms( $post_id, $postCat, "category" );

        
        $i++;
    }
?>