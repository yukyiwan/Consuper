<?php 
    session_start();  
 	session_destroy();
 	
?>
<!DOCTYPE html>
<html>
    <head> 
        <title>Consuper | Successfully logout! </title>
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
        <a href="index.php"><img src="images/logo.png"/></a>    
    </header>
        <main>
                <h1 style="text-align: center">Successfully logout! </h1>
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