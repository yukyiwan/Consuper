    <footer> 
    <nav> 
        <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="../about.php">About</a></li>
        <?php if (isset($_SESSION["personId"])){
            include("../includes/db-config.php");
            $stmt = $pdo->prepare("SELECT * FROM (`order-person` 
            INNER JOIN `order` ON `order-person`.`orderId` = `order`.`orderId`)
            WHERE `order-person`.`personId` ='$personId' AND `order`.`paid`=0;");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC); 
            ?>
        <li><a href="order.php?orderId=<?php echo($row["orderId"]);?>">Cart</a></li>
        <li><a href="../profiles/profile.php?personId=<?php echo($personId)?>">Profile</a></li>
        <?php }else {?>
        <li><a href="../login.php">Cart</a></li>
        <li><a href="../login.php">Profile</a></li> <?php }?>
        <li><a href="../contact.php">Contact</a></li> 
        <?php if (isset ($_SESSION["userId"])) {if($_SESSION["userId"]== "1"){ ?>
            <li><a style="color:#ebdb8c" href="../cms/cms-menu.php">CMS</a></li> 
                <?php  }} ?> 
        </ul>
    </nav>
   </footer>