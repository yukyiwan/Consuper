<?php ?>
<header>

<a href="../index.php"><img src="../images/logo.png"/></a>
<section id="login" >
<?php if (isset($_SESSION["personId"])){ ?>
    <a href="../logout.php">Logout</a>
<?php } else{ ?>
<form action="../process-login.php" method="POST"> 
                <label for "email">Registered email</label>
                <input type="email" name="email" autofocus="" required/>
                <label id="password" for "password"> Password<label for "email">
                <input type="password" name="password" required/> 
                <input class="submit" type="submit" value = "Login"/>  
                <p> Don't have an account yet? <a href="../register.php">Register</a> </p>
                
</form>
<?php  } ?>
</section>
</header>