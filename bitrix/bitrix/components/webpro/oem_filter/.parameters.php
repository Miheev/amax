<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(!CModule::IncludeModule('iblock'))
    return;

global $APPLICATION;

$arComponentParameters = array(
    'PARAMETERS' => array(
        'CACHE_TIME'  =>  array('DEFAULT'=>3600),
    ),
);
?>