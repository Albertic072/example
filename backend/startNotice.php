<?php
	$event = (int)$_POST['event'];

	if ($event)
	{
      //Добавление и самоисчезновение
      if ($event == 1) {$mode = '1'; $textNotice = 'Изменения успешно сохранены!';}
		//Изменения не сохранены и самоисчезновение
      elseif ($event == 99) {$mode = '2'; $textNotice = 'Заполните обязательные поля!';}
      //Совпадение логинов и самоисчезновение
      elseif ($event == 98) {$mode = '2'; $textNotice = 'Логин уже используется!';}

      //Совпадение наименований и самоисчезновение
      elseif ($event == 981) {$mode = '2'; $textNotice = 'Наименование уже используется!';}
      //Совпадение номер и самоисчезновение
      elseif ($event == 982) {$mode = '2'; $textNotice = 'Серия/номер паспорта уже используется!';}

      //Совпадение по пустому и самоисчезновение
      elseif ($event == 983) {$mode = '2'; $textNotice = 'Поле инн пустое';}
      //Совпадение по номеру инн и самоисчезновение
      elseif ($event == 984) {$mode = '2'; $textNotice = 'Поле инн совпадает с существующими';}

      //Удаление логинов и самоисчезновение
      elseif ($event == 91) {$mode = '1'; $textNotice = 'Объект успешно удален!';}
      echo'
      

      <script>
         setTimeout(function () {
            $(\'.modal_notify-save\').fadeOut(2000);
            $(\'.modal_notify-bad\').fadeOut(2000);
         });
         $(\'.modal_notify-save\').addClass(\'modal_notify-active\');
         $(\'.modal_notify-bad\').addClass(\'modal_notify-active\');
         
         
      </script>	

      ';
      if($mode == '1')
      {
         echo'
         <div class="modal_notify-save notify-good" id="notify">
            <img src="/css/img/closebtn.svg" class="closebtn_notify" alt="крестик">
            <div class="modal_notify-header">
               <img src="/css/img/arrow_save.svg" class="arrow_save" alt="сохранено">
               <p class="notify_header-title">Сохранено</p>
            </div>
            <div class="modal_notify-body">
               <p class="notify_body-p">'.$textNotice.'</p>
            </div>
         </div>
         ';
      }
      elseif($mode == '2')
      {
         echo'
         <div class="modal_notify-bad notify-bad" id="notify">
            <img src="/css/img/closebtn.svg" class="closebtn_notify" alt="крестик">
            <div class="modal_notify-header">
               <img src="/css/img/arrow_none.svg" class="arrow_save" alt="ошибка">
               <p class="notify_header-title">Ошибка</p>
            </div>
            <div class="modal_notify-body">
               <p class="notify_body-p">'.$textNotice.'</p>
            </div>
         </div>

         ';
      }

   }
?>

<script>

$('.closebtn_notify').on('click', function(){
    $('.modal_notify-save').removeClass('modal_notify-active');
});


</script>


