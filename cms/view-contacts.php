<?php
session_start();
if(isset($_SESSION["personId"]) && isset($_SESSION["userId"])) {
    if ($_SESSION["userId"]== "1"){
    ?>


    <!DOCTYPE html>
    	<html>
        	<head>
        	    <title> Consuper CMS | View Contacts </title>
        	    <meta charset="utf-8">
                <meta name="description" content="Consuper CMS section to view contact form submission">
                <meta name="keywords" content="contact form submission, contact us entries, contact records">
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
                    <h2>Enqueries</h2>
                    <?php
                	include('../includes/db-config.php');
                	$stmt = $pdo->prepare("	SELECT * from `contact` ORDER BY `contact`.`timeStamp` DESC;");
                	$stmt->execute(); ?>
                    
                    <table>
                    	<tr>
                        	<th>CID</th>
                        	<th>Name</th>
                        	<th>Email</th>
                        	<th>Message</th>
                        	<th>Submission Time</th>
                    	</tr>
                    
                    <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {     ?>
                                       
                        <tr>
                            <td><?php echo($row["contactId"]); ?></td>
                            <td><?php echo($row["fName"]." ".$row["lName"]); ?></td>
                            <td><?php echo($row["email"]); ?></td>
                            <td><?php echo($row["message"]); ?></td> 
                            <td><?php echo($row["timeStamp"]); ?></td>                
                 		</tr>
             		<?php } ?>
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

