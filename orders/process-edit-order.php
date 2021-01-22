<?php
session_start();
$personId = $_SESSION["personId"];
$productId = $_POST["productId"];
$orderId = $_POST["orderId"];
$quantity = $_POST["quantity"];

include('../includes/db-config.php');

    $stmt = $pdo -> prepare ("UPDATE `order-person` SET `quantity`='$quantity' WHERE `orderId` = '$orderId' AND `personId`='$personId' AND `productId`='$productId';");
    $stmt->execute();

?>