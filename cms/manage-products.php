<?php
session_start();
if(isset($_SESSION["personId"]) && isset($_SESSION["userId"])) {
    if ($_SESSION["userId"]== "1"){
    ?>

    <!DOCTYPE html>
	<html>
    	<head>
    	    <title> Consuper CMS | Manage products</title>
    	    <meta charset="utf-8">
            <meta name="description" content="Consuper CMS section to manage product editing, featured setting and deletion">
            <meta name="keywords" content="cms menu, cms table of content, cms index">
            <?php include("../includes/main-author.php"); ?>
            <meta name="robots" content="noindex">
            <link rel="canonical" href="manage-products.php" />
            <?php include("../includes/2ndlevel-favicon.php"); ?>
            <link rel="stylesheet" href="../css/cms.css">

    	</head>
    	<body>    
        <?php include("../includes/2ndlevel-header.php"); ?>
            <main>
                <h1>Content Management System</h1>
                <h2>Manage products</h2>
            	<a id="upload" href="upload-product.php">Upload product</a></br></br>
            	<table>
                	<tr>
                    	<th>Category</th>
                        <th>Sub-category</th>
                    	<th>Product Name</th>
                    	<th>Edit</th>
                        <th>Delete</th>
                        <th>Set Feature 1</th>          
                        <th>Set Feature 2</th>        
                        <th>Set Feature 3</th>              	
                	</tr>
                
                    <?php include('../includes/db-config.php');
                    $stmt = $pdo->prepare("SELECT * FROM ((`product`
                    INNER JOIN `category` ON `product`.`categoryId` = `category`.`categoryId`)
                    INNER JOIN `subcategory` ON `product`.`subCategoryId` = `subcategory`.`subCategoryId`)
                    ");
                	$stmt->execute();
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {     
                        $categoryId = $row["categoryId"];
                        $categoryName = $row["categoryName"];
                        $subCategoryId = $row["subCategoryId"];
                        $subCategoryName = $row["subCategoryName"];
                        $pBrand = $row["pBrand"];
                        $pModel = $row["pModel"];
                        $pName = $row["pName"];
                        $productId = $row["productId"];
                    	$featured="";
                        if($row["featured1"]==1){ 
                            $featured = "*";}
                        if($row["featured2"]==1){ 
                            $featured = "**";}
                        if($row["featured3"]==1){ 
                            $featured = "***";} ?>
                    	
                	<tr>
                        <td><a href="../products/category.php?categoryId=<?php echo($categoryId); ?>"><?php echo($row["categoryName"]); ?></a></td>
                        <td><a href="../products/subcategory.php?subCategoryId=<?php echo($subCategoryId); ?>"><?php echo($subCategoryName); ?></a></td>
                    	<td><a href="../products/product.php?productId=<?php echo($productId); ?>"><b><?php echo($featured); ?><?php echo($pBrand); ?> | <?php echo($pModel); ?> | <?php echo($pName); ?><?php echo($featured); ?></b></a></td>
                    	<td><a href="edit-product.php?productId=<?php echo($productId); ?>">edit</a></td>
                 		<td><a href="delete-product.php?productId=<?php echo($productId); ?>">delete</a></td>    	
                        <td><a href="set-featured.php?productId=<?php echo($productId); ?>">Set Feature 1</a></td>
                        <td><a href="set-featured2.php?productId=<?php echo($productId); ?>">Set Feature 2</a></td>
                        <td><a href="set-featured3.php?productId=<?php echo($productId); ?>">Set Feature 3</a></td>
             		</tr>
                	<?php } ?>
             	</table>
             	<p>*featured product 1 on landing page*</p>
                <p>**featured product 2 on landing page**</p>
                <p>***featured product 3 on landing page***</p>
        <?php include("../includes/cms-footer.php"); ?>
        </main>
        <?php include("../includes/2ndlevel-footer.php"); ?>
    	</body>
	</html>		
		
<?php }
}else{
include('../includes/admin-else.php');}
?>
