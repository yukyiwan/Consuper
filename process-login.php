<?php
session_start();

$email = $_POST["email"];
$password = $_POST["password"];

include('includes/db-config.php');

// echo ("$email");
// echo ("$password");

$stmt = $pdo -> prepare ("SELECT * FROM `person` WHERE `email` = '$email' AND `password` = '$password'");

$stmt -> execute();

$row = $stmt ->fetch(PDO::FETCH_ASSOC);


if($row){
    $_SESSION["personId"] = $row["personId"];
    $_SESSION["userId"] = $row["userId"];    
    header ("Location: index.php");
}

else{
    ?>
<!DOCTYPE html>
<html>
    <head> 
        <title>INN | Unsuccessful login! </title>
       <meta charset="utf-8">
        <meta name="description" content="Login processing page">
        <meta name="keywords" content="login processing, login handling">
        <?php include("includes/main-author.php"); ?>
        <meta name="robots" content="noindex">
        <link rel="canonical" href="process-login.php" />
        <?php include("includes/favicon.php"); ?>
        <link rel="stylesheet" href="css/main.css">
    </head>  
    
    <body>
        <?php include("includes/header.php"); ?>   
        <main>
            <h1>Incorrect username/password. Please login again! </h1>
        </main>
        <?php include("includes/footer.php"); ?>
    </body>
</html>

<?php } 

?>
