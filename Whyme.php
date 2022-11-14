<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/WhyMe.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Почему мы?</title>
</head>

<body>
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        </a>
        <ul class="nav nav-pills">
        <li class="nav-item"><a href="/" class="nav-link " aria-current="page">Главная</a></li>
        <li class="nav-item"><a href="/Whyme.php" class="nav-link active">Почему мы?</a></li>
        <li class="nav-item"><a href="/aboutus.php" class="nav-link">О нас</a></li>
        <?php 
            if($_SESSION['auth'] == 1){
                ?>
                    <li class="nav-item"><a href="/lk.php" class="nav-link">Кабинет</a></li>
                    <li class="nav-item"><a href="/logout.php" class="nav-link">Выйти</a></li>
                <?
            }else{
                ?>
                <li class="nav-item"><a href="/register.php" class="nav-link">Регистрация</a></li>
                <li class="nav-item"><a href="/login.php" class="nav-link">Авторизация</a></li>
                <?
            }
        ?>
      </ul>
    </header>
    <div class="text">
        <div class="wrapper_text">
            <div class="content_text">
                <p class="text1">Почему AIR?</p>
                <p class="text2">Мы готовы открыть перед вами весь мир. Никогда еще планировать путешествия не было так просто! Стоит лишь коснуться экрана, и перед вами самые популярные направления и лучшие цены. Мы стремимся сделать путешествия легкими и комфортными
                    для всех. Мы хотим, чтобы весь путь планирования поездки, бронирования билетов и отелей был простым и понятным, от начала и до конца. Чтобы потраченные деньги окупались незабываемыми впечатлениями. Чтобы индустрия туризма стала более
                    открытой, и мы всегда оправдывали ваше доверие. Именно эти идеи мы вкладываем во всё, что делаем. Мы всегда на вашей стороне и гордимся тем, что вы платите нам своим доверием (согласно отзывам путешественников рейтинг нашего сайта
                    выше, чем у наших конкурентов, таких как Kayak, Momondo и Expedia*). Мы всегда ставим ваши интересы во главу угла. Убедитесь сами! Вот что мы вам предлагаем.
                </p><br>
                <P class="text3">Лучшие цены</P> <br>
                <p class="text4"> Мы отслеживаем предложения 1200 туристических компаний и регулярно сравниваем цены. Просто доверьтесь нам. Воспользуйтесь функцией «Отслеживать цены», и вы будете получать оповещения обо всех изменениях цен на интересующий вас рейс. А
                    потом — решение за вами.</p> <br>
                <p class="text5">Честные тарифы</p> <br>
                <p class="text6">Мы показываем предложения множества авиакомпаний и онлайн-турагентств. Мы всегда на стороне путешественников и поэтому, если нам кажется, что поставщики услуг нарушают ваши интересы, мы удаляем их с сайта.
                </p> <br>
                <p class="text7">Планирование без проблем (даже если вы уже в пути)</p> <br>
                <p class="text8">Наше приложение просто в использовании и предлагает оптимальные цены, поэтому планировать путешествие с его помощью так легко. Авиабилеты, номер в отеле, автомобиль напрокат (или все сразу) — вы быстро найдете все необходимое! Немного
                    отвлеклись? Не беда, продолжайте бронирование с того места, где остановились, и сохраняйте все сведения в нашей системе.
                </p><br>
                <p class="text9">Отзывы реальных клиентов</p> <br>
                <p class="text10">Путешественники часто оставляют отзывы об авиакомпаниях и турагентствах на нашем сайте, что помогает вам в выборе подходящего варианта. А также подсказывает пути дальнейшего развития и совершенствования авиакомпаниям и турагентствам.
                </p><br>
            </div>
        </div>
    </div>
</body>

</html>