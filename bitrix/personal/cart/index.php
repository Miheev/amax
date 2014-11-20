<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>

<?$APPLICATION->IncludeComponent("webpro:sale.basket.order.ajax","base",Array(
        "HIDE_COUPON" => "Y",
        "COLUMNS_LIST" => array(
            0 => "NAME",
            1 => "WEIGHT",
            2 => "DELETE",
            3 => "DELAY",
            4 => "PRICE",
            5 => "QUANTITY",
            6 => "SUM",
        ),
        "PATH_TO_PERSONAL" => "/personal/order/",
        "PATH_TO_PAYMENT" => "/personal/order/payment/",
        "SEND_NEW_USER_NOTIFY" => "Y",
        "QUANTITY_FLOAT" => "N",
        "PRICE_VAT_SHOW_VALUE" => "Y",
        "PRICE_TAX_SHOW_VALUE" => "N",
        "SHOW_BASKET_ORDER" => "Y",
        "TEMPLATE_LOCATION" => ".default",
        "SET_TITLE" => "Y"
    )
);?>

<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>