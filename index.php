<?php
session_start();


?>

<!DOCTYPE html> 
    <html>
        <head>
            <title> Consuper | Green Shopping</title>    
            <meta charset="utf-8">
            <meta name="description" content="Make greener buying decisions possible">
            <meta name="keywords" content="consuper, green shopping, carbon emission, environmental friendly products, responsible consumer">
            <?php include("includes/main-author.php"); ?>
            <link rel="canonical" href="index.php" />
            <link rel="stylesheet" href="css/main.css">
            <link rel="stylesheet" href="css/index.css">
            <?php include("includes/favicon.php"); ?>
        </head>
        <body>
            <?php include ("includes/header.php"); ?>   
            
            <main>

            <section id="category">
                
                <section class ="category">
                <a href="products/category.php?categoryId=1"><img src="images/Electronics.png"></a>    
                <a href="products/category.php?categoryId=1"><h4>Electronics</h4></a>
                </section>
                <section class ="category">
                <a href="products/category.php?categoryId=2"><img src="images/Furniture.png"></a>    
                <a href="products/category.php?categoryId=2"><h4>Furniture</h4></a>
                </section>
                <section class ="category">
                <a href="#"><img src="images/Home.png"></a>    
                <a href="#"><h4 style="color:#cccccc">Coming soon</h4></a>
                </section>
            </section>

            
            </h1>
            <section>
            <a href="products/category.php?categoryId=1"><img src="images/electronics.jpg" width="100%" /></a>
            </section>
           

            <section id="featured">
            <section class="featured">
                <!-- featured products -->
                <?php include('includes/db-config.php');
                    $stmt = $pdo->prepare("SELECT * FROM `product` WHERE `featured1`=1;");
                    $stmt->execute(); 
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $cPTotal = $row["cPrice1"] + $row["cPrice2"] + $row["cPrice3"] + $row["cPrice4"];?>
                
                
                            <a href="products/product.php?productId=<?php echo($row["productId"]); ?>"><img src="products/img/<?php echo ($row["iFileName"]); ?>" /></a>
                            <div>
                            <h3><?php echo($row["pBrand"]); ?></h3>
                            <h2><a href="products/product.php?productId=<?php echo($row["productId"]); ?>"><?php echo($row["pName"]); ?></a></h2>  
                            <span>$<?php echo($row["price"]); ?> | </span>                   
                            <span  class="green">CO$<?php echo($cPTotal); ?></span>
                            </div>  <br>   
                            <form class="aForm" action ="process.php" method="POST">
                            <input type="number" name= "quantity" value=1 required/> 
                            <input type="hidden" name= "productId" value="<?php echo($row["productId"]); ?>"> 
                            <input type= "submit" value="Add to cart"> 
                            </form>      
       
                </section>

                <section class="featured">
                <?php include('includes/db-config.php');
                    $stmt = $pdo->prepare("SELECT * FROM `product` WHERE `featured2`=1;");
                    $stmt->execute(); 
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $cPTotal = $row["cPrice1"] + $row["cPrice2"] + $row["cPrice3"] + $row["cPrice4"];?>
                
                
                            <a href="products/product.php?productId=<?php echo($row["productId"]); ?>"><img src="products/img/<?php echo ($row["iFileName"]); ?>" /></a>
                            <div>
                            <h3><?php echo($row["pBrand"]); ?></h3>
                            <h2><a href="products/product.php?productId=<?php echo($row["productId"]); ?>"><?php echo($row["pName"]); ?></a></h2>
                            <span>$<?php echo($row["price"]); ?> | </span>                   
                            <span  class="green">CO$<?php echo($cPTotal); ?></span> 
                            </div>   <br>
                            <form class="aForm" action ="process.php" method="POST">
                            <input type="number" name= "quantity" value=1 required/> 
                            <input type="hidden" name= "productId" value="<?php echo($row["productId"]); ?>"> 
                            <input type= "submit" value="Add to cart"> 
                            </form>       
     
                </section>

                <section class="featured">
                <?php include('includes/db-config.php');
                    $stmt = $pdo->prepare("SELECT * FROM `product` WHERE `featured3`=1;");
                    $stmt->execute(); 
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $cPTotal = $row["cPrice1"] + $row["cPrice2"] + $row["cPrice3"] + $row["cPrice4"];?>
                
                
                            <a href="products/product.php?productId=<?php echo($row["productId"]); ?>"><img src="products/img/<?php echo ($row["iFileName"]); ?>" /></a>
                            <div>
                            <h3><?php echo($row["pBrand"]); ?></h3>
                            <h2><a href="products/product.php?productId=<?php echo($row["productId"]); ?>"><?php echo($row["pName"]); ?></a></h2>  
                            <span>$<?php echo($row["price"]); ?> | </span>                   
                            <span class="green">CO$<?php echo($cPTotal); ?></span> 
                            </div> <br>
                            <form class="aForm" action ="process.php" method="POST">
                            <input type="number" name= "quantity" value=1 required/> 
                            <input type="hidden" name= "productId" value="<?php echo($row["productId"]); ?>"> 
                            <input type= "submit" value="Add to cart"> 
                            </form> <br> <br> 
                </section>
        </section>
        </main>

            <?php include ("includes/footer.php"); ?>
        </body>
        <script src="addtocart.js"> </script>
</html>