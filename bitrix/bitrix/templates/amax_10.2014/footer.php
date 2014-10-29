<? if ($page_class != 'index') : ?>
    </div></div></div>
<? endif;  ?>
<?include 'include/bottom_block.php'?>
</div> <!--Site Content -->

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
                    <span>+7 (4212) 555-555</span>
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
            <p>&copy; 2014 Компания &laquo;Автомаксимум&raquo; <a href="#">Политика конфиденциальности</a></p>
        </div>
    </footer>
</div>

<div class="popup-cat-out"></div>


</body>
</html>