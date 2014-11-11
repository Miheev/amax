<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$this->setFrameMode(true);

$INPUT_ID = trim($arParams["~INPUT_ID"]);
if(strlen($INPUT_ID) <= 0)
	$INPUT_ID = "title-search-input";
$INPUT_ID = CUtil::JSEscape($INPUT_ID);

$CONTAINER_ID = trim($arParams["~CONTAINER_ID"]);
if(strlen($CONTAINER_ID) <= 0)
	$CONTAINER_ID = "title-search";
$CONTAINER_ID = CUtil::JSEscape($CONTAINER_ID);

if($arParams["SHOW_INPUT"] !== "N"):?>
    <?
    $selected= 'по названию';
//    if (!empty($_GET['ssp']))
//        switch($_GET['ssp']) {
//            case 'name' : $selected= 'по названию';
//                break;
//            case 'oem' : $selected= 'по OEM';
//                break;
//        }
        ?>
    <div class="inner clearfix">
        <form action="<?echo $arResult["FORM_ACTION"]?>" class="clearfix">
            <input id="<?echo $INPUT_ID?>" type="text" name="q" value="<?=htmlspecialcharsbx($_REQUEST["q"])?>" maxlength="50" autocomplete="off" placeholder="Поиск деталей" />
            <input type="submit" value="Найти" />
            <div class="select">
                <div class="abbr clearfix"><span class="label"><?=$selected;?></span><span class="pointer"></span></div>
                <div class="list">
                    <a href="javascript:void(0);" onclick="location.assign(location.pathname+'?ssp=name');">по названию</a>
                    <a href="javascript:void(0);" onclick="location.assign(location.pathname+'?ssp=oem');">по OEM</a>
                </div>
            </div>
        </form>
    </div>
<?endif?>
<script type="text/javascript">
var jsControl_<?echo md5($CONTAINER_ID)?> = new JCTitleSearch({
	//'WAIT_IMAGE': '/bitrix/themes/.default/images/wait.gif',
	'AJAX_PAGE' : '<?echo CUtil::JSEscape(POST_FORM_ACTION_URI)?>',
	'CONTAINER_ID': '<?echo $CONTAINER_ID?>',
	'INPUT_ID': '<?echo $INPUT_ID?>',
	'MIN_QUERY_LEN': 2
});
</script>
