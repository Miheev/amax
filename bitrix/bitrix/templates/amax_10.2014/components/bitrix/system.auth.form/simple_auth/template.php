<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$frame= $this->createFrame()->begin('<img src="'.SITE_TEMPLATE_PATH.'/img/wait27.gif" alt="" />');
?>


<?if ($USER->IsAuthorized()) :
    $name = trim($USER->GetFullName());
    if (strlen($name) <= 0)
        $name = $USER->GetLogin();
    ?>
    <h3>Вы зашли как</h3>
    <div class="user-info">
        <span class="bx_login_top_inline_icon"></span>
        <a class="bx_login_top_inline_link" href="<?=$arResult['PROFILE_URL']?>"><?=htmlspecialcharsEx($name);?></a>
        <a class="bx_login_top_inline_link" href="<?=$APPLICATION->GetCurPageParam("logout=yes", Array("logout"))?>">Выйти</a>
    </div>
<?elseif ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR']):?>
    <div class="error-msg"><?ShowMessage($arResult['ERROR_MESSAGE']);?></div>
        <script>
            $(document).ready(function(){
                $('.auth-btn a').eq(0).trigger('click');
            });
        </script>
<?endif;?>
<?if($arResult["FORM_TYPE"] == "login"):?>
<form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
<?if($arResult["BACKURL"] <> ''):?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?endif?>
<?foreach ($arResult["POST"] as $key => $value):?>
	<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
<?endforeach?>
	<input type="hidden" name="AUTH_FORM" value="Y" />
	<input type="hidden" name="TYPE" value="AUTH" />

    <input class="input_text_style" type="text" name="USER_LOGIN" maxlength="255" value="<?=$arResult["LAST_LOGIN"]?>" placeholder="Электронная почта" />
    <input class="input_text_style" type="password" name="USER_PASSWORD" placeholder="<?=GetMessage("AUTH_PASSWORD")?>" maxlength="255" />

    <?if($arResult["CAPTCHA_CODE"]):?>
        <input type="hidden" name="captcha_sid" value="<?echo $arResult["CAPTCHA_CODE"]?>" />
        <img src="/bitrix/tools/captcha.php?captcha_sid=<?echo $arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
        <?echo GetMessage("AUTH_CAPTCHA_PROMT")?>:
        <input class="bx-auth-input" type="text" name="captcha_word" maxlength="50" value="" size="15" />
    <?endif;?>

    <?if ($arResult["STORE_PASSWORD"] == "Y"):?>
        <div class="rememberme"><label><input type="checkbox" id="USER_REMEMBER" name="USER_REMEMBER" value="Y" checked/><?=GetMessage("AUTH_REMEMBER_ME")?></label></div>
    <?endif?>

    <input type="submit" name="Login" class="abutton" value="Войти" />

    <?if ($arParams["NOT_SHOW_LINKS"] != "Y"):?>
        <a href="<?=$arParams["AUTH_FORGOT_PASSWORD_URL"] ? $arParams["AUTH_FORGOT_PASSWORD_URL"] : $arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></a>
    <?endif?>
</form>
    <script type="text/javascript">
        <?if (strlen($arResult["LAST_LOGIN"])>0):?>
        try{document.form_auth.USER_PASSWORD.focus();}catch(e){}
        <?else:?>
        try{document.form_auth.USER_LOGIN.focus();}catch(e){}
        <?endif?>
    </script>
<?endif;
$frame->end();
?>