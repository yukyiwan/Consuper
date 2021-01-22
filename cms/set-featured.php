<?php

session_start();
if(isset($_SESSION["personId"]) && isset($_SESSION["userId"])) {
    if ($_SESSION["userId"]== "1"){
    $productId = $_GET["productId"]; ?>
    <!DOCTYPE html>
	<html>
    	<head>
    	    <title>Consuper CMS | Set Featured 1</title>
    	    <meta charset="utf-8">
            <meta name="description" content="Consuper CMS section to set featured product">
            <meta name="keywords" content="set featured product, reset featured product, make featured product">
            <?php include("../includes/main-author.php"); ?>
            <meta name="robots" content="noindex">
            <link rel="canonical" href="set-featured.php" />
            <?php include("../includes/2ndlevel-favicon.php"); ?>
            <link rel="stylesheet" href="../css/cms.css">
    	</head>
    	<body>    
        <?php include("../includes/2ndlevel-header.php"); ?>
            <main>
                <h1>Content Management System</h1>
                <h2>Set Featured Product 1</h2>
                <?php include('../includes/db-config.php');
                $stmt = $pdo->prepare("SELECT * FROM `product` WHERE `productId` = $productId");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC); ?>
                
                Do you want to set <?php echo($row["pBrand"]); ?> | <?php echo($row["pModel"]); ?> | <?php echo($row["pName"]); ?> as the first featured product on the landing page?
                <form action="process-set-featured.php" method="POST">
                	<input type="hidden" name="productId" value="<?php echo($row["productId"]);?>"></br>
                	<input type="submit" value="Set featured 1" />
                </form> </br>
                
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
<?php }
} 
else{
include('../includes/admin-else.php');}
?>

