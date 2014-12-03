<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мой кабинет");
$APPLICATION->addChainItem($APPLICATION->GetTitle(false), $APPLICATION->GetCurPage());
?>
<h1>Мой кабинет</h1>
<p class="desc">В личном кабинете Вы можете проверить текущее состояние корзины, ход выполнения Ваших заказов, просмотреть или изменить личную информацию, а также подписаться на новости и другие информационные рассылки.</p>
<ul class="uline profile">
    <li><a href="profile/" >Изменение регистрационных данных</a></li>
    <li><a href="order/" >Посмотреть историю заказов</a></li>
    <li><a href="cart/" >Посмотреть содержимое корзины</a></li>
</ul>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>