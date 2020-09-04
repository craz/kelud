<?
$arResult = [];

$dirs = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/Classes/"));

foreach ($dirs as $name => $file) {
    //d($file);
    $ext = $file->getExtension();
    $className =  $file->getBasename('.php'); 
    if ($ext === 'php'){
        $arResult[$className] = str_replace(\Bitrix\Main\Loader::getDocumentRoot(),"",$name);
    }
}

\Bitrix\Main\Loader::registerAutoLoadClasses(null, $arResult);

