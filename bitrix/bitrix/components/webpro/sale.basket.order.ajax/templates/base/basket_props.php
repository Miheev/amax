<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if (!function_exists('PrintPropsForm'))
{
	function PrintPropsForm($arSource=Array(), $locationTemplate = ".default")
{
	if (!empty($arSource))
	{
		foreach($arSource as $arProperties)
		{
			if($arProperties["SHOW_GROUP_NAME"] == "Y")
			{
				?>
				<tr>
					<td colspan="2">
						<b><?= $arProperties["GROUP_NAME"] ?></b>
					</td>
				</tr>
				<?
			}
			?>
			<tr>
				<td class="props">
                    <?
                    if($arProperties["REQUIED_FORMATED"]=="Y")
                    {
                        ?><span class="sof-req">*</span><?
                    }
                    ?>
					<?
					if($arProperties["TYPE"] == "CHECKBOX")
					{
						?>
						
						<input type="hidden" name="<?=$arProperties["FIELD_NAME"]?>" value="">
						<input type="checkbox" name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>" value="Y"<?if ($arProperties["CHECKED"]=="Y") echo " checked";?>>
						<?
					}
					elseif($arProperties["TYPE"] == "TEXT")
					{
						if ($arProperties["IS_ZIP"] == "Y")
						{
						?>
							<input type="hidden" name="CHANGE_ZIP" id="change_zip_val" value="" />
							<input onChange="fChangeZip();" type="text" placeholder="<?= $arProperties["NAME"] ?>" maxlength="250" size="<?=$arProperties["SIZE1"]?>" value="<?=$arProperties["VALUE"]?>" name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>">
							<script>
								function fChangeZip () 
								{
									document.getElementById("change_zip_val").value = "Y";
									submitForm();
								}
							</script>
						<?
						}
						else
						{
						?>
							<input type="text" placeholder="<?= $arProperties["NAME"] ?>" maxlength="250" size="<?=$arProperties["SIZE1"]?>" value="<?=$arProperties["VALUE"]?>" name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>">
						<?
						}
					}
					elseif($arProperties["TYPE"] == "SELECT")
					{
						?>
						<select name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>" size="<?=$arProperties["SIZE1"]?>">
						<?
						foreach($arProperties["VARIANTS"] as $arVariants)
						{
							?>
							<option value="<?=$arVariants["VALUE"]?>"<?if ($arVariants["SELECTED"] == "Y") echo " selected";?>><?=$arVariants["NAME"]?></option>
							<?
						}
						?>
						</select>
						<?
					}
					elseif ($arProperties["TYPE"] == "MULTISELECT")
					{
						?>
						<select multiple name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>" size="<?=$arProperties["SIZE1"]?>">
						<?
						foreach($arProperties["VARIANTS"] as $arVariants)
						{
							?>
							<option value="<?=$arVariants["VALUE"]?>"<?if ($arVariants["SELECTED"] == "Y") echo " selected";?>><?=$arVariants["NAME"]?></option>
							<?
						}
						?>
						</select>
						<?
					}
					elseif ($arProperties["TYPE"] == "TEXTAREA")
					{
						?>
						<textarea placeholder="<?= $arProperties["NAME"] ?>" rows="<?=$arProperties["SIZE2"]?>" cols="<?=$arProperties["SIZE1"]?>" name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>"><?=$arProperties["VALUE"]?></textarea>
						<?
					}
					elseif ($arProperties["TYPE"] == "LOCATION")
					{
						$value = 0;
						foreach ($arProperties["VARIANTS"] as $arVariant) 
						{
							if ($arVariant["SELECTED"] == "Y") 
							{
								$value = $arVariant["ID"]; 
								break;
							}
						}

						echo '<div class="location">';
                        $GLOBALS["APPLICATION"]->IncludeComponent(
							"bitrix:sale.ajax.locations",
//							$locationTemplate,
							'base',
							array(
								"AJAX_CALL" => "N",
								"COUNTRY_INPUT_NAME" => "COUNTRY_".$arProperties["FIELD_NAME"],
								"REGION_INPUT_NAME" => "REGION_".$arProperties["FIELD_NAME"],
								"CITY_INPUT_NAME" => $arProperties["FIELD_NAME"],
								"CITY_OUT_LOCATION" => "Y",
								"LOCATION_VALUE" => $value,
								"ORDER_PROPS_ID" => $arProperties["ID"],
								"ONCITYCHANGE" => ($arProperties["IS_LOCATION"] == "Y" || $arProperties["IS_LOCATION4TAX"] == "Y") ? "submitForm()" : "",
								"SIZE1" => $arProperties["SIZE1"],
							),
							null,
							array('HIDE_ICONS' => 'Y')
						);
                        echo '</div>';
					}
					elseif ($arProperties["TYPE"] == "RADIO")
					{
						foreach($arProperties["VARIANTS"] as $arVariants)
						{
							?>
							<input type="radio" name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>_<?=$arVariants["VALUE"]?>" value="<?=$arVariants["VALUE"]?>"<?if($arVariants["CHECKED"] == "Y") echo " checked";?>> <label for="<?=$arProperties["FIELD_NAME"]?>_<?=$arVariants["VALUE"]?>"><?=$arVariants["NAME"]?></label><br />
							<?
						}
					}

					if (strlen($arProperties["DESCRIPTION"]) > 0)
					{
						?><br /><small><?echo $arProperties["DESCRIPTION"] ?></small><?
					}
					?>
					
				</td>
			</tr>
			<?
		}
		?>
		<?
		return true;
	}
	return false;
}
}
?>

