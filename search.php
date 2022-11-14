<?php
session_start();
require('./db.php');
$selectedCityFrom = $_GET['from'];
$selectedCityTo = $_GET['to'];
$dateFirst = $_GET['dateFirst'];
if (0 >= strlen($dateFirst)) {
    $dateFirst = '1999-01-01';
};
$stmt = $pdo->prepare('SELECT tickets.id as ticketId, tickets.price, tickets.dateFrom, tickets.timeFrom, tickets.travelTime, city_to.name as cityTo , city_from.name as cityFrom FROM `tickets`
    INNER JOIN cities as city_to on tickets.to = city_to.id
    INNER JOIN cities as city_from on tickets.from = city_from.id
    WHERE `from` = :from AND `to` = :to AND `dateFrom` = :dateFirst');
$stmt->execute(array("from" => $selectedCityFrom, "to" => $selectedCityTo, 'dateFirst' => $dateFirst));
$city = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
    </a>
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="/" class="nav-link" aria-current="page">Главная</a></li>
        <li class="nav-item"><a href="/Whyme.php" class="nav-link">Почему мы?</a></li>
        <li class="nav-item"><a href="/aboutus.php" class="nav-link">О нас</a></li>
        <?php
        if ($_SESSION['auth'] == 1) {
            ?>
            <li class="nav-item"><a href="/lk.php" class="nav-link">Кабинет</a></li>
            <li class="nav-item"><a href="/logout.php" class="nav-link">Выйти</a></li>
            <?
        } else {
            ?>
            <li class="nav-item"><a href="/register.php" class="nav-link">Регистрация</a></li>
            <li class="nav-item"><a href="/login.php" class="nav-link">Авторизация</a></li>
            <?
        }
        ?>

    </ul>
</header>
<div class="infoTicket">
    <div class="wrapper">
        <div class="container">
            <div class="user">
                <div class="userinfo"><h2>Актуальные билеты</h2></div>
            </div>
        </div>
    </div>
</div>

<div class='search_content search_body'>

    <?php
    if (empty($city)) {
        print_r('Билеты не найдены');
    } else {
        foreach ($city as $item) {

        ?>
        <form method='POST' action='/req.php'>
            <input style='display:none;' name='ticket_id' value='<?php echo $item['ticketId'] ?>'>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Откуда</label>
                    <input type="email" class="form-control" id="inputEmail4"
                           placeholder="<?php echo $item['cityFrom'] ?>" disabled>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Куда</label>
                    <input type="password" class="form-control" id="inputPassword4"
                           placeholder="<?php echo $item['cityTo'] ?>" disabled>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <p for="inputEmail4">Цена: <?php echo $item['price'] ?> рублей</p>
                    <p for="inputEmail4">Время в пути: <?php echo $item['travelTime'] ?> часов</p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Дата отправления</label>
                    <input type="text" class="form-control" id="inputEmail5"
                           placeholder="<?php echo $item['dateFrom'] ?>" disabled>
                </div>
                <div class="form-group col-md-6">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <p for="inputEmail4">Время отправления по часовому поясу города
                        вылета: <?php echo $item['timeFrom'] ?></p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Ф.И.О.</label>
                    <input name='name' type="text" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputZip">Номер телефона</label>
                    <input name='phone' type="phone" class="form-control" id="inputZip">
                </div>
            </div>
            <?php
            if ($_SESSION['auth'] == 1) {
                ?>
                <button type="submit" class="btn btn-primary">Забронировать</button>
                <?
            } else {
                ?>
c                <?
            }
            ?>
        </form>
        <?php
    }        }

    ?>

</div>

</body>

</html>