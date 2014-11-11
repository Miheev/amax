<?php
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
CModule::IncludeModule('iblock');
//CModule::IncludeModule('iblockProperty');
CModule::IncludeModule("highloadblock");
use Bitrix\Highloadblock as HL;
//mb_internal_encoding("utf-8");

global $amax_origin;
global $amax_simple;
global $partner_simple;
global $partner_origin;
$amax_origin= array();
$amax_simple= array();
$partner_simple= array();
$partner_origin= array();

$amax_origin['PROPERTY_OEM']= '%'.$_GET['q'].'%';
$amax_simple['PROPERTY_NUM']= '%'.$_GET['q'].'%';
$partner_simple['PROPERTY_NUM']= '%'.$_GET['q'].'%';
$partner_origin['PROPERTY_OEM']= '%'.$_GET['q'].'%';

$this->StartResultCache($arParams['CACHE_TIME']);
$this->IncludeComponentTemplate();
?>