<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("banner_class", "banner_light");
$APPLICATION->SetTitle("Спасибо за заявку");
?>
<?
$args = $_POST;
if(isset($args['FORM_ID'])){
	$type = $args['FORM_ID'];
	if($type === 'custom_partner'){
		$event = "FORM_FILLING_SIMPLE_FORM_4";

		$arFields = array();
		foreach($args as $name=>$value){
			$arFields[$name] = $value;
		}
		$ret = CEvent::Send($event, "s1", $arFields);
	}
}

?>

<?
	CModule::IncludeModule("sale");
	CSaleBasket::DeleteAll(CSaleBasket::GetBasketUserID());
?>
<?$APPLICATION->IncludeComponent("bitrix:main.include", "sub", Array(
	
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>