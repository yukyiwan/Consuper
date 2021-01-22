<?php
session_start();
if(isset($_SESSION["personId"]) && isset($_SESSION["userId"])) {
	if ($_SESSION["userId"]== "1"){
	include("../includes/db-config.php"); 
	?>
		


	<!DOCTYPE html>
		<html>
			<head>
				<title>Consuper CMS | Upload product</title>
				<meta charset="utf-8">
				<meta name="description" content="Consuper CMS page to upload an product">
				<meta name="keywords" content="add product, adding product, create product, creating product, upload product, uploading product">
				<?php include("../includes/main-author.php"); ?>
				<meta name="robots" content="noindex">
				<link rel="canonical" href="upload-product.php" />
				<?php include("../includes/2ndlevel-favicon.php"); ?>
				<link rel="stylesheet" href="../css/cms.css">
				<link rel="stylesheet" href="../css/form.css">
		
			</head>
			<body>
        	<?php include("../includes/2ndlevel-header.php"); ?>
        	<main>
            	<h1>Content Management System</h1>
            	
        		
            	<form id="form" action="process-upload-product.php" method="POST" enctype="multipart/form-data">
				<h2>Upload product</h2>
				<fieldset>
                		<legend>Overview</legend>
                		<label for="categoryId"> Category:</label>
                		<select name ="categoryId">
                        <?php $stmt = $pdo->prepare("SELECT * FROM `category`");
						$stmt->execute();
						while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
						?>
						<option value="<?php echo($row["categoryId"]) ?>"><?php echo($row["categoryName"]) ?></option>
						<?php
						}
						?>
						</select></br>          

						
						<section id="subCat" >
						<label for="subCatId"> Sub-category:</label>
                		<select name ="subCategoryId">
						<option id="blank" disabled selected value> </option> 
						<?php $stmt = $pdo->prepare("SELECT * FROM `subCategory` WHERE `categoryId`=1");
						$stmt->execute();
						while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
						?>
						<option class="Electronics" value="<?php echo($row["subCategoryId"]) ?>"><?php echo($row["subCategoryName"]) ?></option>
						<?php
						}
						$stmt = $pdo->prepare("SELECT * FROM `subCategory` WHERE `categoryId`=2");
						$stmt->execute();
						while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
						?>
						<option class="Furniture" value="<?php echo($row["subCategoryId"]) ?>"><?php echo($row["subCategoryName"]) ?></option>
						<?php
						}
						$stmt = $pdo->prepare("SELECT * FROM `subCategory` WHERE `categoryId`=3");
						$stmt->execute();
						while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
						?>
						<option  class="Groceries" value="<?php echo($row["subCategoryId"]) ?>"><?php echo($row["subCategoryName"]) ?></option>
						<?php
						}
						?>
						</select>
						</section>
				
						</br>  
				

                		<label for="pBrand"> Brand:</label>
                		<input type="text" name="pBrand" required/></br>

                		<label for="pName">Product: </label>
                		<input type="text" name="pName" required/></br>
						
						<label for="pModel">Model number: </label>
                		<input type="text" name="pModel" required/></br>						

						<label for="pCapacity">Capacity: </label>
                		<input type="text" name="pCapacity" required/></br>

						<label for="pColor">Color: </label>
                		<input type="text" name="pColor" required/></br>

                		<label for="price">Price: $</label>
                    	<input type="text" name="price" required/></br>
				</fieldset>
				<fieldset>
				<legend>Carbon Cost </legend>
                		<label for="link"> Production: $</label>
                    	<input type="text" name="cPrice1" required/></br>

						<label for="link"> Logistics: $</label>
                    	<input type="text" name="cPrice2" required/></br>

						<label for="link"> Recycling: $</label>
                    	<input type="text" name="cPrice3" required/></br>

						<label for="link"> Non-recyclable waste processing: $</label>
                    	<input type="text" name="cPrice4" required/></br>

				</fieldset>


				<fieldset>
                    	<legend>Preview: </legend>
                    	<textarea name="preview" required></textarea>
						<legend>Full description: </legend>
						<textarea name="description" required></textarea>
				</fieldset>
				<fieldset>
                    	<legend>Image: </legend>
                        <input type="file" name="productImage" required/>     
				</fieldset>
                	<input type="submit" value = "Upload product"/>
            	</form> 
		<?php include("../includes/cms-footer.php"); ?>
        </main>
        <?php include("../includes/2ndlevel-footer.php"); ?>
    	</body>
		<script src="subcat.js"> </script>
	</html>
	
    
<?php }
} 
else{
include('../includes/admin-else.php');}
?>
