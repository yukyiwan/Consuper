<?php
    session_start();
    if (isset($_SESSION["personId"])) {
    $personId = $_SESSION["personId"];}
    $subCategoryId = $_GET["subCategoryId"];
    include('../includes/db-config.php');
    $stmt = $pdo->prepare("SELECT * FROM (`subcategory`
    INNER JOIN `category` ON `subcategory`.`categoryId` = `category`.`categoryId`)
    WHERE `subcategory`.`subCategoryId` = '$subCategoryId';");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC); 
?>

<!DOCTYPE html> 
<html>
    <head>
        <title>Consuper | <?php echo($row["subCategoryName"]);?> </title>
        <meta charset="utf-8">
        <meta name="description" content="Full collection of <?php echo($row["subCategoryName"]);?> products hosted by Consuper">
        <meta name="keywords" content="<?php echo($row["subCategoryName"]);?>">
        <link rel="canonical" href="products/subcategory.php?subCategoryId=<?php echo($subCategoryId); ?>">
        <?php include("../includes/2ndlevel-favicon.php"); ?>
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/product.css">
    </head>
    <body>
        <?php include("../includes/2ndlevel-header.php"); ?>
        <main>
            <ul class="breadcrumb">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../products/category.php?categoryId=<?php echo($row["categoryId"]); ?>"><?php echo ($row["categoryName"]); ?></a></li>
                <li><a href="../products/subcategory.php?subCategoryId=<?php echo($subCategoryId); ?>"><?php echo($row["subCategoryName"]); ?></a></li>
            </ul>             
            <h1><?php echo($row["subCategoryName"]);?></h1>
            
            <section id="latest" >
                <?php

                $stmt = $pdo->prepare("SELECT * FROM `product` WHERE `subCategoryId`= '$subCategoryId' ORDER BY `timeStamp` DESC;");
                $stmt->execute();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                    $cPTotal = $row["cPrice1"] + $row["cPrice2"] + $row["cPrice3"] + $row["cPrice4"];?>
                            <section class="list">
                            <a href="product.php?productId=<?php echo($row["productId"]); ?>"><img src="img/<?php echo ($row["iFileName"]); ?>" /></a>
                            <div>
                            <h3><?php echo($row["pBrand"]); ?></h3>
                            <h2><a href="product.php?productId=<?php echo($row["productId"]); ?>"><?php echo($row["pName"]); ?></a></h2>  
                            <span>$<?php echo($row["price"]); ?> | </span>                   
                            <span class="green">CO$: $<?php echo($cPTotal); ?></span> 
                            </div> </br>
                            <form class="aForm" action ="process.php" method="POST">
                            <input type="number" name= "quantity" value=1 required/> 
                            <input type="hidden" name= "productId" value="<?php echo($row["productId"]); ?>"> 
                            <input type= "submit" value="Add to cart"> 
                            </form>
                            </section>  

                <?php } ?>
            </section>


            <section id="rate">
                
                <?php

                $stmt = $pdo->prepare("SELECT * FROM `product` WHERE `subCategoryId`= '$subCategoryId' ORDER BY `likes` DESC;");
                $stmt->execute();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                    $cPTotal = $row["cPrice1"] + $row["cPrice2"] + $row["cPrice3"] + $row["cPrice4"];?>
                            <section class="list">
                            <a href="product.php?productId=<?php echo($row["productId"]); ?>"><img src="img/<?php echo ($row["iFileName"]); ?>" /></a>
                            <div>
                            <h3><?php echo($row["pBrand"]); ?></h3>
                            <h2><a href="product.php?productId=<?php echo($row["productId"]); ?>"><?php echo($row["pName"]); ?></a></h2>  
                            <span>$<?php echo($row["price"]); ?> | </span>                   
                            <span class="green">CO$: $<?php echo($cPTotal); ?></span> 
                            </div> </br>
                            <form class="aForm" action ="process.php" method="POST">
                            <input type="number" name= "quantity" value=1 required/> 
                            <input type="hidden" name= "productId" value="<?php echo($row["productId"]); ?>"> 
                            <input type= "submit" value="Add to cart"> 
                            </form>
                            </section>  

                <?php } ?>
            </section>

            <section id="carbon">
                
                <?php

                $stmt = $pdo->prepare("SELECT * FROM `product` WHERE `subCategoryId`= '$subCategoryId' ORDER BY `cPriceT`;");
                $stmt->execute();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                    $cPTotal = $row["cPrice1"] + $row["cPrice2"] + $row["cPrice3"] + $row["cPrice4"];?>
                            <section class="list">
                            <a href="product.php?productId=<?php echo($row["productId"]); ?>"><img src="img/<?php echo ($row["iFileName"]); ?>" /></a>
                            <div>
                            <h3><?php echo($row["pBrand"]); ?></h3>
                            <h2><a href="product.php?productId=<?php echo($row["productId"]); ?>"><?php echo($row["pName"]); ?></a></h2>  
                            <span>$<?php echo($row["price"]); ?> | </span>                   
                            <span class="green">CO$: $<?php echo($cPTotal); ?></span> 
                            </div> </br>
                            <form class="aForm" action ="process.php" method="POST">
                            <input type="number" name= "quantity" value=1 required/> 
                            <input type="hidden" name= "productId" value="<?php echo($row["productId"]); ?>"> 
                            <input type= "submit" value="Add to cart"> 
                            </form>
                            </section>  

                <?php } ?>
            </section>


            <section id="high">
                
                <?php

                $stmt = $pdo->prepare("SELECT * FROM `product` WHERE `subCategoryId`= '$subCategoryId' ORDER BY `price` DESC;");
                $stmt->execute();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                    $cPTotal = $row["cPrice1"] + $row["cPrice2"] + $row["cPrice3"] + $row["cPrice4"];?>
                            <section class="list">
                            <a href="product.php?productId=<?php echo($row["productId"]); ?>"><img src="img/<?php echo ($row["iFileName"]); ?>" /></a>
                            <div>
                            <h3><?php echo($row["pBrand"]); ?></h3>
                            <h2><a href="product.php?productId=<?php echo($row["productId"]); ?>"><?php echo($row["pName"]); ?></a></h2>  
                            <span>$<?php echo($row["price"]); ?> | </span>                   
                            <span class="green">CO$: $<?php echo($cPTotal); ?></span> 
                            </div> </br>
                            <form class="aForm" action ="process.php" method="POST">
                            <input type="number" name= "quantity" value=1 required/> 
                            <input type="hidden" name= "productId" value="<?php echo($row["productId"]); ?>"> 
                            <input type= "submit" value="Add to cart"> 
                            </form>
                            </section>  

                <?php } ?>
            </section>

            <section id="low">
                
                <?php

                $stmt = $pdo->prepare("SELECT * FROM `product` WHERE `subCategoryId`= '$subCategoryId' ORDER BY `price`;");
                $stmt->execute();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                    $cPTotal = $row["cPrice1"] + $row["cPrice2"] + $row["cPrice3"] + $row["cPrice4"];?>
                            <section class="list">
                            <a href="product.php?productId=<?php echo($row["productId"]); ?>"><img src="img/<?php echo ($row["iFileName"]); ?>" /></a>
                            <div>
                            <h3><?php echo($row["pBrand"]); ?></h3>
                            <h2><a href="product.php?productId=<?php echo($row["productId"]); ?>"><?php echo($row["pName"]); ?></a></h2>  
                            <span>$<?php echo($row["price"]); ?> | </span>                   
                            <span class="green">CO$: $<?php echo($cPTotal); ?></span> 
                            </div> </br>
                            <form class="aForm" action ="process.php" method="POST">
                            <input type="number" name= "quantity" value=1 required/> 
                            <input type="hidden" name= "productId" value="<?php echo($row["productId"]); ?>"> 
                            <input type= "submit" value="Add to cart"> 
                            </form>
                            </section>  

                <?php } ?>
            </section>



    <nav>
        <ul>
            <li><a id="rateB">TOP RATED</a></li>    
            <li><a id="latestB">LATEST</a></li> 
            <li><a id="carbonB">CO2 LOW-HIGH</a> </li>
            <li><a id="lowB">PRICE LOW-HIGH </a></li>
            <li><a id="highB">PRICE HIGH-LOW</a></li>
            
        </ul>
    </nav>




        </main>
        <?php include("../includes/2ndlevel-footer.php"); ?>
    </body>
    <script src="addtocart.js"> </script>
    <script src="listing.js"> </script>
</html>