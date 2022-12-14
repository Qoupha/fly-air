<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/aboutus.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>О Нас</title>
</head>

<body>
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        </a>
        <ul class="nav nav-pills">
        <li class="nav-item"><a href="/" class="nav-link " aria-current="page">Главная</a></li>
        <li class="nav-item"><a href="/Whyme.php" class="nav-link ">Почему мы?</a></li>
        <li class="nav-item"><a href="/aboutus.php" class="nav-link active">О нас</a></li>
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
                <p class="text1">Помогаем взлететь с 2011 года</p>
                <p class="text2"><br> Сайт AIR работает на рынке авиабилетов 11 лет. Сейчас через сайт продаётся около 13000 билетов в день, а за всё время работы пассажиры купили у нас 20,4 млн билетов.
                    <br> Сайт AIR разрабатывают и поддерживают 466 профессионалов, которые делают так, чтобы поиск удобных маршрутов стал точнее и быстрее. Мы заботимся о том, чтобы вы не попали в неприятную ситуацию как во время, так и после покупки
                    авиабилетов.
                    <br> В 2018 году АНО “Российская система качества” (Роскачество) включила AIR в пятёрку лучших российских приложений для покупки авиабилетов.
                    <br>
                </p><br>
                <P class="text3">Что такое современный туризм для нас?</P><br>
                <p class="text4"> Туризм — это всегда свобода выбора. А процесс планирования и бронирования путешествия должен вызывать радость, а не ужас.<br> Мы знаем, что вам нужны лучшие цены и широкий выбор. Только так можно найти подходящий вариант. Поэтому мы постоянно
                    прилагаем максимум усилий, чтобы наши приложение и сайт работали быстро и просто.<br> Выбирайте, куда и когда поехать, и получайте лучшие по цене предложения от тысяч туристических агентств — все в нашей системе. Кроме того, мы всегда
                    готовы помочь в поисках путешествия, удовлетворяющего ваши желания, независимо от стиля жизни и финансовых возможностей.<br> Не ограничены во времени и пространстве? Тогда выберите вариант «Везде», чтобы найти путешествие по наилучшей
                    цене. Уже решили, куда отправитесь? Воспользуйтесь функцией «Отслеживать цены» и следите за изменением цены.<br> Как только вы определились с местом назначения и датами, всего несколько кликов отделяет вас от завершения бронирования
                    с помощью нашего приложения или через сайт, которые доступны уже более чем на 30 языках.</p> <br>
                <p class="text5">Что такое для нас экологически рациональный туризм?</p> <br>
                <p class="text6">Путешествие — это всегда огромное удовольствие! И мы хотим, чтобы оно было доступно для представителей любого поколения.</p> Мы предлагаем множество вариантов, но выбор всегда за вами. Теперь на ваше решение может влиять пометка «Экологически
                безопасно», обозначающая рейсы, во время полета которых выделяется меньше CO2. И с нашей помощью более десяти миллионов путешественников уже выбрали именно их. <br> И это только начало! Поверьте, мы очень серьезно подходим к вопросу экологической
                рациональности. Мы приобретаем экологически устойчивое авиационное топливо (SAF) для самолетов компании Skyscanner, чтобы снизить вредные выбросы во время перелета. Наша команда ищет новые возможности, позволяющие комфортно исследовать
                мир, сохраняя при этом природу и достопримечательности для будущих поколений. <br> Мы прекрасно понимаем, что самим нам не справиться с этой задачей. Именно поэтому мы с герцогом Сассекским и ведущими мировыми лидерами в сфере туризма
                объединились для создания проекта Travalyst.
            </div>
        </div>
    </div>
</body>

</html>