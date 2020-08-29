<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
global $APPLICATION;
CModule::IncludeModule('iblock');
global $arFilter;
global $cart;
$cartCookie = $_COOKIE["cart"];
$cart = json_decode($cartCookie);
$ids = [];

$message_id['ID'] = '';

foreach ($cart as $item) {
    $ids[] = $item->id;
}

$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_*");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
$arFilter = Array("IBLOCK_CODE"=>'catalog','ID' => $ids);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
$data = [];
$c = 0;
while($ob = $res->GetNextElement()){
    $arFields = $ob->GetFields();
    $arProps = $ob->GetProperties();
    $data[$c] = $arFields;
    $data[$c] = $arProps;
    $data_mail[] = '<br>'.$arFields['NAME'];
    $c++;
}

$arEventField = array(
    "PRODUCT" => $data_mail,
        "NAME" => $_REQUEST['fields']['NAME'],
        "CITY" => $_REQUEST['fields']['CITY'],
        "PHONE" => $_REQUEST['fields']['PHONE'],
        "EMAIL" => $_REQUEST['fields']['EMAIL'],
        "TEXT" => $_REQUEST['fields']['TEXT'],
    );
$message_id['ID'] = CEvent::SendImmediate("ZAKA_ZAKA", "s1", $arEventField);

setcookie("cart","",time()-10000,"/");

//echo '<pre>'; print_r($arEventField); echo '</pre>';
echo json_encode($message_id);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>