<? if ($page_class != 'index') : ?>
    <?if ($sidebar) :?>
    </div>
    <?endif;?>
    </div></div>
<? endif;  ?>
<?include 'include/bottom_block.php'?>
</div> <!--Site Content -->

</div>
</div> <!--page-hfix-->

<div id="footer"><div class="inner">

<div class="footer-container">
    <footer class="wrapper footer">
        <div class="row clearfix">
            <div class="block map">
                <div class="media-map media-right">
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "footer_menu", array(
                            "ROOT_MENU_TYPE" => "bottom",
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
                </div>
            </div>
            <div class="block contact">
                <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "AREA_FILE_RECURSIVE" => "Y",
                        "EDIT_TEMPLATE" => "standard.php",
                        "PATH" => SITE_TEMPLATE_PATH."/include/footer_text.php"
                    )
                );?>
            </div>
            <div class="block call">
                <div class="inner">
                    <span>+7 (4212) 750-900</span>
                    <p>Позвони нам или закажи звонок</p>
                    <a class="abutton" href="#">Заказать обратный звонок</a>
                </div>
            </div>
            <div class="block pay clearfix">
                <div class="media-pay">
                    <div class="media-right">
                        <h4>Мы принимаем</h4>
                        <div class="img">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_pay_mc.png" />
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_pay_visa.png" />
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_pay_ym.png" />
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_pay_kiwi.png" />
                        </div>
                    </div>
                </div>
                <div class="webpro_c">
                    <a href="http://webpro.su" target="_blank">
                        <img src="http://webpro.su/form/create/img/v1.png" class="img1_co" alt="Сайт разработчика" title="Сайт разработчика"  />
                        <img src="http://webpro.su/form/create/img/v1h.png" class="img2_co" alt="Сайт разработчика" title="Сайт разработчика"  />
                        <div class="webpro-href">Сайт разработан: WEBPRO</div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row copy clearfix">
            <p>&copy; 2014 ООО &laquo;Амур-АрсеналАвто&raquo; <a href="/company/politics.php">Политика конфиденциальности</a></p>
        </div>
    </footer>
</div>

</div></div>
<script type="text/javascript">
    <!--
    var addAnswer= 0;
    var uReg= 0;

    BX.ready(function(){
        addAnswer = new BX.PopupWindow("call_order", null, {
            content: BX('ajax-call-order'),
            closeIcon: {},
            autoHide : true,
            zIndex: 0,
            offsetLeft: 0,
            offsetTop: 0,
            lightShadow : true,
//            overlay: {
//                backgroundColor: 'black', opacity: '70'
//            },
            draggable: {restrict: false}
//            buttons: [
//                new BX.PopupWindowButton({
//                    text: "Отправить",
//                    className: "popup-window-button-accept",
//                    events: {click: function(){
//                        BX.ajax.submit(BX("myForm"), function(data){ // отправка данных из формы с id="myForm" в файл из action="..."
//                            BX( 'ajax-add-answer').innerHTML = data;
//                        });
//                    }}
//                }),
//                new BX.PopupWindowButton({
//                    text: "Закрыть",
//                    className: "webform-button-link-cancel",
//                    events: {click: function(){
//                        this.popupWindow.close(); // закрытие окна
//                    }}
//                })
//            ]
        });
//        $('#click_test').click(function(){
//            BX.ajax.insertToNode('/uslugi.php', BX('ajax-add-answer')); // функция ajax-загрузки контента из урла в #div
//            addAnswer.show(); // появление окна
//        });

        $('.tel-order a, .tel-media-order a, .call a').click(function(e){
            e.preventDefault();

            addAnswer.show(); // появление окна
        });
        if ($('body').hasClass('personal-cart')) {
            obj= $('#call_order');
            if (obj.css('display') == 'none' && obj.find('.error-msg').length)
                addAnswer.show(); // появление окна
            if (obj.css('display') == 'none' && !obj.find('form').length) {
                addAnswer.show(); // появление окна

                setTimeout(function tmr_callorder(){
                    if ($('#call_order').css('display') != 'none')
                        setTimeout(tmr_callorder, 300);
                    else {
                        location.assign(location.pathname);
                    }
                }, 300);
            }
        }

        uReg = new BX.PopupWindow("user_register", null, {
            content: BX('user-register'),
            closeIcon: {},
            autoHide : true,
            zIndex: 0,
            offsetLeft: 0,
            offsetTop: 0,
            lightShadow : true,
//            overlay: {
//                backgroundColor: 'black', opacity: '70'
//            },
            draggable: {restrict: false}
//            buttons: [
//                new BX.PopupWindowButton({
//                    text: "Отправить",
//                    className: "popup-window-button-accept",
//                    events: {click: function(){
//                        BX.ajax.submit(BX("myForm"), function(data){ // отправка данных из формы с id="myForm" в файл из action="..."
//                            BX( 'ajax-add-answer').innerHTML = data;
//                        });
//                    }}
//                }),
//                new BX.PopupWindowButton({
//                    text: "Закрыть",
//                    className: "webform-button-link-cancel",
//                    events: {click: function(){
//                        this.popupWindow.close(); // закрытие окна
//                    }}
//                })
//            ]
        });

        authlock= false;
        $('.auth-btn a').not('.personal').click(function(e){
            e.preventDefault();
            id= $('.auth-btn a').index($(this));

            if (!authlock) {
                authlock= true;
                $('#user-register .tab-h span.active').removeClass('active');
                $('#user-register .tab').css('display', 'none');

                $('#user-register .tab-h span').eq(id).addClass('active');
                $('#user-register .tab').eq(id).css('display', 'block');

                uReg.show(); // появление окна
                authlock= false;
            } else
                $('#user-register .tab-h span').eq(id).trigger('click');
        });
        $('#user-register .tab-h span').click(function(){
            if (!authlock) {
                authlock= true;

                id= $('#user-register .tab-h span').index($(this));
                pid= $('#user-register .tab-h span').index($('#user-register .tab-h span.active'));

                if (id != pid) {
                    $('#user-register .tab').eq(pid).fadeOut('slow', function(){
                        $('#user-register .tab').eq(id).fadeIn('slow', function(){
                            $('#user-register .tab-h span.active').removeClass('active');
                            $('#user-register .tab-h span').eq(id).addClass('active');

                            authlock= false;
                        });
                    });
                } else
                    authlock= false;
            }
        });

    });
    //-->
