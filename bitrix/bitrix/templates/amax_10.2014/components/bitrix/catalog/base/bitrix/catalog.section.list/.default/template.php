<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$arViewModeList = $arResult['VIEW_MODE_LIST'];

$arViewStyles = array(
	'LIST' => array(
		'CONT' => 'bx_sitemap',
		'TITLE' => 'bx_sitemap_title',
		'LIST' => 'bx_sitemap_ul',
	),
	'LINE' => array(
		'CONT' => 'bx_catalog_line',
		'TITLE' => 'bx_catalog_line_category_title',
		'LIST' => 'bx_catalog_line_ul',
		'EMPTY_IMG' => $this->GetFolder().'/images/line-empty.png'
	),
	'TEXT' => array(
		'CONT' => 'bx_catalog_text',
		'TITLE' => 'bx_catalog_text_category_title',
		'LIST' => 'bx_catalog_text_ul'
	),
	'TILE' => array(
		'CONT' => 'bx_catalog_tile',
		'TITLE' => 'bx_catalog_tile_category_title',
		'LIST' => 'bx_catalog_tile_ul',
		'EMPTY_IMG' => $this->GetFolder().'/images/tile-empty.png'
	)
);
$arCurView = $arViewStyles[$arParams['VIEW_MODE']];

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

?>
<h1>Каталог продукции</h1>
<div class="<? echo $arCurView['CONT']; ?> <? echo $arCurView['LIST']; ?> cat-map clearfix"><?
if ('Y' == $arParams['SHOW_PARENT_NAME'] && 0 < $arResult['SECTION']['ID'])
{
	$this->AddEditAction($arResult['SECTION']['ID'], $arResult['SECTION']['EDIT_LINK'], $strSectionEdit);
	$this->AddDeleteAction($arResult['SECTION']['ID'], $arResult['SECTION']['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

	?><h1
		class="<? echo $arCurView['TITLE']; ?>"
		id="<? echo $this->GetEditAreaId($arResult['SECTION']['ID']); ?>"
	><a href="<? echo $arResult['SECTION']['SECTION_PAGE_URL']; ?>"><?
		echo (
			isset($arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]) && $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"] != ""
			? $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]
			: $arResult['SECTION']['NAME']
		);
	?></a></h1><?
}
if (0 < $arResult["SECTIONS_COUNT"])
{
?>

    <div class="col">
        <div class="row">
    <?
	switch ($arParams['VIEW_MODE'])
	{
		case 'LIST':
			$intCurrentDepth = 1;
			$boolFirst = true;

//            $root_count= 0;
//            foreach ($arResult['SECTIONS'] as &$arSection) {
//                if ($arSection['RELATIVE_DEPTH_LEVEL'] < 2)
//                    $root_count++;
//            }

//var_dump($arResult['SECTIONS']); exit();

            $root_count= 0;
            foreach ($arResult['SECTIONS'] as &$arSection) {
                if ($arSection['RELATIVE_DEPTH_LEVEL'] == 1)
                    $root_count++;
            }
            $col_count= intval($root_count/3);
            $col_delta= $root_count % 3;
            $cols= array($col_count,$col_count+$col_count);
            switch ($col_delta) {
                case 1: $cols[0]++;
                        $cols[1]++;
                    break;
                case 2: $cols[0]++;
                    $cols[1]++;
                    $cols[1]++;
                    break;
            }


			$root_clock= 1;
            foreach ($arResult['SECTIONS'] as &$arSection) {
                $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

                if ($intCurrentDepth < $arSection['RELATIVE_DEPTH_LEVEL']) {
                    if ($intCurrentDepth)
                        echo '<ul class="uline">';
                } elseif ($intCurrentDepth == $arSection['RELATIVE_DEPTH_LEVEL']) {

                    if (!$boolFirst && $arSection['RELATIVE_DEPTH_LEVEL'] == 1) {
                        echo '</div>';
                        if (array_search($root_clock, $cols) !== false)
                            echo '</div><div class="col">';
                        echo '<div class="row">';
                        $root_clock++;
                    } else if (!$boolFirst)
                        echo '</li>';
                } else {
                    while ($intCurrentDepth > $arSection['RELATIVE_DEPTH_LEVEL']) {
                        echo '</li>', '</ul>';
                        $intCurrentDepth--;
                    }
                    if ($arSection['RELATIVE_DEPTH_LEVEL'] == 1) {
                        echo '</div>';
                        if (array_search($root_clock, $cols) !== false)
                            echo '</div><div class="col">';
                        echo '<div class="row">';
                        $root_clock++;
                    } else
                        echo '</li>';
                }
                ?>
                <? if ($arSection['RELATIVE_DEPTH_LEVEL'] == 1) : ?>
                    <div class="img">
                    <?if (!empty($arSection['PICTURE'])) :
                        $img= CFile::ResizeImageGet($arSection['PICTURE'], array('width'=>90, 'height'=>90), BX_RESIZE_IMAGE_EXACT);
                        echo CFile::ShowImage($img['src'], 90, 90, '', $arSection["SECTION_PAGE_URL"]);
                    else :
                        echo CFile::ShowImage(SITE_TEMPLATE_PATH.'/img/no_photo.png', 90, 90, '', $arSection["SECTION_PAGE_URL"]);
                    endif;?>
                    </div>
                    <h3><a class="bx_sitemap_li_title" href="<? echo $arSection["SECTION_PAGE_URL"]; ?>"><? echo $arSection["NAME"];?><?
                            if ($arParams["COUNT_ELEMENTS"])
                            {
                                ?> <span>(<? echo $arSection["ELEMENT_CNT"]; ?>)</span><?
                            }
                            ?></a>
                    </h3>
                <?else :?>
                    <li id="<?=$this->GetEditAreaId($arSection['ID']);?>"><a class="bx_sitemap_li_title" href="<? echo $arSection["SECTION_PAGE_URL"]; ?>"><? echo $arSection["NAME"];?><?
                    if ($arParams["COUNT_ELEMENTS"])
                    {
                        ?> <span>(<? echo $arSection["ELEMENT_CNT"]; ?>)</span><?
                    }
                    ?></a>
                <?endif;?>
                <?
				$intCurrentDepth = $arSection['RELATIVE_DEPTH_LEVEL'];
				$boolFirst = false;
			}
			unset($arSection);
			while ($intCurrentDepth > 1)
			{
				echo '</li>','</ul>';
				$intCurrentDepth--;
			}
			if ($intCurrentDepth > 0)
			{
				echo '</div></div>';
			}

			break;
	}

}
?></div>