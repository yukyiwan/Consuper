<?php

session_start();
if(isset($_SESSION["personId"]) && isset($_SESSION["userId"])) {
if ($_SESSION["userId"]== "1"){

    $productId = $_GET["productId"];
    ?>
    
    <!DOCTYPE html>
    <html>
    	<head>
    	    <title>Consuper CMS | Delete product</title>
        	<meta charset="utf-8">
            <meta name="description" content="Consuper CMS Consuper CMS section to delete a product">
            <meta name="keywords" content="delete product">
            <?php include("../includes/main-author.php"); ?>
            <meta name="robots" content="noindex">
            <link rel="canonical" href="process-register.php" />
            <?php include("../includes/2ndlevel-favicon.php"); ?>
            <link rel="stylesheet" href="../css/cms.css">
    	</head>
    	<body>    
            <?php include("../includes/2ndlevel-header.php"); ?>
            <main>
            	<h1>Content Management System</h1>
            	<h2>Delete product</h2>
                <?php
        	    include('../includes/db-config.php');
                $stmt = $pdo->prepare("SELECT * FROM `product` WHERE `productId` = $productId");
                $stmt->execute(); 
                $row = $stmt->fetch(PDO::FETCH_ASSOC);?>
                Do you really want to delete <?php echo($row["pBrand"]); ?> | <?php echo($row["pModel"]); ?> | <?php echo($row["pName"]); ?>?
                <form action="process-delete-product.php" method="POST">
                	<input type="hidden" name="productId" value="<?php echo($row["productId"]);?>">
                	<input type="submit" value="CONFIRM DELETION" />
                </form></br>
                <section>
                    <img src="../products/img/<?php echo ($row["iFileName"]); ?>" height="100"/>
                    <h2><?php echo($row["pBrand"]); ?> | <?php echo($row["pModel"]); ?> | <?php echo($row["pName"]); ?></h2>
                    <p>Capacity: <?php echo($row["pCapacity"]); ?></p>
                    <p>Color: <?php echo($row["pColor"]); ?></p>
                    <p>Preview: <?php echo($row["preview"]); ?></p>
                    <p>Full description: <?php echo($row["description"]); ?></p>      
                    <p>Price: $<?php echo($row["description"]); ?></p>                   
                    <h3>Carbon price: </h3>                   
                    <p>Production: $<?php echo($row["cPrice1"]); ?></p>                   
                    <p>Logistics: $<?php echo($row["cPrice2"]); ?></p>
                    <p>Recycling: $<?php echo($row["cPrice3"]); ?></p>
                    <p>Non-recyclable waste treatment: $<?php echo($row["cPrice4"]); ?></p>




           	    </section>
        <?php include("../includes/cms-footer.php"); ?>
        </main>
        <?php include("../includes/2ndlevel-footer.php"); ?>
    	</body>
    </html>	
    
<?php 
} 
}
else{
include('../includes/admin-else.php');}
?>
