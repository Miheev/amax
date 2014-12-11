<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
$APPLICATION->addChainItem($APPLICATION->GetTitle(false), $APPLICATION->GetCurPage());
?>
    <h1>Наши контакты</h1>
    <div class="clearfix">
        <div class="contact">
            <p>Россия, г. Хабаровск, ул.Промышленная, 23 м-н «АвтоМаксимум»</p>
            <p class="tel">+7 (4212) 750-900</p>
            <p class="mail"><a href="mailto:arsenalauto@yandex.ru">arsenalauto@yandex.ru</a></p>
            <div id="map">
                <script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
                <script type="text/javascript">
                    ymaps.ready(init);
                    var myMap,
                        myPlacemark;

                    function init(){
                        myMap = new ymaps.Map("map", {
                            center: [48.49639380, 135.10334850],
                            zoom: 16
                        });

                        myPlacemark = new ymaps.Placemark([48.49642603, 135.10331038], {
                            hintContent: 'ООО «Амур-АрсеналАвто»',
                            balloonContent: 'ул.Промышленная, 23 м-н «АвтоМаксимум»'
                        });

                        myMap.geoObjects.add(myPlacemark);
                    }
                    $(window).resize(function(){
                        //map_size();
                        myMap.container.fitToViewport();
                    });
                </script>
            </div>
        </div>
        <div class="form">
            <?$APPLICATION->IncludeComponent(
                "bitrix:form.result.new",
                "contact_form",
                Array(
                    "WEB_FORM_ID" => "2",
                    "IGNORE_CUSTOM_TEMPLATE" => "N",
                    "USE_EXTENDED_ERRORS" => "N",
                    "SEF_MODE" => "N",
                    "VARIABLE_ALIASES" => Array("WEB_FORM_ID"=>"WEB_FORM_ID","RESULT_ID"=>"RESULT_ID"),
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "3600",
                    "LIST_URL" => "list.php",
                    "EDIT_URL" => "result_edit.php",
                    "SUCCESS_URL" => "",
                    "CHAIN_ITEM_TEXT" => "",
                    "CHAIN_ITEM_LINK" => "",
                    "AJAX_MODE" => "Y",  // режим AJAX
                    "AJAX_OPTION_SHADOW" => "N", // затемнять область
                    "AJAX_OPTION_JUMP" => "N", // скроллить страницу до компонента
                    "AJAX_OPTION_STYLE" => "N", // подключать стили
                    "AJAX_OPTION_HISTORY" => "N"
                )
            );?>
        </div>
    </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>