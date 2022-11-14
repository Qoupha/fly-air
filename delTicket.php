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
$id = $_GET['id'];
if($user['admin'] != 1){
    header('Location: '. '/');
    exit();
};
if(empty($id)){
    header('Location: '. '/tables.php');
    exit();
};
$stmt = $pdo->prepare('DELETE FROM `tickets` WHERE id=:id');
$stmt->execute(array('id'=>$id));
header('Location: '. '/tables.php');
