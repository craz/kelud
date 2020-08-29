<?

/**
 * @var $arParams
 * @var $APPLICATION
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

define('FORM_CLOSE_TAG', '</form>');

CModule::IncludeModule('form');

// ajax query processing in Bitrix style
if ($_POST && $_POST['FORM_ID'] == $arParams['FORM_ID']) {

    if ($_POST["CART"] == "Y") {
        $cartCookie = $_COOKIE["cart"];
        $cart = json_decode($cartCookie);
        $ids = [];
        foreach ($cart as $item) {
            $ids[] = $item->id;
        }
        CModule::IncludeModule('iblock');
        $arSelect = Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_ARTICULE");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
        $arFilter = Array("IBLOCK_ID" => 3, "ID" => $ids);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
        $allElements = [];
        while ($ob = $res->GetNext()) {
            $allElements[] = $ob;
        }
        $msg = "";
        foreach ($allElements as &$element) {
            foreach ($cart as $cartElement) {
                if ($cartElement->id == $element["ID"]) {
                    $element["COUNT"] = $cartElement->count;
                    $msg .= "Артикул: " . $element["PROPERTY_ARTICULE_VALUE"] . " - количество: " . $cartElement->count . " шт. \n";
                }
            }
        }
        $_POST["SIMPLE_QUESTION_842"] = $msg;
    }

    // drop top html
    $GLOBALS['APPLICATION']->RestartBuffer();

    // get form data
    CForm::GetDataByID($arParams['FORM'], $form, $questions, $answers, $dropdown, $multiselect);

    // collete form results
    $arValues = [];
    foreach ($answers as $key => $answer) {

        if ($answer[0]["FIELD_TYPE"] == "dropdown") {

            $q_sid = "";
            foreach ($questions as $q) {
                if ($q["ID"] == $answer[0]["QUESTION_ID"]) {
                    $q_sid = $q["SID"];
                    break;
                }
            }
            $arValues["form_{$answer[0]['FIELD_TYPE']}_{$answer[0]["FIELD_ID"] }"] = (int)$_POST[$key];

        } else {
            $arValues["form_{$answer[0]['FIELD_TYPE']}_{$answer[0]['ID']}"] = $_POST[$key];
        }

    }

    // save form result
    if ($error = CForm::Check($arParams['FORM'], $arValues, false, 'N', 'Y')) {
        // return json response
        echo \Bitrix\Main\Web\Json::encode(['error' => $error]);
    } else {
				
        if ($RESULT_ID = CFormResult::Add($arParams['FORM'], $arValues, 'N', 1)) {
			
            CFormResult::Mail($RESULT_ID);

			if (!empty($_POST['SIMPLE_QUESTION_768'])) {
				$_POST['ORDER_ID'] = $RESULT_ID;
				$_POST['EMAIL_TO'] = trim($_POST['SIMPLE_QUESTION_768']);
				$_POST['DATE_CREATE'] = date('Y-m-d H:i:s');
				CEvent::Send("CART_COPY_USER", 's1', $_POST);
			}
			
            $resultJson = [
                'url' => $arParams['THX_URL']
            ];

            // return json response
            echo \Bitrix\Main\Web\Json::encode($resultJson);
        }
    }

    // kill script
    die();

}

// get form fields
$arFilter = [];
$isFiltered = false;
$rsForms = CForm::GetList($by = 's_id', $order = 'desc', $arFilter, $isFiltered);

$form = [];
while ($arForm = $rsForms->Fetch()) {
    if ($arParams['FORM'] == $arForm['ID']) {
        $form = $arForm;
        break;
    }
}

$data = CForm::GetDataByID($form['ID'], $form, $questions, $answers, $dropdown, $multiselect);

// collate form fields with types and default values
foreach ($questions as $question) {

    // if isset answer for form field
    if (isset($answers[$question['SID']])) {

        $tmp = $question;

        // set field type
        if (!isset($tmp['TYPE_F'])) {
            $tmp['TYPE_F'] = $answers[$question['SID']][0]['FIELD_TYPE'];
        }

        // set default values for field type select
        if ($tmp['TYPE_F'] == 'dropdown' &&
            count($dropdown[$question['SID']]['reference']) > 0
        ) {
            $tmp['LIST_VALUES'] = $dropdown[$question['SID']]['reference'];
        }

        // set default values for field type multi select
        if ($tmp['TYPE_F'] == 'multiselect' &&
            count($multiselect[$question['SID']]['reference']) > 0
        ) {
            $tmp['LIST_VALUES'] = $multiselect[$question['SID']]['reference'];
        }

        // save in $arResult
        $arResult['QUESTIONS'][] = $tmp;
    }

}

// save $arResult
$arResult['ANSWERS'] = $answers;
$arResult['DROP_DOWN'] = $dropdown;
$arResult['MULTI_SELECT'] = $multiselect;

// set form header
//$header .= '<form method="POST" action="' . $APPLICATION->GetCurPage() . '" ';
$header .= '<form method="POST" action="' . $arParams['THX_URL'] . '" ';
if ($arParams["FORM_HIDDEN"] == "Y") {
    $header .= " hidden ";
}
// set form css class
if ($arParams['FORM_CLASS'] != '') {
    $header .= "class='" . $arParams['FORM_CLASS'] . "' ";
}

// open attr onsubmit
if (($arParams['YA_COUNT'] != '' && $arParams['YA_COUNT_GOAL'] != '') ||
    $arParams['GL_COUNT_GOAL'] != ''
) {
    $header .= 'onsubmit="';
}

// set yandex-counter
if ($arParams['YA_COUNT'] != '') {
    if ($arParams['YA_COUNT_GOAL'] != '') {
        $header .= "ym({$arParams['YA_COUNT']}, 'reachGoal', '{$arParams['YA_COUNT_GOAL']}'); return true;";
    }
}

// set google-counter
if ($arParams['GL_COUNT_GOAL'] != '') {
    $header .= "ga('send','event','form','{$arParams["GL_COUNT_GOAL"]});";
}

// close attr onsubmit
if (($arParams['YA_COUNT'] != '' && $arParams['YA_COUNT_GOAL'] != '') ||
    $arParams['GL_COUNT_GOAL'] != ''
) {
    $header .= '" ';
}

// users form params
if ($arParams['ADD_PARAMS'] != '') {
    $header .= $arParams['ADD_PARAMS'];
}

// set end
$header .= '>';
$header .= '<input hidden name="FORM_ID" value="' . $arParams['FORM_ID'] . '">';

// if enable google captcha
if ($arParams['CAPTCHA_SITE_KEY'] != '') {
    $arResult['CAPTCHA_SITE_KEY'] = $arParams['CAPTCHA_SITE_KEY'];
}

// save header
$arResult['HEADER'] = $header;

$this->IncludeComponentTemplate();