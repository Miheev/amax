<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Результаты поиска");
$APPLICATION->addChainItem($APPLICATION->GetTitle(false), $APPLICATION->GetCurPage());
?><?$APPLICATION->IncludeComponent(
	"bitrix:search.suggest.input",
	"",
	Array(
	)
);?><?$APPLICATION->IncludeComponent("bitrix:search.form", ".default", array(
	"PAGE" => "#SITE_DIR#search.php",
	"USE_SUGGEST" => "Y"
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>