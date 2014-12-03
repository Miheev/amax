<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html>
<html>
<head>
    <?
    $page_path= trim($APPLICATION->GetCurPage(), '/');
    $page_class=$page_path;
    if (empty($page_class)) {
        $page_class= 'index';
    } else {
        $arParams = array("replace_space"=>"-","replace_other"=>"-");
        $page_class = Cutil::translit($page_class,"ru",$arParams);
        preg_match('/.*(?=\?)/', $page_class, $tmp);
        $page_class = empty($tmp[0]) ? strtolower($page_class) : strtolower($tmp[0]);
        $page_class = str_replace(array("\\", '&', '?', '/'), '-', $page_class);

        if (intval($page_class)) $page_class= 'page-'.$page_class;
    }
    if ($page_class == 'auth')
        $page_class= 'wtf';


    if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
        header('X-UA-Compatible: IE=edge,chrome=1');?>
    <link rel="shortcut icon" type="image/x-icon" href="<?=SITE_TEMPLATE_PATH?>/amax.ico" />
    <?
    echo '<meta http-equiv="Content-Type" content="text/html; charset='.LANG_CHARSET.'"'.(true ? ' /':'').'>'."\n";
    $APPLICATION->ShowMeta("robots", false, true);
    $APPLICATION->ShowMeta("keywords", false, true);
    $APPLICATION->ShowMeta("description", false, true);
    $APPLICATION->ShowCSS(true, true);
    CUtil::InitJSCore();

    $APPLICATION->ShowHeadStrings();
    $APPLICATION->ShowHeadScripts();

    //    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/main.js");
    ?>

    <title><?$APPLICATION->ShowTitle()?></title>
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/normalize.min.css">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/style.css">

    <link rel='stylesheet' href="<?=SITE_TEMPLATE_PATH?>/add/superfish/dist/css/superfish.css" type='text/css' media='all' />
    <link rel='stylesheet' href="<?=SITE_TEMPLATE_PATH?>/add/superfish/dist/css/superfish-vertical.css" type='text/css' media='all' />
    <link href="<?=SITE_TEMPLATE_PATH?>/add/bxslider/merge_jquery.bxslider.css" rel="stylesheet">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?=SITE_TEMPLATE_PATH?>/js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
    <?CUtil::InitJSCore( array('ajax' , 'popup' ));?>

    <script src="<?=SITE_TEMPLATE_PATH?>/add/superfish/dist/js/hoverIntent.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/add/superfish/dist/js/superfish.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/add/bxslider/jquery.bxslider.min.js"></script>

    <script>
        var tplpath= "<?=SITE_TEMPLATE_PATH?>";
        var page_class= "<?=$page_class;?>";
    </script>

    <script src="<?=SITE_TEMPLATE_PATH?>/js/main.js"></script>

    <!--[if gte IE 9]>
    <style type="text/css">
        .gradient {
            filter: none;
        }
    </style>
    <![endif]-->

    <!--[if lt IE 9]>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/vendor/html5-3.6-respond-1.1.0.min.js"></script>
    <![endif]-->
</head>

<body class="<?=$page_class;?>">
<div id="panel"><?$APPLICATION->ShowPanel();?></div>

    <div class="fheader-container">
        <div class="flip-header wrapper clearfix">
            <div class="inner">
                <div class="city">
                    <p>г. <span>Хабаровск</span></p>
                </div>
                <nav class="mainmenu">
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "main_multilevel", array(
                            "ROOT_MENU_TYPE" => "top",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MAX_LEVEL" => "1",
                            "CHILD_MENU_TYPE" => "",
                            "USE_EXT" => "N",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "N"
                        ),
                        false
                    );?>
                </nav>
                <div class="auth-btn">
                    <a href="/auth.php" class="abutton">Вход</a>
                    <a href="/auth.php?register=yes&ssp=none" class="abutton">Регистрация</a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-container">
        <header class="header wrapper clearfix">
            <table class="base">
                <tbody>
                <tr>
                    <td class="brand">
                        <div class="block">
                            <a href="/">
                                <img src="<?=SITE_TEMPLATE_PATH?>/img/logo.png" />
                            </a>
                        </div>
                    </td>
                    <td class="tel">
                        <div class="block">
                            <span>+7 (4212) 555-555</span>
                            <p>Позвони нам или закажи звонок</p>
                        </div>
                    </td>
                    <td class="tel-order">
                        <div class="block">
                            <a class="abutton" href="#">Заказать обратный звонок</a>
                        </div>
                    </td>
                    <td class="basket">
                        <?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "base", array(
	"PATH_TO_BASKET" => "/personal/cart/",
	"PATH_TO_PERSONAL" => "/personal/",
	"SHOW_PERSONAL_LINK" => "N",
	"SHOW_NUM_PRODUCTS" => "Y",
	"SHOW_TOTAL_PRICE" => "Y",
	"SHOW_PRODUCTS" => "N",
	"POSITION_FIXED" => "N"
	),
	false
);?>
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="media-tel">
                <tbody>
                <tr>
                    <td class="tel">
                        <div class="block">
                            <span>+7 (4212) 555-555</span>
                        </div>
                    </td>
                    <td class="tel-order">
                        <div class="block">
                            <a class="abutton" href="#">Заказать обратный звонок</a>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </header>
    </div>

<?
global $line_currency;
$line_currency= 'руб';
$sidebar= false;
//if (!preg_match('/(^catalog\/popular)|(^catalog\/skidki)/',$page_path) && preg_match('/catalog\/.+/',$page_path) && !preg_match('/catalog\/.+\/.+/',$page_path))
//    $sidebar= 'left';
if ($page_class == 'personal')
    $sidebar= 'left';

?>
<?php include 'include/top_block.php'; ?>
<? if ($page_class != 'index') : ?>
    <div class="main-container">
    <div class="main wrapper clearfix">
    <?if ($sidebar) :?>
        <aside class="<?=$sidebar;?>">
            <div class="inner clearfix">
                <?php include 'include/sidebar_'.$sidebar.'.php'; ?>
            </div>
        </aside>
        <div class="center">
    <?endif;?>
<? endif;  ?>