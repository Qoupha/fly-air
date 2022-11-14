<?php
ob_start();
session_start();
require('./db.php');
if ($_SESSION['auth'] == 0) {
    header('Location: ' . '/');
    exit();
}
$stmt = $pdo->prepare('SELECT firstName, lastName FROM users where id = :id');
$stmt->execute(array('id' => $_SESSION['id']));
$user = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/lk.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Air</title>
</head>

<body>
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
    </a>
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="/index.php" class="nav-link" aria-current="page">Главная</a></li>
        <li class="nav-item"><a href="/Whyme.php" class="nav-link">Почему мы?</a></li>
        <li class="nav-item"><a href="/aboutus.php" class="nav-link">О нас</a></li>
        <?php
        if ($_SESSION['auth'] == 1) {
            ?>
            <li class="nav-item"><a href="/lk.php" class="nav-link active">Кабинет</a></li>
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
<div class="infoUser">
    <div class="wrapper">
        <div class="container">
            <div class="user">
                <div class="userinfo"><? echo $user['firstName']; ?> <? echo $user['lastName']; ?></div>
            </div>
            <div class="textTitle">Ваши билеты</div>
        </div>
    </div>
</div>
<div class="ticket">
    <div class="wrapperStorage">
        <?php
        $query = $pdo->query('SELECT offers.ticked_id, offers.user_id FROM `offers` WHERE user_id = ' . $_SESSION['id']);
        $offers = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($offers)) {
            foreach ($offers as $offer) {
                $stmt = $pdo->prepare('SELECT  o.id as id, tickets.id as ticketId, tickets.price, tickets.dateFrom, tickets.timeFrom, tickets.travelTime, city_to.name as cityTo , city_from.name as cityFrom FROM `tickets`
                        INNER JOIN cities as city_to on tickets.to = city_to.id
                        INNER JOIN cities as city_from on tickets.from = city_from.id
                        LEFT JOIN offers as o ON o.ticked_id = tickets.id
                        WHERE tickets.id = :id');
                $stmt->execute(array("id" => $offer['ticked_id']));
                $city = $stmt->fetch();
                ?>
                <div class="block">
                    <div class="storage_flight_storage_one">
                        <div class="form-row">
                            <div class="form-group col-md-6">

                            <label for="inputEmail4">Откуда</label>
                            <input type="email" class="form-control" id="inputEmail4"
                                   placeholder="<?php echo $city['cityFrom'] ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Куда</label>
                            <input type="email" class="form-control" id="inputEmail4"
                                   placeholder="<?php echo $city['cityTo'] ?>" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Цена (₽) : </label>
                                <input type="text" class="form-control" id="inputEmail5"
                                       placeholder="<?php echo $city['price']  ?>" disabled>
                                <label for="inputEmail4">Время в пути (ч) :</label>
                                <input type="text" class="form-control" id="inputEmail5"
                                       placeholder="<?php echo $city['travelTime'] ?>" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Дата отправления</label>
                                <input type="text" class="form-control" id="inputEmail5"
                                       placeholder="<?php echo $city['dateFrom'] ?>" disabled>
                            </div>
                            <div class="form-group col-md-12">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12"">

                                <label for="inputEmail4">Время отправления по часовому поясу города
                                    вылета:</label>
                            <input type="text" class="form-control" id="inputEmail5"
                                   placeholder="<?php echo $city['timeFrom'] ?>" disabled>
                            <div class="delete">
                                <form method='post' action='/delete.php'>
                                    <input type=hidden name='id' value="<?= $city['id']?> ">
                                    <button type=submit> Удалить </button>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <?
            }
        }
        ?>
    </div>
</div>
</div>
</div>
</div>
</body>
