<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<?if ($arResult["isFormNote"] != "Y")
{
?>
<?=$arResult["FORM_HEADER"]?>

    <h2><?=$arResult["FORM_TITLE"]?></h2>
<?
/***********************************************************************************
						form questions
***********************************************************************************/
?>
<table class="form-table data-table">
	<tbody>
	<?
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
	{
		if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
		{
			echo $arQuestion["HTML_CODE"];
		}
		else
		{
	?>
		<tr>
			<td>
				<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
				<span class="error-fld" title="<?=$arResult["FORM_ERRORS"][$FIELD_SID]?>"></span>
				<?endif;?>
				<?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
				<?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />".$arQuestion["IMAGE"]["HTML_CODE"] : ""?>
			</td>
			<td><?=$arQuestion["HTML_CODE"]?></td>
		</tr>
	<?
		}
	} //endwhile
	?>
    <?
    if($arResult["isUseCaptcha"] == "Y")
    {
        ?>
		<tr>
			<td>Защитный код<?=$arResult["REQUIRED_SIGN"];?></td>
			<td>
                <input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" /><img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="140" height="40" />
                <input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" />
            </td>
		</tr>
    <?}?>
    <tr>
        <td>
            <input class="abutton" <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
        </td>
    </tr>
	</tbody>
</table>
<!--<p>-->
<?//=$arResult["REQUIRED_SIGN"];?><!-- - --><?//=GetMessage("FORM_REQUIRED_FIELDS")?>
<!--</p>-->
<?=$arResult["FORM_FOOTER"]?>
<?
}  else {// (isFormNote)
?>
<div class="success-msg">
    <p>Сообщение успешно отправлено!</p>
</div>
<?}?>