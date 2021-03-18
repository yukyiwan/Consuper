<?php 
session_start();
if (isset($_SESSION["personId"])){
$personId = $_SESSION["personId"];}
$productId = $_GET["productId"];
include('../includes/db-config.php');
$stmt = $pdo->prepare("SELECT * FROM `product` WHERE `productId`= $productId;");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html> 
<html>
        <head>
            <title> Consuper | <?php echo($row["pBrand"]);?> <?php echo($row["pName"]);?></title>
            <meta charset="utf-8">
            <meta name="description" content="<?php echo($row["preview"]);?>">
            <meta name="keywords" content="<?php echo($row["pName"]);?>, <?php echo($row["pBrand"]);?>, <?php echo($row["pModel"]);?>">
            <?php include("../includes/main-author.php"); ?>
            <link rel="canonical" href="product.php?productId=<?php echo($row["productId"]); ?>" />
            <?php include("../includes/2ndlevel-favicon.php"); ?>
            <link rel="stylesheet" href="../css/main.css">
            <link rel="stylesheet" href="../css/product.css">
        
        </head>
        <body>
            <?php include("../includes/2ndlevel-header.php"); ?>
            <main> <?php 
            include('../includes/db-config.php');
                $stmt = $pdo->prepare("SELECT * FROM `product` WHERE `productId`= $productId;");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
               
                $categoryId = $row["categoryId"];
                $categoryName = $row["categoryName"];
                $subCategoryId = $row["subCategoryId"];
                $pBrand = $row["pBrand"];
                $pModel = $row["pModel"];
                $pName = $row["pName"];
                $pCapacity = $row["pCapacity"];
                $pColor = $row["pColor"];
                $price = $row["price"];
                $cPrice1 = $row["cPrice1"];
                $cPrice2 = $row["cPrice2"];
                $cPrice3 = $row["cPrice3"];
                $cPrice4 = $row["cPrice4"];
                $preview = $row["preview"];
                $description = $row["description"];
                $productId = $row["productId"];?>
        
               
            <ul class="breadcrumb">
                <li><a href="../index.php">Home</a></li>
                <?php $stmt = $pdo->prepare("SELECT * FROM (`product`
                INNER JOIN `category` ON `product`.`categoryId` = `category`.`categoryId`)
                WHERE `category`.`categoryId` = '$categoryId';");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC); ?>
                <li><a href="../products/category.php?categoryId=<?php echo($row["categoryId"]); ?>"><?php echo ($row["categoryName"]); ?></a></li>
                <?php $stmt = $pdo->prepare("SELECT * FROM (`product`
                INNER JOIN `subcategory` ON `product`.`subCategoryId` = `subcategory`.`subCategoryId`)
                WHERE `subcategory`.`subCategoryId` = '$subCategoryId';");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC); ?>
                <li><a href="../products/subcategory.php?subCategoryId=<?php echo($subCategoryId); ?>"><?php echo($row["subCategoryName"]); ?></a></li>
                <li><a href="../products/product.php?productId=<?php echo($productId); ?>"><?php echo($pBrand); ?> | <?php echo($pModel); ?> | <?php echo($pName); ?></a></li>
            </ul>             


                
                    <?php $stmt = $pdo->prepare("SELECT * FROM `person-product` WHERE (`productId`=$productId AND `like`= 1);");
                    $stmt->execute();
                    $totalLikes=0;
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            $totalLikes +=1;
                    }

                    if(isset($_SESSION["personId"])){
                    $stmt = $pdo->prepare("SELECT * FROM `person-product` WHERE (`personId`= $personId AND `productId`=$productId);");
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    if (isset($row["like"]) && $row["like"]==="1"){
                        ?><form action="process-like.php?productId=<?php echo($productId); ?>" method="POST">
                        <input type = "hidden" name = "productId" value = "$productId">
                        <input type = "hidden" name = "like" value = "0">
                        <input type ="submit" value = "unlike"/>
                    
                    <?php }else if(isset($row["like"]) && $row["like"]==="0"){
                        ?><form action="process-like.php?productId=<?php echo($productId); ?>" method="POST">
                        <input type = "hidden" name = "productId" value = "$productId">
                        <input type = "hidden" name = "like" value = "1">
                        <input type ="submit" value = "like"/>
                    
                    <?php }else{
                        ?><form action="process-like.php?productId=<?php echo($productId); ?>" method="POST">
                        <input type = "hidden" name = "productId" value = "$productId">
                        <input type = "hidden" name = "like" value = "empty">
                        <input type="submit" value = "like"/>
                        
                    <?php }
                        }
                        echo($totalLikes." people like this"); 

                    $stmt = $pdo->prepare("SELECT * FROM ((`product`
                            INNER JOIN `category` ON `product`.`categoryId` = `category`.`categoryId`)
                            INNER JOIN `subCategory` ON `product`.`subCategoryId` = `subcategory`.`subCategoryId`)
                            WHERE `productId` = '$productId'");
                            $stmt->execute();
                            $row = $stmt->fetch(PDO::FETCH_ASSOC); 
                    ?> </form>
                    <section id="product">
                    <?php $stmt = $pdo->prepare("SELECT * FROM `product` WHERE `productId`= $productId;");
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);?>
                    <section><img src="../products/img/<?php echo ($row["iFileName"]); ?>" /></section>
                    <section>
                    <h2><?php echo($pBrand); ?> | <?php echo($pModel); ?> | <?php echo($pName); ?></h2>
                    <p>Capacity: <?php echo($pCapacity); ?></p>
                    <p>Color: <?php echo($pColor); ?></p>     
                    <p>Price: $<?php echo($price); ?></p>                   
                    <h3>Carbon price: </h3>                   
                    <p>Production: $<?php echo($cPrice1); ?></p>                   
                    <p>Logistics: $<?php echo($cPrice2); ?></p>
                    <p>Recycling: $<?php echo($cPrice3); ?></p>
                    <p>Non-recyclable waste treatment: $<?php echo($cPrice4); ?></p>
                    <p>Full description: </p> 
                    <p><?php echo($description); ?></p> <br>
                

                    <form class="aForm" action ="process.php" method="POST">
                    <input type="number" name= "quantity" value=1 required/> 
                    <input type="hidden" name= "productId" value="<?php echo($productId); ?>"> 
                    <input type= "submit" value="Add to cart"> 
                    </form>
                    </section>
                </section>

                <?php ?>
            
        </main>
        <?php include("../includes/2ndlevel-footer.php"); ?>
    </body>
    <script src="addtocart.js"> </script>

</html>
