<?php
session_start();
if(isset($_SESSION["personId"]) && isset($_SESSION["userId"])) {

if ($_SESSION["userId"]== "1"){
    ?>
    
    <!DOCTYPE html>
    <html>
    	<head>
    	    <title>Consuper CMS | Menu</title>
    	    <meta charset="utf-8">
            <meta name="description" content="Consuper CMS Menu">
            <meta name="keywords" content="cms menu, cms table of content, cms index">
            <?php include("../includes/main-author.php"); ?>
            <meta name="robots" content="noindex">
            <link rel="canonical" href="cms-menu.php" />
            <?php include("../includes/2ndlevel-favicon.php"); ?>
            <link rel="stylesheet" href="../css/cms.css">
    	</head>
    	<body>    
            <?php include("../includes/2ndlevel-header.php"); ?>
            <main>
                <h1>Content Management System</h1>
                <h2>Menu</h2>
                <ol>
                    <li><a href="upload-product.php">Upload product</a></li>
                    <li> <a href="manage-products.php">Edit, set featured or delete product</a></li>
                    <li> <a href="view-orders.php">View orders</a></li> 
                    <li> <a href="view-contacts.php">View contact form submissions</a></li> 
                </ol> 
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