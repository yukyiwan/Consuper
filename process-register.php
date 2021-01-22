<?php
session_start();
    $fName = $_POST["fName"];
        $aFName = addslashes ($fName);
    $lName = $_POST["lName"]; 
        $aLName = addslashes ($lName);
    $email = $_POST["email"];
    $password = $_POST["password"];
    $timeStamp= $_POST["timeStamp"];
    $userId= 2;
    
    include('includes/db-config.php');
    
    $stmt = $pdo->prepare("SELECT * FROM `person` WHERE (`email`= '$email');");
    $stmt->execute();
    $entries=0;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
             $entries +=1;}
    
    
    if ($entries==0){
        $stmt = $pdo->prepare ("INSERT INTO `person` (`personId`, `fName`, `lName`, `email`, `password`, `userId`, `timeStamp`) VALUES (NULL, '$aFName', '$aLName', '$email', '$password', '$userId', '$timeStamp');");
        $stmt->execute();

        $stmt = $pdo->prepare ("SELECT * FROM `person` WHERE `personId`= LAST_INSERT_ID()");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $personId=$row["personId"];

        $stmt = $pdo -> prepare ("INSERT INTO `order`(`orderId`, `address`, `phone`, `cCName`, `cCNum`, `expMM`, `expYY`, `paid`) VALUES (NULL,'','','','','','','')");
        $stmt->execute();

        $stmt = $pdo -> prepare ("SELECT * FROM `order` WHERE `orderId`= LAST_INSERT_ID()");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $orderId = $row["orderId"];


        $stmt = $pdo -> prepare ("INSERT INTO `order-person`(`orderId`, `personId`, `productId`, `quantity`) VALUES ('$orderId', '$personId','','');");
        $stmt->execute(); 
        
        header ("Location: login.php");

}else{
            ?> <!DOCTYPE html>
            <!DOCTYPE html>
                <html>
                    <head> 
                        <title>Consuper | Email already registered! </title>
                        <meta charset="utf-8">
                        <meta name="description" content="Logout from Consuper">
                        <meta name="keywords" content="logout, log out, sign out">
                        <?php include("includes/main-author.php"); ?>
                        <meta name="robots" content="noindex">
                        <link rel="canonical" href="logout.php" />
                        <?php include("includes/favicon.php"); ?>
                        <link rel="stylesheet" href="css/main.css">
                    </head>  
                    
                    <body>
                        <header>
                        <a href="index.php"><img src="images/logo.png" height="60vh"/></a>    
                    </header>
                        <main>
                                <h1 style="text-align: center">This email has already been registered! </h1>
                        </main>

                    <footer> 
                    <nav>
                        <ul>        
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="register.php">Register</a></li>
                        <li><a href="login.php">Login</a></li> 
                        <li><a href="contact.php">Contact</a></li> 
                    </ul>
                    </nav>
                </footer>
                    </body>
                </html>
        <?php }
    
        
    ?>
    
        