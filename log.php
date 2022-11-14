<?php
ob_start();
session_start();
require('./db.php');
$email = $_POST['email'];
$password = $_POST['password'];
var_dump($password);

if($_SESSION['auth'] == 1){
    header('Location: '. '/');
    exit();
}else{
    
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email=:email');
    $stmt->execute(array('email'=>$email));
    $users = $stmt->fetch();
    $hash = password_hash($password, PASSWORD_DEFAULT);
    
    

    if($users['id'] != 0){
        if(password_verify($password, $users['password'])){
            $_SESSION['auth'] = 1;
            $_SESSION['id'] = $users['id'];
            header('Location: '. '/');
            exit();
        }else{
            print_r("Неверный логин или пароль");
        }
    }else{
        print_r("Пользователь не найден");
    };
}
ob_end_flush();
?>