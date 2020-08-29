<?

include($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule('catalog');
CModule::IncludeModule("iblock");
\Bitrix\Main\Loader::includeModule('highloadblock');

use Bitrix\Main\Loader; 

Loader::includeModule("highloadblock"); 

use Bitrix\Highloadblock as HL; 
use Bitrix\Main\Entity;

$hlbl = 6; // Указываем ID нашего highloadblock блока к которому будет делать запросы.
$hlblock = HL\HighloadBlockTable::getById($hlbl)->fetch(); 

$entity = HL\HighloadBlockTable::compileEntity($hlblock); 
$entity_data_class = $entity->getDataClass(); 

$rsData = $entity_data_class::getList(array(
   "select" => array("*"),
   "order" => array("ID" => "ASC"),
));

$col = [];

while($arData = $rsData->Fetch()){
   $col[mb_strtoupper($arData['UF_NAME'])] = $arData['UF_XML_ID'];
}

$csv = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/import/kelud.csv");

$csv_arr = explode("\r", $csv);
$i = 1;

foreach ($csv_arr as $key => $value) {
	
	//if ($i > 1) break;
	
	$value = str_replace(["\"", "\r", "\n"], '', $value);
	$value = trim($value);
	$arValue = explode(",", $value);
	
	if (count($arValue) == 2) {
		$code = trim($arValue[0]);	
		$collection = trim($arValue[1]);	
		
		$element = new CIBlockElement;

		$rsFindEl = $element->GetList(
			array(),
			array(
				'CODE' => $code,
			),
			false,
			false,
			array('ID')
		);

		$findEl = $rsFindEl->Fetch();

		if (isset($col[$collection])) {
			$arFieldsElement = array(
				"PROPERTY_VALUES" => array(
					"COLLECTION" => array($col[$collection]),
				),
			);

			//CIBlockElement::SetPropertyValuesEx($findEl['ID'], false,  array('COLLECTION' => array($col[$collection])));
		}		
	}
	
	$i++;
}