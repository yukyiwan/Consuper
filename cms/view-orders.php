<?php
session_start();
if(isset($_SESSION["personId"]) && isset($_SESSION["userId"])) {
    if ($_SESSION["userId"]== "1"){
    ?>


    <!DOCTYPE html>
    	<html>
        	<head>
        	    <title> Consuper CMS | View orders </title>
        	    <meta charset="utf-8">
                <meta name="description" content="Consuper CMS section to view order form submission">
                <meta name="keywords" content="order form submission, order us entries, order records">
                <?php include("../includes/main-author.php"); ?>
                <meta name="robots" content="noindex">
                <link rel="canonical" href="manage-articles.php" />
                <?php include("../includes/2ndlevel-favicon.php"); ?>
                <link rel="stylesheet" href="../css/cms.css">
                
        	</head>
        	
        	<body>    
            <?php include("../includes/2ndlevel-header.php"); ?>    
                <main>
                    <h1>Content Management System</h1>
                    <h2>View Orders</h2>
                    <?php
                	include('../includes/db-config.php');
                	$stmt = $pdo->prepare("SELECT * FROM ((`order-person`
                    INNER JOIN `person` ON `order-person`.`personId` = `person`.`personId`)
                    INNER JOIN `order` ON `order-person`.`orderId` = `order`.`orderId`)
                    WHERE `paid`=1 ORDER BY `paidTime` DESC;");
                	$stmt->execute(); 
                    $orderId=0; ?>
                    <table>
                    	<tr>
                        	<th>OID</th>
                        	<th>Customer Name</th>
                            <th>Email</th>
                        	<th>Address</th>
                        	<th>Phone</th>
                            <th>Order Time</th>
                        	<th>Link to the items</th>
                    	</tr>
                    
                    <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {   
                        if ($orderId !== $row["orderId"]) {  ?>
                        <tr>
                            <td><?php echo($row["orderId"]); ?></td>
                            <td><?php echo($row["fName"]." ".$row["lName"]); ?></td>
                            <td><?php echo($row["email"]); ?></td>
                            <td><?php echo($row["address"]); ?></td> 
                            <td><?php echo($row["phone"]); ?></td> 
                            <td><?php echo($row["paidTime"]); ?></td> 
                            <td><a href="../orders/orders.php?orderId=<?php echo($row["orderId"]);?>">view products</a></td>                
                 		</tr>
             		<?php $orderId = $row["orderId"]; } } ?>
             		</table> 
        <?php include("../includes/cms-footer.php"); ?>
        </main>
        <?php include("../includes/2ndlevel-footer.php"); ?>
        	</body>
    	</html>
		
		
<?php }
}else{
include('../includes/admin-else.php');}
?>

