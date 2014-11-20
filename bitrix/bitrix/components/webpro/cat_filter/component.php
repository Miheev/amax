<?php
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
CModule::IncludeModule('iblock');
//CModule::IncludeModule('iblockProperty');
CModule::IncludeModule("highloadblock");
use Bitrix\Highloadblock as HL;
//mb_internal_encoding("utf-8");

global ${$arParams['FILTER_NAME']};
${$arParams['FILTER_NAME']}= array();

$res = CIBlock::GetProperties(30);
//$res = CIBlock::GetProperties(intval($arParams["IBLOCK_ID"]));
//$filter_field = CIBlock::GetProperties(intval($arParams["IBLOCK_ID"]), array(), array('CODE'=>'PFILT'))->fetch();
//$res = CIBlock::GetProperties(intval($filter_field["LINK_IBLOCK_ID"]));
$fields= array();
while ($field=$res->GetNext()) {
    $fields[]= $field;
}

for ($i=0; $i<count($arParams['PROPERTY_CODE']); $i++)
    if (empty($arParams['PROPERTY_CODE'][$i]))
        unset($arParams['PROPERTY_CODE'][$i]);
$arParams['PROPERTY_CODE']= array_values($arParams['PROPERTY_CODE']);

$_POST['codes']= $arParams['PROPERTY_CODE'];
function cmp($a, $b)
{
    $keya= array_search($a["CODE"], $_POST['codes']);
    $keyb= array_search($b["CODE"], $_POST['codes']);

    $keya= $keya === false ? 90 : $keya;
    $keyb= $keyb === false ? 90 : $keyb;
//    var_dump($keya);
//    var_dump($keyb);
//    print_r('<br />');

    if ($keya == $keyb) {
        return 0;
    }
    return ($keya < $keyb) ? -1 : 1;
}
usort($fields, "cmp");
$fields= array_slice($fields, 0, count($arParams['PROPERTY_CODE']));

$arResult['props']= array();
foreach ($fields as $fid=>$field) {
    if ($field['PROPERTY_TYPE'] == 'L') {
        $field['list']= array();
        $list= CIBlockProperty::GetPropertyEnum($field['ID']);
        while ($list_el=$list->GetNext()) {
            $field['list'][]= $list_el;
        }
    } if ($field['PROPERTY_TYPE'] == 'E') {
        $field['list']= array();
        $id= intval($field['HINT']);
        $res = CIBlockElement::GetList(array('name'=>'asc'),array('IBLOCK_ID'=>$id), false,false, array('ID', 'NAME'));
        while($ob = $res->GetNext())
        {
            $field['list'][]= array('ID'=>$ob['ID'], 'VALUE'=>$ob['NAME']);
        }
        $field['PROPERTY_TYPE'] = 'E_L';
    } else if (preg_match('/^UF_/', $field['CODE'])) {
        $hIB_ID = $field['HINT'];
        $hlblock = null;

        $hlblock = HL\HighloadBlockTable::getById($hIB_ID)->fetch();
        if (!empty($hlblock))
        {
            $entity = HL\HighloadBlockTable::compileEntity($hlblock);
            $entity_data_class = $entity->getDataClass();
            $rows = $entity_data_class::getList(array('order'=>array($field['CODE']=>'asc')));

            while ($row = $rows->fetch()){
                $field['list'][]= array('ID'=>$row['ID'], 'VALUE'=>$row[$field['CODE']]);
            }
        }
        $field['PROPERTY_TYPE'] = 'UF_L';
    } else if ($field['HINT'] == 'ck') {
        $vars= explode(' ',$field['DEFAULT_VALUE']);
        $field['list']= array();
        $field['list'][]= array('ID'=>1, 'VALUE'=>$vars[0]);
        $field['list'][]= array('ID'=>2, 'VALUE'=>$vars[1]);
        $field['PROPERTY_TYPE']= 'ck_L';
    } else if ($field['HINT'] == 'fromto') {
        $field['PROPERTY_TYPE']= 'fromto';
    }

    $arResult['props'][]= $field;
}
$fields= &$arResult['props'];

//echo '<pre>';
//var_export($fields);
//echo '</pre>';
//var_dump($arParams);

//if (!empty($_SESSION['ucity']['id'])) {
//    ${$arParams['FILTER_NAME']}['PROPERTY_CIT']= $_SESSION['ucity']['id'];
//}

if (isset($_POST['fbank'])) {

    $i=0;
    $preFilter= array();
    foreach ($_POST['fbank'] as $code=>$item) {
        if (!empty($item)) {
            $cmp= '';

            if ($fields[$i]['PROPERTY_TYPE'] == 'N') {
                $cmp= '>=';
            }
            else if ($fields[$i]['PROPERTY_TYPE'] == 'fromto') {
                $cmp= '><';
                if (empty($item[0])) $item[0]=0;
                if (empty($item[1])) $item[1]=1000000;
            }
            else if ($fields[$i]['PROPERTY_TYPE'] == 'ck_L') {
                if ($item == 1) $cmp= '!';
                else $cmp= '';
                $item= $fields[$i]['list'][1]['VALUE'];
            } else if ($fields[$i]['PROPERTY_TYPE'] == 'E_L') {
                $code= $code.'.ID';
            }


//            var_dump($arParams['PROPERTY_CMP'][$i]);
//
//            if (strcmp('>=', $arParams['PROPERTY_CMP'][$i])) {
//                $cmp= '>=';
//            }
//            else if (strcmp('=', $arParams['PROPERTY_CMP'][$i])) {
//                $cmp= '';
//            }
//            else if (strcmp('<=', $arParams['PROPERTY_CMP'][$i])) {
//                $cmp= '<=';
//            }
//            else if (strcmp('!', $arParams['PROPERTY_CMP'][$i])) {
//                $cmp= '!';
//            }

            $ind= $cmp.'PROPERTY_'.$code;
            $preFilter[$ind]= $item;
        }
        $i++;
    }
    $pids= array();
    if (!empty($preFilter)) {
        $preFilter['IBLOCK_ID']= 30;
        $prod_ids = CIBlockElement::GetList(array(), $preFilter, false,false, array('ID', 'PROPERTY_CML2_LINK'));

        while($ob = $prod_ids->GetNext())
        {
            $pids[]= intval($ob['PROPERTY_CML2_LINK_VALUE']);
        }
    }
    ${$arParams['FILTER_NAME']}= array(
        'ID'=>$pids
    );

//    $arFilter['ID'] = CIBlockElement::SubQuery('свойство привязки предложения к товару', array(
//        "IBLOCK_ID" => id_инфоблока_предложений,
//        "свойство_предложения" => 'значение',
//    ))

    //    ${$arParams['FILTER_NAME']}= array('!PROPERTY_ALL'=>'отсутствует');
//    ${$arParams['FILTER_NAME']}= array('><PROPERTY_SIZ'=>array(150, 200));
//    var_dump(${$arParams['FILTER_NAME']});
}

$this->StartResultCache($arParams['CACHE_TIME']);
$this->IncludeComponentTemplate();
?>