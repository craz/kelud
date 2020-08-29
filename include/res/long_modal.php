<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
global $APPLICATION;

setcookie("LONG", 'Y',time()+60*60*2,"/");
$arRes['LONG'] = 'Y';
//echo '<pre>'; print_r($arEventField); echo '</pre>';
echo json_encode($arRes);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>