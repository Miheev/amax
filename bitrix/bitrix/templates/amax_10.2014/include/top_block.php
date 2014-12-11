<div class="hfind-container">
    <div class="hfind wrapper clearfix">
        <?
            $_GET['ssp']= empty($_REQUEST['ssp']) ? 'none' : $_REQUEST['ssp'];
            switch($_GET['ssp']) {
                case 'oem':
                    $APPLICATION->IncludeComponent("bitrix:search.form", "base", array(
                            "PAGE" => "#SITE_DIR#search.php",
                            "USE_SUGGEST" => "Y"
                        ),
                        false
                    );
                    break;
                default:
                    $APPLICATION->IncludeComponent("bitrix:search.title", "base", array(
	"NUM_CATEGORIES" => "1",
	"TOP_COUNT" => "5",
	"ORDER" => "date",
	"USE_LANGUAGE_GUESS" => "Y",
	"CHECK_DATES" => "Y",
	"SHOW_OTHERS" => "N",
	"PAGE" => "/search.php",
	"CATEGORY_0_TITLE" => GetMessage("SEARCH_GOODS"),
	"CATEGORY_0" => array(
		0 => "iblock_catalogs",
	),
	"CATEGORY_0_iblock_catalogs" => array(
		0 => "all",
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
);
            }
        ?>
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
<!--            <div class="footer">-->
<!--                <img src="--><?//=SITE_TEMPLATE_PATH?><!--/img/bk_cat_menu.png" alt="" />-->
<!--            </div>-->
        </section>
        <div class="popup-cat-label">
            <a class="abutton" href="javascript:void(0);">Открыть каталог</a>
        </div>
    </div>
</div>
<? if ($page_class != 'index') : ?>
<div class="bread-container">
    <div class="bread wrapper clearfix">
        <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "base", Array(
	"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
	"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
	"SITE_ID" => "-",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
	),
	false
);?>
    </div>
</div>
<? endif;  ?>