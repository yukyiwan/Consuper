<?php
    session_start();
    $personId = $_SESSION["personId"];
    $orderId= $_GET["orderId"];
    include('../includes/db-config.php');
    $stmt = $pdo->prepare("SELECT * FROM ((`order-person`
    INNER JOIN `person` ON `order-person`.`personId` = `person`.`personId`)
    INNER JOIN `order` ON `order-person`.`orderId` = `order`.`orderId`)
    WHERE `order`.`orderId` = '$orderId' AND `order`.`paid` = 0;");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC); 
?>

<!DOCTYPE html> 
<html>
    <head>
        <title>Consuper | Checkout </title>
        <meta charset="utf-8">
        <meta name="description" content="Checkout">
        <meta name="keywords" content="checkout">
        <link rel="canonical" href="orders/checkout.php?orderId=<?php echo($row["orderId"]); ?>">
        <?php include("../includes/2ndlevel-favicon.php"); ?>
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/form.css">
        
    </head>
    <body>
        <?php include("../includes/2ndlevel-header.php"); ?>
        <main>
            <section>
               
                <form id="checkout" action ="process.php" method="POST">
                     <h1>Checkout</h1>
                     <label for "address">Address </label>
                    <input type="text" name= "address" required/> <br>
                    <label for "phone">Phone number </label>
                    <input type="number" name= "phone" maxlength="20" required/> <br>
                    <label for "cCName">Name on Credit Card </label>
                    <input type="text" name= "cCName" required/> <br>
                    <label for "cCNum">Credit Card Number </label>
                    <input type="number" name= "cCNum" maxlength="15" required/> <br>
                    <label>Expiry Date </label>
                    <input type="number" name= "expMM" placeholder="MM" maxlength="2" required/> 
                    <input type="number" name= "expYY" placeholder="YYYY" maxlength="4" required/> 

                
            <?php $stmt = $pdo->prepare("SELECT * FROM ((`order-person`
                        INNER JOIN `product` ON `order-person`.`productId` = `product`.`productId`)
                        INNER JOIN `order` ON `order-person`.`orderId` = `order`.`orderId`)
                        WHERE `order`.`orderId` = '$orderId' AND `order`.`paid` = 0;");
                $stmt->execute();
                $tPrice = 0;
                $tCPTotal = 0;
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    if($row["productId"]!==0){
                    $cPTotal = $row["cPrice1"] + $row["cPrice2"] + $row["cPrice3"] + $row["cPrice4"];
                    $tPrice += $row["quantity"]*$row["price"];
                    $tCPTotal += $row["quantity"]*$cPTotal;   ?>
                <?php } }?>

            <section id="hide" class="checkout">
                <h3><span>$<?php echo($tPrice); ?> | <span class="green">CO$<?php echo($tCPTotal); ?></span> </span></h3> </br>

                    <input type="hidden" name= "personId" value="<?php echo($personId); ?>">
                    <input type="hidden" name= "orderId" value="<?php echo($orderId); ?>"> 
                    <input type= "submit" value="CHECKOUT"> 
                </form>
            </section>


        </main>
        <?php include("../includes/2ndlevel-footer-cart.php"); //to be replaced by order specific footer?>
    </body>
    <!-- <script src="shipping.js"></script> -->
    <script src="checkout.js"></script>
</html>