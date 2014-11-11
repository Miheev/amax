<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="news-list clearfix">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>

    <?
$count= count($arResult["ITEMS"]);
$col= intval($count / 2);
foreach($arResult["ITEMS"] as $id=>$arItem):?>
	<?
    if ($id == 0)
        echo '<div class="cols col-0">';
    else if ($id == $col)
        echo '</div><div class="cols col-1">';

	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="item clearfix" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                    <h2><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></h2>
                <?else:?>
                    <h2><?echo $arItem["NAME"]?></h2>
                <?endif;?>
            <?endif;?>
            <?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
                <p class="date">
                    <?
                    $ts= MakeTimeStamp($arItem["DISPLAY_ACTIVE_FROM"]);
                    ?>
                    <?echo FormatDate('d F Y',$ts);?>
                </p>
            <?endif?>
            <div class="text">
                <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                    <?echo $arItem["PREVIEW_TEXT"];?>
                <?endif;?>
<!--		--><?//foreach($arItem["FIELDS"] as $code=>$value):?>
<!--			<small>-->
<!--			--><?//=GetMessage("IBLOCK_FIELD_".$code)?><!--:&nbsp;--><?//=$value;?>
<!--			</small>-->
<!--		--><?//endforeach;?>
		<?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
			<small>
			<?=$arProperty["NAME"]?>:&nbsp;
			<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
				<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
			<?else:?>
				<?=$arProperty["DISPLAY_VALUE"];?>
			<?endif?>
			</small>
		<?endforeach;?>
        </div>
	</div>
<?endforeach;?>
        </div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
