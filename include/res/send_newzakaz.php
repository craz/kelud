<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
global $APPLICATION;
CModule::IncludeModule('iblock');

explode($_POST);

$message_id['ID'] = '';
$pr_name = array();
$pr_cnt = array();
$pr_price = array();

$c = 0;
foreach($prods_name as $name){
	$pr_name[$c] = $name;
	$c++;
}
$c = 0;
foreach($prods_cnt as $name){
	$pr_cnt[$c] = $name;
	$c++;
}
$c = 0;
foreach($prods_price as $name){
	$pr_price[$c] = $name;
	$c++;
}
$data_mail = '';
for($i=0; $i++; $i<$c){
	$data_mail += 'Название '.$pr_name[$i].', цена за 1шт '.$pr_price[$i].', количество '.$pr_cnt[$i].'<br>';
}

$arEventField = array(
	"PRODUCT" => $data_mail,
	"NAME" => $fields['NAME'],
	"CITY" => $fields['CITY'],
	"PHONE" => $fields['PHONE'],
	"EMAIL" => $fields['EMAIL'],
	"TEXT" => $fields['TEXT'],
);
$message_id['ID'] = CEvent::SendImmediate("ZAKA_ZAKA", "s1", $arEventField);


//echo $fields['NAME'];
echo json_encode($message_id);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>