</script>

<div class="popup-cat-out"></div>
<div id='ajax-call-order' style="display: none;">
    <?
    $sets= Array(
        "WEB_FORM_ID" => "3",
        "IGNORE_CUSTOM_TEMPLATE" => "N",
        "USE_EXTENDED_ERRORS" => "N",
        "SEF_MODE" => "N",
        "VARIABLE_ALIASES" => Array("WEB_FORM_ID"=>"WEB_FORM_ID","RESULT_ID"=>"RESULT_ID"),
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "LIST_URL" => "",
        "EDIT_URL" => "result_edit.php",
        "SUCCESS_URL" => "",
        "CHAIN_ITEM_TEXT" => "",
        "CHAIN_ITEM_LINK" => "",
    );
    if ($page_class != 'personal-cart') {
        $ajax_sets= array(
            "AJAX_MODE" => "Y",  // режим AJAX
            "AJAX_OPTION_SHADOW" => "N", // затемнять область
            "AJAX_OPTION_JUMP" => "N", // скроллить страницу до компонента
            "AJAX_OPTION_STYLE" => "N", // подключать стили
            "AJAX_OPTION_HISTORY" => "N"
        );
        $sets= array_merge($sets, $ajax_sets);
    }
    $APPLICATION->IncludeComponent(
        "bitrix:form.result.new",
        "call_order",
        $sets
    );?>
</div>
<div id="user-register" style="display: none;">
    <div class="tab-h">
        <span>Вход</span>
        <span>Регистация</span>
    </div>
    <div class="form-content">
        <div class="tab auth">
    <?$APPLICATION->IncludeComponent(
        "bitrix:system.auth.form",
        "simple_auth",
        array(
            "REGISTER_URL" => "/auth",
            "FORGOT_PASSWORD_URL" => "/auth",
            "PROFILE_URL" => "/personal/profile",
            "SHOW_ERRORS" => "Y",
            "AUTH_SERVICES" => "N",
            "AJAX_MODE" => "Y",  // режим AJAX
            "AJAX_OPTION_SHADOW" => "N", // затемнять область
            "AJAX_OPTION_JUMP" => "N", // скроллить страницу до компонента
            "AJAX_OPTION_STYLE" => "N", // подключать стили
            "AJAX_OPTION_HISTORY" => "N"
        ),
        false
    );?>
        </div>
        <div class="tab reg">
            <?$APPLICATION->IncludeComponent(
                "webpro:main.register",
                "simple_register",
                array(
                    "SHOW_FIELDS" => array(
                        0 => "PERSONAL_MOBILE",
                    ),
                    "REQUIRED_FIELDS" => array(
                        0 => "PERSONAL_MAILBOX",
                    ),
                    "AUTH" => "Y",
                    "USE_BACKURL" => "Y",
                    "SUCCESS_PAGE" => "",
                    "SET_TITLE" => "N",
                    "USER_PROPERTY" => array(
                    ),
                    "USER_PROPERTY_NAME" => "",
                    "AJAX_MODE" => "Y",  // режим AJAX
                    "AJAX_OPTION_SHADOW" => "N", // затемнять область
                    "AJAX_OPTION_JUMP" => "N", // скроллить страницу до компонента
                    "AJAX_OPTION_STYLE" => "N", // подключать стили
                    "AJAX_OPTION_HISTORY" => "N"
                ),
                false
            );?>
        </div>
    </div>
</div>


</body>
</html>