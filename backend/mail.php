<?php
$root_server = $_SERVER["DOCUMENT_ROOT"];
include(''.$root_server.'/php/classes/text.php'); 

if ($_POST['tel'] AND $_POST['name']) 
{
    $name = Text::formatting($_POST['name']);
    $tel = Text::formatting($_POST['tel']);

    require_once "SendMailSmtpClass.php";
    $mailSMTP = new SendMailSmtpClass('ttformail@yandex.ru', 'QwE12345', 'ssl://smtp.yandex.ru', 465, "UTF-8");

    $from = array(
        $_SERVER['SERVER_NAME'],
        "ttformail@yandex.ru"
    );

    $to = 'mamatulin@mail.ru';

    if(isset($_POST['form__call']))
    {
        $subject = 'Обратный звонок с сайта '.$_SERVER['SERVER_NAME'].'';
        $message = 'Обратный звонок с сайта '.$_SERVER['SERVER_NAME'].'<br><br>
                    <b>Имя</b> - '.$name.'<br><br>
                    <b>Телефон</b> - '.$tel.'<br><br>';
    }
    elseif(isset($_POST['form__calk']))
    {
        $subject = 'Рассчитать стоимость с сайта '.$_SERVER['SERVER_NAME'].'';
        $message = 'Рассчитать стоимость с сайта '.$_SERVER['SERVER_NAME'].'<br><br>
                    <b>Имя</b> - '.$name.'<br><br>
                    <b>Телефон</b> - '.$tel.'<br><br>';
    }
    elseif(isset($_POST['form__price'])){
        $subject = 'Узнать стоимость изготовления с сайта '.$_SERVER['SERVER_NAME'].'';
        $message = 'Узнать стоимость изготовления с сайта '.$_SERVER['SERVER_NAME'].'<br><br>
                    <b>Имя</b> - '.$name.'<br><br>
                    <b>Телефон</b> - '.$tel.'<br><br>';
    }

    $mailSMTP->send($to, $subject, $message, $from);
}
elseif($_POST['tel'] != '' AND isset($_POST['form']))
{
    $tel = Text::formatting($_POST['tel']);

    require_once "SendMailSmtpClass.php";
    $mailSMTP = new SendMailSmtpClass('ttformail@yandex.ru', 'QwE12345', 'ssl://smtp.yandex.ru', 465, "UTF-8");

    $from = array(
        $_SERVER['SERVER_NAME'],
        "ttformail@yandex.ru"
    );

    $to = 'mamatulin@mail.ru';

    if(isset($_POST['form__help'])){
        $subject = 'Нужна помощь с подбором сетки с сайта '.$_SERVER['SERVER_NAME'].'';
        $message = 'Нужна помощь с подбором сетки с сайта '.$_SERVER['SERVER_NAME'].'<br><br>
                    <b>Телефон</b> - '.$tel.'<br><br>';
    }
    elseif(isset($_POST['form__consult'])){
        $subject = 'Консультация с сайта '.$_SERVER['SERVER_NAME'].'';
        $message = 'Консультация с сайта '.$_SERVER['SERVER_NAME'].'<br><br>
                    <b>Имя</b> - '.$name.'<br><br>
                    <b>Телефон</b> - '.$tel.'<br><br>';
    }

    $mailSMTP->send($to, $subject, $message, $from);
}
else
{
    echo'error';
}

?>