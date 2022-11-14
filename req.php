<?php
session_start();
 require('./db.php');
 $ticket_id = $_POST['ticket_id'];
 $name = $_POST['name'];
 $phone = $_POST['phone'];
 if(strlen($ticket_id = $_POST['ticket_id']) === 0 || strlen($name = $_POST['name']) === 0 || strlen($phone = $_POST['phone']) === 0){
   print_r('Вы не заполнили все поля.');
 }else{
  $stmt = $pdo->prepare('select places from tickets where id= :ticketId');
  $stmt->execute(array('ticketId' => $ticket_id));
  $res = $stmt->fetch(PDO::FETCH_ASSOC);
  if($res['places'] == 0){
    setcookie("finish", "2");
    header('Location: /');
    exit();
  }else{
  $stmt = $pdo->prepare('INSERT INTO `offers`(`name`, `user_id`, `ticked_id`, `phone`) VALUES (:name, :user_id, :ticketId, :phone )');
  $stmt->execute(array('name'=>$name,'user_id' => $_SESSION['id'],'ticketId' => $ticket_id, 'phone' => $phone));
  $stmt = $pdo->prepare('UPDATE `tickets` SET `places`=places-1 WHERE tickets.id = :ticketId');
  $stmt->execute(array('ticketId' => $ticket_id));
  
  setcookie("finish", "1");
  header('Location: /');
  exit();
  };
}
?>