<?php
session_start();
if(isset($_SESSION["personId"])){
    
    $personId = $_SESSION["personId"];
    $like = $_POST["like"];
    $productId = $_GET["productId"];

    // echo($personId);
    // echo($like);
    // echo($productId);

    include('../includes/db-config.php');
    
    $stmt = $pdo->prepare("SELECT * FROM `person-product` WHERE (`personId`= $personId AND `productId`=$productId);");
    $stmt->execute();
    $entries=0;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
             $entries +=1;}
 
    if ($entries>1){
            $stmt = $pdo->prepare("DELETE FROM `person-product` WHERE (`personId`= $personId AND `productId`=$productId);");
            $stmt->execute();
            $stmt = $pdo->prepare("INSERT INTO `person-product` (`personId`, `productId`, `like`) VALUES ('$personId', '$productId', '0');");
            $stmt->execute();
            header("Location: product.php?productId=".$productId);
    }else if ($like === "empty"){
        $stmt = $pdo->prepare("INSERT INTO `person-product` (`personId`, `productId`, `like`) VALUES ('$personId', '$productId', '1');");
        $stmt->execute();
        header("Location: product.php?productId=".$productId);
    }else{
        $stmt = $pdo->prepare("UPDATE `person-product` SET `like`= $like WHERE (`personId`=$personId AND `productId`=$productId);");
        $stmt->execute();
        header("Location: product.php?productId=".$productId);
    }

    $stmt = $pdo->prepare("SELECT * FROM `person-product` WHERE  `productId`='$productId';");
    $stmt->execute();
    $likes=0;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $likes+=$row["like"];
    }
    $stmt = $pdo->prepare("UPDATE `product` SET `likes`= '$likes' WHERE `productId`='$productId';");
    $stmt->execute();
        
} 
else{
include('../includes/admin-else.php');
    
    
}
?>

