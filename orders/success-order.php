<?php  
session_start();
if(isset($_SESSION["personId"]))
{$personId=$_SESSION["personId"];}
?>

<!DOCTYPE html> 
<html>
    <head>
        <!-- metadata -->
        <title>Consuper | About</title>
        <meta charset="utf-8">
        <meta name="description" content="Find out about who Consuper is and what we do.">
        <meta name="keywords" content="about, background, history, mission, vision, introduction">
        <?php include("../includes/main-author.php"); ?>
        <link rel="canonical" href="orders/success-order.php" />
        <?php include("../includes/2ndlevel-favicon.php"); ?>
        <link rel="stylesheet" href="../css/main.css">
           
    </head>
    
    <body>
        <?php include ("../includes/2ndlevel-header.php"); ?>
        <main style="text-align: center">
        <h1>YOU ARE SUPER!</h1>
        <p>Your order was placed successfully.</p>
        <p>For more details, check all the orders hosted under your profile page.</p>


        </main>
        <?php include("../includes/2ndlevel-footer.php"); ?>
    </body>
</html>