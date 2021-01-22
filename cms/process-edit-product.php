<?php
session_start();
if($_SESSION["userId"]== "1"){
    $productId=$_POST["productId"];
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

    if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $uploadfile)) {
    include('../includes/db-config.php');
    $stmt = $pdo -> prepare ("UPDATE `product` SET `categoryId`='$categoryId',`subCategoryId`= '$subCategoryId',`pBrand`='$pBrand',`pName`='$pName',`pModel`='$pModel',
    `pCapacity`='$pCapacity',`pColor`='$pColor',`price`='$price',`cPrice1`='$cPrice1',`cPrice2`='$cPrice2',`cPrice3`='$cPrice3',`cPrice4`='$cPrice4', `cPriceT`='$cPriceT',
    `preview`='$preview',`description`='$description',`iFileName`='$iFileName' 
    WHERE `product`.`productId` = '$productId';");
    $stmt -> execute();
    header("Location: manage-products.php");
    } else {
    include('../includes/db-config.php');
    $stmt = $pdo -> prepare ("UPDATE `product` SET `categoryId`='$categoryId',`subCategoryId`= '$subCategoryId',`pBrand`='$pBrand',`pName`='$pName',`pModel`='$pModel',
    `pCapacity`='$pCapacity',`pColor`='$pColor',`price`='$price',`cPrice1`='$cPrice1',`cPrice2`='$cPrice2',`cPrice3`='$cPrice3',`cPrice4`='$cPrice4', `cPriceT`='$cPriceT', 
    `preview`='$preview',`description`='$description'
    WHERE `product`.`productId` = '$productId';");
    $stmt -> execute();
    echo ("<p><b>Your product is successfully updated. Ignore the below message if you intended NOT to update the image.</b></p><a href=\"manage-products.php\">Go back to the product overview</a></br>");
    echo ("Possible file upload error, if you intended to upload an image. Here is some more debugging info:");
    print_r($_FILES);
    }

}else{
include('../includes/admin-else.php');}
?>

