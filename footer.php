<footer class="footer">
    <div class="footer__wrap container">
        <div class="footer__left">
            <div class="footer__left_wrap">
                <a href="/" class="footer__logo">
                    <img src="/css/img/logo_footer.svg" alt="Логотип">
                </a>
                <div class="footer__left_text">
                    © 2021, ООО “Компания Сибоптторг”<br>
                    г.Тюмень, ул Трактовая, д. 58
                </div>
            </div>
            <div class="footer__wrap_items light">
                <p>ИНН 7203390327</p>
                <p>КПП 720301001</p>
                <p>ОГРН 1167232075625</p>
                <p>ОКПО	03651962</p>
            </div>
        </div>
        <div class="footer__center">
            <a href="/pages/about/" class="footer__center_item">О КОМПАНИИ</a>
            <a href="/#promo" class="footer__center_item">НАПРАВЛЕНИЯ</a>
            <a href="/#coop" class="footer__center_item">СОТРУДНИЧЕСТВО</a>
            <a href="/#contacts" class="footer__center_item">КОНТАКТЫ</a>
            <a href="/pages/policy/" target="_blank" class="footer__policy light">Политика безопасности</a>
        </div>
        <div class="footer__right">
            <div class="box__item_wrap">
                <div class="box__item">
                    <a href="tel:73452500152"><span>+7 (3452) 500-152, </span><span class="light">доб. 131</span></a>
                </div>
                <div class="box__item">
                    <a href="tel:73452500152"><span>+7 (3452) 500-152, </span><span class="light">доб. 108</span></a>
                </div>
                <div class="box__item">
                    <a href="tel:73452500152"><span>+7 (3452) 500-152, </span><span class="light">доб. 109</span></a>
                </div>
                <a href="mailto:tdptoiko@mail.ru" class="footer__right_email light">tdptoiko@mail.ru</a>
            </div>
            <a href="https://ww.net.ru/" target="_blank" class="ww__logo" style="display:flex;">
                <img src="/css/img/logo_ww.svg" alt="Логотип WW">
                <div class="footer__logo_text" style="margin-left:10px; color:#fff;">
                    Сайт разработан<br>
                    в веб-студии WW
                </div>
            </a>
        </div>
    </div>
</footer>
<!-- Модалка обратный звонок -->
<div class="modal" style="display: none;">
    <div class="popup">
        <div class="popup__wrap">
            <p class="popup__title">Спасибо! Ваша заявка принята.</p>
            <p class="popup__subtitle light">Мы перевзоним вам в ближайшее время.</p>
        </div>
    </div>
</div>
<!-- Конец модалка обратный звонок -->

<?
if($_SESSION["user_ok_cock"] != '1')
{
    echo'
        <div class="cookie">
            <div class="cookie__wrapper">
                <p>Продолжая использовать наш сайт, вы принимаете </p>
                <a href="/pages/cookie/" target="_blank">политику использования cookie-файлов.</a>
            </div>
            <div class="cookie__btn" onclick="policyFunc(1);">Принимаю</div>
            <img src="/css/img/modalCrossBlack.svg" alt="Крест" title="Не принимаю" class="cookie__close" onclick="closeCoockie()">
        </div>
    ';
}
?>
<script>
    //открытие модалки обратный звонок
    function modalOpen(){
            $('.modal').fadeIn(300);
            if($('.modal').css('display','flex'))
            {
            //Закрыть по нажатию вне элементов
            $(document).mouseup(function (e){ // событие клика по веб-документу
            var div = $(".popup"); // тут указываем ID элемента
            if (!div.is(e.target) // если клик был не по нашему блоку
                && div.has(e.target).length === 0) { // и не по его дочерним элементам
                $('.modal').fadeOut(300); // скрываем его
            }
        });
        }
    }
    //закрытие модалки
    function modalClose(){
            $("body").removeClass("fixed");
            $('.modal').fadeOut(300);
        }

    function policyFunc($cookie) {
        $.ajax({
            type: 'POST',
            url: "/backend/acceptCookie.php",
            data: {"cookie": $cookie},
            response: 'text',
            success: function (data) {
                $('.cookie').fadeOut(300);            
            }
        })
    }
    function closeCoockie() {
        $('.cookie').fadeOut(300);            
    }
</script>