<div class="order-info clearfix">
<div class="auth">
    <?$APPLICATION->IncludeComponent(
    "bitrix:system.auth.form",
    "simple_auth",
    array(
    "REGISTER_URL" => "/auth.php",
    "FORGOT_PASSWORD_URL" => "/auth.php?forgot_password=yes&ssp=none",
    "PROFILE_URL" => "/personal/",
    "SHOW_ERRORS" => "Y",
    "AUTH_SERVICES" => "N"
    ),
    false
    );?>
</div>
<div class="order_props">
    <div class="inner clearfix">
        <div class="left">
            <?
            $default = "0";
            foreach($arResult["USER_PROFILES"] as $key => $arUserProfiles)
            {
                if ($arUserProfiles["CHECKED"]=="Y") {
                    $default=$key;
                    $uname=$arUserProfiles["NAME"];
                }
            }
            ?>
            <input type="hidden" name="PROFILE_ID_OLD" value="<?=$default?>" />
            <input type="hidden" name="PROFILE_ID_OLD" value="<?=$default?>" />
            <!--    <div class="desc">--><?//=GetMessage("SOA_TEMPL_PROP_CHOOSE")?><!--</div>-->
            <h3>Контактная информация</h3>
            <table class="sale_order_full_table"><tbody>
                <?
                PrintPropsForm($arResult["ORDER_PROPS"]["USER_PROPS_N"], $arParams["TEMPLATE_LOCATION"]);
                PrintPropsForm($arResult["ORDER_PROPS"]["USER_PROPS_Y"], $arParams["TEMPLATE_LOCATION"]);
                ?>
                <tr>
                    <td>
                        <?
                        foreach($arResult["PERSON_TYPE"] as $v)
                        {
                            ?><input type="radio" id="PERSON_TYPE_<?= $v["ID"] ?>" name="PERSON_TYPE" value="<?= $v["ID"] ?>"<?if ($v["CHECKED"]=="Y") echo " checked=\"checked\"";?> onClick="submitForm()"> <label for="PERSON_TYPE_<?= $v["ID"] ?>"><?= $v["NAME"] ?></label><br /><?
                        }
                        ?>
                    </td>
                </tr>
            </tbody></table>
        </div>
        <div class="right">
        <div class="delivery">
            <?
            $dels= array();
            $dname= '';
            foreach($arResult["DELIVERY"] as $val)
            {
                $send=strpos($val["TITLE"], ' ()');
                if ($send) {
                    $val["TITLE"]= substr($val["TITLE"], 0, $send);
                }

                if ($val["CHECKED"])
                    $dname= '<span title="'.$val["TITLE"].'">'.$val["TITLE"].'</span>';
                if (empty($val["ID"]))
                    continue;
                $iid= str_replace(':','-',$val["ID"]);
                $dels[]= '<input id="DELIVERY_ID-'.$iid.'" name="DELIVERY_ID" onChange="submitForm();" type="radio" value="'.$val["ID"].'"'.
                    ($val["CHECKED"]=="Y" ? " checked" : '').
                    '><label for="DELIVERY_ID-'.$iid.'" title="'.$val["TITLE"].'">'.$val["TITLE"].'</label>';
            }
            ?>
            <h3>Выберите способ доставки: <?=$dname;?></h3>
            <div class="chk">
                <?foreach($dels as $dd) echo $dd;?>
            </div>

            <?if (isset($arResult["PRICE_DELIVERY_FORMATED"]) && $arResult["PRICE_DELIVERY_FORMATED"] != ""):?>
                <div class="desc"><?=GetMessage("SOA_DELIVERY_PRICE")?>: <b><?=$arResult["PRICE_DELIVERY_FORMATED"]?></b></div>
            <?endif?>
            <div class="desc"><?=$arResult["DELIVERY_CHECHED_DESC"]?></div>
        </div>
        <div class="payment">
            <?
            $dels= array();
            $dname= '';
            foreach($arResult["PAYSYSTEM"] as $val)
            {
                if ($val["CHECKED"]=="Y")
                    $dname= '<span title="'.$val["NAME"].'">'.$val["NAME"].'</span>';;
                if (empty($val["ID"]) || $val["ID"] == 'account')
                    continue;
                $dels[]= '<input id="PAYSYSTEM_ID-'.$val["ID"].'" name="PAYSYSTEM_ID" onChange="submitForm();" type="radio" value="'.$val["ID"].'"'.
                    ($val["CHECKED"]=="Y" ? " checked" : '').
                    '><label for="PAYSYSTEM_ID-'.$val["ID"].'" title="'.$val["NAME"].'"></label>';
            }
            ?>
            <h3>Выберите способ оплаты: <?=$dname;?></h3>
            <div class="chk">
                <?foreach($dels as $dd) echo $dd;?>
            </div>
            <div class="desc"><?=$arResult["PAYSYSTEM_CHECKED_DESC"]?></div>
        </div>
    </div>
        <div class="result-sum">
                    <?if (in_array("NAME", $arParams["COLUMNS_LIST"])):?>
                            <?if (in_array("WEIGHT", $arParams["COLUMNS_LIST"])):?>
                                <p><?echo GetMessage("SALE_ALL_WEIGHT")?>: <span><?=$arResult["ORDER_WEIGHT_FORMATED"]?></span></p>
                            <?endif;?>
                            <?if (doubleval($arResult["DISCOUNT_PRICE"]) > 0)
                            {
                                ?><p><?echo GetMessage("SALE_CONTENT_DISCOUNT")?><?
                                if (strLen($arResult["DISCOUNT_PERCENT_FORMATED"])>0)
                                    echo " (".$arResult["DISCOUNT_PERCENT_FORMATED"].")";?>: <span><?=$arResult["DISCOUNT_PRICE_FORMATED"]?></span></p>
                            <?
                            }?>
                            <?if ($arParams['PRICE_TAX_SHOW_VALUE'] == 'Y'):?>
                                <p><?echo GetMessage('SALE_TAX_INCLUDED')?> <span><?=$arResult["TAX_VALUE_FORMATED"]?></span></p>
                            <?endif;?>
                            <?if ($arParams['PRICE_VAT_SHOW_VALUE'] == 'Y'):?>
                                <p><?echo GetMessage('SALE_VAT_INCLUDED')?> <span><?=$arResult["VAT_SUM_FORMATED"]?></span></p>
                            <?endif;?>
                            <p><?= GetMessage("SALE_ITOGO")?>: <span><?=$arResult["PRICE_FORMATED"]?></span></p>
                    <?endif;?>
        </div>
    </div>
</div>
</div>