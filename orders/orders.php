<?php
session_start();
if (isset($_SESSION["personId"]))
{$personId = $_SESSION["personId"];}
$orderId= $_GET["orderId"];
include('../includes/db-config.php');
$stmt = $pdo->prepare("SELECT * FROM ((`order-person`
INNER JOIN `person` ON `order-person`.`personId` = `person`.`personId`)
INNER JOIN `order` ON `order-person`.`orderId` = `order`.`orderId`)
WHERE `order`.`orderId` = '$orderId' AND `order`.`paid` = 1;");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC); 
?>

<!DOCTYPE html> 
<html>
    <head>
        <title>Consuper | Order on <?php echo($row["paidTime"]); ?> </title>
        <meta charset="utf-8">
        <meta name="description" content="Consuper Shopping Cart">
        <meta name="keywords" content="shopping cart">
        <link rel="canonical" href="orders/orders.php?orderId=<?php echo($row["orderId"]); ?>">
        <?php include("../includes/2ndlevel-favicon.php"); ?>
        <link rel="stylesheet" href="../css/main.css">
    </head>
    <body>
        <?php include("../includes/2ndlevel-header.php"); ?>
        <main>
            <h1><?php echo($row["fName"]); ?>'s order on <?php echo($row["paidTime"]); ?></h1>
            <section  id="check"> 
                
                <?php $stmt = $pdo->prepare("SELECT * FROM ((`order-person`
                        INNER JOIN `product` ON `order-person`.`productId` = `product`.`productId`)
                        INNER JOIN `order` ON `order-person`.`orderId` = `order`.`orderId`)
                        WHERE `order`.`orderId` = '$orderId' AND `order`.`paid` = 1;");
                $stmt->execute();
                $tPrice = 0;
                $tCPTotal = 0;
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    if($row["quantity"]==0){}
                    else{
                    $cPTotal = $row["cPrice1"] + $row["cPrice2"] + $row["cPrice3"] + $row["cPrice4"];
                    $tPrice += $row["quantity"]*$row["price"];
                    $tCPTotal += $row["quantity"]*$cPTotal;   ?>
                    <section>
                    <a href="../products/product.php?productId=<?php echo($row["productId"]); ?>"><img src="../products/img/<?php echo ($row["iFileName"]); ?>" /></a>
                    <h2><a href="../products/product.php?productId=<?php echo($row["productId"]); ?>"><?php echo($row["pBrand"]); ?> | <?php echo($row["pModel"]); ?> | <?php echo($row["pName"]); ?></a></h2>
                    <p><?php echo($row["pCapacity"]); ?> | <?php echo($row["pColor"]); ?>  </p>   
                    <p>Quantity: <?php echo($row["quantity"]); ?></p>
                    <span>$<?php echo($row["price"]); ?> | </span>                   
                    <span  class="green">CO$<?php echo($cPTotal); ?></span> </div></br>  
                      
                    </section>

                <?php } } ?>
           

            <section class="checkout" style="background-color:#ebdb8c">
                <h3>TOTAL</h3>
                <h3><span>$<?php echo($tPrice); ?> | <span class="green">CO$<?php echo($tCPTotal); ?></span> </span></h3> </br>
            </section>
            </section>


        </main>
        <?php include("../includes/2ndlevel-footer-cart.php"); //to be replaced by order specific footer?>
    </body>
</html>

