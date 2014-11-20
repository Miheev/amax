<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<?
//    var_dump($arResult);
?>
<div class="credit-find">
    <form class="filter" method="post" action="<?=$APPLICATION->GetCurPage();?>" name="bank-filter" id="fbank-form">
<!--        <p>--><?//=$arParams['FILTER_HEAD']?><!--</p>-->
<!--        --><?//$frame = $this->createFrame()->begin('<img src="'.SITE_TEMPLATE_PATH.'/img/wait27.gif" alt="" />');?>
        <?foreach ($arResult['props'] as $fid=>$field) :?>
            <?if ($field['PROPERTY_TYPE'] == 'S' || $field['PROPERTY_TYPE'] == 'N') : ;?>
                <div class="mblock">
                    <p><?=$field['NAME']?></p>
                    <input class="<?=strtolower($field['CODE'])?>" type="text" name="fbank[<?=$field['CODE']?>]" value="<?echo $_POST['fbank'][$field['CODE']] ? $_POST['fbank'][$field['CODE']] : '';?>" />
                </div>
            <?elseif ($field['PROPERTY_TYPE'] == 'fromto') : ;?>
                <div class="mblock">
                    <input class="<?=strtolower($field['CODE'])?>" type="text" placeholder="<?=$field['NAME']?> от" name="fbank[<?=$field['CODE']?>][]" value="<?echo $_POST['fbank'][$field['CODE']] ? $_POST['fbank'][$field['CODE']][0] : '';?>" />
                    <input class="<?=strtolower($field['CODE'])?>" type="text" placeholder="<?=$field['NAME']?> до" name="fbank[<?=$field['CODE']?>][]" value="<?echo $_POST['fbank'][$field['CODE']] ? $_POST['fbank'][$field['CODE']][1] : '';?>" />
                </div>
            <?elseif ($field['PROPERTY_TYPE'] == 'L' || $field['PROPERTY_TYPE'] == 'UF_L' || $field['PROPERTY_TYPE'] == 'ck_L' || $field['PROPERTY_TYPE'] == 'E_L') : ;?>
                <div class="mblock">
                    <?
                    $name= explode(': ', $field['NAME'], 2);
                    if (count($name) == 1)
                        $name[1]= $name[0];
                    ?>
                    <p><?=$name[1]?></p>
                    <div class="select <?=strtolower($field['CODE'])?>">
                        <div class="abbr clearfix"><span class="label">Любой</span><span class="pointer"></span></div>
                        <div class="list">
                            <?foreach ($field['list'] as $list) : ?>
                                <a href="javascript:void(0);" data-id="<?=$list['ID']?>"><?=$list['VALUE']?></a>
                            <?endforeach;?>
                        </div>
                        <input type="hidden" name="fbank[<?=$field['CODE']?>]" value="<?echo $_POST['fbank'][$field['CODE']] ? $_POST['fbank'][$field['CODE']] : ''?>" />
                    </div>
                </div>
            <?endif;?>
        <?endforeach;?>
<!--        --><?//$frame->end();?>
        <div class="buttons">
            <input class="abutton gradient" type="submit" value="Найти" />
            <input class="abutton gradient" type="reset" value="Сбросить" />
        </div>
    </form>
</div>