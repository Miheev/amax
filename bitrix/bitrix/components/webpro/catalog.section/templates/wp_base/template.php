<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

global $line_currency;

if (!empty($arResult['ITEMS'])) {
    $templateData = array(
        'TEMPLATE_THEME' => $this->GetFolder() . '/themes/' . $arParams['TEMPLATE_THEME'] . '/style.css',
        'TEMPLATE_CLASS' => 'bx_' . $arParams['TEMPLATE_THEME']
    );

//    echo '<pre>';
//    var_export($arResult);
//    echo '</pre>';
//    exit();
//    'IBLOCK_SECTION_ID' => '1301',
//      '~IBLOCK_SECTION_ID' => '1309',

    $strElementEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT");
    $strElementDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE");
    $arElementDeleteParams = array("CONFIRM" => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));

//    function cmp_section2($a, $b) {
//        if ($a['~IBLOCK_SECTION_ID'] == $b['~IBLOCK_SECTION_ID']) {
//            return 0;
//        }
//        return ($a['~IBLOCK_SECTION_ID'] < $b['~IBLOCK_SECTION_ID']) ? -1 : 1;
//    }
//
//    usort ( $arResult['ITEMS'], 'cmp_section2');

    $prev_section= 0;
    $item_id= 0;
    $item_count= count($arResult['ITEMS']) - 1;
    $sect_count= count($arResult['cats']);

    CModule::IncludeModule("iblock");
    ?>
        <div class="product-list clearfix">
            <?
                if ($sect_count <= 1)
                   echo '<h1>'.$arResult['NAME'].'</h1>';
