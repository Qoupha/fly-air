<?php
//var_dump($_POST);die;

if (isset($_POST["id"])) {
    try {
        $conn = new PDO("mysql:host=localhost;dbname=rzd", "root", "root");
        $sql = "DELETE FROM `offers` WHERE `offers`.`id` =:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([ ':id' => $_POST['id']]);
        $stmt->execute();
        header("Location: index.php");
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>