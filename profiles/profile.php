<?php
    session_start();
    $personId = $_SESSION["personId"];
    include('../includes/db-config.php');
    $stmt = $pdo->prepare("SELECT * FROM `person` WHERE `personId`='$personId'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC); 
?>

<!DOCTYPE html> 
<html>
    <head>
        <title>Consuper | <?php echo($row["fName"]);?>'s Profile </title>
        <meta charset="utf-8">
        <meta name="description" content="Consuper | <?php echo($row["fName"]);?>'s Profile">
        <meta name="keywords" content="shopper profile, <?php echo($row["fName"]);?> <?php echo($row["lName"]);?>">
        <link rel="canonical" href="profiles/profile.php?personId=<?php echo($personId)?>">
        <?php include("../includes/2ndlevel-favicon.php"); ?>
        <link rel="stylesheet" href="../css/main.css">
    </head>
    <body>
        <?php include("../includes/2ndlevel-header.php"); ?>
        <main>
            <h1><?php echo($row["fName"]);?>'s Profile</h1>
            <section class="splash">
                
                <p>Name: <?php echo($row["fName"]);?> <?php echo($row["lName"]);?></p>
                <p>Email: <?php echo($row["email"]);?></p>

            </section>
            
            <h2>All the orders</h2>

            <section class="splash">
                <ol>

                <?php 
                    $stmt = $pdo->prepare("SELECT * FROM (`order`
                                INNER JOIN `order-person` ON `order-person`.`orderId` = `order`.`orderId`)
                                WHERE `order-person`.`personId`='$personId' AND `order`.`paid` = 1;");
                    $stmt->execute();
                    $orderId=0;
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ 
                        if ($orderId !== $row["orderId"]) {

                ?>

                    <li><a href="../orders/orders.php?orderId=<?php echo($row["orderId"]);?>">Order on <?php echo $row["paidTime"]?></a></li>

                <?php $orderId = $row["orderId"]; } } ?>
                </ol>
            </section>
                
        </main>
        <?php include("../includes/2ndlevel-footer-profile.php"); //to be replaced by order specific footer?>
    </body>
</html>

