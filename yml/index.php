<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Экспорт YML");
?>
<?
global $USER;
if ($USER->IsAdmin()){
CModule::IncludeModule('iblock');
$sections = [];
$arFilter = Array('IBLOCK_CODE'=>'catalog');
$db_list = CIBlockSection::GetList(Array("NAME"=> "ASC"), $arFilter, true);
while($ar_result = $db_list->GetNext()) {
    $sections[] = $ar_result;
}

    $p = 0;
    $arSelect = Array("ID", "NAME","DETAIL_PAGE_URL","DETAIL_TEXT","DETAIL_PICTURE","PROPERTY_*","IBLOCK_SECTION_ID",'PROPERTY_COLOR.NAME');
    $arFilter = Array('IBLOCK_CODE'=>"catalog", "IBLOCK_SECTION_ID"=>8, "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNextElement()){
        $prods[$p] = $ob->GetFields();
        $prods[$p]['PROP'] = $ob->GetProperties();
        $p++;
    }
?>

    <div class="cont_yml">
        <div class="yml_s_select">
            <br>
            <br>
            <form action="/yml/yml_gen.php" method="post" id="yml_sct">
                <label for="" class="title_select">
                    Укажите разделы для выгрузки:
                </label>
                <div class="section_check">
                    <?foreach($sections as $skey =>  $section){?>
                        <div class="scheck">
                            <input id="sc_<?=$skey?>" type="checkbox" name="sections[]" value="<?=$section['ID']?>"> <label for="sc_<?=$skey?>"><?=$section['NAME']?> (<?=$section['ELEMENT_CNT']?>)</label>
                        </div>
                    <?}?>
                    <br>
                    <br>
                    <label for="">Название магазина:</label>
                    <input type="text" value="Kelud" name="shop">
                    <br>
                    <br>
                    <label for="">Название организации:</label>
                    <input type="text" value="ИП «Годунов Дмитрий Борисович»" name="firm">
                    <br>
                    <input class="go_yml" type="submit" value="Сформировать файл">
                    <br>
                    <br>
                </div>

            </form>
        </div>
    </div>
    <style>
        .cont_yml{
            display: inline-block;
            width: 100%;
            text-align: center;
        }
        .yml_s_select{
            display: inline-block;
            text-align: left;
            width: 320px;
        }
        .title_select{
            display: inline-block;
            width: 100%;
            font-weight: 600;
            border-bottom: 1px solid #ececec;
            padding-bottom: 8px;
            margin-bottom: 20px;
        }
        .section_check{}
        .scheck{
            display: inline-block;
            width: 100%;
            margin-bottom: 5px;
        }
        .scheck input{

        }
        .scheck label{
            display: inline-block;
            font-size: 16px;
            color: #000;
            cursor: pointer;
        }
        .go_yml{
            display: inline-block;
            border: 2px solid #000;
            background-color: #fff;
            color: #777;
            font-size: 14px;
            padding: 8px 9px;
            margin: 16px 0px;
            cursor: pointer;
        }
        .go_yml:hover{
            color: #fff;
            background-color: #444;
        }
    </style>
<?}?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>