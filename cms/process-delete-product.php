<?php
session_start();
if($_SESSION["userId"]== "1"){

$productId = $_POST["productId"];

include('../includes/db-config.php');

$stmt = $pdo->prepare("DELETE FROM `product`
	WHERE `product`.`productId` = $productId;");

$stmt->execute();

header("Location: manage-products.php");

} 
else{
include('../includes/admin-else.php');}
?>
