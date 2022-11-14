<?
ob_start();
session_start();
if($_SESSION['auth'] == 1){
    header('Location: '. '/');
    exit();
}
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- Custom styles for this template-->
    <link href="css/bootstrap1.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32" color="white"><use xlink:href="#bootstrap"></use></svg>
        </a>
        <ul class="nav nav-pills">
        <li class="nav-item"><a href="/" class="nav-link active" aria-current="page">Главная</a></li>
        <li class="nav-item"><a href="/Whyme.php" class="nav-link active">Почему мы?</a></li>
        <li class="nav-item"><a href="/aboutus.php" class="nav-link active">О нас</a></li>
        <?php 
            if($_SESSION['auth'] == 1){
                ?>
                    <li class="nav-item"><a href="/lk.php" class="nav-link active">Кабинет</a></li>
                    <li class="nav-item"><a href="/logout.php" class="nav-link active">Выйти</a></li>
                <?
            }else{
                ?>
                <li class="nav-item"><a href="/register.php" class="nav-link active">Регистрация</a></li>
                <li class="nav-item"><a href="/login.php" class="nav-link active">Авторизация</a></li>
                <?
            }
        ?>
      </ul>
    </header>
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Создайте аккаунт</h1>
                            </div>
                            <form class="user" method='POST' action='reg.php'>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name ="firstName"type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input name ="lastName" type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input name ="email" type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name ="password"  type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-3">Регистрация</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>