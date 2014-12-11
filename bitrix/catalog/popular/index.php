<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог | trastcomerc.ru");
$APPLICATION->SetPageProperty("description", "Мы предлагаем широкий ассортимент строительных материалов по адекватным ценам.");
$APPLICATION->SetPageProperty("keywords", "цемент, краски, клей, штукатурка, шпатлевка, гипсокартон, инструменты");
$APPLICATION->addChainItem('Популярные товары', $APPLICATION->GetCurPage());
?>
<div class="product-list">
    <h1>Популярные товары</h1>
    <?$APPLICATION->IncludeComponent("bitrix:catalog.top", "stuff_list", array(
	"IBLOCK_TYPE" => "catalogs",
	"IBLOCK_ID" => "17",
	"ELEMENT_SORT_FIELD" => "shows",
	"ELEMENT_SORT_ORDER" => "desc",
	"ELEMENT_SORT_FIELD2" => "id",
	"ELEMENT_SORT_ORDER2" => "desc",
	"FILTER_NAME" => "",
	"HIDE_NOT_AVAILABLE" => "N",
	"ELEMENT_COUNT" => "4",
	"LINE_ELEMENT_COUNT" => "4",
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "CML2_ARTICLE",
		2 => "CML2_BASE_UNIT",
		3 => "CML2_MANUFACTURER",
		4 => "CML2_ATTRIBUTES",
		5 => "CML2_BAR_CODE",
		6 => "",
	),
	"OFFERS_FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"OFFERS_PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"OFFERS_SORT_FIELD" => "sort",
	"OFFERS_SORT_ORDER" => "asc",
	"OFFERS_SORT_FIELD2" => "id",
	"OFFERS_SORT_ORDER2" => "desc",
	"OFFERS_LIMIT" => "28",
	"VIEW_MODE" => "SECTION",
	"TEMPLATE_THEME" => "blue",
	"PRODUCT_DISPLAY_MODE" => "N",
	"ADD_PICT_PROP" => "-",
	"LABEL_PROP" => "-",
	"SHOW_DISCOUNT_PERCENT" => "Y",
	"SHOW_OLD_PRICE" => "Y",
	"MESS_BTN_BUY" => "Купить",
	"MESS_BTN_ADD_TO_BASKET" => "В корзину",
	"MESS_BTN_DETAIL" => "Подробнее",
	"MESS_NOT_AVAILABLE" => "Нет в наличии",
	"SECTION_URL" => "",
	"DETAIL_URL" => "",
	"SECTION_ID_VARIABLE" => "SECTION_ID",
	"PRODUCT_QUANTITY_VARIABLE" => "quantity",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_GROUPS" => "Y",
	"DISPLAY_COMPARE" => "N",
	"CACHE_FILTER" => "N",
	"PRICE_CODE" => array(
		0 => "BASE",
	),
	"USE_PRICE_COUNT" => "N",
	"SHOW_PRICE_COUNT" => "1",
	"PRICE_VAT_INCLUDE" => "N",
	"CONVERT_CURRENCY" => "N",
	"BASKET_URL" => "/personal/order",
	"ACTION_VARIABLE" => "action",
	"PRODUCT_ID_VARIABLE" => "ELEMENT_ID",
	"USE_PRODUCT_QUANTITY" => "Y",
	"ADD_PROPERTIES_TO_BASKET" => "Y",
	"PRODUCT_PROPS_VARIABLE" => "prop",
	"PARTIAL_PRODUCT_PROPERTIES" => "Y",
	"PRODUCT_PROPERTIES" => array(
	),
	"OFFERS_CART_PROPERTIES" => array(
	)
	),
	false
);?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>