<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="cart-items" id="id-noactive-list" style="display:none;">
	<div class="inline-filter cart-filter">
		<label><?=GetMessage("SALE_PRD_IN_BASKET")?></label>&nbsp;
			<a href="javascript:void(0);" onclick="ShowBasketItems(1);"><?=GetMessage("SALE_PRD_IN_BASKET_ACT")?> (<?=count($arResult["ITEMS"]["AnDelCanBuy"])?>)</a>&nbsp;
			<a href="javascript:void(0);" onclick="ShowBasketItems(2);"><?=GetMessage("SALE_PRD_IN_BASKET_SHELVE")?> (<?=count($arResult["ITEMS"]["DelDelCanBuy"])?>)</a>
			<b><?=GetMessage("SALE_NOACTIVE")?></b>&nbsp;
			<a href="javascript:void(0);" onclick="ShowBasketItems(3);"><?=GetMessage("SALE_BASKET_NOTIFY")?> (<?=count($arResult["ITEMS"]["AnSubscribe"])?>)</a>
	</div>
	<?if(count($arResult["ITEMS"]["nAnCanBuy"]) > 0):?>
		<table class="cart-items" cellspacing="0">

		<tbody>
		<?
		foreach($arResult["ITEMS"]["nAnCanBuy"] as $arBasketItems)
		{
			?>
			<tr>
				<?if (in_array("NAME", $arParams["COLUMNS_LIST"])):?>
					<td class="cart-item-name"><?
					if (strlen($arBasketItems["DETAIL_PAGE_URL"])>0):
						?><a href="<?=$arBasketItems["DETAIL_PAGE_URL"] ?>"><?
					endif;
					?><b><?=$arBasketItems["NAME"] ?></b><?
					if (strlen($arBasketItems["DETAIL_PAGE_URL"])>0):
						?></a><?
					endif;?>
					<?if (in_array("PROPS", $arParams["COLUMNS_LIST"]))
					{
						foreach($arBasketItems["PROPS"] as $val)
						{
							echo "<br />".$val["NAME"].": ".$val["VALUE"];
						}
					}?>
					</td>
				<?endif;?>
				<?if (in_array("PRICE", $arParams["COLUMNS_LIST"])):?>
					<td class="cart-item-price"><?=$arBasketItems["PRICE_FORMATED"]?></td>
				<?endif;?>
				<?if (in_array("VAT", $arParams["COLUMNS_LIST"])):?>
					<td class="cart-item-price"><?=$arBasketItems["VAT_RATE_FORMATED"]?></td>
				<?endif;?>
				<?if (in_array("TYPE", $arParams["COLUMNS_LIST"])):?>
					<td class="cart-item-type"><?=$arBasketItems["NOTES"]?></td>
				<?endif;?>
				<?if (in_array("DISCOUNT", $arParams["COLUMNS_LIST"])):?>
					<td class="cart-item-discount"><?=$arBasketItems["DISCOUNT_PRICE_PERCENT_FORMATED"]?></td>
				<?endif;?>
				<?if (in_array("WEIGHT", $arParams["COLUMNS_LIST"])):?>
					<td class="cart-item-weight"><?=$arBasketItems["WEIGHT_FORMATED"]?></td>
				<?endif;?>
				<?if (in_array("QUANTITY", $arParams["COLUMNS_LIST"])):?>
					<td class="cart-item-quantity"><?=$arBasketItems["QUANTITY"]?></td>
				<?endif;?>
				<td class="cart-item-actions">
					<?if (in_array("DELETE", $arParams["COLUMNS_LIST"])):?>
						<a href="<?=str_replace("#ID#", $arBasketItems["ID"], $arUrlTempl["delete"])?>" title="<?=GetMessage("SALE_DELETE_PRD")?>"><?=GetMessage("SALE_DELETE")?></a><br />
					<?endif;?>
				</td>
			</tr>
			<?
		}
		?>
		</tbody>
		</table>
	<?else:
		echo ShowNote(GetMessage("SALE_NO_NOACTIVE"));
	endif;?>
</div>
