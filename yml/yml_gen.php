<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
global $USER;
if ($USER->IsAdmin()){
    $result = [];
    $result['ERROR'] = '';
    CModule::IncludeModule('iblock');
    if(empty($_REQUEST['sections'])){
        $result['ERROR'] = 'Не указаны разделы!!!';
    }else{
        $result['ERROR'] = '';

        //цвета
        CModule::IncludeModule('highloadblock');
        $hlblock_id = 1; // ID вашего Highload-блока
        $hlblock   = Bitrix\Highloadblock\HighloadBlockTable::getById( $hlblock_id )->fetch(); // получаем объект вашего HL блока
        $entity   = Bitrix\Highloadblock\HighloadBlockTable::compileEntity( $hlblock );  // получаем рабочую сущность
        $entity_data_class = $entity->getDataClass(); // получаем экземпляр класса
        $entity_table_name = $hlblock['Tsveta']; // присваиваем переменной название HL таблицы
        $sTableID = 'tbl_'.$entity_table_name; // добавляем префикс и окончательно формируем название
        $arSelect = array('*'); // выбираем все поля
        $arOrder = array(); // сортировка будет по возрастанию ID статей

        $rsData = $entity_data_class::getList(array(
            "select" => array('UF_*'),
            "filter" => array(),
            "limit" => '50', //ограничим выборку пятью элементами
            "order" => $arOrder
        ));

        $rsData = new CDBResult($rsData, $sTableID); // записываем в переменную объект CDBResult
        $colors = [];
        while($arRes = $rsData->Fetch()){
            $colors[$arRes['UF_XML_ID']] = $arRes['UF_NAME'];
        }


        //формируем файл


        $url_path = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'];

        $out = '<?xml version="1.0" encoding="UTF-8"?>' . "\r\n";
        $out = '<!DOCTYPE yml_catalog SYSTEM "shops.dtd">' . "\r\n";
        $out .= '<yml_catalog date="' . date('Y-m-d H:i') . '">' . "\r\n";
        $out .= '<shop>' . "\r\n";

        // Короткое название магазина, должно содержать не более 20 символов.
        $out .= '<name>'.$_REQUEST['shop'].'</name>' . "\r\n";

        // Полное наименование компании, владеющей магазином.
        $out .= '<company>'.$_REQUEST['firm'].'</company>' . "\r\n";

        // URL главной страницы магазина.
        $out .= '<url>'.$url_path.'</url>' . "\r\n";

        // Список курсов валют магазина.
        $out .= '<currencies>' . "\r\n";
        $out .= '<currency id="RUR" rate="1"/>' . "\r\n";
        $out .= '</currencies>' . "\r\n";


        // Список категорий магазина:

        $categories = [];
        $arFilter = Array('IBLOCK_CODE'=>"catalog","ID" => $_REQUEST['sections']);
        $db_list = CIBlockSection::GetList(Array("NAME"=> "ASC"), $arFilter, true);
        while($ar_result = $db_list->GetNext()) {
            $categories[] = $ar_result;
        }
        $out .= '<categories>' . "\r\n";
        foreach ($categories as $row) {
            $out .= '<category id="' . $row['ID'] . '">'
                . $row['NAME'] . '</category>' . "\r\n";
        }

        $out .= '</categories>' . "\r\n";

        // Вывод товаров:
        $prods = [];
        $p = 0;
        $arSelect = Array("ID", "NAME","DETAIL_PAGE_URL","DETAIL_TEXT","DETAIL_PICTURE","PROPERTY_*");
        $arFilter = Array('IBLOCK_CODE'=>"catalog", "IBLOCK_SECTION_ID"=>$_REQUEST['sections'], "ACTIVE"=>"Y");
        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
        while($ob = $res->GetNextElement()){
            $prods[$p] = $ob->GetFields();
            $prods[$p]['PROP'] = $ob->GetProperties();
            $p++;
        }

        $result['print'] = $prods;

        $out .= '<offers>' . "\r\n";
        foreach ($prods as $row) {
            $out .= '<offer id="'.$row['ID'].'" available="true">' . "\r\n";

            // URL страницы товара на сайте магазина.
            $out .= '<url>'.$url_path.''.$row['DETAIL_PAGE_URL'].'</url>' . "\r\n";

            $out .= '<price>' . $row['PROP']['PRICE']['VALUE']. '</price>' . "\r\n";

            // Валюта товара.
            $out .= '<currencyId>RUR</currencyId>' . "\r\n";

            // ID категории.
            $out .= '<categoryId>' . $row['IBLOCK_SECTION_ID'] . '</categoryId>' . "\r\n";

            // Изображения товара, до 10 ссылок.
            $out .= '<picture>'.$url_path.''.CFile::GetPath($row['DETAIL_PICTURE']).'</picture>' . "\r\n";
            if($row['PROP']['MORE_PHOTO']['VALUE'] != ''){
                foreach($row['PROP']['MORE_PHOTO']['VALUE'] as $key_p => $p_val){
                    if($key_p < 8){
                        $out .= '<picture>'.$url_path.''.CFile::GetPath($p_val).'</picture>' . "\r\n";
                    }
                }
            }

            // Название товара.
            $ex_name = '';
            $ex_name = preg_replace('/\s+\/\s+.+/','', $row['NAME']);
            //$ex_name = str_replace('/\s+\/',$row['NAME']);
            $out .= '<name>' .$ex_name. '</name>' . "\r\n";

            // Описание товара, максимум 3000 символов.
            $out .= '<description>' . stripslashes($row['~DETAIL_TEXT']) . '</description>' . "\r\n";

            if($row['PROP']['WIDTH']['VALUE'] != ''){
                $out .= '<param name="'.$row['PROP']['WIDTH']['NAME'].'" unit="см">'.$row['PROP']['WIDTH']['VALUE'].'</param>'."\r\n";
            }
            if($row['PROP']['HEIGHT']['VALUE'] != ''){
                $out .= '<param name="'.$row['PROP']['HEIGHT']['NAME'].'" unit="см">'.$row['PROP']['HEIGHT']['VALUE'].'</param>'."\r\n";
            }
            if($row['PROP']['THICKNESS']['VALUE'] != ''){
                $out .= '<param name="'.$row['PROP']['THICKNESS']['NAME'].'" unit="см">'.$row['PROP']['THICKNESS']['VALUE'].'</param>'."\r\n";
            }
            if($row['PROP']['WEIGHT']['VALUE'] != ''){
                $out .= '<param name="'.$row['PROP']['WEIGHT']['NAME'].'" unit="кг">'.$row['PROP']['WEIGHT']['VALUE'].'</param>'."\r\n";
            }


            if($row['PROP']['COLOR']['VALUE'] != ''){
                $out .= '<param name="'.$row['PROP']['COLOR']['NAME'].'">'.$colors[$row['PROP']['COLOR']['VALUE'][0]].'</param>'."\r\n";
            }
            $out .= '<param name="Гарантия">1 год </param>'."\r\n";
            if($row['PROP']['ARTICULE']['VALUE'] != ''){
                $out .= '<vendorCode>'.$row['PROP']['ARTICULE']['VALUE'].'</vendorCode>'."\r\n";
            }
            $out .= '</offer>' . "\r\n";
        }

        $out .= '</offers>' . "\r\n";
        $out .= '</shop>' . "\r\n";
        $out .= '</yml_catalog>' . "\r\n";
        header('Content-Disposition: attachment;filename="export_yml_'.date('d_m_Y').'.xml"');
        header('Content-Type: text/xml; charset=utf-8');
        echo $out;
        exit;
    }
    echo json_encode($result);
}?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>
