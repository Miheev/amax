<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="uline">

<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>
    <?
    $discount= ($arItem["TEXT"] == 'Скидки') ? 'ico-discount' : '';
    ?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li class="<?=$discount;?>"><a href="<?=htmlspecialcharsbx($arItem["LINK"])?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=htmlspecialcharsbx($arItem["TEXT"])?></a>
				<ul>
		<?else:?>
			<li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=htmlspecialcharsbx($arItem["LINK"])?>" class="parent"><?=htmlspecialcharsbx($arItem["TEXT"])?></a>
				<ul>
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="<?=$discount;?>"><a href="<?=htmlspecialcharsbx($arItem["LINK"])?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=htmlspecialcharsbx($arItem["TEXT"])?></a></li>
			<?else:?>
				<li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=htmlspecialcharsbx($arItem["LINK"])?>"><?=htmlspecialcharsbx($arItem["TEXT"])?></a></li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="<?=$discount;?>"><a href="" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=htmlspecialcharsbx($arItem["TEXT"])?></a></li>
			<?else:?>
				<li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=htmlspecialcharsbx($arItem["TEXT"])?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
<?endif?>