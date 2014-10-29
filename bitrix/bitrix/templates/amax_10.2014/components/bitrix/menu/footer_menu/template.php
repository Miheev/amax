<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
    <h4>Карта сайта</h4>
<?if (!empty($arResult)):?>
    <ul class="uline">
<?
$count= count($arResult) - 2;
foreach($arResult as $id => $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
		<li>
            <a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
        </li>

<?endforeach?>
    </ul>
<?endif?>