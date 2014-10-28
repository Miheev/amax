<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Демонстрационная версия продукта «1С-Битрикс: Управление сайтом»");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetTitle("Каталог книг");
?>
    <div class="hfind-container">
        <div class="hfind wrapper clearfix">
            <div class="inner clearfix">
                <input type="text" value="" placeholder="Поиск деталей" />
                <input type="submit" value="Найти" />
                <div class="select">
                    <div class="abbr clearfix"><span class="label">Все</span><span class="pointer"></span></div>
                    <div class="list">
                        <a href="javascript:void(0);" >Банк 1</a>
                        <a href="javascript:void(0);">Банк 2</a>
                        <a href="javascript:void(0);">Банк 3</a>
                    </div>
                </div>
            </div>
            <section class="cat-menu clearfix">
                <h2 class="gradient">Каталог товаров</h2>
                <ul class="uline sf-menu sf-vertical">
                    <li><a href="#">Аксисуары</a></li>
                    <li>
                        <a href="#">Автопринадлежности</a>
                        <ul>
                            <li><a href="#">Грунтовка, краска, плитка</a></li>
                            <li><a href="#">Инструмент, крепёж</a></li>
                            <li><a href="#">Сухие смеси, гипсокартон, утеплитель</a></li>
                            <li>
                                <a href="#">Грунтовка, краска, плитка</a>
                                <ul>
                                    <li><a href="#">Грунтовка, краска, плитка</a></li>
                                    <li><a href="#">Инструмент, крепёж</a></li>
                                    <li><a href="#">Сухие смеси, гипсокартон, утеплитель</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Инструмент, крепёж</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Масла и смазки</a></li>
                    <li><a href="#">Расходные жидкости</a></li>
                    <li><a href="#">Автохимия</a></li>
                    <li><a href="#">Автокосметика</a></li>
                    <li><a href="#">Авторемонт</a></li>
                    <li><a href="#">Автолитература</a></li>
                    <li>
                        <a href="#">Автошины и диски</a>
                        <ul>
                            <li><a href="#">Грунтовка, краска, плитка</a></li>
                            <li><a href="#">Инструмент, крепёж</a></li>
                            <li><a href="#">Сухие смеси, гипсокартон, утеплитель</a></li>
                            <li>
                                <a href="#">Грунтовка, краска, плитка</a>
                                <ul>
                                    <li><a href="#">Грунтовка, краска, плитка</a></li>
                                    <li><a href="#">Инструмент, крепёж</a></li>
                                    <li><a href="#">Сухие смеси, гипсокартон, утеплитель</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Инструмент, крепёж</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <div class="popup-cat-label">
                <a class="abutton" href="javascript:void(0);">Открыть каталог</a>
            </div>
        </div>
    </div>
    <div class="main-container">
        <div class="main cat-ico wrapper clearfix">
            <aside class="right">
                <div class="discount-single">
                    <h3>Акция</h3>
                    <a href="#">
                        <img src="<?=SITE_TEMPLATE_PATH?>/img/discount.jpg" />
                    </a>
                </div>
            </aside>
            <div class="center">
                <div class="head">
                    <h3>Каталог запчастей онлайн</h3>
                </div>
                <div class="cat-list clearfix">
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_toyota.png" />
                            <span>TOYOTA</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_mazda.png" />
                            <span>MAZDA</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_bmw.png" />
                            <span>BMW</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_mercedes.png" />
                            <span>MERCEDES-BENZ</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_honda.png" />
                            <span>HONDA</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_hyundai.png" />
                            <span>HYUNDAI</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_isuzu.png" />
                            <span>ISUZU</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_daewoo.png" />
                            <span>DAEWOO</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_subaru.png" />
                            <span>SUBARU</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_infiniti.png" />
                            <span>ISUZU</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_chevrolet.png" />
                            <span>DAEWOO</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_renault.png" />
                            <span>SUBARU</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_audi.png" />
                            <span>AUDI</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_subaru.png" />
                            <span>SUZUKI</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/ico_nissan.png" />
                            <span>NISSAN</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-container">
    <div class="slider wrapper clearfix">
    <div class="head">
        <h2>Специальное предложение</h2>
        <a href="#">Смотреть все</a>
    </div>
    <div class="slider-viewport">
    <div class="bxslider content clearfix">
    <div class="stuff-item">
        <div class="inner">
            <a href="#">
                <div class="img">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/vedro.jpg" />
                </div>
                <p class="cat">Масло моторное</p>
                <p class="name">Control Magnatec AP 5w30</p>
            </a>
            <p class="link"><a href="#">Подробнее</a></p>
            <div class="footer clearfix">
                <div class="left">
                    <a class="basket-btn" href="javascript:void(0)">В корзину</a>
                </div>
                <div class="right">
                    <p class="discount">1 000 000 руб</p>
                    <p class="normal">999 999 руб</p>
                </div>
            </div>
        </div>
    </div>
    <div class="stuff-item">
        <div class="inner">
            <a href="#">
                <div class="img">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/vedro.jpg" />
                </div>
                <p class="cat">Масло моторное</p>
                <p class="name">Control Magnatec AP 5w30</p>
            </a>
            <p class="link"><a href="#">Подробнее</a></p>
            <div class="footer clearfix">
                <div class="left">
                    <a class="basket-btn" href="javascript:void(0)">В корзину</a>
                </div>
                <div class="right">
                    <p class="discount">1 000 000 руб</p>
                    <p class="normal">999 999 руб</p>
                </div>
            </div>
        </div>
    </div>
    <div class="stuff-item">
        <div class="inner">
            <a href="#">
                <div class="img">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/vedro.jpg" />
                </div>
                <p class="cat">Масло моторное</p>
                <p class="name">Control Magnatec AP 5w30</p>
            </a>
            <p class="link"><a href="#">Подробнее</a></p>
            <div class="footer clearfix">
                <div class="left">
                    <a class="basket-btn" href="javascript:void(0)">В корзину</a>
                </div>
                <div class="right">
                    <p class="discount">1 000 000 руб</p>
                    <p class="normal">999 999 руб</p>
                </div>
            </div>
        </div>
    </div>
    <div class="stuff-item">
        <div class="inner">
            <a href="#">
                <div class="img">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/vedro.jpg" />
                </div>
                <p class="cat">Масло моторное</p>
                <p class="name">Control Magnatec AP 5w30</p>
            </a>
            <p class="link"><a href="#">Подробнее</a></p>
            <div class="footer clearfix">
                <div class="left">
                    <a class="basket-btn" href="javascript:void(0)">В корзину</a>
                </div>
                <div class="right">
                    <p class="discount">1 000 000 руб</p>
                    <p class="normal">999 999 руб</p>
                </div>
            </div>
        </div>
    </div>
    <div class="stuff-item">
        <div class="inner">
            <a href="#">
                <div class="img">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/vedro.jpg" />
                </div>
                <p class="cat">Масло моторное</p>
                <p class="name">Control Magnatec AP 5w30</p>
            </a>
            <p class="link"><a href="#">Подробнее</a></p>
            <div class="footer clearfix">
                <div class="left">
                    <a class="basket-btn" href="javascript:void(0)">В корзину</a>
                </div>
                <div class="right">
                    <p class="discount">1 000 000 руб</p>
                    <p class="normal">999 999 руб</p>
                </div>
            </div>
        </div>
    </div>
    <div class="stuff-item">
        <div class="inner">
            <a href="#">
                <div class="img">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/vedro.jpg" />
                </div>
                <p class="cat">Масло моторное</p>
                <p class="name">Control Magnatec AP 5w30</p>
            </a>
            <p class="link"><a href="#">Подробнее</a></p>
            <div class="footer clearfix">
                <div class="left">
                    <a class="basket-btn" href="javascript:void(0)">В корзину</a>
                </div>
                <div class="right">
                    <p class="discount">1 000 000 руб</p>
                    <p class="normal">999 999 руб</p>
                </div>
            </div>
        </div>
    </div>
    <div class="stuff-item">
        <div class="inner">
            <a href="#">
                <div class="img">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/vedro.jpg" />
                </div>
                <p class="cat">Масло моторное</p>
                <p class="name">Control Magnatec AP 5w30</p>
            </a>
            <p class="link"><a href="#">Подробнее</a></p>
            <div class="footer clearfix">
                <div class="left">
                    <a class="basket-btn" href="javascript:void(0)">В корзину</a>
                </div>
                <div class="right">
                    <p class="discount">1 000 000 руб</p>
                    <p class="normal">999 999 руб</p>
                </div>
            </div>
        </div>
    </div>
    <div class="stuff-item">
        <div class="inner">
            <a href="#">
                <div class="img">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/vedro.jpg" />
                </div>
                <p class="cat">Масло моторное</p>
                <p class="name">Control Magnatec AP 5w30</p>
            </a>
            <p class="link"><a href="#">Подробнее</a></p>
            <div class="footer clearfix">
                <div class="left">
                    <a class="basket-btn" href="javascript:void(0)">В корзину</a>
                </div>
                <div class="right">
                    <p class="discount">1 000 000 руб</p>
                    <p class="normal">999 999 руб</p>
                </div>
            </div>
        </div>
    </div>
    <div class="stuff-item">
        <div class="inner">
            <a href="#">
                <div class="img">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/vedro.jpg" />
                </div>
                <p class="cat">Масло моторное</p>
                <p class="name">Control Magnatec AP 5w30</p>
            </a>
            <p class="link"><a href="#">Подробнее</a></p>
            <div class="footer clearfix">
                <div class="left">
                    <a class="basket-btn" href="javascript:void(0)">В корзину</a>
                </div>
                <div class="right">
                    <p class="discount">1 000 000 руб</p>
                    <p class="normal">999 999 руб</p>
                </div>
            </div>
        </div>
    </div>
    <div class="stuff-item">
        <div class="inner">
            <a href="#">
                <div class="img">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/vedro.jpg" />
                </div>
                <p class="cat">Масло моторное</p>
                <p class="name">Control Magnatec AP 5w30</p>
            </a>
            <p class="link"><a href="#">Подробнее</a></p>
            <div class="footer clearfix">
                <div class="left">
                    <a class="basket-btn" href="javascript:void(0)">В корзину</a>
                </div>
                <div class="right">
                    <p class="discount">1 000 000 руб</p>
                    <p class="normal">999 999 руб</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="main-container">
        <div class="main pop-news wrapper clearfix">
            <div class="center">
                <div class="product-list">
                    <div class="head">
                        <h2>Популярные товары</h2>
                        <a href="#">смотреть всё</a>
                    </div>
                    <div class="content clearfix">
                        <div class="stuff-item">
                            <div class="inner">
                                <a href="#">
                                    <div class="img">
                                        <img src="<?=SITE_TEMPLATE_PATH?>/img/vedro.jpg" />
                                    </div>
                                    <p class="cat">Масло моторное</p>
                                    <p class="name">Control Magnatec AP 5w30</p>
                                </a>
                                <p class="link"><a href="#">Подробнее</a></p>
                                <div class="footer clearfix">
                                    <div class="left">
                                        <a class="basket-btn" href="javascript:void(0)">В корзину</a>
                                    </div>
                                    <div class="right">
                                        <p class="normal single">999 999 руб</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="stuff-item">
                            <div class="inner">
                                <a href="#">
                                    <div class="img">
                                        <img src="<?=SITE_TEMPLATE_PATH?>/img/vedro.jpg" />
                                    </div>
                                    <p class="cat">Масло моторное</p>
                                    <p class="name">Control Magnatec AP 5w30</p>
                                </a>
                                <p class="link"><a href="#">Подробнее</a></p>
                                <div class="footer clearfix">
                                    <div class="left">
                                        <a class="basket-btn" href="javascript:void(0)">В корзину</a>
                                    </div>
                                    <div class="right">
                                        <p class="normal single">999 999 руб</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="stuff-item">
                            <div class="inner">
                                <a href="#">
                                    <div class="img">
                                        <img src="<?=SITE_TEMPLATE_PATH?>/img/vedro.jpg" />
                                    </div>
                                    <p class="cat">Масло моторное</p>
                                    <p class="name">Control Magnatec AP 5w30</p>
                                </a>
                                <p class="link"><a href="#">Подробнее</a></p>
                                <div class="footer clearfix">
                                    <div class="left">
                                        <a class="basket-btn" href="javascript:void(0)">В корзину</a>
                                    </div>
                                    <div class="right">
                                        <p class="normal single">999 999 руб</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="stuff-item">
                            <div class="inner">
                                <a href="#">
                                    <div class="img">
                                        <img src="<?=SITE_TEMPLATE_PATH?>/img/vedro.jpg" />
                                    </div>
                                    <p class="cat">Масло моторное</p>
                                    <p class="name">Control Magnatec AP 5w30</p>
                                </a>
                                <p class="link"><a href="#">Подробнее</a></p>
                                <div class="footer clearfix">
                                    <div class="left">
                                        <a class="basket-btn" href="javascript:void(0)">В корзину</a>
                                    </div>
                                    <div class="right">
                                        <p class="normal single">999 999 руб</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="stuff-item">
                            <div class="inner">
                                <a href="#">
                                    <div class="img">
                                        <img src="<?=SITE_TEMPLATE_PATH?>/img/vedro.jpg" />
                                    </div>
                                    <p class="cat">Масло моторное</p>
                                    <p class="name">Control Magnatec AP 5w30</p>
                                </a>
                                <p class="link"><a href="#">Подробнее</a></p>
                                <div class="footer clearfix">
                                    <div class="left">
                                        <a class="basket-btn" href="javascript:void(0)">В корзину</a>
                                    </div>
                                    <div class="right">
                                        <p class="normal single">999 999 руб</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="stuff-item">
                            <div class="inner">
                                <a href="#">
                                    <div class="img">
                                        <img src="<?=SITE_TEMPLATE_PATH?>/img/vedro.jpg" />
                                    </div>
                                    <p class="cat">Масло моторное</p>
                                    <p class="name">Control Magnatec AP 5w30</p>
                                </a>
                                <p class="link"><a href="#">Подробнее</a></p>
                                <div class="footer clearfix">
                                    <div class="left">
                                        <a class="basket-btn" href="javascript:void(0)">В корзину</a>
                                    </div>
                                    <div class="right">
                                        <p class="normal single">999 999 руб</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <aside class="right">
                <div class="news-list">
                    <div class="head">
                        <h2>Новости</h2>
                        <a href="#">смотреть всё</a>
                    </div>
                    <div class="content">
                        <div class="item clearfix">
                            <div class="left">
                                <div class="date">
                                    <p>сен</p>
                                    <p>30</p>
                                </div>
                            </div>
                            <div class="right">
                                <h3>Заголовок новости про кампанию</h3>
                                <div class="text">
                                    <p>Существуют две основные трактовки понятия "текст": имманентная (расширенная, философски нагруженная) и "репрезентативная" (более частная). Имманентный подход подразумевает отношение к тексту, как к автономной реальности, нацеленность на выявление его внутренней структуры.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item clearfix">
                            <div class="left">
                                <div class="date">
                                    <p>сен</p>
                                    <p>30</p>
                                </div>
                            </div>
                            <div class="right">
                                <h3>Заголовок новости про кампанию</h3>
                                <div class="text">
                                    <p>Существуют две основные трактовки понятия "текст": имманентная (расширенная, философски нагруженная) и "репрезентативная" (более частная). Имманентный подход подразумевает отношение к тексту, как к автономной реальности, нацеленность на выявление его внутренней структуры.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item clearfix">
                            <div class="left">
                                <div class="date">
                                    <p>сен</p>
                                    <p>30</p>
                                </div>
                            </div>
                            <div class="right">
                                <h3>Заголовок новости про кампанию</h3>
                                <div class="text">
                                    <p>Существуют две основные трактовки понятия "текст": имманентная (расширенная, философски нагруженная) и "репрезентативная" (более частная). Имманентный подход подразумевает отношение к тексту, как к автономной реальности, нацеленность на выявление его внутренней структуры.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>