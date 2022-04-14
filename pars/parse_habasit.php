<?
    //php www/lightsnab.ru/wp-content/themes/light-shop/pars/inexcel/inexcel.php

    ini_set('max_execution_time', 900);

    require_once("../../../../wp-config.php");
            
    require_once ABSPATH . 'wp-admin/includes/media.php';
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    
    require_once dirname(__FILE__) . '/Classes/PHPExcel.php';

    $inputFileName = './habasit_belt.xlsx';

    $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
?>