<?php 
session_start();
?>
<!DOCTYPE html>
<html>
    <head> 
        <title>Consuper | Login </title>    
        <meta charset="utf-8">
        <meta name="description" content="Log in to Consuper to start green shopping today!">
        <meta name="keywords" content="login, log in, log on, sign in">
        <?php include("includes/main-author.php"); ?>
        <link rel="canonical" href="login.php" />
        <?php include("includes/favicon.php"); ?>  
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/form.css">
    </head>  
    
    <body>
        <?php include("includes/header.php"); ?>
        <main>
            
            <form id="form" action="process-login.php" method="POST"> 
            <h1>Login</h1>
                <label for "email">Registered email </label><br>
                <input type="email" name="email" autofocus="" required/><br>
                <label for "password">Password <label for "email"><br>
                <input type="password" name="password" required/><br>
                <input class="submit" type="submit" value = "Login"/>   
                <p style="text-align:center">Don't have an account yet? <a href="register.php">Register</a> </p>
            </form>
        </main>
        <?php include ("includes/footer.php"); ?>
    </body>
</html>