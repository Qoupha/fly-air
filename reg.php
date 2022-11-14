<?php
ob_start();
session_start();
require('./db.php');
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
if(empty($password) >= 8 || empty($password)){
    print_r("Минимальная длина пароля 8 символов");
    exit();
}
// || strlen($lastName) || strlen($email)
if(empty($firstName) || empty($lastName) || empty($email)){
    // print_r("Имя Фамилия или email не могут быть пустыми");
    print_r("12223");

}
$hash = password_hash($password, PASSWORD_DEFAULT);
$hashPassword = password_hash($password, PASSWORD_DEFAULT, array('cost' => 10));

$stmt = $pdo->prepare('SELECT * FROM users WHERE email=:email');
$stmt->execute(array('email'=>$email));
$users = $stmt->fetch();
if($_SESSION['auth'] == 1){
    header('Location: '. '/');
    exit();
}else{
    if($users['email']== $email){
        print_r("Пользователь уже зарегистрирован");
    }else{
        $stmt = $pdo->prepare('INSERT INTO `users`(`firstName`, `lastName`, `email`, `password`) VALUES (:firstName, :lastName, :email, :password )');
        $stmt->execute(array('lastName' => $lastName,'firstName'=>$firstName,'email' => $email, 'password' => $hashPassword,));
        $id = $pdo->lastInsertId();
        $_SESSION['id'] = $id;
        $_SESSION['auth'] = 1;
        header('Location: '. '/');
        exit();
    };
};
ob_end_flush();
?>