//                    echo '<div class="head">
//                                <h1>'.$arResult['NAME'].'</h1>
//                                <a href="'.$arResult["SECTION_PAGE_URL"].'?details=1">Показать все</a>
//                            </div>';

                foreach ($arResult['ITEMS'] as $key=>$arItem) :

                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
                    $strMainID = $this->GetEditAreaId($arItem['ID']);

                    $arItemIDs = array(
                        'ID' => $strMainID,
                        'PICT' => $strMainID . '_pict',
                        'SECOND_PICT' => $strMainID . '_secondpict',

                        'QUANTITY' => $strMainID . '_quantity',
                        'QUANTITY_DOWN' => $strMainID . '_quant_down',
                        'QUANTITY_UP' => $strMainID . '_quant_up',
                        'QUANTITY_MEASURE' => $strMainID . '_quant_measure',
                        'BUY_LINK' => $strMainID . '_buy_link',
                        'SUBSCRIBE_LINK' => $strMainID . '_subscribe',

                        'PRICE' => $strMainID . '_price',
                        'DSC_PERC' => $strMainID . '_dsc_perc',
                        'SECOND_DSC_PERC' => $strMainID . '_second_dsc_perc',

                        'PROP_DIV' => $strMainID . '_sku_tree',
                        'PROP' => $strMainID . '_prop_',
                        'DISPLAY_PROP_DIV' => $strMainID . '_sku_prop',
                        'BASKET_PROP_DIV' => $strMainID . '_basket_prop',
                    );

                    $strObName = 'ob' . preg_replace("/[^a-zA-Z0-9_]/", "x", $strMainID);

                    $strTitle = (
                    isset($arItem["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_TITLE"]) && '' != isset($arItem["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_TITLE"])
                        ? $arItem["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_TITLE"]
                        : $arItem['NAME']
                    );

                    //Дёргаем цену и элемента с id - $id
                    $arProduct = GetCatalogProduct($arItem['ID']);
                    $res = GetCatalogProductPrice($PRODUCT_ID, 1);
                    //Конвертируем валюту в рубли, вам может и не понадобится
                    //if(isset($ar_price['CURRENCY']) && $ar_price['CURRENCY']!="RUB") $ar_price['PRICE'] = CCurrencyRates::ConvertCurrency($ar_price['PRICE'], $ar_price["CURRENCY"], "RUB");
                    //В переменной $price теперь содержится цена товара

                    if ($sect_count > 1 && $prev_section != $arItem['sect_id'] && $arIBlockSection = GetIBlockSection($arItem['sect_id'])) {
                        if ($item_id % 4 != 0)
                            echo '</div>';

                        echo '<div class="head">
                                <h2><a href="'.$arIBlockSection["SECTION_PAGE_URL"].'?details=1" title="Показать все товары только этого раздела">'.$arIBlockSection['NAME'].'</a></h2>
                                <a class="link-more" href="'.$arIBlockSection["SECTION_PAGE_URL"].'" title="Показать все товары">Показать все</a>
                            </div>';
                        echo '<div class="list-row clearfix">';
                        $prev_section= $arItem['sect_id'];
                        $item_id= 0;

                    } else if ($item_id % 4 == 0)
                        echo '<div class="list-row clearfix">';
                    ?>

                    <div class="stuff-item" id="<? echo $strMainID; ?>">
                        <div class="inner">
                            <a href="<?=$arItem['DETAIL_PAGE_URL']?>">
                                <div class="img">
                                    <?php
                                    $path = empty($arItem['PREVIEW_PICTURE']) ? SITE_TEMPLATE_PATH.'/img/no_photo.png' : $arItem['PREVIEW_PICTURE']['SRC'];
                                    $img= CFile::ShowImage($path, 113, 122, 'alt=""');
                                    echo $img;
                                    ?>
                                </div>
                                <p class="name"><?=$arItem['NAME'];?></p>
                            </a>
                            <p class="link"><a href="<?=$arItem['DETAIL_PAGE_URL']?>">Подробнее</a></p>
                            <div class="footer clearfix">
                                <div class="left">
                                    <a class="basket-btn" href="<?=$arItem['ADD_URL'];?>">В корзину</a>
                                </div>
                                <div class="right">
                                    <?if ($arItem['MIN_PRICE']['DISCOUNT_DIFF']) :?>
                                        <p class="discount"><? echo number_format($arItem['MIN_PRICE']['VALUE'], 0, '.', ' ');?><span class="cur"> <?=$line_currency?></span></p>
                                        <p class="normal"><? echo number_format($arItem['MIN_PRICE']['DISCOUNT_VALUE'], 0, '.', ' ');?><span class="cur"> <?=$line_currency?></span></p>
                                    <?else :?>
                                        <p class="normal single"><? echo number_format($arItem['MIN_PRICE']['DISCOUNT_VALUE'], 0, '.', ' ');?><span class="cur"> <?=$line_currency?></span></p>
                                    <?endif;?>
                                </div>
                            </div>

                        </div></div>
                    <?
                    if ($item_id % 4 == 3 || $key == $item_count) {
                        echo '</div>';
                    }

                    $item_id= $item_id == 3 ? 0 : $item_id+1;
                endforeach; //endfor

            ?>
        </div>

    <script type="text/javascript">
        BX.message({
            MESS_BTN_BUY:                '<? echo ('' != $arParams['MESS_BTN_BUY'] ? CUtil::JSEscape($arParams['MESS_BTN_BUY']) : GetMessageJS('CT_BCS_TPL_MESS_BTN_BUY')); ?>',
            MESS_BTN_ADD_TO_BASKET:      '<? echo ('' != $arParams['MESS_BTN_ADD_TO_BASKET'] ? CUtil::JSEscape($arParams['MESS_BTN_ADD_TO_BASKET']) : GetMessageJS('CT_BCS_TPL_MESS_BTN_ADD_TO_BASKET')); ?>',
            MESS_NOT_AVAILABLE:          '<? echo ('' != $arParams['MESS_NOT_AVAILABLE'] ? CUtil::JSEscape($arParams['MESS_NOT_AVAILABLE']) : GetMessageJS('CT_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE')); ?>',
            BTN_MESSAGE_BASKET_REDIRECT: '<? echo GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_BASKET_REDIRECT'); ?>',
            BASKET_URL:                  '<? echo $arParams["BASKET_URL"]; ?>',
            ADD_TO_BASKET_OK:            '<? echo GetMessageJS('ADD_TO_BASKET_OK'); ?>',
            TITLE_ERROR:                 '<? echo GetMessageJS('CT_BCS_CATALOG_TITLE_ERROR') ?>',
            TITLE_BASKET_PROPS:          '<? echo GetMessageJS('CT_BCS_CATALOG_TITLE_BASKET_PROPS') ?>',
            TITLE_SUCCESSFUL:            '<? echo GetMessageJS('ADD_TO_BASKET_OK'); ?>',
            BASKET_UNKNOWN_ERROR:        '<? echo GetMessageJS('CT_BCS_CATALOG_BASKET_UNKNOWN_ERROR') ?>',
            BTN_MESSAGE_SEND_PROPS:      '<? echo GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_SEND_PROPS'); ?>',
            BTN_MESSAGE_CLOSE:           '<? echo GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE') ?>'
        });
    </script>
    <?
    if ($arParams["DISPLAY_BOTTOM_PAGER"]) {
        ?><? echo $arResult["NAV_STRING"]; ?><?
    }
}
?>
<?if (!empty($arResult['DESCRIPTION'])) :?>
<div class="section-description">
    <?
    echo $arResult['DESCRIPTION'];
    ?>
</div>
<?endif;?>