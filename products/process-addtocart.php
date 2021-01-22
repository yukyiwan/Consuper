<?php
session_start();
$personId = $_SESSION["personId"];
$productId = $_POST["productId"];
$quantity = $_POST["quantity"];

include('../includes/db-config.php');
$pDEntries1=0;
$pDEntries=0;

$stmt = $pdo -> prepare ("SELECT * FROM  (`order-person` 
INNER JOIN `order` ON `order-person`.`orderId` = `order`.`orderId`)
WHERE `order-person`.`personId`='$personId' AND `order-person`.`productId`='$productId' AND `order`.`paid`=0;");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $quantity=$quantity+$row["quantity"];    
    $pDEntries1 +=1;}

$stmt = $pdo -> prepare ("SELECT * FROM  (`order-person` 
INNER JOIN `order` ON `order-person`.`orderId` = `order`.`orderId`)
WHERE `order-person`.`personId`='$personId' AND `order`.`paid`=0;");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $pDEntries +=1;}

if ($pDEntries1>0) {
    $stmt = $pdo -> prepare ("UPDATE `order-person` SET `quantity`='$quantity' WHERE `personId`='$personId' AND `productId`='$productId';");
    $stmt->execute();

} else if ($pDEntries>0) {
    $stmt = $pdo -> prepare ("SELECT * FROM  (`order-person` 
    INNER JOIN `order` ON `order-person`.`orderId` = `order`.`orderId`)
    WHERE `order-person`.`personId`='$personId' AND `order`.`paid`=0;");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $orderId = $row["orderId"];

    $stmt = $pdo -> prepare ("INSERT INTO `order-person`(`orderId`, `personId`, `productId`, `quantity`) VALUES ('$orderId', '$personId','$productId','$quantity');");
    $stmt->execute();

}else {
    $stmt = $pdo -> prepare ("INSERT INTO `order`(`orderId`, `address`, `phone`, `cCName`, `cCNum`, `expMM`, `expYY`, `paid`) VALUES (NULL,'','','','','','','')");
    $stmt->execute();

    $stmt = $pdo -> prepare ("SELECT * FROM `order` WHERE `orderId`= LAST_INSERT_ID()");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $orderId = $row["orderId"];


    $stmt = $pdo -> prepare ("INSERT INTO `order-person`(`orderId`, `personId`, `productId`, `quantity`) VALUES ('$orderId', '$personId','$productId','$quantity');");
    $stmt->execute(); 
}


?>