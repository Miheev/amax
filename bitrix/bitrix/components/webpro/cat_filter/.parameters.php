<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(!CModule::IncludeModule('iblock'))
    return;

global $APPLICATION;

$arIBlockType = CIBlockParameters::GetIBlockTypes();

$rsIBlock = CIBlock::GetList(Array('sort' => 'asc'), Array(
    'TYPE'   => $arCurrentValues['IBLOCK_TYPE'],
    'ACTIVE' => 'Y'
));
while($arr = $rsIBlock->Fetch())
    $arIBlock[$arr['ID']] = '[' . $arr['ID'] . '] ' . $arr['NAME'];


$arProperty   = array();
$arProperty_N = $arProperty_L = array();
$rsProp       = CIBlockProperty::GetList(Array(
    'sort' => 'asc',
    'name' => 'asc'
), Array(
    'ACTIVE'    => 'Y',
    'IBLOCK_ID' => $arCurrentValues['IBLOCK_ID']
));
while($arr = $rsProp->Fetch())
{
    if($arr['PROPERTY_TYPE'] != 'F')
        $arProperty[$arr['CODE']] = '[' . $arr['CODE'] . '] ' . $arr['NAME'];

    if($arr['PROPERTY_TYPE'] == 'N')
        $arProperty_N[$arr['CODE']] = '[' . $arr['CODE'] . '] ' . $arr['NAME'];

    if($arr['PROPERTY_TYPE'] == 'L' || $arr['PROPERTY_TYPE'] == 'E' || $arr['PROPERTY_TYPE'] == 'G')
        $arProperty_L[$arr['CODE']] = '[' . $arr['CODE'] . '] ' . $arr['NAME'];
}

$arComponentParameters = array(
    'GROUPS'     => array(
        'COMPARE_PROPERTY' => array(
            'NAME' => 'Параметры сравнения',
            'SORT' => 200
        ),
    ),
    'PARAMETERS' => array(
        'IBLOCK_TYPE'                    => array(
            'PARENT'            => 'DATA_SOURCE',
            'NAME'              => 'Тип инфоблока',
            'TYPE'              => 'LIST',
            'ADDITIONAL_VALUES' => 'Y',
            'VALUES'            => $arIBlockType,
            'REFRESH'           => 'Y',
        ),
        'IBLOCK_ID'                      => array(
            'PARENT'            => 'DATA_SOURCE',
            'NAME'              => 'Инфоблок',
            'TYPE'              => 'LIST',
            'ADDITIONAL_VALUES' => 'Y',
            'VALUES'            => $arIBlock,
            'REFRESH'           => 'Y',
        ),
        'FILTER_NAME' => array(
            'PARENT'  => 'DATA_SOURCE',
            'NAME'    => 'Название переменной фильтра',
            'TYPE'    => 'STRING',
            'DEFAULT' => 'arrFilter',
        ),
        'FILTER_HEAD' => array(
            'NAME' => 'Заголовок фильтра',
            'TYPE' => 'STRING',
            'MULTIPLE' => 'N',
            'PARENT' => 'BASE',
        ),
        'FIELD_CODE'  => CIBlockParameters::GetFieldCode('Поля инфоблока', 'DATA_SOURCE', array('SECTION_ID' => true)),
        'PROPERTY_CODE' => array(
            'PARENT'            => 'DATA_SOURCE',
            'NAME'              => 'Свойства инфоблока',
            'TYPE'              => 'LIST',
            'MULTIPLE'          => 'Y',
            'VALUES'            => $arProperty,
            'ADDITIONAL_VALUES' => 'Y',
        ),
        'PROPERTY_CMP' => array(
            'PARENT'            => 'COMPARE_PROPERTY',
            'NAME'              => 'для свойств',
            'TYPE'              => 'LIST',
            'MULTIPLE'          => 'Y',
            'VALUES'            => array('=','>=', '<=', '!'),
            'ADDITIONAL_VALUES' => 'Y',
        ),
        'CACHE_TIME'  =>  array('DEFAULT'=>3600),
    ),
);
?>