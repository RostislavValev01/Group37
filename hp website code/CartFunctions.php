<?php
session_start();

require 'connectdb.php';

if (!isset($_SESSION['Customer_ID'])) {
    header('Location: signInPageCustomer.php');
    exit;
}
if(isset($_GET["function"]) && $_GET["function"]=="increase_item" && isset($_GET["product_id"])){
    $product_id = $_GET['product_id'];
    $user_id = $_SESSION['Customer_ID'];
    $itemQuantity=getItem($product_id,$user_id,$con)["Quantity"]+1;
    updateItemQuantity($product_id,$user_id,$itemQuantity,$con);
}else if(isset($_GET["function"]) && $_GET["function"]=="decrease_item" && isset($_GET["product_id"])){
    $product_id = $_GET['product_id'];
    $user_id = $_SESSION['Customer_ID'];
    $itemQuantity=getItem($product_id,$user_id,$con)["Quantity"]-1;
    updateItemQuantity($product_id,$user_id,$itemQuantity,$con);
}
$backTo="Cart.php";
if(isset($_GET["returnpage"])){
$backTo=$_GET["returnpage"];
}
header("Location: ".$backTo);


function getItem($item_id,$user_id,$con)
{
    $productQuery = "SELECT * FROM customerbasket WHERE `CustomerID`=? and `ProductID`=? ";
    $productStmt = mysqli_prepare($con, $productQuery);
    mysqli_stmt_bind_param($productStmt, "ii", $user_id,$item_id);
    mysqli_stmt_execute($productStmt);
    $productResult = mysqli_stmt_get_result($productStmt);
    $product = mysqli_fetch_assoc($productResult);
    return $product;
}

function getItemFromStock($item_id,$con)
{
    $productQuery = "SELECT * FROM stock WHERE `ProductSKU`=? ";
    $productStmt = mysqli_prepare($con, $productQuery);
    mysqli_stmt_bind_param($productStmt, "i",$item_id);
    mysqli_stmt_execute($productStmt);
    $productResult = mysqli_stmt_get_result($productStmt);
    $product = mysqli_fetch_assoc($productResult);
    return $product;
}

function isItemExist($item_id,$user_id,$con)
{
    $productQuery = "SELECT COUNT(ProductID) as exist FROM customerbasket WHERE `CustomerID`=? and `ProductID`=? ";
    $productStmt = mysqli_prepare($con, $productQuery);
    mysqli_stmt_bind_param($productStmt, "ii", $user_id,$item_id);
    mysqli_stmt_execute($productStmt);
    $productResult = mysqli_stmt_get_result($productStmt);
    $product = mysqli_fetch_assoc($productResult);
    return $product["exist"];
}

function updateItemQuantity ($item_id,$user_id,$itemQuantity,$con)
{
    if($itemQuantity>0){
        $productQuery = "UPDATE `customerbasket` SET `Quantity`=? WHERE `CustomerID`=? and `ProductID`=? ";
        $productStmt = mysqli_prepare($con, $productQuery);
        mysqli_stmt_bind_param($productStmt, "iii", $itemQuantity,$user_id,$item_id);
        mysqli_stmt_execute($productStmt);
    }

}