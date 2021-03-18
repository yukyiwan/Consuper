<?php
session_start();
if(isset($_SESSION["personId"]) && isset($_SESSION["userId"])) {
	if ($_SESSION["userId"]== "1"){

    $productId = $_GET["productId"];
	include('../includes/db-config.php');
    $stmt = $pdo->prepare("SELECT * FROM `product` WHERE `productId` = $productId");
    $stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);  
	$categoryId=$row["categoryId"];
    $subCategoryId=$row["subCategoryId"];
    $pBrand = $row["pBrand"];
    $pName  = $row["pName"];
    $pModel  = $row["pModel"];
    $pCapacity = $row["pCapacity"];
    $pColor = $row["pColor"];
    $price = $row["price"];
    $cPrice1 = $row["cPrice1"];
    $cPrice2 = $row["cPrice2"];
    $cPrice3 = $row["cPrice3"];
    $cPrice4 = $row["cPrice4"];
    $preview = $row["preview"];
	$description = $row["description"];
	$iFileName = $row["iFileName"];
	?>
    
    <!DOCTYPE html>
	<html>
    	<head>
    	    <title>Consuper CMS | Edit product</title>
    	    <meta charset="utf-8">
            <meta name="description" content="Consuper CMS section to edit an product">
            <meta name="keywords" content="edit product, update product">
            <?php include("../includes/main-author.php"); ?>
            <meta name="robots" content="noindex">
            <link rel="canonical" href="process-register.php" />
			<?php include("../includes/2ndlevel-favicon.php"); ?>
			<link rel="stylesheet" href="../css/cms.css">
			<link rel="stylesheet" href="../css/form.css">
    	</head>
    	
    	<body>    
		<?php include("../includes/2ndlevel-header.php"); ?>
            <main>
                <h1>Content Management System</h1>
                <h2>Edit product: <?php echo($pBrand); ?> | <?php echo($pModel); ?> | <?php echo($pName); ?></h2>
                <form id="form" action="process-edit-product.php" method="POST" enctype="multipart/form-data">
							<fieldset>
								<legend>Overview</legend>
								<label for="categoryId"> Category:</label>
								<select name ="categoryId">
								<?php $stmt = $pdo->prepare("SELECT * FROM `category`");
								$stmt->execute();
								while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
									if ($categoryId==$row["categoryId"]) { ?>
								<option value="<?php echo($row["categoryId"]) ?>" selected><?php echo($row["categoryName"]) ?></option>
								<?php } else { ?>
								<option value="<?php echo($row["categoryId"]) ?>"><?php echo($row["categoryName"]) ?></option> 
								<?php
								} }
								?>
								</select></br>          

								<section id="subCat">
								<label for="subCategoryId"> Sub-category:</label>
								<select name ="subCategoryId">

								?> <option id="blank" disabled selected value> </option> <?php
								$stmt = $pdo->prepare("SELECT * FROM `subcategory` WHERE `categoryId`=1");
								$stmt->execute();

								while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
									
									if ($subCategoryId==$row["subCategoryId"]) { ?>
										<option class="Electronics" value="<?php echo($row["subCategoryId"]) ?>" selected><?php echo($row["subCategoryName"]) ?></option>
										<?php } else { ?>
										<option class="Electronics" value="<?php echo($row["subCategoryId"]) ?>"><?php echo($row["subCategoryName"]) ?></option>
										<?php
										} }
								$stmt = $pdo->prepare("SELECT * FROM `subcategory` WHERE `categoryId`=2");
								$stmt->execute();
								while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
									if ($subCategoryId==$row["subCategoryId"]) { ?>
										<option class="Furniture" value="<?php echo($row["subCategoryId"]) ?>" selected><?php echo($row["subCategoryName"]) ?></option>
										<?php } else { ?>
										<option class="Furniture" value="<?php echo($row["subCategoryId"]) ?>"><?php echo($row["subCategoryName"]) ?></option>
										<?php
										} }
										
								$stmt = $pdo->prepare("SELECT * FROM `subcategory` WHERE `categoryId`=3");
								$stmt->execute();
								while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
									if ($subCategoryId==$row["subCategoryId"]) { ?>
										<option class="Groceries" value="<?php echo($row["subCategoryId"]) ?>" selected><?php echo($row["subCategoryName"]) ?></option>
										<?php } else { ?>
										<option class="Groceries" value="<?php echo($row["subCategoryId"]) ?>"><?php echo($row["subCategoryName"]) ?></option>
										<?php
										} }
										?>
								</select>  							
								</section>
								</br>  
						

								<label for="pBrand"> Brand:</label>
								<input type="text" name="pBrand" value = "<?php echo($pBrand); ?>" required/></br>

								<label for="pName">Product: </label>
								<input type="text" name="pName" value = "<?php echo($pName); ?>" required/></br>
								
								<label for="pModel">Product: </label>
								<input type="text" name="pModel" value = "<?php echo($pModel); ?>" required/></br>						

								<label for="pCapacity">Capacity: </label>
								<input type="text" name="pCapacity" value = "<?php echo($pCapacity); ?>"required/></br>

								<label for="pColor">Color: </label>
								<input type="text" name="pColor" value = "<?php echo($pColor); ?>"required/></br>

								<label for="price">Price: $</label>
								<input type="text" name="price" value = "<?php echo($price); ?>"required/></br>
						</fieldset>
						<fieldset>
						<legend>Carbon Cost </legend>
								<label for="link"> Production: $</label>
								<input type="text" name="cPrice1" value = "<?php echo($cPrice1); ?>" required/></br>

								<label for="link"> Logistics: $</label>
								<input type="text" name="cPrice2" value = "<?php echo($cPrice2); ?>" required/></br>

								<label for="link"> Recycling: $</label>
								<input type="text" name="cPrice3" value = "<?php echo($cPrice3); ?>" required/></br>

								<label for="link"> Non-recyclable waste processing: $</label>
								<input type="text" name="cPrice4" value = "<?php echo($cPrice4); ?>" required/></br>

						</fieldset>


						<fieldset>
								<legend>Preview: </legend>
								<textarea name="preview" required><?php echo($preview); ?></textarea>
								<legend>Full description: </legend>
								<textarea name="description" required><?php echo($description); ?></textarea>
						</fieldset>
						<fieldset>
								<legend>Image: </legend>
								<img src="../products/img/<?php echo ($iFileName); ?>" width="50%"/></br>
								<input type="file" name="productImage"/>     
						</fieldset>	
                	<input type= "hidden" name="productId" value="<?php echo $productId ?>"> 
					<input type="submit" value = "Update product"/>
    	        </form>
		<?php include("../includes/cms-footer.php"); ?>
        </main>
        <?php include("../includes/2ndlevel-footer.php"); ?>
		</body>	
		<script src="subcat.js"> </script>
	</html>			
	
<?php
} 
}
else{
include('../includes/admin-else.php');}
?>