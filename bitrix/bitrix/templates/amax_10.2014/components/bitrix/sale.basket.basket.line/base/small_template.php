<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<div class="block">

    <div class="img">
        <a href="<?=$arParams['PATH_TO_BASKET']?>"><img src="<?=SITE_TEMPLATE_PATH?>/img/basket_line.png" /></a>
    </div>
    <div class="text">
        <p class="bname">
            <a href="<?=$arParams['PATH_TO_BASKET']?>">
	<?if ($arResult['NUM_PRODUCTS'] > 0 && $arParams['SHOW_NUM_PRODUCTS'] == 'N' && $arParams['SHOW_TOTAL_PRICE'] == 'N'):?>
		<?=GetMessage('TSB1_CART')?>
	<?else: echo GetMessage('TSB1_CART'); endif?>

	<?if($arParams['SHOW_NUM_PRODUCTS'] == 'Y'):?>
		<?if ($arResult['NUM_PRODUCTS'] > 0):?>
			<?=$arResult['NUM_PRODUCTS'].' '.$arResult['PRODUCT(S)']?>
		<?else:?>
			<?=$arResult['NUM_PRODUCTS'].' '.$arResult['PRODUCT(S)']?>
		<?endif?>
	<?endif?>
            </a>
        </p>

        <p class="sum">
            <a href="<?=$arParams['PATH_TO_BASKET']?>">
	<?if($arParams['SHOW_TOTAL_PRICE'] == 'Y'):?>
            <span class="label"><?=GetMessage('TSB1_TOTAL_PRICE')?></span>
		<?if ($arResult['NUM_PRODUCTS'] > 0):?>
            <span><?=$arResult['TOTAL_PRICE']?></span>
		<?else:?>
			<?=$arResult['TOTAL_PRICE']?>
		<?endif?>
	<?endif?>
            </a>
        </p>

	<?if($arParams["SHOW_PERSONAL_LINK"] == "Y"):?>
		<br>
		<span class="icon_profile"></span>
		<a class="link_profile" href="<?=$arParams["PATH_TO_PERSONAL"]?>"><?=GetMessage("TSB1_PERSONAL")?></a>
	<?endif?>
    </div>

	<?if ($arParams["SHOW_PRODUCTS"] == "Y" && $arResult['NUM_PRODUCTS'] > 0):?>
		<div class="bx_item_hr" style="margin-bottom:0"></div>
	<?endif?>

</div>