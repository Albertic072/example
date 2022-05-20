$(document).ready(function(){
    //плавный скролл к якорю
    // var linkNav = document.querySelectorAll('[href^="/#"]'), //выбираем все ссылки к якорю на странице
    // V = 0.4;  // скорость, может иметь дробное значение через точку (чем меньше значение - тем больше скорость)
    // for (var i = 0; i < linkNav.length; i++) {
    //     linkNav[i].addEventListener('click', function(e) { //по клику на ссылку
    //         e.preventDefault(); //отменяем стандартное поведение
    //         var w = window.pageYOffset,  // производим прокрутка прокрутка
    //             hash = this.href.replace(/[^#]*(.*)/, '$1');  // к id элемента, к которому нужно перейти
    //         t = document.querySelector(hash).getBoundingClientRect().top,  // отступ от окна браузера до id
    //             start = null;
    //         requestAnimationFrame(step);  // подробнее про функцию анимации [developer.mozilla.org]
    //         function step(time) {
    //             if (start === null) start = time;
    //             var progress = time - start,
    //                 r = (t < 0 ? Math.max(w - progress/V, w + t) : Math.min(w + progress/V, w + t));
    //             window.scrollTo(0,r);
    //             if (r != w + t) {
    //                 requestAnimationFrame(step)
    //             } else {
    //                 location.hash = hash  // URL с хэшем
    //             }
    //         }
    //     }, false);
    // }

    //инициализация датапикера
    // Доступ к экземпляру объекта
    // $('#my-element').data('datepicker')
    $(".datepicker-here").datepicker({
        autoClose: true
    });

    $(".search__input").datepicker({
        onSelect: function($date) {
            $.ajax({
                type: 'POST',
                url: "/control/modules/record/backend/vRecord.php",
                data: {"date": $date},
                response:'text',
                    success: function(data) {
                    $('#vRecord').html(data);
                }
            })
        }
    });

    $(".inputDateModal").datepicker({
        onSelect: function($date) {
            $.ajax({
                type: 'POST',
                url: "/backend/vTime.php",
                data: {"date": $date},
                response:'text',
                    success: function(data) {
                    $('#dateModal').html(data);
                }
            })
        }
    });
    $(".inputDate").datepicker({
        onSelect: function($date) {
            $.ajax({
                type: 'POST',
                url: "/backend/vTime.php",
                data: {"date": $date},
                response:'text',
                    success: function(data) {
                    $('#date').html(data);
                }
            })
        }
    });

    var disabledDays = [0];

    $('.datepicker-here').datepicker({
        onRenderCell: function (date, cellType) {
            if (cellType == 'day') {
                var day = date.getDay(),
                    isDisabled = disabledDays.indexOf(day) != -1;
    
                return {
                    disabled: isDisabled
                }
            }
        }
    })

    if ($(window).height() < 851) {
        $(".inputDateModal").datepicker({
            position: "top left" 
        });
        $('.form ').css({'padding-top':'40px', 'padding-bottom':'40px'});
    };




    $('.inputTel').mask('+7(999) 999-99-99');
    $('.input__modalTel').mask('+7(999) 999-99-99');

    // анимация иконки бургер
    $('.menu-icon').click(function() {
        $(this).toggleClass('opened');
    });
    //меню бургур
    $('.icon').click(function(){
        $('.menu__burger').toggleClass('menu__burger_active');
    });

    //перемещение элементов при адаптации
    if ($(window).width() < 511) {
        $('.header__tels').prependTo('.menu__burger');
    };
    if ($(window).width() < 500) {
        $('.footer__btn').appendTo('.footer__left');
    };
    if(location.toString().indexOf('404') !== -1) {
        $('head').prepend('<meta name="robots" content="noindex,nofollow" />');
    }
});