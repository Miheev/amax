<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();
?>

<?if(isset($_POST['register_submit_button'])){
    $_SESSION['reg_send_msg']= false;
    $_SESSION['reg_err_msg']= false;
}
?>

<?
$frame= $this->createFrame()->begin('<img src="'.SITE_TEMPLATE_PATH.'/img/wait27.gif" alt="" />');

if($USER->IsAuthorized()):
//    $_SESSION['reg_send_msg']= true;
//    $_SESSION['reg_err_msg']= true;
    ?>

<p><?echo GetMessage("MAIN_REGISTER_AUTH")?></p>

<?else:?>
<?if (count($arResult["ERRORS"]) > 0):?>
<div class="error-msg">
	<?foreach ($arResult["ERRORS"] as $key => $error)
		if (intval($key) == 0 && $key !== 0) 
			$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error);

    ShowError(implode("<br />", $arResult["ERRORS"]));

    if (empty($_SESSION['reg_err_msg'])) :
        $_SESSION['reg_err_msg']= true;
    ?>
<!--    <script>-->
<!--        $(document).ready(function(){-->
<!--            $('.auth-btn a').eq(0).trigger('click');-->
<!--        });-->
<!--    </script>-->
<?endif;?>
</div>
<?
elseif($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):
?>
<p class="reg-true"><?echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT")?></p>
    <?if (empty($_SESSION['reg_send_msg'])) :
        $_SESSION['reg_send_msg']= true;
    ?>
<!--    <script>-->
<!--        $(document).ready(function(){-->
<!--            $('.auth-btn a').eq(0).trigger('click');-->
<!--        });-->
<!--    </script>-->
    <?endif?>
<?endif?>

<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data">
        <?
        if($arResult["BACKURL"] <> ''):
            ?>
            <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
        <?
        endif;
        ?>
<!--        <input size="30" type="text" name="REGISTER[LOGIN]" placeholder="Логин (мин. 3 символа) *">-->
        <input size="30" type="text" name="REGISTER[EMAIL]" placeholder="Электронная почта *">
        <input size="30" type="password" name="REGISTER[PASSWORD]" value="" autocomplete="off" class="bx-auth-input" placeholder="Пароль *">
<!--        <input size="30" type="password" name="REGISTER[CONFIRM_PASSWORD]" value="" autocomplete="off" placeholder="Подтверждение пароля *">-->
<!--        <input size="30" type="text" name="REGISTER[PERSONAL_MOBILE]" placeholder="Мобильный">-->

        <!--<p>--><?//echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?><!--</p>-->
        <!--<p><span class="starrequired">*</span>--><?//=GetMessage("AUTH_REQ")?><!--</p>-->
        <input type="submit" class="abutton" name="register_submit_button" value="Зарегистрироваться" />
</form>
<?endif;

$frame->end();
?>
