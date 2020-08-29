<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

// get forms
if (CModule::IncludeModule('form')) {

    $arFilter = [];
    $isFiltered = false;
    $rsForms = CForm::GetList($by = 's_id', $order = 'desc', $arFilter, $isFiltered);
    $result = [];

    while ($arForm = $rsForms->Fetch()) {
        $result[$arForm['ID']] = $arForm['NAME'];
    }

} else {
    ShowError('Component simple_form can\'t include module form in .params.php');
}

// set component params
$arComponentParameters = [
    'GROUPS' => [
        'METRIC' => [
            'NAME' => 'Метрика',
            'SORT' => 100
        ],
        'CAPTCHA' => [
            'NAME' => 'ReCaptcha',
            'SORT' => 110
        ],
        'POLICY' => [
            'NAME' => 'Политика обработки персональных данных',
            'SORT' => 120
        ],
    ],
    'PARAMETERS' => [
        'FORM_HIDDEN' => [
            'PARENT' => 'BASE',
            'NAME' => 'Форма изначально скрыта',
            'TYPE' => 'CHECKBOX',
        ],
        'FORM' => [
            'PARENT' => 'BASE',
            'NAME' => 'Форма',
            'TYPE' => 'LIST',
            'VALUES' => $result,
            'ADDITIONAL_VALUES' => 'Y',
        ],
        'FORM_CLASS' => [
            'PARENT' => 'BASE',
            'NAME' => 'CSS класс для формы',
            'TYPE' => 'TEXT',
            'ADDITIONAL_VALUES' => 'Y',
        ],
        'THX_URL' => [
            'PARENT' => 'BASE',
            'NAME' => 'Ссылка на страницу "Спасибо за заявку"',
            'TYPE' => 'TEXT'
        ],
        'FORM_ID' => [
            'PARENT' => 'BASE',
            'NAME' => 'ID формы',
            'TYPE' => 'TEXT',
            'ADDITIONAL_VALUES' => 'Y',
        ],
        'YA_COUNT' => [
            'PARENT' => 'METRIC',
            'NAME' => 'Код яндекс метрики',
            'TYPE' => 'TEXT',
            'ADDITIONAL_VALUES' => 'Y',
        ],
        'YA_COUNT_GOAL' => [
            'PARENT' => 'METRIC',
            'NAME' => 'Идентификатор цели яндекса',
            'TYPE' => 'TEXT',
            'ADDITIONAL_VALUES' => 'Y',
        ],
        'GL_COUNT_GOAL' => [
            'PARENT' => 'METRIC',
            'NAME' => 'Идентификатор цели google',
            'TYPE' => 'TEXT',
            'ADDITIONAL_VALUES' => 'Y',
        ],
        'ADD_PARAMS' => [
            'PARENT' => 'BASE',
            'NAME' => 'Дополнительные параметры формы',
            'TYPE' => 'TEXT',
        ],
        'CAPTCHA_SITE_KEY' => [
            'PARENT' => 'CAPTCHA',
            'NAME' => 'Публичный ключ ReCaptcha',
            'TYPE' => 'TEXT',
        ],
        'CAPTCHA_SECRET_KEY' => [
            'PARENT' => 'CAPTCHA',
            'NAME' => 'Секретный ключ ReCaptcha',
            'TYPE' => 'TEXT',
        ],
        'POLICY_TEXT' => [
            'PARENT' => 'POLICY',
            'NAME' => 'Текст',
            'TYPE' => 'TEXT'
        ],
        'POLICY_LINK_TEXT' => [
            'PARENT' => 'POLICY',
            'NAME' => 'Текст ссылки',
            'TYPE' => 'TEXT'
        ],
        'POLICY_LINK' => [
            'PARENT' => 'POLICY',
            'NAME' => 'Ссылка',
            'TYPE' => 'TEXT'
        ],
    ]
];