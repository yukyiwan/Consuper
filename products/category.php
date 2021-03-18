<?php
    session_start();
    if (isset($_SESSION["personId"])) {
    $personId = $_SESSION["personId"];}
    $categoryId = $_GET["categoryId"];
    include('../includes/db-config.php');
    $stmt = $pdo->prepare("SELECT * FROM (`product`
    INNER JOIN `category` ON `product`.`categoryId` = `category`.`categoryId`)
    WHERE `category`.`categoryId` = '$categoryId';");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC); 
?>

<!DOCTYPE html> 
<html>
    <head>
        <title>Consuper | <?php echo($row["categoryName"]);?> </title>
        <meta charset="utf-8">
        <meta name="description" content="Full collection of <?php echo($row["categoryName"]);?> products hosted by Consuper">
        <meta name="keywords" content="<?php echo($row["categoryName"]);?>">
        <link rel="canonical" href="products/category.php?categoryId=<?php echo($categoryId); ?>">
        <?php include("../includes/2ndlevel-favicon.php"); ?>
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/product.css">
    </head>
    <body>
        <?php include("../includes/2ndlevel-header.php"); ?>
        <main>
            <ul class="breadcrumb">
                <li><a href="../index.php">Home</a></li>
                <li><a href="category.php?categoryId=<?php echo($row["categoryId"]); ?>"><?php echo ($row["categoryName"]); ?></a></li>
            </ul>        
                 
            <h1><?php echo($row["categoryName"]);?></h1>

            <section id="category">
               
                <?php 
                $stmt = $pdo->prepare("SELECT * FROM `subcategory` WHERE `categoryId` = '$categoryId';");
                $stmt->execute();
                $count =1;
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $count++;}

                for ($i=1; $i<$count; $i++) { ?>
                    <section class="subcat">                       
                        <?php $stmt = $pdo->prepare("SELECT * FROM (`product` 
                        INNER JOIN `subcategory` ON `product`.`subCategoryId` = `subcategory`.`subCategoryId`)
                        WHERE `subcategory`.`categoryId`= '$categoryId' AND `subcategory`.`subCatId`='$i';");
                        $stmt->execute();
                        $n=0; 
                        $check=0;?>
                        <?php while(($n <= 3) && ($row = $stmt->fetch(PDO::FETCH_ASSOC))){  ?>
                            
                            <?php $cPTotal = $row["cPrice1"] + $row["cPrice2"] + $row["cPrice3"] + $row["cPrice4"]; 
                            if ($row["subCatId"]==$check) {} else {
                                $check = $row["subCatId"];  ?>
                            
                           <h2 class="subcategory" style="background-color:#442220; color:white"><a href="subcategory.php?subCategoryId=<?php echo($row["subCategoryId"]); ?>"><?php echo($row["subCategoryName"]);?></a></h2><br>
                            <?php } ?>
                            <section class="subcategory">
                            <a href="product.php?productId=<?php echo($row["productId"]); ?>"><img src="img/<?php echo ($row["iFileName"]); ?>" /></a>
                            <div>
                            <h3><?php echo($row["pBrand"]); ?></h3>
                            <h2><a href="product.php?productId=<?php echo($row["productId"]); ?>"><?php echo($row["pName"]); ?></a></h2>  
                            <span>$<?php echo($row["price"]); ?> | </span>                   
                            <span class="green">CO$: $<?php echo($cPTotal); ?></span> 
                            </div> <br>

                            <form class="aForm" action ="process.php" method="POST">
                            <input type="number" name= "quantity" value=1 required/> 
                            <input type="hidden" name= "productId" value="<?php echo($row["productId"]); ?>"> 
                            <input type= "submit" value="Add to cart"> 
                            </form> <br>
                            <br>
                            </section>
                            <?php $n++; } ?>
                            </section>    
                       <?php }?>   
                        
            </section>
        </main>
        <?php include("../includes/2ndlevel-footer.php"); ?>
    </body>
    <script src="addtocart.js"> </script>
</html>

