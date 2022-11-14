<?php
ob_start();
session_start();
require('./db.php');
$stmt = $pdo->query('SELECT * FROM cities');
    $cities = $stmt->fetchAll(PDO::FETCH_ASSOC);
if($_SESSION['auth'] == 0){
    header('Location: '. '/');
    exit();
}
    $stmt = $pdo->prepare('SELECT admin FROM users where id = :id');
    $stmt->execute(array('id'=> $_SESSION['id']));
    $user = $stmt->fetch();
    if($user['admin'] != 1){
        header('Location: '. '/');
        exit();
    };
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="css//bootstrap1.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">

                <div class="sidebar-brand-text mx-3">Fly Admin</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item ">
                <a class="nav-link" href="/admin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Главная</span></a>
            </li>





            <li class="nav-item active">
                <a class="nav-link" href="/tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Таблица билетов</span></a>
            </li>


            <hr class="sidebar-divider d-none d-md-block">




        </ul>

       
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

              
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                  
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                 
                </nav>
               
                <div class="container-fluid">

                  
                    <h1 class="h3 mb-2 text-gray-800">Список билетов</h1>

            
                    <div class="card shadow mb-4">

                    <?php
                        $stmt_tickets = $pdo->query('SELECT * FROM tickets');
                        $tickets = $stmt_tickets->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Откуда</th>
                                            <th>Куда</th>
                                            <th>Дата отправления</th>
                                            <th>Цена</th>
                                            <th>Время в пути</th>
                                            <th>Кол-во</th>
                                            <th>Действие</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Откуда</th>
                                            <th>Куда</th>
                                            <th>Дата отправления</th>
                                            <th>Цена</th>
                                            <th>Время в пути</th>
                                            <th>Кол-во</th>
                                            <th>Действие</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $stmt_tickets = $pdo->query('SELECT tickets.id as ticketId, tickets.places, tickets.price, tickets.dateFrom, tickets.timeFrom, tickets.travelTime, city_to.name as cityTo , city_from.name as cityFrom FROM `tickets`
                                        INNER JOIN cities as city_to on tickets.to = city_to.id
                                        INNER JOIN cities as city_from on tickets.from = city_from.id
                                        ');
                                        $tickets = $stmt_tickets->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($tickets as $ticket) { ?>
                                                <tr>
                                                    <td><?php echo $ticket['cityFrom']?></td>
                                                    <td><?php echo $ticket['cityTo']?></td>
                                                    <td><?php echo $ticket['dateFrom']?></td>
                                                    <td><?php echo $ticket['price']?></td>
                                                    <td><?php echo $ticket['timeFrom']?></td>
                                                    <td><?php echo $ticket['places']?></td>
                                                    <td><a href="/delTicket.php ?id=<?php echo $ticket["ticketId"]?>">Удалить</a></td>
                                                </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <h1 class="h3 mb-2 text-gray-800">Таблица городов</h1>


                    <div class="card shadow mb-4">

                        <?php
                        $stmt_tickets = $pdo->query('SELECT * FROM tickets');
                        $tickets = $stmt_tickets->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Название</th>
                                        <th>Действие</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Название</th>
                                        <th>Действие</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $stmt_tickets = $pdo->query("SELECT * FROM `cities`");
                                    $tickets = $stmt_tickets->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($tickets as $ticket) { ?>
                                        <tr>
                                            <td><?php echo $ticket['name']?></td>
                                            <td><a href="/delCity.php?id=<?php echo $ticket["id"]?>">Удалить</a></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <h1 class="h3 mb-2 text-gray-800">Добавление билетов</h1>


                    <div class="card shadow mb-4">

                    <?php
                        $stmt_tickets = $pdo->query('SELECT * FROM tickets');
                        $tickets = $stmt_tickets->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                        <form method='GET' action='/addTicket.php' class="card-body">
                            <div class="table-responsive">
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
                                        <label class="input-group-text" for="inputGroupSelect01" >Куда</label>
                                    </div>
                                    <select name='to' class="custom-select" id="inputGroupSelect01">
                                            <?php foreach ($cities as $city) { ?>
                                                <option value="<?php echo $city['id']?>"><?php echo $city['name']?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                                <label for='dateFirst'>Дата отправления</label>
                                <input type="date" name='dateFirst'>
                                <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Цена</span>
                                    <input type="text" class="form-control"name='priceTicket'  placeholder='Цена' aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Время вылета по часову поясу города</span>
                                    <input type="text" class="form-control" name='timeFrom' placeholder='22:00:00' aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Время в пути(ч)</span>
                                    <input type="text" class="form-control" name='travelTime' placeholder='5' aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Кол-во билетов</span>
                                    <input type="text" class="form-control" name='countTicket' placeholder='Кол-во билетов' aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-3">Добавить билет</button>
                                </div>
                            </div>
                        </form>
                    </div>



                    <h1 class="h3 mb-2 text-gray-800">Добавление городов</h1>


                    <div class="card shadow mb-4">

                    <?php
                        $stmt_tickets = $pdo->query('SELECT * FROM tickets');
                        $tickets = $stmt_tickets->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                        <form method='GET' action='addCity.php' class="card-body">
                            <div class="table-responsive">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Название города</span>
                                    <input type="text" class="form-control" name='cityName' placeholder='Москва' aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-3">Добавить город</button>
                                </div>
                            </div>
                        </form>
                    </div>



                </div>

            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    </div>
                </div>
            </footer>

        </div>

    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>