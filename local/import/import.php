<?php
echo "<pre>";
include($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
include($_SERVER["DOCUMENT_ROOT"] . "/local/import/ExcelElement.php");
include($_SERVER["DOCUMENT_ROOT"] . "/local/import/PHPExcel.php");
require_once($_SERVER["DOCUMENT_ROOT"] . '/local/import/PHPExcel/Reader/Excel5.php');
CModule::IncludeModule("iblock");
CModule::IncludeModule("highloadblock");

$update = true;

/**
 * Достаем все края.
 */
$allEdges = [];
$entity_data_class = GetEntityDataClass(3);
$rsData = $entity_data_class::getList(array(
    'select' => array('*')
));
while ($el = $rsData->fetch()) {
    $allEdges[] = $el;
}
/**
 * Достаем все формы.
 */
$allForms = [];
$entity_data_class = GetEntityDataClass(2);
$rsData = $entity_data_class::getList(array(
    'select' => array('*')
));
while ($el = $rsData->fetch()) {
    $allForms[] = $el;
}


$xls = new PHPExcel();
$xls = PHPExcel_IOFactory::load('files/file.xlsx');
$xls->setActiveSheetIndex(0);
$sheet = $xls->getActiveSheet();
$rowIterator = $sheet->getRowIterator();
/**
 * Все элементы.
 */
$allExcelElements = [];
/**
 * Все id подстолья.
 */
$allArticleUnder = [];
for ($i = 2; $i <= $sheet->getHighestRow(); $i++) {
    $nColumn = PHPExcel_Cell::columnIndexFromString(
        $sheet->getHighestColumn());
    for ($j = 0; $j < $nColumn; $j++) {


        if ($sheet->getCellByColumnAndRow(0, $i)->getValue() == NULL) {
            continue;
        }
        $element = new ExcelElement();

        $section = str_replace(', ', ',', $sheet->getCellByColumnAndRow(0, $i)->getValue());

        $element->Section = explode(",", $section);

        $element->Article = $sheet->getCellByColumnAndRow(1, $i)->getValue();

        $element->Name = $sheet->getCellByColumnAndRow(2, $i)->getValue();

        $element->Photos = $sheet->getCellByColumnAndRow(3, $i)->getValue();

        $element->Width = $sheet->getCellByColumnAndRow(4, $i)->getValue();

        $element->Height = $sheet->getCellByColumnAndRow(5, $i)->getValue();

        $element->Thickness = $sheet->getCellByColumnAndRow(6, $i)->getValue();

        $element->Weight = $sheet->getCellByColumnAndRow(7, $i)->getValue();

        $articleUnder = str_replace(', ', ',', $sheet->getCellByColumnAndRow(8, $i)->getValue());
        $articleUnder = explode(",", $articleUnder);
        if ($articleUnder != NULL) {
            $allArticleUnder = array_merge($allArticleUnder, $articleUnder);
        }

        $element->ArticleUnder = $articleUnder;

        $element->Color = $sheet->getCellByColumnAndRow(9, $i)->getValue();

        $edge = str_replace(', ', ',', $sheet->getCellByColumnAndRow(10, $i)->getValue());
        $edge = explode(",", $edge);
        $element->Edge = $edge;

        $element->Price = $sheet->getCellByColumnAndRow(11, $i)->getValue();
        $element->InStock = $sheet->getCellByColumnAndRow(12, $i)->getValue();

        $articleAdditional = str_replace(', ', ',', $sheet->getCellByColumnAndRow(13, $i)->getValue());
        $element->ArticleAdditional = explode(",", $articleAdditional);

        $form = str_replace(', ', ',', $sheet->getCellByColumnAndRow(14, $i)->getValue());
        $form = explode(",", $form);
        $element->Form = $form;

    }
    $allExcelElements[] = $element;
}

$allArticleUnder = array_unique($allArticleUnder);

foreach ($allArticleUnder as $under) {
    if ($under == "") {
        continue;
    }
    $element = new ExcelElement();
    $element->Section = array("Подстолья");
    $element->Article = $under;
    $element->Name = "Подстолье KELUD_{$under}";
    $element->IsUnder = true;
    $element->Photos = "KELUD{$under}";
    $allExcelElements[] = $element;
}

unset($element);
/**
 * Собираем все разделы.
 */


$sectionsNames = [];
$arFilter = Array('IBLOCK_ID' => 3);
$db_list = CIBlockSection::GetList(Array(), $arFilter, true);
$allSections = [];
while ($ar_result = $db_list->GetNext()) {
    $allSections[] = $ar_result;
}


foreach ($allExcelElements as &$element) {

    foreach ($allForms as $form) {
        if (in_array($form["UF_NAME"], $element->Form)) {
            $element->FormID[] = $form["UF_XML_ID"];
        }
    }
    foreach ($allEdges as $edge) {
        if (in_array($edge["UF_NAME"], $element->Edge)) {
            $element->EdgeID[] = $edge["UF_XML_ID"];
        }
    }
    foreach ($allSections as $section) {

        if (in_array($section["NAME"], $element->Section)) {

            $element->SectionID[] = (int)$section["ID"];
        }
    }

}
unset($element);

if (!$update) {


    $DB->StartTransaction();

    $count = 0;
    foreach ($allExcelElements as &$element) {
        if ($count > 50) {
            $count = 0;
            if (strlen($strError) <= 0) {
                $DB->Commit();
            } else $DB->Rollback();
        }

        $el = new CIBlockElement;
        $PROP = array();
        $PROP["IN_STOCK"] = 1;
        $PROP["PRICE"] = $element->Price;
        $PROP["ARTICULE"] = $element->Article;
        $PROP["FORM"] = $element->FormID;
        $PROP["EDGE"] = $element->EdgeID;
        $sizes = Array(Array("VALUE" => $element->Width, "DESCRIPTION" => "Длина"),
            Array("VALUE" => $element->Height, "DESCRIPTION" => "Ширина"),
            Array("VALUE" => $element->Thickness, "DESCRIPTION" => "Толщина"),
            Array("VALUE" => $element->Weight, "DESCRIPTION" => "Вес"));
        $PROP["SIZES"] = $sizes;
        if ($element->IsUnder) {
            $file = CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"] . "/local/import/files/photos/" . preg_replace('/[^0-9A-Za-z_]/', '', $element->Photos) . ".jpg");
        } else {
            $file = CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"] . "/local/import/files/photos/" . preg_replace('/[^0-9A-Za-z_]/', '', $element->Photos) . ".jpg");
        }

        $arLoadProductArray = Array(

            "CODE" => $element->Article,
            "IBLOCK_SECTION" => $element->SectionID,          // элемент лежит в корне раздела
            "IBLOCK_ID" => 3,
            "PROPERTY_VALUES" => $PROP,
            "NAME" => (str_replace("\"", "", $element->Name) . " / art. " . $element->Article),
            "ACTIVE" => "Y",            // активен
            "DETAIL_PICTURE" => $file
        );

        if ($PRODUCT_ID = $el->Add($arLoadProductArray)) {
            $element->BitrixID = $PRODUCT_ID;
        }
        $count++;
    }


    if (strlen($strError) <= 0) {
        $DB->Commit();
    } else $DB->Rollback();

    unset($element);


    foreach ($allExcelElements as &$element) {
        foreach ($allExcelElements as $subElement) {
            if ($element->BitrixID == $subElement->BitrixID) {
                continue;
            }
            if (in_array($element->ArticleAdditional, $subElement->Article)) {
                $element->ArticleAdditionalID[] = $subElement->BitrixID;
            }
            if (in_array($element->ArticleUnder, $subElement->Article)) {
                $element->ArticleUnderID[] = $subElement->BitrixID;
            }
        }
    }

    unset($element);
    unset($el);

    $DB->StartTransaction();
    $count = 0;
    foreach ($allExcelElements as $element) {

        if ($count > 50) {
            $count = 0;
            if (strlen($strError) <= 0) {
                $DB->Commit();
            } else $DB->Rollback();
        }
        $el = new CIBlockElement;
        $PROP = array();
        $PROP["IN_STOCK"] = 1;
        $PROP["PRICE"] = $element->Price;
        $PROP["ARTICULE"] = $element->Article;
        $PROP["FORM"] = $element->FormID;
        $PROP["EDGE"] = $element->EdgeID;
        $sizes = Array(Array("VALUE" => $element->Width, "DESCRIPTION" => "Длина"),
            Array("VALUE" => $element->Height, "DESCRIPTION" => "Ширина"),
            Array("VALUE" => $element->Thickness, "DESCRIPTION" => "Толщина"),
            Array("VALUE" => $element->Weight, "DESCRIPTION" => "Вес"));
        $PROP["SIZES"] = $sizes;
        $PROP["PODSTOLIE"] = $element->ArticleUnderID;
        $PROP["ASSOCIATED_ITEMS"] = $element->ArticleAdditionalID;

        $arLoadProductArray = Array(
            "PROPERTY_VALUES" => $PROP,
        );

        $PRODUCT_ID = $element->BitrixID;  // изменяем элемент с кодом (ID) 2
        $res = $el->Update($PRODUCT_ID, $arLoadProductArray);
        $count++;
    }
    if (strlen($strError) <= 0) {
        $DB->Commit();
    } else $DB->Rollback();
} else {
    $bitrixElements = [];

    $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "IBLOCK_ID", "PROPERTY_*");
    $arFilter = Array("IBLOCK_ID" => 3, "ACTIVE" => "Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
    while ($ob = $res->GetNextElement()) {
        $el["FIELDS"] = $ob->GetFields();
        $el["PROPERTIES"] = $ob->GetProperties();
        $bitrixElements[] = $el;
    }

    foreach ($allExcelElements as &$excelElement) {

        foreach ($bitrixElements as $bitrixElement) {

            if ($excelElement->Article == $bitrixElement["PROPERTIES"]["ARTICULE"]["VALUE"]) {
                $excelElement->BitrixID = $bitrixElement["FIELDS"]["ID"];
                $excelElement->BitrixElement = $bitrixElement;
                break;
            }
        }
    }

    unset($excelElement);

    foreach ($allExcelElements as &$element) {

        foreach ($allExcelElements as $subElement) {
            if ($element->BitrixID == $subElement->BitrixID) {
                continue;
            }
            if (in_array((string)$subElement->Article, $element->ArticleAdditional)) {
                $element->ArticleAdditionalID[] = $subElement->BitrixID;
            }
            if (in_array((string)$subElement->Article, $element->ArticleUnder)) {
                $element->ArticleUnderID[] = $subElement->BitrixID;
            }

        }
    }
    unset($element);
    $DB->StartTransaction();
    $count = 0;
    foreach ($allExcelElements as $element) {

//        if ($element->Article != 381062) {
//            continue;
//        }
//        var_dump($element);


        if ($count > 50) {
            $count = 0;
            if (strlen($strError) <= 0) {
                $DB->Commit();
            } else $DB->Rollback();
        }
        $el = new CIBlockElement;
        $PROP = array();
        $PROP["IN_STOCK"] = 1;
        $PROP["PRICE"] = $element->BitrixElement["PROPERTIES"]["PRICE"]["VALUE"];
        $PROP["ARTICULE"] = $element->Article;
        $PROP["FORM"] = $element->FormID;
        $PROP["ON_MAIN"] = Array($element->BitrixElement["PROPERTIES"]["ON_MAIN"]["VALUE_ENUM_ID"]);
        $PROP["EDGE"] = $element->EdgeID;
        $PROP["HEIGHT"] = $element->Height;
        $PROP["WIDTH"] = $element->Width;
        $PROP["THICKNESS"] = $element->Thickness;
        $sizes = Array(
//            Array("VALUE" => $element->Width, "DESCRIPTION" => "Длина"),
//            Array("VALUE" => $element->Height, "DESCRIPTION" => "Ширина"),
//            Array("VALUE" => $element->Thickness, "DESCRIPTION" => "Толщина"),
            Array("VALUE" => $element->Weight, "DESCRIPTION" => "Вес"));
        $PROP["SIZES"] = $sizes;
        $PROP["PODSTOLIE"] = $element->ArticleUnderID;
        $PROP["ASSOCIATED_ITEMS"] = array_unique($element->ArticleAdditionalID);

        $arLoadProductArray = Array(
            "PROPERTY_VALUES" => $PROP,
        );

        $PRODUCT_ID = $element->BitrixID;  // изменяем элемент с кодом (ID) 2
        $res = $el->Update($PRODUCT_ID, $arLoadProductArray);
        //var_dump($arLoadProductArray);

        $count++;
    }
    if (strlen($strError) <= 0) {
        $DB->Commit();
    } else $DB->Rollback();


}
echo "</pre>";



