<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Демонстрационная версия продукта «1С-Битрикс: Управление сайтом»");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetTitle("Каталог книг");
?>
    <div class="hfind-container">
        <div class="hfind wrapper clearfix">
            <?$APPLICATION->IncludeComponent("bitrix:search.title", "base", array(
	"NUM_CATEGORIES" => "1",
	"TOP_COUNT" => "5",
	"ORDER" => "date",
	"USE_LANGUAGE_GUESS" => "Y",
	"CHECK_DATES" => "Y",
	"SHOW_OTHERS" => "N",
	"PAGE" => "/search.php",
	"CATEGORY_0_TITLE" => GetMessage("SEARCH_GOODS"),
	"CATEGORY_0" => array(
		0 => "no",
	),
	"SHOW_INPUT" => "Y",
	"INPUT_ID" => "search_tt_in",
	"CONTAINER_ID" => "search_tt_in",
	"PRICE_CODE" => array(
	),
	"PRICE_VAT_INCLUDE" => "Y",
	"PREVIEW_TRUNCATE_LEN" => "",
	"SHOW_PREVIEW" => "Y",
	"PREVIEW_WIDTH" => "75",
	"PREVIEW_HEIGHT" => "75",
	"CONVERT_CURRENCY" => "N"
	),
	false
);?>
            <section class="cat-menu clearfix">
                <h2 class="gradient"><a href="/catalog">Каталог товаров</a></h2>
                <? $APPLICATION->IncludeComponent("bitrix:menu", "catalog_menu", array(
                        "ROOT_MENU_TYPE" => "left",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_TIME" => "36000000",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => array(
                            0 => "SECTION_ID",
                            1 => "",
                        ),
                        "MAX_LEVEL" => "3",
                        "CHILD_MENU_TYPE" => "left",
                        "USE_EXT" => "Y",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N"
                    ),
                    false
                ); ?>
<!--                <div class="footer">-->
<!--                    <img src="--><?//=SITE_TEMPLATE_PATH?><!--/img/bk_cat_menu.png" alt="" />-->
<!--                </div>-->
            </section>
            <div class="popup-cat-label">
                <a class="abutton" href="javascript:void(0);">Открыть каталог</a>
            </div>
        </div>
    </div>
    <div class="main-container">
        <div class="main cat-ico wrapper clearfix">
            <aside class="right">
<?
$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "inc_2",
        "EDIT_TEMPLATE" => "",
        "AREA_FILE_RECURSIVE" => "Y",
        "PATH" => SITE_TEMPLATE_PATH."/include/action.php"
    )
);
?>
            </aside>
            <div class="center">
                <div class="head">
                    <h3>Каталог запчастей онлайн</h3>
                </div>
                <div class="cat-list clearfix">
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_toyota.png" />
                            <span>TOYOTA</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_mazda.png" />
                            <span>MAZDA</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_bmw.png" />
                            <span>BMW</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_mercedes.png" />
                            <span>MERCEDES-BENZ</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_honda.png" />
                            <span>HONDA</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_hyundai.png" />
                            <span>HYUNDAI</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_isuzu.png" />
                            <span>ISUZU</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_daewoo.png" />
                            <span>DAEWOO</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_subaru.png" />
                            <span>SUBARU</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_infiniti.png" />
                            <span>ISUZU</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_chevrolet.png" />
                            <span>DAEWOO</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_renault.png" />
                            <span>SUBARU</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_audi.png" />
                            <span>AUDI</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_subaru.png" />
                            <span>SUZUKI</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_nissan.png" />
                            <span>NISSAN</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<? CModule::IncludeModule('catalog');
if($res = CCatalogDiscount::GetDiscountProductsList(array(), array(">=DISCOUNT_ID" => 1), false, false, array())){
    while($ob = $res->GetNext()){
        $arDiscountElementID[] = $ob["PRODUCT_ID"];
    }}
?> <?$stuff_discount = array("ID" => $arDiscountElementID);?>

