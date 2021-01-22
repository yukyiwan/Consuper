<?php
session_start();
$personId = $_SESSION["personId"];
$orderId = $_POST["orderId"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$cCName = $_POST["cCName"];
$cCNum = $_POST["cCNum"];
$expMM = $_POST["expMM"];
$expYY = $_POST["expYY"];

include('../includes/db-config.php');

    $stmt = $pdo -> prepare ("UPDATE `order` 
    SET `address`='$address',`phone`='$phone',`cCName`='$cCName',`cCNum`= '$cCNum',`expMM`='$expMM',`expYY`='$expYY',`paid`=1
    WHERE `orderId`='$orderId';");
    $stmt->execute();


    $stmt = $pdo -> prepare ("INSERT INTO `order`(`orderId`, `address`, `phone`, `cCName`, `cCNum`, `expMM`, `expYY`, `paid`) VALUES (NULL,'','','','','','','')");
    $stmt->execute();

    $stmt = $pdo -> prepare ("SELECT * FROM `order` WHERE `orderId`= LAST_INSERT_ID()");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $orderId = $row["orderId"];


    $stmt = $pdo -> prepare ("INSERT INTO `order-person`(`orderId`, `personId`, `productId`, `quantity`) VALUES ('$orderId', '$personId','','');");
    $stmt->execute();        

    

?>