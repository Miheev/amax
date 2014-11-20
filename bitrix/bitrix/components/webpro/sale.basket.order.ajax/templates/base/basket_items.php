<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="cart-items" id="id-cart-list">
<!--	<div class="inline-filter cart-filter">-->
<!--		<label>--><?//=GetMessage("SALE_PRD_IN_BASKET")?><!--</label>&nbsp;-->
<!--		<b>--><?//=GetMessage("SALE_PRD_IN_BASKET_ACT")?><!--</b>&nbsp;-->
<!--		<a href="javascript:void(0);" onclick="ShowBasketItems(2);">--><?//=GetMessage("SALE_PRD_IN_BASKET_SHELVE")?><!-- (--><?//=count($arResult["ITEMS"]["DelDelCanBuy"])?><!--)</a>-->
<!--		<a href="javascript:void(0);" onclick="ShowBasketItems(4);">--><?//=GetMessage("SALE_NOACTIVE")?><!-- (--><?//=count($arResult["ITEMS"]["nAnCanBuy"])?><!--)</a>-->
<!--		<a href="javascript:void(0);" onclick="ShowBasketItems(3);">--><?//=GetMessage("SALE_BASKET_NOTIFY")?><!-- (--><?//=count($arResult["ITEMS"]["AnSubscribe"])?><!--)</a>-->
<!--	</div>-->
	
	<?if(count($arResult["ITEMS"]["AnDelCanBuy"]) > 0):?>
		<table class="cart-items">
		<tbody>
		<?
//        echo '<pre>';
//        print_r($arResult["ITEMS"]["AnDelCanBuy"]);
//        echo '</pre>';
		$i=0;
		foreach($arResult["ITEMS"]["AnDelCanBuy"] as $arBasketItems)
		{
            //Дёргаем цену и элемента с id - $id
            $prod = GetCatalogProduct($arBasketItems['PRODUCT_ID']);
//            $prod_price = GetCatalogProductPrice($arBasketItems['PRODUCT_ID'], 1);
//Конвертируем валюту в рубли, вам может и не понадобится
//if(isset($ar_price['CURRENCY']) && $ar_price['CURRENCY']!="RUB") $ar_price['PRICE'] = CCurrencyRates::ConvertCurrency($ar_price['PRICE'], $ar_price["CURRENCY"], "RUB");
//В переменной $price теперь содержится цена товара
//            var_dump($prod);
			?>
			<tr>
				<?if (in_array("NAME", $arParams["COLUMNS_LIST"])):?>
					<td class="name">
                        <div class="img">
                            <?if (!empty($arBasketItems['PREVIEW_PICTURE'])) :
                                $img= CFile::ResizeImageGet($arBasketItems['PREVIEW_PICTURE'], array('width'=>120, 'height'=>90), BX_RESIZE_IMAGE_EXACT);
                                echo CFile::ShowImage($img['src'], 120, 90, '', $arBasketItems["DETAIL_PAGE_URL"]);
                            else :
                                echo CFile::ShowImage(SITE_TEMPLATE_PATH.'/img/no_photo.png', 120, 90, '', $arBasketItems["DETAIL_PAGE_URL"]);
                            endif;?>
                        </div>
                        <h3>
                            <?if (!empty($arBasketItems["DETAIL_PAGE_URL"])): ?>
                            <a href="<?=$arBasketItems["DETAIL_PAGE_URL"] ?>">
                                <?endif;?>
                            <?=$arBasketItems["NAME"] ?>
                            <?if (!empty($arBasketItems["DETAIL_PAGE_URL"])): ?>
                            </a>
                            <?endif;?>
                        </h3>
                        <div class="props">
                            <?if (in_array("PROPS", $arParams["COLUMNS_LIST"]))
                            {
                                foreach($arBasketItems["PROPS"] as $val)
                                {
                                    echo "<br />".$val["NAME"].": ".$val["VALUE"];
                                }
                            }?>
                        </div>
					</td>
				<?endif;?>

				<?if (in_array("WEIGHT", $arParams["COLUMNS_LIST"])):?>
					<td class="cart-item-weight"><?=$arBasketItems["WEIGHT_FORMATED"]?></td>
				<?endif;?>
                <td class="instock">
                    <span <?echo $prod['QUANTITY'] ? 'class="available"' : '';?>><?echo $prod['QUANTITY'] ? 'в наличии' : 'нет в наличии';?></span>
                </td>
				<?if (in_array("QUANTITY", $arParams["COLUMNS_LIST"])):?>
					<td class="cart-item-quantity">
                        <?=number_format($arBasketItems["PRICE"], 0, '.', ' ')?>р х <input maxlength="18" type="text" name="QUANTITY_<?=$arBasketItems["ID"] ?>" value="<?=$arBasketItems["QUANTITY"]?>" size="2" onchange="submitForm();">
                    </td>
				<?endif;?>
				<?if (in_array("DISCOUNT", $arParams["COLUMNS_LIST"])):?>
					<td class="cart-item-discount"><?=$arBasketItems["DISCOUNT_PRICE_PERCENT_FORMATED"]?></td>
				<?endif;?>
				<?if (in_array("TYPE", $arParams["COLUMNS_LIST"])):?>
					<td class="cart-item-type"><?=$arBasketItems["NOTES"]?></td>
				<?endif;?>
				<?if (in_array("PRICE", $arParams["COLUMNS_LIST"])):?>
					<td class="cart-item-price"><?=number_format($arBasketItems["PRICE"]*$arBasketItems["QUANTITY"], 0, '.', ' ')?> р</td>
				<?endif;?>
				<td class="cart-item-actions">
					<?if (in_array("DELETE", $arParams["COLUMNS_LIST"])):?>
						<a href="<?=str_replace("#ID#", $arBasketItems["ID"], $arUrlTempl["delete"])?>" title="<?=GetMessage("SALE_DELETE_PRD")?>">Х</a><br>
					<?endif;?>
<!--					--><?//if (in_array("DELAY", $arParams["COLUMNS_LIST"])):?>
<!--						<a href="--><?//=str_replace("#ID#", $arBasketItems["ID"], $arUrlTempl["shelve"])?><!--">--><?//=GetMessage("SALE_OTLOG")?><!--</a>-->
<!--					--><?//endif;?>
				</td>
			</tr>
			<?
			$i++;
		}
		?>
		</tbody>
		</table>

		<div class="cart-ordering">
			<?if ($arParams["HIDE_COUPON"] != "Y"):?>
				<div class="cart-code">
					<input value="<?=$arResult["COUPON"]?>" name="COUPON" >
					<div><small><?=GetMessage("SALE_COUPON_VAL")?></small></div>
				</div>
			<?endif;?>
			<div class="cart-buttons">
				<input type="submit" value="<?=GetMessage("SALE_UPDATE")?>" name="BasketRefresh" onClick="submitForm();">
				<input type="button" value="<?=GetMessage("SALE_TAKE_ORDER")?>" name="BasketOrder" onClick="ShowOrder();">
			</div>
		</div>
	<?else:
		echo ShowNote(GetMessage("SALE_NO_ACTIVE_PRD"));
	endif;?>	
</div>
