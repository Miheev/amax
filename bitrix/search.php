<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Результаты поиска");
$APPLICATION->addChainItem($APPLICATION->GetTitle(false), $APPLICATION->GetCurPage());
?>

<?
if (empty($_REQUEST['ssp']))
    $_REQUEST['ssp']= 'none';
switch($_REQUEST['ssp']) {
    case 'oem':
        $APPLICATION->IncludeComponent("webpro:oem_filter", "", array(),
            false
        );
        break;
    default:
        $APPLICATION->IncludeComponent("bitrix:search.page", ".default", array(
	"RESTART" => "Y",
	"NO_WORD_LOGIC" => "N",
	"CHECK_DATES" => "N",
	"USE_TITLE_RANK" => "Y",
	"DEFAULT_SORT" => "rank",
	"FILTER_NAME" => "",
	"arrFILTER" => array(
		0 => "iblock_catalogs",
	),
	"arrFILTER_iblock_catalogs" => array(
		0 => "all",
	),
	"SHOW_WHERE" => "N",
	"SHOW_WHEN" => "N",
	"PAGE_RESULT_COUNT" => "10",
	"AJAX_MODE" => "Y",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Результаты поиска",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "base",
	"USE_LANGUAGE_GUESS" => "Y",
	"USE_SUGGEST" => "N",
	"SHOW_RATING" => "",
	"RATING_TYPE" => "",
	"PATH_TO_USER_PROFILE" => "",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);
}

?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>