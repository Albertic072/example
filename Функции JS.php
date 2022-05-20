//перемещение элемента при изменении разрешения экрана
if ($(window).width() < 760) {
    $('#textarea').appendTo('.feedback__left_itemHid');
};

// Появление и исчезновение при скролле
$(window).scroll(function(){
    if($(this).scrollTop()>=500){
        console.log($(this).scrollTop());
        $('.container__new_buttons').fadeTo(300,1);
    }
    else if ($(this).scrollTop()<500){
        console.log($(this).scrollTop());
        $('.container__new_buttons').css('display','none');
    }
});

// Появление и исчезновение при скролле на разрешении меньше 1700
if ($(window).width() < 1700) {
    $('.container__new_buttons').css('display','none');
    $(window).scroll(function(){
        if($(this).scrollTop()>=500){
            console.log($(this).scrollTop());
            $('.container__new_buttons').fadeTo(300,1);
        }
        else if ($(this).scrollTop()<500){
            console.log($(this).scrollTop());
            $('.container__new_buttons').css('display','none');
        }
    });
};

// Закрыть по нажатию вне элементов
$(document).mouseup(function (e) {
var container = $(".select__items");
    if (container.has(e.target).length === 0){
        container.slideUp();
    }
});        


// Перемещение элемента
$('.window__calc_add').click(function () {
    $(this).appendTo('.window');
});

// Копирование элемента
$('.window__calc_add').click(function () {
    $(this).clone().appendTo('.window');
});

// Функции модалки. Их менять не надо
// Открытие модалки по нажатию на элемент с нужным классом
function modalOpen(element, modalName) {
    $(element).on('click', function () {
        $(modalName).fadeTo(300, 1).css('display', 'flex');
    });
}

// Закрытие модалки
function modalClose_ButtonKeyArea(element, modalName) {
    // Закрытие по нажатию на крест
    $(element).on('click', function () {
        $(modalName).fadeTo(500, 0);
        setTimeout(function () {
            $(modalName).hide();
        }, 500);
    });

    // Закрытие по нажатию на Esc
    $(document).keydown(function (e) {
        if (e.keyCode === 27) {
            e.stopPropagation();
            $(modalName).fadeOut();
        }
    });

    // Закрытие по нажатию вне окна (по темному фону)
    $(modalName).click(function (e) {
        if ($(e.target).closest('.popup').length == 0) {
            $(this).fadeOut();
        }
    });
}
// КОНЕЦ Функции модалки. Их менять не надо

// Запуск функций, описанных выше
// Открытие модали с классом modal__test по нажатию на элемент с классом btn-modal
modalOpen('.btn-modal', '.modal__weight');
modalOpen('.btn-modal-call', '.modal__call');

// Закрытие модалки с классом .modal__test по нажатию на элемент с классом closebtn
modalClose_ButtonKeyArea('.closebtn', '.modal__weight');
modalClose_ButtonKeyArea('.closebtn', '.modal__call');

// Закрытие модалки с классом .modal__test по нажатию на элемент с классом modal-close-footer
modalClose_ButtonKeyArea('.modal-close-footer', '.modal__test');

//Загрузка файла
<label for="inputProjectFile">
    <input type="file" id="inputProjectFile" class="inputProjectFile" name="inputProjectFile" style="display:none;" onchange="loadFile(this,'.$row_new['id'].')">
</label>

function loadFile(el, $id){
    let file_data = $(el).get(0).files[0];
    let formData = new FormData();
    formData.append("file", file_data);
    formData.append("id", $id);
    console.log(formData);
        $.ajax({
        url: "/backend/loadFileFolder.php",
        type: "POST",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function(){
            $(el).parent().parent(".accounts_file_wrap").html("Загрузка");
        },
        success:function(data){
            alert(data);
        }
    });
};

//toggleText
//это расширяет qQuery
$.fn.extend({
    toggleText: function(a, b){
        return this.text(this.text() == b ? a : b);
    }
});
//а это использование
$('.menu_tongue-p').toggleText('Открыть', 'Закрыть');

//select
    function selectViewVac(id){
        $('.main__tabs_content_slide').slideUp();
        if($('.main__tabs_content_slide'+id+'').css('display') == "none"){
            $('.main__tabs_content_slide'+id+'').slideDown();
        }
    }

//увеличение и уменьшение значения инпута
function plus(el){
    input = $(el).siblings().find('.counter__input').val();
    $(el).siblings().find('.counter__input').val(parseInt(input) + 1);
}
function minus(el){
    input = $(el).siblings().find('.counter__input').val();
    if(input > 1) {
        $(el).siblings().find('.counter__input').val(parseInt(input) - 1);
    }
}

//ограничить длину инпута до 4
document.getElementById('inputNumber').oninput = function () {
    if (this.value.length > 4) this.value = this.value.substr(0, 4);
}
//еще вариант
<input type="number" onkeypress="if(this.value.length&gt;3) return false;">

