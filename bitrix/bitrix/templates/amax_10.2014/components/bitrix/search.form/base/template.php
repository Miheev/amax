<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);?>

<div class="inner clearfix">
    <form action="<?echo $arResult["FORM_ACTION"]?>" class="clearfix">
        <input id="<?echo $INPUT_ID?>" type="text" name="q" value="<?=htmlspecialcharsbx($_REQUEST["q"])?>" maxlength="50" autocomplete="off" placeholder="Поиск деталей" />
        <input type="submit" name="s" value="Найти" />
        <input type="hidden" name="ssp" value="oem" />
        <div class="select">
            <div class="abbr clearfix"><span class="label">по OEM</span><span class="pointer"></span></div>
            <div class="list">
                <a href="javascript:void(0);" onclick="location.assign(location.pathname+'?ssp=name');">по названию</a>
                <a href="javascript:void(0);" onclick="location.assign(location.pathname+'?ssp=oem');">по OEM</a>
            </div>
        </div>
    </form>
</div>