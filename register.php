<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head> 
    <title>Consuper | Registration </title>    
    <meta charset="utf-8">
    <meta name="description" content="Become an Consuper member today to shop green and save the planet earth!">
    <meta name="keywords" content="register, registration, sign up">
    <?php include("includes/main-author.php"); ?>
    <link rel="canonical" href="register.php" />
    <?php include("includes/favicon.php"); ?>  
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/form.css">
</head>  

<body>
    <?php include("includes/header.php"); ?>
    <main>
        
        <form id="form" action = "process-register.php" method="POST"> 
        <h1>Registration</h1>
        <p>Become an Consuper member today to shop green and save the planet earth!  </p>
                <label for "fName"> First Name </label></br>
                <input type = "text" name="fName" placeholder="Neil" autofocus="" required/> </br>
                <label for "lName"> Last Name </label></br>
                <input type = "text" name="lName" placeholder="Armstrong"  required/></br>
                <label for "email"> Email </label></br>
                <input type = "email" name = "email" placeholder="narmtrong@imm.com" required /> </br>
                <label for "password"> Password </label></br>
                <input type = "password"  name = "password" required/> </br>

            <input type="hidden" name="timeStamp" value="<?php echo date("Y-m-d h:i:s", time()); ?>" />
            <input type="submit" value="Register"/>
            <p style="text-align:center">Already have an account? <a href="login.php">Login</a> </p>
        </form>
    </main>
    <?php include ("includes/footer.php"); ?>
</body>
</html>

