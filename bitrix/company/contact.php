<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
$APPLICATION->addChainItem($APPLICATION->GetTitle(false), $APPLICATION->GetCurPage());
?>
    <h1>Наши контакты</h1>
    <table class="full_size style_table_2" style="width: 100%; font-size: 16px; color: #444444;" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td class="style_td_1" style="width: 70px;">Адрес:</td>
            <td>119021, Россия, Москва, ул. Тимура Фрунзе, д. 11, стр. 13</td>
        </tr>
        <tr>
            <td class="style_td_1" style="width: 70px;">Телефон:</td>
            <td>+7 (495) 787-78-77</td>
        </tr>
        <tr>
            <td class="style_td_1" style="width: 70px;">Факс:</td>
            <td>+7 (495) 787-78-77</td>
        </tr>
        <tr>
            <td class="style_td_1" style="width: 70px;">E-mail:</td>
            <td><a href="mailto:info@creditus.su">info@creditus.su</a></td>
        </tr>
        </tbody>
    </table>
    <!--    <h2>Свяжитесь с нами</h2>-->
<?$APPLICATION->IncludeComponent(
    "bitrix:form.result.new",
    "std_composit",
    Array(
        "WEB_FORM_ID" => "2",
        "IGNORE_CUSTOM_TEMPLATE" => "N",
        "USE_EXTENDED_ERRORS" => "N",
        "SEF_MODE" => "N",
        "VARIABLE_ALIASES" => Array("WEB_FORM_ID"=>"WEB_FORM_ID","RESULT_ID"=>"RESULT_ID"),
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "LIST_URL" => "list.php",
        "EDIT_URL" => "result_edit.php",
        "SUCCESS_URL" => "",
        "CHAIN_ITEM_TEXT" => "",
        "CHAIN_ITEM_LINK" => "",
        "AJAX_MODE" => "Y",  // режим AJAX
        "AJAX_OPTION_SHADOW" => "N", // затемнять область
        "AJAX_OPTION_JUMP" => "N", // скроллить страницу до компонента
        "AJAX_OPTION_STYLE" => "N", // подключать стили
        "AJAX_OPTION_HISTORY" => "N"
    )
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>