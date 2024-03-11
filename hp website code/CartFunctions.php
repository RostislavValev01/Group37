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
    $itemQuantity=getItemQuantity($product_id,$user_id,$con)+1;
    updateItemQuantity($product_id,$user_id,$itemQuantity,$con);
}else if(isset($_GET["function"]) && $_GET["function"]=="decrease_item" && isset($_GET["product_id"])){
    $product_id = $_GET['product_id'];
    $user_id = $_SESSION['Customer_ID'];
    $itemQuantity=getItemQuantity($product_id,$user_id,$con)-1;
    updateItemQuantity($product_id,$user_id,$itemQuantity,$con);
}
header("Location: Cart.php");


function getItemQuantity($item_id,$user_id,$con)
{
    $productQuery = "SELECT Quantity FROM customerbasket WHERE `CustomerID`=? and `ProductID`=? ";
    $productStmt = mysqli_prepare($con, $productQuery);
    mysqli_stmt_bind_param($productStmt, "ii", $user_id,$item_id);
    mysqli_stmt_execute($productStmt);
    $productResult = mysqli_stmt_get_result($productStmt);
    $product = mysqli_fetch_assoc($productResult);
    return $product["Quantity"];
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