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

    CJSCore::Init(array("popup"));
    $arSkuTemplate = array();
    if (!empty($arResult['SKU_PROPS'])) {
        foreach ($arResult['SKU_PROPS'] as &$arProp) {
            ob_start();
            if ('TEXT' == $arProp['SHOW_MODE']) {
                if (5 < $arProp['VALUES_COUNT']) {
                    $strClass = 'bx_item_detail_size full';
                    $strWidth = ($arProp['VALUES_COUNT'] * 20) . '%';
                    $strOneWidth = (100 / $arProp['VALUES_COUNT']) . '%';
                    $strSlideStyle = '';
                } else {
                    $strClass = 'bx_item_detail_size';
                    $strWidth = '100%';
                    $strOneWidth = '20%';
                    $strSlideStyle = 'display: none;';
                }
                ?>
                <div class="<? echo $strClass; ?>" id="#ITEM#_prop_<? echo $arProp['ID']; ?>_cont">
                <span class="bx_item_section_name_gray"><? echo htmlspecialcharsex($arProp['NAME']); ?></span>

                <div class="bx_size_scroller_container">
                    <div class="bx_size">
                        <ul id="#ITEM#_prop_<? echo $arProp['ID']; ?>_list" style="width: <? echo $strWidth; ?>;"><?
                            foreach ($arProp['VALUES'] as $arOneValue) {
                                ?>
                                <li
                                data-treevalue="<? echo $arProp['ID'] . '_' . $arOneValue['ID']; ?>"
                                data-onevalue="<? echo $arOneValue['ID']; ?>"
                                style="width: <? echo $strOneWidth; ?>;"
                                ><i></i><span class="cnt"><? echo htmlspecialcharsex($arOneValue['NAME']); ?></span>
                                </li><?
                            }
                            ?></ul>
                    </div>
                    <div class="bx_slide_left" id="#ITEM#_prop_<? echo $arProp['ID']; ?>_left"
                         data-treevalue="<? echo $arProp['ID']; ?>" style="<? echo $strSlideStyle; ?>"></div>
                    <div class="bx_slide_right" id="#ITEM#_prop_<? echo $arProp['ID']; ?>_right"
                         data-treevalue="<? echo $arProp['ID']; ?>" style="<? echo $strSlideStyle; ?>"></div>
                </div>
                </div><?
            } elseif ('PICT' == $arProp['SHOW_MODE']) {
                if (5 < $arProp['VALUES_COUNT']) {
                    $strClass = 'bx_item_detail_scu full';
                    $strWidth = ($arProp['VALUES_COUNT'] * 20) . '%';
                    $strOneWidth = (100 / $arProp['VALUES_COUNT']) . '%';
                    $strSlideStyle = '';
                } else {
                    $strClass = 'bx_item_detail_scu';
                    $strWidth = '100%';
                    $strOneWidth = '20%';
                    $strSlideStyle = 'display: none;';
                }
                ?>
                <div class="<? echo $strClass; ?>" id="#ITEM#_prop_<? echo $arProp['ID']; ?>_cont">
                <span class="bx_item_section_name_gray"><? echo htmlspecialcharsex($arProp['NAME']); ?></span>

                <div class="bx_scu_scroller_container">
                    <div class="bx_scu">
                        <ul id="#ITEM#_prop_<? echo $arProp['ID']; ?>_list" style="width: <? echo $strWidth; ?>;"><?
                            foreach ($arProp['VALUES'] as $arOneValue) {
                                ?>
                                <li
                                data-treevalue="<? echo $arProp['ID'] . '_' . $arOneValue['ID'] ?>"
                                data-onevalue="<? echo $arOneValue['ID']; ?>"
                                style="width: <? echo $strOneWidth; ?>; padding-top: <? echo $strOneWidth; ?>;"
                                ><i title="<? echo htmlspecialcharsbx($arOneValue['NAME']); ?>"></i>
						<span class="cnt"><span class="cnt_item"
                                                style="background-image:url('<? echo $arOneValue['PICT']['SRC']; ?>');"
                                                title="<? echo htmlspecialcharsbx($arOneValue['NAME']); ?>"
                                ></span></span></li><?
                            }
                            ?></ul>
                    </div>
                    <div class="bx_slide_left" id="#ITEM#_prop_<? echo $arProp['ID']; ?>_left"
                         data-treevalue="<? echo $arProp['ID']; ?>" style="<? echo $strSlideStyle; ?>"></div>
                    <div class="bx_slide_right" id="#ITEM#_prop_<? echo $arProp['ID']; ?>_right"
                         data-treevalue="<? echo $arProp['ID']; ?>" style="<? echo $strSlideStyle; ?>"></div>
                </div>
                </div><?
            }
            $arSkuTemplate[$arProp['CODE']] = ob_get_contents();
            ob_end_clean();
        }
        unset($arProp);
    }

    if ($arParams["DISPLAY_TOP_PAGER"]) {
        ?><? echo $arResult["NAV_STRING"]; ?><?
    }

    $strElementEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT");
    $strElementDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE");
    $arElementDeleteParams = array("CONFIRM" => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));
?>
    <div class="slider-container">
<div class="slider wrapper clearfix">
<div class="head">
    <h2>Специальное предложение</h2>
    <a href="/catalog/skidki">Смотреть все</a>
</div>
<div class="slider-viewport">
<div class="bxslider content clearfix">
    <?foreach ($arResult['ITEMS'] as $key => $arItem) {
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
                    <p class="discount"><? echo number_format($arItem['MIN_PRICE']['VALUE'], 0, '.', ' ');?><span class="cur"> <?=$line_currency?></span></p>
                    <p class="normal"><? echo number_format($arItem['MIN_PRICE']['DISCOUNT_VALUE'], 0, '.', ' ');?><span class="cur"> <?=$line_currency?></span></p>
                </div>
            </div>

     </div></div>
  <?}?>
</div>
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
</div>
</div>
    <?
    if ($arParams["DISPLAY_BOTTOM_PAGER"]) {
        ?><? echo $arResult["NAV_STRING"]; ?><?
    }
}
?>