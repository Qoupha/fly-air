<?php
session_start();
setcookie("finish");
    require('./db.php');
    $stmt = $pdo->query('SELECT * FROM cities');
    $cities = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel=”icon” href=”/favicon.ico” type=”image/x-icon”>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Fly Air</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      </a>
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="/" class="nav-link active" aria-current="page">Главная</a></li>
        <li class="nav-item"><a href="/Whyme.php" class="nav-link">Почему мы?</a></li>
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
    <div class="header">
        <div class="header__search">
            <div class="header__search__left">
                <span>Fly Air</span> Сайт для покупки билетов онлайн
            </div>
            <div class="header__search__right">
                <form method='GET' action='/search.php' class="header__search__right-body">
                    <h1>Поиск билетов</h1>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Откуда</label>
                        </div>
                        <select name='from' class="custom-select" id="inputGroupSelect01">
                                <?php foreach ($cities as $city) { ?>
                                    <option value="<?php echo $city['id']?>"><?php echo $city['name']?></option>
                                <?php } ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Куда</label>
                        </div>
                        <select name='to' class="custom-select" id="inputGroupSelect01">
                                <?php foreach ($cities as $city) { ?>
                                    <option value="<?php echo $city['id']?>"><?php echo $city['name']?></option>
                                <?php } ?>
                        </select>
                    </div>

                    <input type="date" name='dateFirst'>
                    <input type="submit" value="Поиск">
                </form>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="section__contact_us">
            <h3>Contact Us</h3>
            <div class="section__contact_us-container">
                <div class="section__contact_us-container__left">
                    <h5>Напишите нам!</h5>
                    <div class="section__contact_us-container__left-inputs">
                        <input type="text" placeholder="Имя">
                        <input type="text" placeholder="Фамилия">
                    </div>
                    <textarea placeholder='Сообщение'></textarea>
                    <input type="button" value="Отправить">
                </div>
                <div class="section__contact_us-container__right">
                    <div class="section__contact_us-container__right-line">
                        <p>Адрес:</p>
                        <p>Г.Челябинск,ул.Курчатова,д.7</p>
                    </div>
                    <div class="section__contact_us-container__right-line">
                        <p>Телефон:</p>
                        <a href='tel:88005553535'>8 800 555 35 35</a>
                    </div>
                    <div class="section__contact_us-container__right-line">
                        <p>Email:</p>
                        <a href="mailto:mail@mail.ru">mak3d2002@mail.ru</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>© 2022 custom. All rights reserved</p>
    </div>
    <?php 
        if($_COOKIE['finish'] == 1){
    ?>
    <div id='modal_buy'class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Покупка билета.</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Поздравляем! Вы успешно приобрели билет.</p>
        </div>
        <div class="modal-footer">
            <button id='myInput' type="button" class="btn btn-primary" data-dismiss="modal">Принять</button>
        </div>
    </div>
  </div>
</div>
<?php 
} 
?>
 <?php 
        if($_COOKIE['finish'] == 2){
    ?>
    <div id='modal_error'class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Покупка билета.</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Приносим извинения билеты закончились.</p>
        </div>
        <div class="modal-footer">
            <button id='myInput' type="button" class="btn btn-primary" data-dismiss="modal">Принять</button>
        </div>
    </div>
  </div>
</div>
<?php 
} 
?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $('#modal_buy').modal('show')
        $('#modal_error').modal('show')
    </script>
</body>

</html>