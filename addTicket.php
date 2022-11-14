<?php
session_start();
require('./db.php');
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
$from = $_GET['from'];
$to = $_GET['to'];
$dateFirst = $_GET['dateFirst'];
$travelTime = $_GET['travelTime'];
$countTicket = $_GET['countTicket'];
$priceTicket = $_GET['priceTicket'];
$timeFrom = $_GET['timeFrom'];

$stmt = $pdo->prepare('INSERT INTO `tickets`(`from`, `to`, `price`, `dateFrom`, `timeFrom`, `travelTime`, `places`) VALUES (:from, :to, :price, :dateFrom, :timeFrom, :travelTime, :places)');
$stmt->execute(array('from'=>$from,'to' => $to,'price'=> $priceTicket, 'dateFrom' => $dateFirst,'timeFrom' => $timeFrom, 'travelTime' => $travelTime, 'places'=> $countTicket));
header('Location: '. '/tables.php');
?>