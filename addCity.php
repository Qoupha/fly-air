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
$cityName = $_GET['cityName'];
if($user['admin'] != 1){
    header('Location: '. '/');
    exit();
};
if(empty($cityName)){
//    header('Location: '. '/tables.php');
    exit();
};
$stmt = $pdo->prepare('INSERT INTO `cities`(`name`) VALUES (:name)');
$stmt->execute(array('name'=>$cityName));
header('Location: '. '/tables.php');
?>