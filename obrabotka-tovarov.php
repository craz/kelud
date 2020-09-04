<?
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
$catalogId = 3;
//Сколько товаров без предложений
$catalogProduct = new KCCatalogProduct($catalogId);
echo "<a href='/bitrix/admin' target='_blank'>Админка</a><br/>";
if (CModule::IncludeModule("catalog")){
   if (CCatalog::GetByID($catalogId)){      
      echo "Количество товаров: ". $catalogProduct->getProductCount() ." шт. <br/>";
      // echo "<pre>";
      // print_r($catalogProduct);
      // echo "</pre>";
      print_r($catalogProduct->getRandomProduct());
   } 

}else{
   echo "not found product catalog<br/>"; 
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");