<?php
session_start();
if($_SESSION["userId"]== "1"){
    
    $categoryId=$_POST["categoryId"];
    $subCategoryId=$_POST["subCategoryId"];

    if ($categoryId==1 && $subCategoryId>4) {
        $subCategoryId=1;
    }

    if ($categoryId==2 && ($subCategoryId<5 || $subCategoryId >6)) {
        $subCategoryId=5;
    }

    if ($categoryId==3 && $subCategoryId <7) {
        $subCategoryId=7;
    }



    $pBrand = addslashes ($_POST["pBrand"]);
    $pName  = addslashes ($_POST["pName"]);
    $pModel  = addslashes ($_POST["pModel"]);
    $pCapacity = addslashes($_POST["pCapacity"]);
    $pColor = addslashes($_POST["pColor"]);
    $price = $_POST["price"];
    $cPrice1 = $_POST["cPrice1"];
    $cPrice2 = $_POST["cPrice2"];
    $cPrice3 = $_POST["cPrice3"];
    $cPrice4 = $_POST["cPrice4"];
    $cPriceT = $cPrice1+$cPrice2+$cPrice3+$cPrice4;
    $preview = addslashes($_POST["preview"]);
    $description = addslashes($_POST["description"]);
    $uploaddir = "../products/img/";
    $iFileName = preg_replace("/[^A-Za-z0-9\-\_\.]/", '', $_FILES["productImage"]["name"]);
    $uploadfile = $uploaddir. basename($iFileName);

        include('../includes/db-config.php');
        
        $stmt = $pdo->prepare("INSERT INTO `product`(`productId`, `categoryId`, `subCategoryId`, `pBrand`, `pName`, `pModel`, `pCapacity`, `pColor`, `price`, `cPrice1`, `cPrice2`, `cPrice3`, `cPrice4`, `cPriceT`, `preview`, `description`, `featured1`, `featured2`, `featured3`, `iFileName`, `timeStamp`) 
        VALUES (null, '$categoryId', '$subCategoryId', '$pBrand', '$pName', '$pModel', '$pCapacity', '$pColor', '$price', '$cPrice1', '$cPrice2', '$cPrice3', '$cPrice4', '$cPriceT', '$preview', '$description', 0, 0, 0, '$iFileName', null)");
        $stmt->execute();
        
        if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $uploadfile)) {
        header("Location: manage-products.php");
        } else {
        echo ("Possible file upload error!</br>");
        echo ("Here is some more debugging info:");
        print_r($_FILES);
        }

} 
else{
include('../includes/admin-else.php');}
?>

