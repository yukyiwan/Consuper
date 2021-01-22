<?php
session_start();
if($_SESSION["userId"]== "1"){

$productId = $_POST["productId"];

include('../includes/db-config.php');

$stmt = $pdo -> prepare ("UPDATE `product` SET `featured2`=0 
    WHERE `product`.`featured2` = 1;");
$stmt ->execute();	

$stmt = $pdo -> prepare ("UPDATE `product` SET `featured2` = 1 WHERE `product`.`productId` = '$productId';");
$stmt->execute();
header("Location: manage-products.php");

} 
else{
include('../includes/admin-else.php');}
?>