<?$APPLICATION->IncludeComponent("bitrix:catalog.section", "bx_discount", array(
	"IBLOCK_TYPE" => "catalogs",
	"IBLOCK_ID" => "17",
	"SECTION_ID" => "",
	"SECTION_CODE" => "",
	"SECTION_USER_FIELDS" => array(
		0 => "",
		1 => "",
	),
	"ELEMENT_SORT_FIELD" => "id",
	"ELEMENT_SORT_ORDER" => "desc",
	"ELEMENT_SORT_FIELD2" => "sort",
	"ELEMENT_SORT_ORDER2" => "desc",
	"FILTER_NAME" => "stuff_discount",
	"INCLUDE_SUBSECTIONS" => "Y",
	"SHOW_ALL_WO_SECTION" => "Y",
	"HIDE_NOT_AVAILABLE" => "N",
	"PAGE_ELEMENT_COUNT" => "10",
	"LINE_ELEMENT_COUNT" => "5",
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"OFFERS_LIMIT" => "5",
	"TEMPLATE_THEME" => "blue",
	"ADD_PICT_PROP" => "-",
	"LABEL_PROP" => "-",
	"PRODUCT_SUBSCRIPTION" => "N",
	"SHOW_DISCOUNT_PERCENT" => "N",
	"SHOW_OLD_PRICE" => "N",
	"MESS_BTN_BUY" => "Купить",
	"MESS_BTN_ADD_TO_BASKET" => "В корзину",
	"MESS_BTN_SUBSCRIBE" => "Подписаться",
	"MESS_BTN_DETAIL" => "Подробнее",
	"MESS_NOT_AVAILABLE" => "Нет в наличии",
	"SECTION_URL" => "/catalog/#SECTION_CODE#",
	"DETAIL_URL" => "",
	"SECTION_ID_VARIABLE" => "SECTION_ID",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_GROUPS" => "Y",
	"SET_META_KEYWORDS" => "N",
	"META_KEYWORDS" => "-",
	"SET_META_DESCRIPTION" => "N",
	"META_DESCRIPTION" => "-",
	"BROWSER_TITLE" => "-",
	"ADD_SECTIONS_CHAIN" => "N",
	"DISPLAY_COMPARE" => "N",
	"SET_TITLE" => "N",
	"SET_STATUS_404" => "N",
	"CACHE_FILTER" => "N",
	"PRICE_CODE" => array(
		0 => "BASE",
	),
	"USE_PRICE_COUNT" => "N",
	"SHOW_PRICE_COUNT" => "1",
	"PRICE_VAT_INCLUDE" => "Y",
	"CONVERT_CURRENCY" => "N",
	"BASKET_URL" => "/personal/cart",
	"ACTION_VARIABLE" => "action",
	"PRODUCT_ID_VARIABLE" => "ELEMENT_ID",
	"USE_PRODUCT_QUANTITY" => "N",
	"ADD_PROPERTIES_TO_BASKET" => "Y",
	"PRODUCT_PROPS_VARIABLE" => "prop",
	"PARTIAL_PRODUCT_PROPERTIES" => "Y",
	"PRODUCT_PROPERTIES" => array(
	),
	"PAGER_TEMPLATE" => ".default",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "N",
	"PAGER_TITLE" => "Товары",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"AJAX_OPTION_ADDITIONAL" => "",
	"PRODUCT_QUANTITY_VARIABLE" => "quantity"
	),
	false
);?>
    <div class="main-container">
        <div class="main pop-news wrapper clearfix">
            <div class="center">
                <div class="product-list">
                    <div class="head">
                        <h2>Популярные товары</h2>
                        <a href="/catalog/popular">смотреть всё</a>
                    </div>
                    <?$APPLICATION->IncludeComponent("bitrix:catalog.top", "stuff_list", array(
	"IBLOCK_TYPE" => "catalogs",
	"IBLOCK_ID" => "17",
	"ELEMENT_SORT_FIELD" => "shows",
	"ELEMENT_SORT_ORDER" => "desc",
	"ELEMENT_SORT_FIELD2" => "id",
	"ELEMENT_SORT_ORDER2" => "desc",
	"FILTER_NAME" => "",
	"HIDE_NOT_AVAILABLE" => "N",
	"ELEMENT_COUNT" => "6",
	"LINE_ELEMENT_COUNT" => "3",
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "CML2_ARTICLE",
		2 => "CML2_BASE_UNIT",
		3 => "CML2_MANUFACTURER",
		4 => "CML2_ATTRIBUTES",
		5 => "CML2_BAR_CODE",
		6 => "",
	),
	"OFFERS_LIMIT" => "4",
	"VIEW_MODE" => "SECTION",
	"TEMPLATE_THEME" => "blue",
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
	"BASKET_URL" => "/personal/cart",
	"ACTION_VARIABLE" => "action",
	"PRODUCT_ID_VARIABLE" => "ELEMENT_ID",
	"USE_PRODUCT_QUANTITY" => "Y",
	"ADD_PROPERTIES_TO_BASKET" => "Y",
	"PRODUCT_PROPS_VARIABLE" => "prop",
	"PARTIAL_PRODUCT_PROPERTIES" => "Y",
	"PRODUCT_PROPERTIES" => array(
	)
	),
	false
);?>
                </div>
            </div>
            <aside class="right">
                <?$APPLICATION->IncludeComponent("bitrix:news.list", "news_index", array(
	"IBLOCK_TYPE" => "articles",
	"IBLOCK_ID" => "16",
	"NEWS_COUNT" => "3",
	"SORT_BY1" => "ACTIVE_FROM",
	"SORT_ORDER1" => "DESC",
	"SORT_BY2" => "ID",
	"SORT_ORDER2" => "DESC",
	"FILTER_NAME" => "",
	"FIELD_CODE" => array(
		0 => "DATE_ACTIVE_FROM",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"CHECK_DATES" => "Y",
	"DETAIL_URL" => "",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "Y",
	"PREVIEW_TRUNCATE_LEN" => "300",
	"ACTIVE_DATE_FORMAT" => "d.M.Y",
	"SET_STATUS_404" => "N",
	"SET_TITLE" => "N",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
	"ADD_SECTIONS_CHAIN" => "N",
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",
	"PARENT_SECTION" => "",
	"PARENT_SECTION_CODE" => "",
	"INCLUDE_SUBSECTIONS" => "Y",
	"PAGER_TEMPLATE" => "",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "N",
	"PAGER_TITLE" => "Новости",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_NAME" => "Y",
	"DISPLAY_PICTURE" => "Y",
	"DISPLAY_PREVIEW_TEXT" => "Y",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>
            </aside>
        </div>
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>