<?php 
session_start();
?>

<!DOCTYPE HTML>
<html>
    <head> 
        <title>Consuper | Contact</title>    
        <meta charset="utf-8">
        <meta name="description" content="Let us know your enquiries or recommendations!">
        <meta name="keywords" content="contact form, query, queries, inquiry, inquiries, enquiries, enquiry, question">
        <?php include("includes/main-author.php"); ?>
        <link rel="canonical" href="contact.php" />
        <?php include("includes/favicon.php"); ?>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/form.css">
    </head>  
    
    <body>
    <?php include("includes/header.php"); ?>

        <main>

            <form id="form" action = "process-contact.php" method="POST">
            <h1> Contact Consuper </h1>
            <p>Consuper aspires to become the app that truly empowers consumers to change the world. Let us know your enquiries or recommendations!  </p>
                        <label for "fName"> First Name </label>
                        <input type = "text"  name="fName" placeholder="First Name" autofocus="" required /><p>

                        <label for "lName"> Last Name </label>
                        <input type = "text" name="lName" placeholder="Last Name" required /><p>

                        <label for "email"> Email </label>
                        <input type = "email" name = "email" placeholder="Email" required /><p>
                        
                        <label for "message"> Message </label> <br>
                        <textarea name="message" placeholder="We love hearing from you" required></textarea><p>

                        <input type="hidden" name="time" value="<?php echo date("Y-m-d h:i:s", time()); ?>" />

            <input type="submit" value = "Submit"/>
            </form>
        </main>
  <?php include("includes/footer.php"); ?>

  </body>
  </html>
