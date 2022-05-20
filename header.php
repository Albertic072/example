<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <?
    $title = 'ООО "Компания Сибоптторг"';
    $description = 'Компания Сибоптторг - материально-техническое снабжение нефтегазовой отрасли, государственных и бюджетных организаций. Работаем по 44ФЗ и 223ФЗ!';
    $keywords = '';
    ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title;?></title>
    <meta name="keywords" content="<?=$keywords;?>"/>
    <meta name="description" content="<?=$description;?>"/>
    <?
    echo '
    <meta property="og:image" content="http://'.$_SERVER['SERVER_NAME'].'/css/img/opengraph.svg"/>
    <meta property="og:title" content="'.$title.'" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://'.$_SERVER['SERVER_NAME'].'" />
    <meta property="og:description " content="'.$description.'" />
    <meta property="og:locale" content="ru_RU" />
    <meta property="og:site_name" content="'.$title.'" />
    
    <meta itemprop="name" content="'.$title.'" />
    <meta itemprop="description" content="'.$description.'" />
    <meta itemprop="image" content="http://'.$_SERVER['SERVER_NAME'].'/css/img/logo.svg" />
    '; 
    ?>
   
    <link rel="canonical" href="<?echo 'https://'.$_SERVER['HTTP_HOST'].''.$_SERVER['REQUEST_URI'];?>"/>
    <link rel="icon" href="/css/img/favicon/favicon.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="/css/img/favicon/favicon180.png" />
    <link rel="stylesheet" href="/css/libs/slick.css">
    <link rel="stylesheet" href="/css/libs/animate.css">
    <link rel="stylesheet" href="/css/main.css?=ver03">
    <link rel="stylesheet" href="/css/media.css?=ver03">
    <script src="/js/libs/jquery-3.5.1.min.js"></script>
    <script src="/js/libs/slick.min.js"></script>
    <script src="/js/libs/jquery.maskedinput.js"></script>
    <script src="/js/libs/wow.min.js"></script>
    <script src="/js/main.js?=ver03"></script>

</head>
<body>
    <header class="header">
        <div class="container" style="position:relative; overflow:visible;">
            <div class="header__wrap">
                <a href="/" class="header__logo">
                    <img src="/css/img/logo_header.svg" alt="Логотип">
                </a>
                <div class="header__wrapper">
                    <div class="header__center">
                        <div class="header__center_item semibold">г. Тюмень, ул.Трактовая д.58</div>
                        <div class="header__center_item">
                            <a href="mailto:tdptoiko@mail.ru" class="header__link">tdptoiko@mail.ru</a>
                        </div>
                    </div>
                    <div class="header__right">
                        <div class="header__right_item">
                            <a href="tel:+73452500152" class="header__link"><span class="semibold">+7 (3452) 500-152,</span> доб. 131</a>
                        </div>
                        <div class="header__right_item">
                            <a href="tel:+73452500152" class="header__link"><span class="semibold">+7 (3452) 500-152,</span> доб. 108</a>
                        </div>
                        <div class="header__right_item">
                            <a href="tel:+73452500152" class="header__link"><span class="semibold">+7 (3452) 500-152,</span> доб. 109</a>
                        </div>
                    </div>
                </div>
                <div class="burger__img" onclick="openBurger()">
                    <img src="/css/img/burger.svg" alt="Бургер">
                </div>
            </div>
            <div class="menu">
                <div id="container"></div>
                <div class="menu__item_wrap">
                    <a href="/pages/about/" class="menu__item">О компании</a>
                    <a href="/#promo" class="menu__item">Направления</a>
                </div>
                <div class="menu__item_wrap">
                    <a href="/#coop" class="menu__item">Сотрудничество</a>
                    <a href="/#contacts" class="menu__item">Контакты</a>
                </div>
            </div>
        </div>
        <div class="menu__burger">
            <img src="/css/img/x.svg" class="close__burger_img" alt="Крест" onclick="closeBurger()">
        </div>
    </header>
    <script>
        function openBurger(){
            $('.menu__burger').addClass('menu__burger_active');
        }
        function closeBurger(){
            $('.menu__burger').removeClass('menu__burger_active');
        }
    </script>
